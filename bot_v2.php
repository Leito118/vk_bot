<?php
$cf = 'faa1509f';
$tk = 'd3635555af85466bec7a0b7486e77417bd718c023a64c0ac5b7a601e4bd1c595b8a395d37934d0302b643';
$ms = '';
$vr = '5.85';

$data = json_decode(file_get_contents('php://input'));

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
