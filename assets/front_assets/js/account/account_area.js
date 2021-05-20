

  // $("#show").click(function(){
  $("#eye").click(function(){
    $("#current").removeAttr("type");
    $("#current").attr("type","text");
    $("#eye").css("display","none");
    $("#close").css("display","inherit");
  });

  $("#close").click(function(){
    $("#current").removeAttr("type");
    $("#current").attr("type","password");
      $(this).css("display","none");
      $("#eye").css("display","inherit");
  });
