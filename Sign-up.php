<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-style.css">

    <title>Sign Up</title>

</head>
<body>
 <style>
	body{background-color: pink;}
input[type="submit"] {
    background-color: rgba(255, 105, 180, 0.5);
    color: #fff;
    cursor: pointer;
}
</style>
 <?php
        require("./conection.php");
        $errorMessage = '';
        $successMessage = '';

        if (isset($_POST["signUP_button"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
	    $adress = $_POST["adress"];
	    $number = $_POST["number"];
            $password = $_POST["password"];
            $confipassword = $_POST["confipassword"];
	

            if (!empty($name) && !empty($email) && !empty($password)) {
                if ($password == $confipassword) {
                    $p = crud::conect()->prepare("INSERT INTO register(name,email,pass, adress, number) VALUES(:n,:e,:p,:a,:nu)");
                    $p->bindValue(":n", $name);
                    $p->bindValue(":e", $email);
		    $p->bindValue(":a", $adress);
		    $p->bindValue(":nu", $number);
                    $p->bindValue(":p", $password);
                    $p->execute();
                    $successMessage = 'Successfully Registered';
                } else {
                    $errorMessage = 'Password does not match!';
                }
            } else {
                $errorMessage = 'Please fill in all the required fields.';
            }
        }
    ?>

    <div class="form">
        <div class="title">
            <p>Register</p>
<hr>
        </div>


        <?php
            if (!empty($successMessage)) {
                echo '<p class="success-message">' . $successMessage . '</p>';
            }
        ?>

        <?php
            if (!empty($errorMessage)) {
                echo '<p class="error-message">' . $errorMessage . '</p>';
            }
        ?>

        <form action="" method="post">
            <input type="text" name="name" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
		<input type="text" name="adress" placeholder="Adress">
		<input type="text" name="number" placeholder="Contact Number">
            <input type="text" name="password" placeholder="Password">
            <input type="text" name="confipassword" placeholder="Confirm Password">
           
<hr>
            
            <input type="submit" value="Register Now" name="signUP_button"> 

            <a href="./login.php">Log in</a>
        </form>
    </div>


</body>
</html>