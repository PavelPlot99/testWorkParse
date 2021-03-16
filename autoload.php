<?
spl_autoload_register(function ($class)
{
  $path = __DIR__."/Controllers/{$class}.php";
  if(is_readable($path)){
    require $path;
  }else{
    $path = __DIR__."/Class/{$class}.php";
    require $path;
  }

});
?>
