<?php
    $title = 'PHP ToDo List JSON';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>PHP ToDo List JSON</title>
</head>
<body>
    

    <div id="app">
        <header class="title">
            <h1><?php echo $title?></h1>
        </header>

        <main class="main">
            <div class="container">
                <div class="app-main">
                    <section class="input-section"></section>
                    <section class="list-section"></section>
                </div>    
            </div>
        </main>
    </div>


    <script src="./js/app.js"></script>
</body>
</html>