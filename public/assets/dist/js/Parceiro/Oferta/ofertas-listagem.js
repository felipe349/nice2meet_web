var ofertas = {
    functions: {
        mudarOfertaStatus : function(param, response){
            if (param.length == 0) {
                response(false);
            }
            $.ajax({
                method: 'PUT',
                url: '/apiInterna/mudarStatusOferta',
                data: {
                    '_token'                : param._token,
                    'id_oferta'             : param.id_oferta,
                    'ic_status_oferta'      : param.ic_status_oferta
                }, 
                response : function(retorno){
                    response(retorno);
                },
                error   : function(retorno){
                    response(retorno);
                }
            });
        },
        deleteOferta : function(param, response){
            if (param.length == 0) {
                response(false);
            }
            $.ajax({
                method: 'DELETE',
                url: '/apiInterna/deletarOferta',
                data: {
                    '_token'                : param._token,
                    'id_oferta'             : param.id_oferta
                }, 
                success : function(retorno){
                    response(true);
                },
                error   : function(retorno){
                    response(false);
                }
            });
        }
    },
    events : {
        init : function(){
            $('input[name="ic_status_oferta"]').change(function(){
                var $this = $(this);
                
                var oferta = {
                    _token              :   $("input[name='_token']").val(),
                    id_oferta           :   $this.parent().parent().parent().parent().attr('data-id'),
                    ic_status_oferta    :   $this.prop('checked')
                };
                
                ofertas.functions.mudarOfertaStatus(oferta, function(response){
                    var elemento = $(".checkbox-switch__label").attr("for");
                });
            });
            
            $('[data-name="deletar-oferta"]').click(function(button){
                button.preventDefault();
                var $this = $(this);
                var oferta = {
                    _token              :   $("input[name='_token']").val(),
                    id_oferta           :   $this.parent().parent().parent().attr('data-id')
                };
                
                ofertas.functions.deleteOferta(oferta, function(response){
                    if (response) {
                        $this.parent().parent().parent().remove();
                    }
                });
            });
        }
    },
    init : function(){
        ofertas.events.init();
    }
};

ofertas.init();