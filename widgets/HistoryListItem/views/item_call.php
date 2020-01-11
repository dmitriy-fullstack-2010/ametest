<?php

use app\models\Call;
use app\widgets\HistoryList\helpers\HistoryListHelper;

$answered = $model->call && $model->call->status == Call::STATUS_ANSWERED;
?>
<?= $this->render('_item_common', [
    'user' => $model->user,
    'content' => $model->call->comment ?? '',
    'body' => HistoryListHelper::getBodyByModel($model),
    'footerDatetime' => $model->ins_ts,
    'footer' => isset($model->call->applicant) ? "Called <span>{$model->call->applicant->name}</span>" : null,
    'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
    'iconIncome' => $answered && $model->call->direction == Call::DIRECTION_INCOMING,
]) ?>
