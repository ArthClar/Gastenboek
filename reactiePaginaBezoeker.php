<?php
require_once("classGastenBoek.php");
?>

<?php
// start van de HTML
require_once("header.php");
?>

<h2>Welkom</h2>
<h4>Je kan hier de reacties van onze gasten bekijken.</h4>
<h1>Reacties</h1>
<div style="width: 1200px; height: 300px; overflow: scroll">

    <?php
    $gb = new GastenBoek();
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