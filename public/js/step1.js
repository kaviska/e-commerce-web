let dateStart = document.getElementById("dateStart");
let timeStart = document.getElementById("timeStart");
let dateEnd = document.getElementById("dateEnd");
let TimeEnd = document.getElementById("TimeEnd");
let homeBtn = document.getElementById("homeBtn");
let editDetails = document.getElementById("editDetails");




const editDetailsButton = document.getElementById("editDetails");
const editSection = document.getElementById("editSection");

editDetailsButton.addEventListener("click", () => {
  if (editSection.classList.contains("d-none")) {
    editSection.classList.remove("d-none");
  } else {
    editSection.classList.add("d-none");
  }
});


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

const today = new Date().toISOString().split("T")[0];
dateStart.setAttribute("min", today);
dateEnd.setAttribute("min", today);

// Get today's date
var todayPleaceholder = new Date();

// Format the date as yyyy-mm-dd (required format for input type date)
var formattedDate = todayPleaceholder.toISOString().slice(0, 10);

// Set the value of the input field to today's date
dateStart.setAttribute("value", localStorage.getItem("DateStart"));
dateEnd.setAttribute("value", localStorage.getItem("DateEnd"));

// Get the current time in the user's local timezone
var localTime = new Date();

// Adjust the time to GMT+1 timezone
var gmtPlusOneTime = new Date(localTime.getTime() + 1 * 60 * 60 * 1000); // Adding 1 hour

// Format the time as hh:mm (required format for input type time)
var formattedTime = gmtPlusOneTime.toTimeString().slice(0, 5);

// Set the value of the input field to the adjusted time in GMT+1

timeStart.setAttribute("value", localStorage.getItem("TimeStart"));
TimeEnd.setAttribute("value", localStorage.getItem("TimeEnd"));

homeBtn.addEventListener("click", () => {
  DateTimeStore();
});

function DateTimeStore() {
  // Get the values of dateStart and dateEnd inputs
  const startDate = new Date(dateStart.value);
  const endDate = new Date(dateEnd.value);

  // Check if end date is less than start date
  if (endDate < startDate) {
    toastSetup("End date must be after start date.");
    return;
  }

  // Check if any field is empty
  if (
    dateStart.value === "" ||
    timeStart.value === "" ||
    dateEnd.value === "" ||
    TimeEnd.value === ""
  ) {
    toastSetup("Please fill all fields.");
    return;
  }

  // Store values in localStorage
  localStorage.setItem("DateStart", dateStart.value);
  localStorage.setItem("DateEnd", dateEnd.value);
  localStorage.setItem("TimeStart", timeStart.value);
  localStorage.setItem("TimeEnd", TimeEnd.value);

  // Proceed to next step
  window.location.href = "/step1";
}

let enteryDDispaly = document.getElementById("enteryDDispaly");
let entryTDisplay = document.getElementById("entryTDisplay");
let exitDDisplay = document.getElementById("exitDDisplay");
let exitTDisplay = document.getElementById("exitTDisplay");
let cardContainer = document.getElementById("cardContainer");

////event Listners
//signupSubmit.addEventListener("click", () => {
//  signUp();
//  console.log("triggered");
//});
//signinSubmit.addEventListener("click", () => {
//  signIn();
//});
//
//frogotPasswordSubmit.addEventListener("click", () => {
//  fogotPasswordHandler();
//});
document.addEventListener("DOMContentLoaded", () => {
  valetPriceHandleForFullValetAndCar();
});

// Add event listener for change event
selectType.addEventListener("change", function (event) {
  const selectedValue = event.target.value;
  console.log("Selected valet package:", selectedValue);
  valetPriceHandler();
});

document
  .getElementById("selectVechle")
  .addEventListener("change", function (event) {
    const selectedValue = event.target.value;
    console.log("Selected vehicle type:", selectedValue);
    valetPriceHandler();
  });

document.getElementById("editBookingDetails").addEventListener("click", () => {
  const editSection = document.getElementById("editSection");
  const arrowIcon = document.getElementById("arrowIcon");
  editSection.classList.toggle("d-none");
  // Toggle arrow icon direction
  if (editSection.classList.contains("d-none")) {
    arrowIcon.classList.remove("bi-arrow-up");
    arrowIcon.classList.add("bi-arrow-down");
  } else {
    arrowIcon.classList.remove("bi-arrow-down");
    arrowIcon.classList.add("bi-arrow-up");
  }//

  //dynamicallyPAckageValetUpdater();
});
//let dateStart = document.getElementById("dateStart");
//let timeStart = document.getElementById("timeStart");
//let dateEnd = document.getElementById("dateEnd");
//let TimeEnd = document.getElementById("TimeEnd");
//let homeBtn = document.getElementById("homeBtn");
//const editDetailsButton = document.getElementById("editDetails");
//const editSection = document.getElementById("editSection");
//
//editDetailsButton.addEventListener("click", () => {
//  if (editSection.classList.contains("d-none")) {
//    editSection.classList.remove("d-none");
//  } else {
//    editSection.classList.add("d-none");
//  }
//});

//const today = new Date().toISOString().split("T")[0];
//dateStart.setAttribute("min", today);
//dateEnd.setAttribute("min", today);
//
//// Get today's date
//var todayPleaceholder = new Date();
//
//// Format the date as yyyy-mm-dd (required format for input type date)
//var formattedDate = todayPleaceholder.toISOString().slice(0, 10);
//
//// Set the value of the input field to today's date
//dateStart.setAttribute("value", localStorage.getItem("DateStart"));
//dateEnd.setAttribute("value", localStorage.getItem("DateEnd"));
//
//// Get the current time in the user's local timezone
//var localTime = new Date();
//
//// Adjust the time to GMT+1 timezone
//var gmtPlusOneTime = new Date(localTime.getTime() + 1 * 60 * 60 * 1000); // Adding 1 hour
//
//// Format the time as hh:mm (required format for input type time)
//var formattedTime = gmtPlusOneTime.toTimeString().slice(0, 5);
//
//// Set the value of the input field to the adjusted time in GMT+1
//
//timeStart.setAttribute("value", localStorage.getItem("TimeStart"));
//TimeEnd.setAttribute("value", localStorage.getItem("TimeEnd"));
//
//homeBtn.addEventListener("click", () => {
//  DateTimeStore();
//  console.log("triggerd");
//});
//
//function DateTimeStore() {
//  // Get the values of dateStart and dateEnd inputs
//  const startDate = new Date(dateStart.value);
//  const endDate = new Date(dateEnd.value);
//
//  // Check if end date is less than start date
//  if (endDate < startDate) {
//    toastSetup("End date must be after start date.");
//    return;
//  }
//
//  // Check if any field is empty
//  if (
//    dateStart.value === "" ||
//    timeStart.value === "" ||
//    dateEnd.value === "" ||
//    TimeEnd.value === ""
//  ) {
//    toastSetup("Please fill all fields.");
//    return;
//  }
//  // Store values in localStorage
//  localStorage.setItem("DateStart", dateStart.value);
//  localStorage.setItem("DateEnd", dateEnd.value);
//  localStorage.setItem("TimeStart", timeStart.value);
//  localStorage.setItem("TimeEnd", TimeEnd.value);
//
//  // Proceed to next step
//  window.location.href = "";
//}
//function dynamicallyDataUpdater() {
//  let dataStart = localStorage.getItem("DateStart");
//  let dateEnd = localStorage.getItem("DateEnd");
//  let timeStart = localStorage.getItem("TimeStart");
//  let timeEnd = localStorage.getItem("TimeEnd");
//  let enteryDDispaly = document.getElementById("enteryDDispaly");
//  let entryTDisplay = document.getElementById("entryTDisplay");
//  let exitDDisplay = document.getElementById("exitDDisplay");
//  let exitTDisplay = document.getElementById("exitTDisplay");
//
//  if (
//    dataStart == null &&
//    dateEnd == null &&
//    timeStart == null &&
//    timeEnd == null
//  ) {
//    window.location.href = "./home";
//    return;
//  }
//  enteryDDispaly.textContent = dataStart;
//  entryTDisplay.textContent = timeStart;
//  exitDDisplay.textContent = dateEnd;
//  exitTDisplay.textContent = timeEnd;
//}

function valetHandler() {
  let selectVechle = document.getElementById("selectVechle").value;
  let selectType = document.getElementById("selectType").value;

  const apiUrl = server_url + "api/Valet/valetToPackage";
  const formData = new FormData();
  formData.append("valetId", selectType);
  formData.append("valetVechile", selectVechle);

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
        document.getElementById("priceValet").innerHTML = "";
        document.getElementById("priceValet").innerHTML = Number(
          data.data
        ).toFixed(2);
        //let amount = Math.round(localStorage.getItem("price") * dateTimeDifference())

        //console.log(amount)

        //let finalPrice = parseFloat(amount) + parseFloat(Number(data.data).toFixed(2));
        //localStorage.setItem('price', finalPrice);
        localStorage.setItem("valetPrice", Number(data.data).toFixed(2));
        localStorage.setItem("valetId", data.valetId);
        localStorage.setItem("valetName", data.valetName);

        console.log(localStorage.getItem("valetName"));

        console.log(localStorage.getItem("price"));
        //toastSetup("Successfully Added");
        dynamicPriceUpdater();
      } else {
        toastSetup(data.error);
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function valetPriceHandler() {
  let selectVechle = document.getElementById("selectVechle").value;
  let selectType = document.getElementById("selectType").value;

  const apiUrl = server_url + "api/Valet/valetToPackage";
  const formData = new FormData();
  formData.append("valetId", selectType);
  formData.append("valetVechile", selectVechle);

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
        document.getElementById("priceValet").innerHTML = "";
        document.getElementById("priceValet").innerHTML = Number(
          data.data
        ).toFixed(2);
        //let amount = Math.round(localStorage.getItem("price") * dateTimeDifference())

        //console.log(amount)

        console.log(localStorage.getItem("valetName"));

        console.log(localStorage.getItem("price"));
        //dynamicPriceUpdater();
      } else {
        toastSetup(data.error);
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}
function valetPriceHandleForFullValetAndCar() {
  let selectVechle = "Car";
  let selectType = "Full Valet";

  const apiUrl = server_url + "api/Valet/valetToPackage";
  const formData = new FormData();
  formData.append("valetId", selectType);
  formData.append("valetVechile", selectVechle);

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
        document.getElementById("priceValet").innerHTML = "";
        document.getElementById("priceValet").innerHTML = Number(
          data.data
        ).toFixed(2);
        //let amount = Math.round(localStorage.getItem("price") * dateTimeDifference())

        //console.log(amount)

        //console.log(localStorage.getItem("valetName"));
        //
        //console.log(localStorage.getItem("price"));
        //dynamicPriceUpdater();
      } else {
        toastSetup(data.error);
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

//function valetHandlerFull() {
//  let selectVechle = "Car";
//  let selectType = "Full Valet";
//
//  document.getElementById("selectType").selectedIndex = 0;
//  document.getElementById("selectVechle").selectedIndex = 0;
//
//  const apiUrl = server_url + "api/Valet/valetToPackage";
//  const formData = new FormData();
//  formData.append("valetId", selectType);
//  formData.append("valetVechile", selectVechle);
//
//  // Make the fetch request
//  fetch(apiUrl, {
//    method: "POST",
//    body: formData,
//  })
//    .then((response) => {
//      if (response.ok) {
//        return response.json(); // Parse the JSON response
//      } else {
//        throw new Error("Network response was not ok");
//      }
//    })
//    .then((data) => {
//      console.log(data);
//      if (data.status == "success") {
//        console.log(data.data);
//        document.getElementById("priceValet").innerHTML = "";
//        document.getElementById("priceValet").innerHTML = Number(
//          data.data
//        ).toFixed(2);
//        //let amount = Math.round(localStorage.getItem("price") * dateTimeDifference())
//
//        //console.log(amount)
//
//        //let finalPrice = parseFloat(amount) + parseFloat(Number(data.data).toFixed(2));
//        //localStorage.setItem('price', finalPrice);
//        localStorage.setItem("valetPrice", Number(data.data).toFixed(2));
//        localStorage.setItem("valetId", data.valetId);
//        console.log(localStorage.getItem("price"));
//        toastSetup("Successfully Added")
//        dynamicPriceUpdater();
//      } else {
//        toastSetup(data.error);
//      }
//    })
//    .catch((error) => {
//      // Handle any errors that occurred during the fetch
//      console.error("There was a problem with the fetch operation:", error);
//    });
//}

async function dynamicPriceUpdater() {
  const packageId = localStorage.getItem("packageId");
  console.log(packageId);
  let finalAmount = document.getElementById("finalAmount");
  finalAmount.innerHTML = ``;

  if (!localStorage.getItem("packageId")) {
    finalAmount.innerHTML = "0.00";
    return;
  }

  try {
    const price = await priceHandlerForInstance(
      dateTimeDifference(),
      packageId
    );
    console.log(parseFloat(price));
    console.log(dateTimeDifference());

    finalAmount.innerHTML = parseFloat(price);
    if (localStorage.getItem("valetPrice")) {
      const valetPrice = parseFloat(localStorage.getItem("valetPrice"));

      // Calculate the total
      const total = valetPrice + parseFloat(price);

      // Display the total
      console.log(total);
      finalAmount.innerHTML = "";
      finalAmount.innerHTML = total;
    }
  } catch (error) {
    console.error("Error:", error);
    // Handle error appropriately, e.g., display an error message to the user
  }
}
function dynamicallyPAckageValetUpdater() {
  let packageName = document.getElementById("packageName");
  let arrive = document.getElementById("arrive");
  let cancelBtn = document.getElementById("cancelBtn");
  let exit = document.getElementById("exit");

  packageName.innerHTML = localStorage.getItem("packageName");
  arrive.innerHTML =
    localStorage.getItem("DateStart") + " " + localStorage.getItem("TimeStart");
  exit.innerHTML =
    localStorage.getItem("DateEnd") + " " + localStorage.getItem("TimeEnd");

  cancelBtn.addEventListener("click", () => {
    localStorage.removeItem("DateStart");
    localStorage.removeItem("TimeStart");
    localStorage.removeItem("DateEnd");
    localStorage.removeItem("packageName");
    localStorage.removeItem("TimeEnd");
    localStorage.removeItem("valetPrice");
    localStorage.removeItem("valetId");

    location.href = "./home";
  });
}

document.addEventListener("DOMContentLoaded", () => {
  PackageLaod();
  localStorage.removeItem("valetPrice");
  localStorage.removeItem("valetId");
  localStorage.removeItem("valetName");
});

function PackageLaod() {
  let dataStart = localStorage.getItem("DateStart");
  let dateEnd = localStorage.getItem("DateEnd");
  let timeStart = localStorage.getItem("TimeStart");
  let timeEnd = localStorage.getItem("TimeEnd");

  if (
    dataStart == null &&
    dateEnd == null &&
    timeStart == null &&
    timeEnd == null
  ) {
    window.location.href = "./home";
    return;
  }
  enteryDDispaly.textContent = dataStart;
  entryTDisplay.textContent = timeStart;
  exitDDisplay.textContent = dateEnd;
  exitTDisplay.textContent = timeEnd;

  const timeDifference = dateTimeDifference();
  console.log("time difference is", timeDifference);

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
        localStorage.setItem("packageId", element.package_id);
        localStorage.setItem("packageName", element.name);
        
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

          .map((point) => `<li class="alg-text-p" >${point}</li>`)
          .join("");

        cardContainer.innerHTML += `
          <div class=" mx-sm-5 card" style="border-radius:16px;">
          
          <input type="checkbox" name="" id="" class="text-start tick-two package-tick" onclick="storePackageData( '${
            element.package_id
          }','${element.name}')">

              <h3 class=" text-center alg-bolder heading-up">
                  ${element.name}
                  <br>
                  <span class="">&pound;${(() => {
                    const date = timeDifference;
                    const priceObject = JSON.parse(element.hour_price);
                    console.log(priceObject);
                    var formattedPriceOneFive = parseFloat(
                      element.oneFive
                    ).toFixed(2);
                    var formattedPricefiveSeven = parseFloat(
                      element.fiveSeven
                    ).toFixed(2);

                    if (date <= 5) {
                      return formattedPriceOneFive; // Assuming oneFive is a property of priceObject
                    } else if (date <= 7) {
                      return formattedPricefiveSeven;
                    } else {
                      for (const key in priceObject) {
                        if (parseInt(key) == date) {
                          return priceObject[key];
                        }
                      }
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
                      let finalPrice =
                        parseFloat(priceObject[nearestNumber]) + priceform;
                      return finalPrice;
                    }
                  })()}
                  </span>
              </h3>
              <hr class=" alg-text-yellow">
              <div class="d-flex justify-content-center align-items-center">
              <i class="bi bi-person-walking"></i>
                  <span class="text-muted alg-text-p mx-1 ">
                      ${element.walking_time} min walking
                  </span>
              </div>
              <hr class=" alg-text-yellow">
              <div class="mx-md-3 mx-0">
              <ul class="ul">
              ${pointListItems}
          </ul>
              </div>
            
              <span class="alg-text-p mx-4">${element.bottom_text}</span>
              <div class="btn-section d-flex justify-content-center mb-3 mt-5">
             
              <button class="btn alg-bg-dark alg-text-yellow alg-text-p more-info-btn mx-2  " data-more-info="${
                element.more_info
              }"><i class="bi bi-info-circle-fill mx-1 d-sm-inline d-none"></i>More Info</button>              </div>
          </div>
        `;
      });
      let elements = document.querySelectorAll(".package-tick");
      //if check box is checked change the border of the card color to red
      elements.forEach((element) => {
        element.addEventListener("change", function () {
          if (element.checked) {
            element.parentElement.style.border = "2px solid #009dde";
          } else {
            element.parentElement.style.border = "1px solid gray";
          }
        });
      });
      // let elements = document.querySelectorAll(".package-tick");
      // let isAnyChecked = Array.from(elements).some(
      //   (element) => element.checked
      // );

      // if (isAnyChecked) {
      //   console.log("At least one element is checked");
      // } else {
      //   console.log("No elements are checked");
      // }
     

      // Add event listeners to More Info buttons
      const moreInfoButtons = document.querySelectorAll(".more-info-btn");
      moreInfoButtons.forEach((button) => {
        button.addEventListener("click", function () {
          const moreInfo = this.getAttribute("data-more-info");
          createModal("More Info", moreInfo, false, 789);
        });
      });
    })

    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function storePackageData(id, packageName) {
  console.log("hi");
  localStorage.setItem("packageId", id);
  localStorage.setItem("packageName", packageName);
  if(document.querySelector(".valet-tick").checked){
    document.querySelector(".valet-tick").checked = false;
    document.querySelector(".valet-tick").parentElement.style.border = "1px solid gray";
    localStorage.removeItem("valetPrice");
    localStorage.removeItem("valetId");
    localStorage.removeItem("valetName");
  }
  dynamicPriceUpdater();
}

let elements = document.querySelectorAll(".valet-tick");
//if check box is checked change the border of the card color to red
elements.forEach((element) => {
  element.addEventListener("change", function () {
    if (element.checked) {
      element.parentElement.style.border = "2px solid #009dde";
    } else {
      element.parentElement.style.border = "1px solid gray";
    }
  });
});
///valet handler
let valetCheckBox = document.getElementById("valetCheckBox");
if (valetCheckBox) {
  valetCheckBox.addEventListener("change", function () {
    if(document.querySelector(".package-tick").checked){
     console.log("checked1")
     document.querySelector(".package-tick").checked = false;
     document.querySelector(".package-tick").parentElement.style.border = "1px solid gray";
     
    }
    if (valetCheckBox.checked) {
      valetHandler();
    } else {
      localStorage.removeItem("valetPrice");
      localStorage.removeItem("valetId");
      localStorage.removeItem("valetName");
      localStorage.removeItem("packageId");
      localStorage.removeItem("packageName");
      toastSetup("Valet Removed");
      location.reload();
    }
  });
  
}





function procedToCheckOutHandler() {
  let elements = document.querySelector(".package-tick");
  let isAnyChecked = elements.checked;
  if (isAnyChecked) {
    window.location.href = "/step3";
    return
  } else if(valetCheckBox.checked) {
    window.location.href = "/step3";
    return


  }
  else{
    toastSetup("Select a package");
    return
  }
}


serviceBtn.addEventListener("click", () => {
  let title = "Our Services";
  let content = `
      <b>Professional Valeting Service</b>
      <p class=" alg-text-p">We have our own Professional Valeting Service, why not treat yourself and let us pamper your car with one of our premium options:</p>
      <b>Full Valet</b>
      <p class=" alg-text-p">Cars : £75<br>4X4/MPV : £90</p>
      <p class=" alg-text-p">A comprehensive service that includes a thorough interior and exterior clean, wax, polish, and detailing to ensure every inch of your car looks immaculate.</p>
      <b>Interior Valet</b>
      <p class=" alg-text-p">Cars : £55<br>4X4/MPV : £65</p>
      <p class=" alg-text-p">Focuses on the interior of your car, offering detailed vacuuming, upholstery cleaning, dashboard polishing, and window cleaning to refresh and rejuvenate the inside of your vehicle.</p>
      <b>Exterior Valet</b>
      <p class=" alg-text-p">Cars : £40<br>4X4/MPV : £50</p>
      <p class=" alg-text-p">Specializes in the exterior of your car, providing a meticulous hand wash, waxing, polishing, and tire shining to give your car a brilliant, protected finish.</p>
      <b>Wash</b>
      <p class=" alg-text-p">Cars : £9.50<br>4X4/MPV : £11</p>
      <p class=" alg-text-p">A quick yet thorough exterior hand wash to remove dirt and grime, leaving your car looking clean and refreshed.</p>
      <b>Vacuum</b>
      <p class=" alg-text-p">Cars : £9.50<br>4X4/MPV : £11</p>
      <p class=" alg-text-p">An efficient service that targets the interior, offering a detailed vacuum of seats, carpets, and mats to remove dust and debris for a cleaner driving environment.</p>
  `;
  let dismissible = false;
  let id = 789;

  createModal(title, content, dismissible, id);
});