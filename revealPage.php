<!DOCTYPE html>
<meta charset="utf-8"/>
<html>
<style>
body {
  background-color: #87A878;
}
p{
  font-size: 2vw;
  color: #ffffff;
  line-height: 0.2;
}
tbody{
  font-size: 2vw;
  color: #ffffff;
}
h1{
  font: "Times New Roman";
  font-size: 4vw;
  line-height: 0.01;
  color: #ffffff;
}
button{
  background-color: #B0BC98;
  line-height: 2.0;
  font-size: 3vw;
  color: #576349;
}
img{
  height: 25vw;
}
</style>
<body>
<h1 align="center">Responses</h1>

<div>
<center><img id="image" align="middle"/></center>
</div>

<table>
  <tbody>
      <p align = "center">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "wiki";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM responses";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["response"]."</td></tr>";
        }
      } else {
        echo "0 results";
      }

      $conn->close();
      ?></p>
  </tbody>
</table>

<p id="correctAnswer" align="center"/>

<div>
  <center><button onclick="playAgain()">Play again</button></center>
</div>

<script>
  //Get correct answer
  window.onload = function(){
    var cookieFiltered = document.cookie.replace(/-/g," ").substring(5,document.cookie.length-4);
    var answerString = "Correct answer: How to "+cookieFiltered;
    document.getElementById("correctAnswer").innerHTML = answerString;
  }

  function playAgain(){
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wiki";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM responses";
    $result = $conn->query($sql);

    $conn->close();
     ?>
    window.location.href= "picturePage.html";
  }
  var imageElement = document.getElementById("image");
  imageElement.src = document.cookie;
</script>
</body>
</html>
