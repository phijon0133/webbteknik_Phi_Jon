<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

navigation($header);

//Content
?>
<div class="content">
    <h2><?php echo $title; ?></h2>
    <p class="author">Författare: <?php echo $author; ?></p>
    <p class="date">Datum: <?php echo $date; ?></p>
    <p class="message">Meddelande: <?php echo $text;?></p>
    <hr>
    <h3>Kommentarer</h3>
    <?php
    if (!empty($comments)) {
      foreach ($comments as $key => $val) {
        echo <<<CMT
        <div class="post">
            <h3>{$val["Username"]}</h3>
            <p class="date">Datum: {$val["Creation_time"]}</p>
            <p class="message">{$val["Text"]}</p>
        </div>
CMT;
      }
    } else {
      echo "Inga kommentarer ännu. :(";
    }
    ?>
</div>
<?php

//Inlcude Footer
require ('resources/views/footer.php');
?>
