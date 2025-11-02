<?php
require_once(__DIR__ . '/../../../backend/model/SessionManager.php');
$loggedUserData = null;
$access = new SessionManager();
if ($access->isLoggedIn()) {
       $loggedUserData = $access->getUserId();
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
       <div class="container">
              <a href="./home" class="navbar-brand d-flex align-items-center">
                     <i class="bi bi-shop-window text-primary me-2" style="font-size: 28px;"></i>
                     <span class="fw-bold text-primary d-none d-md-block" style="font-size: 22px;">Our Store</span>
              </a>
              
              <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                     <ul class="navbar-nav ms-auto align-items-lg-center">
                            <li class="nav-item">
                                   <a class="nav-link fw-semibold px-3 nav-link-custom" href="./">Home</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link fw-semibold px-3 nav-link-custom" href="#about">About Us</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link fw-semibold px-3 nav-link-custom" href="#services">Our Services</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link fw-semibold px-3 nav-link-custom" href="#faq">FAQ's</a>
                            </li>
                            <li class="nav-item">
                                   <a class="nav-link fw-semibold px-3 nav-link-custom" href="#contact">Contact Us</a>
                            </li>

                            <?php if ($loggedUserData) { ?>
                                   <!-- Mobile User Menu -->
                                   <li class="nav-item d-lg-none">
                                          <a class="nav-link fw-semibold px-3 nav-link-custom" onclick="redirecUSerProfile()" style="cursor: pointer;">
                                                 <i class="bi bi-person-circle me-1"></i> User Profile
                                          </a>
                                   </li>
                                   <li class="nav-item d-lg-none">
                                          <a class="nav-link fw-semibold px-3 nav-link-custom" href="./OrderTracker">
                                                 <i class="bi bi-bag-check me-1"></i> My Orders
                                          </a>
                                   </li>
                                   <li class="nav-item d-lg-none">
                                          <a class="nav-link fw-semibold px-3 nav-link-custom text-danger" onclick="logOut()" style="cursor: pointer;">
                                                 <i class="bi bi-box-arrow-right me-1"></i> Log Out
                                          </a>
                                   </li>
                            <?php } else { ?>
                                   <!-- Mobile Sign In -->
                                   <li class="nav-item d-lg-none">
                                          <a class="nav-link fw-semibold px-3 nav-link-custom" id="signinBtn" style="cursor: pointer;">
                                                 <i class="bi bi-person-circle me-1"></i> Sign Up/Sign In
                                          </a>
                                   </li>
                            <?php } ?>
                     </ul>

                     <!-- Desktop Action Buttons -->
                     <ul class="navbar-nav ms-3 d-none d-lg-flex align-items-center">
                            <?php if ($loggedUserData) { ?>
                                   <li class="nav-item me-2">
                                          <button class="btn btn-outline-primary btn-sm px-3 py-2" onclick="redirecUSerProfile()">
                                                 <i class="bi bi-person-circle me-1"></i>
                                                 <span>Profile</span>
                                          </button>
                                   </li>
                                   <li class="nav-item me-2">
                                          <a href="./OrderTracker">
                                                 <button class="btn btn-primary btn-sm px-3 py-2">
                                                        <i class="bi bi-bag-check me-1"></i>
                                                        <span>My Orders</span>
                                                 </button>
                                          </a>
                                   </li>
                                   <li class="nav-item">
                                          <button class="btn btn-danger btn-sm px-3 py-2" onclick="logOut()">
                                                 <i class="bi bi-box-arrow-right me-1"></i>
                                                 <span>Logout</span>
                                          </button>
                                   </li>
                            <?php } else { ?>
                                   <li class="nav-item me-2">
                                          <button class="btn btn-primary btn-sm px-4 py-2" onclick="aiyo()">
                                                 <i class="bi bi-person-plus me-1"></i>
                                                 <span>Sign Up/Sign In</span>
                                          </button>
                                   </li>
                                   <li class="nav-item">
                                          <a href="./OrderTracker">
                                                 <button class="btn btn-outline-primary btn-sm px-3 py-2">
                                                        <i class="bi bi-bag-check me-1"></i>
                                                        <span>Track Order</span>
                                                 </button>
                                          </a>
                                   </li>
                            <?php } ?>
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

<style>
/* Navbar Custom Styles */
.navbar {
       padding: 1rem 0;
       transition: all 0.3s ease;
}

.navbar-brand {
       font-size: 24px;
       transition: all 0.3s ease;
}

.navbar-brand:hover {
       transform: scale(1.05);
}

.text-primary {
       color: #667eea !important;
}

.nav-link-custom {
       color: #2c3e50;
       font-size: 15px;
       position: relative;
       transition: all 0.3s ease;
}

.nav-link-custom::after {
       content: '';
       position: absolute;
       bottom: 0;
       left: 50%;
       width: 0;
       height: 2px;
       background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
       transition: all 0.3s ease;
       transform: translateX(-50%);
}

.nav-link-custom:hover {
       color: #667eea;
}

.nav-link-custom:hover::after {
       width: 80%;
}

.btn-primary {
       background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
       border: none;
       transition: all 0.3s ease;
}

.btn-primary:hover {
       background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
       transform: translateY(-2px);
       box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.btn-outline-primary {
       color: #667eea;
       border-color: #667eea;
       transition: all 0.3s ease;
}

.btn-outline-primary:hover {
       background: #667eea;
       border-color: #667eea;
       color: #fff;
       transform: translateY(-2px);
       box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.btn-danger {
       background: linear-gradient(135deg, #FF6B6B 0%, #ee5a6f 100%);
       border: none;
       transition: all 0.3s ease;
}

.btn-danger:hover {
       background: linear-gradient(135deg, #ee5a6f 0%, #FF6B6B 100%);
       transform: translateY(-2px);
       box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
}

.navbar .btn {
       font-size: 14px;
       font-weight: 600;
       white-space: nowrap;
}

.navbar .btn i {
       font-size: 16px;
}

/* Mobile Styles */
@media (max-width: 991px) {
       .navbar-collapse {
              background: #fff;
              padding: 20px;
              margin-top: 15px;
              border-radius: 8px;
              box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
       }
       
       .nav-item {
              margin: 8px 0;
       }
       
       .nav-link-custom {
              padding: 10px 15px !important;
              border-radius: 8px;
              transition: all 0.3s ease;
       }
       
       .nav-link-custom:hover {
              background: rgba(102, 126, 234, 0.1);
       }
       
       .nav-link-custom::after {
              display: none;
       }
}
</style>
