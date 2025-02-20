/* CONTENT CART/CARRINHO */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        var tipo = $(this).val();
        
        var cupom = $(".btn_nm_cupom").val();
        if (cupom !== "" && cupom !== null && cupom % 1 === 0) {
            $('.conteudo').html('');
        
            var cardHeader = `<div class="card">
                                <div class="card-header">
                                    <div class="form-group row mt-3">
                                        <div class="col">
                                            <h4>Cupom</h4>
                                        </div>
                                        <div class="col mr-3">
                                            <h4><a><i class="fas fa-window-close close-btn float-right" data-dismiss="modal"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row mt-2 ml-3 mr-3">`;
            
            var conteudo            = `<div class="col text-center">
                                            <h4>Voçê tem certeza da sua escolha?</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="submit" class="alter_status" name="${tipo}" value="Confirmar">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="submit" class="alter_status" name="btn_off" value="Cancelar">
                                                </div>
                                            </div>
                                        </div>`;

            var cardBody = `
                                    </div>
                                </div>
                            </div>`;

            var fullCard = cardHeader+conteudo+cardBody;

            $(".conteudo").append(fullCard);

            $('.modal_system_open_class').modal('show')
        }else{
            alert("Preencha o cupom");
        }
        
    });

    $(document).on('click', '.modal_sistem_close', function() {
        $('.modal_system_open_class').modal('hide')
    });

    $(document).on('click', '.delete_item_cart', function() {
        var dados = {
            btn_unset       : true,
            linha           : $(this).attr('data-filter')
        }
        
        $.get('api/controllers/Encomendas.php', dados, function(retorna) {
            var tipo = retorna.indexOf("alert_notification_error");
            retorno = retorna.split("-|-");

            if (tipo === -1) {
                exibirModal(retorno[0], true, true);
            } else if (tipo > -1) {
                exibirModal(retorno[0], false, true);
            }
        });
    });

});