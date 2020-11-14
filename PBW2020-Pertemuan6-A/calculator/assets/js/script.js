function anticipateWithZero(message){
   let new_bil2 = parseInt(prompt(message));
   if (isNaN(new_bil2)) {
      return null;
   } else {
      document.getElementById("bil2").value = new_bil2;
      return new_bil2;
   }
   
}
function onClickButton (buttonFor) {
   // cek jika input ada isi atau tidak
   let bil1 = document.getElementById("bil1").value;
   let bil2 = document.getElementById("bil2").value;
   if (bil1=="" || bil2 == "") {
      alert("Masukkan bilangan 1 dan bilangan 2!")
   } else {
      bil1 = parseInt(bil1);
      bil2 = parseInt(bil2)
      switch (buttonFor) {
         case "tambah":
         return (bil1+bil2);
         break;
         case "kurang":
         return (bil1-bil2);
         break;
         case "bagi":
         if (bil2==0) {
            let new_bil2 = anticipateWithZero("Error Pembagian dengan 0\nMasukkan bil2 yang baru :");
            if (new_bil2!=null) {
               return (bil1/new_bil2);
            } else {
               return new_bil2;
            }
         } else {
            return (bil1/bil2);
         }
         break;
         case "kali":
         return (bil1*bil2);
         break;
         case "mod":
         if (bil2==0) {
          let new_bil2 = anticipateWithZero("Error Modulo dengan 0\nMasukkan bil2 yang baru :");
            if (new_bil2!=null) {
               return (bil1%new_bil2);
            } else {
               return new_bil2;
            }
         } else {
            return (bil1%bil2);
         }
         break;
         default:
         alert("Non define button!");
         break;
      }
   }
}
function clearAllInputValue () {
   document.getElementById("bil1").value = "";
   document.getElementById("bil2").value = "";
   document.getElementById("hasil_perhitungan").value = "";
}
function main(attributes){
   let value_button = attributes.value;
   let hasil = onClickButton(value_button);
   if (hasil!=null) {
      document.getElementById("hasil_perhitungan").value = hasil;
   } 
}

document.getElementById("btn-tambah").addEventListener("click",function(){
  main(this);
});
document.getElementById("btn-kurang").addEventListener("click",function(){
  main(this);
});
document.getElementById("btn-bagi").addEventListener("click",function(){
  main(this);
});
document.getElementById("btn-kali").addEventListener("click",function(){
   main(this);
});
document.getElementById("btn-mod").addEventListener("click",function(){
  main(this);
});
// Event untuk button reset
document.getElementById("btn-reset").addEventListener("click",function(){
   clearAllInputValue();
});