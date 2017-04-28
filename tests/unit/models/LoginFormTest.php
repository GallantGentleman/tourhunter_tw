<?php

namespace tests\models;

use app\models\LoginForm;

class LoginFormTest extends \Codeception\Test\Unit
{
    private $model;

    protected function _after()
    {
        \Yii::$app->user->logout();
    }

    public function testLoginCorrect()
    {
        $this->model = new LoginForm([
            'nickname' => 'test123',
        ]);

        expect_that($this->model->login());
        expect_not(\Yii::$app->user->isGuest);
    }

}
