<?php

require_once 'includes/lib.php';

$conn = connect_db();

$news       = get_news($conn);
$categories = get_categories($conn);

require_once 'application/views/about.php';
