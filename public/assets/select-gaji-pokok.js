$(document).ready(function() {

    // Tampilkan kota saat provinsi dipilih
    $('.select-golongan').on('change', function () { 
       var token = $('meta[name="csrf-token"]').attr('content');
       const id_detail = jQuery(this).val();
       console.log('id detail '+id_detail);

           $.ajax({
               type: 'POST',
               headers: {
                   'X-CSRF-TOKEN': token
               },
               url: '/data-golongan',
               data: {id : id_detail},
               dataType: 'json',
               success: function(data){
                   $('.GAJI-POKOK').empty();
                   $.each(data, function (id, nama) {
                       $('.GAJI-POKOK').append(new Option(nama, id));
                   });
               }
           });
   });
});