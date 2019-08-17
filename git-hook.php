<?php
$output = array();

echo 'Propietario script actual: ' . get_current_user();

exec('chmod -R 755 ../public');
exec('git pull 2>&1', $output);
echo json_encode($output);
?>