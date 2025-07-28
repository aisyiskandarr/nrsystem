<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title">NR Student Registration</h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?>
				</div>
		</div>
    </div>
</div>
<div class="gradient_line mb-3"></div>
<!--/Header-->

<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
    <div class="card-body text-body-secondary">
            <?= $this->Form->create($student) ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                    <?php echo $this->Form->control('users_id', ['options' => $users, 'empty'=>'Select User', 'class'=>'form-select']); ?>
                    </div>
                    <div class="col-md-6">
                    <?php echo $this->Form->control('name'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                     <?php echo $this->Form->control('matrix_number'); ?>
                    </div>
                    <div class="col-md-6">
                    <?php echo $this->Form->control('faculty'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                     <?php echo $this->Form->control('program'); ?>
                    </div>
                    <div class="col-md-6">
                    <?php echo $this->Form->control('semester'); ?>
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