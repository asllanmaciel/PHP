<?php

$file = fopen('color-list.csv', 'r');

echo '<table>';

$count = 0;
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
  //print_r($line);
  
  if($count==0){
  	  echo '<tr>';
		  echo '<th colspan="2">'.$line[0].'</th>';
		  echo '<th>'.$line[1].'</th>';
		  echo '<th>'.$line[2].'</th>';
		  echo '<th>'.$line[3].'</th>';
		  echo '<th>'.$line[4].'</th>';
		  echo '<th>'.$line[5].'</th>';
		  echo '<th>'.$line[6].'</th>';
		  echo '<th>'.$line[7].'</th>';
		  echo '<th>'.$line[8].'</th>';
		  echo '<th>'.$line[9].'</th>';
	  echo '</tr>';
  }else{
	  echo '<tr>';
		  echo '<td style="background-color:'.$line[1].'"><span>'.$count.'</span></td>';
		  echo '<td>'.$line[0].'</td>';
		  echo '<td>'.$line[1].'</td>';
		  echo '<td>'.$line[2].'</td>';
		  echo '<td>'.$line[3].'</td>';
		  echo '<td>'.$line[4].'</td>';
		  echo '<td>'.$line[5].'</td>';
		  echo '<td>'.$line[6].'</td>';
		  echo '<td>'.$line[7].'</td>';
		  echo '<td>'.$line[8].'</td>';
		  echo '<td>'.$line[9].'</td>';
	  echo '</tr>';
  }
  
  $count++;
  
}

echo '<table>';

fclose($file);

