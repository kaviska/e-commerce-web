const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

let packageBtn = document.getElementById("packageBtn");

let profile = document.getElementById("profile");
let viewProfileBtn = document.getElementById("viewProfileBtn");
let packageLoadBtn = document.getElementById("packageLoadBtn");
let packageLoadContainer = document.getElementById("packageLoadContainer");
let packageAddContainer = document.getElementById("packageAddContainer");
let packageAddBtn = document.getElementById("packageAddBtn");
let historyOrderBtn = document.getElementById("historyOrderBtn");
let historyOrderContainer = document.getElementById("historyOrderContainer");
let navBarHomeBtn = document.getElementById("navBarHomeBtn");
let todayOrderBtn = document.getElementById("todayOrderBtn");
let viewAdminBtn = document.getElementById("viewAdminBtn");
let packageEditContainer = document.getElementById("packageEditContainer");
let packageEditBrn = document.getElementById("packageEditBrn");
let ValetLoadBtn = document.getElementById("ValetLoadBtn");
let valetLoadContainer = document.getElementById("valetLoadContainer");
let cancelAdminOrderBtn = document.getElementById("cancelAdminOrderBtn");
let cancelUserOrderBtn = document.getElementById("cancelUserOrderBtn");
let userCancelOrderContainer = document.getElementById(
  "userCancelOrderContainer"
);

let adminCancelOrderContainer = document.getElementById(
  "adminCancelOrderContainer"
);

let todayOrderLoadContainer = document.getElementById(
  "todayOrderLoadContainer"
);

let activeOrderLoadContainer = document.getElementById(
  "activeOrderLoadContainer"
);
let activeOrdersBtn = document.getElementById("activeOrdersBtn");

document.addEventListener("DOMContentLoaded", () => {
  departingUpdater();
});

// Function to toggle visibility and call corresponding function
function toggleSection(sectionToShow, functionToCall = null) {
  // Hide all sections
  const allSections = [
    profile,
    packageLoadContainer,
    packageAddContainer,
    activeOrderLoadContainer,
    historyOrderContainer,
    adminHomeContainer,
    todayOrderLoadContainer,
    adminDetailsContainer,
    packageEditContainer,
    valetLoadContainer,
    adminCancelOrderContainer,
    userCancelOrderContainer,
  ];
  allSections.forEach((section) => section.classList.add("d-none"));

  // Show the selected section
  sectionToShow.classList.remove("d-none");

  // Call the corresponding function if provided
  if (functionToCall) {
    functionToCall();
  }
}
navBarHomeBtn.addEventListener("click", () => {
  toggleSection(adminHomeContainer);
});
// Event listeners for each button
viewProfileBtn.addEventListener("click", () => {
  toggleSection(profile, loadUSers);
});

packageLoadBtn.addEventListener("click", () => {
  toggleSection(packageLoadContainer, packageLoad);
});

packageAddBtn.addEventListener("click", () => {
  toggleSection(packageAddContainer);
});
document.getElementById("pacgeAddFake").addEventListener("click", () => {
  console.log("add package");
  toggleSection(packageAddContainer);
});
activeOrdersBtn.addEventListener("click", () => {
  toggleSection(activeOrderLoadContainer, ActiveOrderLoad);
});
historyOrderBtn.addEventListener("click", () => {
  toggleSection(historyOrderContainer, HistoryOrderLoad);
});
todayOrderBtn.addEventListener("click", () => {
  toggleSection(todayOrderLoadContainer, todayOrderLoad);
});
viewAdminBtn.addEventListener("click", () => {
  toggleSection(adminDetailsContainer, loadAllAdmin);
});
packageEditBrn.addEventListener("click", () => {
  toggleSection(packageEditContainer);
});
ValetLoadBtn.addEventListener("click", () => {
  console.log("valet");
  toggleSection(valetLoadContainer, valetLoad);
});
document.getElementById("loadEditPackage").addEventListener("click", () => {
  loadPackagesForEdit();
});
document.getElementById("adminSubmit").addEventListener("click", () => {
  addAdmin();
});
document
  .getElementById("editPackageSubmitBtn")
  .addEventListener("click", () => {
    editPackage();
  });
cancelAdminOrderBtn.addEventListener("click", () => {
  toggleSection(adminCancelOrderContainer, adminCancelOrderLoad);
});
cancelUserOrderBtn.addEventListener("click", () => {
  toggleSection(userCancelOrderContainer, userCancelOrderLoad);
});

//send user load requset
function loadUSers() {
  const apiUrl = server_url + "api/Package/loadAllUser";
  let userProfileTableBody = document.getElementById("userProfileTableBody");
  userProfileTableBody.innerHTML = "";

  // Make the fetch request
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
        console.log(data.data);
        data.data.forEach((element) => {
          console.log(element);
          userProfileTableBody.innerHTML += `
          <tr>
          <td>${element.email}</td>
                
          <td>${element.first_name}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td><button class="btn btn-danger" onclick="userDelete('${element.user_id}')">Delete</btn></td>


          
        </tr>
          `;
        });
      } else {
        window.alert("Something Weny Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
//send user load requset
function loadAllAdmin() {
  const apiUrl = server_url + "api/Admin/allAdminLoad";
  let tableProfileBody = document.getElementById("adminBody");
  tableProfileBody.innerHTML = "";

  // Make the fetch request
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
        console.log(data.data);
        data.data.forEach((element) => {
          console.log(element);
          tableProfileBody.innerHTML += `
          
          <tr>
          <td>${element.full_name}</td>
          <td>${element.email}</td>

          <td>${element.phone_number ? element.phone_number : 'No phone number available'}</td>

                
          <td><button class="btn btn-danger" onclick="adminDelete('${element.admin_id}')">Delete</btn></td>


          
        </tr>
          `;
        });
      } else {
        window.alert("Something Weny Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function adminDelete(id) {
  console.log("deleted");
  if(id==1){
    toastSetup("Default Admin Cannot Delete.")
    return
  }
  const apiUrl = server_url + "api/Admin/adminDelete";
  let formData = new FormData();
  formData.append("id", id);

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
        toastSetup("Successfully Deleted");
        loadAllAdmin();
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

let priceObject = {};
let milstoneAdd = document.getElementById("milstoneAdd");

milstoneAdd.addEventListener("click", () => {
  let milestoneDateInput = document.getElementById("milestoneDate");
  let milstonePriceInput = document.getElementById("milstonePrice");

  let milestoneDate = milestoneDateInput.value;
  let milstonePrice = milstonePriceInput.value;

  console.log("triggerd");

  // Store the milestone in your priceObject
  priceObject[milestoneDate] = milstonePrice;

  // Clear the input fields
  milestoneDateInput.value = "";
  milstonePriceInput.value = "";
  toastSetup("Successfully added milestone. If you want to add another one, you can fill in the same input field")

  console.log(priceObject);
});

function addPackageJoke() {
  let packageName = document.getElementById("packageName").value;
  let walkingTime = document.getElementById("walkingTime").value;
  //let hourPrice = document.getElementById("hourPrice").value;
  let pointForm = document.getElementById("pointForm").value;
  let infoText = document.getElementById("infoText").value;
  let bottomText = document.getElementById("bottomText").value;

  let oneFive = document.getElementById("oneFive").value;
  let oneSeven = document.getElementById("oneSeven").value;
  let extraDay = document.getElementById("extraDay").value;

  //var formattedPrice = parseFloat(element.valet_price).toFixed(2);


  // priceObject.oneFive = oneFive;
  // priceObject.oneSeven = oneSeven;
  // priceObject.extraDay = extraDay;
  //priceObject.milestoneDate = milestoneDate;

  console.log(priceObject);
  console.log(oneFive)
 

  //r//eturn;

  const apiUrl = server_url + "api/package/packageAdd";
  const formData = new FormData();
  formData.append("point_form", pointForm);
  formData.append("name", packageName);
  formData.append("walking_time", walkingTime);
  formData.append("hour_price", JSON.stringify(priceObject));
  formData.append("bottom_text", bottomText);
  formData.append("more_info", infoText);

  formData.append("oneFive", oneFive);
  formData.append("fiveSeven", oneSeven);
  formData.append("extraDay", extraDay);

  //console.log(priceObject)
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
      // Handle the response data
      console.log(data);

      if (data.status == "success") {
        priceObject={}
        toastSetup("Successfully Add Package");
        toggleSection(packageLoadContainer, packageLoad);
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function packageLoad() {
  let cardContainer = document.getElementById("cardContainer");

  cardContainer.innerHTML = "";

  const apiUrl = server_url + "api/package/packageLoad";

  // Make the fetch request
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
      data.forEach((element) => {
        // Split point_form string by the "\r\n" sequence and remove any leading/trailing whitespace
        const points = element.point_form
          .split("\\r\\n")
          .map((point) => point.trim());

        // Remove the opening quote from the first point and the closing quote from the last point
        if (points.length > 0) {
          points[0] = points[0].replace(/^"/, ""); // Remove opening quote from the first point
          points[points.length - 1] = points[points.length - 1].replace(
            /"$/,
            ""
          ); // Remove closing quote from the last point
        }

        // Create list items for each point
        const pointListItems = points
          .map((point) => `<li style="list-style: disc;">${point}</li>`)
          .join("");

        // Create hour price table
        let hourPriceTable = `<table class=" table">`;
        for (const [hour, price] of Object.entries(
          JSON.parse(element.hour_price)
        )) {
          hourPriceTable += `<tr><td>${hour}</td><td>${price}&pound;</td></tr>`;
        }
        hourPriceTable += "</table>";
        var formattedPriceOneFive = parseFloat(element.oneFive).toFixed(2);
        var formattedPricefiveSeven = parseFloat(element.fiveSeven).toFixed(2);
        var formattedPriceextraDate = parseFloat(element.extraDay).toFixed(2);


        cardContainer.innerHTML += `
          <div class="card mx-5 px-3 my-3">
            <div class="heading d-md-flex justify-content-md-center mt-2">
              <h4 class="mx-3">${element.name}</h4>
              <h4 class="mx-3">${element.walking_time} Min Walking</h4>
            </div>
            <div class="point-form">
              <hr>
              <ul>${pointListItems}</ul>
              <hr>
            </div>
            <div class="bottom text">
              <p>${element.bottom_text}</p>
              <hr>
            </div>
            <div class="more-info">${element.more_info}</div>
            <hr>

            <div class="price-section">
              <p>Rates for 1-5 days: ${formattedPriceOneFive}</p>
              <p>Rates for 5-7 days: ${formattedPricefiveSeven}</p>
              <p>Rates for extra day: ${formattedPriceextraDate}</p>
              <hr>
              <h4>Milstone Dates:</h4>
              ${hourPriceTable}
            </div>
            <div class="text-center d-flex justify-content-center mt-3">
              <button class="btn btn-danger mb-4" onclick="deletePackage('${element.package_id}')">Delete</button>
              <button class="btn btn-success mb-4 mx-3" onclick="editPackageToogleFromLoad('${element.name}')">Edit</button>

            </div>
          </div>`;
      });
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function editPackageToogleFromLoad(name){
  toggleSection(packageEditContainer);
  document.getElementById("packageNameEditSearch").value=name
  document.getElementById("loadEditPackage").click()


}


function deletePackage(id) {
  // Display confirmation dialog
  let confirmed = window.confirm("Are you sure you want to delete this package?");
  
  // Check if user confirmed
  if (confirmed) {
    let formData = new FormData();
    formData.append("id", id);

    const apiUrl = server_url + "api/Package/deletePackage";

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
          console.log(data.data);
          toastSetup("Successfully Deleted");
          packageLoad();
        } else {
          toastSetup("Something Went Wrong");
        }
      })
      .catch((error) => {
        // Handle any errors that occurred during the fetch
        console.error("There was a problem with the fetch operation:", error);
      });
  } else {
    // If the user cancels the deletion
    console.log("Deletion canceled by user.");
  }
}

document.getElementById("activeSearchBtn").addEventListener("click", () => {
  console.log("triggerd");
  let activeOrderProfileBody = document.getElementById(
    "activeOrderProfileBody"
  );
  console.log("triggerd");
  let id = document.getElementById("activeSearchInput").value;

  let formData = new FormData();

  formData.append("id", id);

  //ActiveOrderTableContainer.innerHTML = "";

  const apiUrl = server_url + "api/OrderTracker/adminAllActiveOrder";

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
        console.log(data.data);
        activeOrderProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          activeOrderProfileBody.innerHTML += `
          <tr>
          <td>${element.parking_id}</td>
       
          <td>${element.user_user_id}</td>
          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
          <td>${element.registation_number}</td>
          <td>${element.flight_number}</td>
          <td>${element.name}</td>
          <td>${element.email}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
          <td><button class="btn btn-danger" onclick="cancelModelOpener('${element.payment_id}')">Cancel</button></td>
          <td><button class="btn btn-success" onclick="completeOrder('${element.parking_id}')">Complete</button></td>

        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
});
function ActiveOrderLoad() {
  console.log("triggerd");
  let activeOrderProfileBody = document.getElementById(
    "activeOrderProfileBody"
  );
  console.log("triggerd");
  var id = 0;
  let formData = new FormData();

  formData.append("id", id);

  //ActiveOrderTableContainer.innerHTML = "";

  const apiUrl = server_url + "api/OrderTracker/adminAllActiveOrder";

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
        console.log(data.data);
        activeOrderProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          activeOrderProfileBody.innerHTML += `
          <tr>
          <td><button class="btn btn-danger" onclick="cancelModelOpener('${element.payment_id}')">Cancel</button></td>
          <td><button class="btn btn-success" onclick="completeOrder('${element.parking_id}')">Complete</button></td>
          <td><button class="btn btn-primary" onclick="printTcketFromActiveOrderLoad('${element.parking_id}')">Ticket</button></td>

          <td>${element.parking_id}</td>
       
          <td>${element.user_user_id}</td>
          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
          <td>${element.registation_number}</td>
          <td>${element.flight_number}</td>
          <td>${element.name}</td>
          <td>${element.email}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
         

        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

document.getElementById("historySearchSubmit").addEventListener("click", () => {
  let historyOrderProfileBody = document.getElementById(
    "historyOrderProfileBody"
  );

  //ActiveOrderTableContainer.innerHTML = "";
  var id = document.getElementById("historySearchInput").value;
  let formData = new FormData();

  formData.append("id", id);

  const apiUrl = server_url + "api/OrderTracker/adminCompletedOrderLoad";

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
        console.log(data.data);
        historyOrderProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          historyOrderProfileBody.innerHTML += `
          <tr>
          <td>${element.parking_id}</td>
          <td>${element.user_user_id}</td>
          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
          <td>${element.registation_number}</td>
          <td>${element.flight_number}</td>
          <td>${element.name}</td>
          <td>${element.email}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
         
        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
});

function printTcketFromActiveOrderLoad(id){
  toggleSection(adminHomeContainer);
  console.log
  document.getElementById("printBill").value=id;
  document.getElementById("genarateKey").click()


  
}


function HistoryOrderLoad() {
  let historyOrderProfileBody = document.getElementById(
    "historyOrderProfileBody"
  );

  //ActiveOrderTableContainer.innerHTML = "";
  var id = 0;
  let formData = new FormData();

  formData.append("id", id);

  const apiUrl = server_url + "api/OrderTracker/adminCompletedOrderLoad";

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
        console.log(data.data);
        historyOrderProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          historyOrderProfileBody.innerHTML += `
          <tr>
          <td>${element.parking_id}</td>
          <td>${element.user_user_id}</td>

          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
          <td>${element.registation_number}</td>
          <td>${element.flight_number}</td>
          <td>${element.name}</td>
          <td>${element.email}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
         
        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function userDelete(userId) {
  console.log("deleted");
  const apiUrl = server_url + "api/User/delete";
  let formData = new FormData();
  formData.append("id", userId);

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
      if ((data.status = "success")) {
        toastSetup("Successfully Deleted");
        loadUSers();
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function departingUpdater() {
  let activeOrderProfileBody = document.getElementById(
    "homeActiveOrderProfileBody"
  );

  //ActiveOrderTableContainer.innerHTML = "";

  const apiUrl = server_url + "api/AdminHomeUpdater/todayOrderupdater";

  // Make the fetch request
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
        console.log(data.data);
        activeOrderProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          activeOrderProfileBody.innerHTML += `
          <tr>
          <td>${element.parking_id}</td>
          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
         
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
          <td><button class="btn btn-danger" onclick="cancelModelOpener('${element.payment_id}')">Cancel</button></td>
          <td><button class="btn btn-success" onclick="completeOrder('${element.parking_id}')">Complete</button></td>

        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function completeOrder(parkId) {
  console.log("triggeed");
  const apiUrl = server_url + "api/OrderTracker/adminCompleteOrder";
  let formData = new FormData();
  formData.append("parkingId", parkId);

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
        toastSetup("Successfully Completed Booking");
        ActiveOrderLoad();
        departingUpdater();
        todayOrderLoad();
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

//let cancelModelOpener = document.getElementById("cancelModelOpener");

let cancelModal = new bootstrap.Modal("#cancelModal");

function cancelModelOpener(paymentId) {
  cancelModal.show();
  document.getElementById("cancelRefundBtn").addEventListener("click", () => {
    const apiUrl = server_url + "api/PaymentHandler/refundAdmin";
    let formData = new FormData();
    formData.append("amount", document.getElementById("cancelAmount").value);
    formData.append("paymenId", paymentId);
    toastSetup("Please Wait a Second");

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
          toastSetup(
            "Refund Completed Sucessfully(it will take few days to add in cusomer account)"
          );
          ActiveOrderLoad();
          todayOrderLoad();
          cancelModal.hide();
        } else {
          toastSetup("Something Went Wrong");
        }
      })
      .catch((error) => {
        // Handle any errors that occurred during the fetch
        console.error("There was a problem with the fetch operation:", error);
      });
  });

  document
    .getElementById("cancelwithoutrefundBtn")
    .addEventListener("click", () => {
      console.log("triggerd");
      const apiUrl = server_url + "api/OrderTracker/adminCancelOrder";
      let formData = new FormData();
      formData.append("paymenId", paymentId);

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
            toastSetup("Order cancel Successfully");
            ActiveOrderLoad();
            cancelModal.hide();
          } else {
            toastSetup("Something Went Wrong");
          }
        })
        .catch((error) => {
          // Handle any errors that occurred during the fetch
          console.error("There was a problem with the fetch operation:", error);
        });
    });
}

function packageUpdater() {
  document.getElementById("packageUpdateFrom").classList.remove("d-none");
}

function todayOrderLoad() {
  let todayOrderLoadProfileBody = document.getElementById(
    "todayOrderLoadProfileBody"
  );

  //ActiveOrderTableContainer.innerHTML = "";

  const apiUrl = server_url + "api/AdminHomeUpdater/accualaTodayOrderUpdater";

  // Make the fetch request
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
        console.log(data.data);
        todayOrderLoadProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          todayOrderLoadProfileBody.innerHTML += `
          <tr>
          <td><button class="btn btn-danger" onclick="cancelModelOpener('${element.payment_id}')">Cancel</button></td>
          <td><button class="btn btn-success" onclick="completeOrder('${element.parking_id}')">Complete</button></td>
          <td>${element.parking_id}</td>
       
          <td>${element.user_user_id}</td>
          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
          <td>${element.registation_number}</td>
          <td>${element.flight_number}</td>
          <td>${element.name}</td>
          <td>${element.email}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
         

        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function adminCancelOrderLoad() {
  let todayOrderLoadProfileBody = document.getElementById(
    "adminCancelOrderProfileBody"
  );

  //ActiveOrderTableContainer.innerHTML = "";

  const apiUrl = server_url + "api/OrderTracker/adminCancelOrderLoad";

  // Make the fetch request
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
        console.log(data.data);
        todayOrderLoadProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          todayOrderLoadProfileBody.innerHTML += `
          <tr>
          <td>${element.parking_id}</td>
       
          <td>${element.user_user_id}</td>
          <td>${element.refund}</td>

          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
          <td>${element.registation_number}</td>
          <td>${element.flight_number}</td>
          <td>${element.name}</td>
          <td>${element.email}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
        

        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function userCancelOrderLoad() {
  let todayOrderLoadProfileBody = document.getElementById(
    "userCancelOrderProfileBody"
  );

  //ActiveOrderTableContainer.innerHTML = "";

  const apiUrl = server_url + "api/OrderTracker/userCancelOrderLoad";

  // Make the fetch request
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
        console.log(data.data);
        todayOrderLoadProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          todayOrderLoadProfileBody.innerHTML += `
          <tr>
          <td>${element.parking_id}</td>
       
          <td>${element.user_user_id}</td>
          <td>${element.arrival}</td>
          <td>${element.exitDetails}</td>
          <td>${element.registation_number}</td>
          <td>${element.flight_number}</td>
          <td>${element.name}</td>
          <td>${element.email}</td>
          <td>${element.last_name}</td>
          <td>${element.telephone}</td>
          <td>${element.postal_code}</td>
          <td>${element.payment_id}</td>
          <td>${element.full_amount}&pound;</td>
          <td>${element.date_time}</td>
        
        </tr>
          `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function packageNameSuggester() {
  console.log("deleted");
  const packageNameEditSearch = document.getElementById("packageNameEditSearch");
  const suggestionsList = document.getElementById("suggestions");

  const apiUrl = server_url + "api/Package/nameSuggester";
  let names = [];

  // Make the fetch request
  fetch(apiUrl, {
    method: "GET"
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
      data.data.forEach(element => {
        names.push(element.name)
      });

      // Function to suggest names based on user input
      function suggestNames(input) {
        const inputValue = input.value.toLowerCase();
        const suggestedNames = names.filter(name => name.toLowerCase().startsWith(inputValue));

        // Clear previous suggestions
        suggestionsList.innerHTML = "";

        // Add new suggestions to the list
        suggestedNames.forEach(name => {
          const listItem = document.createElement("li");
          listItem.textContent = name;
          listItem.addEventListener("click", function() {
            // Fill input field with the clicked name
            packageNameEditSearch.value = name;
            // Clear suggestions
            suggestionsList.innerHTML = "";
          });
          suggestionsList.appendChild(listItem);
        });
      }

      // Event listener for input event
      packageNameEditSearch.addEventListener("input", function() {
        suggestNames(this);
      });
    } else {
      // Handle unsuccessful response
    }
  })
  .catch((error) => {
    // Handle any errors that occurred during the fetch
    console.error("There was a problem with the fetch operation:", error);
  });
}
packageNameSuggester()

let editMilstoneObject={}
// Function to load packages for edit
function loadPackagesForEdit() {
  let infoTextEdit = document.getElementById("infoTextEdit");
  let pointFormEdit = document.getElementById("pointFormEdit");
  let walkingTimeEdit = document.getElementById("walkingTimeEdit");
  let packageNameEdit = document.getElementById("packageNameEdit");
  let bottomTextEdit = document.getElementById("bottomTextEdit");
  let packageNameEditSearch = document.getElementById("packageNameEditSearch").value;

  let oneFiveEdit = document.getElementById("oneFiveEdit");
  let oneSevenEdit = document.getElementById("oneSevenEdit");
  let extraDayEdit = document.getElementById("extraDayEdit");

  let formData = new FormData();
  formData.append("name", packageNameEditSearch);

  console.log("triggered");
  const apiUrl = server_url + "api/Package/packageLoadForEdit";

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
        console.log(data.data);

        data.data.forEach((element) => {
          infoTextEdit.value = element.more_info;
          const pointFormValue = JSON.parse(element.point_form);
          pointFormEdit.value = pointFormValue.replace(/\\r\\n/g, "\n");
          packageNameEdit.value = element.name;
          walkingTimeEdit.value = element.walking_time;
          console.log(element.walking_time);
          bottomTextEdit.value = element.bottom_text;

          var formattedPriceOneFive = parseFloat(element.oneFive).toFixed(2);
          var formattedPricefiveSeven = parseFloat(element.fiveSeven).toFixed(2);
          var formattedPriceextraDate = parseFloat(element.extraDay).toFixed(2);
  



          oneFiveEdit.value = formattedPriceOneFive;
          oneSevenEdit.value = formattedPricefiveSeven;
          extraDayEdit.value = formattedPriceextraDate;
          let dataObject = JSON.parse(element.hour_price);

          // Function to delete a row
          function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            var dateInput = row.cells[0].querySelector('input[type="text"]');
            var date = dateInput ? dateInput.value : '';
            delete dataObject[date];
            row.parentNode.removeChild(row);
            toastSetup("Successfully Deleted")
          }

          // Add event listener for the delete button clicks (using event delegation)
          document.getElementById('dataTable').addEventListener('click', function(event) {
            if (event.target && event.target.tagName === 'BUTTON') {
              if (event.target.classList.contains('delete-button')) {
                deleteRow(event.target);
              }
            }
          });

          // Your existing code...
          var tableBody = document
            .getElementById("dataTable")
            .getElementsByTagName("tbody")[0];
          tableBody.innerHTML = "";
          for (var key in dataObject) {
            if (dataObject.hasOwnProperty(key)) {
              var row = tableBody.insertRow();
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = '<input type="text" value="' + key + '">';
              cell2.innerHTML =
                '<input type="text" value="' + dataObject[key] + '">';
              cell3.innerHTML =
                '<button class="delete-button btn btn-danger">Delete</button>';
            }
          }
          document.getElementById('saveChanges').addEventListener('click', () => {
            event.preventDefault();
            var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            var rows = tableBody.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
              var cells = rows[i].getElementsByTagName('td');
              var dateInput = cells[0].querySelector('input[type="text"]');
              var date = dateInput ? dateInput.value : '';
              var valueInput = cells[1].querySelector('input[type="text"]');
              var value = valueInput ? valueInput.value : '';
              if (date !== '') {
                dataObject[date] = value;
              }
            }
            console.log(dataObject);
          toastSetup("Successfully Saved")
          localStorage.setItem("mileEdit", JSON.stringify(dataObject));

          });

          // Your existing code...
          document.getElementById('addRow').addEventListener('click', () => {
            event.preventDefault();
            var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            var row = tableBody.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = '<input type="text">';
            cell2.innerHTML = '<input type="text">';
            cell3.innerHTML = '<button class="delete-button btn btn-danger">Delete</button>';
          localStorage.setItem("mileEdit", JSON.stringify(dataObject));
          toastSetup("Successfully Added,Click Save button to save")

          });

          console.log();
          
          //console.log(element.)
          localStorage.setItem("PackageId", element.package_id);
          localStorage.setItem("mileEdit", JSON.stringify(dataObject));

        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}


function editPackage() {
 
  let infoText = document.getElementById("infoTextEdit").value;
  let pointForm = document.getElementById("pointFormEdit").value;
  let walkingTime = document.getElementById("walkingTimeEdit").value;
  //let hourPrice = document.getElementById("hourPriceEdit").value;
  let packageName = document.getElementById("packageNameEdit").value;
  let bottomTexts = document.getElementById("bottomTextEdit").value;

  let oneFiveEdit = document.getElementById("oneFiveEdit").value;
  let oneSevenEdit = document.getElementById("oneSevenEdit").value;
  let extraDayEdit = document.getElementById("extraDayEdit").value;

  const apiUrl = server_url + "api/package/packageUpdate";

  const formData = new FormData();
  formData.append("point_form", pointForm);
  formData.append("name", packageName);
  formData.append("walking_time", walkingTime);
  formData.append("hour_price", localStorage.getItem('mileEdit'));
  formData.append("bottom_text", bottomTexts);
  formData.append("more_info", infoText);


  formData.append("oneFive", oneFiveEdit);
  formData.append("fiveSeven", oneSevenEdit);
  formData.append("extraDay", extraDayEdit);

  formData.append("package_id", localStorage.getItem("PackageId"));

  console.log(JSON.parse(localStorage.getItem('mileEdit')));
  //return

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
        console.log(data)
        toastSetup("Successfully Updated Data ");
        editMilstoneObject={}
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function addAdmin() {
  let adminFullName = document.getElementById("adminFullName").value;
  let adminPassowrd = document.getElementById("adminPassowrd").value;
  let adminEmail = document.getElementById("adminEmail").value;

  const apiUrl = server_url + "api/Admin/adminAdd";

  const formData = new FormData();
  formData.append("email", adminEmail);
  formData.append("password", adminPassowrd);
  formData.append("fullName", adminFullName);
  toastSetup("Your Request Is Processing");

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
      console.log(data)
      if (data.status == "success") {
        toastSetup("Successfully Send Login Details To Admin ");
        loadAllAdmin()
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

document.getElementById("changeDetails").addEventListener("click", () => {
  const apiUrl = server_url + "api/Admin/loadSingleAdmin";

  // Make the fetch request
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
        data.data.forEach((element) => {
          createModal(
            "Change Details",
            `  <div class="">
            <div>
              <label for="">Email</label>
              <input type="text" class="form-control" id="adminEmailUpdate" value="${element.email}">
            </div>
            <div>
              <label for="">Password</label>
              <input type="text" class="form-control" id="adminPasswordUpdate">
              <small class=" text-muted">Enter Your New Password or Existing Password</small>
            </div>
            <div>
              <label for="">Full Name</label>
              <input type="text" class="form-control" id="adminFullNameUpdate" value="${element.full_name}">
            </div>
            <div>
              <label for="">Telephone</label>
              <input type="text" class="form-control" id="adminTelephoneUpdate" value="${element.phone_number}">
            </div>
          </div>
          <div class="text-center">
            <button class="btn btn-primary mt-3" id="adminDetailsSubmit" onclick="updateAdmin()">Change Details</button>
          </div>
          `,
            false,
            66
          );
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
});

function updateAdmin() {
  console.log("triggerd");
  const adminEmailUpdate = document
    .getElementById("adminEmailUpdate")
    .value.trim();
  const adminPasswordUpdate = document
    .getElementById("adminPasswordUpdate")
    .value.trim();
  const adminFullNameUpdate = document
    .getElementById("adminFullNameUpdate")
    .value.trim();
  const adminTelephoneUpdate = document
    .getElementById("adminTelephoneUpdate")
    .value.trim();
  if (
    adminEmailUpdate === "" ||
    adminPasswordUpdate === "" ||
    adminFullNameUpdate === "" ||
    adminTelephoneUpdate === ""
  ) {
    toastSetup("Please Fill All Input Fields");
    return;
  }

  const formData = new FormData();

  if (adminEmailUpdate !== "") {
    formData.append("email", adminEmailUpdate);
  }

  if (adminPasswordUpdate !== "") {
    formData.append("password", adminPasswordUpdate);
  }

  if (adminFullNameUpdate !== "") {
    formData.append("full_name", adminFullNameUpdate);
  }

  if (adminTelephoneUpdate !== "") {
    formData.append("telephone", adminTelephoneUpdate);
  }

  const apiUrl = server_url + "api/Admin/adminUpdate";

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
        toastSetup("Successfully Updated");
        ActiveOrderLoad();
        cancelModal.hide();
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

// document.getElementById("ValetLoadBtn").addEventListener("click", () => {

//  valetModelOpener()

// });
function valetable() {
  // Make the fetch request
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
      console.log(data);
      if (data.status == "success") {
        toastSetup("Order cancel Successfully");
        ActiveOrderLoad();
        cancelModal.hide();
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
// function valetModelOpener(){
//   createModal(
//     "Update Price",
//     ` <div class=" d-sm-flex text-sm-start text-center mb-3">
//   <div>
//       <label for="selexcrt" class="alg-text-p">Valet Packages</label>
//       <select class="custom-select alg-text-p px-4 py-2" id="selectType">
//           <option selected value="Full Valet">Full Valet</option>
//           <option value="Interior Valet">Interior Valet</option>
//           <option value="Wash">Wash</option>
//           <option value="Vac">Vac</option>
//       </select>
//   </div>

//   <div class="mx-sm-5 mt-sm-0 mt-3">
//       <label for="selexcrt" class="alg-text-p">Valet Packages</label>
//       <select class="custom-select alg-text-p vpx-4 px-4 py-2" id="selectVechle">
//           <option selected value="Car">Car</option>
//           <option value="4X4/MPV">4X4/MPV</option>

//       </select>
//       </div>
//       <div>

//       <label for="selexcrt" class="alg-text-p">Price</label>

//       <input type="number" class="form-control" style="border:1px solid black" id="valetPrice">
//     </div>

//     </div>
// <div class=" text-center">

//     <button class="btn btn-success" onclick="updateValet()">Update</button>
// </div>`,
//     false,
//     "openValet"
//   );

// }
function updateValet() {
  let selectVechle = document.getElementById("selectVechle").value;
  let selectType = document.getElementById("selectType").value;
  let valetPrice = document.getElementById("valetPrice").value;

  const apiUrl = server_url + "api/Valet/valetUpdate";
  const formData = new FormData();
  formData.append("valetId", selectType);
  formData.append("valetVechile", selectVechle);
  formData.append("price", valetPrice);

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
        console.log(data.data);
        toastSetup("Successfully Updated");
        valetLoad();
      } else {
        toastSetup(data.error);
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function valetLoad() {
  const apiUrl = server_url + "api/Valet/valetPriceShower";
  let valetLoadProfileBody = document.getElementById("valetLoadProfileBody");

  // Make the fetch request
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
        console.log(data.data);
        valetLoadProfileBody.innerHTML = "";
        data.data.forEach((element) => {
          console.log(element);
          var formattedPrice = parseFloat(element.valet_price).toFixed(2);
          valetLoadProfileBody.innerHTML += `
        <tr>
            <td>${element.valet_id}</td>
            <td>${element.valet_type}</td>
            <td>${element.valet_car}</td>
            <td>${formattedPrice}</td>
        </tr>
    `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
