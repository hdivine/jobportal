<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
     include "./phpBackend/dbh.php";
     include "./phpBackend/execute.php";
     include "./phpBackend/data.php";

    $read = new data();
    $read->requires("insert into minor.users(u_fname, u_lname, u_email, u_password) values (?, ?, ?, ?)", ['first', 'last', 'email@gmail.com', 'asdasdfsdf']);
    $datas = $read->inserOrDel();

    // foreach ($datas as $data) {
    //     echo $data["u_fname"];
    // }
    

    ?>

</body>
</html>