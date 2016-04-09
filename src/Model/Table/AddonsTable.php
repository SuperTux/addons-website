<?php
namespace App\Model\Table;

use App\Model\Entity\Addon;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addons Model
 *
 * @property \Cake\ORM\Association\HasMany $AddonVersions
 */
class AddonsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('addons');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('AddonVersions', [
            'foreignKey' => 'addon_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('token', 'create')
            ->notEmpty('token');

        return $validator;
    }
}
