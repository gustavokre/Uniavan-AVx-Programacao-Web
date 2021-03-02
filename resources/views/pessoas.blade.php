<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <script src="/js/app.js"></script>
</head>
<body>
    <div class="justify-content-center">
        @include('nav');
        <div class="row justify-content-center" style="margin-top: 40px;">
            <div class='col-lg-10 col-12'>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Profissão</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody id='t_pessoas'>
                    </tbody>
                </table>
            </div>
        </div>
        
        
        <div class="row justify-content-center" style="margin-top: 40px;">
            <div class='col-lg-10 col-12'>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Profissão</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody id='inserir'>
                    <tr>
                        <td><input type="text" id="inserir_nome" class="form-control"></td>
                        <td><input type="text" id="inserir_profissao" class="form-control"></td>
                        <td><input type="text" id="inserir_idade" class="form-control"></td>
                        <td class='text-center'><button type="button" id="inserir_botao" class="btn btn-success mr-3">Adicionar</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>    


    </div>
    <script>
        select();
        $("#inserir_botao").on('click', inserir);
        function select()
        {
            return axios.post('api/pessoas', {})
                .then((res) => {
                    if(res.status === 200)
                    {
                        inserir_tabela(res.data);
                    }
                });
        }

        function inserir_tabela(pessoa)
        {
            pessoa.forEach( p => 
            {
                $('#t_pessoas').append(`<tr>
                <th scope="row">${p.pessoa_id}</th>
                <td><input type="text" class="form-control" id="nome_${p.pessoa_id}" value="${p.nome}"></td>
                <td><input type="text" class="form-control" id="profissao_${p.pessoa_id}" value="${p.profissao}"></td>
                <td><input type="text" class="form-control" id="idade_${p.pessoa_id}" value="${p.idade}"></td>
                <td class='text-center'><button type="button" onClick="update(${p.pessoa_id})" class="btn btn-success mr-3">Salvar</button><button type="button" class="btn btn-danger" onClick="deletar(${p.pessoa_id})">Deletar</button></td>
                </tr>`);
            })

        }

        function deletar(id)
        {
            console.log(id);
            return axios.post('api/pessoas/deletar', { "pessoa_id": id })
                .then((res) => {
                    if(res.status === 200)
                    {
                        window.location.reload();
                    }
                });
        }

        function update(id)
        {
            
            let nome = $("#nome_" + id).val();
            let profissao = $("#profissao_" + id).val();
            let idade = parseInt($("#idade_" + id).val());
            return axios.post('api/pessoas/update', { "pessoa_id": id, "nome": nome, "profissao": profissao, "idade": idade })
                .then((res) => {
                    if(res.status === 200)
                    {
                        window.location.reload();
                    }
                });
        }

        function inserir()
        {
            let nome = $('#inserir_nome').val();
            let profissao = $('#inserir_profissao').val();
            let idade = parseInt($('#inserir_idade').val());
            console.log(nome,profissao,idade)
            return axios.post('api/pessoas/inserir', { "nome": nome, "profissao": profissao, "idade": idade })
                .then((res) => {
                    if(res.status === 200)
                    {
                        window.location.reload();
                    }
                });
        }
    </script>

</body>
</html>
