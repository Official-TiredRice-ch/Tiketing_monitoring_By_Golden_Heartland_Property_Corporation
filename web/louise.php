<!DOCTYPE html>
<html>

<head>
    <title>Add to Inventory</title>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ires";

// Create connection
$conn = new mysqli($servername,$username ,$password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get item details from the form
    $name = $_POST["item_name"];
    
    $price = $_POST["item_price"];
    

    // Insert item into the inventory table
    $sql = "INSERT INTO tiket_counter (Username,tiket_ID ) VALUES ('$name', '$price')";

    if ($conn->query($sql) === TRUE) {
	echo '<script>var itemAddedSuccessfully = true;</script>';
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


<body>

    <h2>Add to Inventory</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required><br>


        <label for="item_price">Item Price:</label>
        <input type="text" name="item_price" required><br>



        <input type="submit" value="Submit">
    </form>

</body>

</html>
