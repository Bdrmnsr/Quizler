

<?php
/*
if($_SESSION['login'] = 'done'){
    header('location: home.php'); //هنا تحط الصفحه اللي قبل تسجيل الدخول
}
*/
session_start();
if(isset($_SESSION['status'])){
   
      echo"<div class = 'alertsuc '> <span class='closebtn' onclick =this.parentElement.style.display='none'>&times;
      </span>
      ". $_SESSION['status']."
      </div>";
 
    unset( $_SESSION['status']);
}

function test_input($data){
    $data=trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
include_once 'database-configuration.php';

$usererr= $passerr="" ;
 $username= $password= "";
 if($_SERVER["REQUEST_METHOD"] == "POST"){
 $username = test_input($_POST["username"]);
 $password = test_input($_POST["password"]);
 }

if (empty($usererr) && empty($passerr)) {
    //check through database
    if (mysqli_connect_errno()) {
        $dbErr = "Server Error! Please try again later!";
    } else {
        $query = "SELECT * FROM userr "
        . "WHERE '$username' = username "
        . "AND '$password' = password";
        $result = mysqli_query($Link,$query);
        
        if(mysqli_num_rows($result) == 1){
            session_start();
            $qrre = "SELECT id
            FROM userr "."where '$username'=username" ;
         $id = mysqli_query($Link,$qrre);
         $dbfetch = mysqli_fetch_assoc($id);
         $_SESSION['ided']=$dbfetch['id'];

            mysqli_close($Link);
            session_start();
            $_SESSION['login'] = 'done';
        
            header('location: home.php');  //هنا تحط الصفحه اللي بعد تسجيل الدخول
        }else{
      
           $dbErr = "Wrong username or passwrod!"; 
           mysqli_close($Link);
        }
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/71da606852.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <style>
        a:hover {
         color: rgb(69, 74, 133);
        }
        </style>
</head>
<body>

<?php
        if (!empty($dbErr)&&$_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div class = 'alert '> <span class='closebtn' onclick =this.parentElement.style.display='none'>&times;
            </span>
                $dbErr
            </div>";
          }
      
                ?>
    <img src="logo.png" class="rounded">
    <div class="box">
    
        <div class="container">
        
            <div class="top-header">
                <header class="usersname">Login</header>  
 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
            </div>
   
            <div class="input-field">          
                <input type="text" class="input" placeholder="Username" name ="username" required>   
                <i class="fa-solid fa-user fa-fade"></i> 
                
                
            </div>
            
            <div class="input-field">
                <input type="password" class="input" placeholder="Password" name="password" required>
                <i class="fa-solid fa-lock fa-fade"></i> <span></span>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Login">
            </div>
        </form>
            <div class="bottom">
                <div class="left">
                    <label><a href="signupquiz.php">Don't have an account?</a></label>
                </div>
            </div>
        </div>
    </div>
</body>
</html>