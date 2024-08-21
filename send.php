<?php
$name = $_POST['name'];
$phone = $_POST['phone'];

$headers = "Content-type: text/html; charset=utf-8 \r\n" . "From: no-reply@brothersgurylevi.ru \r\n" . "Reply-To: no-reply@brothersgurylevi.ru \r\n";
$emails = [
    'brothersgurylevi@gmail.com',
    'aleksandr.radchenko.2000@mail.ru'
];

$text = "Имя: $name<br>
Телефон: $phone<br>
";

foreach ($emails as $mail) {
    mail($mail, 'Заявка', $text, $headers);
}