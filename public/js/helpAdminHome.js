const arrowIcon = document.getElementById("arrowIcon");
const editingSection = document.getElementById("editingSection");

arrowIcon.addEventListener("click", function () {
  editingSection.classList.toggle("d-none");
  if (editingSection.classList.contains("d-none")) {
    arrowIcon.innerHTML = '<i class="bi bi-arrow-down-circle"></i>';
  } else {
    arrowIcon.innerHTML = '<i class="bi bi-arrow-up-circle"></i>';
  }
});

document.addEventListener("DOMContentLoaded", () => {
  slotUpdater();
  userCountUpdater();
  totalearningUpdater();
  monthEarningpdater();
  // Create tooltip
  var button = document.getElementById("tooltipOpener");
  var tooltip = new bootstrap.Tooltip(button, {
    title: "Click arrow icon to change number of parking slots",
    placement: "right"
  });
}); // Closing parenthesis was missing here

document.getElementById("genarateKey").addEventListener("click", () => {
  printContent();
});
document
  .getElementById("newParkingSlotSubmit")
  .addEventListener("click", () => {
    newPakingSlotSubmit();
  });
function slotUpdater() {
  const apiUrl = server_url + "api/AdminHomeUpdater/availableSlot";

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
      // Handle the response data
      console.log(data);
      if (data.status == "success") {
        data.data.forEach((element) => {
          document.getElementById("availableSlot").textContent =
            element.available_slot;
        });
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function userCountUpdater() {
  const apiUrl = server_url + "api/AdminHomeUpdater/registerdUserCount";

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
      // Handle the response data
      console.log(data);
      if (data.status == "success") {
        document.getElementById("totalUser").textContent = data.data;
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function totalearningUpdater() {
  const apiUrl = server_url + "api/AdminHomeUpdater/totalEarningUpdater";

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
      // Handle the response data
      console.log(data);
      if (data.status == "success") {
        let totalEarning = 0;
        data.data.forEach((element) => {
          const refund = parseFloat(element['refund']) || 0;
          totalEarning += parseFloat(element["full_amount"]) - refund;        });
      document.getElementById("totalAmount").textContent = totalEarning.toFixed(2);

      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function monthEarningpdater() {
  const apiUrl = server_url + "api/AdminHomeUpdater/monthEarning";

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
      // Handle the response data
      console.log(data);
      if (data.status == "success") {
        let totalEarning = 0;
        data.data.forEach((element) => {
          const refund = parseFloat(element['refund']) || 0;
          totalEarning += parseFloat(element["full_amount"]) - refund;        });
        document.getElementById("monthAmont").textContent = totalEarning.toFixed(2);
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}

function newPakingSlotSubmit() {
  const apiUrl = server_url + "api/AdminHomeUpdater/parkingSlotUpdater";
  let formData = new FormData();
  let inputSlot = document.getElementById("inputSlot").value;
  formData.append("new_slot", inputSlot);

  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      console.log(data.data);
      if (data.status === "success") {
        slotUpdater()
        toastSetup("Successfully updated parking slots");
      }
    })
    .catch((error) => {
      console.error("There was a problem with the fetch operation:", error);
    });
}

function printContent() {
  const apiUrl = server_url + "api/AdminHomeUpdater/ticketCrator";
  let formData = new FormData();
  let idInput = document.getElementById("printBill").value;
  formData.append("parking_id", idInput);

  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      console.log(data.data);
      if (data.status === "success") {
        if (!data.data.length) {
          toastSetup("No Matching Active ID");
          return;
        }
        data.data.forEach((element) => {
          document.getElementById("billingContemnt").innerHTML = `
          <div id="printContent">
          <h1 style="text-align: center;">Your Meet & Greet</h1>
          <hr>
          <table style="width: 100%;">
              <tr>
                  <td style="text-align: left;">ARRIVAL <br>${element.arrival}</td>
                  <td style="text-align: right;"><span class="text-end">EXIT</span> <br>${element.exitDetails}</td>
              </tr>
          </table>
          <hr>
          <table style="width: 100%;">
              <tr>
                  <td style="text-align: left;">FIRST NAME <br>${element.first_name}</td>
                  <td style="text-align: right;">LAST NAME <br>${element.last_name}</td>
              </tr>
          </table>
          <hr>
        
          <table style="width: 100%;">
              <tr>
                  <td style="text-align: left;">VALET <br>${element.valet_type}</td>
                  <td style="text-align: right;">VECHILE <br>${element.valet_car}</td>
              </tr>
          </table>
          <hr>
          <h3 style="text-align: center;">${element.parking_id}</h3>
          <div style="border-top: 1px dotted #000;"></div>

          <div id="printContentNo">
          <h1 style="text-align: center;">Your Meet & Greet</h1>
          <hr>
          <table style="width: 100%;">
              <tr>
                  <td style="text-align: left;">ARRIVAL <br>${element.arrival}</td>
                  <td style="text-align: right;"><span class="text-end">EXIT</span> <br>${element.exitDetails}</td>
              </tr>
          </table>
          <hr>
          <table style="width: 100%;">
              <tr>
                  <td style="text-align: left;">FIRST NAME <br>${element.first_name}</td>
                  <td style="text-align: right;">LAST NAME <br>${element.last_name}</td>
              </tr>
          </table>
          <hr>
         
          <table style="width: 100%;">
              <tr>
                  <td style="text-align: left;">VALET <br>${element.valet_type}</td>
                  <td style="text-align: right;">VECHILE <br>${element.valet_car}</td>
              </tr>
          </table>
          <hr>
          <h3 style="text-align: center;">${element.parking_id}</h3>
      </div>
    
      </div>

     


      `;
          printDocument();
        });
      }
    })
    .catch((error) => {
      console.error("There was a problem with the fetch operation:", error);
    });
}

function printDocument() {
  printJS({
    printable: "printContent",
    type: "html",
    font_size: "12pt", // Adjust font size as needed
    style: `
      @page { 
        size: A5; // Setting page size to A5
        margin: 20mm; // Setting margins
      }
      body {
        max-width: 300px; // Set maximum width for the content
      }
    `,
  });
  document.getElementById("printContent").innerHTML = "";
}

function logOutAdmin() {
  const apiUrl = server_url + "api/User/logout";

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
      // Handle the response data
      console.log(data);
      if (data.status == "success") {
        location.href = "./home";
      }
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("There was a problem with the fetch operation:", error);
    });
}


