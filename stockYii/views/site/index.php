<?php
use app\models\Shorts;
/* @var $this yii\web\View */

$this->title = 'Analyze Stocks';
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<div class="site-index">

  
    
      

    <div class="body-content">
        
        <div class="shorts-index">

  
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
          
         echo "<td><a href='../web/index.php?r=stocks&stockSymbol=$stockSymbol'>$stockSymbol</a>" ?>
        </td>
        <?php

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
                    
                    echo "<td>Date: ".$shortDate."<br>Short Volume: ".$shortVolumeFormat."<br>Total Volume: ".$shortTotalVolumeFormat."<br>Short Percent: ".$percent."";
                    
                    ?>
             	<a href="#exampleModalLong" data-toggle="modal" data-target="#exampleModalLong"><span class="glyphicon glyphicon-plus"></span></a>		
		
    </td>
        <?php
                    
                    
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
        
          

        <div class="row">
            <div class="col-lg-4">
                <h2>Git Hub</h2>

                <p>My first love is programming and my second is learning about stocks.
                   I have started a gitHub repository, I built this site off of the framework Yii 2.0. 
                   Please contribute so we can make a fantastic site to analyze stocks.</p>

                <p><a class="btn btn-default" href="https://github.com/jbuhler72/RStock">github &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>R</h2>

                <p>I am currently using R to connect to Quandl to get the shorts of three stocks: Medovex, Amazon and CVS. Look at the repository to see how I do that.</p>

                <p><a class="btn btn-default" href="https://www.quandl.com">Quandl.com &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Tableau</h2>

                <p>I am going to use Tableau to show some visuals, which is coming soon.</p>

                <p><a class="btn btn-default" href="https://www.tableau.com">Tableau &raquo;</a></p>
            </div>
        </div>
            <div>
                <p align='center'><a class="btn btn-lg btn-success" href="../web/index.php?r=shorts">Analyze Stocks</a>
                    
                </p>
            </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>