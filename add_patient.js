document
  .getElementById("add-patient-form")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("add_patient.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert("Patient added successfully");
        } else {
          alert("Failed to add patient");
        }
      })
      .catch((error) => console.error("Error:", error));
  });
