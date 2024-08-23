<?php

/*
 * Ce fichier sera le router public de notre application
 */

use model\Manager\ArticleManager;
use model\Manager\CategoryManager;
use model\Manager\CommentManager;

// on instancie le manager des articles
$articleManager = new ArticleManager($db);
// on instancie le manager des catégories
$categoryManager = new CategoryManager($db); 
// on instancie le manager des commentaires
$commentManager = new CommentManager($db);

// si la route n'est pas définie, on affiche la page d'accueil
$route = $_GET['route'] ?? 'accueil';

// on charge les catégories pour le menu sur toutes les pages
$categories = $categoryManager->selectAll();

// on va charger les modèles et les vues en fonction de la route
switch ($route) {

    case 'accueil':
        $articles = $articleManager->selectAllArticleHomepage();

        echo twig->render("publicView/public.homepage.view.html.twig", ['articles'=>$articles, 'categories' => $categories]);
        break;


}