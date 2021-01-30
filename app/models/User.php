<?php
//User class
//for getting and setting database values

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // finds user by given email========================================================================================
    //return Boolean
    /**
     * @param $email
     * @return bool
     */
    public function findUserByEmail($email): bool
    {
        //check if given email is in database
        // prepare statement/ paruosiam statementa
        $this->db->query("SELECT * FROM users WHERE `email` = :email");

        //add values to statement / priskiriam reiksme
        $this->db->bind(':email', $email);

        // save result in row
        $row = $this->db->singleRow();

        //check if we got some results
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    // register user with given sanitized data==========================================================================
    // return Boolean
    public function register($data): bool
    {
        //prepare statement
        $this->db->query("INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)");

        //add values//priskirti reiksmes
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        // hashed password
        $this->db->bind(':password', $data['password']);

        //make query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }


    }
}



