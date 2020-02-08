<?php

// Données vides au premier passage 
$array = array("prenom" => "", "nom" => "", "mail" => "", "telephone" => "", "message" => "", "prenomError" => "", "nomError" => "", "mailError" => "", "telephoneError" => "", "messageError" => "", "isSuccess" => false);

// Adresse envoi mail
$emailTo = "cilkauto@outlook.fr";

// Sécurité du formulaire
function verify($var) {
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

// Vérification du mail
function isEmail($var) {
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

// Récupération des données entrées par l'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $array["prenom"] = verify($_POST["prenom"]);
    $array["nom"] = verify($_POST["nom"]);
    $array["mail"] = verify($_POST["mail"]);
    $array["telephone"] = verify($_POST["telephone"]);
    $array["message"] = verify($_POST["message"]);
    $array["isSuccess"] = true;
    $emailContent = "";

// Champs requis
    if (empty($array["prenom"])) {
        $array["prenomError"] = "Ce champ est requis";
        $array["isSuccess"] = false;
    } else {
        $emailContent .= "Prénom : {$array["prenom"]}\n";
    }
    if (empty($array["nom"])) {
        $array["nomError"] = "Ce champ est requis";
        $array["isSuccess"] = false;
    } else {
        $emailContent .= "Nom : {$array["nom"]}\n";
    }

    if (!isEmail($array["mail"])) {
        $array["mailError"] = "Email non valide";
        $array["isSuccess"] = false;
    } else {
        $emailContent .= "Mail : {$array["mail"]}\n";
    }

    if (empty($array["telephone"])) {
        $array["telephoneError"] = "Ce champ est requis";
        $array["isSuccess"] = false;
    } else {
        $emailContent .= "Téléphone : {$array["telephone"]}\n";
    }

    if (empty($array["message"])) {
        $array["messageError"] = "Ce champ est requis";
        $array["isSuccess"] = false;
    } else {
        $emailContent .= "Message : {$array["message"]}\n";
    }

// Envoi mail
    if ($array["isSuccess"]) {
        $headers = "From: {$array["prenom"]} {$array["nom"]} <{$array["mail"]}>\r\nReply-To: {$array["mail"]}";
        mail($emailTo, "CILK AUTO | Nouveau message", $emailContent, $headers);
    }

    echo json_encode($array);
}
