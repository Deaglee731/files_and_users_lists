
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

                        <input id=1 name="login" type="text" value=<?= $_POST['login'] ?>>
                        <?php echo $Errors['login']; ?>
                    </td>
                    <td>
                        <input id=2 name="firstname" type="text" value=<?= $_POST['firstname'] ?>>
                        <?php echo $Errors['firstname']; ?>
                    </td>
                    <td>
                        <input id=3 name="lastname" type="text" value=<?= $_POST['lastname'] ?>>
                        <?php echo $Errors['lastname']; ?>
                    </td>
                    <td>
                        <input id=4 name="birthday" type="date" value=<?= $_POST['birthday'] ?> size="40">
                        <?php echo $Errors['birthday']; ?>
                    </td>
                    <td>
                        <input name="activity" value="On" type="checkbox" size="40" name="actvity">
                    </td>

                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-warning">Create</button>
    </form>

</body>