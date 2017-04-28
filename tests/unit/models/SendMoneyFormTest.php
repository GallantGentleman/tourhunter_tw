<?php

namespace tests\models;

use app\models\Payment;
use app\models\User;

class SendMoneyFormTest extends \Codeception\Test\Unit
{
    private $model;

    public function testSendMoneyToMyself()
    {
        $this->model = new SendMoneyForm([
            'recipient' => 'test_test',
            'amount' => 100,
            'sender' => 'test_test'
        ]);

        $this->assertFalse($this->model->send());

    }

}
