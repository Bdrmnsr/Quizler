
<?php
/*       
if($_SESSION['login'] = 'done'){
    header('location: home.php');  //هنا تحط الصفحه اللي قبل تسجيل الدخول
}
*/



  include_once 'database-configuration.php';
$lasterr = $firsterr=  $usererr= $passerr=$emailerr= "";
$firstname= $lastname=  $username= $password=$email= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    function test_input($data){
        $data=trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        

$firstname = test_input($_POST["firstname"]);
if(!preg_match("/^[a-zA-Z-']*$/",$firstname))
$firsterr="* only letters and spaces allowed";

$lastname = test_input($_POST["lastname"]);
if(!preg_match("/^[a-zA-Z-']*$/",$lastname))
$lasterr="* only letters and spaces allowed";

 $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = "* Invalid email format";
    }
    $username = test_input($_POST["username"]);

    $password = test_input($_POST["password"]);
 if(strlen($password)<8){
   $passerr = "*password should be at least 8 charectars" ;
 }

if(empty($emailerr)&&empty($lasterr)&&empty($firsterr)&&empty($usererr)&&empty($passerr)&&$_SERVER["REQUEST_METHOD"] == "POST"&&!empty($firstname)&&!empty($lastname)&&!empty($username)&&!empty($password)&&!empty($email)){
   
    $query = "SELECT * FROM userr "
        . "WHERE '$username' = username  or '$email' = email " ;
        $result = mysqli_query($Link,$query);
        $_SERVER["REQUEST_METHOD"] == "";
        if(mysqli_num_rows($result) == 1 || mysqli_num_rows($result) == 2){
            $dbErr = "Account with this username or email is already created!"; 
        }

        else{
            $sql="INSERT INTO userr (firstname,lastname,email,username,password) VALUES ('$firstname','$lastname','$email','$username','$password');";
            mysqli_query($Link,$sql);
            session_start();
            $_SESSION['status']="account created successfully!";
            header('location:loginquiz.php');
            }
        }
    }

?>


<html lang="en">
    <head >
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/71da606852.js" crossorigin="anonymous"></script>
        <title > Sign up </title>
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
                    <header class="username">Sign up</header>  
    
                </div>
            <form method ="post">
                <div class="input-field"> 
                    <input type="text" class="input" placeholder="Please enter your first name" name ="firstname"required>
                    <i class="fa-solid fa-person fa-fade"></i>   <div class = "error"> <?php echo $firsterr; ?></div>


                <div class="input-field">
                    <input type="text" class="input" placeholder="Please enter your last name" name ="lastname"required>
                    <i class="fa-solid fa-person fa-fade"></i>     <div class = "error"><?php echo $lasterr ; ?></div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Please enter your email" name = "email"required>
                    <i class="fa-solid fa-envelope fa-fade"></i>  <div class = "error"> <?php echo $emailerr; ?></div>


                <div class="input-field">
                    <input type="text" class="input" placeholder="Please enter a username" name ="username" required>
                    <i class="fa-solid fa-user fa-fade"></i>    <div class = "error "> <?php echo $usererr; ?></div>

                </div>
                <div class="input-field">
                    <input type="password" class="input" placeholder="Please enter a Password" name ="password" required>
                    <i class="fa-solid fa-lock fa-fade"></i> <div class = "error "> <?php echo $passerr; ?></div>

                </div>
                
                <div class="input-field">
                    <input type="submit" class="submit" value="Sign up">
                </div>
            </form>
                <div class="bottom">
                    <div class="left">
                        <label><a href="loginquiz.php">Already have an account?</a></label>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>