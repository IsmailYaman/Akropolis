<?php
include_once '../includes/db.php';
$times = [];
$time = strtotime('16:30');
while ($time <= strtotime('21:30')) {

    $times[] = date('H:i', $time);
    $time += 30 * 60;
}
?>