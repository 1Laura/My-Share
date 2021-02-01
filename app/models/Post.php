<?php

//class for getting and sending Post data to and from DB
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // get all posts from posts table
    //return Object Array
    public function getPosts()
    {
        $this->db->query("SELECT * FROM posts");
        //resutltatui kvieciame sitos db prisijungima, ir jam kvieciam fetch resultata

        $result = $this->db->resultSet();

        return $result;
    }

}


?>