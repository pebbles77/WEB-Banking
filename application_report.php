<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Application Progress</title>
   <!-- bootstrap css and js-->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
   <script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.0.js"></script>
   <script src="js/bootstrap.min.js"></script>

   <!-- fontawesome css and js-->
   <link rel="stylesheet" type="text/css" href="fontawesome/all.css" />
   <script src="fontawesome/all.js"></script>

   <style>
      body {
         padding-top: 60px;
      }

      /* fix padding under menu after resize */
      @media screen and (max-width: 767px) {
         body {
            padding-top: 60px;
         }
      }

      @media screen and (min-width: 768px) and (max-width: 991px) {
         body {
            padding-top: 110px;
         }
      }

      @media screen and (min-width: 992px) {
         body {
            padding-top: 60px;
         }
      }
   </style>
</head>

<body style="margin-bottom: 50px;">
   <nav class="navbar fixed-top navbar-light bg-secondary">
      <div class="container-fluid">
         <a class="navbar-brand text-light" href="#">UTR BANK</a>
      </div>
   </nav>
   
   
   

   <div class="container">
      <div class="card text-center mt-3 mx-auto" style="max-width: 50rem;">
         <div class="card-header">
            <h4>You can track your application progress report in this page.</h4>
         </div>
         <div class="card-body">
            <form action="" method="POST" class="m-1">
               <div class="mb-2">
                  <input type="name" value="" name="name" class="form-control" required placeholder="Enter Name">
               </div>
               <div class="mb-2">
                  <input type="email" value="" name="email" class="form-control" required placeholder="Enter Email">
               </div>
               <button type="submit" class="btn btn-primary btn-block btn-sm my-1 p-2" name="staffLogin">Track Progress
               </button>
            </form>
         </div>
      </div>
      <div class="card text-center mt-3 mx-auto" style="max-width: 50rem;">
         <div class="card-body">
            <h5>Your Application is </h5><br>
           <button class="btn btn-success">PENDING</button> 
         </div>
      </div>


   </div>



   <!-- Footer -->
   <footer class="page-footer fixed-bottom bg-secondary text-light" style="height: 50px;">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
         <h6> © 2021 Copyright:
            UTR Projects </h6>
      </div>
      <!-- Copyright -->

   </footer>
   <!-- Footer -->


</body>

</html>
