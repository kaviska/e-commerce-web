document.addEventListener("DOMContentLoaded", () => {
  loadActiveOrder();
  loadHistoryOrder();
});

function loadActiveOrder() {
  let activeOrderContainer = document.getElementById("activeOrderContainer");
  activeOrderContainer.innerHTML=``

  const apiUrl = server_url + "api/OrderTracker/singleUserActiveOrderLoad";

  // Send the fetch request
  fetch(apiUrl, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      // Handle the response from the server
      console.log(data);
      if (data.status == "success") {
        console.log(data.data);
        activeOrderContainer.innerHTML=``
        data.data.forEach((element) => {
          activeOrderContainer.innerHTML += `
              <div class="mb-md-0 mb-2 text-center mx-2">
                <div class="card  text-center shadow-sm" style="width:18rem"> 
                  <div class="card-body">
                    <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-success">${element.full_amount}&pound;</span> <span class="float-end"><a href="#">${element.name}</a></span> </div>
                    <div class="card-title alg-text-p">
                      <table class="">
                        <tr class="">
                          <td class="">Entry</td>
                          <td class="px-5">Exit</td>
                        </tr>
                        <tr>
                          <td class="" id="enteryDDispaly">${element.arrival}</td>
                          <td class="px-5" id="entryTDisplay">${element.exitDetails}</td>
                        </tr>
                      </table>
                    </div>
                    <hr>
                    <div class="text-center">${element.parking_id}</div>
                    <hr>
                    <div class="d-flex justify-content-between">
                      <span><small>Registation Number</small><br>${element.registation_number}</span>
                      <span><small>Flight Number</small><br>${element.flight_number}</span>
                    </div>
                    <hr>
                    <div class="d-grid gap-2 my-4"> <a href="#" class="btn btn-danger" onclick="userCancelOrder('${element.parking_id}','${element.exitDetails}','${element.payment_id
                    }','${element.full_amount}')">Cancel Order</a> </div>
                  </div>
                </div>
              </div>
            `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle fetch error
      console.error("Error:", error);
    });
}

function loadHistoryOrder() {
  let historyOrderContainer = document.getElementById("historyOrderContainer");

  const apiUrl = server_url + "api/OrderTracker/singleDoneOrderLoad";

  // Send the fetch request
  fetch(apiUrl, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      // Handle the response from the server
      console.log(data);
      if (data.status === "success") {
        console.log(data.data);
        data.data.forEach((element) => {
          historyOrderContainer.innerHTML += `
            <div class="mb-md-0 mb-2 text-center mx-2">
            <div class="card  text-center shadow-sm" style="width:18rem"> 
              <div class="card-body">
                <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-success">${element.full_amount}&pound</span> <span class="float-end"><a href="#">${element.name}</a></span> </div>
                <div class="card-title alg-text-p">
                  <table class="">
                    <tr class="">
                      <td class="">Entry</td>
                      <td class="px-5">Exit</td>
                    </tr>
                    <tr>
                      <td class="" id="enteryDDispaly">${element.arrival}</td>
                      <td class="px-5" id="entryTDisplay">${element.exitDetails}</td>
                    </tr>
                  </table>
                </div>
                <hr>
                <div class="text-center">${element.parking_id}</div>
                <hr>
                <div class="d-flex justify-content-between">
                  <span><small>Registation Number</small><br>${element.registation_number}</span>
                  <span><small>Flight Number</small><br>${element.flight_number}</span>
                </div>
                <hr>
              
              </div>
            </div>
          </div>
              `;
        });
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle fetch error
      console.error("Error:", error);
    });
}

function userCancelOrder(id, exit,paymenId,fullAmount) {
  console.log(exit);
  var today = new Date();
  // Parse the date you want to compare against
  var exitDate = new Date(exit); // Assuming UTC time

  // Compare the dates
  if (today <= exitDate) {
    const apiUrl = server_url + "api/PaymentHandler/refund";
    const formData = new FormData();
    formData.append("paymenId", paymenId);
    formData.append("amount", fullAmount);
    toastSetup("Your Refunding Is processing")


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
            "Order successfully canceled. If you have a refund, it will be deposited into your account within five days."
          );
          loadActiveOrder();
        } else {
          toastSetup(data.error);
        }
      })
      .catch((error) => {
        // Handle any errors that occurred during the fetch
        console.error("There was a problem with the fetch operation:", error);
      });
  } else {
    toastSetup("Orders cannot be canceled within 24 hours of arrival. Please Contact us for more information. Thank you."    );
  }
}
