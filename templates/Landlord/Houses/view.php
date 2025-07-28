<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\House $house
 */
?>

<!--/Header-->
<div class="row text-primary">
    <div class="col-12 text-center">
        <h1 class="fw-bold">NRHub Registered House</h1>
        <p class="text-muted small">Posted on: <?php echo date('d F Y, h:i A', strtotime($house->created)); ?></p>
        <hr class="border-primary">
    </div>
</div>
<div class="card rounded-3 bg-light mb-4 border-0 shadow-lg">
    <div class="card-body text-dark">
        <h2 class="text-center text-primary mb-4">House Details <?php if ($house -> status == 0) {
							echo '<i class= "fa-solid fa-circle-xmark text-danger"></i>';
						} elseif ($house -> status == 1) {
							echo '<i class="fa-solid fa-clock text-warning"></i>';
						} elseif ($house -> status == 2) {
							echo '<i class="fa-solid fa-circle-check text-success"></i>';
						} else
							echo '<span class= "badge bg-danger">Error</span>';
						?></h2>
        
        <div class="text-center mb-4">
         <?php echo $this->Html->image('../files/houses/image/' . $house->image, ['class' => 'rounded', 'width' => '70%', 'height' => '550px']); ?>
         <h4 class="mt-3 mb-2 text-primary fw-bold" style="font-family: 'Bangers', sans-serif; font-size: 40px;"><?=($house->housing_area) ?></h4>   
        <div class="mb-4 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-house text-primary me-2" style="font-size: 24px;"></i>Address:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= nl2br(h(wordwrap($house->address, 40))) ?></p>
                </div>
         <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-3 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-user text-primary me-2" style="font-size: 24px;"></i>Owner:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->owner) ?></p>
                </div>
                 <div class="mb-3 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-people-group text-primary me-2" style="font-size: 24px;"></i>Capacity:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->capacity) ?></p>
                </div>
                <div class="mb-3 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-tag text-primary me-2" style="font-size: 24px;"></i>Rental Price:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->rental_price) ?></p>
                </div>
                <div class="mb-3 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa fa-id-card text-primary me-2" style="font-size: 24px;"></i>Contact No :
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->contact) ?></p>
                </div>
                <div class="mb-3 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa fa-info-circle text-primary me-2" style="font-size: 24px;"></i>Availability:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?php if ($house -> availability == "Available") {
							echo '<span class= "badge bg-primary">Available</span>';
						} elseif ($house -> availability == "Full") {
							echo '<span class= "badge bg-danger">Full</span>';
						} else
							echo '<span class= "badge bg-danger">Error</span>';
						?></p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="mb-3 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-folder-open text-primary me-2" style="font-size: 24px;"></i>Description:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->description) ?></p>
                </div>
                <div class="mb-3 text-center">
                    <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-door-open text-primary me-2" style="font-size: 24px;"></i>Room Number:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->room_number) ?></p>
                </div>
                <div class="mb-3 text-center">
                 <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-money-bill-transfer text-primary me-2" style="font-size: 24px;"></i>Deposit:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->deposit) ?></p>   
                </div>
                <div class="mb-3 text-center">
                 <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-circle-dollar-to-slot text-primary me-2" style="font-size: 24px;"></i>Amount/Person:
                    </strong>
                    <p class="text-black" style="font-size: 18px;"><?= h($house->amount_person) ?></p>   
                </div>
                <strong class="text-black d-block" style="font-size: 20px;">
                        <i class="fa-solid fa-circle-check text-primary me-2" style="font-size: 24px;"></i>Status:
                    </strong>
                    <p class="text-center" style="font-size: 18px;">
                       <?php if ($house -> status == 0) {
							echo '<span class= "badge bg-danger">Blacklist</span>';
						} elseif ($house -> status == 1) {
							echo '<span class= "badge bg-warning">Unverified</span>';
						} elseif ($house -> status == 2) {
							echo '<span class= "badge bg-success">Verified</span>';
						} else
							echo '<span class= "badge bg-danger">Error</span>';
						?>
                    </p>
            </div>
        </div>
    </div>
</div>
</div>

<div class="text-center mt-4">
    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-primary rounded-pill px-4">
        <i class="fa-solid fa-arrow-left me-2"></i>Back to Houses List
    </a>
    <p class="text-secondary mt-3 small">NRHub Management</p>
</div>







