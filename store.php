<?php

$new_todo = $_POST['todo'] ?? '';



if ($new_todo) {
    
   $todos_json_string = file_get_contents('./todos.json');

    $todos = json_decode($todos_json_string, true); 

    $todo = [
        'text' => $new_todo,
        'done' => false
    ];
    
    $todos[] = $todo;

    $response = [
        'success' => true,
        'results' => $todos
    ];
    

    $todos_json_string = json_encode($todos);

    file_put_contents('./todos.json', $todos_json_string);

    header('Content-type: application/json');
    echo json_encode($response); 
} else {
    
    $response = [
        'success' => false,
        'message' => 'Server error!'
    ];

    header('Content-type: application/json');
    echo json_encode($response); 
}

/* header('Content-type: application/json');
echo json_encode($response); */

?>