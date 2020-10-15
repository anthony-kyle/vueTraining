<?php
// Error Codes: 
//  1 - Error connecting to SQL
//  2 - SQL Malformed
//  3 - No records found

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if (!empty($_POST['range'])) {
  if ($_POST['range'] == 'all') {
    $db = new mysqli('localhost', 'localdev', '#Yfc55mwWdZRn9k45dd5u!qi9', 'vue_db');
    if ($db->connect_error) {
      exit(json_encode([false, 1]));
    }
    $sql = "SELECT * FROM cars";
    $res = $db->query($sql);
    if ($res) {
      // Check number of rows
      if ($res->num_rows === 0) {
        // No Rows Returned
        echo json_encode([false, 3]);
      } else {
        $all_rows[0] = true;
        while ($each_row = $res->fetch_assoc()) {
          $all_rows[1][] = $each_row;
        }
        echo json_encode($all_rows);
        $res->free();
      }
    } else {
      // SQL Query Error
      echo json_encode([false, 2]);
    }
    $db->close();
  }
}
