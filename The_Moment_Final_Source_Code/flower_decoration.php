<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>decoration page</title>
	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<link rel="stylesheet" type="text/css" href="invitations_printing.css"/>
</head>
<body  id="page-top" >
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"> The Moment </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php">logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div id="header">
<br><br><br><br>
<h1 style="text-align: center;color: white;">DECORATION</h1>
</div>
<br>
<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="data1/images/fd1.jpg" alt="fd1" title="fd1" id="wows1_0"/></li>
		<li><a href="http://wowslider.net"><img src="data1/images/fd2.jpg" alt="html5 slideshow" title="fd2" id="wows1_1"/></a></li>
		<li><img src="data1/images/weddingdecorations.jpg" alt="wedding-decorations" title="wedding-decorations" id="wows1_2"/></li>
	</ul></div>
<div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">javascript photo gallery</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
<div id="data" style="display:block;
color: black;
text-align:center;
font-size:25px;">
<?php   
  
  $conn= new mysqli('localhost', 'root', 'roottoor', 'evento');
  if($conn->connect_error) {
    die("connection failed: " .$conn->connect_error);
  }
  $sql ="SELECT fd_id, fd_name, fd_city, fd_state, fd_rating, fd_address, fd_phno FROM fdtable";
$result = $conn->query($sql);
if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<br>'. $row['fd_name'].' - '.$row['fd_city'].' , '. $row['fd_state'].'<br>Rating:'.$row['fd_rating'].'/5<br>Address: '.$row['fd_address'].'<br>Phone: '.$row['fd_phno'].'<br><br>';
        }
    }else {
      echo "No data available";
    }

?>
</div>
<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
</body>
</html>