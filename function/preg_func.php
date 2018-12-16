<?php
function checkIp($str)
{
   if(preg_match("/[\d]{2,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}/", $str))
     {return true;} 
  		return false;
}