// script.js
var formContainer = document.querySelector('.form-container');
var formIndex = 1; // Counter for form IDs

document.getElementById('startTimerBtn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the main form from submitting

    // Validate the form
    if (!validateForm()) {
        return;
    }

    // Get user input values
    var personName = document.getElementById('User_name').value;
    var personId = document.getElementById('User_id').value;

    // Create a new user information section
    var newUserSection = document.querySelector('.user-info').cloneNode(true);
    newUserSection.id = 'userInfoSection' + formIndex; // Set a unique ID for the new section
    formIndex++;

    // Update user information in the new section
    newUserSection.querySelector('.userInfoName').innerText = personName;
    newUserSection.querySelector('.userInfoId').innerText = personId;

    // Show the new user information section
    newUserSection.style.display = 'block';

    // Append the new section to the form container
    formContainer.appendChild(newUserSection);

    // Default timer duration: 16 hours in seconds
    var duration = 16 * 60 * 60;

    var countdownElement = newUserSection.querySelector('.countdown');

    var interval = setInterval(function() {
        var hours = Math.floor((duration  % 3600) / 3600);
        var minutes = Math.floor((duration % 3600) / 60);
        var seconds = duration % 60;

        countdownElement.innerHTML = hours + 'h ' + minutes + 'm ' + seconds + 's';

        duration++; 

        // Stop the countdown when it reaches 0
        if (duration < 0) {
            clearInterval(interval);
            countdownElement.innerHTML = 'Timer Expired';
        }
    }, 1000);

    // Clear input fields in the main form
    document.getElementById('User_name').value = '';
    document.getElementById('User_id').value = '';
});

// Form validation function
function validateForm() {
    var name = document.getElementById("User_name").value;
    var ticket = document.getElementById("User_id").value;

    if (name.trim() === "" || ticket.trim() === "") {
        alert("Please fill in all the fields.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}
