<?php
//index.php
session_start();
$_SESSION['user_id'] = (int)1;
$connect = mysqli_connect("localhost", "root", "", "datingtest");
$query = "
     SELECT superheroes.id, superheroes.name,
     COUNT(likes.id) as likes,
     GROUP_CONCAT(user.name separator '|') as liked
     FROM
     heroes
     LEFT JOIN likes
     ON likes.article = heroes.id
     LEFT JOIN user
     ON likes.user = user.id
     GROUP BY heroes.id
";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
     echo '<h3>'.$row["title"].'</h3>';
     echo '<a href="likes.php?type=article&id='.$row["id"].'">Like</a>';
     echo '<p>'.$row["likes"].' One person liked this</p>';
     if(count($row["liked"]))
     {
          $liked = explode("|", $row["liked"]);
          echo '<ul>';
          foreach($liked as $like)
          {
               echo '<li>'.$like.'</li>';
          }
          echo '</ul>';
     }
}
if(isset($_GET["type"], $_GET["id"]))
{
     $type = $_GET["type"];
     $id = (int)$_GET["id"];
     if($type == "article")
     {
          $query = "
          INSERT INTO likes (user, article)
          SELECT {$_SESSION['user_id']}, {$id} FROM heroes
               WHERE EXISTS(
                    SELECT id FROM heroes WHERE id = {$id}) AND
                    NOT EXISTS(
                         SELECT id FROM likes WHERE user = {$_SESSION['user_id']} AND article = {$id})
                         LIMIT 1
          ";
          mysqli_query($connect, $query);
          header("Location: likes.php");
     }
}
?>
