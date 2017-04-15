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
                    alert(response);
                });
            });
        }
    },
    init : function(){
        ofertas.events.init();
    }
};

ofertas.init();