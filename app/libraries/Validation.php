<?php
//this is a class to validate  different inputs and data

class Validation
{

    //checks if server request is post
    public function ifRequestIsPost(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') return true;
        return false;
    }

    public function sanitizePost()
    {
        // sanitize post array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }

    public function ifRequestIsPostAndSanitize()
    {
        if ($this->ifRequestIsPost()) {
            $this->sanitizePost();
            return true;
        }
        return false;
    }


}