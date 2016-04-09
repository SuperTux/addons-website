<?php
namespace App\Model\Table;

use App\Model\Entity\AddonVersion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AddonVersions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Addons
 */
class AddonVersionsTable extends Table
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

        $this->table('addon_versions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Addons', [
            'foreignKey' => 'addon_id',
            'joinType' => 'INNER'
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
            ->requirePresence('path', 'create')
            ->notEmpty('path');

        $validator
            ->integer('version')
            ->requirePresence('version', 'create')
            ->notEmpty('version');

        $validator
            ->requirePresence('supported_supertux_versions', 'create')
            ->notEmpty('supported_supertux_versions');

        $validator
            ->requirePresence('nfo', 'create')
            ->notEmpty('nfo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['addon_id'], 'Addons'));
        return $rules;
    }
}
