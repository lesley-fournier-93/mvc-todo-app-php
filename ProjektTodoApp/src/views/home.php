<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/views/home.css">
  <title>Hello World</title>
</head>

<body>
  <div class="title-container">
    <h1>My Todolist</h1>
    <form action="" method="post">
      <input type="text" name="name" id="title" placeholder="Todo Title" required>
      <input type="text" name="desc" id="description" placeholder="What todo?" required>
      <button type="submit" name="create">Create</button>
    </form>
  </div>



  <div class="card-container">

    <?php

    foreach ($cards as $card) {
      echo $card;
    }

    ?>


  </div>

</body>

</html>