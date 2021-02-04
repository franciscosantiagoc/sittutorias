function listar_departamento() {
    $.ajax({
        url: '../controlador/selectRController.php',
        type: 'POST'
    }).done(function(resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";

            }
            $("#sel_departamento").html(cadena);
            var iddepartamento = $("#sel_departamento").val();
            listar_pronvincia(iddepartamento);
        } else {
            cadena += "<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_departamento").html(cadena);
        }
    })
}