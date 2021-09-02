<?php

  /*************************
  * Yesterday / -1 days
  **************************/
  //Yesterday
  $yesterday = date("Y-m-d", strtotime("yesterday"));
  //On 2019-08-19, this resulted in 2019-08-18
  echo $yesterday

  /*************************
  * Yesterday / -1 days
  * A DateTime alternative, which you can use if your PHP version is 5.3.0 or above
  **************************/  
  //New DateTime object representing today's date.
  $currentDate = new DateTime();
  //Use the sub function to subtract a DateInterval
  $yesterdayDT = $currentDate->sub(new DateInterval('P1D'));
  //Get yesterday's date in a YYYY-MM-DD format.
  $yesterday = $yesterdayDT->format('Y-m-d');
  //Print it out.
  echo $yesterday;
  
  /*************************
  * Yesterday / -1 days
  * A DateTime alternative, but if you want to subtract a day from a given date
  **************************/  
  //Pass the date you want to subtract from in as
  //the $time parameter for DateTime.
  $currentDate = new DateTime('2019-01-01');
  //Subtract a day using DateInterval
  $yesterdayDT = $currentDate->sub(new DateInterval('P1D'));
  //Get the date in a YYYY-MM-DD format.
  $yesterday = $yesterdayDT->format('Y-m-d');
  //Print it out.
  echo $yesterday;

  /*************************
  * One week ago / -7 days
  **************************/
  //7 days ago - last week.
  $lastWeek = date("Y-m-d", strtotime("-7 days"));
  //On 2019-08-19, this resulted in 2019-08-12
  echo $lastWeek;

  /*************************
  * One week ago / -7 days
  * For those who prefer to use PHP’s DateTime class
  **************************/
  //Today's date.
  $currentDate = new DateTime();
  //Subtract a day using DateInterval
  $lastWeekDT = $currentDate->sub(new DateInterval('P1W'));
  //Get the date in a YYYY-MM-DD format.
  $lastWeek = $lastWeekDT->format('Y-m-d');
  //Print out the result.
  echo $lastWeek;

  /*************************
  * Last month / -30 days
  **************************/
  //Last month
  $lastMonth = date("Y-m-d", strtotime("-1 month"));
  //On 2019-08-19, this resulted in 2019-07-19
  echo $lastMonth;

  //Get the first date of the previous month.
  echo date("Y-m-d", strtotime("first day of previous month"));


