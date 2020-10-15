<?php
// Error codes:
// -  0: Cannot connect to Database
// -  1: SQL Query Malformed
// -  2: No Records Found
// -  3: Record could not be deleted
// -  4: Valid Car ID Required for that action

if (!empty($_POST['action'])) {
  $host = 'localhost';
  $user = 'localdev';
  $pass = '#Yfc55mwWdZRn9k45dd5u!qi9';
  $database = 'vue_db';

  $db = new mysqli($host, $user, $pass, $database);
  if ($db->connect_error) {
    // Unable to connect to DB
    exit(json_encode([false, 0]));
  } else {

    if ($_POST['action'] === 'retrieve_all') {
      // Retrieve all cars from the database
      $sql = "SELECT * FROM cars";
      $res = $db->query($sql);

      if ($res) {
        if ($res->num_rows === 0) {
          // No Records Found
          echo json_encode([false, 2]);
        } else {
          while ($each_row = $res->fetch_assoc()) {
            $all_rows[] = $each_row;
          }

          echo json_encode([true, $all_rows]);
        }
      } else {
        // SQL Malformed
        echo json_encode([false, 1]);
      }
    } else if ($_POST['action'] === 'delete_item') {
      // Delete Car based on provided car ID
      if (!empty($_POST['car_id'])){
        $id = $db->real_escape_string($_POST['car_id']);
        $sql = "DELETE FROM cars WHERE id = '{$id}' LIMIT 1";
        $res = $db->query($sql);
        if ($res){
          echo json_encode([true, 'Record Deleted Successfully']);
        } else {
          echo json_encode([false, 3]);
        }
      } else {
        echo json_encode([false, 4]);
      }
    }
  }
  $db->close();
}
