function message($template, $post, $order)
{
    $message = $template;
    
    $message = str_replace("\r\n", '<br/>', $message);
    $message = str_replace('{order}', $order, $message);
    $message = str_replace('{time}', date("Y-m-d H:i:s"), $message);
    $message = str_replace('{zakaz}', $_COOKIE['_vasa_'], $message);

    $replace = [];
    foreach ($post as $key => $value) {
        $replace['{' . $key . '}'] = $value;
    }
    $message = strtr($message, $replace);
    return $message;
}

function validateEmail($emailS)
{
    return preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $emailS);
}

function validateName($nameS)
{
    $nameS = preg_replace('|[\s]+|s', ' ', $nameS);
    return trim(htmlentities($nameS));
    // return preg_match("/^[a-zа-яА-ЯёЁ]{2,}((\s+[a-zа-яА-ЯёЁ]{2,}){1,2})?$/ui", $nameS);
}

function validatePhone($phoneS)
{
    return preg_match("/^\+?[0-9\(\)\-\s]{6,}$/", $phoneS);
}