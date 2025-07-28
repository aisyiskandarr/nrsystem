<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\House $house
 * @var \Cake\Collection\CollectionInterface|string[] $users
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
            <?= $this->Html->link(__('List Houses'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($house) ?>
            <fieldset>
                <legend><?= __('Add House') ?></legend>
                
                    <?php echo $this->Form->control('users_id', ['options' => $users]); ?>
                    <?php echo $this->Form->control('owner'); ?>
                    <?php echo $this->Form->control('housing_area'); ?>
                    <?php echo $this->Form->control('image'); ?>
                    <?php echo $this->Form->control('image_dir'); ?>
                    <?php echo $this->Form->control('address'); ?>
                    <?php echo $this->Form->control('rental_price'); ?>
                    <?php echo $this->Form->control('deposit'); ?>
                    <?php echo $this->Form->control('room_number'); ?>
                    <?php echo $this->Form->control('capacity'); ?>
                    <?php echo $this->Form->control('amount_person'); ?>
                    <?php echo $this->Form->control('description'); ?>
                    <?php echo $this->Form->control('contact'); ?>
                    <?php echo $this->Form->control('availability'); ?>
                    <?php echo $this->Form->control('status'); ?>
               
            </fieldset>
				<div class="text-end">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>