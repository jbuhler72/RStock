<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SymbolExchange */

$this->title = 'Update Symbol Exchange: ' . $model->symbol;
$this->params['breadcrumbs'][] = ['label' => 'Symbol Exchanges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->symbol, 'url' => ['view', 'id' => $model->symbol]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="symbol-exchange-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
