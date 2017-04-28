<?php
use yii\helpers\Html;
?>
<h3>Main Page</h3>

<?php if($users): ?>

<table class="table">
    <thead>
        <tr>
            <td>Sender</td>
            <td>Amount</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>

        <tr>
            <td><?= Html::encode($user['nickname']) ?></td>
            <td><?= Html::encode($user['balance']) ?></td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>

<h3>No users.</h3>

<?php endif; ?>
