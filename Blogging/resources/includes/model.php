<?php

//Simple array for topics - Övning 4
// $model = array("Första inlägget", "Snart är det vår", "Robin presenterar sig", "Senaste inlägget");


// Uppgifter för att logga in på PHPMyAdmin.
$host = 'localhost';

$dbname = 'blogg';

$user = 'admin';

$password = 'tisgot17';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);


$pdo = new PDO($dsn, $user, $password, $attr);

if($pdo) {
//Definera model-array
$sql = 'SELECT p.Slug, p.Headline, u.Username, p.Creation_time, p.Text FROM posts AS p JOIN users AS u ON p.User_ID = u.ID ORDER BY CREATION_Time DESC';
$model = array();

//Assosiativ Array
    echo "<pre>";
    foreach($pdo->query($sql) as $row) {
        $model += array(
            $row['Slug'] => array(
                     'title' => $row['Headline'],
                     'author' => $row['Username'],
                     'date' => $row['Creation_time'],
                     'Text' => $row['Text']
                 )

        );

    }

    echo "</pre>";
// else som ger dig ett error om du gjort nåt fel och förklarar varför. 
} else {
print_r($pdo->errorInfo());
}


?>
