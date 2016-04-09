<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Composer\Semver\Semver;
use DrSlump;
use Cake\Event\Event;

/**
 * AddonVersions Controller
 *
 * @property \App\Model\Table\AddonVersionsTable $AddonVersions
 */
class AddonVersionsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['updateRepository']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Addons']
        ];
        $addonVersions = $this->paginate($this->AddonVersions);

        $this->set(compact('addonVersions'));
        $this->set('_serialize', ['addonVersions']);
    }

    /**
     * View method
     *
     * @param string|null $id Addon Version id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addonVersion = $this->AddonVersions->get($id, [
            'contain' => ['Addons']
        ]);

        $this->set('addonVersion', $addonVersion);
        $this->set('_serialize', ['addonVersion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $addonVersion = $this->AddonVersions->newEntity();
        if ($this->request->is('post')) {
            $addonVersion = $this->AddonVersions->patchEntity($addonVersion, $this->request->data);
            if ($this->AddonVersions->save($addonVersion)) {
                $this->Flash->success(__('The addon version has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addon version could not be saved. Please, try again.'));
            }
        }
        $addons = $this->AddonVersions->Addons->find('list', ['limit' => 200]);
        $this->set(compact('addonVersion', 'addons'));
        $this->set('_serialize', ['addonVersion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Addon Version id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addonVersion = $this->AddonVersions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addonVersion = $this->AddonVersions->patchEntity($addonVersion, $this->request->data);
            if ($this->AddonVersions->save($addonVersion)) {
                $this->Flash->success(__('The addon version has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addon version could not be saved. Please, try again.'));
            }
        }
        $addons = $this->AddonVersions->Addons->find('list', ['limit' => 200]);
        $this->set(compact('addonVersion', 'addons'));
        $this->set('_serialize', ['addonVersion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Addon Version id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addonVersion = $this->AddonVersions->get($id);
        if ($this->AddonVersions->delete($addonVersion)) {
            $this->Flash->success(__('The addon version has been deleted.'));
        } else {
            $this->Flash->error(__('The addon version could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function upload()
    {
        if ($this->request->is('post')) {
            debug($this->request->data);

            $zip = new \ZipArchive();

            if ($zip->open($this->request->data['addon']['tmp_name'])!==TRUE) {
               throw new \RuntimeException("Invalid Upload");
            }
            $filename = "";
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                if(preg_match("/.*\\.nfo$/", $filename) === 1) {
                    break;
                }
            }
            $nfo = $zip->getFromName($filename);

            $sexp = new DrSlump\Sexp();
            $arr = $sexp->parse($nfo);
            $addon = (array_combine(array_column($arr, 0), array_column($arr, 1)));

            $addon_finder = $this->AddonVersions->Addons->find('all')->where(['Addons.token' => $addon['id']]);
            $inDb = $addon_finder->count() > 0;
            if(!$inDb) {
                $addon_item = $this->AddonVersions->Addons->newEntity();
                $addon_item->name = $addon['title'];
                $addon_item->token = $addon['id'];
                $this->AddonVersions->Addons->save($addon_item);
            } else {
                $addon_item = $addon_finder->first();
            }

            $filename = $addon_item->token . '-v' . $addon['version'] . '.zip';
            $target = WWW_ROOT . 'repository' . DS . $filename;
            move_uploaded_file($this->request->data['addon']['tmp_name'], $target);

            $arr[] = ['url', Router::url('/', true) . 'repository/' . $filename];
            $arr[] = ['md5', md5_file($target)];

            $addonVersion = $this->AddonVersions->newEntity();
            $addonVersion->addon = $addon_item;
            $addonVersion->path = $target;
            $addonVersion->version = $addon['version'];
            $addonVersion->supported_supertux_versions = $this->request->data['supported_supertux_versions'];
            $addonVersion->nfo = $sexp->serialize($arr);
            $this->AddonVersions->save($addonVersion);

        }
    }

    public function updateRepository($versionNumber) {
        $addons = $this->AddonVersions->Addons->find('all')->order(['Addons.name'])->toArray();
        $returns = [];
        foreach($addons as $addon) {
            $versions = $this->AddonVersions->find('all')->where(['AddonVersions.addon_id' => $addon['id']])
                ->order(['AddonVersions.version DESC'])->all();
            foreach($versions as $version) {
                if(Semver::satisfies($versionNumber, $version['supported_supertux_versions'])) {
                    $returns[] = $version->nfo;
                    break;
                }
            }
        }

        $sexp = new DrSlump\Sexp();
        $ret = ['supertux-addons'];
        foreach($returns as $return) {
            $ret[] = $sexp->parse($return);
        }

        $this->response->type('text/plain');
        $this->response->body($sexp->serialize($ret));
        return $this->response;
    }
}
