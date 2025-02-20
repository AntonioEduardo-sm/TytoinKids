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
                $.get('api/controllers/Produtos.php', dados, function(retorno) {
                    var objProdutos = jQuery.parseJSON(retorno);

                    if (objProdutos.type == "success") {
                        var produto             = objProdutos.data.produto;
                        var personagem          = objProdutos.data.personagem;
                        var tamanhos            = objProdutos.data.tamanhos;
                        var personagens_disp    = objProdutos.data.personagens_disponiveis;
                        var tamanhos_disp       = objProdutos.data.tamanhos_disponiveis;

                        id_produto              = produto[0].id_produto;
                        nome_produto            = produto[0].nome_produto;
                        preco_produto           = produto[0].preco_produto;
                        qtd_produto             = produto[0].quatidade_disponivel;
                        img_produto             = produto[0].imagem_produto;
                        id_categoria_produto    = produto[0].id_categoria;
                        categoria_produto       = produto[0].nome_categoria;
                        id_personagem_produto   = personagem[0].id_personagem;
                        personagem_produto      = personagem[0].personagem;
                        id_tamanho_produto      = tamanhos[0].id_tamanho;
                        tamanho_produto         = tamanhos[0].tamanho;
                        qtd_tam_produto         = tamanhos[0].quatidade_disponivel;  

                        if (produto && personagem && tamanhos) {
                            
                            var dados = {
                                listar  : true,
                            }

                            $.post('api/controllers/Categorias.php', dados, function(retorno) {
                                var objCategoria = jQuery.parseJSON(retorno);

                                if (objCategoria.type == "success") {
                                    var categorias_options = "";

                                    (objCategoria.data).forEach( (elemento) => {
                                        if (elemento.id_categoria != id_categoria_produto) {
                                            categorias_options += `<option value="${elemento.id_categoria}">${elemento.nome_categoria}</option>`;
                                        }
                                    });

                                    var personagens_options = "";

                                    (personagens_disp).forEach( (elemento) => {
                                        if (elemento.id_personagem != id_personagem_produto) {
                                            personagens_options += `<option value="${elemento.id_personagem}">${elemento.personagem}</option>`;
                                        }
                                    });

                                    var tamanhos_options = "";

                                    (tamanhos_disp).forEach( (elemento, indice) => {
                                        if (indice != 0 && indice % 1 == 0) {
                                            tamanhos_options +=`
                                                <hr>
                                            `;
                                        }

                                        if (elemento.id_tamanho != id_tamanho_produto) {
                                            tamanhos_options +=`
                                                <div class='row mt-3'>
                                                    <div class="col-lg-3">
                                                        <h4 class="mt-3 pl-5">${elemento.tamanho} : </h4>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="text" placeholder="Quantidade disponível*" id="btn_id_qtd_tam_${elemento.tamanho}">
                                                    </div>
                                                </div>
                                            `;
                                        }

                                        if (elemento.id_tamanho == id_tamanho_produto) {
                                            tamanhos_options +=`
                                                <div class='row mt-3'>
                                                    <div class="col-lg-3">
                                                        <h4 class="mt-3 pl-5">${elemento.tamanho} : </h4>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="text" placeholder="Quantidade disponível*" id="btn_id_qtd_tam_${elemento.tamanho}" value="${qtd_tam_produto}">
                                                    </div>
                                                </div>
                                            `;
                                        }
                                        
                                    });

                                    $(".conteudo_modal_lg").html('');

                                    var conteudoModal = `
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
                                                                        <option selected value="${id_categoria_produto}">${categoria_produto}</option>
                                                                        ${categorias_options}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-lg-8">
                                                                    <input type="text" placeholder="id" id="id_produto" value="${id_produto}" hidden disabled>
                                                                    <input type="text" placeholder="Nome do produto*" id="id_nome" value="${nome_produto}" required>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <input type="text" placeholder="Preço por unidade*" id="id_preco" value="${preco_produto}" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-lg">
                                                                    <div class="row">
                                                                        <div class="col-lg text-center">
                                                                            <img class="mt-3 mb-3" src="client/views/assets/img/images/${img_produto}" alt="${img_produto}" style="width: 100px; height: 100px;">
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
                                                                <div class="col-lg-4">
                                                                    <div class="row mt-2">
                                                                        <div class="col-lg">
                                                                            <div class="col-lg mt-1">
                                                                                <h6 class="">Selecione os personagens:</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg">
                                                                        <select class="mt-3" name="nm_personagem" id="id_personagem">
                                                                            <option selected value="${id_personagem_produto}">${personagem_produto}</option>
                                                                            ${personagens_options}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <div class="row mt-2">
                                                                        <div class="col-lg">
                                                                            <div class="col-lg mt-1">
                                                                                <h6 class="">Selecione os tamanhos:</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col mt-3 content-tamanhos">
                                                                                ${tamanhos_options}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
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
                            });
                        }
                    } else if (objProdutos.type != "success") {
                        exibirModal(objProdutos.data, false, true);
                    }
                });
            }else if (btn_clicked === "btn_nm_remove") {
                $('#id_opc_delete').val(identificador);
                $('.modal_system_delete').modal('show');
            }
        }
    });
    
    $(document).on('click', '#id_editar_produto', function() {
        var id_value = ($(this).attr('name')).split("-|-");
        
        if(($('#id_imageUpload')[0].files).length != 0) {
            var data = new FormData();
            var prod_imagens = undefined;

            $.each($("#id_imageUpload")[0].files, function(i, file) {
                data.append('nm_cadastro_imagens[]', file);
            });

            $.ajax({
                url: 'api/controllers/Produtos.php',
                async: false,
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) 
                {
                    $("#id_mensagem_image").html(data);

                    var resultado = data.split('-|-');
    
                    if (resultado[0] != false) {
                        prod_imagens = (jQuery.parseJSON(data));
                    }else {
                        exibirModalAlerta(resultado[1],false,"alert-danger");
                    }
                }
            });
        }else{
            prod_imagens = "productind.jpg";
        }
        
        setTimeout(function() {
            if(typeof prod_imagens != 'undefined'){

                var prod_categ  = $("#id_categ").val();
                var prod_nome  = $("#id_nome").val();
                var prod_preco  = $("#id_preco").val();
                var id_produto  = $("#id_produto").val();
                var id_personagem  = $("#id_personagem").val();

                var tamanhos = [
                    {
                        id_tamanho      : "1",
                        qtd_tamanho     : $('#btn_id_qtd_tam_1').val()  > 0 ? $('#btn_id_qtd_tam_1').val() : 0
                    },
                    {
                        id_tamanho      : "2",
                        qtd_tamanho     : $('#btn_id_qtd_tam_2').val()  > 0 ? $('#btn_id_qtd_tam_2').val() : 0
                    },
                    {
                        id_tamanho      : "3",
                        qtd_tamanho     : $('#btn_id_qtd_tam_4').val()  > 0 ? $('#btn_id_qtd_tam_4').val() : 0
                    },
                    {
                        id_tamanho      : "4",
                        qtd_tamanho     : $('#btn_id_qtd_tam_6').val()  > 0 ? $('#btn_id_qtd_tam_6').val() : 0
                    },
                    {
                        id_tamanho      : "5",
                        qtd_tamanho     : $('#btn_id_qtd_tam_8').val()  > 0 ? $('#btn_id_qtd_tam_8').val() : 0
                    },
                    {
                        id_tamanho      : "6",
                        qtd_tamanho     : $('#btn_id_qtd_tam_10').val()  > 0 ? $('#btn_id_qtd_tam_10').val() : 0
                    }
                ];

                var dados = {
                    btn_editar_produto : true,
                    prod_categ,
                    prod_nome,
                    prod_preco,
                    prod_imagens : prod_imagens,
                    id_produto,
                    id_personagem,
                    tamanhos
                }

                $.post('api/controllers/Produtos.php', dados, function(retorno) {
                    console.log(retorno);
                    var tipo = retorno.indexOf("alert_notification_error");
                    retorno = retorno.split("-|-");
                    
                    if (tipo === -1) {
                        exibirModalAlerta(retorno[0], true, "alert-success");
                    } else if (tipo > -1) {
                        exibirModalAlerta(retorno[0], false, retorno[1]);
                    }
                });
            }
        }, 100);
    });
    
    $(document).on('click', '#id_opc_delete', function() {
        identificador = ($(this).val());
        
        if (identificador) {
            var dados = {
                btn_apagar   : true,
                id_produto   : identificador
            }
    
            $.post('api/controllers/Produtos.php', dados, function(retorno) {
                var tipo = retorno.indexOf("alert_notification_error");
                retorno = retorno.split("-|-");
                
                if($('.modal_system_delete').modal('hide')){
                    if (tipo === -1) {
                        exibirModal(retorno[0], true, true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0], false, true);
                    }
                }
            });
        }
    });
});