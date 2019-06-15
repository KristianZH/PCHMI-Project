<!DOCTYPE html>
<html>
<title>Оферти</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif, background-color}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body style="background-color: unset;">

<!-- Top menu -->
<div id="header" class="header">
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
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <h1 id="planinski" class="w3-center">Планински дестинации</h1>
    <div class="w3-third">
      <a href="offers/offer-borovec.html"><img src="images/mountains/planinski1.jpg" style="width:100%; height: 200px;"></a>
      <h3>Хотел Рила - Боровец</h3>
      <p>Хотел Рила е най-впечатляващият хотелски комплекс в Боровец.
Хотелът има отлично местоположение - намира се в самото подножие на ски пистите и на 200 м от Кабинковия лифт, на 50 м от 4-седалков лифт Мартинови бараки и на 50 м от 4-седалков лифт Ситняково Експрес.</p>
    </div>
    <div class="w3-third">
      <a href="offers/offer-pamporovo.html"><img src="images/mountains/planinski2.jpg" style="width:100%; height: 200px;"></a>
      <h3>Хотел Перелик - Пампорово</h3>
      <p>Емблематичният за Пампорово хотелски комплекс Перелик е разположен в централната част на курортния комплекс. Дизайнът на хотела следва нова модерна линия съчетала в себе си съвременните тенденции в интериора, които в унисон с красотата на Родопа планина, създават усещане за спокойствие и домашен уют.</p>
    </div>
    <div class="w3-third">
      <a href="offers/offer-bansko.html"><img src="images/mountains/planinski3.jpg" style="width:100%; height: 200px;"></a>
      <h3>Хотел Стражите - Банско</h3>
      <p>Сгушен в подножието на Пирин планина, грaд Банско е притегателна сила за български и чуждестранни туристи през целия период на годината. Еднакво атрактивен през четирите сезона на година, градът предлага разнообразни условия за почивка и отдих.
Хотел Стражите се намира само на 10 мин. пеша от центъра на курорта и на метри от начална станция на Гондола лифт.</p>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <h1 id="morski" class="w3-center">Морски дестинации</h1>
    <div class="w3-third">
      <a href="offers/offer-kavacite.html"><img src="images/see-hotels/kavacite.jpg" style="width:100%; height: 200px;"></a>
      <h3>Каваците</h3>
      <p>Грийн Лайф Бийч Ризорт до Созопол.</p>
    </div>
    <div class="w3-third">
      <a href="offers/offer-primorsko.html"><img src="images/see-hotels/primorsko.jpg" style="width:100%; height: 200px;"></a>
      <h3>Приморско</h3>
      <p>Приморско дел Сол</p>
    </div>
    <div class="w3-third">
      <a href="offers/offer-obzor.html"><img src="images/see-hotels/obzor.jpg" style="width:100%; height: 200px;"></a>
      <h3>Обзор</h3>
      <p>Хотел Марина Сандс</p>
    </div>
  </div>

  <!-- Third Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
      <h1 id="kulturni" class="w3-center">Културни дестинации</h1>
    <div class="w3-third">
      <a href="offers/offer-infiniti.html"><img src="images/cultural/cultural1.jpg" style="width:100%; height: 200px;"></a>
      <h3>Инфинити Хотел Парк и СПА - Велинград</h3>
      <p>Инфинити Хотел Парк и СПА е на-новият и най-модерен комплекс във Велинград с екслузивен СПА и Wellness център от веригата Victoria SPA.</p>
    </div>
    <div class="w3-third">
      <a href="offers/offer-dvoreca.html"><img src="images/cultural/cultural2.jpg" style="width:100%; height: 200px;"></a>
      <h3>Хотел Двореца - Велинград</h3>
      <p>СПА хотел Двореца се намира недалеч от центъра на Велинград, сред красив боров парк. Разположен на един от скатовете на Чепинската котловина, хотелът предлага прекрасен изглед към планината, града и минералните си басейни.</p>
    </div>
    <div class="w3-third">
      <a href="offers/offer-borqna.html"><img src="images/cultural/cultural3.jpg" style="width:100%; height: 200px;"></a>
      <h3>Къща Боряна</h3>
      <p>Къща за отдих Боряна се намира в с. Павелско, общ.Чепеларе, обл.Смолянска на 50 км. от град Пловдив по посока пътя за град Смолян; на 27 км. преди курортен комплекс Пампорово и на 19 км. преди град Чепеларе.</p>
    </div>
  </div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>