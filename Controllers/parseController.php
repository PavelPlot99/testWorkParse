<?
require_once (realpath('../autoload.php')."autoload.php");
class parseController {

public static function show()
{
  global $app;
  $app->render('../templates/hello.php',[]);
}

public static function parseHabr()
{
  global $app;
    $url="https://habr.com/ru/top/";
    $result_parse= Parser::parse($url);
    for ($i=0; $i < 5; $i++) {
      Post::insert($result_parse['name_post'][$i]['#text'][0],
      $result_parse['public_date'][$i]['#text'][0],
      $result_parse['count_comments'][$i]['#text'][0]);
    }

  }

  public static function showPost($id)
      {
        global $app;
        $postinfo = Post::get($id);
        $namePost = $postinfo -> get('namePost');
		    $publicDate = $postinfo -> get('publicDate');
		    $countComments = $postinfo -> get('countComments');

        return $app->render('../templates/post.php',[
          "name_post"=> $namePost,
          "public_date" => $publicDate,
          "count_comments" => $countComments
        ]);
    }
    
    public static function showPosts()
    {
      global $app;
      $posts = ORM::for_table('postinfo')->find_many();
      $app->render('../templates/main.php', ['posts'=>$posts]);
    }
  }
?>
