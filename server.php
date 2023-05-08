<?php 


$data = file_get_contents('./data.json');

$todos = json_decode($data, true);

echo json_encode($todos);
// file_put_contents('data.json' , $new_todo);

header('Content-Type: application/json');

?>
