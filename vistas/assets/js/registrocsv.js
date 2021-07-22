var C_Error = 0;
var oFileIn;
//Código JQuery
$(function() {
    oFileIn = document.getElementById("file_input_st");
    if (oFileIn.addEventListener) {
        oFileIn.addEventListener("change", filePicked, false);
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
            var N_Cont = [];
            $("#table_dat_es tr").remove(); 
            $.each(data, function(indexR, valueR) {
                if (cont != 0) {
                    var conc = 1; //contador de columnas
                    var headRow = "<tr>";
                    var sRow = "<td>" + cont + "</td>";
                    $.each(data[indexR], function(indexC, valueC) {
                        sRow = sRow + "<td>" + valueC + "</td>";
                        if (conc == 5) {
                            for (var i = 0; i < N_Cont.length; i++) {
                                if (N_Cont[i] == valueC) {
                                    headRow = "<tr class='error'>";
                                    contE += 1;
                                    break;
                                }
                            }
                            N_Cont.push(valueC);
                            /* console.log(cont+" N_control "+valueC); */
                        }
                        conc += 1;
                    });
                    sRow = headRow + " " + sRow + "</tr>";
                    $("#table_dat_es").append(sRow);
                }
                cont += 1;
            });
            C_Error = contE;
            const div = document.querySelector("#cont__infodat");
            div.innerHTML =
                "<span>Registros: " +
                (cont - 2) +
                "</span><span class='error'>Errores: " +
                C_Error +
                "</span>";
        });
    };

    // Llamar al JS Para empezar a leer el archivo .. Se podría retrasar esto si se desea
    reader.readAsBinaryString(oFile);
}

/* function doSearch() {
    const tableReg = document.getElementById("table_dat_es");
    const searchText = document.getElementById("searchTerm").value.toLowerCase();
    let total = 0;

    // Recorremos todas las filas con contenido de la tabla
    for (let i = 1; i < tableReg.rows.length; i++) {
        // Si el td tiene la clase "noSearch" no se busca en su cntenido
        if (tableReg.rows[i].classList.contains("noSearch")) {
            continue;
        }
        let found = false;
        const cellsOfRow = tableReg.rows[i].getElementsByTagName("td");
        // Recorremos todas las celdas
        for (let j = 0; j < cellsOfRow.length && !found; j++) {
            const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                found = true;
                total++;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = "";
        } else {
            // si no ha encontrado ninguna coincidencia, esconde la
            // fila de la tabla
            tableReg.rows[i].style.display = "none";
        }
    }

    // mostramos las coincidencias
    const lastTR = tableReg.rows[tableReg.rows.length - 1];
    const td = lastTR.querySelector("td");
    lastTR.classList.remove("hide", "red");
    if (searchText == "") {
        lastTR.classList.add("hide");
    } else if (total) {
        td.innerHTML =
            "Se ha encontrado " + total + " coincidencia" + (total > 1 ? "s" : "");
    } else {
        lastTR.classList.add("red");
        td.innerHTML = "No se han encontrado coincidencias";
    }
}
 */