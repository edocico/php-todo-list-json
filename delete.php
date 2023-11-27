<?php

$index_string = $_POST['dataindex'];

$index = intval($index_string);

$todos_json_string = file_get_contents('./todos.json');

$todos = json_decode($todos_json_string, true);

array_splice($todos, $index, 1);

$response = [
    'success' => true,
    'results' => $todos
];

$todos_json_string = json_encode($todos);

file_put_contents('./todos.json', $todos_json_string);

header('Content-type: application/json');
echo json_encode($response); 
?>