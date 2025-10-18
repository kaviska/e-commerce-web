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
                   logo

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
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2 alg-text-yellow alg-bolder">About Us</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2" >Our Services</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2" >FAQ’s</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link  alg-text-yellow alg-bolder mx-2">Contact Us</a>
                            </li>



                            <?php
                            if ($loggedUserData) { ?>

                                   <li class="nav-item d-lg-none d-inline">
                                          <a class="nav-link  alg-text-yellow alg-bolder mx-2" onclick="redirecUSerProfile()" style="cursor: pointer;">User Profile</a>
                                   </li>
                                   <li class="nav-item  d-lg-none d-inline">
                                          <a class="nav-link  alg-text-yellow alg-bolder mx-2" href="./OrderTracker" style="cursor: pointer;" style="cursor: pointer;">My Orders</a>
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
                                                                      My Orders
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
                                                                      My Orders
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




<!-- Modal HTML -->
<div id="myModal" class="modal fade">
       <div class="modal-dialog modal-login">
              <div class="modal-content">
                     <div class="modal-header">
                            <div class="avatar bg-white">
                                   <img src="../../resources/images/model.svg" alt="Avatar">
                            </div>
                            <h1 class="mt-3 alg-text-h1" id="headerLogin">Member Login</h1>
                            <h1 class="mt-3 alg-text-h1 d-none" id="headerRegister">Member Register</h1>
                            <h1 class="mt-3 alg-text-h1 d-none" id="headerFrogotPassword">Frogot Password</h1>


                            <span class="close " data-dismiss="modal" aria-hidden="true" id="signInClose" style="cursor: pointer;">
                                   <i class="bi bi-x-circle-fill"></i>
                            </span>
                     </div>
                     <div class="modal-body">
    <form>
        <!-- Sign In Fields -->
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Email" required="required" id="signinUserName">
            <small id="emailHelp1" class="form-text text-muted"></small>
        </div>
        <div class="form-group mt-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required" id="signinPassword">
            <small id="passwordHelp1" class="form-text text-muted"></small>
        </div>

        <!-- Sign Up Fields -->
        <div class="form-group">
            <input type="text" class="form-control d-none" name="username" placeholder="Email" required="required" id="signupUserName">
            <small id="emailHelp2" class="form-text text-muted"></small>
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control d-none" name="firstName" placeholder="First Name" required="required" id="signupFirstName">
            <small id="firstNameHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control d-none" name="lastName" placeholder="Last Name" required="required" id="signupLastName">
            <small id="lastNameHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group mt-3">
            <input type="tel" class="form-control d-none" name="mobile" placeholder="Mobile Number" required="required" id="signupMobile">
            <small id="mobileHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group mt-3">
            <input type="password" class="form-control d-none" name="password" placeholder="Password" required="required" id="signUpPassword">
        </div>
        <div class="form-group mt-3">
            <input type="password" class="form-control d-none" name="password" placeholder="Confirm password" required="required" id="cPassword">
            <small id="passwordHelp2" class="form-text text-danger"></small>
        </div>

        <!-- Forgot Password Fields -->
        <div class="form-group">
            <input type="text" class="form-control d-none" name="frogotPasswordEmail" placeholder="Current Email" required="required" id="frogotPasswordEmail">
            <small id="emailHelp1" class="form-text text-muted"></small>
        </div>
        <div class="form-group mt-3">
            <input type="password" class="form-control d-none" name="password" placeholder="New Password" required="required" id="frogotPassword">
            <small id="passwordHelp1" class="form-text text-muted"></small>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="px-2 py-2 border-0 text-white alg-bg-yellow mt-3 w-100 alg-text-p" id="signinSubmit">Login</button>
            <button type="submit" class="px-2 py-2 border-0 text-white alg-bg-yellow mt-3 w-100 alg-text-p d-none" id="signupSubmit">Register</button>
            <button type="submit" class="px-2 py-2 border-0 text-white alg-bg-yellow mt-3 w-100 alg-text-p d-none" id="frogotPasswordSubmit">Forgot Password</button>
        </div>
        <div class="text-center mt-3" id="bottomRegister">
            Not a member? <span class="signup alg-text-yellow" id="signup" style="cursor: pointer;">Register</span>
        </div>
        <div class="text-center mt-3 d-none" id="bottomSignin">
            Already have a account? <span class="signup alg-text-yellow" id="signin" style="cursor: pointer;">Sign In</span>
        </div>
    </form>
</div>
                     <div class="modal-footer" id="fogotPasswordBtn">
                            <a href="#">Forgot Password?</a>
                     </div>
              </div>
       </div>
</div>


<!-- toast massege -->

<div class="toast-container position-fixed bottom-0 end-0 p-3"></div>