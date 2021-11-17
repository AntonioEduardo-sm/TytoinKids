<?php
    session_start();
    require_once "../commandsclass/Encomendas.class.php";
    require_once "../commandsclass/Produtos.class.php";

    // Instanciando classes
    $objEncomenda = new Encomendas();
    $objProduto = new Produtos();

    // Execução de métodos
    if (isset($_GET["cart"])){
        $id_produto = $_GET["id_produto"];
        $qtd_produto = intval($_GET["qtd_produto"]);
        $id_tamanho_selecionado = intval($_GET["id_tamanho_selecionado"]);
        $id_cor_selecionado = intval($_GET["id_cor_selecionado"]);
        $tamanho_selecionado = intval($_GET["tamanho_selecionado"]);
        $cor_selecionado = intval($_GET["cor_selecionado"]);

        if($qtd_produto > 0){
            if ($id_tamanho_selecionado > 0 && $id_tamanho_selecionado != "") {
                if ($id_cor_selecionado > 0 && $id_cor_selecionado != "") {
                    $qtd_produto_disp = intval($objProduto->quantidadeProdutosDisponiveis($id_produto));
                    
                    if($qtd_produto_disp != 0){
                        if($qtd_produto_disp != NULL){
                            if($qtd_produto <= $qtd_produto_disp){
                                $disponibilidade = true;
                            }else{
                                $disponibilidade = false;
                            };
                        }else{
                            $disponibilidade = true;
                        };
                    }else{
                        $disponibilidade = false;
                    };
        
                    if ($disponibilidade){
                        $dados = $objProduto->listarTodos($id_produto);
        
                        $idProduto              = ((isset($dados[0]["id_produto"]))             ? $dados[0]["id_produto"] : "Indisponível");
                        $imgProduto             = ((isset($dados[0]["imagem_produto"]))         ? $dados[0]["imagem_produto"] : "productind.jpg");
                        $nomeProduto            = ((isset($dados[0]["nome_produto"]))           ? $dados[0]["nome_produto"] : "Indisponível");
                        $preco_produto          = ((isset($dados[0]["preco_produto"]))          ? $dados[0]["preco_produto"] : "Indisponível");
                        $qtd_produto_disp       = ((isset($dados[0]["quatidade_disponivel"]))   ? $dados[0]["quatidade_disponivel"] : "Indisponível");
        
                        if (empty($_SESSION["cart"])){
                            $_SESSION["cart"] = [];
                        };
        
                        $dados_cart = [
                            "id_usuario"        => $_SESSION["user"]["id"],
                            "id_produto"        => $idProduto,
                            "id_tamanho"        => $id_tamanho_selecionado,
                            "id_cor"            => $id_cor_selecionado,
                            "tamanho"           => $tamanho_selecionado,
                            "cor"               => $cor_selecionado,
                            "imgProduto"        => $imgProduto,
                            "nomeProduto"       => $nomeProduto,
                            "preco_produto"     => $preco_produto,
                            "qtd_produto"       => $qtd_produto,
                            "qtd_produto_disp"  => $qtd_produto_disp
                        ];
        
                        array_push($_SESSION["cart"], $dados_cart);
        
                        var_dump ($_SESSION["cart"]);
                    }else{
                        echo "alert_notification_error_qtd_disp!-|-alert-danger";
                    };
                }else{
                    echo "alert_notification_error_cor_insert!-|-alert-danger";
                }
            }else{
                echo "alert_notification_error_tam_insert!-|-alert-danger";
            }
        }else{
            echo "alert_notification_error_qtd_insert!-|-alert-danger";
        };
    };

    if(isset($_GET["btn_unset"])){
        $linha = $_GET["linha"];
        if(isset($_SESSION["cart"])){
            unset($_SESSION["cart"][$linha]);
            if(empty($_SESSION["cart"])){
                unset($_SESSION["cart"]);
            };

            echo "Removido!-|-alert-success";
        }else{
            echo "alert_notification_error!-|-alert-danger";
        };
    };

    if(isset($_POST["btn_cadastrar"])){

        if (isset($_SESSION["user"]) && $_SESSION["user"]["id"] > 0 && $_SESSION["user"]["tipo_user"] != "convidado") {
            if(isset($_SESSION["cart"])){
                $erro = 0;
                $data_atual = date("Y-m-d H:i:s");

                foreach ($_SESSION['cart'] as $key => $value) {
                    if (!($objEncomenda->cadastrarEncomendas($value["id_usuario"], $value["id_produto"], $value["id_cor"], $value["id_tamanho"], $value["qtd_produto"], $data_atual))) {
                        $erro++;
                    }
                }

                if($erro == 0){
                    echo "Sucesso, encomenda cadastrada!-|-alert-success";
                }else{
                    echo "alert_notification_error!-|-alert-danger";
                }
            }else{
                echo "alert_notification_error_cart_empty!-|-alert-danger";
            };
        }else{
            echo "alert_notification_error_session_empty!-|-alert-danger";
        };
    };
    
    if (isset($_GET['listarEncomendas'])) {
        if ($dados = $objEncomenda->listarEncomendas()) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhuma encomenda cadastrada",
            ];
        }

        echo json_encode($retorno);
    }

    if (isset($_GET['btn_listar_encomenda'])) {
        if ($dados = $objEncomenda->listarEncomendasId($_GET['id_encomenda'])) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhuma encomenda cadastrada",
            ];
        }

        echo json_encode($retorno);
    }
    
    if (isset($_POST['editarEncomendas'])) {
        $id_encomenda = 0;
        $id_produto_fk = 0;
        $id_cor_produto_fk = 0;
        $id_tamanho_produto_fk = 0;
        $quantidade = 0;
        $data_hora = 0;

        if ($objEncomenda->editarEncomendas($id_encomenda, $id_produto_fk, $id_cor_produto_fk, $id_tamanho_produto_fk, $quantidade, $data_hora)) {
            echo "Editado!";
        }else {
            echo "alert_notification_error!-|-alert-danger";
        }
    }
    
    if (isset($_POST['btn_apagar'])) {
        $id_encomenda = intval($_POST['id_encomenda']);

        if(is_int($id_encomenda)){
            if ($objEncomenda->apagarEncomendas($id_encomenda)){
                echo "Apagado!";
            }else{
                echo "alert_notification_error!-|-alert-danger";
            };
        }else{
            echo "alert_notification_error_data_bite!-|-alert-danger";
        };
    }
?>