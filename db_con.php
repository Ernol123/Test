<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=hangman', 'root', '');
} catch (PDOException $exc) {
    exit('Error: ' . $exc->getMessage());
}
