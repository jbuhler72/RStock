<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shorts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shorts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shorts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'stockSymbol',
            'shortVolume',
            'shortDate',
            'shortTotalVolume',
            // 'ShortExemptVolume',
            // 'exchange',
            // 'shortPercent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
