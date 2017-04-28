<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $nickname;

    public function rules()
    {
        return [
            [['nickname'], 'required'],
        ];
    }

    public function login()
    {
        $identity = null;

        if (!$identity = User::findOne(['nickname' => $this->nickname])) {
            $identity = new User();
            $identity->nickname = $this->nickname;
            $identity->save();
        }

        return Yii::$app->user->login($identity);
    }
}
