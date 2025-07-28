<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
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
							<li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
							</div>
		</div>
    </div>
</div>
<div class="gradient_line mb-3"></div>
<!--/Header-->


<div class="row">
    <!-- Left column -->
    <div class="col-md-9">
        <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <style>
                    .top {
                        width: 100%;
                        margin: auto; 
                    }
                    .one {
                        width: 70%;
                        height: 25px;
                        background-color: #601e59;
                        float: left;
                    }
                    .two {
                        margin-left: 15%;
                        height: 25px;
                        background: rgb(0, 0, 0);
                    }
                </style>

                <section class="top">
                    <div class="one"></div>
                    <div class="two"></div>
                </section>

                <div class="text-center">
                    <?php echo $this->Html->image('../img/nr.png', ['width' => '180px']) ?>
                    <h4>HOUSE RENTAL AGREEMENT</h4>
                </div>

                <hr />

                <div class="row">
                    <div class="col-md-9">
                        <div class="card-title md-0 mt-3">Rental Details</div>
                        <?= nl2br(h(wordwrap($reservation->house->address, 40))) ?>
                    </div>

                    <div class="col-md-3">
                        <div class="card-title md-0 mt-3">Student Card</div>
                        <?php echo $this->Html->image('../files/reservations/studentcard/' . $reservation->studentcard, ['class' => 'rounded', 'width' => '50%', 'height' => '120px']); ?>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="card-title md-0 mt-3">Reserved by</div>
                        <?= h($reservation->student->name) ?><br/>
                        <?= h($reservation->student->matrix_number) ?><br/>
                        <?= h($reservation->nric) ?>
                    </div>

                    <div class="col-md-4">
                        <table>
                            <tr>
                                <td width="70%" class="text-start"><b>Owner</b></td>
                                <td style="white-space: nowrap;"><?= h($reservation->house->owner) ?></td>
                            </tr>
                            <tr>
                                <td class="text-start"><b>Start Date</b></td>
                                <td><?= h($reservation->start_date) ?></td>
                            </tr>
                            <tr>
                                <td class="text-start"><b>End Date</b></td>
                                <td><?= h($reservation->end_date) ?></td>
                            </tr>
                            <tr>
                                <td class="text-start"><b>Status</b></td>
                                <td>
                                    <?php 
                                        if ($reservation->status == 0) {
                                            echo '<span class="badge bg-success">Approved</span>';
                                        } elseif ($reservation->status == 1) {
                                            echo '<span class="badge bg-warning">Pending</span>';
                                        } elseif ($reservation->status == 2) {
                                            echo '<span class="badge bg-danger">Rejected</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">Errors</span>';
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <br/>

                <table class="table table-hover mx-auto" style="width:80%">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">AREA</th>
                            <th scope="col" class="text-center">CAPACITY</th>
                            <th scope="col" class="text-center">RENTAL PRICE</th>
                            <th scope="col" class="text-center">DEPOSIT</th>
                            <th scope="col" class="text-end">TOTAL AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><?= h($reservation->house->housing_area) ?></td>
                            <td class="text-center"><?= h($reservation->house->capacity) ?></td>
                            <td class="text-center"><?= h($reservation->house->rental_price) ?></td>
                            <td class="text-center"><?= h($reservation->house->deposit) ?></td>
                            <td class="text-end"><?= h($reservation->house->amount_person) ?></td>
                        </tr>
                    </tbody>
                </table>

                <hr/>

                <div class="justify">
                    <b>TERMS & CONDITIONS</b><br/><br/>
                    1. Full payment must be made before the renter is allowed to use the house.<br/><br/>
                    2. The RENTER is responsible for all utility bills and damages during the rental.<br/><br/>
                    3. The RENTER must return the house in clean and tidy condition as received. 
                       In the case of any damage to the house or missing items, the RENTER must cover all repair 
                       or replacement costs using the security deposit paid to the OWNER.<br/><br/>
                    4. The house must not be used for illegal or criminal activities at any time.<br/><br/>
                    
                    <b>RENTER'S AGREEMENT:</b><br/><br/>
                    I'm <?= h($reservation->student->name) ?>, with Identification Number <?= h($reservation->nric) ?>, 
                    have read and fully understood all the Terms & Conditions stated in this rental agreement. 
                    I agree to comply with each term listed above as of the date <?= h($reservation->reservation_date) ?>. 
                    I accept full responsibility for the property during the rental period. 
                    I understand that legal action may be taken if I fail to follow any of the stated terms.
                </div>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div class="col-md-3">
       <div class="card bg-body-tertiary border-0 shadow">
        <div class="card-body">
            <div class="card-title mb-0">Reservation Management</div>
            <div class="gradient_line mb-3"></div>
            <table class ="table table-sm table-hover">
                <tr>
                    <td width="35%">Date</td>

                    <td><?php echo date('M d, Y (h:i A)', strtotime($reservation->reservation_date)); ?></td>
                </tr>
                <tr>
                    <td>Reservation Status</td>
                    <td width="15%"class="text-end"><?php if ($reservation -> status == 0) {
                                echo '<span class= "badge bg-success">Approved</span>';
                            } elseif ($reservation -> status == 1) {
                                echo '<span class= "badge bg-warning">Pending</span>';
                            } elseif ($reservation-> status == 2) {
                                echo '<span class= "badge bg-danger">Rejected</span>';
                            } else
                                echo '<span class= "badge bg-danger">Errors</span>';
                            ?>
                    </td>
                </tr>
            </table>
            <?php if ($reservation->status == 0) : // Approved ?>
    <div class="mb-3 col-12 mb-0">
        <div class="alert alert-warning">
            <div class="fw-semibold">Pending Reservation</div>
            <p class="mb-0">Are you sure you want to mark <?= h($reservation->student->name) ?> reservation as pending?</p>
            <div class="text-end mb-2">
                <?= $this->Form->postLink(
                    __('Mark as Pending'),
                    ['action' => 'changeStatus', $reservation->id, 1],
                    [
                        'confirm' => __('Are you sure you want to mark user: "{0}" as pending?', $reservation->student->name),
                        'title' => __('Mark as Pending'),
                        'class' => 'btn btn-warning btn-xs',
                        'escapeTitle' => false,
                        'data-bs-toggle' => "modal",
                        'data-bs-target' => "#bootstrapModal"
                    ]
                ) ?>
            </div>
        </div>
    </div>

<?php elseif ($reservation->status == 1) : // Pending ?>
    <div class="mb-3 col-12 mb-0">
        <div class="alert alert-info">
            <div class="fw-semibold">Approve Reservation</div>
            <p class="mb-0">Are you sure you want to approve <?= h($reservation->student->name) ?> booking?</p>
            <div class="text-end">
                <?= $this->Form->postLink(
                    __('Approve'),
                    ['action' => 'changeStatus', $reservation->id, 0],
                    [
                        'confirm' => __('Are you sure you want to approve user: "{0}"?', $reservation->student->name),
                        'title' => __('Approve'),
                        'class' => 'btn btn-success btn-xs',
                        'escapeTitle' => false,
                        'data-bs-toggle' => "modal",
                        'data-bs-target' => "#bootstrapModal"
                    ]
                ) ?>
            </div>
        </div>
    </div>
    <div class="mb-3 col-12 mb-0">
        <div class="alert alert-danger">
            <div class="fw-semibold">Reject Reservation</div>
            <p class="mb-0">Are you sure you want to reject <?= h($reservation->student->name) ?> booking?</p>
            <div class="text-end">
                <?= $this->Form->postLink(
                    __('Reject'),
                    ['action' => 'changeStatus', $reservation->id, 2],
                    [
                        'confirm' => __('Are you sure you want to reject user: "{0}"?', $reservation->student->name),
                        'title' => __('Reject'),
                        'class' => 'btn btn-danger btn-xs',
                        'escapeTitle' => false,
                        'data-bs-toggle' => "modal",
                        'data-bs-target' => "#bootstrapModal"
                    ]
                ) ?>
            </div>
        </div>
    </div>

<?php elseif ($reservation->status == 2) :  ?>
    <div class="mb-3 col-12 mb-0">
        <div class="alert alert-warning">
            <div class="fw-semibold">Pending Reservation</div>
            <p class="mb-0">Are you sure you want to mark <?= h($reservation->student->name) ?> Reservation as pending?</p>
            <div class="text-end">
                <?= $this->Form->postLink(
                    __('Mark as Pending'),
                    ['action' => 'changeStatus', $reservation->id, 1],
                    [
                        'confirm' => __('Are you sure you want to mark user: "{0}" as pending?', $reservation->student->name),
                        'title' => __('Mark as Pending'),
                        'class' => 'btn btn-warning btn-xs',
                        'escapeTitle' => false,
                        'data-bs-toggle' => "modal",
                        'data-bs-target' => "#bootstrapModal"
                    ]
                ) ?>
            </div>
        </div>
    </div>
<?php endif; ?>

            <?php echo $this->Html->link(('Download PDF'),['action'=>'pdf', $reservation->id], ['class'=>'btn btn-sm btn-outline-danger', 'escapeTitle' => false]); ?>
        </div>
      </div>
    </div>
</div>
