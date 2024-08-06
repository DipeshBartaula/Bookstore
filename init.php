<?php

use BookStore\Domain\Book as b;
use BookStore\Domain\Customer;
use BookStore\Domain\Customer\Basic;
use BookStore\Domain\Customer\Premium;

// Autoloading is a PHP feature that allows your program to search and load files automatically given some set of predefined rules.
function autoloader($classname)
{
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src' . '/' . $directory . '.php';
    require_once($filename);
}
spl_autoload_register('autoloader');

function checkIfValid(Customer $customer, array $books): bool
{
    return $customer->getAmountToBorrow() >= count($books);
}

$customer1 = new Basic(5, 'John', 'Doe', 'johndoe@mail.com');
var_dump(checkIfValid($customer1, [$book1])); // ok
$customer2 = new Premium(3, 'James', 'Bond', 'james@bond.com');
var_dump(checkIfValid($customer2, [$book1])); // fails

// $book1 = new b("1984", "George Orwell", 298374293847, 12);
// $book2 = new b("To Kill a Mockingbird", "Harper Lee", 39458724, 2);

// $customer1 = new Customer(3, 'John', 'Doe', 'johndoe@mail.com');
// $customer3 = new Customer(7, 'James', 'Bond', '007@mail.com');

// echo $customer1::getLastId();
