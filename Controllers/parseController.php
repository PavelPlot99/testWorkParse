<?
//include("Parser.php");
require_once (realpath('../autoload.php')."autoload.php");
class parseController {

public static function parseHabr()
{
  global $app;
    $url="https://habr.com/ru/top/";
    $result_parse=Parser::parse($url);

    for ($i=0; $i < 5; $i++) {
      $tablePosts = ORM::for_table('postinfo')->create();
      $tablePosts->namePost = $result_parse['name_post'][$i]['#text'][0];
      $tablePosts->publicDate = $result_parse['public_date'][$i]['#text'][0];
    	$tablePosts->countComments = $result_parse['count_comments'][$i]['#text'][0];
      $tablePosts->save();
    }
  }

  public static function showPost($id)
      {
        global $app;
        $postinfo = ORM::for_table('postinfo')->where ('id' , $id )->find_one();
        if ($postinfo['id'] == NULL) {
            echo "There is no such record";
        }else{
            $namePost = $postinfo -> get('namePost');
		        $publicDate = $postinfo -> get('publicDate');
		        $countComments = $postinfo -> get('countComments');
      }
      return $app->render('../templates/post.php',[
        "name_post"=> $namePost,
        "public_date" => $publicDate,
        "count_comments" => $countComments
      ]);
    }
  }
?>
