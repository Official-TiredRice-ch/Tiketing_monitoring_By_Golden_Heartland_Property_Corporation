<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ires Tiket</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<style>
    button {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        font-size: 14px;
        background-color: pink;
        color: #fff;
        padding: 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    
.user-info{

	height:450px;
	margin:40px;
}	
    </style>




<div class="form-container">
    <form class="main-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <h2>Enter Ticket</h2>
        <label for="User_name">Name:</label>
        <input type="text" id="User_name" name="item_name" required>

        <label for="User_id">Ticket Number:</label>
        <input type="text" id="User_id" name="item_type" required>

        <label for="How_Many">How Many Person?:</label>
        <input type="text" id="How_Many" name="how_many" required>

        <input type="submit" value="Submit" id="startTimerBtn">
        <button onclick="window.open('../Ires dashboard.php', '_blank')">Go To Home Page?</button>
    </form>

    <!-- User information section -->
    <div class="user-info" id="userInfoSection">
        <h2>User-Tiket-Info</h2>
        <p><strong>Name:</strong> <span class="userInfoName"></span></p>
        <p><strong>Ticket Number:</strong> <span class="userInfoId"></span></p>
        <p><strong>How Many Person? </strong> <span class="howMany"></span></p>
<br>
        <center>
            <h3><div class="countup"></div></h3>
           
        </center>
    </div>

    <script>
        var formContainer = document.querySelector('.form-container');
        var formIndex = 1;

        document.getElementById('startTimerBtn').addEventListener('click', function (event) {
            event.preventDefault();

            if (!validateForm()) {
                return;
            }

            var personName = document.getElementById('User_name').value;
            var personId = document.getElementById('User_id').value;
            var howMany = document.getElementById('How_Many').value;

            var newUserSection = document.querySelector('.user-info').cloneNode(true);
            newUserSection.id = 'userInfoSection' + formIndex;
            formIndex++;

            newUserSection.querySelector('.userInfoName').innerText = personName;
            newUserSection.querySelector('.userInfoId').innerText = personId;
            newUserSection.querySelector('.howMany').innerText = howMany;

            var stopButton = document.createElement('button');
            stopButton.innerText = 'Stop';
            stopButton.className = 'stopTimerBtn';
            newUserSection.appendChild(stopButton);

            var continueButton = document.createElement('button');
            continueButton.innerText = 'Continue';
            continueButton.className = 'continueTimerBtn';
            newUserSection.appendChild(continueButton);

            var deleteButton = document.createElement('button');
            deleteButton.innerText = 'Delete';
            deleteButton.className = 'deleteBtn';
            newUserSection.appendChild(deleteButton);

            newUserSection.style.display = 'block';

            formContainer.appendChild(newUserSection);

            var duration = 0;
            var countupElement = newUserSection.querySelector('.countup');
            var interval;

            function updateCountup() {
                var hours = Math.floor((duration % 3600) / 3600);
                var minutes = Math.floor((duration % 3600) / 60);
                var seconds = duration % 60;

                countupElement.innerHTML = hours + 'h ' + minutes + 'm ' + seconds + 's';
            }

            function startTimer() {
                interval = setInterval(function () {
                    updateCountup();
                    duration++;
                }, 1000);
            }

            startTimer();

            stopButton.addEventListener('click', function () {
                clearInterval(interval);
            });

            continueButton.addEventListener('click', function () {
                startTimer();
            });

            deleteButton.addEventListener('click', function () {
                formContainer.removeChild(newUserSection);
            });

            document.getElementById('User_name').value = '';
            document.getElementById('User_id').value = '';
            document.getElementById('How_Many').value = '';
        });

        function validateForm() {
            var name = document.getElementById("User_name").value;
            var ticket = document.getElementById("User_id").value;
            var howMany = document.getElementById("How_Many").value;

            if (name.trim() === "" || ticket.trim() === "" || howMany.trim() === "") {
                alert("Please fill in all the fields.");
                return false;
            }

            return true;
        }
    </script>
</div>

</body>

</html>
