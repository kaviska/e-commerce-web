<?php
require_once(__DIR__ . '/../../../backend/model/SessionManager.php');
$loggedUserData = null;
$access = new SessionManager();

if ($access->isLoggedIn()) {
  $loggedUserData = $access->getUserId();
  if ($loggedUserData >= 1 && $loggedUserData <= 1000) {
  } else {
    // The number is not between 1 and 1000
    echo "You are Not Admin";
    exit();
  }
} else {
  echo ("please Log in");
  exit();
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar With Bootstrap</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script defer src="../../js/main.js"></script>
  <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

  <script defer src="../../js/adminHome.js"></script>
</head>
<style>
  a {
    text-decoration: none;
  }

  li {
    list-style: none;
  }

  body {
    font-family: 'Poppins', sans-serif;
  }

  .wrapper {
    display: flex;
  }

  table {
    font-size: 13px;
  }

  .main {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    background-color: #fff;
    min-width: 0;
  }

  #sidebar {
    width: 70px;
    min-width: 70px;
    z-index: 1000;
    transition: all .25s ease-in-out;
    background-color: #0e2238;
    display: flex;
    flex-direction: column;
  }

  #sidebar.expand {
    width: 260px;
    min-width: 260px;
  }

  .toggle-btn {
    background-color: transparent;
    cursor: pointer;
    border: 0;
    padding: 1rem 1.5rem;
  }

  .toggle-btn i {
    font-size: 1.5rem;
    color: #FFF;
  }

  .sidebar-logo {
    margin: auto 0;
  }

  .sidebar-logo a {
    color: #FFF;
    font-size: 1.15rem;
    font-weight: 600;
  }



  #sidebar:not(.expand) .sidebar-logo,
  #sidebar:not(.expand) a.sidebar-link span {
    display: none;
  }

  #sidebar.expand .sidebar-logo,
  #sidebar.expand a.sidebar-link span {
    animation: fadeIn .25s ease;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  .sidebar-nav {
    padding: 2rem 0;
    flex: 1 1 auto;
  }

  a.sidebar-link {
    padding: .625rem 1.625rem;
    color: #FFF;
    display: block;
    font-size: 0.9rem;
    white-space: nowrap;
    border-left: 3px solid transparent;
  }

  .sidebar-link i,
  .dropdown-item i {
    font-size: 1.1rem;
    margin-right: .75rem;
  }

  a.sidebar-link:hover {
    background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;
  }

  .sidebar-item {
    position: relative;
  }

  #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
    position: absolute;
    top: 0;
    left: 70px;
    background-color: #0e2238;
    padding: 0;
    min-width: 15rem;
    display: none;
  }

  #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
    display: block;
    max-height: 15em;
    width: 100%;
    opacity: 1;
  }

  #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
  }

  #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
  }

  .navbar {
    background-color: #f5f5f5;
    box-shadow: 0 0 2rem 0 rgba(33, 37, 41, .1);
    max-height: 80px;
  }

  .navbar-expand .navbar-collapse {
    min-width: 200px;
  }

  .avatar {

    width: 130px;
    height: 80px;
  }

  .middleNumber {
    font-size: 50px;
  }

  .genarate-submit {
    background-color: #0930DE;
    border-radius: 5px;
    width: 300px;
  }

  #arrowIcon {
    cursor: pointer;
  }


  @media (min-width: 768px) {}
</style>

<body>
  <div class="wrapper">
    <aside id="sidebar">
      <div class="d-flex">
        <button class="toggle-btn" type="button">
          <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo" id="navBarHomeBtn">
          <a href="#">Admin</a>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
            <i class="bi bi-person"></i>
            <span>Admin And Users</span>
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="viewAdminBtn">Admin</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="viewProfileBtn">User</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
            <i class="bi bi-box2"></i>
            <span>Packages</span>
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="packageAddBtn"> Add Package</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="packageLoadBtn"> All Packages
              </a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="packageEditBrn"> Edit Packages
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
            <i class="bi bi-bullseye"></i>
            <span>Valet</span>
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="ValetLoadBtn">Update Valet Prices</a>
            </li>

          </ul>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
            <i class="lni lni-protection"></i>
            <span>Orders</span>
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="activeOrdersBtn">Active Orders</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="historyOrderBtn">Order History</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="todayOrderBtn">Today's orders.</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="cancelAdminOrderBtn"> Cancelled by admin
              </a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" id="cancelUserOrderBtn">Cancelled by user
              </a>
            </li>
          </ul>
        </li>


        <li class="sidebar-item">
          <a href="#" class="sidebar-link" id="changeDetails">
            <i class="lni lni-cog"></i>
            <span>Change admin details.
            </span>
          </a>
        </li>

      </ul>
      <div class="sidebar-footer">
        <a href="#" class="sidebar-link" onclick="logOutAdmin()">
          <i class="lni lni-exit"></i>
          <span>Logout</span>
        </a>
      </div>
    </aside>
    <div class="main">
      <nav class="navbar navbar-expand px-4 py-3">
        <form action="#" class="d-none d-sm-inline-block">

        </form>
        <div class="navbar-collapse collapse">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a href="./home" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                <img src="../../resources/images/mgl_g5.svg" class="avatar " alt="" id="accountImg" style="width:210px">
              </a>
              <div class="dropdown-menu dropdown-menu-end rounded">

              </div>
            </li>
          </ul>
        </div>
      </nav>
      <main class="content px-3 py-4">
        <div class="container-fluid">
          <!-- main item goes here -->
          <div class="table-responsive d-none" id="profile">
            <h1 class="text-center mb-2">User Details</h1>
            <!-- users details start here -->
            <table class="table mt-4">
              <thead>
                <tr>

                  <th scope="col">Email</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Postal Code</th>
                  <th scope="col">Telephone</th>
                  <th scope="col">Block</th>


                </tr>
              </thead>
              <tbody id="userProfileTableBody">

              </tbody>
            </table>
          </div>
          <!-- user deatils end here -->
          <!-- admin Details start here -->
          <div id="adminDetailsContainer" class="d-none">
            <h1 class="text-center">Admin Details</h1>
            <h3>Add Admin</h3>
            <div class="d-flex justify-content-between">
              <div>
                <label for="">Email</label>
                <input type="text" class="form-control" id="adminEmail">
              </div>
              <div>
                <label for="">Passowrd</label>
                <input type="text" class="form-control" id="adminPassowrd">
              </div>
              <div>
                <label for="">Full Name</label>
                <input type="text" class="form-control" id="adminFullName">
              </div>
            </div>
            <div class="text-center mt-3">
              <button class="btn btn-primary text-center" id="adminSubmit">Add Admin</button>

            </div>
            <!-- users details start here -->
            <div class="table-responsive" id="tableProfileBody">
              <table class="table mt-4">
                <thead>
                  <tr>

                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Delete</button></th>




                  </tr>
                </thead>
                <tbody id="adminBody">

                </tbody>
              </table>
            </div>

          </div>
          <!-- admin details end here -->



          <!-- package load start here -->
          <div class="packageLoadContainer d-none" id="packageLoadContainer">
            <h1 class="text-center mb-4">Your Packages</h1>

            <button class="btn btn-primary my-3" id="pacgeAddFake">Add New Package</button>


            <div class="cardContainer" id="cardContainer">

            </div>
          </div>
          <!-- package load end here -->
          <!-- package edit start here -->
          <div id="packageEditContainer" class="d-none">
            <h1 class="text-center">Edit Packages</h1>
            <input type="text" class="form-control w-50" placeholder="Add Package Name Here" id="packageNameEditSearch">
            <ul id="suggestions" style="cursor: pointer;"></ul>
            <button class="btn btn-primary my-3" id="loadEditPackage">Load Package</button>
            <div class="mt-4">
              <div class="row">
                <div class="col-md">
                  <input type="text" class="form-control" placeholder="Package Name" id="packageNameEdit">
                </div>
                <div class="col-md mt-md-0 mt-3">

                </div>
                <div class="col-md  mt-md-0 mt-3">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Walking Time" id="walkingTimeEdit">
                    <div class="input-group-text">min walking</div>


                  </div>
                </div>
              </div>
              <div class="row mt-4 ">
                <div class="col">
                  <small id="emailHelp" class="form-text text-muted">
                    After writing one point, press Enter to start a new line for the next point

                  </small>

                  <textarea class="form-control" placeholder="Bullet Points" rows="10" id="pointFormEdit"></textarea>


                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <textarea class="form-control" placeholder="More Info" rows="10" id="infoTextEdit"></textarea>

                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <small id="emailHelp" class="form-text text-muted">For Better User Experience add short and attractive sentence

                  </small>

                  <textarea class="form-control" placeholder="Bottom Text" rows="10" id="bottomTextEdit"></textarea>

                </div>
              </div>


              <div class="row mt-3">
                <div class="col-md">
                  <div class="col-md mt-md-0 mt-3">
                    <div class="input-group">
                      <span class="input-group-text">&pound;</span>

                      <input type="number" class="form-control" placeholder="Price For 1-5 Days" id="oneFiveEdit">

                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="col-md mt-md-0 mt-3">
                    <div class="input-group">
                      <span class="input-group-text">&pound;</span>

                      <input type="number" class="form-control" placeholder="Price For 5-7 Days" id="oneSevenEdit">

                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="col-md mt-md-0 mt-3">
                    <div class="input-group">
                      <span class="input-group-text">&pound;</span>

                      <input type="number" class="form-control" placeholder="Price For Extra Day" id="extraDayEdit">

                    </div>
                  </div>
                </div>
                <div id="milstoneTableContainer" class="table-responsive">
                  <table id="dataTable" class="table mt-5">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Value</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Table rows will be added dynamically using JavaScript -->
                    </tbody>
                  </table>
                  <div class="d-flex mt-3">
                    
                  <button id="addRow" class="btn btn-warning">Add Row</button>
                  <button id="saveChanges" class="btn btn-info mx-2">Save Changes</button>

                  </div>

                </div>






              </div>



<div class="text-center">
<button class="btn btn-primary mt-4 px-3" id="editPackageSubmitBtn">Edit Package</button>

</div>
            </div>
            <!-- form -->
          </div>



          <!-- package add end here -->

          <!-- package Add start here -->
          <div id="packageAddContainer" class="d-none">
            <h1 class="text-center">Add Package</h1>
            <for class="mt-4">
              <div class="row">
                <div class="col-md">
                  <input type="text" class="form-control" placeholder="Package Name" id="packageName">
                </div>

                <div class="col-md  mt-md-0 mt-3">
                  <div class="input-group">

                    <input type="text" class="form-control" placeholder="Walking Time" id="walkingTime">
                    <div class="input-group-text">
                      min walking
                    </div>

                  </div>
                </div>

                <div class="row mt-4 ">
                  <div class="col">
                    <small id="emailHelp" class="form-text text-muted">After wrote one point,press the enter tab</small>

                    <textarea class="form-control" placeholder="Bullet Points" rows="10" id="pointForm"></textarea>


                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <textarea class="form-control" placeholder="More Info" rows="10" id="infoText"></textarea>

                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                    <small id="emailHelp" class="form-text text-muted">For Better User Experience add short and attractive sentence

                    </small>

                    <textarea class="form-control" placeholder="Bottom Text" rows="10" id="bottomText"></textarea>

                  </div>
                </div>

                </>



                <div>

                </div>
                <div class="row mt-3">
                  <div class="col-md">
                    <div class="col-md mt-md-0 mt-3">
                      <div class="input-group">
                        <span class="input-group-text">&pound;</span>

                        <input type="number" class="form-control" placeholder="Price For 1-5 Days" id="oneFive">

                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="col-md mt-md-0 mt-3">
                      <div class="input-group">
                        <span class="input-group-text">&pound;</span>

                        <input type="number" class="form-control" placeholder="Price For 5-7 Days" id="oneSeven">

                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="col-md mt-md-0 mt-3">
                      <div class="input-group">
                        <span class="input-group-text">&pound;</span>

                        <input type="number" class="form-control" placeholder="Price For Extra Day" id="extraDay">

                      </div>
                    </div>
                  </div>





                </div>


                <small class="text-muted mt-3">You can add milstone Dates & prices here</small>

                <div class="row mt-1">
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-text">Dates</span>

                      <input type="number" class="form-control" placeholder="Milstone In Dates" id="milestoneDate">

                    </div>
                  </div>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-text">&pound;</span>

                      <input type="number" class="form-control" placeholder="Price" id="milstonePrice">

                    </div>
                  </div>
                  <div class="col-md">
                    <button class="btn btn-primary" id="milstoneAdd">Add Milstone</button>
                  </div>
                </div>



              </div>
              <button onclick="addPackageJoke()" class="btn btn-primary mt-4 px-3">Add Package</button>

          </div>
          <!-- package End start here -->

          <!-- active order load start here -->
          <div id="activeOrderLoadContainer" class="d-none">
            <h1 class="text-center mb-4">Active Orders</h1>
            <div class="d-flex">
              <input type="text" class="form-control w-25" placeholder="search by user id" id="activeSearchInput">
              <button class="btn btn-primary mx-2" id="activeSearchBtn">Search</button>
            </div>
            <div id="ActiveOrderTableContainer" class="table-responsive">
              <table class="table table-bordered  mt-4">
                <thead>
                  <tr>
                    <th scope="col">Cancel Order</th>
                    <th scope="col">Complete Order</th>
                    <th scope="col">Print Ticket</th>


                    <th scope="col">Parking Id</th>
                    <th scope="col">User Id</th>

                    <th scope="col">Arrival</th>
                    <th scope="col">Exit</th>
                    <th scope="col">Registation Number</th>
                    <th scope="col">Flight Number</th>
                    <th scope="col">Package Name</th>

                    <th scope="col">Email</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Postal Code</th>


                    <th scope="col">Payment Id</th>
                    <th scope="col">Full Amount</th>
                    <th scope="col">Order Date</th>




                  </tr>
                </thead>
                <tbody id="activeOrderProfileBody">

                </tbody>
              </table>
            </div>
          </div>

          <!-- active order load end here -->
          <!-- history order loas start here -->
          <div id="historyOrderContainer" class="d-none">
            <h1 class="mb-4 text-center">Order History</h1>
            <div class="d-flex">
              <input type="text" class="form-control w-25" placeholder="search by user id" id="historySearchInput">
              <button class="btn btn-primary mx-2" id="historySearchSubmit">Search</button>
            </div>
            <div id="historyOrderTableContainer" class=" table-responsive">
              <table class="table table-bordered  mt-4">
                <thead>
                  <tr>

                    <th scope="col">Parking Id</th>
                    <th scope="col">User Id</th>

                    <th scope="col">Arrival</th>
                    <th scope="col">Exit</th>
                    <th scope="col">Registation Number</th>
                    <th scope="col">Flight Number</th>
                    <th scope="col">Package Name</th>

                    <th scope="col">Email</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Postal Code</th>


                    <th scope="col">Payment Id</th>
                    <th scope="col">Full Amount</th>
                    <th scope="col">Order Date</th>


                  </tr>
                </thead>
                <tbody id="historyOrderProfileBody">

                </tbody>
              </table>

            </div>

          </div>

          <!-- histiry order load end here -->
          <!-- Today Order load Start Here -->
          <div id="todayOrderLoadContainer" class=" d-none">
            <h1 class="text-center">Today Orders</h1>
            <div class="table-responsive">
              <table class="table table-bordered  mt-4">
                <thead>
                  <tr>
                    <th scope="col">Cancel Order</th>
                    <th scope="col">Complete Order</th>
                    <th scope="col">Parking Id</th>
                    <th scope="col">User Id</th>

                    <th scope="col">Arrival</th>
                    <th scope="col">Exit</th>
                    <th scope="col">Registation Number</th>
                    <th scope="col">Flight Number</th>
                    <th scope="col">Package Name</th>

                    <th scope="col">Email</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Postal Code</th>


                    <th scope="col">Payment Id</th>
                    <th scope="col">Full Amount</th>
                    <th scope="col">Order Date</th>




                  </tr>
                </thead>
                <tbody id="todayOrderLoadProfileBody">

                </tbody>
              </table>


            </div>

          </div>
          <!-- today order load end here -->
          <!-- cancel by admin order load start here -->
          <div id="adminCancelOrderContainer" class="d-none">
            <h1 class="text-center">Orders Cancel By Admin</h1>
            <div class="table-responsive">
              <table class="table table-bordered  mt-4">
                <thead>
                  <tr>

                    <th scope="col">Parking Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Refund Amount</th>


                    <th scope="col">Arrival</th>
                    <th scope="col">Exit</th>
                    <th scope="col">Registation Number</th>
                    <th scope="col">Flight Number</th>
                    <th scope="col">Package Name</th>

                    <th scope="col">Email</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Postal Code</th>


                    <th scope="col">Payment Id</th>
                    <th scope="col">Full Amount</th>
                    <th scope="col">Order Date</th>




                  </tr>
                </thead>
                <tbody id="adminCancelOrderProfileBody">

                </tbody>
              </table>

            </div>

          </div>
          <!-- cancel by user order load end here -->

          <!-- cancel by admin order load start here -->
          <div id="userCancelOrderContainer" class="d-none">
            <h1 class="text-center">Orders Cancel By Admin</h1>
            <div class="table-responsive">
              <table class="table table-bordered  mt-4">
                <thead>
                  <tr>

                    <th scope="col">Parking Id</th>
                    <th scope="col">User Id</th>

                    <th scope="col">Arrival</th>
                    <th scope="col">Exit</th>
                    <th scope="col">Registation Number</th>
                    <th scope="col">Flight Number</th>
                    <th scope="col">Package Name</th>

                    <th scope="col">Email</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Postal Code</th>


                    <th scope="col">Payment Id</th>
                    <th scope="col">Full Amount</th>
                    <th scope="col">Order Date</th>




                  </tr>
                </thead>
                <tbody id="userCancelOrderProfileBody">

                </tbody>
              </table>

            </div>

          </div>
          <!-- cancel by user order load end here -->

          <!-- valet load stert here -->
          <div id="valetLoadContainer" class="d-none">
            <h1 class="text-center">Valet</h1>
            <div class="row justify-content-center">
              <div class="col-sm-4 mb-3">
                <label for="selectType" class="form-label">Valet Packages</label>
                <div class="input-group">
                  <select class="form-select" id="selectType">
                    <option selected value="Full Valet">Full Valet</option>
                    <option value="Interior Valet">Interior Valet</option>
                    <option value="Exterior Valet">Exterior Valet</option>
                    <option value="Wash">Wash</option>
                    <option value="Vac">Vac</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="selectVehicle" class="form-label">Vehicle Type</label>
                <div class="input-group">
                  <select class="form-select" id="selectVechle">
                    <option selected value="Car">Car</option>
                    <option value="4X4/MPV">4X4/MPV</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-4 mb-3">
                <label for="valetPrice" class="form-label">Price</label>
                <div class="input-group">
                  <span class="input-group-text">&pound;</span>
                  <input type="number" class="form-control" id="valetPrice" aria-label="Amount (to the nearest dollar)">
                </div>
              </div>
            </div>

            <div class="text-center">
              <button class="btn btn-success" onclick="updateValet()">Update</button>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered  mt-4">
                <thead>
                  <tr>

                    <th scope="col">Valet Id</th>
                    <th scope="col">Valet Type</th>

                    <th scope="col">Vehicle</th>
                    <th scope="col">Price</th>



                  </tr>
                </thead>
                <tbody id="valetLoadProfileBody">

                </tbody>
              </table>
            </div>
          </div>

          <!-- valet end her -->

          <!-- admin home start here -->
          <div id="adminHomeContainer">
            <h1>Quick Access</h1>
            <div class="header-container d-md-flex justify-content-md-around mt-3">
              <div class="card text-white bg-primary mb-3" style="min-width: 13rem;" id="tooltipOpener">
                <div class="card-header">Avaliable Parking Slot</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <span class="middleNumber" id="availableSlot"></span>


                </div>
                <div class="text-center mb-2" id="arrowIcon"><i class="bi bi-arrow-down-circle"></i></div>
                <div id="editingSection" class="d-none">
                  <div class="text-center mx-4">
                    <input type="text" class="form-control" placeholder="New Parking Slot" id="inputSlot">

                  </div>
                  <div class="text-center">
                    <button class="btn btn-success text-center mt-2" id="newParkingSlotSubmit">Submit</button>

                  </div>


                </div>
              </div>

              <div class="card text-white bg-warning mb-3" style="min-width: 13rem;">
                <div class="card-header">Registerd User Count</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <span class="middleNumber" id="totalUser"></span>

                </div>
              </div>

              <div class="card text-white bg-danger mb-3 " style="min-width: 13rem;">
                <div class="card-header text-center">All Earning</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <span class="middleNumber" id="totalAmount"></span><span class="middleNumber">&pound;</span>

                </div>
              </div>

              <div class="card text-white bg-success mb-3" style="min-width: 13rem;">
                <div class="card-header text-center">Monthly Earning</div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <span class="middleNumber" id="monthAmont"></span><span class="middleNumber">&pound;</span>

                </div>
              </div>
            </div>

            <div class="seconnd-container mt-3">
              <h1>Generate Key</h1>
              <div class="d-md-flex justify-content-md-center align-items-center">
                <div class="form-group d-sm-flex">
                  <input type="text" class="form-control genarate-input" id="printBill" placeholder="Enter ID">
                  <button class="btn btn-primary mt-sm-0 mt-3 genarate-submit mx-3" id="genarateKey">Generate Key</button>
                </div>
              </div>

              <div id="billingContemnt" class="mb-4">

              </div>

              <!-- admin home end here -->

              <div class="second-container mt-3">
                <h1>Today's Departing Vehicles</h1>
                <div class="table-responsive">
                  <table class="table table-bordered  mt-4">
                    <thead>
                      <tr>

                        <th scope="col">Parking Id</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Exit</th>



                        <th scope="col">Payment Id</th>
                        <th scope="col">Full Amount</th>
                        <th scope="col">Order Date</th>

                        <th scope="col">Cancel Order</th>
                        <th scope="col">Complete Order</th>


                      </tr>
                    </thead>
                    <tbody id="homeActiveOrderProfileBody">

                    </tbody>
                  </table>
                </div>
              </div>



            </div>

          </div>
      </main>

    </div>
  </div>



  <div class="toast-container position-fixed bottom-0 end-0 p-3"></div>

  <div class="modal" tabindex="-1" role="dialog" id="cancelModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="formGroupExampleInput">Add Amount</label>
            <input type="number" class="form-control" id="cancelAmount" placeholder="Example input">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="cancelRefundBtn">Make Refund</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelwithoutrefundBtn">Cancel Without Payment</button>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>