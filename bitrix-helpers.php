class CteamSupport
{
    public static function htmlPhone($phone)
    {
        $phoneStr = preg_replace('![^0-9]+!', '', $phone);
        return "<a href=\"tel:+$phoneStr\" class=\"contacts-content-block__link contacts-content-block__detail\">$phone</a>";
    }

    public static function htmlEmail($email)
    {
        return "<a href=\"mailto:$email\" class=\"contacts-content-block__link contacts-content-block__detail\">$email</a>";
    }

    public static function htmlSocial($type, $link)
    {
        if (!$link) return;

        switch ($type) {
            case 'SOC_VK':
                $class = "vk";
                break;

            case 'SOC_FB':
                $class = "facebook";
                break;

            case 'SOC_IM':
                $class = "instagram";
                break;

            default:
                $class = "vk";
                break;
        }
        return "<a href=\"$link\" class=\"contacts__socials-link link\"><i class=\"fa fa-$class\" aria-hidden=\"true\"></i></a>";
    }

    public static function getFullCurPage()
    {
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = $url[0];

        return $url;
    }
}
