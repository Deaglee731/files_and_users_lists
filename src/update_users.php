<?php



function CheckDate1()
{
    $i = 0;
    if ($_POST['login'] == '') {
        $Errors['login'] = "<h6> Поле login обязательно для заполнения </h6>";
        $i += 1;
    }

    if ($_POST['firstname'] == '') {
        $Errors['firstname'] = "<h6> Поле firstname обязательно для заполнения </h6>";
        $i += 1;
    }


    if ($_POST['lastname'] == '') {
        $Errors['lastname'] = "<h6> Поле lastname обязательно для заполнения </h6>";
        $i += 1;
    }

    if ($_POST['birthday'] == '') {
        $Errors['birthday'] = "<h6>Поле birthday обязательно для заполнения </h6>";
        $i += 1;
    }
    if ($i == 0) {
        header("Location:index_users.php");
        $result = json_encode($_POST);
        $current = file_get_contents("date_users/users/numberic");
        file_put_contents("date_users/users/{$current}", $result);
    }
    return $Errors;
}








if (isset($_GET['id'])) {
    $current_file  = $_GET['id'];
    $currents = "date_users/users/$current_file.json";
    if (!isset($currents)) {
        echo "User already delete";
    } else {
        $date = file_get_contents("date_users/users/$current_file");
        $json_array = json_decode($date, true);
    }



    if (isset($_POST['btn_editor'])) {
        $Errors = CheckDate1();



        header("Location:index_users.php");
    }
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title> Creator </title>
</head>

<body>
    <form action="" method="POST">
        <table class="table table-reflow">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Birthday</th>
                    <th>Activity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td>
                        <input name="login" type="text" value=<?= $json_array['login'] ?>>
                        <?php echo $Errors['login'];
                        ?>
                    </td>
                    <td>
                        <input name="firstname" type="text" value=<?= $json_array['firstname'] ?>>
                        <?php echo $Errors['firstname']; ?>
                    </td>
                    <td>
                        <input name="lastname" type="text" value=<?= $json_array['lastname'] ?>>
                        <?php echo $Errors['lastname']; ?>
                    </td>
                    <td>
                        <input name="birthday" type="date" value=<?= $json_array['birthday'] ?> size="40">
                        <?php echo $Errors['birthday']; ?>
                    </td>
                    <?php  ?>
                </tr>
            </tbody>
        </table>
        <button name="btn_editor" type="submit" class="btn btn-warning">Edit</button>
    </form>
</body>