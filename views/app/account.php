<?php
use yii\helpers\Html;
?>
<h1>My Account (balance: <?= $user->balance ?>)</h1>

<h2>Payments history </h2>

<br>

<h3>Payments sender</h3>

<?php if ($paymentsSender): ?>
<table class="table">
    <thead>
        <tr>
            <td>Recipient</td>
            <td>Amount</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($paymentsSender as $paymentSender): ?>

        <tr>
            <td><?= Html::encode($paymentSender['recipient']) ?></td>
            <td><?= Html::encode($paymentSender['amount']) ?></td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <h4>No payments.</h4>
<?php endif; ?>

<br>

<h3>Payments recipient</h3>

<?php if ($paymentsRecipient): ?>
<table class="table">
    <thead>
        <tr>
            <td>Sender</td>
            <td>Amount</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($paymentsRecipient as $paymentRecipient): ?>

        <tr>
            <td><?= Html::encode($paymentRecipient['sender']) ?></td>
            <td><?= Html::encode($paymentRecipient['amount']) ?></td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <h4>No payments.</h4>
<?php endif; ?>
