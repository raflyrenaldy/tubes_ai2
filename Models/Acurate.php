<?php
$con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
           
var_dump($persen);
        
echo " <br>";
        echo $count;
        echo " <br>";
        echo $tot;
             ?>