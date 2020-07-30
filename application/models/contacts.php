<?php
// возвращает инфу об успешности отправки формы
require_once 'includes/lib.php';

$news = [];
$answer = [];

session_start(); // начинаем новую сессию или, если есть, подгружаем переменные из текущей

if (!$conn->connect_error) {
    // наша модель должна знать, какие существуют категории, чтобы вьюшка их вывела
    get_news_and_categories();
}

if ($_POST) { // если форма была отправлена
    if (isset($_SESSION['form_sent']) && $_SESSION['form_sent'] == 'true') {
        $answer = array(
            'success' => 'false',
            'message' => 'Вы уже отправляли форму в рамках текущей сессии.'
        );
    } else {
        $_SESSION['form_sent'] = 'true';
        $answer = array(
            'success' => 'true',
            'message' => 'Благодарим за ваше письмо. Мы свяжемся с вами в ближайшее время.'
        );
        if ($_POST['phone']) {
            $conn->query(
                "INSERT INTO feedback (name, email, phone, message) VALUES
                        ('"
                . htmlspecialchars($_POST['feedback-author']) . "', '"
                . htmlspecialchars($_POST['email']) . "', '"
                . htmlspecialchars($_POST['phone']) . "', '"
                . htmlspecialchars($_POST['feedback-text']) .
                "')");
        } else {
            $conn->query(
                "INSERT INTO feedback (name, email, message) VALUES
                        ('"
                . htmlspecialchars($_POST['feedback-author']) . "', '"
                . htmlspecialchars($_POST['email']) . "', '"
                . htmlspecialchars($_POST['feedback-text']) .
                "')");
        }
    }
}
require_once 'application/views/contacts.php';