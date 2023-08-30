if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    header("HTTP/1.0 404 Not Found");
    header("Location: /404");
    //return;
}



// Если в массиве POST нет действия - выход
if (empty($_POST)) {
    return;
}

$message = '';
if (isset($_POST['page'])) {
    $name = $_POST['page'];
    $message .= "Страница: $name<br>";
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $message .= "Имя: $name<br>";
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    $message .= "Телефон: $phone<br>";
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $message .= "Email: $panel<br>";
}
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    $message .= "Страница: $page<br>";
}
if (isset($_POST['contact'])) {
    $contact = $_POST['contact'];
    $message .= "Способ связи: $contact<br>";
}
if (isset($_POST['message'])) {
    $msg = $_POST['message'];
    $message .= "Сообщение: $msg<br>";
}

if (isset($_POST['product'])) {
    $productName = $_POST['product'];
    $message .= "Товар: $productName<br>";
}



$to = "1@gmail.com"; /*Укажите адрес, га который должно приходить письмо */
$sendfrom   = "1@info.ru"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
$headers  = "From: " . strip_tags($sendfrom) . "\r\n";
$headers .= "Reply-To: " . strip_tags($sendfrom) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
$subject = "Форма обратной связи с сайта:";






$send = mail($to, $subject, $message, $headers);
