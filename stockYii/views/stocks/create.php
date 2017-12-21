<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shorts */

$this->title = 'Create Shorts';
$this->params['breadcrumbs'][] = ['label' => 'Shorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shorts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
