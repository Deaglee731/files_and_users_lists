<?php
$result_mass = Decode();
$massive_id = array();

function Decode()
{
  $directory = scandir("date_users/users/");
  $result_out = array_diff($directory, [".", "..", "numberic", "result"]);
  $id = 0;
  foreach ($result_out as $files) {
    $decodestr = file_get_contents("date_users/users/{$files}");
    $user = json_decode($decodestr, TRUE);
    $user['id'] = $files;
    $result_mass[] = $user;
    $massive_id[$id] = $files;
  }

  return $result_mass;
}

Decode();

?>



<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <ling href="style/style.css">
    <title> Hello, world ! </title>
</head>

<body>

  <table class="table table-striped text-center table-hover">
    <thead class="thead-dark center element_table">
      <tr>
        <th scope="col">ID</th>

        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">Birthday</th>
        <th scope="col">Managment</th>
        <th scope="col">Activity</th>
      </tr>
    </thead>
    <tbody>
      <tr>


        <?php foreach ($result_mass as $users) : ?>
          <td><?php echo $users['login'] ?></td>
          <td><?php echo $users['firstname'] ?></td>
          <td><?php echo $users['lastname'] ?></td>
          <td><?php echo $users['birthday'] ?></td>
          <th scope="col">
            <a href="update_users.php?id=<?php echo $users['id'] ?>">EDIT</a>
            <a href="delete_users.php?id=<?php echo $users['id'] ?>">DELETE</a>
          </th>
          <th scope="col">
            <div class="btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-secondary active">
                <input type="checkbox" checked autocomplete="off"> Activity
              </label>
            </div>
          </th>
          </th>
          </form>
      </tr>
    <?php endforeach; ?>
  </table>

  </tbody>


  <form action="create_users.php" method="POST">
    <button type="submit" class="btn btn-warning">Create</button>



</body>