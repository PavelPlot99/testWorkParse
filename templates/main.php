<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?foreach ($posts as $post) {?>
      <hr>
      <h1><?=$post['namePost']?></h1>
      <h2><?=$post['publicDate']?></h2>
      <h3><?=$post['countComments']?></h3>
      <a href="<?='/post/'.$post['id']?>">Перейти</a>
      <hr>
    <?}?>
  </body>
</html>
