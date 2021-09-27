
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title> Creator </title>
</head>

<body>
    <form action="" method="POST">
        <table class="table table-reflow">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Birthday</th>
                    <th>Activity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   
                    <td>
                        <input name="login" type="text" value=<?= $data['login'] ?>>
                        <?php echo $Errors['login'];
                        ?>
                    </td>
                    <td>
                        <input name="firstname" type="text" value=<?= $data['firstname'] ?>>
                        <?php echo $Errors['firstname']; ?>
                    </td>
                    <td>
                        <input name="lastname" type="text" value=<?= $data['lastname'] ?>>
                        <?php echo $Errors['lastname']; ?>
                    </td>
                    <td>
                        <input name="birthday" type="date" value=<?= $data['birthday'] ?> size="40">
                        <?php echo $Errors['birthday']; ?>
                    </td>
                    <td>
                        <input name="activity" value="On" type="checkbox" size="40" name="actvity">
                    </td>
                </tr>
            </tbody>
        </table>
        <button name="btn_editor" type="submit" class="btn btn-warning">Update</button>
    </form>
</body>