<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['loggedin1']) || $_SESSION['loggedin1'] == !true) {
  header('location: select.html');
  exit;
}
$adminid = $_SESSION['ipasid'];
$select_query = "SELECT document FROM complaint";
$result = mysqli_query($conn, $select_query);

// Check if the query was successful
if ($result) {
  // Loop through the documents and display them
  while ($row = mysqli_fetch_assoc($result)) {
    $document_name = $row['document'];
  }
} else {
  echo "Error retrieving complaint details: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>IPAS - Admin </title>
  <style>
    * {
      padding: 0;
      margin: 0;

    }
    body{
      background-image: url(./head.png);
      background-repeat: no-repeat;
      background-size: 110% 220%;
    }
    .container {
      border: 0px solid black;
      width:100%;
      height:86.9vh;
      display: flex;
      justify-content:inherit;
      align-items: center;

      padding:0px;
    }

    .container1 {
      border:0px solid black;
      width: 15%;
      height:100%;
      background-color:rgb(10, 72, 138);
      box-shadow: 0px 3px 30px 0px rgba(3, 30, 58, 0.402);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: white;
      z-index: 1;
    }

    .container1 h3 {
      position: absolute;
      transform: translate(8%, -400%);
    }

    .btns {
      position: absolute;
      width: 50%;
      height: 20%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      transform: translateY(-50%);
    }

    .btns button {
      width: 20%;
      height: 33%;
      border-radius:2em / 5em;
      font-size: 1.4rem;
      cursor: pointer;
      border: 2px solid white;
      transition: transform 0.5s;
      font-weight: bolder;
    }

    .btns button:hover {
      transform: scale(1.0);
    }

    #button1 {
      background-color: white;
      color: rgb(10, 72, 138);;
    }

    #button2 {
      background-color:rgb(10, 72, 138);;
      color: white;
    }

    #btn {
      position: absolute;
      transform: translateY(500%);
      display: flex;
      align-items: center;
      justify-content: left;
      cursor: pointer;
      width: 9.5%;
      height: 7vh;
      padding: 1% 0.5%;
      border: 2px solid white;
      border-radius: 20px;
      background-color: transparent;
      font-size: 0.9rem;
      color: white;
    }

    #btn img {
      width: 20%;
      margin-right: 15%;
    }

    .container2 {
      border:0px solid black;
      width: 98%;
      height:86vh;
      display:block;
      justify-content:center;
      overflow: auto;
      position:fixed;
    }

    .container2 .table {
      width: 85%;
      margin-top: 2%;
      transform: translateX(15%);
    }

    .table thead {
      display: flex;
      width: 100%;
      justify-content: end;
      font-size: 1.5rem;
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

    .container3 {
      width: 98%;
      height: 86vh;
      display: flex;
      justify-content:center;
      overflow: auto;
      position:fixed;
      display: none;
    }

    .container3 .table {
      width: 85%;
      margin-top: 2%;
      transform: translateX(15%);
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
      <div class="btns">
        <button id="button1" onclick="funcuser()">User</button>
        <button id="button2" onclick="funcdealer()">Dealer</button>
      </div>
      <button style="font-size:small;"id="btn" onclick="location.href='logout.php'"><img src="logout.png">LOGOUT</button>
    </div>
    <div class="container2" id="contain2">
      <h1 style="text-align:center;color:rgb(10, 72, 138);">RECEIVED FROM USER</h1>
      <table class="table" id="table1">
        <thead>
          <tr>
            <th scope="col" class="id">USER ID</th>
            <th scope="col" class="id">ComplaintID</th>
            <th scope="col" class="com">Complaint</th>
            <th scope="col" class="com">Document</th>
          </tr>
        </thead>
        <tbody id="tableBody1">
          <?php
          include 'db_connect.php';
          $sql = "Select * from complaint where adminid='$adminid' AND dealerid IS NULL AND adminremark IS NULL";
          $adminid='admin';
          $result1 = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result1);
          $no = 0;
          if ($num == 0) {
            echo '<tr style="width: 90%;display: flex; margin: 1% 0; height: 10vh ; "><td style="width: 95%; display: flex; justify-content: center; align-items:center; font-size:2.2rem; font-weight: bolder; color:red;">There is no complaint to display !</td></tr>';
          } else {
            while ($row = mysqli_fetch_assoc($result1)) {
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
                            <td style="background-color: rgb(10, 72, 138);width: 23%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);"><a href="admin_sgid1.php" style=" font-size:16px;text-decoration: none; color:aqua;" onclick="handleClick1(id)" id="unique1-' . $no . '">' . $row['sgid'] . '</a></td>
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
    <div class="container3" id="contain3">
    <h1 style="text-align:center;color:rgb(10, 72, 138);">RECEIVED FROM DEALER</h1>
      <table class="table" id="table2">
        <thead>
          <tr>
            <th scope="col" class="id">USER ID</th>
            <th scope="col" class="id">ComplaintID</th>
            <th scope="col" class="com">Complaint</th>
            <th scope="col" class="com">Document</th>
          </tr>
        </thead>
        <tbody id="tableBody2">
          <?php
          include 'db_connect.php';
          $sql = "Select * from complaint where adminid='$adminid' AND dealerremark IS NOT NULL AND adminremark IS NULL";
          $result2 = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result2);
          $no = 0;
          if ($num == 0) {
            echo '<tr style="width: 100%;display: flex; margin: 1% 0; height: 10vh ; "><td style="width: 95%; display: flex; justify-content: center; align-items:center; font-size:2.2rem; font-weight: bolder; color:red;">There is no complaint to display !</td></tr>';
          } else {
            while ($row = mysqli_fetch_assoc($result2)) {
              $no = $no + 1;
              if (strlen($row['complaint']) > 30) {
                $trimstr = substr($row['complaint'], 0, 30) . "...";
              } else {
                $trimstr = $row['complaint'];
                $document_name = $row['document'];
              }
              echo '<tr style="width: 100%;display: flex; margin: 1% 0; height: 7vh;">
                            <td style="background-color:rgb(10, 72, 138); width: 3.2%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 4%; color:white;">' . $no . '</td>
                            <td style="background-color:rgb(10, 72, 138);width: 23%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);color:white;">' . $row['userid'] . '</td>
                            <td style="background-color:rgb(10, 72, 138);width: 23%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);"><a href="admin_sgid2.php" style=" font-size:16px;text-decoration: none; color:aqua;" onclick="handleClick2(id)" id="unique2-' . $no . '">' . $row['sgid'] . '</a></td>
                            <td style="background-color:rgb(10, 72, 138);width: 48%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);color:white;">' . $trimstr . '</td>
                            <td style="background-color:rgb(10, 72, 138);width: 48%; display: flex; justify-content: center; align-items:center; border-radius: 15px; margin: 0.5% 1%; border: 1px solid rgb(10, 72, 138);color:white;">';

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
    // functions
    function funcuser() {
      console.log("hi");
      document.getElementById("contain2").style.display = 'block';
      document.getElementById("contain3").style.display = 'none';
      document.getElementById('button1').style.backgroundColor = "white";
      document.getElementById('button1').style.color = "rgb(10, 72, 138)";
      document.getElementById('button2').style.color = "white";
      document.getElementById('button2').style.backgroundColor = "rgb(10, 72, 138)";
    }
    function funcdealer() {
      document.getElementById('contain2').style.display = 'none';
      document.getElementById('contain3').style.display = 'block';
      document.getElementById('button1').style.backgroundColor = "rgb(10, 72, 138)";
      document.getElementById('button1').style.color = "white";
      document.getElementById('button2').style.color = "rgb(10, 72, 138)";
      document.getElementById('button2').style.backgroundColor = "white";
    }

    function handleClick1(id) {
      console.log("hiiiiii");
      const a = document.getElementById(id).innerHTML;
      console.log(a);
      localStorage.setItem("uniid1", a);
      var myVariable = localStorage.getItem("uniid1");
      document.cookie = "variable=" + myVariable;
    }
    function handleClick2(id) {
      console.log("hiiiiii");
      const a = document.getElementById(id).innerHTML;
      console.log(a);
      localStorage.setItem("uniid2", a);
      var myVariable = localStorage.getItem("uniid2");
      document.cookie = "variable=" + myVariable;

    }
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