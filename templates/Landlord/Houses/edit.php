<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\House $house
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title"><?php echo $title; ?></h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $house->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $house->id), 'class' => 'dropdown-item', 'escapeTitle' => false]
            ) ?>
            <?= $this->Html->link(__('List Houses'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="gradient_line mb-3"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($house, ['type'=>'file']) ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                    <?php echo $this->Form->control('users_id', ['options' => $users, 'empty' => 'Select User', 'class' => 'form-select']); ?>
                    </div>
                    <div class="col-md-6">
                    <?php echo $this->Form->control('owner'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <?php echo $this->Form->control('housing_area'); ?>
                    </div>
                    <div class="col-md-6">
                    <?= $this->Form->control('address', [
                        'label' => 'House Address',
                        'error' => 'This address is already in use!',
                        'class' => $this->Form->isFieldError('address') ? 'form-control is-invalid' : 'form-control'
                    ]) ?>

                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                    <?php echo $this->Form->control('room_number'); ?>
                    </div>
                    <div class="col-md-4">
                    <?php echo $this->Form->control('description'); ?>
                    </div>
                    <div class="col-md-4">
                     <?php echo $this->Form->control('capacity'); ?>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <?php echo $this->Form->control('rental_price'); ?>
                    </div>
                    <div class="col-md-4">
                    <?php echo $this->Form->control('deposit'); ?>
                    </div>
                    <div class="col-md-4">
                    <?php echo $this->Form->control('amount_person'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <?php echo $this->Form->control('contact'); ?>    
                    </div>
                    
                    <div class="col-md-4">
                        <?= $this->Form->control('availability', [
						'label' => ['text' => 'House Availability', 'class' => 'form-label'],
						'type' => 'select', 
						'options' => ['Available' => 'Available', 'Full' => 'Full'],
						'empty' => 'Select Availability',
						'class' => 'form-select'
					]); ?>
                    
                    </div>
                    <div class="col-md-4">
                    <label>Upload Image<?php echo $this->Form->control('image', ['type' => 'file',  'class' => 'form-control', 'label' => false]); ?>
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