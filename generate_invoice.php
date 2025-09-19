<?php
// Assuming you have the necessary data for the invoice
// You can customize this section based on your actual invoice data
$invoiceData = [
    'person_name' => 'John Doe',
    'person_id' => '12345',
    'email' => 'john@example.com',
    'address' => '123 Main St, Cityville',
    'contact_number' => '555-1234',
    'date_added' => date('Y-m-d H:i:s'),
];

// Sample ticket data, replace this with actual ticket data
$tickets = [
    ['Ticket1', 'Description1', 50.00],
    ['Ticket2', 'Description2', 75.00],
    ['Ticket3', 'Description3', 100.00],
];

// Start generating the HTML content for the invoice
$html = '<div style="font-family: Arial; padding: 20px;">';
$html .= '<h1>Invoice</h1>';
$html .= '<p><strong>Name:</strong> ' . $invoiceData['person_name'] . '</p>';
$html .= '<p><strong>Ticket ID:</strong> ' . $invoiceData['person_id'] . '</p>';
$html .= '<p><strong>Email:</strong> ' . $invoiceData['email'] . '</p>';
$html .= '<p><strong>Address:</strong> ' . $invoiceData['address'] . '</p>';
$html .= '<p><strong>Contact Number:</strong> ' . $invoiceData['contact_number'] . '</p>';
$html .= '<p><strong>Date Added:</strong> ' . $invoiceData['date_added'] . '</p>';

// Add a table to the invoice
$html .= '<table style="width:95%; margin: 20px auto; border-collapse: collapse; border: 3px solid #e44d82; border-radius: 10px; overflow: hidden;">';
$html .= '<tr>';
$html .= '<th style="padding: 15px; border: 1px solid #ddd; background-color: #FFD1DC; border-bottom: 2px solid #e44d82;">Ticket</th>';
$html .= '<th style="padding: 15px; border: 1px solid #ddd; background-color: #FFD1DC; border-bottom: 2px solid #e44d82;">Description</th>';
$html .= '<th style="padding: 15px; border: 1px solid #ddd; background-color: #FFD1DC; border-bottom: 2px solid #e44d82;">Price</th>';
$html .= '</tr>';

foreach ($tickets as $ticket) {
    $html .= '<tr>';
    foreach ($ticket as $data) {
        $html .= '<td style="padding: 15px; border: 1px solid #ddd; text-align: center;">' . $data . '</td>';
    }
    $html .= '</tr>';
}

$html .= '</table>';

$html .= '</div>';

// Return the generated HTML content
echo $html;
?>
