<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
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
							<li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
							</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="row">
    <div class="col-md-9">
        <div class="container-fluid py-3">
            <div class="card shadow-sm border-0 text-body">
                <div class="card-header  d-flex align-items-center ">
    <div class="me-3">
        <?php
        if (!empty($student->user->avatar)) {
            echo $this->Html->image(
                '../files/Users/avatar/' . h($student->user->slug) . '/' . h($student->user->avatar),
                ['alt' => 'Avatar', 'class' => 'rounded-circle shadow', 'width' => '70', 'height' => '70']
            );
        } else {
            echo $this->Html->image(
                'blank_profile.png',
                ['alt' => 'No Avatar', 'class' => 'rounded-circle shadow', 'width' => '70', 'height' => '70']
            );
        }
        ?>
    </div>
    <div>
        <h3 class="mb-0 text-body"><?= h($student->name) ?></h3>
        <small><?= h($student->matrix_number) ?></small>
    </div>
</div>

                <div class="card-body">
                    <table class="table table-striped mb-0">
                        <tr>
                            <th>User</th>
                            <td>
                                <?= h($student->user->email)?>
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?= h($student->name) ?></td>
                        </tr>
                        <tr>
                            <th>Matrix Number</th>
                            <td><?= h($student->matrix_number) ?></td>
                        </tr>
                        <tr>
                            <th>Faculty</th>
                            <td><?= h($student->faculty) ?></td>
                        </tr>
                        <tr>
                            <th>Program</th>
                            <td><?= h($student->program) ?></td>
                        </tr>
                        
                        <tr>
                            <th>Semester</th>
                            <td><?= $this->Number->format($student->semester) ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= $this->Number->format($student->status) == 1 ? 'Active' : 'Inactive' ?></td>
                        </tr>
                        <tr>
                            <th>Created</th>
                            <td><?php echo date('d F Y, h:i A', strtotime($student->created)); ?></td>
                        </tr>
                        <tr>
                            <th>Modified</th>
                            <td><?php echo date('d F Y, h:i A', strtotime($student->modified)); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
       
    </div>
</div>




