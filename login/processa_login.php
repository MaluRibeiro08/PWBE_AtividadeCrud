<?php

    session_start();
    require("../database/conexao.php");

    switch ($_POST["acao"]) 
    {
        
        case 'login':

            $usuarioInserido= $_POST["txt_usuario"];
            $senhaInserido= $_POST["txt_senha"];
            
            realizarLogin($usuarioInserido, $senhaInserido, $conexao);
        
            break;
        
        case 'sair':

            echo "você vai fazer logout";

            session_destroy();
            header("location: ./index.php");
            break;

        default:
            # code...
            break;
    }


    // - - -  FUNÇÕES  - - - 

    function realizarLogin($usuario, $senha, $conexao)
    {
        $instrucaoSqlLogin = "SELECT * FROM tbl_dadoslogin WHERE usuario = '$usuario'";

        $resultado = mysqli_query($conexao, $instrucaoSqlLogin);

        $dadosUsuario = mysqli_fetch_array($resultado);

        if ((isset($dadosUsuario["usuario"]) && $dadosUsuario["usuario"] == $usuario) && (isset($dadosUsuario["senha"]) && $dadosUsuario["senha"] == $senha))
        {
            echo "Você Logou!!!";

            $_SESSION["usuarioId"] = $dadosUsuario["idDadosLogin"];
            $_SESSION["usuario"] = $dadosUsuario["usuario"];
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');       

            header("location: ../index.php");
            exit;
        }

        else 
        {
            header("location: ./index.php");
        }
    }



?>