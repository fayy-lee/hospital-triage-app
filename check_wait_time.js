document
  .getElementById("update-wait-time-form")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("update_wait_time.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert("Wait time updated successfully");
        } else {
          alert("Failed to update wait time");
        }
      })
      .catch((error) => console.error("Error:", error));
  });
