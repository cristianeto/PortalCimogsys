$(document).ready(function() {
var t = $('#example').DataTable( {
  "language": {
      "url": "/cimogsys/public/dataTables/DataTablesSpanish.json"

  },
  "order": [[0, "asc"]],
  "paging": false
} );

t.on( 'order.dt search.dt', function () {
    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();
} );
