<?php
function debug($message){
    echo '<pre>';
    print_r($message);
    echo '</pre>';
};

function console($text){
    error_log(print_r($text,true));
}