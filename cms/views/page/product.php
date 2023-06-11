<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
$this->title = 'категории';
?>
<div class="cart_img">
    <div class="img_prod">
        <img src="img/<?php echo $product_array['img'];?>">

    </div>
    <div class="content_cart">
        <h3><?php echo $product_array['name'];?></h3>
        <p><span>Артикул:<?php echo $product_array['code'];?></span></p>

        <?php
        $class = "";
            if($product_array['count'] > 0):
        ?>
            <p>В наличии <strong class="count_prod"><?php echo $product_array['count'];?></strong></p>
        <?php
            else:
                $class="disabled";
        ?>
                <p>Нет в наличии</p>
        <?php
        endif;
        ?>
        <p><?php echo $product_array['description'];?></p>
    </div>  
    <div class="col-lg-3 col-md-8 col-sm-7 col-sm-offset--5 col-xs-12">
    <div class="order_prod">
        <p class="price_prod"><?php echo $product_array['price'];?> руб</p>

        <?php
            if(!empty($product_array['price_old'])):
        ?>
            <p class="price_old_prod"><del><?php echo $product_array['price_old'];?> руб</p></del>
            <?php
                endif;
            ?>

        <?php
            if($product_array['count'] > 0):
        ?>
        <p>Количество:</p>
        <form class="form_count_prod">
            <input type="text" name="" value="1" class="input_text">
            <button type="button" class="minus">-</button>
            <button type="button" class="plus">+</button>
        </form>
    
        <?php
            else:
        ?>
                <p>Нет в наличии</p>
        <?php
        endif;
        ?>
      
        <a href="<?=Url::toRoute('page/cart')?>" class="add_mylist_prod <?php echo $class;?> " ><i class="glyphicon  fa fa-heart"  ></i>В корзину</a>
    </div>
    </div>
</div>
          

   













<div class="site-index">

</select>
   <!-- <p><input type="submit" value="Отправить"></p> -->
  </form>
  <!-- <div class="wrapper mt-5">
    <div class="container">
        <div class="roww">

    
        

        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div> </row> -->

    <!-- </div>/container --> 
</div><!-- /wrapper -->
</div>

