<?php
require_once(__DIR__ . '/../../../backend/model/SessionManager.php');
$loggedUserData = null;
$access = new SessionManager();
if ($access->isLoggedIn()) {
    $loggedUserData = $access->getUserId();
}
?>
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-md-row flex-column">
        <div class="flex-grow-2">
            <a href="/home">
            <img src="../../resources/images/mgl_g5.svg" alt="" srcset="" class="logos mt-4">
            </a>
        </div>
        <div class="numbers  d-flex align-items-center  justify-content-md-evenly justify-content-evenly mt-md-3 mt-3 flex-grow-1 ">
            <a href="./home" class="d-flex">
                <span class="alg-text-p step-number ">1</span>
                <span class="alg-text-p d-lg-inline d-none mx-2 mt-1">Travel Dates</span>

            </a>
            <a href="./step1" class="d-flex">
                <span class="alg-text-p step-number  ">2</span>
                <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Parking Options</span>
            </a>
           
            <a href="" class="d-flex">
                <span class="alg-text-p step-number ">3</span>
                <span class="alg-text-p d-lg-inline d-none mx-2 mt-1">Your Details</span>
            </a>
            <a href="" class="d-flex">
                <span class="alg-text-p step-number ">4</span>
                <span class="alg-text-p d-lg-inline mx-2 mt-1 d-none">Confirmation</span>
            </a>

        </div>
        <div class="profile d-md-flex align-items-center d-none mt-3">
            <?php
            if ($loggedUserData) { ?>

                <button class="btn alg-text-p sign-btn-step mx-1" onclick="redirecUSerProfile()">
                    <span class="d-md-block d-none">
                        My Profile
                    </span>
                    <i class="bi bi-person d-md-none"></i>
                    <a href="./OrderTracker">
                        <button class="btn booking-btn-step alg-bg-yellow alg-text-p ">
                            <span class="d-md-block d-none text-white">My Booking</span>
                            <i class="bi bi-archive d-md-none"></i>
                        </button>
                    </a>

                </button>
                <button class="btn alg-text-p sign-btn-step bg-danger text-white d-sm-inline d-none" onclick="logOut()" style="border: none;">
                    <span class="d-md-block d-none">
                        Log Out
                    </span>
                    <i class="bi bi-box-arrow-left d-md-none"></i>
                </button>

            <?php
            } else {
            ?> <button class="alg-text-p sign-btn-step mx-1" id="signinBtn">
                    <span class="d-md-block d-none">
                        Sign Up/Sign IN
                    </span>
                    <i class="bi bi-person d-md-none"></i>
                </button>
                <a href="./OrderTracker">
                    <button class=" booking-btn-step alg-bg-yellow alg-text-p">
                        <span class="d-md-block d-none text-white">My Booking</span>
                        <i class="bi bi-archive d-md-none"></i>
                    </button>
                </a>

            <?php } ?>

        </div>
    </div>
</div>


<div class="bill-section mt-4">
    <div class=" container-sm container-fluid d-md-flex justify-content-md-between py-md-0 py-5">
        <div class=" px-sm-3 px-0 py-5 d-md-block d-flex flex-column justify-content-center">
            <h3 class="alg-text-h3 alg-bold text-md-start text-center">Booking Summary</h3>
            <div class="d-flex justify-content-md-start justify-content-center align-items-center mx-md-0 mx-0 mt-md-0 mt-2">
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
            <div class="mt-md-3 mt-3 text-white text-md-start text-center">
                <span class="alg-text-p close-btn" id="editDetails"><i class="bi bi-pen-fill mx-1"></i>Edit Booking Details</span>
            </div>

        </div>
        <div class="align-self-center d-md-flex text-md-start text-center">
            <div>
                <h3 class="alg-text-h2 alg-bolder">Total <span id="finalAmount"></span>&pound;</h3>
                <span class="alg-text-yellow alg-text-p" id="editBookingDetails" style="cursor: pointer;"><i class="bi bi-arrow-down mx-1" id="arrowIcon"></i>View/Edit Order Detaile</span>
            </div>
            <div class="mx-sm-5 mx-1  mt-md-0 mt-3">
                <a href="./step3">
                    <span class="alg-text-p  p-btn text-white" style="cursor: pointer;">Proceed To Your Details<i class="bi bi-arrow-right mx-1 d-sm-inline d-none"></i></span>

                </a>

            </div>
        </div>

    </div>

    <div class="container-sm container-fluid d-none py-3 alg-text-p" id="editsection">
        <div class="row">
            <div class="col-3">
                Package Name <br><span id="packageName"></span>
            </div>
            <div class="col-3">Arrive
                <br><span id="arrive" id="arrive"></span>
            </div>
            <div class="col-3">Exit
                <br><span id="exit"></span>
            </div>
            <div class="col-3">
                <br><button id="cancelBtn" class="cancel" style="margin-top: -190px;">cancel</button>
            </div>

        </div>








    </div>
    <div class=" d-none mt-3" id="editSection">
        <div class="row mt-3 text-center">
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
        <div class=" text-center ">
            <button class="btn adjust-btn mt-4 mb-4 alg-text-p park-btn text-white" id="homeBtn">
                Adjust Parking
            </button>
        </div>

    </div>
</div>





<section class="step-2 mt-3 mb-5 container-fluid ">
    <div class="row mx-sm-5 mx-0">
        <div class="col-lg-7 p-3">
            <h1 class="alg-text-h1 text-lg-start text-center">Our Valet Services Tailored to You</h1>
            <hr style="color:var(--yellow)">
            <p class="alg-text-p text-lg-start text-center mt-lg-0 my-4">Experience peace of mind during your travels with our valet service! Let us take care of your car with expert care and attention while you're away. Say goodbye to parking worries and hello to worry-free journeys. service. Your car is in safe hands with us!"
            </p>
            <div class="d-lg-flex image-container mt-lg-4  step-2left">

                <div class="image d-sm-block d-none">
                    <div class="text-lg-start text-center">
                        <img src="../../resources/images/step2.png" alt="" srcset="" class="step-2-img">

                    </div>
                    <div class="text-content text-white">
                        <h2 class="alg-text-h1 alg-bolder">Full Valet</h2>
                        <div class="d-flex flex-column mx-2">
                            <span>-Interior Valet (Includes Free Wash!)</span>
                            <span>-Interior Valet (Includes Free Wash!)</span>
                            <span>-Interior Valet (Includes Free Wash!)</span>
                            <span>-Interior Valet (Includes Free Wash!)</span>

                        </div>



                    </div>

                </div>
                <div class="mx-3 mt-3 alg-text-p text-center mt-lg-3 mt-4">
                    <span>Unlock Premium Parking: Choose Full Valet for the Ultimate Experience</span><br class="d-lg-none">
                    <button class="valet-add-left alg-bg-yellow alg-text-p text-white py-2 px-3 mt-4  text-center" onclick="valetHandlerFull()"><i class="bi bi-plus-lg mx-2"></i>Add Full Valet</button>
                </div>
            </div>

        </div>
        <div class="col-lg-5  step-2left">
            <div class=" d-sm-flex text-sm-start text-center mt-5 mx-5">
                <div>
                    <label for="selexcrt" class="alg-text-p">Valet Packages</label>
                    <select class="custom-select alg-text-p px-4 py-2" id="selectType">
                        <option selected value="Full Valet">Full Valet</option>
                        <option value="Interior Valet">Interior Valet</option>
                        <option value="Exterior Valet">Exterior Valet</option>

                        <option value="Wash">Wash</option>
                        <option value="Vac">Vac</option>
                    </select>
                </div>

                <div class="mx-sm-5 mt-sm-0 mt-3" >
                    <label for="selexcrt" class="alg-text-p">Valet Packages</label>
                    <select class="custom-select alg-text-p vpx-4 px-4 py-2" id="selectVechle">
                        <option selected value="Car">Car</option>
                        <option value="4X4/MPV">4X4/MPV</option>

                    </select>
                </div>
            </div>
            <div class="text-center mt-5">
                <h3 class="text-center alg-text-h2">Total</h3>
                <h3 class="alg-bolder"><span id="priceValet">00.00</span>&pound;
                </h3>
                <button class="valet-add-left alg-bg-yellow alg-text-p text-white py-2 px-2" onclick="valetHandler()"><i class="bi bi-plus-lg mx-2"></i>Add To Package</button>

            </div>

        </div>
    </div>
</section>












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


<!-- toast massege -->

<div class="toast-container position-fixed bottom-0 end-0 p-3"></div>