function confirmBeforeDelete (id) {
   var msg = "Delete data mahasiswa berikut? Anda tidak bisa mengembalikannya!";
   var url = "delete.php?id="+id;
   if (confirm(msg)) {
      location.href=url;
   }
}