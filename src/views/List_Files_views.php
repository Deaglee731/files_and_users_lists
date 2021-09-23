
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <ling href="style/style.css">
    <title> Hello, world ! </title>
</head>

<body>
<form action="/files/create" method="POST">
  <table class="table table-striped text-center table-hover">
    <thead class="thead-dark center element_table">
      <tr>

        <th scope="col">Organization</th>
        <th scope="col">Сounterparty</th>
        <th scope="col">Signatory</th>
        <th scope="col">Term-in</th>
        <th scope="col">Term-out</th>
        <th scope="col">Product</th>
        <th scope="col">Amount</th>
        <th scope="col">Requisites</th>
        <th scope="col">Managements</th>
      </tr>
    </thead>
    <tbody>
      <tr>

    
        <?php foreach ($result_mass as $docs) : ?>
          <td><?php echo $docs['Organization'] ?></td>
          <td><?php echo $docs['Сounterparty'] ?></td>
          <td><?php echo $docs['Signatory'] ?></td>
          <td><?php echo $docs['Term-in'] ?></td>
          <td><?php echo $docs['Term-out'] ?></td>
          <td><?php echo $docs['Product'] ?></td>
          <td><?php echo $docs['Amount'] ?></td>
          <td><?php echo $docs['Requisites'] ?></td>

          <th scope="col">
            <a href="/files/update?id=<?php echo $docs['id'] ?>">EDIT</a>
            <a href="/files/update?id=<?php echo $docs['id'] ?>">DELETE</a>
        </th>
   
          </form>
      </tr>
    <?php endforeach; ?>
  </table>

  </tbody>

    <button type="submit" class="btn btn-warning">Create</button>

</body>