<?php

function CheckDate1()
{
    $i = 0;
    if ($_POST['Organization'] == '') {
        $Errors['Organization'] = "<h5> Поле Организация обязательно для заполнения </h5>";
        $i += 1;
    }

    if ($_POST['Сounterparty'] == '') {
        $Errors['Сounterparty'] = "<h5> Поле Контрагент обязательно для заполнения </h5>";
        $i += 1;
    }


    if ($_POST['Signatory'] == '') {
        $Errors['Signatory'] = "<h5> Поле Подписант обязательно для заполнения </h5>";
        $i += 1;
    }

    if ($_POST['Term-in'] == '') {
        $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($_POST['Term-in'] == '') {
        $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
        $i += 1;
    }

    if ($_POST['Product'] == '') {
        $Errors['Product'] = "<h5>Поле Предмет договора обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($_POST['Amount'] == '') {
        $Errors['Amount'] = "<h5>Поле Сумма договора обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($_POST['Requisites'] == '') {
        $Errors['Requisites'] = "<h5>Поле Реквизиты обязательно для заполнения </h5>";
        $i += 1;
    }
    if ($i == 0) {
        header('Location: /files/');
        $result = json_encode($_POST);
        file_put_contents("date_files/documents/{$_GET['id']}", $result);
    }
    return $Errors;

    print_r($_POST);
}










if (isset($_GET['id'])) {
    $current_file  = $_GET['id'];
    $currents = "date_files/documents/$current_file.json";
    if (!isset($currents)) {
        echo "User already delete";
    } else {
        $date = file_get_contents("date_files/documents/$current_file");
        $json_array = json_decode($date, true);
    }
    if (isset($_POST['btn_editor'])) {

        $Errors = CheckDate1();

        header("Location:/files/");
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
                    <th>Organization</th>
                    <th>Сounterparty</th>
                    <th>Signatory</th>
                    <th>Term-in</th>
                    <th>Term-out</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Requisites</th>
                    <th>Management</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input id=1 name="Organization" type="text" value=<?= $json_array['Organization'] ?>>
                        <?php echo $Errors['Organization']; ?>
                    </td>
                    <td>
                        <input id=2 name="Сounterparty" type="text" value=<?= $json_array['Сounterparty'] ?>>
                        <?php echo $Errors['Сounterparty']; ?>
                    </td>
                    <td>
                        <input id=3 name="Signatory" type="text" value=<?= $json_array['Signatory'] ?>>
                        <?php echo $Errors['Signatory']; ?>
                    </td>
                    <td>
                        <input id=4 name="Term-in" type="date" value=<?= $json_array['Term-in'] ?>>
                        <?php echo $Errors['Term-in']; ?>
                    </td>
                    <td>
                        <input id=5 name="Term-out" type="date" value=<?= $json_array['Term-out'] ?>>
                        <?php echo $Errors['Term-out']; ?>
                    </td>
                    <td>
                        <input id=6 name="Product" type="text" value=<?= $json_array['Product'] ?>>
                        <?php echo $Errors['Product']; ?>
                    </td>
                    <td>
                        <input id=7 name="Amount" type="text" value=<?= $json_array['Amount'] ?>>
                        <?php echo $Errors['Amount']; ?>
                    </td>
                    <td>
                        <input id=8 name="Requisites" type="text" value=<?= $json_array['Requisites'] ?>>
                        <?php echo $Errors['Requisites']; ?>
                    </td>

                </tr>
            </tbody>
        </table>
        <button name="btn_editor" type="submit" class="btn btn-warning">Edit</button>
    </form>
</body>