<?php
require 'resources/includes/view.php';
// Set header correct without using HTML
header("Content-type: text/html; charset=utf-8");

$error = '';
$content = '';
$template = 'page';

// Get value from url for key page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);


// Run If to check what $page to visit.
// First check if $page is empty.
if(empty($page)) {
	$header = 'Start';
    $content = 'Välkommen till Labb 2! Här övar vi på PHP för att bli duktiga webbserverprogrammerare.';
}

// Check if $page is blog.
elseif($page == 'blogg') {
	$header = 'Blogg';
	// Post och Array Key som förklarar vart post kommer ifrån.
	$post = filter_input(INPUT_GET, "post", FILTER_SANITIZE_URL);

	require './resources/includes/model.php';
	}

// Check if $page is contacts.
elseif($page == 'kontakt') {
	$header = 'Kontakt';
	/*Old way from Beginning--> <div class="content">Info...</div>*/
  $content = 'Du når oss på epost@labb2.se';
}
else {
	echo "Den sökta sidan finns inte";
}

header("Content-type: text/html; charset=utf-8");
require "resources/templates/{$template}-template.php";
?>
