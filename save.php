<?php
  include_once 'includes/dbh-inc.php';
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Petition</title>

    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body> <!-- background="bg-img2.png" -->
      <div id="success" hidden>
        <div class="container">
          <section id="head">
            <h1 style="text-align:center;">Vielen Dank für Ihre Unterschrift!</h1>
            <h2>Sie haben erfolgreich unsere Petition unterschrieben.</h2>
          </section>
        </div>
      </div>

      <div id="error" hidden>
        <div class="container">
          <section id="head">
            <h1 style="text-align:center;">Ups, da ist etwas schief gelaufen!</h1>
            <h2>Bitte versuchen Sie es erneut. <a href="#">Formular ausfüllen</a></h2>
          </section>
        </div>
      </div>

      <script type="text/javascript">
        console.log("before PHP");
      </script>

      <?php
      error_reporting(0);

      $firstName = $_GET['first'];
      $lastName = $_GET['last'];
      $phoneNumber = $_GET['phone'];
      $emailAdress = $_GET['email'];

      $sql = "SELECT * FROM signatures WHERE phoneNumber='$phoneNumber' or emailAdress='$emailAdress'";
      $result = mysqli_query($con, $sql);

      $resultCheck = mysqli_num_rows($result);

      if (!($resultCheck > 0)):
        $sql = "INSERT INTO signatures (firstName, lastName, phoneNumber, emailAdress) VALUES ('$firstName', '$lastName', '$phoneNumber', '$emailAdress')";

        if ($con->query($sql) === TRUE):
            ?>
            <script type="text/javascript">
              document.getElementById('success').removeAttribute('hidden');
              console.log("success");
            </script>
        <?php
        endif;
      endif;
      $con->close();
      ?>

      <script type="text/javascript">
        console.log(document.getElementById("success").hasAttribute("hidden"));
        if(document.getElementById("success").hasAttribute("hidden")){
          document.getElementById('error').removeAttribute('hidden');
          console.log("error");
        }
      </script>
  </body>
</html>
