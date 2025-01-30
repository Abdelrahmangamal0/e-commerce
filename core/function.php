<?php

function checkmethod($method){
if ($_SERVER["REQUEST_METHOD"]==$method){

    return true ;
 }
return false ;
}



function checkname($name){
    if (empty($name)){
        return true ;
    }
return false;
} 