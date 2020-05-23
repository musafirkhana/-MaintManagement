
//Custom JS

      
$(function () {
    $("#pcm_table").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#item_table').DataTable({
       "responsive": true,
      "autoWidth": false,
    });
    $('#ac_docu_table').DataTable({
      "responsive": true,
     "autoWidth": false,
   });
   //ENtry Rect Table
   $('#entry_rect_table').DataTable({
    "responsive": true,
   "autoWidth": false,
 });
    $('#stock_table').DataTable({
      "responsive": true,
     "footerCallback": function ( row, data, start, end, display ) {
      var api = this.api(), data;

      // Remove the formatting to get integer data for summation
      var intVal = function ( i ) {
          return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                  i : 0;
      };
      total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                 // Total over this page
            pageTotal = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 3 ).footer() ).html(
            ''+pageTotal +''
        );
    }
  


   });
   $('#start_date').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  });
  $('#end_date').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  });

// Date Picker for Entries & Rectification From
  $('#date_of_entry').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  });

  $('#date_of_rect').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  }); 
  $('#flg_date').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd'
  });  
//

    $('#qty_received_date').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });

        $('#consumption_date').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });

        $('#radioFrom input:options').click(function() {
          if ($(this).val() === '2') {
            alert('sdsads');
          } else if ($(this).val() === '2') {
            myOtherFunction();
          } 
        });
  // Show Toast Alert
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    
       
        $('.toastrDefaultSuccess').click(function() {
          toastr.success('Successfully Submited')
        });
        
        $(document).ready(function () {
          bsCustomFileInput.init();
        });

  });

 


