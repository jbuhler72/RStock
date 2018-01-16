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
            <th>Short Data</th>
            <th>Shorts</th>
        </tr>
        
    <?php
    

    
    foreach ($shortData as $row) {
        echo "<tr>";
        $stockSymbol=$row->stockSymbol;
          
         echo "<td><a href='../web/index.php?r=stocks&stockSymbol=$stockSymbol'>$stockSymbol</a></td>"; 
        
          $short2 = Shorts::find()
                ->select ('shortDate,shortVolume,shortTotalVolume')
                ->where(['stockSymbol' => $row->stockSymbol,'exchange' => 'nasdaq' ]) 
                ->limit(7)
                ->orderBy(['shortDate' => SORT_DESC])  
                ->all();           
            foreach ($short2 as $row2) 
                {
                    ///Now add NYSE
                     $short3 = Shorts::find()
                    ->select ('shortDate,shortVolume,shortTotalVolume')
                    ->where(['stockSymbol' => $row->stockSymbol,'exchange' => 'NYSE','shortDate'=> $row2->shortDate ]) 
                    ->limit(1)
                    ->all();
                    foreach($short3 as $row3) 
                    { 
                    $shortVolume=$row3->shortVolume+$row2->shortVolume;
                    $shortTotalVolume=$row3->shortTotalVolume+$row2->shortTotalVolume;
                    $shortVolumeFormat=number_format($shortVolume,0);
                    $shortTotalVolumeFormat=number_format($shortTotalVolume,0);
                    $percent=$shortVolume/$shortTotalVolume;
                    $percent = round((float)$percent * 100 ) . '%';
                    list($year,$month,$day) = explode("-",$row2->shortDate);
                    $shortDate= $month . "/" . $day . "/" . $year;
                    
                    echo "<td>Date: ".$shortDate."<br>Short Volume: ".$shortVolumeFormat."<br>Total Volume: ".$shortTotalVolumeFormat."<br>Short Percent: ".$percent."</td>";
                    } 
                    //$percent=$row2->shortVolume/$row2->shortTotalVolume;
                    //$percent = round((float)$percent * 100 ) . '%';
                    //$shortVolume=$shortVolumeNyse+$row2->shortVolume;
                    //$shortVolumeFormat=number_format($shortVolume,0); 
                    //$shortTotalVolume=number_format($row2->shortTotalVolume,0); 
                    //echo "<td>Date: ".$row2->shortDate."<br>Short Volume: ".$shortVolumeFormat."<br>Total Volume: ".$shortTotalVolume."<br>Short Percent: ".$percent."</td>";
                    
                    
                }
       
                
                echo "</tr>";
     }
    
    
    ?>
    </table> 
    
 
</div>
