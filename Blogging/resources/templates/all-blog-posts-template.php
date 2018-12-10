<?php
// Include Meta
require ('resources/includes/head.php');

// Include Header
require ('resources/views/header.php');

navigation($header);

// Old way from Beginning
//echo $content;

//Content
echo '<div class="content"><h2>Alla blogginlägg</h2>' . $error;
//print_r($model);
/*echo '<div class="content"> <h2>Alla blogginlägg</h2>';
for ($i = 0; $i <= 3; $i++) {
    echo '<div class="post"><h3>' . $model[$i] . '</h3></div>';
}
echo '</div>';*/

foreach ($model as $key => $value) {
  ?>
    <div class="post">
    <h3><?php echo $value["title"]; ?></h3>
    <p class="author">Författare:<?php $value["author"]; ?></p>
    <p class="date">Datum:<?php echo $value["date"]; ?></p>
    <p class="message">Här kommer själva inlägget men inte i sin helhet...
   <a href="index.php?page=blogg&post=<?php echo $key; ?>">Läs mer</a></p>
    </div>
    <?php
}
echo '</div>';
// Inlcude Footer
require ('resources/views/footer.php');
?>
