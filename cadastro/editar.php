<?php
    include('../componentes/header.php');
    require("../acoes.php");

    if (!isset($_SESSION["usuarioId"])) 
    {
        header("location: ../login/index.php");
    }

    //RECUPERANDO DADOS DA PESSOA
        # Pegando ID vindo na url
        $idPessoaBuscar = $_GET['id'];
        # chamando a função de busca a pessoa pelo id
        $resultadoBusca = listarPessoaPeloId($conexao, $idPessoaBuscar);
        $pessoaEditar = mysqli_fetch_array($resultadoBusca);
?>


    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Edição</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="../acoes.php">
                    <input class="form-control" type="hidden" name="acao" value="editar">
                    <input class="form-control" type="hidden" name="id" value='<?= $pessoaEditar["cod_pessoa"]?>'>

                    <input class="form-control" type="text" name="nome" id="nome" value='<?= $pessoaEditar["nome"]?>' required >
                    <br />
                    <input class="form-control" type="text" name="sobrenome" id="sobrenome" value='<?= $pessoaEditar["sobrenome"]?>' required>
                    <br />
                    <input class="form-control" type="text" name="email" id="email" value='<?= $pessoaEditar["email"]?>'required>
                    <br />
                    <input class="form-control" type="text"name="celular" id="celular" value='<?= $pessoaEditar["celular"]?>'required>
                    <br />
                    <button class="btn btn-success">Salvar Edição</button>
                </form>
            </div>
        </div>
    </div>


<?php
    include('../componentes/footer.php');
?>