<?php

    include_once('../conn/db.php');

    $ID = $_POST['ID'];

    $Nome = mb_strtoupper($_POST['material_editado'], 'UTF-8');
    $Nome_editado = preg_replace('/\s+/', ' ', $Nome);

    $Codigo_editado = $_POST['codigo_editado'];
    $Validade_editada = $_POST['data_validade_editada'];
    $Quantidade_editada = $_POST['quantidade_editada'];

    $Local_editado = mb_strtoupper($_POST['local_editado'], 'UTF-8');
    
    $Descricao = mb_strtoupper($_POST['descricao_editada'], 'UTF-8');
    $Descricao_editada = preg_replace('/\s+/', ' ', $Descricao);

    $sqlSum = "SELECT SUM(Quantidade) AS TotalQuantidade FROM Saida WHERE Nome = '$Nome_editado'";
    $resultSum = mysqli_query($link, $sqlSum);
    $rowSum = mysqli_fetch_assoc($resultSum);
    $totalQuantidadeRetirada = $rowSum['TotalQuantidade'];

    $sqlInitialQuantity = "SELECT QuantidadeInicial FROM Entrada WHERE Nome = '$Nome_editado'";
    $resultInitialQuantity = mysqli_query($link, $sqlInitialQuantity);
    $rowInitialQuantity = mysqli_fetch_assoc($resultInitialQuantity);
    $QuantidadeInicial = $rowInitialQuantity['QuantidadeInicial'];

    $subtraction = $QuantidadeInicial - $totalQuantidadeRetirada;

    if($subtraction == $Quantidade_editada){
        $QuatidadeInicial_Editada = $Quantidade_editada;
    }
    else{
        $QuatidadeInicial_Editada = $QuantidadeInicial + ($Quantidade_editada - $subtraction);
    }

    $sql = "UPDATE Entrada SET Nome = '$Nome_editado', Codigo = '$Codigo_editado', QuantidadeInicial = '$QuatidadeInicial_Editada', Validade = '$Validade_editada', Quantidade = '$Quantidade_editada', Descricao = '$Descricao_editada', Local = '$Local_editado' WHERE Entrada_id = '$ID'";
    $result = mysqli_query($link, $sql);

    if($result){
        echo
        "<script>
            alert('Produto editado com sucesso!');
            window.location.href = '../Home/Editar.php';
        </script>";
    }else{
        echo
        "<script>
            alert('Erro ao editar o produto!');
            window.location.href = '../Home/Editar.php';
        </script>";
    }

?>