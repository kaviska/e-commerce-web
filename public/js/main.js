// common js will goes here that are applicable for entire application
const server_url = "http://localhost:9001/";
//const server_url = "https://ecommerce.gigantoo.com/";

//coman element
let signupChange = document.getElementById("signup");
let signinChange = document.getElementById("signin");

let signinUserName = document.getElementById("signinUserName");
let signinPassword = document.getElementById("signinPassword");
let signupUserName = document.getElementById("signupUserName");
let signUpPassword = document.getElementById("signUpPassword");
let signupFirstName = document.getElementById("signupFirstName");
let signupLastName = document.getElementById("signupLastName");
let signupMobile = document.getElementById("signupMobile");
let signInClose = document.getElementById("signInClose");
let signinBtn = document.getElementById("signinBtn");

let headerLogin = document.getElementById("headerLogin");
let headerRegister = document.getElementById("headerRegister");
let bottomSignin = document.getElementById("bottomSignin");
let bottomRegister = document.getElementById("bottomRegister");

let emailHelp1 = document.getElementById("emailHelp1");
let passwordHelp1 = document.getElementById("passwordHelp2");
let emailHelp2 = document.getElementById("emailHelp2");
let passwordHelp2 = document.getElementById("passwordHelp2");
let firstNameHelp = document.getElementById("firstNameHelp");
let lastNameHelp = document.getElementById("lastNameHelp");
let mobileHelp = document.getElementById("mobileHelp");

let signupSubmit = document.getElementById("signupSubmit");
let signinSubmit = document.getElementById("signinSubmit");

let cPassword = document.getElementById("cPassword");

let logOutBtn = document.getElementById("logOut");

let fogotPasswordBtn = document.getElementById("fogotPasswordBtn");
let frogotPasswordSubmit = document.getElementById("frogotPasswordSubmit");
let frogotPasswordEmail = document.getElementById("frogotPasswordEmail");
let frogotPassword = document.getElementById("frogotPassword");
let headerFrogotPassword = document.getElementById("headerFrogotPassword");

signinModal = new bootstrap.Modal("#myModal");
function aiyo() {
  console.log("tr");
  signinModal.show();
  toogleSignup();
}
//opend sign in modal
signinBtn.addEventListener("click", () => {
  console.log("tr");
  signinModal.show();
  toogleSignup();
});
//close sign in modal
signInClose.addEventListener("click", () => {
  console.log("triggerd");

  signinModal.hide();
});
frogotPasswordSubmit.addEventListener("click", () => {
  fogotPasswordHandler();
});

//toast configaration

//email validation

function isValidEmail(email) {
  // Regular expression for validating email addresses
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Check if the email matches the regex pattern
  return emailRegex.test(email);
}

function toogleSignup() {
  signupChange.addEventListener("click", () => {
    // Hide sign in fields
    signinUserName.classList.add("d-none");
    signinPassword.classList.add("d-none");
    
    // Show sign up fields
    signupUserName.classList.remove("d-none");
    signupFirstName.classList.remove("d-none");
    signupLastName.classList.remove("d-none");
    signupMobile.classList.remove("d-none");
    signUpPassword.classList.remove("d-none");
    cPassword.classList.remove("d-none");

    // Update headers and buttons
    headerLogin.classList.add("d-none");
    headerRegister.classList.remove("d-none");

    bottomSignin.classList.remove("d-none");
    bottomRegister.classList.add("d-none");

    signinSubmit.classList.add("d-none");
    signupSubmit.classList.remove("d-none");

    // Hide forgot password fields
    frogotPasswordSubmit.classList.add("d-none");
    frogotPasswordEmail.classList.add("d-none");
    frogotPassword.classList.add("d-none");
    headerFrogotPassword.classList.add("d-none");
  });

  signinChange.addEventListener("click", () => {
    // Show sign in fields
    signinUserName.classList.remove("d-none");
    signinPassword.classList.remove("d-none");
    
    // Hide sign up fields
    signupUserName.classList.add("d-none");
    signupFirstName.classList.add("d-none");
    signupLastName.classList.add("d-none");
    signupMobile.classList.add("d-none");
    signUpPassword.classList.add("d-none");
    cPassword.classList.add("d-none");

    // Update headers and buttons
    headerLogin.classList.remove("d-none");
    headerRegister.classList.add("d-none");

    bottomSignin.classList.add("d-none");
    bottomRegister.classList.remove("d-none");

    signinSubmit.classList.remove("d-none");
    signupSubmit.classList.add("d-none");

    // Hide forgot password fields
    frogotPasswordSubmit.classList.add("d-none");
    frogotPasswordEmail.classList.add("d-none");
    frogotPassword.classList.add("d-none");
    headerFrogotPassword.classList.add("d-none");
  });

  fogotPasswordBtn.addEventListener("click", () => {
    // Hide all other fields
    signinUserName.classList.add("d-none");
    signinPassword.classList.add("d-none");
    signupUserName.classList.add("d-none");
    signupFirstName.classList.add("d-none");
    signupLastName.classList.add("d-none");
    signupMobile.classList.add("d-none");
    signUpPassword.classList.add("d-none");
    cPassword.classList.add("d-none");

    // Update headers and buttons
    headerLogin.classList.add("d-none");
    headerRegister.classList.add("d-none");
    headerFrogotPassword.classList.remove("d-none");

    bottomSignin.classList.add("d-none");
    bottomRegister.classList.add("d-none");

    signinSubmit.classList.add("d-none");
    signupSubmit.classList.add("d-none");
    frogotPasswordSubmit.classList.remove("d-none");

    // Show forgot password fields
    frogotPasswordEmail.classList.remove("d-none");
    frogotPassword.classList.remove("d-none");
  });
}
//event Listners
signupSubmit.addEventListener("click", () => {
  signUp();
});
signinSubmit.addEventListener("click", () => {
  signIn();
});
//logOutBtn.addEventListener("click", () => {
//  console.log('triggers')
//  logOut();
//});
//sign in

function signUp() {
  let email = signupUserName.value;
  let firstName = signupFirstName.value;
  let lastName = signupLastName.value;
  let mobile = signupMobile.value;
  let password = signUpPassword.value;
  let cPassoword = cPassword.value;

  // Clear previous error messages
  passwordHelp2.textContent = "";
  emailHelp2.textContent = "";
  firstNameHelp.textContent = "";
  lastNameHelp.textContent = "";
  mobileHelp.textContent = "";

  // Validation
  if (!email) {
    emailHelp2.textContent = "Email is required";
    return;
  }

  if (!firstName) {
    firstNameHelp.textContent = "First name is required";
    return;
  }

  if (!lastName) {
    lastNameHelp.textContent = "Last name is required";
    return;
  }

  if (!mobile) {
    mobileHelp.textContent = "Mobile number is required";
    return;
  }

  if (!password) {
    passwordHelp2.textContent = "Password is required";
    return;
  }

  if (password != cPassoword) {
    passwordHelp2.textContent = "Passwords are not matching";
    return;
  }

  if (!isValidEmail(email)) {
    emailHelp2.textContent = "Email is Invalid Format";
    return;
  }

  // Validate mobile number (10 digits)
  if (!/^\d{10}$/.test(mobile)) {
    mobileHelp.textContent = "Mobile number must be 10 digits";
    return;
  }

  toastSetup("Please Wait Few Seconds");
  console.log(email, firstName, lastName, mobile, password);

  // Define the URL of the API endpoint
  const apiUrl = server_url + "api/user/register";

  const formData = new FormData();
  formData.append("email", email);
  formData.append("first_name", firstName);
  formData.append("last_name", lastName);
  formData.append("telephone", mobile);
  formData.append("password", password);
  formData.append("conformPassword", cPassoword);

  // Make the fetch request
  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        return response.json(); // Parse the JSON response
      } else {
        throw new Error("Network response was not ok");
      }
    })
    .then((data) => {
      if (data.status == "success") {
        toastSetup("Please Check Your Email To Verify");
        // Clear form fields
        signupUserName.value = "";
        signupFirstName.value = "";
        signupLastName.value = "";
        signupMobile.value = "";
        signUpPassword.value = "";
        cPassword.value = "";
        // Switch back to sign in form
        signinChange.click();
      } else {
        if (typeof data.error === 'object') {
          // Handle validation errors
          let errorMessages = [];
          for (let key in data.error) {
            errorMessages.push(data.error[key]);
          }
          toastSetup(errorMessages.join(', '));
        } else {
          toastSetup(data.error);
        }
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
      toastSetup("Registration failed. Please try again.");
    });
}
function logOut() {
  // Make the fetch request
  const apiUrl = server_url + "api/user/logout";

  fetch(apiUrl, {
    method: "GET",
  })
    .then((response) => {
      if (response.ok) {
        return response.json(); // Parse the JSON response
      } else {
        throw new Error("Network response was not ok");
      }
    })
    .then((data) => {
      if (data.status == "success") {
        //toastSetup("Successfully Logout");
        // Force reload the current page without using cache
        location.reload(true);
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function signIn() {
  if (!signinUserName.value) {
    toastSetup("Please Add Email");
    return;
  }
  if (!signinPassword.value) {
    toastSetup("Please Add Email");
    return;
  }
  if (!isValidEmail(signinUserName.value)) {
    emailHelp2.textContent = "Email is Invalid Format";
    return;
  }
  console.log("came");

  const apiUrl = server_url + "api/user/login";
  const formData = new FormData();
  formData.append("email", signinUserName.value);
  formData.append("password", signinPassword.value);

  // Make the fetch request
  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        return response.json(); // Parse the JSON response
      } else {
        throw new Error("Network response was not ok");
      }
    })
    .then((data) => {
      console.log(data);
      if (data.status == "admin") {
        location.href = "/adminHome";
      } else if (data.status == "success") {
        toastSetup("Successsfully Loged in");
        location.reload();
      } else {
        toastSetup(data.error);
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
//toast setup function
function fogotPasswordHandler() {
  if (!frogotPasswordEmail.value) {
    toastSetup("Please Add Email");
    return;
  }
  if (!frogotPassword.value) {
    toastSetup("Please Add Email");
    return;
  }
  if (!isValidEmail(frogotPasswordEmail.value)) {
    emailHelp2.textContent = "Email is Invalid Format";
    return;
  }
  console.log("came");

  toastSetup("Please Wait Few Seconds");

  const apiUrl = server_url + "api/user/frogotPassword";
  const formData = new FormData();
  formData.append("email", frogotPasswordEmail.value);
  formData.append("password", frogotPassword.value);

  // Make the fetch request
  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        return response.json(); // Parse the JSON response
      } else {
        throw new Error("Network response was not ok");
      }
    })
    .then((data) => {
      console.log(data);
      if (data.status == "success") {
        toastSetup("Please Check Your Email");
      } else {
        toastSetup(data.error);
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function toastSetup(msg) {
  // Create toast element
  var toastContainer = document.querySelector(".toast-container");
  var toastElement = document.createElement("div");
  toastElement.classList.add("toast", "position-fixed", "top-0", "end-0"); // Positioning classes
  toastElement.setAttribute("role", "alert");
  toastElement.setAttribute("aria-live", "assertive");
  toastElement.setAttribute("aria-atomic", "true");

  // Create toast header
  var toastHeader = document.createElement("div");
  toastHeader.classList.add("toast-header", "d-flex", "gap-2");

  // Spinner
  var spinner = document.createElement("div");
  spinner.classList.add("spinner-grow", "text-danger");
  spinner.setAttribute("role", "status");
  var spinnerSpan = document.createElement("span");
  spinnerSpan.classList.add("visually-hidden");
  spinnerSpan.textContent = "Loading...";
  spinner.appendChild(spinnerSpan);
  toastHeader.appendChild(spinner);

  // Strong element
  var strongElement = document.createElement("strong");
  strongElement.classList.add("me-auto");
  strongElement.textContent = "Notification Panel";
  toastHeader.appendChild(strongElement);

  // Small element for time
  var smallElement = document.createElement("small");
  smallElement.setAttribute("id", "toastTime");
  toastHeader.appendChild(smallElement);

  // Close button
  var closeButton = document.createElement("button");
  closeButton.setAttribute("type", "button");
  closeButton.classList.add("btn-close");
  closeButton.setAttribute("data-bs-dismiss", "toast");
  closeButton.setAttribute("aria-label", "Close");
  toastHeader.appendChild(closeButton);

  toastElement.appendChild(toastHeader);

  // Toast body
  var toastBody = document.createElement("div");
  toastBody.classList.add("toast-body");
  var bodySpan = document.createElement("span");
  bodySpan.textContent = msg;
  toastBody.appendChild(bodySpan);
  toastElement.appendChild(toastBody);

  // Add toast to container
  toastContainer.appendChild(toastElement);

  // Show toast
  var toast = new bootstrap.Toast(toastElement);
  toast.show();

  // Function to format time
  function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? "P.M" : "A.M";
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var strTime = hours + "." + minutes + " " + ampm;
    return strTime;
  }

  // Update time every second
  setInterval(function () {
    var now = new Date();
    document.getElementById("toastTime").textContent = formatAMPM(now);
  }, 1000);
}

function createModal(title, body, hasFooter, modalId) {
  // Create modal
  var modal = document.createElement("div");
  modal.classList.add("modal");
  modal.tabIndex = "-1";
  modal.role = "dialog";
  modal.id = modalId;

  // Create modal dialog
  var modalDialog = document.createElement("div");
  modalDialog.classList.add("modal-dialog");
  modalDialog.role = "document";

  // Create modal content
  var modalContent = document.createElement("div");
  modalContent.classList.add("modal-content");

  // Check if footer should be added
  var footerContent = "";
  if (hasFooter) {
    footerContent = `
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  id="${modalId}.conformBtn">Conform</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="${modalId}.closeBtn">Close</button>
      </div>`;
  }

  // Create modal body
  var modalBody = document.createElement("div");
  modalBody.classList.add("modal-body");
  modalBody.innerHTML = body + footerContent;

  // Create modal header
  var modalHeader = document.createElement("div");
  modalHeader.classList.add("modal-header");
  var modalTitle = document.createElement("h5");
  modalTitle.classList.add("modal-title");
  modalTitle.innerText = title;
  modalHeader.appendChild(modalTitle);
  var closeButton = document.createElement("button");
  closeButton.type = "button";
  closeButton.classList.add("close");
  closeButton.setAttribute("data-dismiss", "modal");
  closeButton.setAttribute("aria-label", "Close");
  closeButton.setAttribute("id", `${modalId}.close`);
  closeButton.innerHTML = '<i class="bi bi-x"></i>';
  modalHeader.appendChild(closeButton);

  // Append header and body to content
  modalContent.appendChild(modalHeader);
  modalContent.appendChild(modalBody);

  // Append content to dialog
  modalDialog.appendChild(modalContent);

  // Append dialog to modal
  modal.appendChild(modalDialog);

  // Append modal to body
  document.body.appendChild(modal);

  // Instantiate Bootstrap modal
  var bootstrapModal = new bootstrap.Modal(document.getElementById(modalId));
  bootstrapModal.show();

  // Add event listener to close button
  document
    .getElementById(`${modalId}.close`)
    .addEventListener("click", function () {
      bootstrapModal.hide();
    });
  // Add event listener to close button
  document
    .getElementById(`${modalId}.closeBtn`)
    .addEventListener("click", function () {
      bootstrapModal.hide();
    });
}

function dateTimeDifference() {
  let dataStart = localStorage.getItem("DateStart");
  let dateEnd = localStorage.getItem("DateEnd");
  let timeStart = localStorage.getItem("TimeStart");
  let timeEnd = localStorage.getItem("TimeEnd");

  // Concatenate date and time strings for arrival and exit date/time
  var arrivalDateTimeString = dataStart + " " + timeStart;
  var exitDateTimeString = dateEnd + " " + timeEnd;

  // Parse arrival date/time string
  var arrivalDateTime = new Date(arrivalDateTimeString);

  // Parse exit date/time string
  var exitDateTime = new Date(exitDateTimeString);

  // Calculate the difference in milliseconds
  var timeDifference = exitDateTime - arrivalDateTime;

  // Convert milliseconds to days
  var timeDifferenceInDays = timeDifference / (1000 * 60 * 60 * 24);

  // Round the time difference to the nearest whole number
  var roundedTimeDifference = Math.round(timeDifferenceInDays);

  // Ensure the rounded time difference is at least 1
  roundedTimeDifference = Math.max(roundedTimeDifference, 1);

  // Update localStorage with the rounded time difference
  localStorage.setItem("Duration", roundedTimeDifference);

  // Return the rounded time difference
  return roundedTimeDifference;
}

async function priceHandlerForInstance(dateTimeDifference, packageId) {
  const apiUrl = server_url + "api/Package/packageLoadById";
  const formData = new FormData();
  formData.append("package_id", packageId);

  try {
    const response = await fetch(apiUrl, {
      method: "POST",
      body: formData,
    });

    if (!response.ok) {
      throw new Error("Network response was not ok");
    }

    const data = await response.json();

    if (data.status == "success") {
      let result = null;

      data.data.forEach((element) => {
        const date = dateTimeDifference;
        let sectionOneExecuted = false; // Flag to indicate if section one executed

        const priceObject = JSON.parse(element.hour_price);
        const oneFive = element.oneFive;

        var formattedPriceOneFive = parseFloat(element.oneFive).toFixed(2);
        var formattedPricefiveSeven = parseFloat(element.fiveSeven).toFixed(2);

        if (date <= 5) {
          result = formattedPriceOneFive;
          sectionOneExecuted = true; // Section one executed
        } else if (date <= 7) {
          result = formattedPricefiveSeven;
          sectionOneExecuted = true; // Section one executed
        } else {
          for (const key in priceObject) {
            if (parseInt(key) == date) {
              result = priceObject[key];
              //section one
              console.log(priceObject[key]);
              sectionOneExecuted = true; // Section one executed
            }
          }
          if (!sectionOneExecuted) {
            //section two
            let numberSet = [];
            for (const mile in priceObject) {
              numberSet.push(parseFloat(mile));
            }
            let nearestNumber = null;
            let minDifference = Infinity;

            for (let i = 0; i < numberSet.length; i++) {
              const difference = date - numberSet[i];
              if (
                difference >= 0 &&
                difference < minDifference &&
                numberSet[i] < date
              ) {
                nearestNumber = numberSet[i];
                minDifference = difference;
              }
            }
            let dateDifference = date - nearestNumber;
            let priceform = dateDifference * element.extraDay;
            let finalPrice = parseFloat(priceObject[nearestNumber]) + priceform;
            result = finalPrice;
          }
        }
      });

      return parseFloat(result);
    } else {
      throw new Error(data.error);
    }
  } catch (error) {
    console.error("Error:", error);
    // Handle error appropriately, e.g., display an error message to the user
    return null; // Or throw the error if you want to handle it outside this function
  }
}

function redirecUSerProfile() {
  window.location.href = server_url + "./userAccount";
}

// Example usage
