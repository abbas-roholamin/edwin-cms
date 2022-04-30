<?php

 function inCryptPassword($password)
{
     return crypt($password,'$2a$07$usesomesillystringforsalt$');
}

?>