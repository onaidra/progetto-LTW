$(document).ready(function(){
    $('#brand').change(function(){
        var brand_id=$(this).val();
        var user=$(this).find("option").attr("id");
        $.ajax({
          url:"../Dentro/funzione.php",
          method:"POST",
          data:{brand_id:brand_id,user:user},
          success:function(data){
            $('#show_product').html(data);
          }
        });
    });
  });
  