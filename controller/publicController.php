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
$categoryManager = new CategoryManager($db); 1
// on instancie le manager des commentaires
$commentManager = new CommentManager($db);