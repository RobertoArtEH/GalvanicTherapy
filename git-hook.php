<?php
$output = array();

exec('git pull 2>&1', $output);
echo json_encode($output);
?>