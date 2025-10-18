<?php
require_once(__DIR__ . '/../../../backend/model/SessionManager.php');
$loggedUserData = null;
$access = new SessionManager();
if ($access->isLoggedIn()) {
    $loggedUserData = $access->getUserId();
}
?>
<nav class="navbar navbar-expand-lg navbar-light  p-3">
       <div class="container-fluid">
              <a href="./home">
                     <img src="../../resources/images/mgl_g5.svg" alt="" srcset="" class="logo mt-2  ">

              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
              </button>

              <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                     <ul class="navbar-nav ms-auto ">
                            <li class="nav-item alg-text-yellow">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2 alg-text-yellow alg-bolder" href="./">Home</a>
                            </li>

                            <li class="nav-item alg-text-yellow">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2 alg-text-yellow alg-bolder" href="https://yourmeetandgreetservice.co.uk/about-us">About Us</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2" href="https://yourmeetandgreetservice.co.uk/our-services">Our Services</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2" href="https://yourmeetandgreetservice.co.uk/faq">FAQ’s</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2" href="https://yourmeetandgreetservice.co.uk/contact-us">Contact Us</a>
                            </li>



                            <?php
                            if ($loggedUserData) { ?>

                                   <li class="nav-item d-lg-none d-inline">
                                          <a class="nav-link  alg-text-yellow alg-bolder mx-2" onclick="redirecUSerProfile()" style="cursor: pointer;">User Profile</a>
                                   </li>
                                   <li class="nav-item  d-lg-none d-inline">
                                          <a class="nav-link  alg-text-yellow alg-bolder mx-2" href="./OrderTracker" style="cursor: pointer;" style="cursor: pointer;">My Bookings</a>
                                   </li>

                                   <li class="nav-item  d-lg-none d-inline">
                                          <a class="nav-link  alg-text-yellow alg-bolder mx-2" onclick="logOut()" style="cursor: pointer;">Log Out</a>
                                   </li>
                            <?php
                            } else {
                            ?>
                                   <li class="nav-item  d-lg-none d-inline">
                                          <a class="nav-link  alg-text-yellow alg-bolder mx-2 " id="signinBtn" style="cursor: pointer;">Sign Up/Sign In</a>
                                   </li>

                                   <!-- <button class="booking-btn alg-bg-yellow alg-text-p mt-sm-0 mt-0 ">
                                          <div class="d-flex align-items-center justify-content-center">

                                                 <span class="d-sm-block d-none text-white alg-text-h3">My Booking</span>
                                          </div>

                                   </button> -->

                            <?php } ?>















                     </ul>
                     <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
                            <li class="nav-item mx-2">
                                   <?php
                                   if ($loggedUserData) { ?>


                                          <button class="btn alg-text-p profie-btn  mt-md-0 mt-sm-2 mb-sm-0 mb-3" onclick="redirecUSerProfile()">
                                                 <div class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-person  alg-text-yellow mx-1 d-md-none"></i>
                                                        <span class="d-md-block d-none ">
                                                               User Profile
                                                        </span>

                                                 </div>

                                          </button>
                                          <a href="./OrderTracker">
                                                 <button class="btn alg-text-p booking-btn-sign alg-bg-yellow  mt-md-0 mt-sm-2 mb-sm-0 mb-3">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                               <i class="bi bi-archive  text-white mx-1 d-md-none"></i>
                                                               <span class="d-md-block d-none  text-white">
                                                                      My Bookings
                                                               </span>

                                                        </div>

                                                 </button>
                                          </a>

                                          <button class="btn alg-text-p booking-btn-sign bg-danger  mt-md-0 mt-sm-2 mb-sm-0 mb-3 d-sm-inline d-none" onclick="logOut()">
                                                 <div class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-box-arrow-left  text-white mx-1 d-md-none"></i>
                                                        <span class="d-md-block d-none text-white">
                                                               Log Out
                                                        </span>

                                                 </div>

                                          </button>
                                          
                                   <?php
                                   } else {
                                   ?>
                                   
                                          <button class="btn alg-text-p sign-btn sign-btn alg-bg-light  mt-sm-0 mt-0" onclick="aiyo()">
                                                 <div class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-person d-sm-none alg-text-yellow d-sm-none"></i>

                                                        <span class="d-sm-block d-none">
                                                               Sign Up/Sign IN
                                                        </span>

                                                 </div>



                                          </button>

                                          <a href="./OrderTracker">
                                                 <button class="btn alg-text-p booking-btn-sign alg-bg-yellow  mt-md-0 mt-sm-2 mb-sm-0 mb-3">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                               <i class="bi bi-archive  text-white mx-1 d-md-none"></i>
                                                               <span class="d-md-block d-none  text-white">
                                                                      My Bookings
                                                               </span>

                                                        </div>

                                                 </button>
                                          </a>

                                   <?php } ?>

              </div>
              </li>

              </ul>
       </div>
       </div>
</nav>
<div class="container">
<div class="numbers mx-sm-5 d-flex align-items-center  justify-content-md-evenly justify-content-evenly mt-md-3 mt-3 flex-grow-1 ">
    <a href="./home" class="d-flex">
        <span class="alg-text-p step-number ">1</span>
        <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Travel Dates</span>

    </a>
    <a href="./selecrPackage" class="d-flex">
        <span class="alg-text-p step-number ">2</span>
        <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Parking Options</span>
    </a>
    
    <a href="./Details" class="d-flex">
        <span class="alg-text-p step-number ">3</span>
        <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Your Details</span>
    </a>
    <a href="./conformation" class="d-flex">
        <span class="alg-text-p step-number  alg-bg-yellow text-white">4</span>
        <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Confirmation</span>
    </a>

</div>
</div>


<div class="text-center mt-5">

    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
    </div>
    <h1 class=" alg-text-yellow">Success</h1>
    <p>Successfully Booked Your<br /> Parking Slot!</p>
</div>
<div class="text-center mt-3">

    <div class="d-flex flex-sm-row flex-column align-items-center justify-content-center">
        <a href="./home"><button class="btn btn-primary px-3 py-2">&larr;<span class="mx-3">Visit Home</span></button> </a>
        <a href="./OrderTracker">
            <button class="btn btn-primary alg-bg-dark alg-text-yellow px-3 py-2 mx-sm-4 mt-sm-0 mt-sm-0 mt-3 ">&larr;<span class="mx-3">My Bookings</span></button>
        </a>
    </div>




</div>
</div>