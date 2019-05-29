<?php
require './resources/includes/config.php';
require './resources/includes/dbh.inc.php';

$dbh = get_dbh();

$template ="all-blog-posts";

$sql = 'SELECT p.*, u.Username FROM posts AS p JOIN users AS u ON p.User_ID = u.ID';
$order = 'DESC';
$text = '';


$sql .= " ORDER BY CREATION_Time {$order}";

$stmt = $dbh->prepare($sql);
$stmt->execute();

$model = array();
// definerar alla saker i den assosiativa arrayen
//Assosiativ array
foreach($stmt as $row){
  $model += array(
    $row['ID'] => array(
      'slug' => $row['Slug'],
      'title' => $row['Headline'],
      'author' => $row['Username'],
      'date' => $row['Creation_time'],
      'Text' => $row['Text']
      //'Comment'=> $row['Comment']
    )
  );
}
// om post finns så ska den ha single blog post som template samt en comment sedan kommer den få en title datum och text.  
if (array_key_exists($post, $model)) {
  $template ="single-blog-post";
  $comments = fetch_comments($post, $dbh);
  $title = $model[$post]["title"];
  $author = $model[$post]["author"];
  $date = $model[$post]["date"];
  $text = $model[$post]["Text"];
}

elseif (!empty($post)) {
  $template = "page";
  $content = "skit";
}

?>
