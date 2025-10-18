document.addEventListener('DOMContentLoaded',()=>{
  localStorage.removeItem("DateStart");
  localStorage.removeItem("TimeStart");
  localStorage.removeItem("DateEnd");
  localStorage.removeItem("packageName");
  localStorage.removeItem("packageId");

  localStorage.removeItem("TimeEnd");
  localStorage.removeItem("valetPrice");
  localStorage.removeItem("valetId");
  localStorage.removeItem('valetName')

})




let dateStart = document.getElementById("dateStart");
let timeStart = document.getElementById("timeStart");
let dateEnd = document.getElementById("dateEnd");
let TimeEnd = document.getElementById("TimeEnd");
let homeBtn = document.getElementById("homeBtn");

const today = new Date().toISOString().split("T")[0];
dateStart.setAttribute("min", today);
dateEnd.setAttribute("min", today);

// Get today's date
var todayPleaceholder = new Date();

// Format the date as yyyy-mm-dd (required format for input type date)
var formattedDate = todayPleaceholder.toISOString().slice(0, 10);

// Set the value of the input field to today's date
dateStart.setAttribute("value", formattedDate);
dateEnd.setAttribute("value", formattedDate);

// Get the current time in the user's local timezone
var localTime = new Date();

// Adjust the time to GMT+1 timezone
var gmtPlusOneTime = new Date(localTime.getTime() + 1 * 60 * 60 * 1000); // Adding 1 hour

// Adjust the time to GMT+2 timezone (one hour ahead)
var gmtPlusTwoTime = new Date(localTime.getTime() + 2 * 60 * 60 * 1000); // Adding 2 hours

// Format the time as hh:mm (required format for input type time)
var formattedTimeStart = gmtPlusOneTime.toTimeString().slice(0, 5);
var formattedTimeEnd = gmtPlusTwoTime.toTimeString().slice(0, 5);

// Set the value of the input fields to the adjusted times
timeStart.setAttribute("value", formattedTimeStart);
TimeEnd.setAttribute("value", formattedTimeEnd);

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
