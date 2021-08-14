function confirmar(valor){
    //ruta.concat(variable,")}}");
    swal({
      title: `¿Eliminar ítem?`,
      text: "Si elimina el ítem, no podrá volver a recuperarlo.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Item eliminado", {
          icon: "success",
        });
        document.getElementById("formulario"+valor).submit();
      } else {
        swal("Eliminación cancelada");
      }
    });
}