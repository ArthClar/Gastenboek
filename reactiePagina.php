<?php
session_set_cookie_params(0);
session_start();
require_once("classGast.php");
require_once("classGastenBoek.php");
if (!isset($_SESSION["gebruiker"])) {
    header("Location: homeGast.php");
    exit;
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["Gast"]);
$naamGebruiker = $gebruiker->getNaam();

// Maken reactie
$gb = new GastenBoek();
$gast = $naamGebruiker;
$error = "";
$reactie = "";
if (isset($_POST["verzenden"])) {
    if (!empty($_POST["reactie"])) {
        $reactie = $_POST["reactie"];
        if (strlen($reactie) > 200) {
            $error .= "Je kan niet meer dan 200 tekens in dit veld zetten. <br>";
        }
    } else {
        $error .= "Het veld mag niet leeg zijn. <br>";
    }
    if ($error == "") {
        $gb->createReactie($gast, $reactie);
    }
    header("location: reactiePagina.php");
}
// einde van de pagina-specifieke logica
?>
<?php
// start van de HTML
require_once("header.php");
?>

<h2>Welkom, <?php echo $naamGebruiker ?></h2>
<h4>Je kan hier een reactie toevoegen aan ons gastenboek en andere bekijken.</h4>
<h1>Reacties</h1>
<div style="width: 1200px; height: 300px; overflow: scroll">

    <?php
    $reacties = $gb->getAlleReacties();
    ?>

    <ul>
        <?php
        foreach (array_reverse($reacties) as $reactie) {
        ?>
            <p>
                <strong>Gast:</strong> <?php print($reactie->getGast()); ?>
                <br />
                <em><?php print($reactie->getReactie()); ?></em>
                <br />
                <em style="color: gray; font-size: 10px"><?php print($reactie->getDatum()); ?></em>
            </p>
            <hr />
        <?php
        }
        ?>
    </ul>
</div>
<h1>Bericht toevoegen</h1>
<?php
if ($error != "") {
    echo "<span style=\"color:red;\">" . $error . "</span>";
}
?>
<form action="" method="POST">
    <p><strong>Reactie schrijven:</strong><br />
        <textarea name="reactie" cols="50" rows="4"></textarea>
    </p>

    <input type="submit" value="Verzenden" name="verzenden" />
</form>
<?php
// einde van de HTML
require_once("footer.php");
?>