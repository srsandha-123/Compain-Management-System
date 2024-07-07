<?php
session_start();
if (!isset($_SESSION['loggedin1']) || $_SESSION['loggedin1'] == !true) {
  header('location: select.html');
  exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'db_connect.php';
  $id1 = $_POST["id1"];
  if ($id1 == "forward") {  
    $dealer =$_POST['dealer'];
    $sgid = $_COOKIE['variable'];
    $sql="UPDATE `complaint` SET `dealerid` = '$dealer',`status` = 'underprocess' WHERE `complaint`.`sgid` = $sgid;";
    $result = mysqli_query($conn, $sql);
    if($result){
      $_SESSION['value'] = "forwarded";
      header("location: confirm.php");
  }
  }
  else{
    $adminremark =$_POST['adminremark'];
  $sgid = $_COOKIE['variable'];
  $sql="UPDATE `complaint` SET `adminremark` = '$adminremark',`status` = 'resolved' WHERE `complaint`.`sgid` = $sgid;";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['value'] = "resolved";
    header("location: confirm.php");
}
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>IPAS - Admin </title>
  <style>
        * {
        padding: 0;
        margin: 0;
        box-sizing: none;
      }
      body{
        background-image: url(./head.png);
        background-repeat: no-repeat;
        background-size: 110% 220%;
      }
      .container{
        border:0px solid black;
        width: 100%;
        height: 80vh;
        display: flex;
        /* flex-direction: column; */
        justify-content: center;
        align-items: center;
        
        
      }
      /* .container1{
        width: 100%;
        height: 10%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #0d42ff;
        color: white;
        box-shadow: rgba(48, 66, 85, 0.638) 0px 20px 30px 0px;
        z-index: 1;
      } */
      #btn{
        position: absolute;
        transform: translateX(-520%);
        display: flex;
        align-items: center;
        justify-content: left;
        cursor: pointer;
        width: 8.5%;
        height: 7vh;
        margin-bottom:54%;
        padding: 1% 0.5%;
        border: 0px solid black;
        border-radius: 20px;
        background-image: linear-gradient(0deg, #3a52ed 1%, #130a91 110%);
        box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
        font-size: 0.9rem;
        color:white;
      }
      #btn img{
        width: 30%;
        margin-right: 15%;
      }
        .container2{
          width: 100%;
          height: 90%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
      .item2{
        border:0px solid black;
        border-radius: 10px;
        width: 70%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        background-image: linear-gradient(315deg, #2e2e3f 0%, #0A488A 74%);
      }
      .item2 h2{
        height: 2vh;
        color: #0d42ff;
      }
      .contain1{
        width: 80%;
        height: 35vh;
        border: 0px solid #0d42ff;
        border-radius: 20px;
        /* overflow-y: scroll; */
        /* padding: 0% 2%; */
        background-color: rgb(222, 235, 246);
        font-size: 1.3rem;
        display: flex;
        color: #0d42ff;
        box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
      }
      /* ::-webkit-scrollbar{
        width: 10px;
      }
      ::-webkit-scrollbar-thumb{
        background-color: #0d42ff;
        border-radius: 10px;
        margin-right: 10%;
      } */
      .contain2{
        width: 77%;
        height: 50vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
      }
      #form1{
        width: 100%;
        height: 60%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
      }
      #form1 textarea{
        width: 100%;
        height: 10vh;
        border-radius: 12px;
        border: 0px solid #0d42ff;
        padding: 2%;
        font-size: 2rem;
        text-justify: inter-word;
        box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
      }
      #form1 textarea:hover,#form1 textarea:focus,#form1 textarea:valid {
        background-color: rgb(222, 235, 246);
      }
      #form1 button{
        width: 10%;
        height: 6vh;
        cursor: pointer;
        border-radius: 12px;
        font-size: 1.1rem;
        background-color: rgb(1,190, 1);
        border: 2px solid rgb(43, 238, 43);
        transition: transform 0.5s;
        font-weight: bolder;
        color: white;
      }
      #form1 button:hover{
        background-color: transparent;
        transform: scale(1.1);
        color: rgb(43, 238, 43);
      }
      #form2{
        width: 40%;
        height: 10vh;
        display: flex;
        justify-content: space-around;
        align-items: center;
        transform: translateX(80%);
        color: #0d42ff;
        font-weight: bolder;
      }
      #form2 select{
        width: 28%;
        height: 5vh;
        border-radius: 12px;
        border: 1px solid #0d42ff;
        color:  linear-gradient(315deg, #2e2e3f 0%, #0A488A 74%);
        font-weight: bolder;
      }
      #form2 select option{
        font-weight: bolder;
        text-align: center;
        color:linear-gradient(315deg, #2e2e3f 0%, #0A488A 74%);
      }
      #form2 button{
        width: 28%;
        height: 5vh;
        cursor: pointer;
        border-radius: 12px;
        font-size: 1.1rem;
        background-color: #2234ae;
        background-image: linear-gradient(0deg, #3a52ed 1%, #130a91 110%);
        box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
        border: 0px solid #0d42ff;
        transition: transform 0.5s;
        font-weight: bolder;
        color: white;
        margin-left: 10px;
      }
      #form2 button:hover{
        background-color: transparent;
        transform: scale(1.1);
        color:white;
      }
      .box1 {
        width: 25%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items:start;
        justify-content: center;
        background-color: #0d42ff;
        color: white;
        padding-left: 1%;
        border-radius: 18px;
        background-color: #537895;
      background-image: linear-gradient(315deg, #537895 0%, #09203f 74%);
      }
      .box1 b {
        font-size: 1.3rem;
        color: rgb(255, 255, 0);
      }
      .box2 {
        width: 65%;
        display: flex;
        flex-direction: column;
        align-items:center;
        padding: 0%;
        color: red;
      }
      .box2 h4 {
        margin-top: 1%;
        color: black;
      }
      header #up{
        background-image: linear-gradient(180deg, #71acf4 0%, #f5f7f6 74%);
        background-image: url(./head.avif);
        background-repeat: no-repeat;
        background-size: 120% 175% ;
        z-index: -1;
        padding-left: 20px;
        padding-right: 40px;
        display: flex;
        box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
      }
      .log .erc{
          display: inline;
          display: left;
      }

      .log{
          float: left;
      }

      .log img{
          padding-left: 15px;
          padding-top: 2px;
          padding-bottom: 1px;
          opacity: 1;
          margin-left: 15px;
      }


      .erc img{
          padding-left: 100px;
          padding-top: 6px;
          opacity: 1;
      }

      .ashok img{
          margin-top: 5px;
          margin-left: 560px;
          opacity: 1;
      }

      .time{
          margin-left: 0px;

      }

      .time1{
          margin-left: 25px;
          margin-top: 5px;
          padding: 7px;
          border: 1.5px solid rgb(5, 43, 83);
          border-radius: 20px;
          background-color: #eceeef;
          color: rgb(45, 45, 45);
          font-weight: 400;
          font-size: 18px;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }

      .social{
          margin-top: 20px;
          margin-left: 30px;
      }
      .social a{
          color: rgb(10, 72, 138);
          text-decoration: none;
          font-size: 20px;
          margin: 5px;
      }

      .social a:hover{
          color: rgb(235, 124, 84);
      }
    </style>
</head>


<body onload="funcgen()">
<header>
        <div id="up">
            <div class="log">
                <img src="logo.jpg" width="110">
            </div>
            
            <div class="erc">
                <img src="ecr.jpg" width="550">
            </div>

            <div class="ashok">
                <img src="ashok.jpeg" width="55">
            </div>

            <div class="time">
                <div class="time1">
                <span id="hours">00</span>
                <span>:</span>
                <span id="minutes">00</span>
                <span>:</span>
                <span id="seconds">00</span>
                <span id="session">AM</span>
                </div>

                <div class="social">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </header>
    <a href="admin-page.php"><i class='fa fa-arrow-circle-left' style="font-size:40px; color: rgb(10, 72, 138); padding-left:10px;padding-top:5px;float:left;"></i></a>
  <div class="container">
    <div class="container2">
    
      <div class="item2">
      <h2 style="color:white;">ComplaintID - <b style="color: rgb(255, 255, 0);" id="uniquww"></b></h2>
      <h3 style="color:white">Complaint</h3>
        <div class="contain1" id="contains1">
          <?php
          include 'db_connect.php';
          $sgid = $_COOKIE['variable'];
          $sql = "Select * from complaint where sgid='$sgid'";
          $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
          ?>
          <div class="box1">
                  <!-- <h5>complaintID - <b><?php
                   echo $row['sgid'];  ?></b></h5> -->
                  <h5>Division - <b><?php
                   echo $row['division'];  ?></b></h5>
                  <h5>Section - <b><?php 
                   echo $row['section'];  ?></b></h5>
                  <h5>Userid - <b><?php echo $row['userid'];  ?></b></h5>
                  <h5>Name - <b><?php echo $row['name'];  ?></b></h5>
                </div>
                <div class="box2">
                  <h3>Complaint Description</h3>
                  <h4 style="color:black;"><?php echo $row['complaint'];  ?></h4>
                </div>
        </div>
        <div class="contain2" id="contains2">
        <h3 style="color:white">Remark</h3>
          <form action="admin_sgid1.php" id="form1" method="post">
            <input type="hidden" name="id1" value="resolve">
            <textarea name="adminremark" id="adminremark" cols="30" rows="10" required></textarea>
            <button type="submit">Resolve</button>
          </form>        
          <form action="admin_sgid1.php" id="form2" method="post">
          <input type="hidden" name="id1" value="forward">
            <h5 style="color: rgb(255, 255, 0);">Forward to DEALER:</h5>
            <select id="select" name="dealer" required>
              <option value="">--select--</option>
              <?php 
               include 'db_connect.php';
               $sql = "SELECT * FROM `dealers`";
               $result = mysqli_query($conn, $sql);
   
               while ($row = mysqli_fetch_assoc($result)) {
                 echo '<option value="' . $row['dealerid'] . '"> ' . $row['dealerid'] . '</option> -->';
               }
              ?>
            </select>
            <button type="submit">Forward</button>
          </form>
        </div>
      </div>
    </div> 
  </div>
  <script>
    function funcgen() {
      document.getElementById("uniquww").innerHTML = localStorage.getItem("uniid1");
    }
  </script>
   <script>
        function displayTime(){
            var dateTime = new Date();
            var hrs = dateTime.getHours();
            var min = dateTime.getMinutes();
            var sec = dateTime.getSeconds();
            var session = document.getElementById('session');

            if(hrs>=12){
                session.innerHTML='PM';
            }else{
                session.innerHTML='AM';
            }

            if(hrs>12){
                hrs=hrs-12;
            }

            document.getElementById('hours').innerHTML = hrs;
            document.getElementById('minutes').innerHTML = min;
            document.getElementById('seconds').innerHTML = sec;
        }
        setInterval(displayTime,10);
    </script>
</body>

</html>