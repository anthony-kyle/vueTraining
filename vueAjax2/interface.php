<?php
// Error codes:
// -  0: Cannot connect to Database
// -  1: SQL Query Malformed
// -  2: No Records Found
// -  3: Record could not be created / updated / deleted
// -  4: Valid Car ID Required for that action
// -  5: Empty car / car property provided
// -  6: No Action Provided

// Require Utility functions
require_once('./functions.php');

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
    if ($_POST['action'] === 'create_item'){
      // Create a new car in the database
      if (!empty($_POST['new_item'])){
        $car = $_POST['new_item'];

        if (!empty($car['brand']) &&
            !empty($car['model']) &&
            !empty($car['engine']) && 
            !empty($car['gearbox'])
            ){
          
          // Sanitise inputs
          $brand    = $db->real_escape_string($car['brand']);
          $model    = $db->real_escape_string($car['model']);
          $engine   = convertEngineType($db->real_escape_string($car['engine']));
          $gearbox  = convertGearboxType($db->real_escape_string($car['gearbox']));

          if ($engine === false || $gearbox === false){
            // Engine or gearbox had unexpected values
            echo json_encode([false, 5]);
          } else {
            $sql = "INSERT INTO cars SET brand = '{$brand}', model = '{$model}', engine = '{$engine}', gearbox = '{$gearbox}'";
            $res = $db->query($sql);
            if ($res){
              // Record Inserted
              echo json_encode([true, 'Record Inserted Successfully']);
            } else {
              // Could not insert
              echo json_encode([false, 3]);
            }
          }
        } else {
          // An empty property was detected
          echo json_encode([false, 5]);
        }

      } else {
        // Cannot create item with no details
        echo json_encode([false, 5]);
      }
    } else if ($_POST['action'] === 'retrieve_all') {
      // Retrieve all cars from the database
      $sql = "SELECT * FROM cars";
      $res = $db->query($sql);

      if ($res) {
        if ($res->num_rows === 0) {
          // No Records Found
          echo json_encode([false, 2]);
        } else {
          // Format received data
          while ($each_row = $res->fetch_assoc()) {
            $all_rows[] = $each_row;
          }
          echo json_encode([true, $all_rows]);
        }
      } else {
        // SQL Malformed
        echo json_encode([false, 1]);
      }
    } else if ($_POST['action'] === 'update_item'){
      // Create a new car in the database
      if (!empty($_POST['edited_item'])){
        $car = $_POST['edited_item'];

        if (!empty($car['id']) &&
            !empty($car['brand']) &&
            !empty($car['model']) &&
            !empty($car['engine']) && 
            !empty($car['gearbox'])
            ){
          
          // Sanitise inputs
          $id       = $db->real_escape_string($car['id']);
          $brand    = $db->real_escape_string($car['brand']);
          $model    = $db->real_escape_string($car['model']);
          $engine   = convertEngineType($db->real_escape_string($car['engine']));
          $gearbox  = convertGearboxType($db->real_escape_string($car['gearbox']));

          if ($engine === false || $gearbox === false){
            // Engine or gearbox had unexpected values
            echo json_encode([false, 5]);
          } else {
            $sql = "UPDATE cars SET brand = '{$brand}', model = '{$model}', engine = '{$engine}', gearbox = '{$gearbox}'";
            $sql .= " WHERE id = '{$id}'";
            $res = $db->query($sql);
            if ($res){
              // Record updated
              echo json_encode([true, 'Record Updated Successfully']);
            } else {
              // Could not insert
              echo json_encode([false, 3]);
            }
          }
        } else {
          // An empty property was detected
          echo json_encode([false, 5]);
        }

      } else {
        // Cannot create item with no details
        echo json_encode([false, 5]);
      }
    } else if ($_POST['action'] === 'delete_item') {
      // Delete Car based on provided car ID
      if (!empty($_POST['car_id'])){
        $id = $db->real_escape_string($_POST['car_id']);
        $sql = "DELETE FROM cars WHERE id = '{$id}' LIMIT 1";
        $res = $db->query($sql);

        if ($res){
          // Record Deleted
          echo json_encode([true, 'Record Deleted Successfully']);
        } else {
          // Could not delete record
          echo json_encode([false, 3]);
        }
      } else {
        // No Car ID Provided
        echo json_encode([false, 4]);
      }
    } else {
      // No or unknown action or provided
      echo json_encode([false, 6]);
    }
  }  
}

$db->close();
