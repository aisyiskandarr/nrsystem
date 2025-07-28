<!DOCTYPE html>
<html lang="en">
<head>
    <title>House Rental Agreement</title>
    <style>
        @page {
            margin: 0 !important;
            padding: 0 !important;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
        }
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
        .content {
            margin-left: 70px;
            margin-right: 70px;
        }
        .center-logo {
            text-align: center;
            margin: 20px 0;
        }
        .table-hover {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        .table-dark {
            background-color: #343a40;
            color: #fff;
        }
        .table-center {
            text-align: center;
        }
        .text-end {
            text-align: right;
        }
    </style>
</head>
<body>
    <section class="top">
        <div class="one"></div>
        <div class="two"></div>
    </section>

    <div class="center-logo">
        <?php echo $this->Html->image('../img/nr.png', ['width' => '180px', 'fullBase' => true]) ?>
        <h2 style="text-align:center">HOUSE RENTAL AGREEMENT</h2>
    </div>

    <div class="content">
        <hr/>

        <div class="row">
    <!-- Left column: Rental Details -->
    <div class="col-md-4">
        <div class="card-title md-0 mt-3"><b>Rental Details</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <?= nl2br(h(wordwrap($reservation->house->address, 40))) ?><br/><br/>
        <b>Owner:</b> <?= h($reservation->house->owner) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Reserved By</b>
        <br/><b>Start Date:</b> <?= h($reservation->start_date) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= h($reservation->student->name) ?><br/>
        <b>End Date:</b> <?= h($reservation->end_date) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= h($reservation->student->matrix_number) ?><br/>
        <b>Status:</b>
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= h($reservation->nric) ?>
    </div>

    <!-- Right column: Reserved By -->
    <div class="col-md-4">
        
        
        
        
    </div>
</div>
<br/>
<!-- Student card below -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card-title md-0 mt-3"><b>Student Card</b></div>
        <?php echo $this->Html->image(
            '../files/reservations/studentcard/' . $reservation->studentcard, 
            ['class' => 'rounded', 'style' => 'width:50%; max-width:65px; height:auto;', 'fullBase' => true]
        ); ?>
    </div>
</div>
         <br/>   
        <br/>

        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="table-center">AREA</th>
                    <th class="table-center">CAPACITY</th>
                    <th class="table-center">RENTAL PRICE</th>
                    <th class="table-center">DEPOSIT</th>
                    <th class="text-end">TOTAL AMOUNT</th>
                </tr>
            </thead>
            <tbody class="table-center">
                <tr>
                    <td><?= h($reservation->house->housing_area) ?></td>
                    <td><?= h($reservation->house->capacity) ?></td>
                    <td><?= h($reservation->house->rental_price) ?></td>
                    <td><?= h($reservation->house->deposit) ?></td>
                    <td class="text-end"><?= h($reservation->house->amount_person) ?></td>
                </tr>
            </tbody>
        </table>
        <br/>    
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
</body>
</html>
