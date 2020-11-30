<?php
//Gastenboek.php

declare(strict_types=1);
require_once("DBGegevens.php");
require_once("classReactie.php");

class GastenBoek
{


    public function getAlleReacties(): array
    {
        $sql = "select id, gast, reactie, datum from gastenboek";
        $dbh = $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $reactie = new Reactie(
                (int) $rij["id"],
                $rij["gast"],
                $rij["reactie"],
                $rij["datum"]
            );
            array_push($lijst, $reactie);
        }

        $dbh = null;
        return $lijst;
    }

    public function createReactie(string $gast, string $reactie)
    {
        $sql = "insert into gastenboek (gast, reactie, datum) values (:gast, :reactie, :datum)";
        $dbh = $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );

        $stmt = $dbh->prepare($sql);
        $datum = date("Y-m-d H:i:s");
        $stmt->execute(array(
            ':gast' => $gast,
            ':reactie' => $reactie,
            ':datum' => $datum
        ));
        $dbh = null;
    }
}
