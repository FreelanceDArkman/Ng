$(document).ready(function(){




    $(".main").css("min-height", $(window).height());

    // alert(window.location.hash);
    var hash = window.location.hash;

    $("[data-toggle='tab']").on("click",function(){

	var hash = $(this).attr('href');
	hash = hash.replace("#" ," ");
	window.location.hash = hash
	});

    if(hash !=""){



    	hash = hash.replace("# ", "");

    $(".tab-content").children("div").removeClass("active");
    $("#" + hash).addClass("active");

    $(".tabbable ul li").removeClass("active");

   $("a[href='#"+hash+"']").parent("li").addClass("active");
    }
    

    // $("[data-toggle='tab']").click(function(e){
    // 	e.preventDefault()
    // 	var hash = $(this).attr('href');
    // 	window.location.hash = hash;

    	

    // });

  });

  function CheckFileUPload(id){
  	var ret = true;
  	if(document.getElementById(id).value == "") {
  		ret = false;
  		
   // you have a file
}		
 if(ret){
 	return true
 }else{	
 alert("Plese select file before");
 return false;
  }
}