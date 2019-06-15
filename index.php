<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>Vacations</title>
</head>

<body>
<div id="container" class="main-body">
	<div id="header">
		<h1>Екскурзии</h1>
        <div id="links">
          <a href="index.php">Начало</a>
          <a href="offers.php">Оферти</a>
          <a href="contacts.html">Контакти</a>
		  <?php session_start(); 
		  if(isset($_SESSION['username'])){?>
			<a href="lout.php">Изход</a>
		  <?php }else{ ?>
			<a href="lin.php">Вход</a>
		  <?php } ?>
        </div>
    </div>
	<div id="content">
        <a href="offers.html#planinski">
    	   <img class="picture" src="images/image1.jpg"/>
        </a> 
        <div class="contenttext">
        	<h2>Планински дестинации</h2>
            <p></p>
        </div>
        <a href="offers.html#morski">
    	   <img class="picture" src="images/image2.jpg"/>
        </a>
        <div class="contenttext">
        <h2>Морски дестинации</h2>
            <p></p>
        </div>
        <a href="offers.html#kulturni">
    	   <img class="picture" src="images/image3.jpg"/>
        </a>
        <div class="contenttext">
        <h2>Културни дестинации</h2>
            <p></p>
        </div>
    </div>
</div>
</body>
</html>
