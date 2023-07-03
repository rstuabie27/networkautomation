<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Website</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
  <body>
    <a href="data.php">Data</a>
    <script type="text/javascript">
      $.getJSON('http://ip-api.com/json', function(ip){
        var data = {
          ip: ip.query,
          isp: ip.isp,
          country: ip.country,
          city: ip.regionName
        };

        $.ajax({
          url: 'index.php',
          type: 'post',
          data: data
        })
      })
    </script>
  </body>
</html>
<?php
require 'config.php';
if(isset($_POST["ip"])){
  $ip = $_POST["ip"];
  $isp = $_POST["isp"];
  $country = $_POST["country"];
  $city = $_POST["city"];

  $query = "INSERT INTO tb_data VALUES('', '$ip', '$isp', '$country', '$city')";
  mysqli_query($conn, $query);
}
?>
