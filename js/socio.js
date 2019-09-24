
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
        $('#idcomunidadm').val(button.data('idcomunidad'));
        $('#nombreproductorm').val(button.data('nombreproductor'));
        $('#idsociom').val(button.data('idsocio'));
        $('#statusm').val(button.data('estatus'));
        $('#cim').val(button.data('ci'));
        $('#expedidom').val(button.data('expedido'));
        //$('#sexom').val('MASCULINO');
        //console.log(button.data('sexo'));
        if (button.data('sexo')=="MASCULINO"){
            $("#sexom1").attr('checked', 'checked');
        }else if (button.data('sexo')=="FEMENINO"){
            $("#sexom2").attr('checked', 'checked');
        }else{
            $("#sexom3").attr('checked', 'checked');
        }
        $('#regionalm').val(button.data('regional'));
        $('#codigoproductorm').val(button.data('codigoproductor'));
        //console.log(button.data('estatus'));
        //console.log(button.data('idcomunidad'));
        //console.log('asdfas');
    })