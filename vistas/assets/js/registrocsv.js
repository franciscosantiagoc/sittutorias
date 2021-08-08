var C_Error = 0;
var oFileIn;

var dat_row = [];//inicializa array de contenido filas

$('#file_input_st').on('change', function(e){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
        if(ext == "xls" /*|| ext == "csv"  || ext == "xlsx" */){
            Swal.fire("Exitoso","Archivo cargado: ." + ext+"","success");
            filePicked(e);
        }else{
            $( this ).val('');
            Swal.fire("Advertencia","La extensión del archivo no esta permitida: ." + ext+"","error");
        }
    }
}); 

//Método que hace el proceso de importar excel a html
function filePicked(oEvent) {
    // Obtener el archivo del input
    var oFile = oEvent.target.files[0];
    var sFilename = oFile.name;
    // Crear un Archivo de Lectura HTML5
    var reader = new FileReader();

    // Leyendo los eventos cuando el archivo ha sido seleccionado
    reader.onload = function(e) {
        var data = e.target.result;
        var cfb = XLS.CFB.read(data, {
            type: "binary",
        });
        var wb = XLS.parse_xlscfb(cfb);
        // Iterando sobre cada sheet
        wb.SheetNames.forEach(function(sheetName) {
            // Obtener la fila actual como CSV
            var sCSV = XLS.utils.make_csv(wb.Sheets[sheetName]);
            var data = XLS.utils.sheet_to_json(wb.Sheets[sheetName], {
                header: 1,
            });
            var cont = 0; //contador filas
            var contE = 0; //Contador de errores
            dat_row = []; //array filas
            
           
            $.each(data, function(indexR, valueR) {
                if (cont != 0) {
                    var dat_col = []; //array columnas
                    //dat_col.push(cont);
                    $.each(data[indexR], function(indexC, valueC) {
                        dat_col.push(valueC);                        
                    }); 
                    dat_row.push(dat_col);//añadiendo columnas al array
                }
                cont += 1;
            });
            C_Error = contE;
            mostrardatosExcel();
            //div.style.overflow = "scroll";
        });

        
    };
    // Llamar al JS Para empezar a leer el archivo .. Se podría retrasar esto si se desea
    reader.readAsBinaryString(oFile);
}


function mostrardatosExcel(){
    C_Error=0 //reseteando contador de errores
    
    var table = $('#table_dat').DataTable();
    table.row().clear();
    for(let i=0; i<dat_row.length; i++){
        let rowerror=false;
        
         for(let j=0;j<dat_row.length; j++){//recorriendo en busca de duplicados
            if(dat_row[i][4]==dat_row[j][4] && j!=i){
                C_Error=1
                rowerror=true;
                break;
            }               
        } 

        let aux=dat_row[i];
        let aux2=aux.concat(['<button onclick="deleteData('+i+')"><i class="fas fa-trash-alt"></i></button>']);
        //aux.push()
        var rowNode = table.row.add(aux2 ).draw().node();
        if(rowerror){
            $( rowNode ).find('td').addClass('error');
        }
        
    }
}
function deleteData(position){
    dat_row.splice(position, 1);
    Swal.fire("Exitoso","Elemento eliminado correctamente","success");
    mostrardatosExcel();
}


$("#btn-regis").click(function(event){
    event.preventDefault();
   
    if(C_Error!=0){
        Swal.fire("Advertencia","Se ha detectado un error en los datos","error");
    }else if(dat_row.length==0){
        Swal.fire("Advertencia","No ha cargado datos para registrar","error");
    }else{
        
        var sel_user = $('#Mselect_user').val();
        var sel_carAr = $('#MSel_CarrA').val();
        var sel_gen = $('#gen_regM').val();
        //alert(sel_user +'   ' + sel_carAr + '    '+sel_gen);

        var formData = new FormData();
        formData.append('dataexcel', JSON.stringify(dat_row));//array datos
        formData.append('datauser',sel_user);
        formData.append('dataCAR',sel_carAr);
        formData.append('datagen',sel_gen); /**/
        $.ajax({
            url: 'ajax/usuarioAjax.php',
            type: 'post',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (resp){
                Swal.fire(resp.Titulo,resp.Texto,resp.Tipo);
                //console.log('respuesta: '+resp.Texto);
            }
        });
    }
    
});