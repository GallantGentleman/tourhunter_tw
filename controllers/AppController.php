<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SendMoneyForm;
use app\models\LoginForm;
use app\models\User;
use app\models\Payment;

class AppController extends Controller
{
    public function actionIndex()
    {
        $users = User::find()->asArray()->all();

        return $this->render('index', [
            'users' => $users,
        ]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        $message = '';

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['app/account']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAccount()
    {
        $user_id = Yii::$app->user->getId();

        if (!$user_id) return $this->redirect(['app/login']);

        $user = User::findOne(['id' => $user_id]);

        $paymentsSender = Payment::find()->where(['sender' => $user->nickname])->asArray()->all();
        $paymentsRecipient = Payment::find()->where(['recipient' => $user->nickname])->asArray()->all();

        return $this->render('account', [
            'user' => $user,
            'paymentsSender' => $paymentsSender,
            'paymentsRecipient' => $paymentsRecipient,
        ]);
    }

    public function actionSend()
    {
        if (Yii::$app->user->isGuest) return $this->redirect(['app/login']);

        $model = new SendMoneyForm();

        if ($model->load(Yii::$app->request->post()) && $model->send()) {
            return $this->redirect(['app/account']);
        }

        return $this->render('send_money', [
            'model' => $model,
        ]);
    }

}
