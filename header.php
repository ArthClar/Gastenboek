<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gastenboek PHP</title>
</head>

<body>
    <?php if (!isset($_SESSION["gebruiker"])) { ?>
        <a href="homeGast.php">Home</a> -
        <a href="loginGast.php">Login</a> -
        <a href="registrerenGast.php">Registreren</a> -
        <a href="reactiePaginaBezoeker.php">Gastenboek</a>
    <?php } else { ?>
        <a href="reactiePagina.php">Gastenboek</a> -
        <a href="logoutGast.php">Logout</a>
    <?php } ?>