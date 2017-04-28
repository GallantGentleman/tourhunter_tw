<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
use app\models\Payment;

class SendMoneyForm extends Model
{
    public $recipient;
    public $amount;
    public $sender;

    public function rules()
    {
        return [
            [['recipient', 'amount', 'sender'], 'required'],
            [['sender', 'amount'], 'integer'],
        ];
    }

    public function send()
    {
        $user = User::findOne(['id' => $this->sender]);

        if ($user->nickname == $this->recipient) return false;

        if (!$recipient = User::findOne(['nickname' => $this->recipient])) {
            $recipient = new User();
            $recipient->nickname = $this->recipient;
        }

        $recipient->balance += $this->amount;

        if ($recipient->save()) {
            $user->balance -= $this->amount;
            if ($user->save()) {

                $payment = new Payment();
                $payment->sender = $user->nickname;
                $payment->recipient = $recipient->nickname;
                $payment->amount = $this->amount;

                if ($payment->save()) {
                    return true;
                }
            }
        }

        return false;

    }
}
