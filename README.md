# RStock
Using R to study stocks

First step: in the stock directory create file titled dbConnect.php
in this file add code that says: $link = mysqli_connect("host", "userName", "password", "stock"); 
but add your correct data. 



In the RCode directory shortStockAnalyze.R: is R code that will take data from Quandl and get all the shorts from Amazon, I want to be able to use one file to read many stocks. I did create a Mysql database to store the short data. My goal in this file is to get more stock data for shorts then just Amazon. And I want to also run Quandl to analyze more than just shorts.

In the SQLCode directory the createTables.sql is the current data structure for mysql, I am taking the data using R and putting it into tables

My goal is to use Yii to show all the data in trends and comparisons. For now I am just writing HTML and PHP to show the data that I pull out of the tables.

I know this is a huge work in progress, but it is a great place to start. 




