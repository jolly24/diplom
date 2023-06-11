<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Categories;
use app\models\Products;
use app\models\SortForm;
use yii\web\NotAcceptableHttpException;
use app\controllers\CustomController;
class PageController extends Controller
{
///контролер для страниц сайта


    public function actionListproduct() ///Продукты
    {
        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'],FILTER_VALIDATE_INT)) //вывод + не даёт сделать sql иньекции
        {
            $id = $_GET['id'];// id категории
            $categories = Categories::find()->where(['id' => $id    ])->asArray()->one(); // обращение к тоблице 

            if (is_countable($categories) && count($categories) > 0)// если больше 0
            {
                $model = new SortForm();
                $count_products = count(Products::find()->where(['category' => $id])->all());// показывает сколько товаром есть в категории
                $page = 1; // номер страницы
                $str = null; // сортировка
                $number = 15; // колличество товаров на странице

                if(isset($_GET['page']) && $_GET['page'] != "" && filter_var($_GET['page'], FILTER_VALIDATE_INT))
                {
                    $page = $_GET['page'];
                }

                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                    // echo "<pre>";
                    // print_r($model);
                    // echo "</pre>";
                    if(isset($model->str)){
                        if(isset($model->number) && !empty ($model->number)){
                            $number = $model->number;
                        }

                        switch($model->str){
                                case 0:
                                    // echo"сортировка 0";
                                    // $products_array = Products::find()->where(['category' => $_GET['id']])->asArray()->orderBy(['price'=> SORT_ASC])->limit($number)->all();
                                    $products_array = $this->selectListProd($id,['price'=> SORT_ASC], $number,$page); // от 0 до ∞
                                break;
                                case 1:
                                    // $products_array = Products::find()->where(['category' => $_GET['id']])->asArray()->orderBy(['price'=> SORT_DESC])->limit($number)->all();
                                    $products_array = $this->selectListProd($id,['price'=> SORT_DESC], $number,$page); // от ∞ до 0
                                break;
                                case 2:
                                    $products_array = $this->selectListProd($id,['name'=> SORT_ASC], $number,$page); // от А до Я
                                break;
                                case 3:
                                    $products_array = $this->selectListProd($id,['name'=> SORT_DESC], $number,$page);// от Я до А
                                break;
                                case 4:
                                    $products_array = $this->selectListProd($id,['year'=> SORT_DESC], $number,$page); // от новых к старым
                                break;
                                case 5:
                                    $products_array = $this->selectListProd($id,['year'=> SORT_ASC], $number,$page); // от старых к новым
                                break;
                                
                                default:
                                $products_array = $this->selectListProd($id,['id'=> SORT_ASC], $number,$page); // по добавлению их в базу
                                break;
                                
                        }

                    }   
                    else{
                        $products_array = $this->selectListProd($id,['id'=> SORT_ASC], $number,$page); // по добавлению их в базу
                    }

                }
                else{
                    $products_array = $this->selectListProd($id,['id'=> SORT_ASC], $number,$page); // по добавлению их в базу
                }

                
                $count_pages = ceil($count_products / $number); // количество страниц для пагинации
                // $count_products = count($products_array); // переменная считает сколько товаров в масиве
                return $this->render('listproduct', compact('categories', 'products_array', 'count_products', 'model', 'count_pages', 'id')); // то происходит это
            }
                


        }

        return $this->redirect(['page/caregoris']); // если мньше нуля то вот это (выход из этого цикла) 
        
        
    }
    private function selectListProd($id, $field_sort, $limit, $start){
            if($start == 1)
                $start = 0;
            else
                $start = ($start - 1) * $limit;

        return Products::find()->where(['category' => $id])->asArray()->orderBy($field_sort)->limit($limit)->offset($start)->all();
    }

    public function actionCaregoris() ///Категории
    {
        $categories = Categories::find()->asArray()->all(); // обращение к тоблице 
        return $this->render('caregori', compact('categories'));
    }


    public function actionContacts() ///где нас найти
    {
        return $this->render('contacts');
    }
   
    
    public function actionProductcart() ///карточка товара
    {  $this->layout ='productcart';
        if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
        }
        else{
            throw new NotAcceptableHttpException;
        }

        $product_array = Products::find()->where(['id' => $id])->asArray()->one();
        if(!is_array($product_array) || count($product_array) < 0){
            throw new NotAcceptableHttpException;
        }

        return $this->render('product', compact('product_array', 'id'));
    }

    public function actionCart() ///корзина
    {

        $session = Yii::$app->session;
        //        $session->destroy();
                $session->open();
        
        
                if($session->has('productsSession')){
                    $productsSession = $session->get('productsSession');
                }
                else{
                    $productsSession = array();
                }
                if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
                    $productsArray = Products::find()->where(['id' => $_GET['id']])->asArray()->one();
        
                    if(is_array($productsArray) && count($productsArray) > 0){
        
                        $flag = false;
                        for($i = 0; $i < count($productsSession); $i++){
                            if($productsSession[$i]['id'] == $_GET['id']){
                                $flag = true;
                                if($productsArray['counts'] >= $productsSession[$i]['count'] + 1){
        
                                    $productsSession[$i]['count']++;
                                }
                                break;
                            }
                        }
                        if(!$flag){
                            array_push($productsSession, ['id' => $_GET['id'], 'count' => 1 ]);
                        }
                    }
                }

            $session->set('productsSession', $productsSession);
            $productsSession = $session->get('productsSession');

            $arrayID = array();

            foreach($productsSession as $value){
                array_push($arrayID, $value['id']);
            }
    
            $products = Products::find()->where(['id' => $arrayID])->asArray()->All();
    
            foreach($products as $key => $value){
                $products[$key]['count_cart'] = $productsSession[$key]['count'];
            }

            return $this->render('cart', compact('products'));
    }
    // protected function setMeta ($tile = null, $descriptopn = null, $kaywords =null){
    //     $this->view->title = $this;
    //     $this->view->registerMetaTag(['name' => 'kaywords', 'content' => $kaywords]);
    //     $this->view->>registerMetaTag(['descriptopn' => 'kaywords', 'content' => $descriptopn]);
    // }
    // public static function printr($value)
    // {
    //     echo "<pre>";
    //     print_r($value);
    //     echo "</pre>";
    // }

}
