<?php
require_once(__DIR__ . '/../../../backend/model/SessionManager.php');
$loggedUserData = null;
$access = new SessionManager();
if ($access->isLoggedIn()) {
    $loggedUserData = $access->getUserId();
}
?>
<section class="step1">
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
        <div class="numbers d-flex align-items-center mx-sm-5  justify-content-md-evenly justify-content-evenly mt-md-3 mt-3 flex-grow-1 ">
            <a href="./home" class="d-flex">
                <span class="alg-text-p step-number">1</span>
                <span class="alg-text-p d-lg-inline d-none mx-2 mt-1">Travel Dates</span>

            </a>
            <a href="./selecrPackage" class="d-flex">
                <span class="alg-text-p step-number  alg-bg-yellow text-white">2</span>
                <span class="alg-text-p d-lg-inline d-none  mx-2 mt-1">Parking Options</span>
            </a>

            <a href="" class="d-flex">
                <span class="alg-text-p step-number text-center">3</span>
                <span class="alg-text-p d-lg-inline d-none  mx-2 mt-1">Your Details</span>
            </a>
            <a href="" class="d-flex">
                <span class="alg-text-p step-number">4</span>
                <span class="alg-text-p d-lg-inline d-none  mx-2 mt-1">Confirmation</span>
            </a>

        </div>

    </div>

    <div class="bill-section mt-4">
        <div class="container-md container-fluid px-md-3 px-0 py-5 d-md-block d-flex flex-column justify-content-center">
            <h3 class="alg-text-h3 alg-bold text-md-start text-center">Booking Summary</h3>
            <div class="d-flex flex-md-row flex-column justify-content-between">
                <div>
                    <div class="d-flex justify-content-md-start justify-content-center align-items-center mx-md-0  mt-md-0 mt-2">
                        <table>
                            <tr class=" alg-text-yellow">
                                <td class="">ENTRY DATE</td>
                                <td class="px-5">ARRIVAL TIME</td>

                            </tr>

                            <tr class="mt-5">
                                <td class="" id="enteryDDispaly"></td>
                                <td class="px-5" id="entryTDisplay"></td>

                            </tr>
                            <tr class="alg-text-yellow">
                                <td class="">EXIT DATE</td>
                                <td class="px-5">EXIT TIME</td>

                            </tr>
                            <tr>
                                <td class="" id="exitDDisplay"></td>
                                <td class="px-5" id="exitTDisplay"></td>

                            </tr>
                        </table>
                    </div>
                    <div class="mt-3 text-white text-md-start text-center">
                        <span class="alg-text-p close-btn" id="editDetails"><i class="bi bi-pen-fill mx-1"></i>Edit Booking Details</span>
                    </div>
                </div>

                <div class="align-self-center d-md-flex text-md-start text-center mt-md-0 mt-4">
                    <div>
                        <h3 class="alg-text-h2 alg-bolder">Total <span id="finalAmount">0.00</span>&pound;</h3>
                        <span class="alg-text-yellow alg-text-p" id="editBookingDetails" style="cursor: pointer;"><i class="bi bi-arrow-down mx-1" id="arrowIcon"></i>View/Edit Order Detail</span>
                    </div>
                    <div class="mx-sm-5 mx-1  mt-md-0 mt-3">
                        <a onclick="procedToCheckOutHandler()">
                            <span class="alg-text-p  p-btn text-white" style="cursor: pointer;">Proceed To Your Details<i class="bi bi-arrow-right mx-1 d-sm-inline d-none"></i></span>

                        </a>

                    </div>
                </div>

            </div>

            <div class="d-none mt-3" id="editSection">
                <div class="row mt-3 text-center ">
                    <div class="col-lg-6">
                        <span class="alg-text-p">When would you like to park</span><br>
                        <input type="date" name="" id="dateStart" class="mt-2">
                        <input type="time" name="" id="timeStart" class="mt-2">
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-2">
                        <span class="alg-text-p">When would you like to exit</span>
                        <br>
                        <input type="date" name="" id="dateEnd" class="mt-2">
                        <input type="time" name="" id="TimeEnd" class="mt-2">

                    </div>

                </div>
                <div class=" text-center mt-4">
                    <button class="btn  alg-text-p  park-btn text-white" id="homeBtn">
                        Adjust Parking
                    </button>
                </div>

            </div>

        </div>

    </div>
    <div class="container-sm container-fluid">
        <div class="packege-section mt-5 mb-3">
            <div class="d-md-flex justify-content-between px-5">
                <div>









                    <h2 class="alg-text-h2 text-center mb-5">Proffesional Meet & Greet Service </h2>

                    <div id="cardContainer" class="d-flex">
                    </div>
                </div>

                <div class="mt-md-0 mt-5 " >
                    <div class="text-center mb-4">
                        <h2 class="alg-text-h2">Proffesional Meet & Greet Service  <br>+<span class="text-center">Valet Service</span></h2>

                    </div>
                    <div class="card-two mx-sm-5 d-flex flex-column" >
                    <input type="checkbox" name="" id="valetCheckBox" class="text-start tick-two valet-tick">
                    <h3 class="text-center alg-text-h1 alg-bolder mx-5 heading-ups" > <span class="d-sm-inline d-none">Basic + </span>Valet <br>&pound;<span id="priceValet">00.00</span></h3>
                
                          
                          
                      

                        <div>
                        <div class=" d-sm-flex text-sm-start text-center">
                            <div class="mx-4 mt-5">
                                <div>
                                    <label for="selexcrt" class="alg-text-p alg-text-yellow alg-bold">Valet Packages</label>

                                </div>
                                <div>
                                    <select class="custom-select alg-text-p px-4 py-2" id="selectType">
                                        <option selected value="Full Valet">Full Valet</option>
                                        <option value="Interior Valet">Interior Valet</option>
                                        <option value="Exterior Valet">Exterior Valet</option>

                                        <option value="Wash">Wash</option>
                                        <option value="Vac">Vac</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mx-4 mt-5">
                                <div>
                                    <label for="selexcrt" class="alg-text-p alg-text-yellow alg-bold">Valet Packages</label>

                                </div>
                                <div>
                                    <select class="custom-select alg-text-p vpx-4 px-4 py-2" id="selectVechle">
                                        <option selected value="Car">Car</option>
                                        <option value="4X4/MPV">4X4/MPV</option>

                                    </select>
                                </div>

                            </div>



                        </div>
                     
                    
                        <div class="btn-section d-flex justify-content-center align-self-end mb-sm-0  mb-3">
             
             <button class="btn alg-bg-dark alg-text-yellow alg-text-p more-info-btns mx-2" id="serviceBtn" style="margin-top: 61.5%;">Our Services</button>              </div>
         </div>
                        
                        </div>

                       
                      
                    </div>











                 


                </div>
            </div>

        </div>
        <div class="text-center my-4">
            <a class="text-center" onclick="procedToCheckOutHandler()">
                <span class="alg-text-p  p-btn text-white" style="cursor: pointer;">Proceed To Your Details<i class="bi bi-arrow-right mx-1 d-sm-inline d-none"></i></span>

            </a>
        </div>
    </div>




</section>
<!-- <textarea name=""  cols="30" rows="10" id="exampletext"></textarea>
<button id="btn">click here</button> -->

<div class="toast-container position-fixed bottom-0 end-0 p-3"></div>



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
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Email" required="required" id="signinUserName">
                        <small id="emailHelp1" class="form-text text-muted"></small>

                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" id="signinPassword">
                        <small id="passwordHelp1" class="form-text text-muted"></small>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control d-none" name="username" placeholder="Email" required="required" id="signupUserName">
                        <small id="emailHelp2" class="form-text text-muted"></small>

                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control d-none" name="password" placeholder="Password" required="required" id="signUpPassword">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control d-none" name="password" placeholder="Confirm password" required="required" id="cPassword">
                        <small id="passwordHelp2" class="form-text text-danger"></small>

                    </div>
                    <!-- froget passowrd -->
                    <div class="form-group">
                        <input type="text" class="form-control  d-none" name="frogotPasswordEmail" placeholder="Current Email" required="required" id="frogotPasswordEmail">
                        <small id="emailHelp1" class="form-text text-muted"></small>

                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control  d-none" name="password" placeholder="New Password" required="required" id="frogotPassword">
                        <small id="passwordHelp1" class="form-text text-muted"></small>

                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="px-2 py-2 border-0 text-white  alg-bg-yellow   mt-3 w-100 alg-text-p" id="signinSubmit">Login</button>
                        <button type="submit" class="px-2 py-2 border-0 text-white  alg-bg-yellow mt-3 w-100 alg-text-p d-none" id="signupSubmit">Register</button>
                        <button type="submit" class="px-2 py-2 border-0 text-white  alg-bg-yellow mt-3 w-100 alg-text-p d-none" id="frogotPasswordSubmit">Forgot Password</button>


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