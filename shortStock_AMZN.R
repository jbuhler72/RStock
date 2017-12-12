#######################################################################
####This removes the data out of global Environment#####################
rm(list=ls())

######I use the data from this site https://www.quandl.com

library(Quandl)
Quandl.api_key("KEY REQUIRED")

####Nasdaq
shortData <- Quandl("FINRA/FNSQ_AMZN", type="raw")

hoWManyObject<-NROW(shortData)
hoWManyObject#


###shortVolume <- shortData$ShortVolume[1]
#numberOne
####Make sure that RMYSQL is installee

if (!require("RMySQL")) {
  install.packages("RMySQL")
  library(RMySQL)
}


#install.packages("lubridate")
####This converts string to Date
## library(lubridate)


library(RMySQL)
mydb <- dbConnect(MySQL(), user='USER NAME', password='PASSWORD', dbname='stock', host='HOST' ,port=3306)
### this will list the tables
#dbListTables(mydb)

query <- paste("delete from shorts where stockSymbol='AMZN'")
####This will show the query
query

####This will execute the query
dbGetQuery(mydb, query)


cnt=0
while (cnt < hoWManyObject) {
  cnt = cnt + 1
  shortVolume <- shortData$ShortVolume[cnt]
  shortTotalVolume <- shortData$TotalVolume[cnt]
  shortExemptVolume <- shortData$ShortExemptVolume[cnt]
  shortDate <- as.Date(shortData$Date[cnt], '%Y-%m-%d')
  shortPercent<-shortTotalVolume/shortVolume
  
  query <- paste("INSERT INTO shorts (stockSymbol,shortVolume,shortDate,shortTotalVolume,exchange,shortPercent,shortExemptVolume) VALUES ('AMZN',",shortData$ShortVolume[cnt],",'",shortDate,"','",shortTotalVolume,"','nasdaq',",shortPercent,",",shortExemptVolume,")")
  ####This will show the query
  query
  
  ####This will execute the query
  dbGetQuery(mydb, query)
  
}
###########Disconect from the database
dbDisconnect(mydb)


###########**********************************************************
########### Now get the data at the NYStock exchnage###################
############**************************************#####################
###########**********************************************************


########################################################################
####This removes the data out of global Environment#####################
rm(list=ls())



########FINRA/NYSE TRF Short Interest: CVS
shortData<- Quandl("FINRA/FNYX_AMZN", type="raw")

hoWManyObject2<-NROW(shortData)
hoWManyObject2


###shortVolume <- shortData$ShortVolume[1]
#numberOne
####Make sure that RMYSQL is installee

if (!require("RMySQL")) {
  install.packages("RMySQL")
  library(RMySQL)
}


#install.packages("lubridate")
####This converts string to Date
## library(lubridate)


library(RMySQL)
mydb <- dbConnect(MySQL(), user='USER NAME', password='PASSWORD', dbname='stock', host='HOST' ,port=3306)
### this will list the tables
#dbListTables(mydb)



cnt=0
while (cnt < hoWManyObject2) {
  cnt = cnt + 1
  shortVolume <- shortData$ShortVolume[cnt]
  shortTotalVolume <- shortData$TotalVolume[cnt]
  shortExemptVolume <- shortData$ShortExemptVolume[cnt]
  shortDate <- as.Date(shortData$Date[cnt], '%Y-%m-%d')
  shortPercent<-shortTotalVolume/shortVolume
  
  query <- paste("INSERT INTO shorts (stockSymbol,shortVolume,shortDate,shortTotalVolume,exchange,shortPercent,shortExemptVolume) VALUES ('AMZN',",shortData$ShortVolume[cnt],",'",shortDate,"','",shortTotalVolume,"','nasdaq',",shortPercent,",",shortExemptVolume,")")
  ####This will show the query
  query
  
  ####This will execute the query
  dbGetQuery(mydb, query)
  
}
###########Disconect from the database
dbDisconnect(mydb)
