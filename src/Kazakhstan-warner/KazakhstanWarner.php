<?php
namespace KazakhstanWarner;
class KazakhstanWarner
{
  public static function check($ip)
  {
    if(is_null($ip)) return true; // If no IP, then ignore
    return \TabGeo\country($ip)!=="KZ";
  }
  public static function warning($ip=null,$echo=true,$die=true)
  {
    if($_COOKIE["KazakhstanWarner-Accept"]??false)
    {
      return "";
    }
    if(!self::check($ip??$_SERVER["REMOTE_ADDR"]??$GLOBALS["argv"][1]??null))
    {
      if($echo)
      {
        require "cookie.html";
        if($die)
        {
          die;
        }
      }
      else
      {
        return file_get_contents("warning.html");
      }
    }
    return "";
  }
}
