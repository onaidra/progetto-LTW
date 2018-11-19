// toggle password visibility
$("#eye").on("click", function() {
  $(this).toggleClass("glyphicon-eye-close");
    var type = $("#password").attr("type");
  if (type == "text"){ 
    $("#password").prop('type','password');}
  else{ 
    $("#password").prop('type','text'); }
  });

  
