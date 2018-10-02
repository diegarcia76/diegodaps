$(function(){
	Balance.initListado();

    $('.btn-print').click(function(){
        console.log('btn');
        var table = document.getElementById('tblBalance');

        var rowLength = table.rows.length;

        var output = '  DIEGO DAP\'S<br />'+
                     'Estilista unisex & barbería <br /><br />'+
                     'San Luis 2608 - 491-7396<br />'+
                     '---'+
                     '<br />'+
                     '<br />';

        for(var i=1; i<rowLength; i+=1){
          var row = table.rows[i];

          if(i < (rowLength-1)){
              var cellLength = row.cells.length;
              for(var y=0; y<cellLength; y+=1){
                var cell = row.cells[y];
                if(cell.innerText == 'Totales:'){
                    output += '---<br/>'
                }
                output += cell.innerText + ' - ';
              }
              output += '<br/><br/>';
          } else {
            output += '---<br/><br/>';
            output += 'Total: '+row.cells[1].innerText+'<br/>';
            output += 'Comisiones: '+row.cells[2].innerText+'<br/>';  
          }
        }

        $('#output-print').html(output);
        window.print();
    })
});