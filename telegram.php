<?php
$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$token = "1166739482:AAGOpC1mmGJaaRGkQI5KYNGCpOLDWTrzKLY";
$chat_id = "-1001443491648";
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: thank-you.html');
} else {
  echo "Error";
}
?>
