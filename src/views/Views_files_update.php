
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
                        <input name="Organization" type="text" value=<?= $data['Organization'] ?>>
                        <?php echo $Errors['Organization']; ?>
                    </td>
                    <td>
                        <input  name="Counterparty" type="text" value=<?= $data['Counterparty'] ?>>
                        <?php echo $Errors['Counterparty']; ?>
                    </td>
                    <td>
                        <input name="Signatory" type="text" value=<?= $data['Signatory'] ?>>
                        <?php echo $Errors['Signatory']; ?>
                    </td>
                    <td>
                        <input name="Term-in" type="date" value=<?= $data['Term-in'] ?>>
                        <?php echo $Errors['Term-in']; ?>
                    </td>
                    <td>
                        <input name="Term-out" type="date" value=<?= $data['Term-out'] ?>>
                        <?php echo $Errors['Term-out']; ?>
                    </td>
                    <td>
                        <input name="Product" type="text" value=<?= $data['Product'] ?>>
                        <?php echo $Errors['Product']; ?>
                    </td>
                    <td>
                        <input name="Amount" type="text" value=<?= $data['Amount'] ?>>
                        <?php echo $Errors['Amount']; ?>
                    </td>
                    <td>
                        <input name="Requisites" type="text" value=<?= $data['Requisites'] ?>>
                        <?php echo $Errors['Requisites']; ?>
                    </td>


                </tr>
            </tbody>
        </table>
        <button type="submit"  class="btn btn-warning">Update</button>
    </form>

</body>