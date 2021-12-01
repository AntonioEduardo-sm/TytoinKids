/* INSERIR PRODUTO */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-|-");

        btn_clicked     = value[0];
        identificador   = value[1];

        if (identificador) {
            if (btn_clicked === "btn_nm_edit") {
                var dados = {
                    btn_listar_produto  : true,
                    id_produto          : identificador
                }
                $.get('commandscontrol/Produtos.php', dados, function(retorno) {
                    var objProdutos = jQuery.parseJSON(retorno);

                    if (objProdutos.type == "success") {
                        var produto = objProdutos.data.produto;
                        var cores = objProdutos.data.cores;
                        var tamanhos = objProdutos.data.tamanhos;

                        id_produto          = produto[0].id_produto;
                        nome_produto        = produto[0].nome_produto;
                        preco_produto       = produto[0].preco_produto;
                        qtd_produto         = produto[0].quatidade_disponivel;
                        img_produto         = produto[0].imagem_produto;
                        categoria_produto   = produto[0].nome_categoria;

                        if (produto && cores && tamanhos) {
                            var conteudoModal;
                            $(".conteudo_modal_lg").html('');

                            conteudoModal = `
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                            <h5>
                                            <button class="btn btn-link" type="button">
                                                Editar Produto
                                            </button>
                                            </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="ml-3 mr-3">
                                                <div class="col pl">
                                                    <div class="row">
                                                        <div class="col-lg">
                                                            <select name="nm_categ" id="id_categ">
                                                                <option value="0" selected style="display: none;">`+categoria_produto+`</option>
                                                                <option value="0">`+categoria_produto+`</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg">
                                                            <input type="text" placeholder="Nome do produto*" id="id_nome" value="`+nome_produto+`" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Quantidade disponível*" id="id_qtd" value="`+qtd_produto+`" required>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Preço por unidade*" id="id_preco" value="`+preco_produto+`" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg">
                                                            <div class="row">
                                                                <div class="col-lg text-center">
                                                                    <img class="mt-3 mb-3" src="commandsview/assets/img/images/${img_produto}" alt="${img_produto}" style="width: 100px; height: 100px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg">
                                                            <input type="file" placeholder="Imagem do produto*" id="id_imageUpload" name="nm_imageUpload" accept=".png">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg-7">
                                                            <div class="row mt-2">
                                                                <div class="col-lg">
                                                                    <div class="col-lg mt-1">
                                                                        <h6 class="">Selecione os personagens:</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mt-3">
                                                                <div class="form-check row">
                                                                    <input class="form-check-input" type="checkbox" name="btn_nm_cores" value="vermelho" id="btn_id_check_cor_vermelho" `+(cores[0].cor.includes("Vermelho") ? 'checked' : '')+`>
                                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Vermelho</label>
                                                                </div>
                                                                <div class="form-check row">
                                                                    <input class="form-check-input" type="checkbox" name="btn_nm_cores" value="verde" id="btn_id_check_cor_verde" `+(cores[0].cor.includes("Verde") ? 'checked' : '')+`>
                                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Verde</label>
                                                                </div>
                                                                <div class="form-check row">
                                                                    <input class="form-check-input" type="checkbox" name="btn_nm_cores" value="azul" id="btn_id_check_cor_azul" `+(cores[0].cor.includes("Azul") ? 'checked' : '')+`>
                                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Azul</label>
                                                                </div>
                                                                <div class="form-check row">
                                                                    <input class="form-check-input" type="checkbox" name="btn_nm_cores" value="amarelo" id="btn_id_check_cor_amarelo" `+(cores[0].cor.includes("Amarelo") ? 'checked' : '')+`>
                                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Amarelo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="row mt-2">
                                                                <div class="col-lg">
                                                                    <div class="col-lg mt-1">
                                                                        <h6 class="">Selecione os tamanhos:</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col-xl-6 mt-2">
                                                                        <div class="form-check row">
                                                                            <input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="1" id="btn_id_check_tam_1" `+(tamanhos[0].tamanho.includes("1") ? 'checked' : '')+`>
                                                                            <label class="form-check-label" for="flexSwitchCheckDefault">1</label>
                                                                        </div>
                                                                        <div class="form-check row">
                                                                            <input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="2" id="btn_id_check_tam_2" `+(tamanhos[0].tamanho.includes("2") ? 'checked' : '')+`>
                                                                            <label class="form-check-label" for="flexSwitchCheckDefault">2</label>
                                                                        </div>
                                                                        <div class="form-check row">
                                                                            <input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="4" id="btn_id_check_tam_4" `+(tamanhos[0].tamanho.includes("4") ? 'checked' : '')+`>
                                                                            <label class="form-check-label" for="flexSwitchCheckDefault">4</label>
                                                                        </div>
                                                                        <div class="form-check row">
                                                                            <input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="6" id="btn_id_check_tam_6" `+(tamanhos[0].tamanho.includes("6") ? 'checked' : '')+`>
                                                                            <label class="form-check-label" for="flexSwitchCheckDefault">6</label>
                                                                        </div>
                                                                        <div class="form-check row">
                                                                            <input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="8" id="btn_id_check_tam_8" `+(tamanhos[0].tamanho.includes("8") ? 'checked' : '')+`>
                                                                            <label class="form-check-label" for="flexSwitchCheckDefault">8</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg">
                                                            <div class="col-lg mt-1">
                                                                <h6 class="">Itens com * são obrigatórios</h6>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                    <div class="row mt-3">
                                                        <div class="col-lg conteudo_alerta">
                                                        </div>
                                                    </div>										
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="submit" name="cadastrar" value="Editar" id="id_editar_produto">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="submit" name="cancelar" value="Cancelar" id="id_cancel" data-dismiss="modal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

                            $(".conteudo_modal_lg").html(conteudoModal);
                            
                            if ($(".modal_system_open_class").modal("hide")) {
                                $(".modal_system_open_class").modal("show");
                            }
                        }
                    } else if (objProdutos.type != "success") {
                        exibirModal(objProdutos.data, false);
                    }
                });
            }else if (btn_clicked === "btn_nm_remove") {
                $('#id_opc_delete').val(identificador);
                $('.modal_system_delete').modal('show');
            }
        }
    });
    
    $(document).on('click', '#id_editar_produto', function() {
        value = ($(this).attr('name')).split("-|-");
    });
    
    $(document).on('click', '#id_opc_delete', function() {
        identificador = ($(this).val());
        
        if (identificador) {
            var dados = {
                btn_apagar   : true,
                id_produto   : identificador
            }
    
            $.post('commandscontrol/Produtos.php', dados, function(retorno) {
                var tipo = retorno.indexOf("alert_notification_error");
                retorno = retorno.split("-|-");
                
                if($('.modal_system_delete').modal('hide')){
                    if (tipo === -1) {
                        exibirModal(retorno[0],true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0],false);
                    }
                }
            });
        }
    });
});