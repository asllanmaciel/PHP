<?php

function decrease($date,$interval, $format='Y-m-d'){  
  $dt = new DateTime($date);
  $dt_sub = $dt->sub(new DateInterval($interval));     
  return $dt_sub->format($format);
}

function increase($date,$interval, $format='Y-m-d'){  
  $dt = new DateTime($date);
  $dt_sub = $dt->add(new DateInterval($interval));     
  return $dt_sub->format($format);
}

//Exemples
$atual = date("Y-m-d");
echo decrease($atual, 'P15D');
echo increase($atual, 'P15D', 'd/m/Y');
