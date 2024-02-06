<?php 
include_once 'database-configuration.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/71da606852.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <img src="logo.png" class="rounded">
    <div class = box>
      <div class = container>
        <div class = top-header>
          <div class = title> 
             Quizler!
          </div>
        <button class = login onclick="location.href='loginquiz.php'">Log in</button>
        <button class = signup onclick="location.href='signupquiz.php'">Sign Up</button>
        </div>
      </div>
    </div>
    </body>