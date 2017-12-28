<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Shorts;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stocks that I am interested in';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shorts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <table class='table'>
        <tr>
            <th>Symbol</th>
            <th>ShortDate</th>
            <th>Shorts</th>
        </tr>
        
    <?php
    

    
    foreach ($shortData as $row) {
        echo "<tr>";
        $stockSymbol=$row->stockSymbol;
          
         echo "<td><a href='../web/index.php?r=stocks&stockSymbol=$stockSymbol'>$stockSymbol</a></td>"; 
        
          $short2 = Shorts::find()
                ->select ('shortDate,shortVolume')
                ->where(['stockSymbol' => $row->stockSymbol])  
                ->all();
            foreach ($short2 as $row2) {
                echo "<td>".$row2->shortDate." ".$row2->shortVolume."</td>";
                
             
            }
       echo "</tr>";
     }
    
    
    ?>
    </table> 
    
 
</div>
