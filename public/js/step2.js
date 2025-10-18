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
//document.addEventListener("DOMContentLoaded", () => {
//  dynamicallyDataUpdater();
//  dynamicPriceUpdater();
//  valetPriceHandleForFullValetAndCar()
//});

// Add event listener for change event
selectType.addEventListener('change', function(event) {
  const selectedValue = event.target.value;
  console.log('Selected valet package:', selectedValue);
  valetPriceHandler()
});

document.getElementById('selectVechle').addEventListener('change', function(event) {
  const selectedValue = event.target.value;
  console.log('Selected vehicle type:', selectedValue);
  valetPriceHandler()

});

//document.getElementById("editBookingDetails").addEventListener("click", () => {
//  const editSection = document.getElementById("editsection");
//  const arrowIcon = document.getElementById("arrowIcon");
//  editSection.classList.toggle("d-none");
//  // Toggle arrow icon direction
//  if (editSection.classList.contains("d-none")) {
//    arrowIcon.classList.remove("bi-arrow-up");
//    arrowIcon.classList.add("bi-arrow-down");
//  } else {
//    arrowIcon.classList.remove("bi-arrow-down");
//    arrowIcon.classList.add("bi-arrow-up");
//  }//

//  dynamicallyPAckageValetUpdater();
//});
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
        toastSetup("Successfully Added")
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
 
  const packageId = localStorage.getItem('packageId');
  
  try {
    const price = await priceHandlerForInstance(dateTimeDifference(), packageId);
    console.log(parseFloat(price));
    console.log(dateTimeDifference())
   
 let finalAmount = document.getElementById("finalAmount");
 
  finalAmount.innerHTML = parseFloat(price)
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
    console.error('Error:', error);
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
