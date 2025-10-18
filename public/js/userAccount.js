 // Check if each item is available in localStorage and populate input fields
 if (localStorage.getItem("title")) {
  document.getElementById("title").value = localStorage.getItem("title");
}
if (localStorage.getItem("firstName")) {
  document.getElementById("firstName").value =
    localStorage.getItem("firstname");
}
if (localStorage.getItem("lastName")) {
  document.getElementById("lastName").value =
    localStorage.getItem("lastName");
}
if (localStorage.getItem("telephone")) {
  document.getElementById("phoneNumber").value =
    localStorage.getItem("telephone");
}
if (localStorage.getItem("postalCode")) {
  document.getElementById("postalCode").value =
    localStorage.getItem("postalCode");
}

document.getElementById("updateButton").addEventListener("click", function () {
  // Get input field values
  var title = document.getElementById("title").value;
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var telephone = document.getElementById("phoneNumber").value;
  var postalCode = document.getElementById("postalCode").value;
  console.log(localStorage.getItem("fistName"));

  // Save values to localStorage
  localStorage.setItem("title", title);
  localStorage.setItem("fistName", firstName);
  localStorage.setItem("lastName", lastName);
  localStorage.setItem("telephone", telephone);
  localStorage.setItem("postalCode", postalCode);

  // Prepare the data to be sent
  var formData = new FormData();
  formData.append("title", title);
  formData.append("fistName", firstName);
  formData.append("lastName", lastName);
  formData.append("telephone", telephone);
  formData.append("postalCode", postalCode);
  const apiUrl = server_url + "api/User/update";

  // Send the fetch request
  fetch(apiUrl, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // Handle the response from the server
      console.log(data);
      if (data.status === "success") {
        toastSetup("Successfully Updated Details");
      } else {
        toastSetup("Something Went Wrong");
      }
    })
    .catch((error) => {
      // Handle fetch error
      console.error("Error:", error);
    });
});
