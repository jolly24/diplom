<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="main">
    <div class="page-header">
        <div class="wrap-page-title">
            <div class="bottom">
                <div>
                   
                </div>
            </div>
        </div>
        <!-- /.wrap-page-title -->
        <div class="wrap-breadcrumb">
            <div class="middle">
                <div>
                    
                </div>
            </div>
        </div>
        <!-- /.wrap-breadcrumb -->
    </div>
    <!-- /.page-header -->
    <!-- /.wrap-page-header -->
    <div class="main-content">
        <div class="container">
            <div class="payment-steps">
                <div class="wrap-progress">
                    
                
            <!-- /.payment-steps -->
            <div class="row">
                <div class="col-md-6">
                    <h3 class="caption">ЗАРЕГИСТРИРОВАТЬСЯ</h3>
                    <h5 class="gray-caption">Пожалуста введите E-mail и пароль для регистрации.</h5>
                    <div class="row">
                        <div class="col-md-7">


                            <?php $form = ActiveForm::begin() ?>
                            <?=  $form->field($registration, 'username')->textInput() ?>

                            <?=  $form->field($registration, 'auth_key')->textInput() ?>

                            <?=  $form->field($registration, 'email')->textInput() ?>

                            <?=  $form->field($registration, 'password')->passwordInput() ?>

                            <div class="form-group">
                                <?= Html::submitButton('Создать аккаунт', ['class' => 'orange-btn']) ?>

                            </div>

                            <?php ActiveForm::end() ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="caption">АВТОРИЗАЦИЯ</h3>
                    <h5 class="gray-caption">Пажалуста введите E-mail и пароль для авторизации</h5>
                    <div class="row">
                        <div class="col-md-7">
                            
   
                            <?php $formLogin = ActiveForm::begin() ?>

                            <?=  $formLogin->field($login, 'email')->textInput() ?>

                            <?=  $formLogin->field($login, 'password')->passwordInput() ?>

                            <div class="form-group">
                                <?= Html::submitButton('Авторизоваться', ['class' => 'pink-btn']) ?>

                            </div>

                            <?php ActiveForm::end() ?>

                            <!-- <form action="#" class="login-form">
                                <div class="form-group">
                                    <label for="email-address">Email Address</label>
                                    <input type="email" id="email-address" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" />
                                </div>
                                <div class="form-group">
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="pink-btn">Sign In</button>
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-content -->
</div>
