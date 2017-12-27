<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Symbol Exchanges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="symbol-exchange-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Symbol Exchange', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'symbol',
            'exchange',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
