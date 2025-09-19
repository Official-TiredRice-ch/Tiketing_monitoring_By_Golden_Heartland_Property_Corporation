<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girly Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8d7da; /* Light Pink Background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
           
        }

         .form-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap; /* Allow forms to wrap to the next line */
        height: 230px; /* Fixed height for the container */
	
    }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 250px; /* Adjust width as needed */
            margin: 10px; /* Add margin between forms */
        }

        h2 {
            text-align: center;
            color: #e44d82; /* Pink Header Text */
        }

        label {
            display: block;
            margin: 10px 0;
            color: #e44d82; /* Pink Text */
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #e44d82; /* Pink Border */
            border-radius: 4px;
            background-color: #fce4ec; /* Light Pink Input Background */
            color: #333;
        }

        input[type="submit"] {
            background-color: #e44d82; /* Pink Submit Button */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #c51162; /* Darker Pink on Hover */
        }

        .user-info {
            background-color: #fce4ec; /* Light Pink Input Background */
            border: 1px solid #e44d82; /* Pink Border */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 48%; /* Adjust width as needed */
            width:autopx;
            display: none; /* Hide the user info initially */
            margin: 10px;
		height:250px;
		align-text:center;
		color:;
        }

        .user-info h2 {
            text-align: center;
            color: #e44d82; /* Pink Header Text */
		
        }
    </style>
</head>
<body>

<div class="form-container">
    <form class="main-form" method="post">
        <h2>Enter Ticket</h2>
        <label for="User_name">Name:</label>
        <input type="text" id="User_name" name="name" required>

        <label for="User_id">User Ticket:</label>
        <input type="text" id="User_id" name="name" required>

        <input type="submit" value="Submit" id="startTimerBtn">
    </form>
<br>
<br>

    <!-- User information section -->
    <div class="user-info" id="userInfoSection">
        <h2>User-Tiket-Info</h2>
        <p><strong>Name:</strong> <span class="userInfoName"></span></p>
        <p><strong>Ticket:</strong> <span class="userInfoId"></span></p>
<br>
        <center><h3><div class="countdown"></div><h3></center>

    </div>
</div>

<script>
    var formContainer = document.querySelector('.form-container');
    var formIndex = 1; // Counter for form IDs

    document.getElementById('startTimerBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the main form from submitting

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

        // Default timer duration in minutes
        var duration = 0; // Convert minutes to seconds
        var countdownElement = newUserSection.querySelector('.countdown');

        var interval = setInterval(function() {
            var minutes = Math.floor(duration / 60);
            var seconds = duration % 60;

            countdownElement.innerHTML = minutes + 'm ' + seconds + 's';

            duration++; // Increment the duration for counting up
        }, 1000);

        // Clear input fields in the main form
        document.getElementById('User_name').value = '';
        document.getElementById('User_id').value = '';
    });
</script>

</body>
</html>
