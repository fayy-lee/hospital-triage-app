document.addEventListener('DOMContentLoaded', function() {
    const patientForm = document.getElementById('patient-form');
    const adminForm = document.getElementById('admin-form');
    const waitTimeDisplay = document.getElementById('wait-time');

    // Handle patient form submission
    patientForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(patientForm);
        
        fetch('check_wait_time.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            waitTimeDisplay.innerText = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Handle admin form submission
    adminForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(adminForm);
        
        fetch('add_patient.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            adminForm.reset();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
