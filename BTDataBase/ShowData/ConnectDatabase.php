<?php
    define('host', 'localhost');
    define('username', 'root');
    define('pass', '');
    define('database', 'qlbansua');
    define('port', '3307');
    
    $conn = mysqli_connect(host, username, pass, database, port) 
    or die('Không kết nối được tới database'.mysqli_connect_error());
    
?>