<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 * @property \App\Model\Table\HousesTable&\Cake\ORM\Association\BelongsTo $Houses
 *
 * @method \App\Model\Entity\Reservation newEmptyEntity()
 * @method \App\Model\Entity\Reservation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Reservation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Reservation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Reservation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Reservation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reservation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reservation> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReservationsTable extends Table
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

        $this->setTable('reservations');
        $this->setDisplayField('contact');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'students_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Houses', [
            'foreignKey' => 'houses_id',
            'joinType' => 'INNER',
        ]);
		$this->addBehavior('AuditStash.AuditLog');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'studentcard' => [
            'field' => [
                'dir' => 'studentcard_dir'
            ],
        ],
        ]);
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('id')
             ->value('status')
            ->value('students_id')
            ->value('houses_id')
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
            ->integer('students_id')
            ->notEmptyString('students_id');

        $validator
            ->integer('houses_id')
            ->notEmptyString('houses_id');

        $validator
            ->date('reservation_date')
            ->requirePresence('reservation_date', 'create')
            ->notEmptyDate('reservation_date');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDate('end_date');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 15)
            ->requirePresence('contact', 'create')
            ->notEmptyString('contact');

        $validator
            ->scalar('nric')
            ->maxLength('nric', 100)
            ->requirePresence('nric', 'create')
            ->notEmptyString('nric');

        $validator
            ->allowEmptyFile('studentcard')
            ->add('studentcard',[
                'validExtension' => [
                    'rule' => ['extension',['jpg']],
                    'message' => ('Only .jpg are allowed')
                ],
            ]);

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
        $rules->add($rules->existsIn(['students_id'], 'Students'), ['errorField' => 'students_id']);
        $rules->add($rules->existsIn(['houses_id'], 'Houses'), ['errorField' => 'houses_id']);

        return $rules;
    }
}
