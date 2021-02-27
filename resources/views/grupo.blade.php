<html lang="en">
<?php
    $alunos = 
    [
        "Leila",
        "Mário Gustavo"
    ];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <script src="/js/app.js"></script>
</head>
<body>
    <div class="justify-content-center">
        @include('nav');
        <div class="row justify-content-center" style="margin-top: 40px;">
            <div class="col-10 text-center">
            

            <ul class="list-group">
                <li class="list-group-item active">Nosso Grupo de trabalho</li>
        <?php
            foreach($alunos as $aluno){
                echo "<li class='list-group-item'>$aluno</li>";
            }
            ?>
            </ul>
        </div>
        
    </div>
</body>
</html>