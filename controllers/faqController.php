<?php
namespace CMS\Controller\Faq;

use CMS\Controller\coreController;
use CMS\Controller\users\usersController;
use CMS\Model\faq\faqModel;
use CMS\Model\users\usersModel;

/**
 * Class: @faqController
 * @package faq
 * @author Teyir | CraftMySite <contact@craftmysite.fr>
 * @version 1.0
 */


class faqController extends coreController {

    public static string $themePath;

    public function __construct($themePath = null) {
        parent::__construct($themePath);
    }

    public function faqList() {
        usersController::isAdminLogged();

        $faq = new faqModel();
        $faqList = $faq->fetchAll();

        //Include the view file ("views/list.admin.view.php").
        view('faq', 'list.admin', ["faqList" => $faqList], 'admin');
    }

    public function faqEdit($id){
        usersController::isAdminLogged();

        $faq = new faqModel();
        $faq->fetch($id);


        view('faq', 'edit.admin', ["faq" => $faq], 'admin');
    }

    public function faqEditPost($id){
        usersController::isAdminLogged();

        $faq = new faqModel();
        $faq->faqId = $id;
        $faq->question = $_POST['question'];
        $faq->response = $_POST['response'];
        $faq->update();

        header("location: ../edit/".$id);
        die();
    }

    public function faqAdd() {
        usersController::isAdminLogged();

        view('faq', 'add.admin', [], 'admin');
    }

    public function faqAddPost() {
        usersController::isAdminLogged();

        $faq = new faqModel();
        $faq->question = $_POST['question'];
        $faq->response = $_POST['response'];

        //Get the author pseudo
        $user = new usersModel;
        $user->fetch($_SESSION['cms_user_id']);
        $faq->author = $user->userPseudo;

        $faq->faqCreate();

        header("location: ../faq/list");

    }

    public function faqDelete(){
        usersController::isAdminLogged();

        $faq = new faqModel();
        $faq->faqId = $_POST['id'];
        $faq->delete();

        header("location: ../faq/list");
        die();
    }


}