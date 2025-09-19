<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreamy Princess Paradise</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ffd9e5, #ffc2d3); /* Dreamy Gradient background */
            color: #000; /* Black text */
            text-align: center;
        }

        header {
            padding: 20px;
            background: rgba(255, 194, 220, 0.9); /* Transparent pink background */
            backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #e44d82; /* Barbie pink text color */
            text-shadow: 2px 2px 4px rgba(228, 77, 130, 0.8); /* Text shadow for a dreamy effect */
        }

        p {
            font-size: 1.2em;
            max-width: 600px;
            margin: 0 auto 40px;
            color: #e44d82; /* Barbie pink text color */
            text-shadow: 1px 1px 2px rgba(228, 77, 130, 0.8); /* Text shadow for a dreamy effect */
        }

        button {
            padding: 15px 30px;
            font-size: 1em;
            background-color: #e44d82; /* Barbie pink background for button */
            color: #fff; /* White text */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0px 4px 8px rgba(228, 77, 130, 0.2); /* Button shadow for a lifted look */
        }

        button:hover {
            background-color: #c51162; /* Darker shade on hover */
        }

        section {
            padding: 40px;
        }

        footer {
            padding: 20px;
            background: rgba(255, 194, 220, 0.9);
            backdrop-filter: blur(10px);
        }

        video {
            max-width: 850px;
            height: 400px; /* Increase the height as needed */
            width: 100%;
            margin: auto;
        }
    </style>
</head>

<body>

    <header>
        <h1>WELCOME TO "GOLDEN HEARTLAND PROPERTY CORPORATION"</h1>
        <p>Discover the GOLDEN HEARTLAND <br>and<br> explore a world of possibilities.</p>
        <button onclick="window.location.href='../Ires dashboard.php'">Explore Now</button>
    </header>

    <section>
        <h2>Featured Content</h2>
        <!-- Add your featured content here -->
        <video autoplay loop style="position: fixed; left:0; right:0;" volume="0.2">
            <source src="travel.mp4" type="video/mp4">
        </video>
    </section>

    <section>
        <h2>Latest Updates</h2>
        <!-- Add your latest updates here -->
    </section>

</body>

</html>
