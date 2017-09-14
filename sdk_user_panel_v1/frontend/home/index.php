<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../utils/authorized.php");
	
	$title_adm= "Главная";
	
	
	
	include_once("../utils/top_html.php");
	
	include_once("../utils/top_page.php");
	
	
?>
<script type="text/javascript">
 $(window).load(function() {
        $('#slider').nivoSlider();
    });

</script>
<style type="text/css">
  
</style>

<table style="width:100%">
<tr>
  <td>
<div class="slider-wrapper theme-light">
  
<div id="slider" class="nivoSlider">
  <img src="../../styles/frontend/images/slider/1.jpg" title="#slide1">
  <img src="../../styles/frontend/images/slider/2.jpg" title="#slide2">
  <img src="../../styles/frontend/images/slider/3.jpg" title="#slide3">
</div>
  
  <div id="slide1" class="nivo-html-caption">
  	Оборудование вертолетов Ми-8 современным бортовым регистратором СДК-8 
  </div>
   <div id="slide2" class="nivo-html-caption">
  	Разработка программного обеспечения объективного контроля 
  </div>
  <div id="slide3" class="nivo-html-caption">
  	Разработка программного обеспечения для диагностики и контроля авиационных двигателей
  </div>
  <div id="slide4" class="nivo-html-caption">  	
	Разработка сетевых приложений и веб-сайтов для управления жизненным циклом авиационной техники 
  </div>
  
</div>
  </td>
  </tr>
  <tr>
    <td>
    <table>
      <tr>
        <td style="font-weight:bold;" >Наша компания предлагает:</td>
      </tr>
      <tr>
        <td style="" >
        	<ul>
              <li>Поставку имущества бортовой и наземной частей аппаратно-программного комплекса СДК-8;</li>
              <li>Гарантийное и ремонтное сопровождение;</li>
              <li>Техническую поддержку аппаратно-программного комплекса СДК-8 в эксплуатации;</li>
              <li>Разработку и поддержку программного обеспечения наземной части аппаратно-программного комплекса СДК-8;</li>
              <li>Разработку и поддержку программного обеспечения для систем контроля авиационной техники для любых типов бортовых регистраторов;</li>
              <li>Разработку и поддержку программного обеспечения для диагностики авиационных двигателей;</li>
              <li>Разработку и поддержку сетевого программного обеспечения и веб-сайтов для управления жизненным циклом авиационной техники;</li>
              <li>Разработку и поддержку систем удаленного хранения и доступа к полетной информации;</li>
              <li>Разработка согласующих устройств для получения цифровых данных с аналоговых регистраторов воздушных судов;</li>            
          	</ul>
        </td>
      </tr>
    </table>
  </td>
  </tr>
</table>

<?php


	include_once("../utils/bottom_page.php");
	
?>
