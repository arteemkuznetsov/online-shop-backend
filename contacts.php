<?php
$active_tab = 'contacts';

if ($_POST) {
    if (
        !isset($_POST['feedback-author']) ||
        empty($_POST['feedback-author']) ||
        strlen($_POST['feedback-author']) > 50 ||
        !isset($_POST['email']) ||
        strlen($_POST['email']) > 70 ||
        !isset($_POST['feedback-text'])
    ) {
        header('Location: 404.html');
    }
}
require_once 'application/models/contacts.php';
