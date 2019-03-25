<html>
<head>
<title>Food Page</title>
</head>
<body>
<div id="data" style="display:block;
color: black;
text-align:center;
font-size:25px;">
<?php   

  $conn= new mysqli('localhost', 'root', 'roottoor', 'evento');
  if($conn->connect_error) {
    die("connection failed: " .$conn->connect_error);
  }
  $id= $_GET['id'];
  $sql ="SELECT category, item FROM cmtable where fc_id='".$id."'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<br>'. $row['category'].' - '.$row['item'].'<br><br>';
          echo '<p style="font-size: 16px; text-align:center;"><a href="catering_menu.php?id='.$row['fc_id'].'">See menus</a></p>';
        }

    }else {
      echo "No data available";
    }
?>
</div>
</body>
</html>