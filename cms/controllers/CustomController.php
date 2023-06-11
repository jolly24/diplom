<?php
/**
 * Created by PhpStorm.
 * User: ilyamikhalev
 * Date: 14.12.2017
 * Time: 23:37
 */

namespace app\controllers;
use yii\web\Controller;

class CustomController extends Controller
{
    protected function setMeta ($title = null, $description = null, $keywords = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => $description]);
    }

    public static function printr($value)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    /**
     * Переделываем с русского на английский
     * @param $name
     * @return mixed|null|string|string[]
     */
    public static function translit($name)
    { //$name=strtolower($name);
        $name = mb_strtolower($name, 'utf-8');
        $name=trim($name);
        $name=str_replace("а", "a", $name);
        $name=str_replace("б", "b", $name);
        $name=str_replace("в", "v", $name);
        $name=str_replace("г", "g", $name);
        $name=str_replace("д", "d", $name);
        $name=str_replace("е", "e", $name);
        $name=str_replace("ё", "e", $name);
        $name=str_replace("ж", "zh", $name);
        $name=str_replace("з", "z", $name);
        $name=str_replace("и", "i", $name);
        $name=str_replace("й", "j", $name);
        $name=str_replace("к", "k", $name);
        $name=str_replace("л", "l", $name);
        $name=str_replace("м", "m", $name);
        $name=str_replace("н", "n", $name);
        $name=str_replace("о", "o", $name);
        $name=str_replace("п", "p", $name);
        $name=str_replace("р", "r", $name);
        $name=str_replace("с", "s", $name);
        $name=str_replace("т", "t", $name);
        $name=str_replace("у", "u", $name);
        $name=str_replace("ф", "f", $name);
        $name=str_replace("х", "h", $name);
        $name=str_replace("ц", "c", $name);
        $name=str_replace("ч", "ch", $name);
        $name=str_replace("ш", "sch", $name);
        $name=str_replace("щ", "sh", $name);
        $name=str_replace("ъ", "j", $name);
        $name=str_replace("ы", "y", $name);
        $name=str_replace("ь", "", $name);
        $name=str_replace("э", "e", $name);
        $name=str_replace("ю", "yu", $name);
        $name=str_replace("я", "ya", $name);
        $name=str_replace(" ", "-", $name);
        $name=str_replace("_", "-", $name);
        return $name;
    }
}