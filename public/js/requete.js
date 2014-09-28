(function ($) {
$(document).ready(function() {

modal();

$( '#recherche' ).on( 'keyup', function(){
            if ($('#recherche').val().length>1){
                  $.get( '/' + $( this ).val() ).done( function ( data ){
                        $( '#valret' ).html( data );
                        modal();
                  }).fail(function() { $('#valret' ).html( '.' );  } );
            }
        });

function modal() {
                  $("#mytableFi tbody tr, #mytable tbody tr").click(function() {
                    $.get( '/?table='+ $(this).attr('table') +'&id='+ $(this).attr('value') ).done( function ( data ){
                          $('#myModalTel').html (data);
                          $('#myModal').modal('show');
                    }).fail(function() { $('#valret' ).html( '.' );  } );
                  });
};

});
}(jQuery));

