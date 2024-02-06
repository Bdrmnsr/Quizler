<?php 
session_start();
$idd= $_SESSION['ided'] ;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $score=$_POST["scr"];
  $numq=$_POST["numq"];
  $cat=$_POST["cat"];
  $diff=$_POST["diff"];
  $scrf=$score.'/'.$numq;
  include_once 'database-configuration.php'; 
  $query = "insert into quiz(user_id,category,difficulty,score) values ('$idd', '$cat','$diff','$scrf')" ;
  $result = mysqli_query($Link,$query);
  mysqli_close($Link);
  header('location:home.php');
  
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="appstyle.css" />

  </head>
  <body>
    <form method="post">
    <div class="container">
      <div class="start-screen">
        <h1 class="heading">save score</h1>
        <div class="settings">
        <label for="num-questions">your score:</label>
          <select name="scr">
            <option >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
            <option >6</option>
            <option >7</option>
            <option >8</option>
            <option >9</option>
            <option >10</option>
            <option >11</option>
            <option >12</option>
            <option >13</option>
            <option >14</option>
            <option >15</option>
            <option >16</option>
            <option >17</option>
            <option >18</option>
            <option >19</option>
            <option >20</option>
            <option >21</option>
            <option >22</option>
            <option >23</option>
            <option >24</option>
            <option >25</option>
            <option >26</option>
            <option >27</option>
            <option >28</option>
            <option >29</option>
            <option >30</option>
            <option >31</option>
            <option >32</option>
            <option >33</option>
            <option >34</option>
            <option >35</option>
            <option >36</option>
            <option >37</option>
            <option >38</option>
            <option >39</option>
            <option >40</option>
            <option >41</option>
            <option >42</option>
            <option >43</option>
            <option >44</option>
            <option >45</option>
            <option >46</option>
            <option >47</option>
            <option >48</option>
            <option >49</option>
            <option >50</option>
          </select>

          <label for="num-questions">Number of Questions:</label>
          <select name="numq">
            <option >5</option>
            <option >10</option>
            <option >15</option>
            <option >20</option>
            <option >30</option>
            <option >40</option>
            <option >50</option>
          </select>


          <label for="category">Select Category:</label>
          <select  name="cat">
            <option >any category</option>
            <option >general knowledge</option>
            <option >books</option>
            <option >films</option>
            <option >music</option>
            <option >television</option>
            <option >video games</option>
            <option >board games</option>
            <option >science and nature</option>
            <option >computers</option>
            <option >mathematics</option>
            <option >mythology</option>
            <option >sports</option>
            <option >geography</option>
            <option >history</option>
            <option >politics</option>
            <option >art</option>
            <option >vehicles</option>
          </select>
          <label for="difficulty">Select difficulty:</label>
          <select  name="diff">
            <option >any difficulty</option>
            <option >easy</option>
            <option >medium</option>
            <option >hard</option>
          </select>
        </div>
        <button type= "submit" class="btn start">Save</button>
      
  </form>
 
</head>
<body>
  </body>
  </html>