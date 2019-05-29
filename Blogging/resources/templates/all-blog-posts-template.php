<?php
// Include Meta
require ('resources/includes/head.php');

// Include Header
require ('resources/views/header.php');

navigation($header);

// Old way from Beginning
//echo $content;

// Content - New way for Blogging sätter olika klasser för att man ska kunna se datum vem som gjorde det och vad de skrev.
echo '<div class="content">';
echo '<h2>Alla blogginlägg</h2>';
echo $error;
foreach ($model as $key => $value) {
  $text = shorttext($value["Text"]);
echo <<<POST
    <div class="post">
        <h3> {$value["title"]} </h3>
        <p class="author">Författare: {$value["author"]} </p>
        <p class="date">Datum: {$value["date"]} </p>
        <p class="message">{$text}...<a href="index.php?page=blogg&post={$key}">Läs mer</a></p>
    </div>
POST;
}
echo '</div>';

// Inlcude Footer
require ('resources/views/footer.php');
?>
