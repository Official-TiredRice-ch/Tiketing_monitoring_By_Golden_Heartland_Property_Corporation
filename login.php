<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-style.css">
    <title>log in</title>
    <style>	
	body{
		background-color:pink;
		}
        .form{
            width: 260px;
            height: auto;
        }

input[type="submit"] {
    background-color: rgba(255, 105, 180, 0.5);
    color: #fff;
    cursor: pointer;
}
    </style>
</head>
<body>

 <?php
            require("./conection.php");
		 $errorMessage = '';
            if (isset($_POST["login_button"])) {
                $_SESSION["validate"]=false;
                $name=$_POST["name"];
                $password=$_POST["password"];
                $p=crud::conect()->prepare("SELECT * FROM crudtable WHERE name=:n and pass=:p");
                $p->bindValue(":n",$name);
                $p->bindValue(":p",$password);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                if ($p->rowCount()>0) {
                    $_SESSION["name"]=$name;
                    $_SESSION["pass"]=$password;
                    $_SESSION["validate"]=true;
                    header("location:Ires dashboard.php");
                }else {
                    $errorMessage = 'Please fill in all the required fields, or Please create an account';
            }
        }
    ?>

    <div class="form">
        <div class="title">
  
            <p>Log-in Form</p>
        </div>
        <form action="" method="post">
	   <div class="error-message"><?= $errorMessage ?></div>
<hr>
           User name: <input type="text" name="name" placeholder="User Name">
		
           Password: <input type="text" name="password" placeholder="Password">
<hr>
            <input type="submit" value="Login" name="login_button"> 
            <a href="sign-up.php" style="position:relative; left:0px;top:-8px; font-size:14px">Create an Account</a>
        </form>
    </div>
</body>
</html>