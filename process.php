<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Проверяем, что все поля заполнены
    if (empty($name) || empty($email) || empty($message)) {
        echo "Пожалуйста, заполните все поля.";
        exit;
    }

    // Проверяем правильность email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Некорректный email.";
        exit;
    }

    // Настройки для отправки письма
    $to = "your-email@example.com"; // Укажите ваш email
    $subject = "Новое сообщение с контактной формы";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Текст письма
    $body = "Имя: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Сообщение:\n$message\n";

    // Отправляем письмо
    if (mail($to, $subject, $body, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения. Попробуйте еще раз.";
    }
} else {
    echo "Некорректный запрос.";
}
?>
