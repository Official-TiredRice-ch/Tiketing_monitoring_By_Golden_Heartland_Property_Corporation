<?php
// Read the filename parameter from the query string, default to 'ticket_invoice.html'
$filename = isset($_GET['filename']) ? $_GET['filename'] : 'ticket_invoice.html';

// Set content type to HTML and force download with the specified filename
header('Content-Type: text/html');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Include your database connection or use your existing connection
$conn = new mysqli("localhost", "root", "", "ires");

// Fetch tickets data
$sql = "SELECT id, person_name, person_id, email, address, contact_number, date_added FROM tickets";
$result = $conn->query($sql);

// Store tickets data in an array for later use
$ticketsData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ticketsData[] = $row;
    }
}

// Get the first and last date from the tickets
$firstTicketDate = !empty($ticketsData) ? $ticketsData[0]['date_added'] : '';
$lastTicketDate = !empty($ticketsData) ? end($ticketsData)['date_added'] : '';

// Calculate total tickets
$totalTickets = count($ticketsData);

// Output your ticket content in HTML
echo "<html><head><title>Ticket Summary</title></head><body>";
echo "<h2>Ticket Summary</h2>";

if (!empty($ticketsData)) {
    // Display the date and time of the summary
    echo "<p>Date of Your Summary: " . date("Y-m-d H:i:s") . "</p>";

    // Display the date range of the tickets
    echo "<h3>Ticket Summary</h3>";

    // Display the ticket summary details
    echo "<p>Date Added From: $firstTicketDate to $lastTicketDate</p>";
    echo "<p>Total Tickets: $totalTickets</p>";

    // Display ticket details in a table
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Ticket ID</th><th>Email</th><th>Address</th><th>Contact Number</th><th>Date Added</th></tr>";
    foreach ($ticketsData as $ticket) {
        echo "<tr><td>{$ticket['id']}</td><td>{$ticket['person_name']}</td><td>{$ticket['person_id']}</td><td>{$ticket['email']}</td><td>{$ticket['address']}</td><td>{$ticket['contact_number']}</td><td>{$ticket['date_added']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No tickets to display on the summary.</p>";
}

echo "</body></html>";
?>
