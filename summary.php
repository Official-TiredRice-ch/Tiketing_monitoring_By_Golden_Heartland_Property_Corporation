<?php
require_once 'Db.php';

// Create an instance of the Db class
$db = new Db();
$conn = $db->conn(); // Assuming you have a conn() method in your Db class

// Initialize variables for date range
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Initialize $fetchStmt to null
$fetchStmt = null;

// Check if the form is submitted and both start and end dates are provided
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($startDate) && !empty($endDate)) {
    // Fetch and display the data from the 'tickets' table based on the date range
    $query = "SELECT id, person_name, person_id, email, address, contact_number, date_added 
          FROM tickets 
          WHERE date_added >= :start_date AND date_added < DATE_ADD(:end_date, INTERVAL 1 DAY)";

    $fetchStmt = $conn->prepare($query);
    $fetchStmt->bindParam(':start_date', $startDate);
    $fetchStmt->bindParam(':end_date', $endDate);
    $fetchStmt->execute();
}
$summaryDateTime = date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Counter Summary</title>

    <style>
        body {
            background-color: #ffc0cb;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #e44d82;
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            color: #e44d82;
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 95%;
            margin: 20px auto;
            border: 3px solid #e44d82;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #FFD1DC;
            border-bottom: 2px solid #e44d82;
        }

        tr:nth-child(even) {
            background-color: #FFECF5;
        }

        p {
            text-align: center;
            color: #e44d82;
            font-size: 18px;
            margin-top: 20px;
        }

        button {
            background-color: #e44d82;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        button:hover {
            background-color: #c51162;
        }

input{
	padding: 10px;
            border: 1px solid #e44d82;
            border-radius: 4px;
            background-color: #fff;
            color: #e44d82;
            font-size: 14px;
}

h3{
color: #e44d82;

}
    </style>



</head>




<body>
    <h1>Tiket Counter Summary</h1>


  <p id="summaryDate">Date of Summary: <?php echo $summaryDateTime; ?></p>

    <!-- Form for date selection -->
    <form method="get" action="">
<center>
        <label for="start_date"><h3>From :</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo $startDate; ?>"></h3>

        <label for="end_date"><h3>To :</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo $endDate; ?>"></h3>
	 <button type="submit">Display Data</button></center>
    </form>



    <?php if (isset($fetchStmt) && $fetchStmt->rowCount() > 0) : ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Ticket ID</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Date Added</th>
            </tr>
            <?php
            $firstDate = null;
            $lastDate = null;
            $totalTickets = 0; // Initialize total ticket count

            while ($row = $fetchStmt->fetch(PDO::FETCH_ASSOC)) :
                // Capture the first and last date
                if ($firstDate === null) {
                    $firstDate = $row["date_added"];
                }
                $lastDate = $row["date_added"];
                $totalTickets++;
            ?>
                <tr>
                    <td><?php echo $row["person_name"]; ?></td>
                    <td><?php echo $row["person_id"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["contact_number"]; ?></td>
                    <td><?php echo $row["date_added"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <p>
            <h2>From ( <?php echo $firstDate; ?> ) To ( <?php echo $lastDate; ?> ) Summary</h2>
        </p>

        <p>
            <h2>Total Tickets: <?php echo $totalTickets; ?></h2>
        </p>

        <!-- Button to generate invoice -->
        <button onclick="generateInvoice()">Print Invoice</button>
    <?php elseif (isset($fetchStmt) && $fetchStmt->rowCount() === 0) : ?>
        <p>No results for the selected date range</p>
    <?php endif; ?>

<button onclick="window.location.href='website.php'">Go back?</center></button>

    <script>
        function generateInvoice() {
            var timestamp = new Date().getTime();
            var filename = 'ticket_invoice_' + timestamp + '.html';

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var invoiceWindow = window.open('', '_blank');
                        invoiceWindow.document.write(xhr.responseText);
                        invoiceWindow.document.close();

                        var downloadLink = document.createElement('a');
                        downloadLink.href = 'data:text/html;charset=utf-8,' + encodeURIComponent(xhr.responseText);
                        downloadLink.download = filename;
                        downloadLink.click();
                    } else {
                        alert('Failed to generate invoice. Please try again.');
                    }
                }
            };

            xhr.open('GET', 'print_invoice.php?filename=' + filename, true);
            xhr.send();
        }
    </script>


 <script>
        // Function to update the "Date of Summary" every second
        function updateSummaryDate() {
            var summaryDateElement = document.getElementById('summaryDate');
            var currentDate = new Date();
            var formattedDate = currentDate.toLocaleString('en-US', {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: false
            });
            summaryDateElement.textContent = 'Date of Summary: ' + formattedDate;
        }

        // Update the summary date initially
        window.onload = function () {
            updateSummaryDate();
            // Update the summary date every second
            setInterval(updateSummaryDate, 1000);
        };
    </script>

</body>

</html>
