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
            justify-content: left;
            align-items: left;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 50%;
		margin:200px;
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

        #countdown {
            text-align: center;
            color: #e44d82; /* Pink Countdown Text */
            font-size: 24px;
            margin-top: 20px;
        }

.side-form {
            background-color: #fce4ec; /* Light Pink Input Background */
            border: 1px solid #e44d82; /* Pink Border */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 200px;
            width: 100%;
		margin:-190px;
		
        }

.main-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-right: -30px; /* Add margin to create space for the side form */
		
        }

    </style>
</head>
<body>

<center>
    <form action="process_ticket.php" method="post" >
        <h2>Enter User Information</h2>
        <label for="person_name">Person's Name:</label>
        <input type="text" id="person_name" name="person_name" required>

        <label for="person_id">Person's ID:</label>
       <input type="text" id="person_id" name="person_id" required>

       <input type="submit" value="Add">
    </form>
</center>


<center>

<form class="main-form"  method="post">
        <h2>Enter Ticket</h2>
        <label for="User_name"> Name:</label>
        <input type="text" id="User_name" name="name" required>

        <label for="User_id">User Tiket:</label>
        <input type="text" id="User_id" name="name" required>

        <input type="submit" value="Submit" id="startTimerBtn">
    </form>
    <!-- Side form for displaying user information and starting the timer -->
    <div class="side-form" id="sideForm">
        <h2>User Information</h2>
        <p><strong>Name:</strong> <span id="userInfoName"></span></p>
        <p><strong>Tiket:</strong> <span id="userInfoId"></span></p>
        <div id="countdown"></div>
    </div>
</center>
<script>
    document.getElementById('startTimerBtn').addEventListener('click', startCountdown);

    function startCountdown(event) {
        event.preventDefault(); // Prevent the main form from submitting

        var countdownElement = document.getElementById('countdown');
        var sideForm = document.getElementById('sideForm');
        var userInfoName = document.getElementById('userInfoName');
        var userInfoId = document.getElementById('userInfoId');

        // Get user input values
        var personName = document.getElementById('User_name').value;
        var personId = document.getElementById('User_id').value;

        // Display user information in the side form
        userInfoName.innerText = personName;
        userInfoId.innerText = personId;

        // Show the side form
        sideForm.style.display = 'block';

         // Default timer duration in minutes
        var duration = 0; // Convert minutes to seconds

        var interval = setInterval(function () {
            var minutes = Math.floor(duration / 60);
            var seconds = duration % 60;

            countdownElement.innerHTML = minutes + 'm ' + seconds + 's';

            duration++; // Increment the duration for counting up
        }, 1000);
    }
</script>

</body>
</html>


