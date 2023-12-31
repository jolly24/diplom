<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SortForm extends Model
{
    public $str; // сортировка по правилам
    public $number; //по сколько товаров выводить на странице
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['str', 'number'], 'trim'],
        ];
    }
}
