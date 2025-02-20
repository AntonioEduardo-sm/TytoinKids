<?php
require_once ("../../models/Connection.class.php");

$objConn = new Connection();
$conn = $objConn->conectar();

$request=$_REQUEST;

//Colunas da tabela
$col =array(
    0   =>  'imagem_produto',
    1   =>  'nome_produto',
    2   =>  'preco_produto',
    3   =>  'quatidade_disponivel',
    4   =>  'id_produto'
); 

$sql ="SELECT * FROM produtos";

$statement = $conn->prepare($sql);
$statement->execute();

$totalData = $statement->rowCount();
$totalFilter=$totalData;

//Pesquisar
$sql ="SELECT * FROM produtos WHERE 1";
if(!empty($_POST['search']['value'])){
    $sql.=" AND (imagem_produto Like '".$_POST['search']['value']."%' ";
    $sql.=" OR nome_produto Like '".$_POST['search']['value']."%' ";
    $sql.=" OR preco_produto Like '".$_POST['search']['value']."%' ";
    $sql.=" OR quatidade_disponivel Like '".$_POST['search']['value']."%' )";
}

$statement = $conn->prepare($sql);
$query = $statement->execute();

$totalData = $statement->rowCount();
$totalFilter=$totalData;

//Ordenar
$sql.=" ORDER BY ".$col[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']."  LIMIT ".
$_POST['start']."  ,".$_POST['length']."  ";

$statement = $conn->prepare($sql);
$statement->execute();

$dados = $statement->fetchAll();

// Armazenamendo do query array em data

$data=array();

foreach($dados as $row){
    $subdata    = array();
    $subdata[]  = '<img src="client/views/assets/img/images/'.$row[5].'" height="35" width="35"/>';
    $subdata[]  = $row[2];
    $subdata[]  = $row[3];
    $subdata[]  = $row[4];
    $subdata[]  = '<a href="#" class="modal_system_open" name="btn_nm_edit-|-'.$row[0].' ">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="modal_system_open" name="btn_nm_remove-|-'.$row[0].' ">
                        <i class="far fa-window-close"></i>
                    </a>';
    $data[]     = $subdata;
}

$json_data=array(
    "draw"              =>  intval($_POST['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
