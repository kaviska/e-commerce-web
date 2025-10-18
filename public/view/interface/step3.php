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
    <div class="numbers d-flex align-items-center mx-sm-5  justify-content-md-evenly justify-content-evenly mt-md-3 mt-3 flex-grow-1 ">
            <a href="./home" class="d-flex">
                <span class="alg-text-p step-number">1</span>
                <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Travel Dates</span>

            </a>
            <a href="./selecrPackage" class="d-flex">
                <span class="alg-text-p step-number ">2</span>
                <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Parking Options</span>
            </a>
           
            <a href="" class="d-flex">
                <span class="alg-text-p step-number  alg-bg-yellow text-white">3</span>
                <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Your Details</span>
            </a>
            <a href="" class="d-flex">
                <span class="alg-text-p step-number ">4</span>
                <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Confirmation</span>
            </a>

        </div>

    </div>

   



<section class="detailes-section my-5">
    <div class="container">
        <h1 class="alg-text-h1 alg-bolder"> Fill in your personal details to complete your booking </h1>
        <div class="row">
            <div class="col-md-7 mt-4">






















                <!-- if usern not login -->
                <?php
                if ($loggedUserData) { ?>

                    <div class="details-section">
                        <div class="pt-4 pb-5 px-sm-5 px-2 ">
                            <h3 class="alg-text-h2 alg-bold "><span class="mx-2 mt-5"></span>About You</h3>
                            <hr>
                            <div class="form-group mt-2">
                                <label class="alg-text-p">Title
                                    <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                </label>
                                <select class="form-select alg-text-p" aria-label="Select Title" style="border-radius: 0;" id="title">

                                    <option value="2" selected>Mr</option>
                                    <option value="3">Miss</option>
                                    <option value="4">Mrs</option>
                                    <option value="5">Ms</option>
                                    <option value="5">Dr</option>

                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label class="alg-text-p">First Name
                                    <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                </label>
                                <input type="text" id="fistName" class="form-control alg-text-p" aria-describedby="Fist name" style="border-radius: 0px;">
                            </div>

                            <div class="form-group mt-3">
                                <label class="alg-text-p">Last Name
                                    <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                </label>
                                <input type="text" id="lastName" class="form-control alg-text-p" aria-describedby="Last name" style="border-radius: 0px;">
                            </div>


                            <div class="form-group mt-3">
                                <label class="alg-text-p">Telephone Number
                                    <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                </label>
                                <input type="phone" id="telephone" class="form-control alg-text-p" aria-describedby="Telephone" style="border-radius: 0px;">
                            </div>

                            <div class="form-group mt-3">
                                <label class="alg-text-p">Postcode
                                    <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                </label>
                                <input type="phone" id="postalCode" class="form-control alg-text-p" aria-describedby="Postal" style="border-radius: 0px;">
                            </div>



                        </div>


                    <?php
                } else {
                    ?>

                        <div class="details-section mb-5">
                            <div class="pt-4 px-5 ">
                                <p class=" ">
                                    <span class="text-muted">Returning Customer?</span>
                                    <span class="text-decoration-underline" style="cursor: pointer;" onclick="madfun()">Log In Here</span>
                                </p>
                                <hr>
                            </div>
                        </div>

                        <div class="details-section">
                            <div class="pt-4 pb-5 px-sm-5 px-2 ">
                                <h3 class="alg-text-h2 alg-bold "><span class="mx-2 mt-5"></span>About You</h3>
                                <hr>
                                <div class="form-group mt-2">
                                    <label class="alg-text-p">Title
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <select class="form-select alg-text-p" aria-label="Select Title" style="border-radius: 0;" id="titleLogin">

                                        <option value="2" selected>Mr</option>
                                        <option value="3">Miss</option>
                                        <option value="4">Mrs</option>
                                        <option value="5">Ms</option>
                                        <option value="5">Dr</option>

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Email
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="text" id="emailLogin" class="form-control alg-text-p" aria-describedby="Fist name" style="border-radius: 0px;">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="alg-text-p">First Name
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="text" id="fistNameLogin" class="form-control alg-text-p" aria-describedby="Fist name" style="border-radius: 0px;">
                                </div>

                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Last Name
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="text" id="lastNameLogin" class="form-control alg-text-p" aria-describedby="Last name" style="border-radius: 0px;">
                                </div>


                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Telephone Number
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="phone" id="telephoneLogin" class="form-control alg-text-p" aria-describedby="Telephone" style="border-radius: 0px;">
                                </div>

                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Postcode
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="phone" id="postalCodeLogin" class="form-control alg-text-p" aria-describedby="Postal" style="border-radius: 0px;">
                                </div>

                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Password
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="text" id="passwordLogin" class="form-control alg-text-p" oninput="validatePassword()" aria-describedby="Fist name" style="border-radius: 0px;">
                                    <!-- <div id="password-requirements">
                                        <p id="length" class="invalid">8-20 characters</p>
                                        <p id="uppercase" class="invalid">At least one uppercase letter</p>
                                        <p id="lowercase" class="invalid">At least one lowercase letter</p>
                                        <p id="number" class="invalid">At least one number</p>
                                        <p id="special" class="invalid">At least one special character</p>
                                    </div> -->
                                    <small id="passwordError" class="text-danger"></small>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Confirm Password
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="text" id="cPasswordLogin" class="form-control alg-text-p" aria-describedby="Fist name" style="border-radius: 0px;">
                                </div>

                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label alg-text-p" for="flexCheckChecked">
                                        Create Account
                                    </label>
                                </div>


                            </div>


                        <?php } ?>






                        </div>

                        <hr class=" alg-text-yellow alg-bolder">
                        <div class="details-section">
                            <div class="pt-4 pb-5 px-sm-5 px-2">
                                <h3 class="alg-text-h2 alg-bold "><span class="mx-2 mt-5"></span>Travel Details</h3>
                                <hr>
                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Vehicle Registration
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="text" id="registerNumber" class="form-control alg-text-p" aria-describedby="Vechialregistation" style="border-radius: 0px;">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Flight Number
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <input type="text" id="flightNumber" class="form-control alg-text-p" aria-describedby="flightNumber" style="border-radius: 0px;">
                                </div>


                                <div class="form-group mt-3">
                                    <label class="alg-text-p">Air Line
                                        <i class="bi bi-asterisk star-icon alg-text-yellow"></i>
                                    </label>
                                    <select class="form-select alg-text-p" id="airline" aria-label="Select Title" style="border-radius: 0;">

                                        <option value="1" selected>Jet2.com</option>
                                        <option value="2">Ryanair</option>
                                        <option value="3">Wizz Air</option>
                                        <option value="3">Other</option>


                                    </select>
                                </div>

                                <div class="form-group mt-3 alg-text-p">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Lesiure
                                    </label>
                                    <input class="form-check-input border-5" type="radio" name="flexRadioDefault" id="lesiure" value="1">


                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Business
                                    </label>
                                    <input class="form-check-input border-5" type="radio" name="flexRadioDefault" id="business" value="2">

                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label alg-text-p" for="flexCheckChecked">
                                    I agree to terms & condtions
                                    </label>
                                </div>

                            </div>





                        </div>

                    </div>
                    <div class="col-lg-4 col-md-5 fixed-section order-md-last order-first  ">
                        <h3 class="alg-text-h1 mt-5 text-center mb-3 alg-bolder ">
                            Summary
                        </h3>
                        <div class="billing-details mx-lg-5 mx-md-2 mx-0 pt-3">
                            <div class="row mx-lg-3 mx-3  ">
                                <h3 class="col-4 alg-text-p alg-bolder" id="packageName"></h3>
                                <h3 class="col-4 alg-text-p alg-bolder"><span id="packagePrice"></span> &pound;</h3>
                                <a href="./step1" class="col-4">

                                    <button class="text-end text-end  final-edit  px-2 alg-text-p alg-text-yellow"><i class="mx-1 bi bi-pen-fill"></i>Edit</button>
                                </a>
                            </div>
                            <div class=" d-md-block d-flex justify-content-center align-items-center">
                                <table class="m-3">
                                    <tr class="">
                                        <td class="alg-text-yellow">ARRIVAL DATE</td>
                                        <td class="px-5 alg-text-yellow">ARRIVAL TIME</td>

                                    </tr>

                                    <tr>
                                        <td class="alg-bold" id="entiyDate"></td>
                                        <td class="px-5 alg-bold" id="entryTime"></td>

                                    </tr>
                                    <tr class="">
                                        <td class="alg-text-yellow">EXIT DATE</td>
                                        <td class="px-5 alg-text-yellow">EXIT TIME</td>

                                    </tr>
                                    <tr>
                                        <td class="alg-bold" id="exitDate"></td>
                                        <td class="px-5 alg-bold" id="exitTime"></td>

                                    </tr>
                                </table>
                            </div>



                            <table class="mt-3 mx-lg-3 mx-4 " id="valletSection">

                                <div class="row">
                                    <div class="col-4">
                                        <td class="alg-bold" id="valetName"></td>

                                    </div>
                                    <div class="col-4">
                                        <td class="px-5 alg-bold"><span id="valetPrice"></span> &pound;</td>

                                    </div>
                                    <div class="col-4">
                                        <td> <a href="./step1"> <button class="text-end text-end  final-edit  px-2 alg-text-p alg-text-yellow"><i class="mx-1 bi bi-pen-fill"></i>Edit</button> </a>

                                        </td>
                                    </div>

                                </div>




                            </table>
                            <span class="btn conform-btn py-3">Total <span id="total"></span>&pound;</span>

                            <?php
                            if ($loggedUserData) { ?>

                                <button class="checkOut-btn py-3 text-white mt-4 text-center" id="paymentProcessBtn">Checkout</button>


                            <?php
                            } else {
                            ?>
                                <button class="checkOut-btn py-3 text-white mt-4 text-center" onclick="processedToPaymentWithoutLogin()">Checkout</button>

                            <?php } ?>






                        </div>


                    </div>
            </div>




            <?php
                            if ($loggedUserData) { ?>

                                <button class="checkOut-btn d-sm-none d-inline py-3 text-white mt-4 text-center" id="paymentProcessBtn">Checkout</button>


                            <?php
                            } else {
                            ?>
                                <button class="checkOut-btn py-3  d-sm-none d-inline text-white mt-4 text-center" onclick="processedToPaymentWithoutLogin()">Checkout</button>

                            <?php } ?>


        </div>

</section>


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