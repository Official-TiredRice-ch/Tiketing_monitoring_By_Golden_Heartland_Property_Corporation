<?php
require_once 'Db.php';

// Create an instance of the Db class
$db = new Db();
$conn = $db->conn(); // Assuming you have a conn() method in your Db class

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $personName = $_POST['person_name'];
    $personId = $_POST['person_id'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];

    // Insert data into the 'tickets' table with the current date
    $stmt = $conn->prepare('INSERT INTO tickets (person_name, person_id, email, address, contact_number, date_added) VALUES (?, ?, ?, ?, ?, NOW())');
    $stmt->bindParam(1, $personName);
    $stmt->bindParam(2, $personId);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $address);
    $stmt->bindParam(5, $contact_number);
    $stmt->execute();

    $conn = null;
}

// Handle delete action
if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    $db->deleteEntry($deleteId); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Success</title>
    <style>

   body {
            background: url('bg.jpg') center/cover no-repeat;
		background-color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
	
        }

        h1.text {
            color: #e44d82;
            font-family: 'Lobster', cursive; /* Adding a feminine font */
        }

        table {
            border-collapse: collapse;
            width: 2%; /* Adjusted width */
            margin: 10px;
            border: 5px solid #e44d82; /* Pink border for the table */
		
        }

        table th, table td {
            padding: 4px;
            border: 1px solid #ddd;
	
        }

        table th {
            background-color: #FFD1DC; /* Light pink background for table header */
        }

        table tr {
            background-color: #FFECF5; /* Lighter pink background for table rows */
            text-align: left;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
		height: auto;
        }



   .form22 {
              background-color: rgba(255, 255, 255, 0.0);
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: auto; 
            margin: 20px auto; 
		height: 200px;
		display: flex;
    		flex-wrap: wrap;
        }



        form h2 {
            text-align: center;
            color: #e44d82;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #e44d82;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #e44d82;
            border-radius: 4px;
            background-color: #fce4ec;
            color: #333;
        }

        input[type="submit"] {
            background-color: #e44d82;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #c51162;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 14px;
            background-color: rgba(255, 105, 180, 0.5);
            color: #fff;
            padding: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: blue;
        }
    </style> 


<style>
.summary_btn{
background:pink;
width:110px;
color:black;
height:60px;
		}
</style>


 <button  onclick="window.location.href='website.php'">Go back?</button>
    <button  onclick="window.location.href='Ires dashboard.php'">Go to Home Page?</button>
    <button onclick="openNewWindow()">Go to the Customer Counter?</button>
</head>



<body>
    <center>
        <p><h1 class="text">Successfully Added To The Ticket<br><br> Now go to the Customer Counter For Ticket Counter</h1></p>
    </center>


<button onclick="window.location.href='summary.php'" class="summary_btn"><h3>Summary</h3></button>
    <div style="display: flex; justify-content: space-around;">

<form class="form22">

<?php
// Fetch and display the data from the 'tickets' table
require_once 'Db.php';
$fetchStmt = $db->conn()->query('SELECT id, person_name, person_id, email, address, contact_number FROM tickets');
if ($fetchStmt->rowCount() > 0) {
    echo "<table style='border-collapse: collapse; width: 95%; margin: 5px; border: 3px solid;'>";
    echo "<tr style='background-color: #FFD1DC; text-align: left;'><th style='padding: 2px; border: 2px solid #ddd;'>Name</th><th style='padding: 8px; border: 1px solid #ddd;'>Ticket ID</th><th style='padding: 8px; border: 1px solid #ddd;'>Email</th><th style='padding: 8px; border: 1px solid #ddd;'>Address</th><th style='padding: 8px; border: 1px solid #ddd;'>Contact Number</th><th style='padding: 8px; border: 1px solid #ddd;'>Actions</th></tr>";
    while ($row = $fetchStmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr id='row_" . $row["id"] . "' style='background-color: #FFECF5; text-align: left;'>
        <td style='padding: px; border: 1px solid #ddd; '>" . $row["person_name"] . 
        "</td><td ;'>" . $row["person_id"] . 
        "</td><td ;'>" . $row["email"] .
        "</td><td ;'>" . $row["address"] .
        "</td><td ;'>" . $row["contact_number"] .
        "</td><td><button onclick='deleteEntry(" . $row["id"] . ")'>Delete</button>" . 
        "<button onclick='editEntry(" . $row["id"] . ")'>Edit</button></td></tr>";

    }
    echo "</table>";
} else {
    echo "<p>No results</p>";
}
?>

  </form>  

        <form action="process_ticket.php" method="post">
            <h2>User Information</h2>
            <label for="person_name">Person's Name:</label>
            <input type="text" id="person_name" name="person_name" required>

            <label for="person_id">Person's Ticket ID:</label>
            <input type="text" id="person_id" name="person_id" required>

	<label for="address">Adress:</label>
        <input type="text" id="adress" name="address" required>

	<label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required>

	<label for="email">Email:</label>
        <input type="text" id="email" name="email" required>


            <input type="submit" value="Add">
            <button onclick="window.location.href='Ires dashboard.php'">Go back to Home Page?</button>
    </form>
    </div>



   <script>
    function deleteEntry(entryId) {
        // Confirm before deleting
        if (confirm('Are you sure you want to delete this entry?')) {
            // Use AJAX to send a DELETE request to the server
            fetch('delete_entry.php?id=' + entryId, {
                method: 'DELETE',
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle the response, e.g., remove the deleted row from the table
                console.log(data);
                // Optionally, you can remove the deleted row from the table
                var deletedRow = document.getElementById('row_' + entryId);
                deletedRow.parentNode.removeChild(deletedRow);
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>






<script>
    function editEntry(entryId) {
        // Prompt the user for new values
        var newPersonName = prompt('Enter new person\'s name:');
        var newPersonId = prompt('Enter new person\'s ID:');
        var newEmail = prompt('Enter new email:');
        var newAddress = prompt('Enter new address:');
        var newContactNumber = prompt('Enter new contact number:');

        // Use AJAX to send a POST request to the server for editing
        fetch('edit_entry.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'edit_id=' + entryId + '&new_person_name=' + encodeURIComponent(newPersonName) +
                '&new_person_id=' + encodeURIComponent(newPersonId) +
                '&new_email=' + encodeURIComponent(newEmail) +
                '&new_address=' + encodeURIComponent(newAddress) +
                '&new_contact_number=' + encodeURIComponent(newContactNumber),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Handle the response, e.g., update the displayed data
            console.log(data);
            // You might want to refresh the page or update the specific row in the table
        })
        .catch(error => console.error('Error:', error));
    }
</script>










<script>

function openNewWindow() {
    // Specify the URL for the new window
    var url = './web/website22.php';

    // Calculate the position for the new window (right side of the screen)
    var screenWidth = window.screen.width;
    var windowWidth = 600;  // Adjust as needed
    var xPos = screenWidth - windowWidth;

    // Open a new browser window with the specified URL, position, and zoom level
    var newWindow = window.open(url, '_blank', 'width=700,height=900,left=' + xPos + ',top=0,resizeable=1,scrollbars=yes,zoom=0.75');

    // Optionally, focus on the new window
    if (newWindow) {
        newWindow.focus();
    }
}
</script>




</body>
</html>