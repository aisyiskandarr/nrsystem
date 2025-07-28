<h1 class="m-0 me-2 page_title"><?php echo $title; ?></h1>
<small class="text-muted"><?php echo $system_name; ?></small>

<div class="row">
	<div class="col-md-3">

	</div>
	<div class="col-md-6">
<div class="card shadow mt-3">
	<div class="card-body">
<div class="my-4 text-center">
<b class="gradient-animate-small">&lt;&#47;&gt; <?php echo $system_abbr; ?></b>
</div>

<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['required' => true, 'class'=>'form-control', 'autocomplete'=>'off']) ?>
				<div class="text-end">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary']) ?>
				  <?= $this->Form->end() ?>
                </div>	
  
<div class="postlink_space">
<?php echo $this->Html->link('Register', ['controller'=>'Users','action'=>'registration']); ?> | 
<?php echo $this->Html->link('Forgot Username', array('controller'=>'Users','action'=>'forgot_username')); ?> | 
<?php echo $this->Html->link('Forgot Password', array('controller'=>'Users','action'=>'forgot_password')); ?>
</div>	

<hr>

<div class="btn-grid">
<?php echo $this->Html->link(__('User Manual'), array('controller' => 'pages', 'action' => 'user_manual'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?> 

<?php echo $this->Html->link(__('Frequently Asked Question'), array('controller' => 'Faqs', 'action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?> 

<?php echo $this->Html->link(__('Contact Us'), array('controller' => 'Contacts', 'action' => 'add'), array('class' => 'btn btn-primary btn-sm', 'escape' => false)); ?> 
</div>
<hr>
<div id="supported" align="center">

</div>

<br><br>
<div class="">
				<p class="text-center">
					
					<SCRIPT LANGUAGE="JavaScript">
						today = new Date();
						y0 = today.getFullYear();
					</SCRIPT>
					Copyright &copy; <SCRIPT LANGUAGE="JavaScript">
						document.write(y0);
					</SCRIPT> <?= $system_abbr; ?>. All rights reserved. <br>
					<br>
				</p>
			</div>
	</div>
	<div class="col-md-3">

	</div>
</div>

