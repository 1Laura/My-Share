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

        $sql = "SELECT posts.title, posts.body, users.name, users.email, posts.id AS postId, users.id AS userId,
 posts.created AS postCreated, users.created AS userCreated FROM posts INNER JOIN users ON posts.userId = users.id
 ORDER BY posts.created DESC";
        $this->db->query($sql);
        //resutltatui kvieciame sitos db prisijungima, ir jam kvieciam fetch resultata

        $result = $this->db->resultSet();

        return $result;
    }

}


?>