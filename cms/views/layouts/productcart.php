<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
<?php 
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
        
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'О нас', 'url' => ['/site/index']],
            ['label' => 'Где нас найти?', 'url' => ['/page/contacts']],
            ['label' => 'Каталог', 'url' => ['/page/caregoris']],
            
            Yii::$app->user->isGuest
                ? ['label' => 'Войти', 'url' => ['/site/registration']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);



    
    NavBar::end();
    

    
    ?>



    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
         
            <li class="nav-item">
            <?php echo \app\components\CartWidget::widget();  ?>
            </li>
        </ul>

      
    </div>
</nav>
<?php //debug($_SESSION); //session_destroy(.); ?>

<?=$content;?>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-cart-content">

            </div>

        </div>
    </div>
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
          <h6 class="text-uppercase fw-bold mb-4">
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
          <h6 class="text-uppercase fw-bold mb-4">
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
          <h6 class="text-uppercase fw-bold mb-4">
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
          <h6 class="text-uppercase fw-bold mb-4">Контакты</h6>
          <p><i class="fas fa fa-home text-secondary"></i> Екат улица пушкина  дома калатушкина</p>
          <p>
            <i class="fas fa fa-envelope text-secondary"></i>
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
    <a class="text-reset fw-bold" href="index.php">VladosShop.localhost</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<?php $this->endBody() ?>
<script>

    $("a.disabled").on('click', function(e){
        e.preventDefault();
    })

    var input_text = Number($(".input_text").val());
    var count_prod = Number($(".count_prod").text());


    jQuery(".form_count_prod .plus").on("click", function(){
        if(input_text < count_prod){
            input_text = input_text + 1;
            $(".input_text").val(input_text);
        }

    })

    jQuery(".form_count_prod .minus").on("click", function(){
        if(input_text > 1){
            input_text = input_text - 1;
            $(".input_text").val(input_text);
        }
    })
</script>
</body>
</html>
<?php $this->endPage() ?>
