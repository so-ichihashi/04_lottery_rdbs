<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GoTo Travel</title>
    <link rel="stylesheet" href="css/style.css" />
    <style type="text/css">
      #body {
        background-image: url(images/button.jpg);
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/random.js"></script>
  </head>
  <body id="body">
    <div class="container">
      <h1 class="title">GoTo</h1>
      <p>
        <button id="change" onclick="onClick()">
          <img src="images/airplane.png" alt="" />
        </button>
      </p>
      <p id="result">Travel</p>
    </div>
    <div class="db_area">
      <h2 class="db_title">List of Places</h2>
      <table id="data_output">
        <tr>
            <th>
                id
            </th>
            <th>
                destination
            </th>
            <th>
                date
            </th>
        </tr>
        <tbody id="output_append">
            <?php
                require("php/JS_MySQL_home.php");
                foreach($destination_list as $row){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['destination']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
      </table>
    </div>
    <script src="js/random.js"></script>
  </body>
</html>
