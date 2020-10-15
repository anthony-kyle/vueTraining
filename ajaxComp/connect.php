<?php
$db = @new MySQLi('localhost', 'localdev', '#Yfc55mwWdZRn9k45dd5u!qi9');
if ($db->connect_error) {
  exit($db->connect_error);
}
