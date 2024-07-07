<?php
session_start();
$dealerid = $_SESSION['dealerid'];
if (!isset($_SESSION['loggedin1']) || $_SESSION['loggedin1'] == !true) {
  header('location: select.html');
  exit;
}
include 'db_connect.php';
$select_query = "SELECT document FROM complaint";
$result1 = mysqli_query($conn, $select_query);

// Check if the query was successful
if ($result1) {
  // Loop through the documents and display them
  while ($row = mysqli_fetch_assoc($result1)) {
    $document_name = $row['document'];
  }
} else {
  echo "Error retrieving complaint details: " . mysqli_error($conn);
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
  <title>IPAS - Dealer</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: none;
    }
/* 
    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #0d42ff;
      border-radius: 10px;
    } */
    body{
      background-image: url(./head.png);
      background-repeat: no-repeat;
      background-size: 110% 220%;
    }
    .container {
      border:0px solid black;
      width: 100%;
      height: 75vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: start;
      
    }
    .container2 {
      border:0px solid black;
      width: 100%;
      height: 70%;
      display: flex;
      overflow: auto;
      position: absolute;
      justify-content: center;
      transform: translateY(10%);
    }

    .container2 .table {
      width: 100%;
      margin-top: 2%;
    }

    .table thead {
      display: flex;
      width: 100%;
      justify-content: end;
      font-size: 2rem;
      color: rgb(10, 72, 138);
    }

    thead tr {
      display: flex;
      width: 90%;
      justify-content: end;
    }

    thead tr .id {
      display: flex;
      width: 25%;
      justify-content: center;
    }

    thead tr .com {
      display: flex;
      width: 50%;
      justify-content: center;
    }

    .table tbody {
      display: flex;
      flex-direction: column;
      width: 100%;
      justify-content: end;
      font-size: 1.3rem;
      overflow: auto;
    }

    #btn {
      position: absolute;
      transform: translateX(460%);
      display: flex;
      align-items: center;
      justify-content: end;
      cursor: pointer;
      width: 9.5%;
      height: 7vh;
      padding: 1% 2%;
      border: 2px solid white;
      border-radius: 20px;
      background-color: transparent;
      font-size: 0.9rem;
      color: white;
    }

    #btn img {
      width: 22%;
      padding-top: 2.5%;
      padding-left: 5%;
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
  <a href="logout.php"><i class='fa fa-power-off' style="font-size:40px; color: rgb(10, 72, 138); padding-right:15px;padding-top:15px;float:right;"></i></a>
  <div class="container">
    <div class="container2">
      <table class="table" id="table">
        <thead>
          <tr>
            <th scope="col" class="id">IPAS ID</th>
            <th scope="col" class="id">SGID</th>
            <th scope="col" class="com">Complaint</th>
            <th scope="col" class="com">Document</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <?php
          include 'db_connect.php';
          $sql = "Select * from complaint where dealerid='$dealerid' AND dealerremark IS NULL;";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          $no = 0;
          if ($num == 0) {
            echo '<tr style="width: 100%;display: flex; margin: 1% 0; height: 10vh ; "><td style="width: 95%; display: flex; justify-content: center; align-items:center; font-size:2.2rem; font-weight: bolder; color:red;">There is no complaint to display !</td></tr>';
          } else {
            while ($row = mysqli_fetch_assoc($result)) {
              $no = $no + 1;
              if (strlen($row['complaint']) > 30) {
                $trimstr = substr($row['complaint'], 0, 30) . "...";
              } else {
                $trimstr = $row['complaint'];
                $document_name = $row['document'];
            }
            echo '<tr style="width: 100%;display: flex; margin: 1% 0; height: 7vh;">
            <td style="background-color: rgb(10, 72, 138); width: 3.2%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 4%; color:white;">' . $no . '</td>
                          <td style=" background-color: rgb(10, 72, 138);width: 23%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);color:white;">' . $row['userid'] . '</td>
                          <td style="background-color: rgb(10, 72, 138);width: 23%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);"><a href="dealer-sgid.php" style=" font-size:16px;text-decoration: none; color:aqua;" onclick="handleClick(id)" id="unique1-' . $no . '">' . $row['sgid'] . '</a></td>
                          <td style="background-color: rgb(10, 72, 138);width: 48%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);color:white;">' . $trimstr . '</td>
                          <td style="background-color: rgb(10, 72, 138);width: 48%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);color:white;">';

                          if (!empty($document_name)) {
                              echo '<a href="document/' . $document_name . '">' . $document_name . '</a>';
                          } else {
                              echo 'No file';
                          }

                          echo '</td>
                      </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    
    function handleClick(id) {
      // console.log("hiiiiii");
      const a = document.getElementById(id).innerHTML;
      console.log(a);
      localStorage.setItem("unid1", a);
      var myVariable = localStorage.getItem("unid1");
      document.cookie = "variable=" + myVariable;
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