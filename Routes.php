<?php

use CMS\Controller\faq\faqController;

require_once('Lang/'.getenv("LOCALE").'.php');

$router->scope('/faq', function($router) {
    $router->get('/list', "faq#faqList");
});


$router->scope('/cms-admin/faq', function($router) {
    $router->get('/list', "faq#faqList");

    $router->get('/edit/:id', function($id) {
        (new CMS\Controller\Faq\faqController)->faqEdit($id);
    })->with('id', '[0-9]+');

    $router->post('/edit/:id', function($id) {
        (new CMS\Controller\faq\faqController)->faqEditPost($id);
    })->with('id', '[0-9]+');

    $router->get('/add', "faq#faqAdd");
    $router->post('/add', "faq#faqAddPost");

    $router->post('/delete', "faq#faqDelete");

});
