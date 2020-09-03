<?php

header('Location: public/');

// echo date('N');

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


// function get_first_and_last_day_week()
// {
// 	//$current_day = date('N');
// 	//$jour_restant_dimanche =  7 -  date('N');
	
// 	// echo "Lundi est le ". (date('d') -(date('N')-1)). 
// 	// "dimanche est ".(date('d') +($jour_restant_dimanche)) ;

// 	return [
// 		'lundi' => date('Y').'-'.date('m').'-'.(date('d') -(date('N')-1)),
// 		'dimanche' => date('Y').'-'.date('m').'-'.(date('d') +(7 -  date('N')))
// 	];

// }

// $res = get_first_and_last_day_week();

// var_dump($res );


// $date=date_create("2013-03-15");
// date_add($date,date_interval_create_from_date_string("60 days"));
// echo date_format($date,"Y-m-d");

// echo "======== ";
// $date=date_create("2013-03-15");
// date_sub($date,date_interval_create_from_date_string("40 days"));
// echo date_format($date,"Y-m-d");

// function getMondayAndSunday($date_given = date('Y-m-d')){
// 	$monday=date_create($date_given);
// 	$sunday=date_create($date_given);
// 	$jour_restant = 7 -  date('N');
// 	$jour_pass = 7 - $jour_restant;

// 	date_add($sunday,date_interval_create_from_date_string($jour_restant." days"));
// 	date_sub($monday,date_interval_create_from_date_string($jour_pass  ." days"));

// 	return [
// 		'monday' => $monday,
// 		'sunday' => $sunday
// 	];

// }

// $res = getMondayAndSunday();

// var_dump($res);


