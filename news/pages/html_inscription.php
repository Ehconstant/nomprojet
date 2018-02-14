<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/pInscription.css">
    <title></title>
  </head>
  <body>

        <h2>Formulaire</h2>
        <div class="envoloppe">
            <form action="inscription.php" method="post">
              <p>
                <label for="pseudo">Pseudo </label><br>
                <input type="text" name="pseudo" id="pseudo" required><br>
                <label for="email">Email </label><br>
                <input type="text" name="email" id="email" required><br>
                <label for="password">Password </label><br>
                <input type="password" name="password" id="password" required><br>
                <label for="password_validate">Password Confirm</label><br>
                <input type="password" name="password_validate" id="password_validate" required><br>
                <button type="submit" name="inscrire">S'inscrire</button>
              </p>
            </form>
        </div>

  <script src="style/js/pInscription.js">
  </script>
  </body>
</html>
