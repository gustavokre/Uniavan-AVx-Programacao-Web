<html lang="en">
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
                <p class="texto-padrao">Uniavan Trabalho AV1</p>
                <span>Curso: Análise e Desenvolvimento de Sistemas</span><br>
                <span id="dia">Dia: </span><br>
                <span id="mes">Mês: </span><br>
                <span id="ano">Ano: </span><br>
                <span id="horario">Horario: </span><br>
                <input class="btn btn-primary mt-3" id="atualiza_data" type="button" value="Atualizar Data">
            </div>
        </div>
        
    </div>
    <script>
    $("#atualiza_data").on("click", getDataFromController);
        function getDataFromController()
        {
            return axios.get('api/data', "")
                .then((res) => {
                    if(res.status === 200)
                    {
                        update_client_side_data(res.data);
                    }
                });
        }
        
        function update_client_side_data(data)
        {
            $("#dia").text("Dia: " + data.dia);
            $("#mes").text("Mês: " + data.mes);
            $("#ano").text("Ano: " + data.ano);
            $("#horario").text("Horario: " + data.horario);
        }
    </script>
</body>
</html>