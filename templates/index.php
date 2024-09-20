<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Slim 4</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/CSS/styles.css">

</head>
<body>
<h1>To Do List</h1>
<div>Do these things: </div>
<?PHP
foreach ($toDoArray as $toDo)
{
    echo '<h3>' . $toDo['message'] . '</h3>';
}
?>
</body>
</html>
