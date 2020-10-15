<?php
  $array = [];
  if (!empty($_GET)){
    $array['method'] = 'GET';
    foreach($_GET as $k => $v){
      $array[$k] = $v;
    }
  }

  if (!empty($_POST)){
    $array['method'] = 'POST';
    foreach($_POST as $k => $v){
      $array[$k] = $v;
    }
  }

  echo json_encode($array);
?>