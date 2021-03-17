<?
spl_autoload_register(function ($class)
{
  $pathC = __DIR__."/Controllers/{$class}.php";
  $pathCl = __DIR__."/Class/{$class}.php";
  $pathM = __DIR__."/Model/{$class}.php";
  if(is_readable($pathC)){
    require $pathC;
  }elseif(is_readable($pathM)){
    require $pathM;
  }elseif(is_readable($pathCl)){
    require $pathCl;
  }else{

  }
});
?>
