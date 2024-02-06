<?php  

include_once 'database-configuration.php'; 

session_start();
$idd= $_SESSION['ided'] ;
$query = "SELECT firstname,category,difficulty,score FROM userr, quiz "."where user_id=id  and  ' $idd'=id  " ; 
        $result = mysqli_query($Link,$query);
?>



<html lang="en">
    <head >
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="scorescss.css">
        <title > scores  </title>
        <body>

        <div class="filter"></div>
<table>
<tr>
<th>name</th>
<th>category</th>
<th>difficulty</th>
<th>score</th>
</tr>

      <?php 
      while($dbfetch = mysqli_fetch_assoc($result)){
      ?>
     <tr>
    <td><?php echo $dbfetch['firstname'] ?></td>
    <td><?php echo $dbfetch['category'] ?></td>
    <td><?php echo $dbfetch['difficulty'] ?></td>
    <td><?php echo $dbfetch['score'] ?></td>
    </tr>       
    <?php } ?>
      </table>
 
        </body>
    
    </html>