<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>Pokemon List</title>
  </head>
  <body>
    <section id="poke-list"></section>
    <script>
      <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
      ?>
      let currentPage = <?php echo json_encode($page) ?>;
    </script>
    <script src="script.js"></script>
    
  </body>
</html>
