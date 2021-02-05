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

    public function ifEmptyErrorsArray($errorsArr)
    {
//       (empty($data['errors']['nameErr']) && empty($data['errors']['emailErr']) && empty($data['errors']['passwordErr']) && empty($data['errors']['confirmPasswordErr']))
        //foreach
        // check if all values of array is empty`1
        foreach ($errorsArr as $error) {
            if (!empty($error)) {
                return false;
            }
        }
        return true;
    }

    // dvi funkcijos kaip galima pasitikrinti
    //funkcija su referencu
    public function ifEmptyUserFieldWithReference(&$data, $field, $fieldDisplayName)
    {
        $fieldError = $field . "Err";
        if (empty($data[$field])) {
            // empty field
            $data['errors'][$fieldError] = "Please enter your $fieldDisplayName";
        }

    }

    //funkcija be referenco
    public function ifEmptyUserField($field, $fieldDisplayName, $msg = null): string
    {
        if (empty($field)) {
            // empty field
            if ($msg) {
                return $msg;
            }
            return "Please enter your $fieldDisplayName";
        }
        return '';//falsy
    }

}