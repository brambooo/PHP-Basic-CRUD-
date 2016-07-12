<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 12-7-2016
 * Time: 09:55
 */

ini_set('display_errors', 1); // zet foutmelding aan op dev server
/**
 * PDO Database voorbeeld
 * @created by Bram Reinold
 */

// Attributes
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "basic_php_ccrud");     // Tijdelijk even een tabel hieruit gepakt.

try {
    // Initialiseren van database
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    // Instellen error modus
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // beste manier om fouten af te handelen
} catch(PDOException $pdoE) {
    echo "Foutmelding connectie met de database: </br>";
    echo $pdoE->getMessage();
}