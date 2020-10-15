<?php
// Error codes:
// -  0: Cannot connect to Database
// -  1: SQL Query Malformed
// -  2: No Records Found

if(!empty($_POST['range'])){
  if ($_POST['range'] === 'all'){
    $host = 'localhost';
    $user = 'localdev';
    $pass = '#Yfc55mwWdZRn9k45dd5u!qi9';
    $database = 'vue_db';

    $db = new mysqli($host, $user, $pass, $database);

    if ($db->connect_error){
      // Unable to connect to DB
      exit(json_encode([false, 0]));

    } else {

      $sql = "SELECT * FROM cars";
      $res = $db->query($sql);

      if ($res){
      
        if ($res->num_rows === 0){
          // No Records Found
          echo json_encode([false, 2]);
      
        } else {
      
          while($each_row = $res->fetch_assoc()){
            $all_rows[] = $each_row;
          }

          echo json_encode([true, $all_rows]);
      
        }
      
      } else {
      
        // SQL Malformed
        echo json_encode([false, 1]);
      
      }
    }
  }
}
