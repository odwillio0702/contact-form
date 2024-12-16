<?php
// Определяем язык (по умолчанию русский)
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'ru';

// Переводы
$translations = [
    'ru' => [
        'title' => 'Свяжитесь с нами',
        'name' => 'Имя',
        'email' => 'Email',
        'message' => 'Сообщение',
        'name_placeholder' => 'Введите ваше имя',
        'email_placeholder' => 'Введите ваш email',
        'message_placeholder' => 'Введите ваше сообщение',
        'submit' => 'Отправить',
        'error_empty' => 'Пожалуйста, заполните все поля.',
        'error_email' => 'Некорректный email.',
        'success' => 'Сообщение успешно отправлено!',
        'error' => 'Ошибка при отправке сообщения. Попробуйте еще раз.',
    ],
    'en' => [
        'title' => 'Contact Us',
        'name' => 'Name',
        'email' => 'Email',
        'message' => 'Message',
        'name_placeholder' => 'Enter your name',
        'email_placeholder' => 'Enter your email',
        'message_placeholder' => 'Enter your message',
        'submit' => 'Submit',
        'error_empty' => 'Please fill out all fields.',
        'error_email' => 'Invalid email address.',
        'success' => 'Message successfully sent!',
        'error' => 'Error sending message. Please try again.',
    ]
];

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Проверяем, что все поля заполнены
    if (empty($name) || empty($email) || empty($message)) {
        echo $translations[$lang]['error_empty'];
        exit;
    }

    // Проверяем правильность email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo $translations[$lang]['error_email'];
        exit;
    }

    // Настройки для отправки письма
    $to = "contactformodwillio0702@gmail.com"; // Укажите ваш email
    $subject = $translations[$lang]['title'];
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Текст письма
    $body = "Имя: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Сообщение:\n$message\n";

    // Отправляем письмо
    if (mail($to, $subject, $body, $headers)) {
        echo $translations[$lang]['success'];
    } else {
        echo $translations[$lang]['error'];
    }
} else {
    echo "Некорректный запрос.";
}
?>
