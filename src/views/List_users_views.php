<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <ling href="style/style.css">
    <title> Hello, world ! </title>
</head>

<body>

  <table class="table table-striped text-center table-hover">
    <thead class="thead-dark center element_table">
      <tr>

        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">Birthday</th>
        <th scope="col">Managment</th>
        <th scope="col">Activity</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($result_mass as $users) : ?>
      <tr>
        
          <td><?php echo $users['login'] ?></td>
          <td><?php echo $users['firstname'] ?></td>
          <td><?php echo $users['lastname'] ?></td>
          <td><?php echo $users['birthday'] ?></td>
          <th scope="col">
            <a href="/users/update?id=<?php echo $users['id'] ?>">EDIT</a>
            <a href="/users/delete?id=<?php echo $users['id'] ?>">DELETE</a>
          </th>
          <th scope="col">
            <div class="btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-secondary active">
                <input type="checkbox" checked autocomplete="off"> Activity
              </label>
            </div>
          </th>
          </form>
          
      </tr>
      <?php endforeach; ?>
  </table>
  </tbody>


  <form action="/users/create" method="POST">
    <button type="submit" class="btn btn-warning">Create</button>



</body>
