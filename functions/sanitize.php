<?php

function escape($string) {
    // Takes a string and sanitizes it before output
    // ENT_QUOTES escapes single and double quotes
    
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}