<?php
$kasutaja='rasmus';
$serverinimi='localhost';
$parool='Peeter123';
$andmebaas='rasmus';
$yhendus= new mysqli($serverinimi, $kasutaja, $parool, $andmebaas);
$yhendus->set_charset('UTF8');

