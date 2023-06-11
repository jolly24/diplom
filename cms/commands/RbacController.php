<?php
/**
 * Created by PhpStorm.
 * User: ilyamikhalev
 * Date: 24.12.2017
 * Time: 12:07
 */

namespace app\commands;
use yii\console\Controller;
use app\models\User;
use Yii;


class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //Удалить старые записи из БД
        $auth->removeAll();

        //Создадим роли
        $user = $auth->createRole('user');
        $courier = $auth->createRole('courier');
        $manager = $auth->createRole('manager');
        $admin = $auth->createRole('admin');

        //Записываем роли в БД
        $auth->add($user);
        $auth->add($courier);
        $auth->add($manager);
        $auth->add($admin);

        // Дабавляем и описываем роли


        $AdminPage = $auth->createPermission('AdminPage');
        $AdminPage->description = 'Админки';

        $viewPanelCourier = $auth->createPermission('viewPanelCourier');
        $viewPanelCourier->description = 'Панель курьера';

        $viewPanelManager = $auth->createPermission('viewPanelManager');
        $viewPanelManager->description = 'Панель менеджера';

        //Записать роли в БД
        $auth->add($AdminPage);
        $auth->add($viewPanelCourier);
        $auth->add($viewPanelManager);

        // Присваеваем разрешения ролям
        $auth->addChild($courier, $viewPanelCourier);
        $auth->addChild($manager, $viewPanelManager);

        //Наследуем роли
        $auth->addChild($manager, $courier);
        $auth->addChild($admin, $manager);

        //Разрешения админа
        $auth->addChild($admin, $AdminPage);

        // Прописываем Админа и менеджера
        $auth->assign($admin, 1);
        $auth->assign($manager, 2);


    }
}