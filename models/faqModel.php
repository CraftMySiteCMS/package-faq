<?php

namespace CMS\Model\Faq ;

use CMS\Model\manager;

use PDO;
use stdClass;

/**
 * Class @faqModel
 * @package faq
 * @author Teyir | CraftMySite <contact@craftmysite.fr>
 * @version 1.0
 */



class faqModel extends manager {
    public $question;
    public $response;
    public $author;
    public $faqId;

   // Create a new faq
   public function faqCreate(){
       $var = array(
           'question' => $this->question,
           'response' => $this->response,
           'author' => $this->author
       );

       $sql = "INSERT INTO cms_faq (question, response, author) VALUES (:question, :response, :author)";

       $db = manager::dbConnect();
       $req = $db->prepare($sql);
       $req->execute($var);
   }

   // Get faq list
    public function fetchAll() {
        $sql = "SELECT * FROM cms_faq";
        $db = manager::dbConnect();
        $req = $db->prepare($sql);
        $res = $req->execute();

        if($res) {
            return $req->fetchAll();
        }
    }

    //Fetch an FAQ
    public function fetch($faqId){
        $var = array(
            "faq_id" => $faqId
        );

        $sql = "SELECT * FROM cms_faq WHERE faq_id=:faq_id";

        $db = manager::dbConnect();
        $req = $db->prepare($sql);

        if($req->execute($var)) {
            $result = $req->fetch();
            foreach ($result as $key => $property) {

                //to camel case all keys
                $key = explode('_', $key);
                $firstElement = array_shift($key);
                $key = array_map('ucfirst', $key);
                array_unshift($key, $firstElement);
                $key = implode('', $key);

                if (property_exists(faqModel::class, $key)) {
                    $this->$key = $property;
                }
            }
        }
    }

    //Edit an FAQ
    public function update(){
       $info = array(
           "faq_id" => $this->faqId,
           "question" => $this->question,
           "response" => $this->response
       );

       $sql = "UPDATE cms_faq SET question=:question, response=:response WHERE faq_id=:faq_id";

       $db = manager::dbConnect();
       $req = $db->prepare($sql);
       $req->execute($info);
    }

    //Delete an FAQ
    public function delete(){
       $info = array(
         "faq_id" => $this->faqId
       );

       $sql = "DELETE FROM cms_faq WHERE faq_id=:faq_id";

       $db = manager::dbConnect();
       $req = $db->prepare($sql);
       $req->execute($info);
    }


}


?>
