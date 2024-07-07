<?php
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'db_connect.php';
    $sgid = $_POST["sgid"];
    $sql = "Select * from complaint where sgid='$sgid';";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
      session_start();
      $_SESSION['loggedin4'] = true;
      $_SESSION['sgid3'] = $sgid;
      header("location: status-show.php");
    } else {
      $showError = "Invalid Credentials";
    }
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

  <title>IPAS - Check Status</title>
    <style>
        * {
        padding: 0;
        margin: 0;
        box-sizing: none;
      }
      .container{
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
      body{
          background-image: url(./head.png);
          background-repeat: no-repeat;
          background-size: 110% 220%;
          }
      header{
        width:102%;
      }
      header #up{
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
          margin-left: 20px;

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
      .container2{
        width: 100%;
        height: 90%;
        display: flex;
        justify-content: center;
      }
      .container2 form{
        width: 98%;
        height: 45%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
      .sgid{
        width: 25%;
        height: 13vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        color: #0d42ff;
      }
      .sgid h2{
        color:#12619d;
      }
      .sgid input{
        width: 80%;
        height: 40px;
        border-radius: 5px;
        border: 1px solid black;
        padding: 0 2%;
        font-weight: bold;
        font-size: 1.2rem;
      }
      .button{
    
        color:white;
        font-family: 'Oswald', sans-serif;
        font-size: 17px;
        font-weight: 600;
        background-color: #2234ae;
        background-image: linear-gradient(0deg, #3a52ed 1%, #130a91 110%);
        border-radius: 20px;
        border: none;
        padding:10px 20px;
        box-shadow: 0 4px #203794;  
        margin: 60px 10px 0px 5px;
    
    }
    
    .button:hover{
        color: azure;
        font-size: 18px;
        background-color: #2b42d2;
        background-image: linear-gradient(0deg, #455dfc 1%, #1508ce 110%);
        box-shadow: 0 4px #1b0a77;  
    }
      #containers{
      animation: animate 0.5s ;
      transition: transform 0.5s;
    }
    @keyframes animate{
      from{
        transform: translateY(-100%);
      }
      to{
        transform: translateY(0);
      }
    }
    </style>
</head>
<body>
<?php
  if($showError!= false){
    echo '<div id="containers" style="width:99.9%;
    height: 8vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #F8D7DA;
    border: 1px solid red;
    position: absolute;
    font-size: 1.05rem;">
        <strong style="color: red;">ERROR ! </strong> wrong sgid, enter the correct sgid to proceed
    </div>';
  }
  ?>
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
        <div class="container2">
        <a href="index.html"><i class='fa fa-arrow-circle-left' style="font-size:40px; color: rgb(10, 72, 138); padding-top:12px;float:left;"></i></a>
            <form action="status.php" method="post" id="form">
                <div class="sgid">
                    <h2>Complaint-ID</h2>
                    <input type="text" name="sgid" required>
                </div>
                    <button type="submit" class="button" id="btn1">SUBMIT</button>
            </form>
        </div>
    </div>
    <script>
      setTimeout(() => {
      document.getElementById("containers").style.transform = "translateY(-100%)";
    }, 2500);

    const form = document.getElementById('form');
    const btn = document.getElementById('btn1');
    btn.addEventListener('click', function handleSubmit(event) {
      // event.preventDefault();
      setTimeout(() => {
        form.reset();
      }, 1500);
    });
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