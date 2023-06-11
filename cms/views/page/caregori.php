<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
$this->title = 'категории';
?>
<div class="site-index">
<!-- <form action="select1.php" method="post">
   <p><select name="categorii">
  <optgroup label="Год">
    <option value="1">2023</option>
    <option value="2">2022</option>
    <option value="3">2021</option>
  </optgroup>
 
</select>
   <p><input type="submit" value="Отправить"></p>
  </form>
  <form action="select1.php" method="post">
   <p><select name="categorii">
  <optgroup label="по наименованию">
    <option value="1">Москва</option>
    <option value="2">Санкт-Петербург</option>
    <option value="3">Новосибирск</option>
  </optgroup>
  
</select>
   <p><input type="submit" value="Отправить"></p>
  </form>
  <form action="select1.php" method="post">
   <p><select name="categorii">
  <optgroup label="цене">
    <option value="1">С большего к меньшему</option>
    <option value="2">С меньшего к большему</option>
    <option value="3"></option>
  </optgroup>

</select>
   <p><input type="submit" value="Отправить"></p>
  </form>
  </form>
  <form action="select1.php" method="post">
   <p><select name="categorii">
  <optgroup label="категории">
    <option value="1">струнные</option>
    <option value="2">клавишные </option>
    <option value="3">смычковые</option>
  </optgroup> -->

</select>
   <!-- <p><input type="submit" value="Отправить"></p> -->
  </form>
  <div class="wrapper mt-5">
    <div class="container">
        <div class="roww">

    <div class="product-cards mb-5">
    <?php foreach ($categories as $category): ?> <!-- цикл по выводу подуктов  -->
                <div class="product-card">

                    <div class="offer">
                      
                    </div>
                    <div class="card-thumb">

                    <a href="<?=Url::toRoute(['page/listproduct','id' =>$category['id']]);?>"><img src="img/<?php echo $category['img'];?>" alt="">
                    </div>
                    <div class="card-caption">
                        <div class="card-title">
                        <a href="#"><?php echo $category['name'];?></a><!-- вывод Название товара  -->
                        </div>
                       
                        <a href="<?=Url::toRoute(['page/listproduct','id' =>$category['id']]);?>" class="btn btn-info btn-block " data-id="">
                                    <i class="fas fa fa-cart-arrow-down"></i> Перейти
                                </a>
                    </div>

                </div><!-- /product-card -->

                <?php endforeach; ?>
                
                

               

            </div><!-- /product-cards -->

        </div><!-- /row -->
        

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
        </div><!-- /row -->

    </div><!-- /container -->
</div><!-- /wrapper -->
</div>

         
