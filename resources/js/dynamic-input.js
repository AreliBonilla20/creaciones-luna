$(document).on('ready', main);
$(document).ready(function() {
    $("#add_item").click(function(){
        var counter = $("input[type='item']").length;

        $(this).before('<div class="form-group row"><label class="col-sm-2 col-form-label" for="item'+ counter +'">Servicio <span>(*)</span></label><input class="form-control col-sm-8" placeholder="Servicio del paquete" type="text" id="item'+ counter +'" name="item[]"/><button type="button" class="delete_item btn btn-delete ml-4"> <i class="bi bi-dash"></i> </button></div>');
    });
    $(document).on('click', '.delete_item', function(){
        $(this).parent().remove();
    });
    })