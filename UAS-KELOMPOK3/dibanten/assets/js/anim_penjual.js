$(document).ready(function(){
   // Etalase Page
   var state_ico_user = 0;
   $('.btn-action-etalase').click(function(){
      //get id btn
      var id_btn_action = "#"+$(this).attr('id');
      console.log(id_btn_action);
      $(id_btn_action).toggle(500);
      if (state_ico_user%2==0) {
         $('#top-ico-user').toggle(500);
         $('#down-ico-user').fadeOut("slow");
      }else{
         $('#top-ico-user').fadeOut("slow");
         $('#down-ico-user').toggle(500);
         
      }
      state_ico_user++;
   });
})