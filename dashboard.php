<?php
include('Db.php');

// Assuming you have a 'tickets' table in your database
function getTicketCount()
{
    $db = new Db();
    $conn = $db->conn();
    
    $stmt = $conn->query("SELECT COUNT(*) as count FROM tickets");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['count'];
}

function getAverageTimer()
{
    $db = new Db();
    $conn = $db->conn();
    
    $stmt = $conn->query("SELECT AVG(timer) as average FROM tickets");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['average'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            padding: 10px;
            color: white;
            text-align: center;
        }

        section {
            margin: 20px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Dashboard</h1>
    </header>

    <section>
        <div class="card">
            <h2>Ticket Statistics</h2>
            <p>Total Tickets: <?php echo getTicketCount(); ?></p>
            <p>Average Timer: <?php echo getAverageTimer(); ?> minutes</p>
        </div>
    </section>

</body>
</html>
