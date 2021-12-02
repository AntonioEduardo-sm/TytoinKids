<?php
    require_once "Connection.class.php";

    class Produtos{
        public function listar(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.id_categoria_fk = categorias.id_categoria";
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
                        
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function listarCategorias(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT DISTINCT(categorias.nome_categoria) 
                        FROM categorias INNER JOIN produtos 
                        ON categorias.id_categoria = produtos.id_categoria_fk LIMIT 10";
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarCategoriasFilter(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT DISTINCT(categorias.nome_categoria) AS nome_categoria, 
                        (SELECT count(produtos.id_produto) 
                        FROM produtos WHERE produtos.id_categoria_fk = categorias.id_categoria ) AS quantidade 
                        FROM categorias INNER JOIN produtos ON categorias.id_categoria = produtos.id_categoria_fk 
                        GROUP BY nome_categoria 
                        ORDER BY quantidade DESC LIMIT 10";
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProduto($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT produtos.*, categorias.*, tamanho_produto.*, personagem_produto.*, tamanhos.tamanho 
                        FROM produtos INNER JOIN categorias ON produtos.id_categoria_fk = categorias.id_categoria 
                        INNER JOIN tamanho_produto ON produtos.id_produto = tamanho_produto.id_produto_fk 
                        INNER JOIN personagem_produto ON produtos.id_produto = tamanho_produto.id_produto_fk 
                        INNER JOIN tamanhos ON tamanhos.id_tamanho = tamanho_produto.id_tamanho_fk 
                        WHERE id_produto = :id_produto";

                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarTamanhos(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
                $status = 1;

                $sql = "SELECT * FROM tamanhos WHERE status = :status";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":status", $status);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProdutoPersonagens($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT personagem FROM personagem_produto WHERE personagem_produto.id_produto_fk = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
                        
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProdutoTamanhos($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT tamanho FROM tamanho_produto WHERE tamanho_produto.id_produto_fk = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function quantidadeProdutosTamanho($id_produto, $id_tamanho){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT quatidade_disponivel 
                        FROM tamanho_produto 
                        WHERE tamanho_produto.id_produto_fk = :id_produto && tamanho_produto.id_tamanho_produto = :id_tamanho LIMIT 1";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->bindValue(":id_tamanho", $id_tamanho);
               
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
                
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function quantidadeProdutosDisponiveis($id_produto, $id_tamanho){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT quatidade_disponivel 
                        FROM tamanho_produto 
                        WHERE tamanho_produto.id_produto_fk = :id_produto 
                        && tamanho_produto.id_tamanho_produto = :id_tamanho LIMIT 1";
                        
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->bindValue(":id_tamanho", $id_tamanho);
                
                return (($consulta->execute() 
                        && $consulta->rowCount() > 0 
                        && $dados = $consulta->fetchAll()) 
                        ? $dados[0][0] : 0 );
                        
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarTodos($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM produtos WHERE produtos.id_produto = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrar($categoria, $nome, $preco, $imagem){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "INSERT INTO produtos(id_produto, id_categoria_fk, nome_produto, preco_produto, imagem_produto) VALUES (NULL, :categoria, :nome, :preco, :imagem)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":categoria", $categoria);
                $cadastrar->bindValue(":nome", $nome);
                $cadastrar->bindValue(":preco", $preco);
                $cadastrar->bindValue(":imagem", $imagem);

                return (($cadastrar->execute()) ? $connection->lastInsertId() : "alert_notification_error_id!");

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function cadastrarPersonagemProduto($id_produto, $personagem, $quantidade){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "INSERT INTO personagem_produto (id_personagem_produto, id_produto_fk, personagem) VALUES (NULL, :id_produto, :personagem)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":personagem", $personagem);
                
                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarTamProduto($id_produto, $tamanho, $quantidade){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "INSERT INTO tamanho_produto VALUES (NULL, :id_produto, :tamanho, :quantidade)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":tamanho", $tamanho);
                $cadastrar->bindValue(":quantidade", $quantidade);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function editar($id_produto, $nome, $preco, $imagem){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "UPDATE produtos SET nome_produto = :nome, preco_produto = :preco, imagem_produto = :imagem WHERE produtos.id_produto = :id_produto";
                $atualizar = $connection->prepare($sql);
                $atualizar->bindValue(":id_produto", $id_produto);
                $atualizar->bindValue(":nome", $nome);
                $atualizar->bindValue(":preco", $preco);
                $atualizar->bindValue(":imagem", $imagem);
                
                return (($atualizar->execute()) ? true : false);
                
            } catch (PDOException $e) {
                echo "Erro ao editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagar($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "DELETE FROM produtos WHERE produtos.id_produto = :id_produto";
                $apagar = $connection->prepare($sql);
                $apagar->bindValue(":id_produto", $id_produto);

                return (($apagar->execute()) ? true : false);
                
            } catch (PDOException $e) {
                echo "Erro ao apagar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>