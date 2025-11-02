<?php
$bookRepository = new $bookRepository($db);

$new_arrivals_data = $bookRepository->getNewestBooks(4);

$action = 'main-page';
require_once("views.php");