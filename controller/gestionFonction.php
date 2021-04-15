<?php

chdir('..');
include_once 'services/FonctionService.php';
extract($_POST);

$fs = new FonctionService();

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new Classe(0, $nom, $filiere));
    } elseif ($op == 'update') {
        $fs->update(new Classe($id, $nom, $filiere));
    } elseif ($op == 'delete') {
        $fs->delete($id);
    }
}

header('Content-type: application/json');
echo json_encode($fs->findAll());

