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

    case 'categorie':
        // on vérifie si le slug de la catégorie est bien présent
        if(!isset($_GET['slug'])){
            header('Location: ./');
        }
        exit;

        $category = $categoryManager->selectOneBySlug($_GET['slug']);

        // si la catégorie n'existe pas, on redirige vers la page 404
        if($category === null){
            header('Location: ./?route=404');
            exit;
        }

        // on charge les articles de la catégorie
        $articles = $articleManager->selectAllArticleByCategorySlug($_GET['slug']);

        echo $twig->render("publicView/public.category.view.html.twig",['articles' => $articles, 'category' => $category, 'categories'=>$categories]);
        break;

    case 'article':
        // on vérifie si le slug de l'article est bien présent
        if(!isset($_GET['slug'])){
            header('Location: ./');
            exit;
        }

        // on charge l'article
        $article = $articleManager->selectOneBySlug($_GET['slug']);
        // si l'article n'existe pas, on redirige vers la page 404
        if($article === null){
            header('Location: ./?route=404');
            exit;
        }




}