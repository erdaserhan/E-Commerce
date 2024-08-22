<?php

// session
session_start();

// chemin vers les classes Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;

// Appel de la config
require_once "../config.php";