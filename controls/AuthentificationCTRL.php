<?php

/*
 * AuthentificationCTRL.php
 */

require_once '../daos/Connexion.php';
require_once '../entities/Utilisateurs.php';
require_once '../daos/UtilisateursDAO.php';

$objetConnexion = new Connexion();
$pdo = $objetConnexion->seConnecter("../conf/bd.ini");

// http://localhost/jQueryTPVersionAvancee/controls/AuthentificationCTRL.php?pseudo=p&mdp=b

$pseudo = filter_input(INPUT_GET, "pseudo");
$mdp = filter_input(INPUT_GET, "mdp");

$tRecord = array();

try {
    $objet = UtilisateursDAO::selectOneByPseudoAndMdp($pdo, $pseudo, $mdp);
    
    $tRecord["pseudo"] = $objet->getPseudo();
    $tRecord["mdp"] = $objet->getMdp();
    $tRecord["email"] = $objet->getEmail();
    $tRecord["qualite"] = $objet->getQualite();
} catch (Exception $exc) {
    //echo $exc->getTraceAsString();
    $tRecord["pseudo"] = "-1";
    $tRecord["mdp"] = $exc->getTraceAsString();
    $tRecord["email"] = "";
    $tRecord["qualite"] = "";
}

$objetConnexion->seDeconnecter($pdo);

$json = json_encode($tRecord);

echo $json;
?>
