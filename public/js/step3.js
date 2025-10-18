let paymentProcessBtn = document.getElementById("paymentProcessBtn");
document.addEventListener("DOMContentLoaded", () => {
  dynamicDataUpdater();
});
paymentProcessBtn.addEventListener("click", () => {
  processedToPayment();
});

function madfun() {
  signinModal.show();
  toogleSignup();
}
//event Listners
signupSubmit.addEventListener("click", () => {
  signUp();
  console.log("triggered");
});
signinSubmit.addEventListener("click", () => {
  signIn();
});
frogotPasswordSubmit.addEventListener("click", () => {
  fogotPasswordHandler();
});

function validatePassword() {
  
  let password = document.getElementById('passwordLogin').value;
  let passwordError = document.getElementById('passwordError');

  // Check if the password is at least 8 characters long and not longer than 20 characters
  if (password.length < 8 || password.length > 20) {
      passwordError.textContent = 'Password must be between 8 and 20 characters long';
      return;
  }

  // Check if the password contains at least one uppercase letter
  if (!/[A-Z]/.test(password)) {
    passwordError.textContent = 'Password must contain at least one uppercase letter';
    return;
  }

  // Check if the password contains at least one lowercase letter
  if (!/[a-z]/.test(password)) {
    passwordError.textContent = 'Password must contain at least one lowercase letter';
    return;
  }

  // Check if the password contains at least one number
  if (!/\d/.test(password)) {
    passwordError.textContent = 'Password must contain at least one number';
    return;
  }

  // Check if the password contains at least one special character
  if (!/[^a-zA-Z\d]/.test(password)) {
    passwordError.textContent = 'Password must contain at least one special character';
    return;
  }

  // If the password passes all checks, clear the error message
  passwordError.textContent = '';
}
let password = document.getElementById("passwordLogin");
password.addEventListener('input', validatePassword);



async function processedToPaymentWithoutLogin() {
  console.log("triggerd w");
  
  let title = document.getElementById("titleLogin").value;
  let fistName = document.getElementById("fistNameLogin").value;
  let lastName = document.getElementById("lastNameLogin").value;
  let telephone = document.getElementById("telephoneLogin").value;
  let postalCode = document.getElementById("postalCodeLogin").value;
  let registerNumber = document.getElementById("registerNumber").value;
  let airline = document.getElementById("airline").value;
  let lesiure = document.getElementById("lesiure").value;
  let business = document.getElementById("business").value;
  let flightNumber = document.getElementById("flightNumber").value;

  let email = document.getElementById("emailLogin").value;
  let password = document.getElementById("passwordLogin").value;
  let cPassword = document.getElementById("cPasswordLogin").value;


  if (
    title === "" ||
    fistName === "" ||
    lastName === "" ||
    telephone === "" ||
    postalCode === "" ||
    registerNumber === "" ||
    airline === "" ||
    lesiure === "" ||
    email === "" ||
    password === "" ||
    cPassword === "" ||
    business === ""
  ) {
    // Send error message
    toastSetup("Please Fill All Input Fields");
    return;
  }

  // Save values to localStorage
  localStorage.setItem("title", title);
  localStorage.setItem("fistName", fistName);
  localStorage.setItem("lastName", lastName);
  localStorage.setItem("telephone", telephone);
  localStorage.setItem("postalCode", postalCode);
  localStorage.setItem("registerNumber", registerNumber);
  localStorage.setItem("airline", airline);
  localStorage.setItem("lesiure", lesiure);
  localStorage.setItem("business", business);

  

  if (
    localStorage.getItem("packageId") ||
    localStorage.getItem("TimeEnd") ||
    localStorage.getItem("DateEnd") ||
    localStorage.getItem("TimeStart") ||
    localStorage.getItem("DateStart") ||
    localStorage.getItem("price")
  ) {
    console.log("payment process start");
  } else {
    // Send error message
    window.location.href = "/home";
  }

  const apiUrl = server_url + "api/PaymentHandler/chargeCustomerWithoutAccount";
  const formData = new FormData();
  let type;

  if (lesiure == 1) {
    type = 1;
  } else {
    type = 2;
  }
  toastSetup("Your Payment Is Processing,Please wait");

  formData.append("title", title);
  formData.append("fistName", fistName);
  formData.append("lastName", lastName);
  formData.append("telephone", telephone);
  formData.append("postalCode", postalCode);
  formData.append("registerNumber", registerNumber);
  formData.append("airline", airline);
  formData.append("type", type);
  formData.append("business", business);
  formData.append("flightNumber", flightNumber);

  formData.append("email", email);
  formData.append("password", password);
  formData.append("cpassword", cPassword);

  const packageIdNew = localStorage.getItem("packageId");

  if (localStorage.getItem("valetPrice")) {
    // const valetPrice = parseFloat(localStorage.getItem("valetPrice"));
    const price = await priceHandlerForInstance(
      dateTimeDifference(),
      packageIdNew
    );

    const valetPrice = parseFloat(localStorage.getItem("valetPrice"));

    // Calculate the total
    const total = valetPrice + parseFloat(price);

    formData.append("Amount", total);

    formData.append("valetId", localStorage.getItem("valetId"));
  } else {
    const price = await priceHandlerForInstance(
      dateTimeDifference(),
      packageIdNew
    );
    const finalAmount = parseFloat(price);
    console.log(price);

    formData.append("Amount", finalAmount);
    formData.append("valetId", 11);
  }

  formData.append(
    "arrivalDateTime",
    localStorage.getItem("DateStart") +
      " " +
      localStorage.getItem("TimeStart") +
      ":00"
  );

  formData.append(
    "exitDateTime",
    localStorage.getItem("DateEnd") +
      " " +
      localStorage.getItem("TimeEnd") +
      ":00"
  );
  formData.append("packageId", localStorage.getItem("packageId"));
  console.log(registerNumber);

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
        console.log(data.data)
        
        window.location.href = data.data;
      } else {
        toastSetup(data.error);
        if (data.error == "Please Log in") {
          signinModal.show();
          toogleSignup();
        }
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

async function processedToPayment() {
  let title = document.getElementById("title").value;
  let fistName = document.getElementById("fistName").value;
  let lastName = document.getElementById("lastName").value;
  let telephone = document.getElementById("telephone").value;
  let postalCode = document.getElementById("postalCode").value;
  let registerNumber = document.getElementById("registerNumber").value;
  let airline = document.getElementById("airline").value;
  let lesiure = document.getElementById("lesiure").value;
  let business = document.getElementById("business").value;
  let flightNumber = document.getElementById("flightNumber").value;

  // Save values to localStorage
  localStorage.setItem("title", title);
  localStorage.setItem("fistName", fistName);
  localStorage.setItem("lastName", lastName);
  localStorage.setItem("telephone", telephone);
  localStorage.setItem("postalCode", postalCode);
  localStorage.setItem("registerNumber", registerNumber);
  localStorage.setItem("airline", airline);
  localStorage.setItem("lesiure", lesiure);
  localStorage.setItem("business", business);

  if (
    title === "" ||
    fistName === "" ||
    lastName === "" ||
    telephone === "" ||
    postalCode === "" ||
    registerNumber === "" ||
    airline === "" ||
    lesiure === "" ||
    business === ""
  ) {
    // Send error message
    toastSetup("Please Fill All Input Fields");
    return;
  }

  if (
    localStorage.getItem("packageId") ||
    localStorage.getItem("TimeEnd") ||
    localStorage.getItem("DateEnd") ||
    localStorage.getItem("TimeStart") ||
    localStorage.getItem("DateStart") ||
    localStorage.getItem("price")
  ) {
    console.log("payment process start");
  } else {
    // Send error message
    window.location.href = "/home";
  }

  const apiUrl = server_url + "api/PaymentHandler/chargeCustomer";
  const formData = new FormData();
  let type;

  if (lesiure == 1) {
    type = 1;
  } else {
    type = 2;
  }
  toastSetup("Your Payment Is Processing,Please wait");

  formData.append("title", title);
  formData.append("fistName", fistName);
  formData.append("lastName", lastName);
  formData.append("telephone", telephone);
  formData.append("postalCode", postalCode);
  formData.append("registerNumber", registerNumber);
  formData.append("airline", airline);
  formData.append("type", type);
  formData.append("business", business);
  formData.append("flightNumber", flightNumber);

  const packageIdNew = localStorage.getItem("packageId");

  if (localStorage.getItem("valetPrice")) {
    // const valetPrice = parseFloat(localStorage.getItem("valetPrice"));
    const price = await priceHandlerForInstance(
      dateTimeDifference(),
      packageIdNew
    );

    const valetPrice = parseFloat(localStorage.getItem("valetPrice"));

    // Calculate the total
    const total = valetPrice + parseFloat(price);

    formData.append("Amount", total);

    formData.append("valetId", localStorage.getItem("valetId"));
  } else {
    const price = await priceHandlerForInstance(
      dateTimeDifference(),
      packageIdNew
    );
    const finalAmount = parseFloat(price);
    console.log(price);

    formData.append("Amount", finalAmount);
    formData.append("valetId", 11);
  }

  formData.append(
    "arrivalDateTime",
    localStorage.getItem("DateStart") +
      " " +
      localStorage.getItem("TimeStart") +
      ":00"
  );

  formData.append(
    "exitDateTime",
    localStorage.getItem("DateEnd") +
      " " +
      localStorage.getItem("TimeEnd") +
      ":00"
  );
  formData.append("packageId", localStorage.getItem("packageId"));
  console.log(registerNumber);

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
        window.location.href = data.data;
      } else {
        toastSetup(data.error);
        if (data.error == "Please Log in") {
          signinModal.show();
          toogleSignup();
        }
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

async function dynamicDataUpdater() {
  document.getElementById("entiyDate").textContent =
    localStorage.getItem("DateStart");
  document.getElementById("entryTime").textContent =
    localStorage.getItem("TimeStart");
  document.getElementById("exitDate").textContent =
    localStorage.getItem("DateEnd");
  document.getElementById("exitTime").textContent =
    localStorage.getItem("TimeEnd");

  const packageId = localStorage.getItem("packageId");
  const price = await priceHandlerForInstance(dateTimeDifference(), packageId);

  document.getElementById("total").textContent = parseFloat(price);
  if (localStorage.getItem("valetPrice")) {
    document.getElementById("total").textContent = "";
    const valetPrice = parseFloat(localStorage.getItem("valetPrice"));
    const calculatedPrice = await priceHandlerForInstance(
      dateTimeDifference(),
      packageId
    );

    // Calculate the total
    const total = valetPrice + parseFloat(calculatedPrice);

    // Display the total
    console.log(total);

    document.getElementById("total").textContent = total;
  } else {
    document.getElementById("valletSection").classList.add("d-none");
  }
  document.getElementById("packageName").textContent =
    localStorage.getItem("packageName");
  document.getElementById("packagePrice").textContent = parseFloat(price);
  document.getElementById("valetName").textContent =
    localStorage.getItem("valetName");
  document.getElementById("valetPrice").textContent =
    localStorage.getItem("valetPrice");

  console.log(localStorage.getItem("valetName"));

  // Check if each item is available in localStorage and populate input fields
  if (localStorage.getItem("title")) {
    document.getElementById("title").value = localStorage.getItem("title");
  }
  if (localStorage.getItem("fistName")) {
    document.getElementById("fistName").value =
      localStorage.getItem("fistName");
  }
  if (localStorage.getItem("lastName")) {
    document.getElementById("lastName").value =
      localStorage.getItem("lastName");
  }
  if (localStorage.getItem("telephone")) {
    document.getElementById("telephone").value =
      localStorage.getItem("telephone");
  }
  if (localStorage.getItem("postalCode")) {
    document.getElementById("postalCode").value =
      localStorage.getItem("postalCode");
  }
  if (localStorage.getItem("registerNumber")) {
    document.getElementById("registerNumber").value =
      localStorage.getItem("registerNumber");
  }
  if (localStorage.getItem("airline")) {
    document.getElementById("airline").value = localStorage.getItem("airline");
  }
  if (localStorage.getItem("lesiure")) {
    document.getElementById("lesiure").value = localStorage.getItem("lesiure");
  }
  if (localStorage.getItem("business")) {
    document.getElementById("business").value =
      localStorage.getItem("business");
  }
}
