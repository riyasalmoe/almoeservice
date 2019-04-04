<?php

function getHashedPassword($thisPassword){
    try
    {
        $thisHash = "";
        $thisHash = crypt($thisPassword,'$2y$09$Almoedigitalsolutionsa$');
        $password = explode('$2y$09$Almoedigitalsolutionsa$',$thisPassword,2);
        return $password;
    }
}

?>