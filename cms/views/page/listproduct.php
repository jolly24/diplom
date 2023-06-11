<?php

/** @var yii\web\View $this */
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Магазин музыкальных инструментов';
?>

<?php 
// echo "<pre>";
// print_r($products_array);
// echo "</pre>";

?>
  <div class="short_description">
    <img src="img/<?php echo $categories['img'];?>" alt="">
    <h2><?php echo $categories['name'];?> </h2>
    <div><p><?php echo $categories['description'];?></p></div>
</div>

<div class="site-index" >
<?php   $form = ActiveForm::begin();?>

<div class="sort"><b>Сортировка по: <?php echo $form->field($model, 'str')->dropDownList([ '0' => 'Цене,по возрастанию', '1' => 'Цене,по убыванию', '2' => 'Название товара от А до я', '3' => 'Название товара от Я до А', '4' => 'Год, от новых к старым', '5' => 'Год, от старых к новым'], $params = ['prompt' => '--', ]);  ?></b></div>
<div class="sort"><b>показать: <?php echo $form->field($model, 'number')->dropDownList(['15' => '15', '30' => '30', '45' => '45'], $params = ['oprion' > ['12' > ['Selected' > true]] ]); 
                                                                                        ?></b></div>
<?php echo Html::submitButton('Go'); ?>
<?php ActiveForm::end();?>



 <!-- <div class="sort"><b>Сортировка по:</b></div> 
<form class="sort_form" action="#" method="post">
   <p><select name="categorii">
    <option value="1">--</option>
    <option value="2">Цене,по возрастанию</option>
    <option value="3">Цене,по убыванию</option>
    <option value="4">Название товара от А до я</option>
    <option value="5">Название товара от Я до А</option>
    <option value="6">Год, от новых к старым</option>
    <option value="7">Год, от старых к новым</option>
   
</select>
</form>
<div class="sort"><b>показать:</b></div> 
<form class="sort_form" action="#" method="post">
   <p><select name="categorii">
    <option value="1">12</option>
    <option value="2">24</option>
    <option value="3">48</option>
   
</select>
</form> 
<p><input type="submit" value="Отправить"></p>
   <p><input type="submit" value="Отправить"></p> -->
             в наличии <?php echo $count_products; ?>  <!-- сколько в наличии -->
             
</div>


<div class="wrapper mt-5">
    <div class="container">
        <div class="roww">

            <div class="product-cards mb-5">
            <?php foreach ($products_array as $product_array): ?> <!-- цикл по выводу подуктов  -->
                <div class="product-card">
                    <div class="offer">
                      
                    </div>
                    <div class="card-thumb">
                    <a href="<?=Url::toRoute(['page/productcart','id' =>$product_array['id']]);?>"><img src="img/<?php echo $product_array['img'];?>" alt="">
                    </div>
                    <div class="card-caption">
                        <div class="card-title">
                        <a href="<?=Url::toRoute(['page/productcart','id' =>$product_array['id']]);?>"><?php echo $product_array['name'];?> </a><!-- вывод Название товара  -->
                        <div class="year"><?php echo $product_array['year'];?> г.</div>
                        
                        </div>
                        <div class="card-price text-center">
                        <?php if ($product_array['price_old']): ?> <!-- Если есть старая цена то выводим саму цену в теге del  -->
                                        <del><?= $product_array['price_old'] ?> руб.</del><!-- вывод старой цены  -->
                                    <?php endif; ?>
                                    <?= $product_array['price'] ?> руб. <!-- вывод цены  -->
                        </div>
                        <a href="<?=Url::toRoute(['page/cart', 'id' => $product_array['id']]);?>" class="btn btn-info btn-block " data-id="">
                                    <i class="fas fa fa-cart-arrow-down"></i> Купить
                                </a>
                        <div class="item-status"><i class="fas fa fa-check text-success"></i> В наличии</div>
                    </div>
                </div><!-- /product-card -->
                <?php endforeach; ?>
                


            </div><!-- /product-cards -->
        </div><!-- /row -->
       
        <div class="row">
        <?php 
        if(isset($count_pages) && $count_pages > 1){
        ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php 
                    for ($i = 1; $i <= $count_pages; $i++) {
                    ?>
                    <?php 
                    if($_GET['page'] = $i){ }else {?>
                    <li class="active"><a class="page-link" href="<?=Url::toRoute(['page/listproduct','id' => $id, 'page' => $i]);?>"></a>  <?php echo $i;?></li>

                    <?php }{}?>
                    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
                   
                    
                    <li class="page-item"><a class="page-link" href="<?=Url::toRoute(['page/listproduct','id' => $id, 'page' => $i]);?>"><?php echo $i;?></a></li>


                    <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                    <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                    <?php 
                    }
                    ?>
                </ul>
            </nav>
            <?php 
        }
        ?>
        </div><!-- /row -->

    </div><!-- /container -->
</div><!-- /wrapper -->
</div>
