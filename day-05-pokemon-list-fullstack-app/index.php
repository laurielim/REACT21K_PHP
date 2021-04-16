<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <title>Pokemon List</title>
  <style>
    #pagination a,
    #pagination span {
      margin-right: 1rem;
    }
  </style>
</head>

<body>
  <script>
    <?php
    // Get current page and assign it to page variable
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      // Automatically assign a page if there isn't one yet
      $page = 1;
    }
    ?>
    // Assign current page number to a global variable
    let currentPage = <?php echo json_encode($page) ?>;
  </script>

  <section id="poke-list"></section>
  <div id="pagination"></div>
  <script src="script.js"></script>
</body>

</html>