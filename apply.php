<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apply for new account</title>
   <?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<?php
	$con = new mysqli('localhost', 'root', '', 'mybank');
	define('bankName', 'WEB-BANK', true);
   ?>

</head>

<body style="background:black; margin-bottom: 60px;">
<h2 class="alert alert-success rounded-0"><?php echo bankname; ?><small class="float-right text-muted" style="font-size: 12pt;"></small></h2>
	<br>
   <!-- navbar starts here -->
   <!-- <nav class="navbar fixed-top navbar-light bg-secondary">
      <div class="container-fluid">
         <a class="navbar-brand text-light" href="#">WEB-Bank</a>
      </div>
   </nav> -->
   <!-- navbar ends here -->

   <!-- main part starts here -->
   <div class="container">
      <div class="card text-center mx-auto shadowWhite" style="max-width: 50rem;">
         <div class="card-body">
            <form action="" method="POST">
               <div class="form-group">
                  <!-- <div class="card-header">
                     <strong>Do you have this type of account at WEB-bank?</strong>
                     <br>
                     <label class="radio radio-inline mr-5 mt-2">
                        <input type="radio" name="account_exist" value="Yes">&nbsp;YES
                     </label>
                     <label class="radio radio-inline ml- mt-2">
                        <input type="radio" name="account_exist" value="No" checked>&nbsp;NO
                     </label>
                  </div> -->
                  <div class="text-left">
                     <br> <strong>Salutation *</strong> &nbsp; &nbsp; &nbsp;
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MR" checked>&nbsp;MR
                     </label>
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MISS">&nbsp;MISS
                     </label>
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MRS">&nbsp;MRS
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <label for="inputFirstName" class="form-label mt-2"> <strong> First Name *</strong></label>
                     <input type="name" class="form-control" id="inputFirstName" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputMiddleName" class="form-label mt-2"><strong> Middle Name </strong></label>
                     <input type="name" class="form-control" id="inputMiddleName">
                  </div>
                  <div class="col-md-4">
                     <label for="inputLastName" class="form-label mt-2"><strong> Last Name *</strong></label>
                     <input type="name" class="form-control" id="inputLastName" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputDOB" class="form-label mt-2"> <strong> Date of Birth *</strong></label>
                     <input type="date" class="form-control" id="inputDOB" pattern="[1-2]{1}[0-9]{3}-[0-1]{1}[1-9]{1}-[0-9]{2}" placeholder="1976-10-21" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputGender" class="form-label mt-2"><strong> Gender *</strong></label> <br>
                           <select class="form-select form-select-md p-2 btn btn-block border" aria-label=".form-select-md example">
                           <option selected>Choose</option>
                           <option value="1">Male</option>
                           <option value="2">Female</option>
                           <option value="3">Other</option>
                           </select>                     
                  </div>
                  <div class="col-md-4">
                     <label for="inputMaritalStatus" class="form-label mt-2"><strong> Marital Status *</strong></label>
                     <select class="form-select form-select-md p-2 btn btn-block border" aria-label=".form-select-md example">
                           <option value="1" selected>Single</option>
                           <option value="2">Married</option>
                           </select>                     
                  </div>
                  <div class="col-md-6">
                     <label for="inputEmail" class="form-label mt-2"><strong>Email *</strong></label>
                     <input type="email" class="form-control" id="inputEmail" required>
                  </div>
                  <div class="col-md-6">
                     <label for="phone" class="form-label mt-2"><strong> Mobile Number *</strong></label>
                     <input type="tel" class="form-control" id="phone" name="phone" pattern="+977[9]{1}[8]{1}[0-9]{8}" value="+977" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputDistrict" class="form-label mt-2"> <strong>District *</strong> </label>
                     <input type="text" class="form-control" id="inputDistrict" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputCity" class="form-label mt-2"> <strong>VDC/Municipality *</strong> </label>
                     <input type="text" class="form-control" id="inputCity" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputWard" class="form-label mt-2"> <strong>Ward *</strong></label>
                     <input type="text" class="form-control" id="inputWard" required>
                  </div>
                  <div class="checkbox mt-4">
                     <label style="margin-left: 0;">
                        <input name="terms_conditions" type="checkbox" value="1">
                        I authorize WEB-Bank to send mail on the above mentioned Email.
                     </label>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="registerButton">Apply
                  </button>
            </form>
         </div>
      </div>
   </div>

   <!-- main part ends here -->

   <!-- Footer -->
   <!-- <footer class="page-footer fixed-bottom bg-secondary text-light" style="height: 50px;"> -->
      <!-- Copyright -->
      <!-- <div class="footer-copyright text-center py-3">
         <h6> © 2021 Copyright:
            UTR Projects </h6>
      </div> -->
      <!-- Copyright -->

   <!-- </footer> -->
   <!-- Footer -->
</body>

</html>