<?php
session_start();
$sgid = $_SESSION['sgid'];
if(!isset($_SESSION['loggedin3']) || $_SESSION['loggedin3'] == !true){
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
    <title>IPAS - Complaint Unique Id</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
        padding: 0;
        margin: 0;
        box-sizing: none;
        overflow: hidden;
      }
      .container{
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
      .container1{
        border-radius: 10px;
        width: 50%;
        height: 60vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content:center;
        color: black;
        background-color: #2a2a72;
        background-image: linear-gradient(315deg, #2e2e3f 0%, #0A488A 74%);
        box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
      }
      .container1 h3{
        padding-top: 10px;

      }
      .container1 h2{
        padding-bottom: 30px;

      }
      .container1 b{
        color: rgb(226, 226, 77);
      }
      .btn{
        width: 10%;
        height: 12%;
        text-decoration: none;
        border-radius: 20px;
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
<body>
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
    <div class="container">
        <div class="container1">
            <h3 style="color:white;">Your complaint has been successfully registered </h3>
            <h2 style="color:white;"> YOUR COMPLAINT ID is <?php echo "<b id='unique'>$sgid</b>";?></h2>
            <a href="select.html" class="btn">OK</a>
        </div>
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