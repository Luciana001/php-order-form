<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

//your products with their price.
$pizzas = [
    ['name' => 'Margherita', 'price' => 8],
    ['name' => 'Hawaï', 'price' => 8.5],
    ['name' => 'Salami pepper', 'price' => 10],
    ['name' => 'Prosciutto', 'price' => 9],
    ['name' => 'Parmiggiana', 'price' => 9],
    ['name' => 'Vegetarian', 'price' => 8.5],
    ['name' => 'Four cheeses', 'price' => 10],
    ['name' => 'Four seasons', 'price' => 10.5],
    ['name' => 'Scampi', 'price' => 11.5]
];

$drinks = [
    ['name' => 'Water', 'price' => 1.8],
    ['name' => 'Sparkling water', 'price' => 1.8],
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 2.2],
];
$totalValue = 0;
$products = $pizzas;

if(isset($_GET['food'])){
    if($_GET['food'] == false){
        $products = $drinks;
    }
} 

if(isset($_POST['send'])){

    $select= [];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $streetNumber = $_POST['streetnumber'];
    $city = $_POST['city'];
    $zipCode = $_POST['zipcode'];

    $localtime = localtime();
    $minute =  $localtime[1];
    $heure =  $localtime[2]+ 1;
    if($minute < 10){
        $minute = 0 .$minute;
    }
    
    if(isset($_POST['express_delivery'])){
        $minute = $minute + 30;
        if ($minute >= 60){
            $heure = $heure + 1; 
            $minute = $minute - 60; 
        }
        $time = $heure."h".$minute; //heure de livraison (+30min)
        $totalValue = 5;
    }else $time = $heure + 1 ."h".$minute; //heure de livraison (+1h)

    if(isset($_POST['products'])){
        $a = $_POST['products'];
        foreach($a as $i => $valeur){
            $valeur = $products[$i]['price'];
            echo $valeur.',';
            $totalValue += $valeur;
        }
        //$_SESSION['total-price'] = $totalValue;
        
    }
    

    if (empty($_POST['email']) || empty($_POST['street']) || empty($_POST['streetnumber']) || empty($_POST['city']) || empty($_POST['zipcode']) ){
		echo "<div class='alert alert-danger' role='alert'>ERREUR : tous les champs n'ont pas ete renseignés. </div>";
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-danger' role='alert'>L'adresse e-mail n'est pas valide</div>";
    }elseif(!filter_var($streetNumber, FILTER_VALIDATE_INT)){
        echo "<div class='alert alert-danger' role='alert'>Le numero de maison doit être un nombre. </div>";
    }
    elseif(!filter_var($zipCode, FILTER_VALIDATE_INT)){
        echo "<div class='alert alert-danger' role='alert'>Le code postal doit être un nombre. </div>";
    }elseif (!isset ($_POST["products"])) {
        echo '<div class="alert alert-danger"role="alert"> Invalid selection </div>';
    }else echo "<div class='alert alert-success' role='alert'>Commande envoyée! Livraison prévue à $time</div>";
}






// function whatIsHappening() {
//     echo '<h2>$_GET</h2>';
//     var_dump($_GET);
//     echo '<h2>$_POST</h2>';
//     var_dump($_POST);
//     echo '<h2>$_COOKIE</h2>';
//     var_dump($_COOKIE);
//     echo '<h2>$_SESSION</h2>';
//     var_dump($_SESSION);
// }



require 'form-view.php';