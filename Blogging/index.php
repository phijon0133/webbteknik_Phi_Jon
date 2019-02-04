<?php


require ('resources/includes/view.php');
require ('resources/includes/model.php');
// Set header correct without using HTML
header("Content-type: text/html; charset=utf-8");

$error = '';
$content = '';

// Get value from url for key page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);


// Run If to check what $page to visit.
// First check if $page is empty.
if(empty($page)) {
	$header = 'Start';
    $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum';
    require ('resources/templates/page-template.php');
}

// Check if $page is blog.
elseif($page == 'blogg') {
    $header = 'Blogg';
	$template = 'all-blog-posts';
	$post = filter_input(INPUT_GET, "post", FILTER_SANITIZE_URL);

	// Post och Array Key som förklarar vart post kommer ifrån.
	$post = filter_input(INPUT_GET, "post", FILTER_SANITIZE_URL);
	if (array_key_exists($post, $model)) {
	    $template ="single-blog-post";
	    $title = $model[$post]["title"];
	    $author = $model[$post]["author"];
	    $date = $model[$post]["date"];
	    $text = $model[$post]["Text"];
	}
	// Error om det inte finns någon information att visa.
	elseif (!empty($post)) {
	    $header = "ERROR - 404";
	    $error = "Den sökta sidan finns inte";
	    $template = "page";
	}
	include ('resources/templates/' . $template . '-template.php');
	}

// Check if $page is contacts.
elseif($page == 'kontakt') {
	$header = 'Kontakt';
	/*Old way from Beginning--> <div class="content">Info...</div>*/
    $content = 'Du når oss på epost@labb2.se';
    require ('resources/templates/page-template.php');
}
else {
    echo "Den sökta sidan finns inte";
}
?>
