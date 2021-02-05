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
    public function ifEmptyUserField($field, $fieldDisplayName): string
    {
        if (empty($field)) {
            // empty field

            return "Please enter your $fieldDisplayName";
        }
        return '';//falsy
    }

    //email validation
    public function validateEmail($field, &$userModel)
    {
        //validate empty
        if (empty($field)) return "Please enter Your Email";

        //check email format
        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) return 'Please check Your Email';

        // if email already exists
        if ($userModel->findUserByEmail($field)) return 'Email already taken';
        return '';
    }

    public function validatePassword($passwordField, $min, $max)
    {
        //validate empty
        if (empty($passwordField)) return "Please enter a Password";

        //if password lenght is less then min
        if (strlen($passwordField) < $min) return "Password must be more $min characters length";

        //if password lenght is mores then max
        if (strlen($passwordField) > $max) return "Password must be less $max characters length";

        //check password strength

        if (!preg_match("#[0-9]+#", $passwordField)) return "Password must contain at least one number!";


        if (!preg_match("#[a-z]+#", $passwordField)) return "Password must include at least one letter!";

        if (!preg_match("#[A-Z]+#", $passwordField)) return "Password must include at least one Capital letter!";

//        if (!preg_match("#\W+#", $passwordField)) return "Password must include at least one symbol!";

        return '';
    }
}