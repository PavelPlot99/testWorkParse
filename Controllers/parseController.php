<?
class ParseController {
public static function parseHabr()  {
  global $app;
  //Ссыылка на сайт с порядковым номером, для того чтобы указать количество постов
  $url = "https://habr.com/ru/top/".$i;
  //Количество постов 5
  for ($i = 0 ; $i < 5; $i++){
    //Преобразуем файл в строку
		$html = file_get_contents($url);
		//Создаем объект
		$saw = new nokogiri ($html);
		//Запись о имени поста
	  $name_post = $saw->get('a.post__title_link')->toArray();
		//Запись время публикации
		$public_date = $saw->get('span.post__time')->toArray();
		//Запись количество комментариев
		$count_comments = $saw->get('span.post-stats__comments-count')->toArray();
		//Вывод информации
    echo "<pre>";
		var_dump($name_post[$i]['#text'][0]);
		var_dump($public_date[$i]['#text'][0]);
		var_dump($count_comments[$i]['#text'][0]);
    echo "<pre>";
    $tablePosts = ORM::for_table('postinfo')->create();
    $tablePosts->namePost = $name_post[$i]["#text"][0];
    $tablePosts->publicDate = $public_date[$i]["#text"][0];
  	$tablePosts->countComments = $count_comments[$i]["#text"][0];

    $tablePosts->save();

        }
      }

  public static function showPost($id)
      {
        global $app;
        $postinfo = ORM::for_table('postinfo')->where ('id' , $id )->find_one();
        //Проверяем есть ли запись с таким ID в базе
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
