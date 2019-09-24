
$('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
} );
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    $('#cantidadm').val(button.data('cantidad'));
    $('#idacopiom').val(button.data('idacopio'));
    $('#nombrem').html(button.data('nombre'));

    //$('#idsociom').val(button.data('idsocio'));
    //console.log(button.data('idcomunidad'));
    //console.log('asdfas');
})