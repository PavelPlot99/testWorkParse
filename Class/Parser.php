<?
class Parser
{
    public static function parse($url){
      for ($i = 0 ; $i < 5; $i++){
      $url = $url.$i;
      $html = file_get_contents($url);
  		//Создаем объект
  		$saw = new nokogiri ($html);
  		//Запись о имени поста
  	  $name_post = $saw->get('a.post__title_link')->toArray();
  		//Запись время публикации
  		$public_date = $saw->get('span.post__time')->toArray();
  		//Запись количество комментариев
      $count_comments = $saw->get('span.post-stats__comments-count')->toArray();

      return [
        "name_post"=>$name_post,
        "public_date"=>$public_date,
        "count_comments"=>$count_comments
      ];
    }

  }
}


?>
