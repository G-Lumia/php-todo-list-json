<?php 


$data = file_get_contents('./data.json');

$todos = json_decode($data, true);

if(isset($_POST['newTodo']))
{
    $newTodo = $_POST['newTodo'];
    array_push($todos, $newTodo);
    file_put_contents('./data.json', json_encode($todos));
}

if(isset($_GET['index']))
{
    $index = $_GET['index'];
    array_splice($todos, $index, 1);
    file_put_contents('./data.json', json_encode($todos));
}

header('Content-Type: application/json');

echo json_encode($todos);
?>
