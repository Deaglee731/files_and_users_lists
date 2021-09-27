<?php


$Errors = CheckDate1();


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
        $current = file_get_contents("date_files/documents/numberic");
        $next = $current + 1;
        file_put_contents("date_files/documents/{$next}", $result);
        file_put_contents("date_files/documents/numberic", $next);
        
    }
    return $Errors;

    print_r($_POST);
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
                        <input id=1 name="Organization" type="text" value=<?= $_POST['Organization'] ?>>
                        <?php echo $Errors['Organization']; ?>
                    </td>
                    <td>
                        <input id=2 name="Сounterparty" type="text" value=<?= $_POST['Сounterparty'] ?>>
                        <?php echo $Errors['Сounterparty']; ?>
                    </td>
                    <td>
                        <input id=3 name="Signatory" type="text" value=<?= $_POST['Signatory'] ?>>
                        <?php echo $Errors['Signatory']; ?>
                    </td>
                    <td>
                        <input id=4 name="Term-in" type="date" value=<?= $_POST['Term-in'] ?>>
                        <?php echo $Errors['Term-in']; ?>
                    </td>
                    <td>
                        <input id=5 name="Term-out" type="date" value=<?= $_POST['Term-out'] ?>>
                        <?php echo $Errors['Term-out']; ?>
                    </td>
                    <td>
                        <input id=6 name="Product" type="text" value=<?= $_POST['Product'] ?>>
                        <?php echo $Errors['Product']; ?>
                    </td>
                    <td>
                        <input id=7 name="Amount" type="text" value=<?= $_POST['Amount'] ?>>
                        <?php echo $Errors['Amount']; ?>
                    </td>
                    <td>
                        <input id=8 name="Requisites" type="text" value=<?= $_POST['Requisites'] ?>>
                        <?php echo $Errors['Requisites']; ?>
                    </td>


                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-warning">Create</button>
    </form>

</body>