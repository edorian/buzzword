<?php 

if(!isset($name)) { 
    $name = 'World';
}
 
echo 'Hello ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

