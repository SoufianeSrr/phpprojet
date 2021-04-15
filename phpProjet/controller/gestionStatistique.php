<?php

chdir('..');
include_once 'services/ClasseService.php';
extract($_POST);

$fs = new ClasseService();

header('Content-type: application/json');
echo json_encode($fs->count());
