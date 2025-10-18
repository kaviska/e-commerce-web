<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Update Your Account details</h1>
            <p class="font-italic text-muted mb-0">Please use this section to update your account details, ensuring accurate information for a seamless parking experience.
            </p>
        </div>

        <!-- Registration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form id="updateForm">
                <div class="row">

                    <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                        </div>
                        <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="bi bi-telephone text-muted"></i>
                            </span>
                        </div>
                        <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                    </div>

                    <!-- Postal Code -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="bi bi-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="postalCode" type="text" name="postalcode" placeholder="Postal Code" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Job -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="bi bi-briefcase text-muted"></i>
                            </span>
                        </div>
                        <select id="title" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md">
                            <option value="1">Mr</option>
                            <option value="2">Miss</option>
                            <option value="3">Mrs</option>
                            <option value="4">Ms</option>
                            <option value="5">Dr</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0 text-center">
                        <button type="button" id="updateButton" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Update Account Details</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3"></div>