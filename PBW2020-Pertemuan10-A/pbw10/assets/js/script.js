function avoidDecimal(){
   if(event.key==='.' || event.key===','){
      event.preventDefault();
   }
}
function confirmDelete(message){
   if (confirm(message)) {
      // statement
      document.getElementById("btnResetDaftar").value = 1;
   } else{
       document.getElementById("btnResetDaftar").value = 0;
   }
}
$(document).ready(function(){
   // Event ketika banyak_nilai ada perubahan
   let banyakNilai = 1;
   $(".input_banyakNilai").change(function(){
      //ambil nilai di dalam input_banyakNilai
      banyakNilai = $(this).val();
      if (banyakNilai<=0) {
         //set dengan 1
         $(this).val(1);
         banyakNilai = 1;
      }
      //set input hidden
      $("#banyak_nilai").val(banyakNilai);
     //kosongkan dulu div yang sudah ada isinya
     $(".form-nilai").empty();
      //append nilai sesuai banyak nilai
      for (var i = 0;i<banyakNilai;i++) {
         let id_input = "input_nilai_"+(i+1);
         let id_input_help = id_input+"_help";
         $(".form-nilai").append(
            '<div class="form-group" id="">'+
            '<label for="'+id_input+'"> Nilai '+(i+1)+' </label>'+
            ' <input type="number" class="form-control" id="'+id_input+'" name="'+id_input+'" value="" required="true" step="0.000001" aria-describedby="'+id_input_help+'">'+
            '<small id="input_nilai_1_help" class="form-text text-muted">Masukkan nilai desimal yang merupakan numerik karakter</small>'+
            '</div>' +
            '</div>'
            );
      }
   });
   $('#btn-clearinput').on("click",function(){
      $("#input_nama_mhs").val('');
      $("#input_nim_mhs").val('');
      for (var i = 0;i<banyakNilai;i++) {
         let id_input = "#input_nilai_"+(i+1);
         $(id_input).val('');
      }
   });
   
});