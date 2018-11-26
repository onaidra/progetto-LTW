
// toggle password visibility
$("#oye").on("click", function() {
    $(this).toggleClass("glyphicon-eye-close");
      var type = $("#password2").attr("type");
    if (type == "text"){ 
      $("#password2").prop('type','password');}
    else{ 
      $("#password2").prop('type','text'); }
    });