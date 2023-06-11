<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Products extends ActiveRecord // название класса для контролера
{

    public static function tableName()
    {
        return 'products'; // название таблицы из базы данных
    }

}
