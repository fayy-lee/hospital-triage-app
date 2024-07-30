function fetchPatients() {
  fetch("fetch_patients.php")
    .then((response) => response.json())
    .then((data) => {
      const patientsDiv = document.getElementById("patients");
      patientsDiv.innerHTML = "";
      data.patients.forEach((patient) => {
        const patientDiv = document.createElement("div");
        patientDiv.classList.add("patient");
        patientDiv.textContent = `Name: ${patient.name}, Code: ${patient.code}, Severity: ${patient.severity}, Wait Time: ${patient.wait_time} minutes`;
        patientsDiv.appendChild(patientDiv);
      });
    })
    .catch((error) => console.error("Error:", error));
}

// Fetch patients initially
fetchPatients();

// Optionally, you can set an interval to refresh the patient list
setInterval(fetchPatients, 60000); // Refresh every 60 seconds
