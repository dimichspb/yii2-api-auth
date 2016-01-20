<?php
namespace console\Controllers;

use Yii;

class RbacController extends \yii\console\Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //getCountriesList permission
        $getCountriesList = $auth->createPermission('getCountriesList');
        $getCountriesList->description = 'Get Countries list';
        if ($auth->add($getCountriesList)) {
            $this->stdout($getCountriesList->name . " permission has been added\n");
        };

        //getCountryDetails permission
        $getCountryDetails = $auth->createPermission('getCountryDetails');
        $getCountryDetails->description = 'Get Country details';
        if ($auth->add($getCountryDetails)) {
            $this->stdout($getCountryDetails->name . " permission has been added\n");
        }

        //createCountry permission
        $createCountryDetails = $auth->createPermission('createCountryDetails');
        $createCountryDetails->description = 'Create Country details';
        if ($auth->add($createCountryDetails)) {
            $this->stdout($createCountryDetails->name . " permission has been added\n");
        }

        //updateCountry permission
        $updateCountryDetails = $auth->createPermission('updateCountryDetails');
        $updateCountryDetails->description = 'Update Country details';
        if ($auth->add($updateCountryDetails)) {
            $this->stdout($updateCountryDetails->name . " permission has been added\n");
        }

        //deleteCountry permission
        $deleteCountryDetails = $auth->createPermission('deleteCountryDetails');
        $deleteCountryDetails->description = 'Delete Country details';
        if ($auth->add($deleteCountryDetails)) {
            $this->stdout($deleteCountryDetails->name . " permission has been added\n");
        }

        //countriesUser role
        $countriesUser = $auth->createRole('countriesUser');
        if ($auth->add($countriesUser)) {
            $this->stdout($countriesUser->name . " role has been added\n");
        }
        $auth->addChild($countriesUser, $getCountriesList);
        $auth->addChild($countriesUser, $getCountryDetails);

        //countriesAdmin role
        $countriesAdmin = $auth->createRole('countriesAdmin');
        if ($auth->add($countriesAdmin)) {
            $this->stdout($countriesAdmin->name . " role has been added\n");
        }
        $auth->addChild($countriesAdmin, $countriesUser);
        $auth->addChild($countriesAdmin, $createCountryDetails);
        $auth->addChild($countriesAdmin, $updateCountryDetails);
        $auth->addChild($countriesAdmin, $deleteCountryDetails);

        //User role
        $user = $auth->createRole('User');
        if ($auth->add($user)) {
            $this->stdout($user->name . " role has been added\n");
        }
        $auth->addChild($user, $countriesUser);

        //Admin role
        $admin = $auth->createRole('Admin');
        if ($auth->add($admin)) {
            $this->stdout($admin->name . " role has been added\n");
        }
        $auth->addChild($admin, $countriesAdmin);

        $auth->assign($admin, 1);
    }

    public function actionRemoveAll()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $this->stdout("All permissions and roles have been removed\n");
    }
}