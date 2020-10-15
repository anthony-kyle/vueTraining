<?php

/******************************************************************************
 * File: functions.php
 * Purpose: Utility functions for AJAX
 * Author: Anthony McGrath
 *****************************************************************************/

// Convert provided ID to text to be saved in DB
function convertEngineType($id)
{
  switch ($id) {
    case 1:
      return 'Petrol';
    case 2:
      return 'Diesel';
    case 3:
      return 'Electric';
    case 4:
      return 'Hybrid';
    case 5:
      return 'Hydrogen';
    default:
      return false;
  };
}

// Convert provided ID to text to be saved in DB
function convertGearboxType($id)
{
  switch ($id) {
    case 1:
      return 'Automatic';
    case 2:
      return 'Manual';
    default:
      return false;
  };
}
