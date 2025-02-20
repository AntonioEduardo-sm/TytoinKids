<?php
require_once "../models/Connection.class.php";

class ListarProduto extends Connection{
    public function listar(){
        try {
            $conn = $this->conectar();

            if($conn){
                //Colunas da tabela
                $col = array(
                    0   =>  'nome_produto',
                    1   =>  'nome_produto',
                    2   =>  'preco_produto',
                    3   =>  'id_produto'
                ); 

                $sql = "SELECT * FROM produtos";

                $statement = $conn->prepare($sql);
                $statement->execute();

                $totalData      = $statement->rowCount();
                $totalFilter    = $totalData;

                //Pesquisar
                $sql ="SELECT * FROM produtos WHERE 1";
                if(!empty($_POST['search']['value'])){
                    $sql.=" AND (imagem_produto Like '".$_POST['search']['value']."%' ";
                    $sql.=" OR nome_produto Like '".$_POST['search']['value']."%' ";
                    $sql.=" OR preco_produto Like '".$_POST['search']['value']."%' ";
                }

                $statement  = $conn->prepare($sql);
                $query      = $statement->execute();

                $totalData  = $statement->rowCount();
                $totalFilter= $totalData;

                //Ordenar
                $sql.=" ORDER BY ".$col[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']."  LIMIT ".
                $_POST['start']."  ,".$_POST['length']."  ";

                $statement  = $conn->prepare($sql);
                $statement->execute();

                $dados      = $statement->fetchAll();

                // Armazenamendo do query array em data

                $data=array();

                foreach($dados as $indice => $row){
                    $subdata    = array();
                    $subdata[]  = $row[0];
                    $subdata[]  = $row[2];
                    $subdata[]  = $row[3];
                    $subdata[]  = '<h4 class="product-remove">
                                        <button class="modal_system_open btn btn-lg" name="btn_nm_edit-|-'.$row[0].' ">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="modal_system_open btn btn-lg" name="btn_nm_remove-|-'.$row[0].' ">
                                            <i class="far fa-window-close"></i>
                                        </button>
                                    </h4>';
                    $data[]     = $subdata;
                }

                $json_data = array(
                    "draw"              =>  intval($_POST['draw']),
                    "recordsTotal"      =>  intval($totalData),
                    "recordsFiltered"   =>  intval($totalFilter),
                    "data"              =>  $data
                );

                return ($json_data);
            }
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
?>
