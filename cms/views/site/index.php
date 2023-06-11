<?php

/** @var yii\web\View $this */

$this->title = 'Магазин музыкальных инструментов';
?>
<div class="site-index">

</div>
?>

<div class=" collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      
        <li class="nav-item">
        <?php echo \app\components\CartWidget::widget();  ?>
        </li>
    </ul>
  
</div>

</nav>

<div class="wrapper mt-5">
<div class="container">
    <div class="">
    <p>Что такое VladosShop
VladosShop (VladosShop) — это интернет-магазин цифровых товаров, преимущественно ключей для Steam и игровых аккаунтов. 

VladosShop работает уже 12 лет (по факту — 5) и за это время он стал одним из самых известных игровых маркетплейсов в рунете
с 1 миллионом положительных отзывов и ежемесячной посещаемостью в 1 300 000 человек. По популярности он уступает только небезызвестному Плати ру.
VladosShop является торговой площадкой,которыми было совершено почти 18 миллионов продаж.</p>
<h2>Наши Преимущества</h2>
<ul>
<li>Огромный ассортимент — от ключей и игровых аккаунтов</li>
<li>Одни из самых низких цен в рунете;</li>
<li>Более 12 лет на рынке, множество положительных отзывов и многотысячная посещаемость;</li>
<li>Поддержка большого количества способов оплаты — от WebMoney и до банковской карты;</li>
</ul>

    </div><!-- /row -->

    
</div><!-- /container -->
</div><!-- /wrapper -->
<style>.navbar .form-control {
padding: 0.75rem 1rem;
display: inline-block;
width: auto;
vertical-align: middle;
}
.mr-auto, .mx-auto {
margin-right: auto!important;
}</style>
<!-- Modal -->
<div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-cart-content">

        </div>

    </div>
</div>
</div>

<script>
$(document).ready(function() {
$("a[rel=group]").fancybox({
    'transitionIn' : 'elastic',
    'transitionOut' : 'elastic',
    'titlePosition' : 'over',
    'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
        return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
    }
});
});
</script>
<!-- ТУТ СЛАЙДЕР-->
<div class="container container-brd-none">
<h2>Одноместный номер</h2>

<div class="row">
     <div class="block-31">
        
            <div id="slider1">
    <a class="buttons prev" href="#">left</a>
    <div class="viewport">
        <ul class="overview">
            <li>
            <a  rel="group" href="img/1.jpg" class="fancybox" title="Одноместный номер"><img src="img/1.jpg" alt=""/></a>
            </li>
            <li><a  rel="group" href="img/1.jpg" class="fancybox" title="Одноместный номер"><img src="img/4.jpg" alt=""/></a></li>
            <li><a  rel="group" href="img/1.jpg" class="fancybox" title="Одноместный номер"><img src="img/4.jpg" alt=""/></a></li>                                    
            </ul>
    </div>
    <a class="buttons next" href="#">right</a>
</div>

            <p class="indent">
                <img src="img/2.jpg" alt=""/>
                <img src="img/1.jpg" alt=""/>
            </p>
       
    </div>



<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
<!-- Section: Social media -->
<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">



</section>
<!-- Section: Social media -->

<!-- Section: Links  -->
<section class="">
<div class="container text-center text-md-start mt-5">
  <!-- Grid row -->
  <div class="row mt-3">
    <!-- Grid column -->
    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
      <!-- Content -->
      <h6 class="text-uppercase  mb-4">
        <i class="fas fa fa-music text-secondary"></i>VladosShop
      </h6>
      <p>
        Мы продаём оффицальные ключи и гифты игр и акканты с играми
      </p>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
      <!-- Links -->
      <h6 class="text-uppercase  mb-4">
        Товары
      </h6>
      <p>
        <a href="game.php" class="text-reset">Игры</a>
      </p>
      <p>
        <a href="accaunt.php" class="text-reset">Аккаунты</a>
      </p>
      
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
      <!-- Links -->
      <h6 class="text-uppercase  mb-4">
        Полезные ссылки
      </h6>
      <p>
        <a href="game.php" class="text-reset">Игры</a>
      </p>
      <p>
        <a href="accaunt.php" class="text-reset">Аккаунты</a>
      </p>
      <p>
        <a href="#!" class="text-reset">Другое</a>
      </p>
      <p>
        <a href="#!" class="text-reset">Помощь</a>
      </p>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
      <!-- Links -->
      <h6 class="text-uppercase  mb-4">Контакты</h6>
      <p><i class="fa fa-home  text-secondary" ></i> Екат улица пушкина  дома калатушкина</p>
      <p>

        <i class="fas fa fa-envelope  text-secondary"></i>
        mail@mail.ru
      </p>
      <p><i class="fas fa fa-phone  text-secondary"></i> + 88 005 55 35 35</p>
      <p><i class="fas fa fa-phone  text-secondary"></i> + 88 005 55 35 35</p>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
</div>
</section>
<!-- Section: Links  -->

<!-- Copyright -->
<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
© 2022 Copyright:
<a class="text-reset " href="index.php">VladosShop.localhost</a>
</div>
<!-- Copyright -->
</footer>
<!-- Footer -->