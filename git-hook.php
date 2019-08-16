<?php
$output = array();

echo $USER;

exec('git pull 2>&1', $output);
echo json_encode($output);
?>