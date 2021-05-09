<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Acceuil</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="bubbles_table_form.css">
</head>

<body>
    <form action="connexion.php" method="post" id="bubbleform">
        <br />Connexion à l'espace membre</br></br>
        <table>
            <tbody>
                <tr>
                    <td>Login</td>
                    <td><input type="text" name="login" value=""></td>
                </tr>
                <tr>
                    <td>Mot de Passe</td>
                    <td><input type="password" name="pwd" value=""></td>
                </tr>
                <tr>
                    <td>Se souvenir de moi<input type="checkbox" name="souvenir" value="oui" checked></td>
                </tr>
                <tr>
                    <td><input type="submit" name="connexion" value="Connexion"></td>
                </tr>
            </tbody>
        </table>
        <br />Pas encore de compte ?&nbsp<a href="inscription_form.php">S'inscrire</a><br /><br />
    </form>
</body>

</html>