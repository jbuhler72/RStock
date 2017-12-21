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
    <table class='table'>    
        
    <?php
    

    
    foreach ($shortData as $row) {
        echo "<tr>";
        $stockSymbol=$row->stockSymbol;
        echo "<td><a href='../web/index.php?r=stocks&stockSymbol=$stockSymbol'>$stockSymbol</a></td>"; 
        echo "<td> $row->shortDate </td>";
        echo "<td> $row->shortVolume </td>";
       echo "</tr>";
     }
    
    
    ?>
    </table> 
    
 
</div>
