<?php


class hotel
{
  var $item1;
  var $item2;
  var $item3;
  function __construct( $food1, $food2, $food3)
  {
    $this->item1 = $food1;
    $this->item2 = $food2;
    $this->item3 = $food3;
  }
}
// Create object for class(hotel)
$food = new hotel("biriyani", "burger", "pizza");
echo "Before conversion : ";
echo "<br>";
var_dump($food);
echo "<br>";
// Coverting object to an array
$foodArray = (array)$food;
echo "After conversion :";
var_dump($foodArray);

//JSON METHOD

class hotelNovo
{
  var $var1;
  var $var2;
  function __construct( $bill, $food )
  {
    $this->var1 = $bill;
    $this->var2 = $food;
  }
}
// Creating object
$food = new hotelNovo(500, "biriyani");
echo "Before conversion:";
echo "<br>";
var_dump($food);
echo "<br>";
// Converting object to associative array
$foodArray = json_decode(json_encode($food), true);
echo "After conversion:";
var_dump($foodArray);
