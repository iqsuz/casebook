<?php
    session_start();

    $error = NULL;

    if(isset($_POST["submit_login"]) && isset($_POST["username"]) && isset($_POST["password"])){
        require_once("./inc/db_query.php");
        require_once("./inc/security.php");

        $security = new Security();
        $login_query = new DBQuery();
        
        $username = $security->basic_validation($_POST["username"]);
        $password = $security->basic_validation($_POST["password"]);

        $user = $login_query->login($username, $password);
        
        if(!$user){
            $error = "Server connection error!";
        }else{
            if($user->num_rows == 0){
                $error = "Wrong username or password! Please try again.";
            }else if ($user->num_rows == 1){
                $userDetail = $user->fetch_assoc();

                $_SESSION["userID"] = $userDetail["ID"];
                $_SESSION["userE_ID"] = $userDetail["E_ID"];
                $_SESSION["userName"] = $userDetail["NAME"];
                $_SESSION["userDep"] = $userDetail["DEP"];
                $_SESSION["userP_Pic"] = $userDetail["P_PIC"];
                $_SESSION["userAuth"] = $userDetail["AUTH"]; 

                header("Location: timeline.php");
            }else{
                $error = "Fatal error. Duplicated user!";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/index.css">

    <title>Casebook</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <img class="logo" src="img/pages/index/icon.gif">
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6 col-sm-8 col-xs-10">
                <form method="POST" action=<?php echo $_SERVER["PHP_SELF"];?> enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Employee ID</label>
                        <input type="text" id="username" name="username" class="form-login" placeholder="Employee ID" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="label-login">Password</label>
                        <input type="password" id="password" name="password" class="form-login" placeholder="Password" required>
                    </div>
                    <input type="submit" name="submit_login" class="submit-login" value="Log in">
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="notification">
                <?php
                    if(isset($_SESSION["userAuth"])){
                    echo "You have already logged in as ".$_SESSION["userE_ID"]." (".$_SESSION["userName"].").</br>";
                    echo "If you are not ".$_SESSION['userName']." <a href='logout.php'>click here</a> to logout.</br>";
                    }
                    if(!is_null($error)){
                        echo $error;
                    }
                ?>
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>