<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <script src="/js/app.js"></script>
</head>
<body>
    <div class="justify-content-center">
        @include('nav');
        <div class="row justify-content-center" style="margin-top: 40px;">
            <div class="col-10 text-center"><p class="h3">Versão do laravel:  <b style="color:darkblue"><?php echo app()->version(); ?></b></p>
            <p class="h4 mt-4">Trabalho Uniavan - Programação Web</p>
            <p>Curso: Análise e Desenvolvimento de Sistemas</p>
            <p>Professor: <b>Marcos Carrard</b></p>
            </div>
        </div>
        
    </div>
</body>
</html>