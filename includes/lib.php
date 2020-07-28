<?php
require_once 'config.php';

global $params;

$conn = new mysqli(
    $params['servername'],
    $params['username'],
    $params['password'],
    $params['database'],
    $params['port']
);

$active_tab = 'index';