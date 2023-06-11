<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Categories extends ActiveRecord // название класса для контролера
{

    public static function tableName()
    {
        return 'categories'; // название таблицы из базы данных
    }

}
