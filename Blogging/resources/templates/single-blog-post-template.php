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
    </div>
</div>
<?php

//Inlcude Footer
require ('resources/views/footer.php');
?>
