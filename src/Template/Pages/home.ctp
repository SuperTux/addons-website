<h2>Manage Supertux Addons</h2>
<ul>
<li><?= $this->Html->link('Upload', ['controller' => 'AddonVersions', 'action' => 'upload']); ?></li>
<li><?= $this->Html->link('Edit existing', ['controller' => 'AddonVersions', 'action' => 'index']); ?></li>
</ul>

Note: the repository path is <code><?= urldecode($this->Url->build(['controller' => 'AddonVersions', 'action' => 'updateRepository', '{supertux-version-number}'], true)) ?></code>