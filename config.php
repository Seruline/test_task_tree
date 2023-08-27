<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=bookstore', 'root', 'root123');
    $db->exec("SET NAMES UTF8");

}catch (PDOException $e) {
    print "<br>Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>