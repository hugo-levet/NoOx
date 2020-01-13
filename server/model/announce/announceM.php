<?php
/*
    title : announceM.php
    author: Audrey
    date : 24/12/2019
    brief : Announce model

*/

require __DIR__ . '/../ModelM.php';

class announceM extends Model {
    protected $id = [];
    protected $title = [];
    protected $description = [];
    protected $date_post = [];

    function __construct(){
        $request = "SELECT * FROM `announce` ORDER BY `date_post` DESC";
        $request = $this->execute($request);

        for ($i = 0; $i < sizeof($request); ++$i){
            $this->id[$i] = $request[$i]['id'];
            $this->title[$i] = $request[$i]['title'];
            $this->description[$i] = $request[$i]['description'];
            $this->date_post[$i] = $request[$i]['date_post'];
        }
    }

    //getter & setter
    //author : Audrey

    public function getIds() {
        return $this->id;
    }

    //Title

    public function getTitle($id){
        return $this->title[$id];
    }

    public function setTitle($title, $id){
        $this->title[$id] = $title;
    }

    //Description

    public function getDescription($id){
        return $this->description[$id];
    }

    public function setDescription($description, $id){
        $this->description[$id] = $description;
    }

    //Date

    public function getDate($id){
        return $this->date_post[$id];
    }

    public function setDate($date, $id){
        $this->date_post[$id] = $date_post;
    }

    public function addAnnounce($title, $message) {
        $message = htmlspecialchars($message);
        $request = "INSERT INTO announce (`title`, `message`, `date_post`) VALUES (\"$title\", \"$message\", NOW())";
        $request = $this->insert($request);
    }

}