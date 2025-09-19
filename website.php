<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ires Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('bg.jpg') center/cover no-repeat fixed;
            margin: 20px;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        form {
            background-color: #fce4ec; /* Light pink background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 50%;
            margin: 200px;
        }

        h2 {
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
            background-color: #fff; /* White input background */
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

        #countdown {
            text-align: center;
            color: #e44d82;
            font-size: 24px;
            margin-top: 20px;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 14px;
            background-color: rgba(255, 105, 180, 0.5);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <center>
        <form action="process_ticket.php" method="post">
            <h2>User Information</h2>
            <label for="person_name">Person's Name:</label>
            <input type="text" id="person_name" name="person_name" required>

            <label for="person_id">Person's Ticket ID:</label>
            <input type="text" id="person_id" name="person_id" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <input type="submit" value="Add">
            <button onclick="window.location.href='Ires dashboard.php'">Go back to Home Page?</button>
        </form>
    </center>
</body>

</html>
