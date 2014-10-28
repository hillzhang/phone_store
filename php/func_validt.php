<?php
function isCreditnumber($val)
{
 if (ereg("^[0-9]{16}$", $val))
    return true;
   return false;

}
function isNumber($val)
{
   if (ereg("^[0-9]+$", $val))
    return true;
   return false;
}
function isPhone($val)
{
   
   if (ereg("^((0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$",$val))
    return true;
   return false;
}

function isTel($val)
{
   if (ereg("^((0\d{2,3})-)(\d{7,8})?$",$val))
    return true;
   return false;
}




function isREQUESTcode($val)
{
   if (ereg("^[0-9]{4}$",$val))
    return true;
   return false;
}

function isEmail($val,$domain="")
{
   if(!$domain)
   {
    if( preg_match("/^[a-z0-9-_.]+@[\da-z][\.\w-]+\.[a-z]{2,4}$/i", $val) )
    {
     return true;
    }
    else
     return false;
   }
   else
   {
    if( preg_match("/^[a-z0-9-_.]+@".$domain."$/i", $val) )
    {
     return true;
    }
    else
     return false;
   }
}


function isName($val)
{
   if( preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $val) )//2008-7-24
   {
    return true;
   }
   return false;
}
function isUserName($val)
{
   if( preg_match("/^[a-zA-Z0-9]{3,30}$/", $val) )//2008-7-24
   {
    return true;
   }
   return false;
}



function isNumLength($val, $min, $max)
{
   $theelement = trim($val);
   if (ereg("^[0-9]{".$min.",".$max."}$",$val))
    return true;
   return false;
}

function isEngLength($val, $min, $max)
{
   $theelement = trim($val);
   if (ereg("^[a-zA-Z]{".$min.",".$max."}$",$val))
    return true;
   return false;
}

function isDate($sDate)
{
   if( ereg("^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$",$sDate) )
   {
    Return true;
   }
   else
   {
    Return false;
   }
}








?>

