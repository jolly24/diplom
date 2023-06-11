<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\controllers\CustomController;
class SiteController extends CustomController
{
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }





    public $Password;
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegistration()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }



        $this->setMeta('Регистрация/Авторизация');

        $registration = new User();

        $registration->scenario = 'registration';

        $login = new User();

        $login->scenario = 'login';

        if($login->load(Yii::$app->request->post()) && $login->login())
        {
            return $this->goHome();
        }


        if($registration->load(Yii::$app->request->post()))
        {


            if (!User::find()->where(['email' => $registration->email])->limit(1)->all())
            {
                $this->Password = $registration->password;

                $registration->password = Yii::$app->security->generatePasswordHash($registration->password);
                $registration->code = Yii::$app->getSecurity()->generateRandomString(10);


                if($registration->save())
                {
                    // $registration->sendCongirmationLink();
                    // Yii::$app->session->setFlash('success', 'Вам  отправлена ссылка с потверждением вашего Email');
                    // return $this->goHome();
                }
                else
                {

                    $registration->password = $this->Password;
                    return $this->render('reglog', compact('registration'));
                }
            }
            else
            {
                Yii::$app->session->setFlash('info', 'Пользователь с таким Email существует, попробуйте востановить пароль.');
                return $this->goHome();
            }



        }



        return $this->render('reglog', compact('registration', 'login'));

    }

 public function actionConfirmemail()
    {
        $code = Yii::$app->request->get('code');
        $email = Yii::$app->request->get('email');

        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $user = User::find()->where(['code' => $code, 'email' => $email])->one();

        if($user->active == 0)
        {
            $user->code = '';
            $user->active = User::ACTIVE_USER;

            if($user->save())
            {
                $user->login();
                Yii::$app->session->setFlash('success', 'Аккаунт активирован');
                return $this->goHome();
            }

        }
        else
        {

            Yii::$app->session->setFlash('error', 'Не удалось активировать аккаунт, обратитесь к Администрации сайта.');
            return $this->goHome();
        }
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
