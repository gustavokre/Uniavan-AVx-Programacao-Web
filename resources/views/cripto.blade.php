<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criptografia de senha</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <script src="/js/app.js"></script>
</head>
<body>
    <div class="justify-content-center">
        @include('nav');
        <div class="row justify-content-center" style="margin-top: 40px;">
            <div class="col-lg-4 col-10 text-center">
                <label>Digite uma senha</label>
                <input type="text" class="form-control" id="client_password">
                <input class="btn btn-primary mt-3 mb-3" id="cripto_senha" type="button" value="Criptografar Senha"><br>
                <label>md5</label>
                <input class="form-control" id="md5" type="text" readonly>
                <label>sha1</label>
                <input class="form-control" id="sha1" type="text" readonly>
            </div>
        </div>
        
    </div>
    <script>
        $("#cripto_senha").on("click", getPasswordHash);
        function getPasswordHash()
        {
            let text = $("#client_password").val()
            return axios.post('api/cripto', { "password": text })
                .then((res) => {
                    if(res.status === 200)
                    {
                        $("#md5").val(res.data.md5);
                        $("#sha1").val(res.data.sha1);
                    }
                });
        }
    </script>

</body>
</html>
