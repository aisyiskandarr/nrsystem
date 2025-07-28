<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Houses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\House newEmptyEntity()
 * @method \App\Model\Entity\House newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\House> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\House get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\House findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\House patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\House> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\House|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\House saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\House>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\House>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\House>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\House> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\House>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\House>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\House>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\House> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HousesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('houses');
        $this->setDisplayField('address');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
		$this->addBehavior('AuditStash.AuditLog');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'image' => [
            'field' => [
                'dir' => 'image_dir'
            ],
        ],
        ]);
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('id')
            ->value('owner')
            ->value('housing_area')
            ->value('availability')
            ->value('status')
				->add('status', 'Search.Like', [
					//'before' => true,
					//'after' => true,
					'fieldMode' => 'OR',
					'multiValue' => true,
					'multiValueSeparator' => '|',
					'comparison' => 'LIKE',
					'wildcardAny' => '*',
					'wildcardOne' => '?',
					'fields' => ['status'],
				]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('users_id')
            ->notEmptyString('users_id');

        $validator
            ->scalar('owner')
            ->maxLength('owner', 50)
            ->requirePresence('owner', 'create')
            ->notEmptyString('owner');

        $validator
            ->scalar('housing_area')
            ->maxLength('housing_area', 50)
            ->requirePresence('housing_area', 'create')
            ->notEmptyString('housing_area');

        $validator
            ->allowEmptyFile('image')
            ->add('image',[
                'validExtension' => [
                    'rule' => ['extension',['jpg']],
                    'message' => ('Only .jpg are allowed')
                ],
            ]);

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->notEmptyString('address')
            ->add('address', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table',
            'message' => 'This address has already been used.'
                
    ]);

        $validator
            ->scalar('rental_price')
            ->maxLength('rental_price', 100)
            ->requirePresence('rental_price', 'create')
            ->notEmptyString('rental_price');

        $validator
            ->scalar('deposit')
            ->maxLength('deposit', 50)
            ->requirePresence('deposit', 'create')
            ->notEmptyString('deposit');

        $validator
            ->scalar('room_number')
            ->maxLength('room_number', 20)
            ->requirePresence('room_number', 'create')
            ->notEmptyString('room_number');

        $validator
            ->integer('capacity')
            ->requirePresence('capacity', 'create')
            ->notEmptyString('capacity');

        $validator
            ->scalar('amount_person')
            ->maxLength('amount_person', 50)
            ->requirePresence('amount_person', 'create')
            ->notEmptyString('amount_person');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 15)
            ->requirePresence('contact', 'create')
            ->notEmptyString('contact');

        $validator
            ->scalar('availability')
            ->maxLength('availability', 50)
            ->requirePresence('availability', 'create')
            ->notEmptyString('availability');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'), ['errorField' => 'users_id']);
         $rules->add($rules->isUnique(['address'], 'This address already exists.'));
        return $rules;
    }

}
