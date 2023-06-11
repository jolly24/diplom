<?php

namespace app\models;
use app\controllers\CustomController;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Url;
use yii\helpers\Html;
use Yii;


class User extends ActiveRecord implements IdentityInterface
{



    public $rememberMe = true;
    public $_user = false;

    const ACTIVE_USER = 0;

    public static function tableName()
    {
        return 'user';
    }



    public function rules()
    {
        return [
            [['email', 'password'], 'required', 'on' => 'registration'],
            [['username','auth_key', 'code','active', 'is_email', 'rememberMe'], 'safe', 'on' => 'registration'],

            [['active', 'is_email'], 'integer'],
            [['email', 'password', 'username','auth_key', 'code'], 'string', 'max' => 255],


            [['email', 'password'], 'required', 'on' => 'login'],
            [['username','auth_key', 'code','active', 'is_email', 'rememberMe'], 'safe', 'on' => 'login'],
        ];
    }

    /**
     * @return mixed
     * Отправка почты с потверждением Email
     */
    // public function sendCongirmationLink()
    // {
    //     $confirmationLinkUrl = Url::to(['site/confirmemail', 'email' => $this->email, 'code' => $this->code]);
    //     $confirmationLink = Html::a('Потвердите Email', $confirmationLinkUrl);

    //     $sendingResult = Yii::$app->mailer->compose()
    //         ->setFrom(Yii::$app->params['adminEmail'])
    //         ->setTo($this->email)
    //         ->setSubject('Потвердите Email')
    //         ->setHtmlBody('<p> Для прохождения регистрации Вам необходимо потвердить свой email</p>
    //         <p>'. $confirmationLink .'</p>')
    //         ->send();
    //     return $sendingResult;
    // }


    public function attributeLabels()
    {
        return [
          'email' => 'Email',
          'password' => 'Пароль',
          'username' => 'Ваше Имя',
        ];
    }


    public static function findIdentity($id)
    {
        return static ::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public static function findByUsername($email)
    {
        return static ::findOne(['email' => $email, 'active' => self::ACTIVE_USER]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);

    }

    // public function generateAuthKey()
    // {
    //     $this->auth_key = Yii::$app->security->generateRandomString();
    // }

    public function login()
    {
        $this->scenario = 'login';

        if ($this->validate())
        {
            if ($this->rememberMe)
            {
                // $cookie = $this->getUser();
                // $cookie->generateAuthKey();
                // $cookie->save();
            }

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 *30 : 0);
        }
    }

    public function getUser()
    {
        if($this->_user === false)
        {
            $this->_user = $this->findByUsername($this->email);
        }

        return $this->_user;
    }


}
