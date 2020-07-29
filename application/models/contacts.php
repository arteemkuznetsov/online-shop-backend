<?php
// возвращает инфу об успешности отправки формы
require_once 'includes/lib.php';

global $conn;
global $params;
global $id;
global $_POST;

$news = [];

session_start(); // начинаем новую сессию или, если есть, подгружаем переменные из текущей

if (!$conn->connect_error) {
    // наша модель должна знать, какие существуют категории, чтобы вьюшка их вывела
    $categories_result = $conn->query("SELECT * FROM categories");
    while ($row = $categories_result->fetch_assoc()) {
        $categories[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image']
        );
    }

    // наша модель должна знать новости
    $news_result = $conn->query("SELECT id, header, date FROM news ORDER BY date DESC");
    while ($row = $news_result->fetch_assoc()) {
        $news[] = array(
            'id' => $row['id'],
            'header' => $row['header'],
            'date' => $row['date']
        );
    }
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