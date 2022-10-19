<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $arr = array(
        array(1,2,3),
        array(4,5,6)
    );
    var_dump($arr);
    echo "<br>";
    $tmp = $arr[0];
    var_dump($tmp);
    echo "<br>";
    $arr[0]=$arr[1];
    var_dump($arr);
    echo "<br>";
    $arr[1]=$tmp;
    var_dump($arr);
    ?>
</body>
</html>