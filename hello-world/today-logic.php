<?php
date_default_timezone_set('America/New_York');
$day = date('l');

if (in_array($day, ['Friday', 'Saturday', 'Sunday'])) {
    $toDo = 'relax';
} else {
    $toDo = 'work';
}
