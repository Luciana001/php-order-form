<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

$email=$_POST['email'];
$street=$_POST['street'];
$streetNumber=$_POST['streetnumber'];
$city=$_POST['city'];
$zipCode=$_POST['zipcode'];

if (empty($_POST['email']) || empty($_POST['street']) || empty($_POST['streetnumber']) || empty($_POST['city']) || empty($_POST['zipcode'])){
		echo "<div class='alert alert-danger' role='alert'>ERREUR : tous les champs n'ont pas ete renseignés. </div>";
	}
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-danger' role='alert'>L'adresse e-mail n'est pas valide</div>";
        }
        elseif(!filter_var($streetNumber, FILTER_VALIDATE_INT)){
            echo "<div class='alert alert-danger' role='alert'>Le numero de maison doit être un nombre. </div>";
            }
            elseif(!filter_var($zipCode, FILTER_VALIDATE_INT)){
                echo "<div class='alert alert-danger' role='alert'>Le code postal doit être un nombre. </div>";
                }else echo "<div class='alert alert-success' role='alert'>Commande envoyée!</div>";
    

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//your products with their price.
$products = [
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

$products = [
    ['name' => 'Water', 'price' => 1.8],
    ['name' => 'Sparkling water', 'price' => 1.8],
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 2.2],
];

$totalValue = 0;

require 'form-view.php';