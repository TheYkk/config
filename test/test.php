<?php
/**
 * Created by PhpStorm.
 * User: TheYkk
 * Date: 1.06.2018
 * Time: 00:17
 */


require '../src/Config.php';
use TheYkk\Config;


$cnf =  Config::load('rot.php');

echo $cnf->get('rot.application.name');
echo '<br>';
$cnf->set('genel.durum','oldu');

echo $cnf->get('genel.durum');

