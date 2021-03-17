<?

class Post
{
  public static function get($id = null)
  {
    if ($id == null){
      $posts = ORM::for_table('postinfo')->find_many();
      return $posts;
    }else{
      $posts = ORM::for_table('postinfo')->where('id',$id)->find_one();
      return $posts;
    }

  }
    public static function insert($name_post,$date_public,$count_comments)
  {
    $tablePosts = ORM::for_table('postinfo')->create();
    $tablePosts->namePost = $name_post;
    $tablePosts->publicDate = $date_public;
    $tablePosts->countComments = $count_comments;
    $tablePosts->save();

  }
}

?>
