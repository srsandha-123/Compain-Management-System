<?php
session_start();
$sgid = $_SESSION['sgid3'];
if (!isset($_SESSION['loggedin4']) || $_SESSION['loggedin4'] == !true) {
  header('location: select.html');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>IPAS - Complaint Status </title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: none;
    }

    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #0d42ff;
      border-radius: 10px;
      margin-right: 10%;
    }

    .container {
      width: 100%;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-image: url(./head.png);
      background-repeat: no-repeat;
      background-size: 110% 220%;
    }

    .container1 {
      width: 100%;
      height: 10%;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #0d42ff;
      color: white;
      box-shadow: rgba(48, 66, 85, 0.638) 0px 20px 30px 0px;
    }

    .container1 h1 {
      word-spacing: 10px;
    }

    .container1 img {
      position: absolute;
      width: 2.5%;
      left: 2%;
      top: 2.6%;
    }

    .container2 {
      width: 100%;
      height: 90%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .item2 {
      border: 0px solid black;
      width: 50%;
      height: 70%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #0d42ff;
      font-size: 1rem;
      background-color: #2a2a72;
      background-image: linear-gradient(315deg, #2e2e3f 0%, #0A488A 74%);

      box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
      border-radius: 10px;

    }
    .item3 {
      border: 0px solid black;
      width: 55%;
      height: 99%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      color: #0d42ff;
      font-size: 1rem;
      background-image: linear-gradient(315deg, #2e2e3f 0%, #0A488A 74%);
      box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
      border-radius: 10px;
    }
    .item3 .box{
      height: 10vh;
      width: 95%;
      padding: 1% 2%;
      font-size: 2rem;
      border-radius: 12px;
      border: 2px solid #e2e4eb;
      text-align: center;
      color: black;
      background-color: #cbccd0;

    }
    .item3 .contain1{
      width: 95%;
      height: 27vh;
      border: 0px solid #0d42ff;
      border-radius: 20px;
      overflow-y: scroll;
      background-color: rgb(222, 235, 246);
      font-size: 1.2rem;
      display: flex;
      box-shadow: 0px 3px 10px 0px rgba(3, 30, 58, 0.402);
    }
    .item3 .boxs{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content:center;
      height: 25vh;
      width: 90%;
    }
    .boxs {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      height: 25vh;
      width: 90%;
    }
    .boxs h3{
      color: rgb(10, 72, 138);
    }

    #boxs {
      justify-content: center;
      height: 10vh;
    }

    .box {
      height: 15vh;
      width: 95%;
      padding: 1% 2%;
      font-size: 2rem;
      border-radius: 12px;
      border: 2px solid #e2e4eb;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: black;
      background-color:#cbccd0;
      
    }

    #box1 {
      height: 6vh;
      font-size: 2.5rem;
      font-weight: bolder;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0.5%;
      border: transparent;
    }

    .contain1 {
      width: 100%;
      height: 30vh;
      border: 0px solid #0d42ff;
      border-radius: 20px;
      overflow-y: scroll;
      /* padding: 0% 2%; */
      background-color: rgb(222, 235, 246);
      font-size: 1.2rem;
      display: flex;
      box-shadow: 0px 3px 10px 0px rgba(3, 30, 58, 0.402);
    }

    .box1 {
      width: 40%;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: left;
      justify-content: center;
      color: white;
      padding-left: 15px;
      background-color: #537895;
      background-image: linear-gradient(315deg, #537895 0%, #09203f 74%);
      

    }

    .box1 b {
      font-size: 1.2rem;
      color: rgb(255, 255, 0);
    }

    .box2 {
      width: 60%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 0%;
      overflow-y: scroll;
      color: red;
    }

    .box2 h4 {
      margin-top: 1%;
      color: black;
    }
    header{
        width:102%;
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
      .btn{
        width: 10%;
        border-radius: 20px;
        margin: 15px;
        transition: transform 0.5s;
        font-weight: bold;
        overflow: hidden;
        font-size: 1.8rem;
        border: 1px solid white;
        color:white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        background-color: #2234ae;
        background-image: linear-gradient(0deg, #3a52ed 1%, #130a91 110%);
      }
      .btn:hover{
        background-color: transparent;
        color: white;
        border: 2px solid white;
        transform: scale(1.1);
      }
  </style>
</head>

<body onload="funcload()">
  <div class="container">
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


    <?php
    include 'db_connect.php';
    $sql = "Select * from complaint where sgid='$sgid';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['status'] == 'pending') {
      echo '<div class="container2">
          <div class="item2">
            <div class="boxs" id="boxs">
            <div class="" id="box1" style="color: red; text-align: center;">PENDING</div>
          </div>
          <div class="boxs">
            <h3 style="color:white">Complaint</h3>
            <div class="contain1" id="contains1">
              <div class="box1">
              <h5>Division - <b>' . $row['division'] . '</b></h5>
              <h5>Section - <b>' . $row['section'] . '</b></h5>
              <h5>Userid - <b>' . $row['userid'] . ' </b></h5>
              <h5>Name - <b>' . $row['name'] . ' </b></h5>
              </div>
              <div class="box2">
              <h3 style="color:red;">Complaint Description</h3>
                <h4>
                ' . $row['complaint'] . ' 
                </h4>
              </div>
            </div>
          </div>
          <a  href="index.html" class="btn">ok</a>
          </div>
      </div>';
    } else if ($row['status'] == 'underprocess') {
      echo '<div class="container2">
          <div class="item2">
            <div class="boxs" id="boxs">
            <div class="" id="box1" style="color: rgb(203, 203, 59); text-align: center;">UNDERPROCESS</div>
          </div>
          <div class="boxs">
            <h3 style="color:white">Complaint</h3>
            <div class="contain1" id="contains1">
              <div class="box1">
              <h5>Division - <b>' . $row['division'] . '</b></h5>
              <h5>Section - <b>' . $row['section'] . '</b></h5>
              <h5>Userid - <b>' . $row['userid'] . ' </b></h5>
              <h5>Name - <b>' . $row['name'] . ' </b></h5>
              </div>
              <div class="box2">
                <h3 style="color:red;">Complaint Description</h3>
                <h4>
                ' . $row['complaint'] . ' 
                </h4>
              </div>
            </div>
          </div>
          <a  href="index.html" class="btn">ok</a>
          </div>
      </div>';
    } else if ($row['dealerremark'] == NULL and $row['status'] == 'resolved') {
      echo '<div class="container2">
          <div class="item2">
            <div class="boxs" id="boxs">
            <div class="" id="box1" style="color: #5cdb5c; text-align: center;">RESOLVED</div>
          </div>
          <div class="boxs">
          <h3 style="color:white">Complaint</h3>
            <div class="contain1" id="contains1">
              <div class="box1">
                <h5>Division - <b>' . $row['division'] . '</b></h5>
                <h5>Section - <b>' . $row['section'] . '</b></h5>
                <h5>Userid - <b>' . $row['userid'] . ' </b></h5>
                <h5>Name - <b>' . $row['name'] . ' </b></h5>
              </div>
              <div class="box2">
              <h3 style="color:red;">Complaint Description</h3>
                <h4>
                ' . $row['complaint'] . ' 
                </h4>
              </div>
            </div>
          </div>
          <div class="boxs">
          <h4 style="color:white;">Admin Remark</h4>
            <div class="box" id="box3">' . $row['adminremark'] . '</div>
            <a  href="index.html" class="btn">ok</a>
          </div>
      </div>';
    } else {
      echo '<div class="container2">
          <div class="item3">
            <div class="boxs" id="boxs">
            <div class="" id="box1" style="color: #5cdb5c; text-align: center;">RESOLVED</div>
          </div>
          <div class="boxs">
          <h4 style="color:white">Complaint</h4>
            <div class="contain1" id="contains1">
              <div class="box1">
                <h5>Division - <b>' . $row['division'] . '</b></h5>
                <h5>Section - <b>' . $row['section'] . '</b></h5>
                <h5>Userid - <b>' . $row['userid'] . ' </b></h5>
                <h5>Name - <b>' . $row['name'] . ' </b></h5>
              </div>
              <div class="box2">
              <h4 style="color:red;">Complaint Description</h4>
                <h4>
                ' . $row['complaint'] . ' 
                </h4>
              </div>
            </div>
          </div>
          <div class="boxs">
            <h4 style="color:white;">Dealer Remark</h4>
            <div class="box" id="box3">' . $row['dealerremark'] . '</div>
          </div>
          <div class="boxs">
            <h4 style="color:white;">Admin Remark</h4>
            <div class="box" id="box4">' . $row['adminremark'] . '</div>
            <a  href="index.html" class="btn">ok</a>
          </div>

      </div>';
    }
    ?>
  </div>
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