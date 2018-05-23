<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <?php
        echo validation_errors('<div style="color: #FF0000">','</div>'); 
    ?>
    <form action="<?php echo base_url();?>/client/register" method="post">
        <label for="first_name">Nom: </label><input type="text" name="first_name" id="first_name"><br>
        <label for="last_name">Prenom: </label><input type="text" name="last_name" id="last_name"><br>
        <label for="email">email: </label><input type="text" name="email" id="email"><br>
        <label for="password">Votre mot de passe: </label><input type="password" name="password" id="password"><br>
        <label for="password">Veuillez resaisir le mot de passe: </label><input type="password" name="passconf" id="password"><br>
        <label for="phone">Telephone: </label><input type="text" name="phone" id="phone"><br>
        <input type="submit" name="register" value="Envoyer">
    </form>
</body>
</html>