<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 * @var \Cake\Collection\CollectionInterface|string[] $students
 * @var \Cake\Collection\CollectionInterface|string[] $houses
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title">Add New Reservations</h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="gradient_line mb-3"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($reservation, ['type' => 'file']) ?>
            <fieldset>
                
                <div class="row">
                    <div class="col-md-6">
                    <?php echo $this->Form->control('students_id', ['options' => $students, 'class' => 'form-select']); ?>
                    </div>
                    <div class="col-md-6">
                    <?php echo $this->Form->control('houses_id', ['options' => $houses, 'class' => 'form-select' ]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <?php echo $this->Form->control('reservation_date'); ?>
                    </div>
                    <div class="col-md-4">
                    <?php echo $this->Form->control('start_date'); ?>    
                    </div>
                    <div class="col-md-4">
                    <?php echo $this->Form->control('end_date'); ?>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <?php echo $this->Form->control('contact'); ?>
                    </div>
                    <div class="col-md-4">
                    <?php echo $this->Form->control('nric'); ?>    
                    </div>
                    <div class="col-md-4">
                     <label>Upload Student Card<?php echo $this->Form->control('studentcard', ['type' => 'file',  'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>

               
            </fieldset>
				<div class="text-end">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>