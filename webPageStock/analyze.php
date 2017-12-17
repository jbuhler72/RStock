<!doctype html>
<?php
//Need to get this in a file

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Analyze Stocks</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Top navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Coming Soon</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Coming Soon</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
      <div>According to www.investopedia: A large increase or decrease in a stock's short interest from the previous month can be a very telling indicator of investor sentiment. Let's say that Microsoft's short interest increased by 10% in one month. This means that there was a 10% increase in the number of people who believe the stock price will decrease. Such a significant shift provides good reason for investors to find out more. We would need to check the current research and any recent news reports to see what is happening with the company and why more investors are selling its stock.
Read more: Short Interest: What It Tells Us http://www.investopedia.com/articles/01/082201.asp#ixzz4xQqw09wR
Follow us: Investopedia on Facebook</div>
      <h5>Data is obtained using R and it comes from https://www.quandl.com using FINRA/FNSQ_AMZN(Nasdaq) and FINRA/FNYX_AMZN(NYSE)</h5>  
      <h1>Shorts</h1>
        <table class='table table-striped table-bordered table-hover'>
            <tr>
                <th>Date</th>
                <th>Short Volume</th>
                <th>Total Volume</th>
                 <th>Average Short Volume Per Day</th> 
                <th>Percent TV/SV</th>
               
            </tr>
      <?php
      
      function showData($startDate,$endDate,$monthYearName,$stockSymbol)
      {
         //***************************************************************
        //***************************************************************
        // To make this work please add a file called dbConnect.php
        // Then add the line below to that file but with the correct information
        //$link = mysqli_connect("host", "userName", "password", "stock");
        //***************************************************************
        //**************************************************************
        include 'dbConnect.php';
        $select="select * from shorts where shortDate between '$startDate' and  '$endDate' and stockSymbol='$stockSymbol'";
        $result=mysqli_query($link,$select)or die('could not execute function query');
        while ($row=mysqli_fetch_array($result))
        {
                $totalShort=$totalShort+$row['shortVolume'];
                $totalshortTotalVolume=$totalshortTotalVolume+$row['shortTotalVolume'];
                $percent=$row['shortTotalVolume']/$row['shortVolume'];
                $count++;
        } 
        echo "<tr>";
        echo "<td>$monthYearName</td>";
        $totalShortFormat=number_format($totalShort,0);
        echo "<td>$totalShortFormat</td>";
        $totalshortTotalVolumeFormat=number_format($totalshortTotalVolume,0);
        echo "<td>$totalshortTotalVolumeFormat</td>";
        
        $avgShortVolumeperDay=$totalShort/$count;
        $avgShortVolumeperDay=number_format($avgShortVolumeperDay,0);
        echo "<td>$avgShortVolumeperDay</td>";
        $totalPercent=$totalshortTotalVolume/$totalShort;
        echo "<td>$totalPercent</td>";
        echo "</tr>";
        mysqli_close($link);
        return  $avgShortVolumeperDay;
        
      }
        echo "<tr>";
        echo "<th colspan='6'>AMZN</th>";
        echo "<tr>";
        showData('2017/12/01','2017/12/31','December 2017','AMZN');
        showData('2017/11/01','2017/11/30','November 2017','AMZN');
        showData('2017/10/01','2017/10/31','October 2017','AMZN');
        showData('2017/9/01','2017/9/30','September 2017','AMZN');
        showData('2017/8/01','2017/8/31','August 2017','AMZN');
        showData('2017/7/01','2017/7/31','July 2017','AMZN');
        showData('2017/6/01','2017/6/30','June 2017','AMZN');
        showData('2017/5/01','2017/5/31','May 2017','AMZN');
        showData('2017/04/01','2017/04/30','April 2017','AMZN');
        showData('2017/03/01','2017/03/31','March 2017','AMZN');
        showData('2017/02/01','2017/02/28','Febraury 2017','AMZN');
        showData('2017/01/01','2017/01/31','January 2017','AMZN');
        echo "<tr>";
        echo "<th colspan='6'>CVS</th>";
        echo "<tr>";
        showData('2017/12/01','2017/12/31','December 2017','CVS');
        showData('2017/11/01','2017/11/30','November 2017','CVS');
        showData('2017/10/01','2017/10/31','October 2017','CVS');
        showData('2017/9/01','2017/9/30','September 2017','CVS');
        showData('2017/8/01','2017/8/31','August 2017','CVS');
        showData('2017/7/01','2017/7/31','July 2017','CVS');
        showData('2017/6/01','2017/6/30','June 2017','CVS');
        showData('2017/5/01','2017/5/31','May 2017','CVS');
        showData('2017/04/01','2017/04/30','April 2017','CVS');
        showData('2017/03/01','2017/03/31','March 2017','CVS');
        showData('2017/02/01','2017/02/28','Febraury 2017','CVS');
        showData('2017/01/01','2017/01/31','January 2017','CVS');
                
        echo "<tr>";
        echo "<th colspan='6'>MDVX</th>";
        echo "<tr>";        
        showData('2017/11/01','2017/11/30','November 2017','MDVX');
        showData('2017/10/01','2017/10/31','October 2017','MDVX');
        showData('2017/9/01','2017/9/30','September 2017','MDVX');
        showData('2017/8/01','2017/8/31','August 2017','MDVX');
        showData('2017/7/01','2017/7/31','July 2017','MDVX');
        showData('2017/6/01','2017/6/30','June 2017','MDVX');
        showData('2017/5/01','2017/5/31','May 2017','MDVX');
        showData('2017/04/01','2017/04/30','April 2017','MDVX');
        showData('2017/03/01','2017/03/31','March 2017','MDVX');
        showData('2017/02/01','2017/02/28','Febraury 2017','MDVX');
        showData('2017/01/01','2017/01/31','January 2017','MDVX');        
                
        
   
?>
        </table>    
        
        
       
     
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>


