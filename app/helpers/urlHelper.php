<?php

// general URL helper function==========================================================================================
function redirect($whereTo)
{
    header("Location: " . URLROOT . $whereTo);
}