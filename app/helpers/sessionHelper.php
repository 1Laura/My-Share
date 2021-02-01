<?php

// Session helper for displaying useful feedback to the user
session_start();
// flash msg helper
//example save msg flash('registerSuccess', 'You have registered successfully');
//for display flash('registerSuccess');

function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        //this is the part where we set the message
        if (!empty($message) && empty($_SESSION[$name])) {

            //if there is some class left in session we unset it
            // jei netuscia sesijos klase, unsetinti klases kintamaji
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            //sukuriam register succes key, o jos value buna tai ka mes parasem zinutej
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;

            // this is where we display msg to the view
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            //zinute yra tuscia
            //jei netuscias name clases kintamasis, ji pakeicia i tuscia
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            //echovinam clase
            echo "<div class='$class' id='msg-flash'>{$_SESSION[$name]}</div>";
            //unset the values have been show
            //istrinti name kintamaji ir istrinam klases kintamaji
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

// check if user is logged in=========================================================
function isLoggedIn(): bool
{
    if (isset($_SESSION['userId'])) return true;
    return false;

    // zemiau if isplestas(senesnis kelias), virsuje sutrumpintas
//    if (isset($_SESSION['userId'])) {
//        return true;
//    } else {
//        return false;
//    }
}



