<?php
$pagetitle = array(
    'title' => 'GALACK Store',
);

$logo = array(
    'imagesource' => 'logo.png',
    'imagealt' => 'GALACK logo',
);

$footer = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'firm' => 'Galack Company - All rights reserved.'
);

$pages = array(
	'/' => array('file' => 'home', 'text' => 'Home'),
    'about' => array('file' => 'about', 'text' => 'About Us'),
    'contact' => array('file' => 'contact', 'text' => 'Contact'),
    'gallery' => array('file' => 'gallery', 'text' => 'Gallery'),
    'login' => array('file' => 'login', 'text' => 'Login'),
    'reg' => array('file' => 'reg', 'text' => 'Register'),
    'forget' => array('file' => 'forget', 'text' => 'ForgetPassword'),

);

$error_page = array ('file' => '404', 'text' => 'Page not found!');
?>