
$('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
    "pageLength": 20
} );
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    $('#cantidadm').val(button.data('cantidad'));
    $('#idestimacionm').val(button.data('idestimacion'));
    //console.log(button.data('estatus'));
    //console.log(button.data('idcomunidad'));
    //console.log('asdfas');
})