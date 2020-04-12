<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['name']) && !empty($_POST['phone'])){
    if (isset($_POST['name'])) {
        if (!empty($_POST['name'])){
          $uname = strip_tags($_POST['name']);
          $unameFieldset = "Имя:%20";
         }
    }
    if (isset($_POST['phone'])) {
        if (!empty($_POST['phone'])){
          $uphone = strip_tags($_POST['phone']);
          $uphoneFieldset = "Телефон:%20";
        }
    }


    $token = "1166739482:AAGOpC1mmGJaaRGkQI5KYNGCpOLDWTrzKLY";
    $chat_id = "-481025421";
    $arr = array(
      $unameFieldset => $uname,
      $uphoneFieldset => $uphone
    );
    foreach($arr as $key => $value) {
      $txt .= "<b>".$key."</b>".$value."%0A";
    };
    $sendToTelegram = fopen("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&parse_mode=html&text=".$txt,"r");
        if ($sendToTelegram == 'false') {
            echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
        } else {
          echo '<h3 class="success">Спасибо! В ближайшее время наш менеджер свяжется с Вами.</h3>';
        }
  } else {
    echo '<p class="fail">Ошибка. Вы заполнили не все обязательные поля!</p>';
  }
} else {
  header ("Location: http://vk.com");
}
