<?php
$cf = 'confirmation key';
$tk = 'token group';
$vr = '5.85'; //version VK API

$data = json_decode(file_get_contents('php://input')); //Принимаем входящие параметры

switch ($data->type) {
  case 'confirmation':
  echo $cf;
  break;
  case 'message_new':
  if($data->object->body == '/Bot'){
    $param = [
      'user_id' => $data->object->user_id,
      'message' => 'Привет. Твой ID: '.$data->object->user_id,
      'access_token' => $tk,
      'v' => $vr
    ];
    file_get_contents('https://api.vk.com/method/messages.send?'.http_build_query($param));
    echo 'Ok';
  } else {
    $param = [
      'user_id' => $data->object->user_id,
      'message' => 'Извини, но я не знаю такой команды :-(',
      'access_token' => $tk,
      'v' => $vr
    ];
    file_get_contents('https://api.vk.com/method/messages.send?'.http_build_query($param));
    echo 'Ok';
  }
  break;
}
?>
