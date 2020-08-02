<?php

// возвращает инфу об успешности отправки формы
require_once 'includes/lib.php';

$answers   = [];
$user_data = []; // сохранение инфы о пользователе в случае ошибки
$success   = false;

session_start(
); // начинаем новую сессию или, если есть, подгружаем переменные из текущей

$conn = connect_db();

if ($_POST) {
    $user_data = $_POST; // копируем последние данные формы
    if (
        ! isset($_POST['feedback-author'])
        || empty($_POST['feedback-author'])
    ) {
        array_push($answers, 'Поле "Имя" не заполнено.');
    }
    if (isset($_POST['feedback-author'])
        && strlen($_POST['feedback-author']) > 50
    ) {
        array_push($answers, 'В поле "Имя" введено слишком много символов.');
    }
    if ( ! isset($_POST['email'])
         || empty($_POST['email'])
    ) {
        array_push($answers, 'Поле "Электронная почта" не заполнено.');
    }
    if ( ! isset($_POST['email'])
         && strlen($_POST['email']) > 70
    ) {
        array_push(
            $answers,
            'В поле "Электронная почта" введено слишком много символов.'
        );
    }
    if ( ! isset($_POST['feedback-text'])
         || (isset($_POST['feedback-text'])
             && empty($_POST['feedback-text']))
    ) {
        array_push($answers, 'Поле "Отзыв" не заполнено.');
    }
    if (isset($_SESSION['form_sent']) && $_SESSION['form_sent'] == 'true') {
        array_push(
            $answers,
            'Вы уже отправляли форму в рамках текущей сессии.'
        );
    } else {
        $_SESSION['form_sent'] = 'true';
        $success               = true;
        array_push(
            $answers,
            'Благодарим за ваше письмо. Мы свяжемся с вами в ближайшее время.'
        );
        if ($_POST['phone']) {
            $conn->query(
                "INSERT INTO feedback (name, email, phone, message) VALUES
                        ('"
                . htmlspecialchars($_POST['feedback-author']) . "', '"
                . htmlspecialchars($_POST['email']) . "', '"
                . htmlspecialchars($_POST['phone']) . "', '"
                . htmlspecialchars($_POST['feedback-text']) .
                "')"
            );
        } else {
            $conn->query(
                "INSERT INTO feedback (name, email, message) VALUES
                        ('"
                . htmlspecialchars($_POST['feedback-author']) . "', '"
                . htmlspecialchars($_POST['email']) . "', '"
                . htmlspecialchars($_POST['feedback-text']) .
                "')"
            );
        }
    }
}

// наша модель должна знать, какие существуют категории, чтобы вьюшка их вывела
$news       = get_news($conn);
$categories = get_categories($conn);

require_once 'application/views/contacts.php';