//dataTables

$(document).ready(function(){
  $('.table').DataTable();
});
//dataTables

$(document).ready(function(){
  $('.select').niceSelect();
});

//ckeditor
$("#menu-toggle").click(function(e) {
  e.preventDefault();
$(".main-wrapper").toggleClass("toggled");

 
});


var ckeditor = document.getElementById("description");

CKEDITOR.replace(ckeditor,{
  languange:'en-gb'
  });

CKEDITOR.config.allowedContent = true;