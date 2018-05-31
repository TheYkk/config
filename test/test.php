<?php
/**
 * Created by PhpStorm.
 * User: TheYkk
 * Date: 1.06.2018
 * Time: 00:17
 */


require '../src/Config.php';

$cnf = new \TheYkk\Config('rot.php');

echo $cnf->get('rot.application.name');
$cnf->set('genel.durum','oldu');

echo $cnf->get('genel.durum');

