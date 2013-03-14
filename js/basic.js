$(document).ready(function()
{
  //  $(window).resize(function() {
  //   var bodyheight = $(document).height();
  //   // alert("ej");
  //   // $("#content").css({'margin-top':'','bottom':'4px'});

  //   $(this).height(bodyheight*0.5);
  // });

/****************
 *CONSTANTS START
*****************/

var AJAX = "/projects/hill/ajax/";


function AJAX_HANDLE(){};

AJAX_HANDLE.prototype=
{
	ajax_serialize : function()
		{
		  var form_data = $(this).parent().serialize();
		 
			$.post(AJAX+$(this).attr("name"),
			{
				data : form_data
			},
				function(data)
				{
				
					var obj = jQuery.parseJSON(data);
					
					if(obj.success)
					{
						//relocate user to the page with information 
					
					

					}
					else
					{
						return false;
					}
				});
		 return false;
	   },

	   login : function(){
	   	var form_data = $(this).parent().serialize();
		 
			$.post(AJAX+$(this).attr("name"),
			{
				data : form_data
			},
				function(data)
				{
					
					var obj = jQuery.parseJSON(data);
					
					if(obj.success)
					{

						//relocate user to the page with information 
						
						 
						

					}
					else
					{
						window.location.reload();
					}
				});
		 return false;

	   }
	};

/**
 	*Adding new cliets to newsletter
 	*@author Marko Kovacevic
 	*/

 	$("#add_mail").click(function()
 	{
 		var mail  = $("#email_news").val();
 		var name  = $("#name_news").val();
 		var title = $("#titel_news").val();

 		$.post(AJAX+$(this).attr("id"),
 		{
 			mail  : mail,
 			name  : name,
 			title : title
 		},
 		function(data)
 		{
 			var obj = jQuery.parseJSON(data);

 			if(obj.success)
 			{
 				console.log("ispisi podatke");
 			}
 			else
 			{
 				console.log("Error");
 			}
 		});
 		return false;
 	});


 	/*
	*Sends data from conntact form to app client
	*@param Titel (string)
	*@param Name
	*@param Email
	*@param Personenanzahl( string ) *translation ( number of people )
	*@param Specielle Wunsche ( string ) *translation (special wishes)
	*@param Telefon ( string )
	*@param Uhrzeit ( string ) *translation ( time of day )
	*@param Datum   ( char   ) 
	*@param Raucher ( string ) *translation ( smoking? )
	*@param 
	
*/

 
 	$("#send_kon").click(function()
 	{
 		// var titel   = $("#titel_kom").val();
 		// var name    = $("#name_kon").val();
 		// var email   = $("#email_kon").val();
 		// var persone = $("#persone_kon").val(); 
 		// var wunsche = $("#wunsche_kon").val();
 		// var telefon = $("#telefon_kon").val*()

		  var form_data = $(this).parent().serialize();

		 
			$.post(AJAX+$(this).attr("name"),
			{
				data : form_data
			},
				function(data)
				{
					alert(data);
					// var obj = jQuery.parseJSON(data);
					
					// if(obj.success)
					// {
					// 	alert(obj.success);
					// }
					// else
					// {
					// 	return false;
					// }
				});
		 return false;
	   
 	});

$("#add_comment").click(function()
{
     var titel   = $("#titel_g").val();
     var name    = $("#name_g").val();
     var email   = $("#email_g").val();
     var comment = $("#comment_g").val();
     $.post(AJAX+$(this).attr("id"),
     {
      titel   : titel,
      name    : name,
      email   : email,
      comment : comment
     },
     function(data)
     {
        var obj = jQuery.parseJSON(data);

        if(obj.success)
        {
          alert("Comment was added");
        }
        else
        {
          console.log("Error");
        }
     });
  return false;
});

	var user = new AJAX_HANDLE();

$('#blounge').click(function(){
 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  });  
	$('.speisen').hide();
	$('.kontakt').hide();
	$('.getr').hide();
	$('.neues').hide();
	$('.blounge').show("slow");
	$('.partner').hide();
     $("#back_1").fadeIn("slow");
     $("#back_2").hide();
     $("#back_3").hide();
      $("#back_4").hide();
      $("#back_5").hide();
     $("#back_6").hide();
     $("#back_7").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $(".newsletter").hide();
     $('.guestbook').hide();
     $(".impressum").hide();
     $(".dass_catering").hide();
     $(".menegerie").hide();
      $(this).addClass("active");
     
  }else{
    return false;

   }

    return false;
  });

$('#dass_hill').click(function(){

  if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
    $('.speisen').hide();
    $('.kontakt').hide();
    $('.getr').hide();
    $('.neues').hide();
    $('.dass_hill').show("slow");
    $('.partner').hide();
     $("#back_1").fadeIn("slow");
     $("#back_2").hide();
     $("#back_3").hide();
      $("#back_4").hide();
      $("#back_5").hide();
     $("#back_6").hide();
     $("#back_7").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $(".newsletter").hide();
     $('.guestbook').hide();
     $(".impressum").hide();
     $(".dass_catering").hide();
     $(".menegerie").hide();
     $(this).addClass("active");
     
  }else{
    return false;

   }
   
    return false;

  });

$('#dass_catering').click(function(){
	 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.speisen').hide();
	$('.kontakt').hide();
	$('.getr').hide();
	$('.neues').hide();
	$('.dass_catering').show("slow");
	$('.partner').hide();
  $("#back_1").fadeIn("slow");
  $("#back_2").hide();
  $("#back_3").hide();
  $("#back_4").hide();
  $("#back_5").hide();
  $("#back_6").hide();
  $("#back_7").hide();
  $("#back_8").hide();
  $("#back_9").hide();
  $(".newsletter").hide();
  $('.guestbook').hide();
  $(".impressum").hide();
  $('.location').hide();
  $('.philosophie').hide();
  $('.refer').hide();
  $(".menegerie").hide();
  $(this).addClass("active");
   
  }else{
    return false;

   }
   return false;   
  });


$('#speisen').click(function(){
  
 
if ($(this).attr("class")!="active") {
  $('.active').removeClass('active');
	 $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.getr').hide();
	$('.dass_hill').hide();
	$('.blounge').hide();
	$('.kontakt').hide();
  $('.neues').hide();
	$('.partner').hide();
	$('.speisen').show("slow");
     $("#back_2").fadeIn("slow");
     $("#back_1").hide();
     $("#back_3").hide();
      $("#back_4").hide();
      $("#back_5").hide();
     $("#back_6").hide();
     $("#back_7").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $(".newsletter").hide();
     $('.guestbook').hide();
     $(".impressum").hide();
     $(".menegerie").hide();
     $(this).addClass("active");
    

}else{
  return false;
}
return false;
  });

$('#getranke').on('click',function(){
   if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
   $('.blounge').hide();
  $('.kontakt').hide();
  $('.partner').hide();
  $('.speisen').hide();
  $('.neues').hide();
  $('.getr').show('slow');
  $('#back_3').fadeIn('slow');
  $("#back_2").hide();
   $("#back_1").hide();
   $("#back_4").hide();
   $("#back_5").hide();
   $("#back_6").hide();
   $("#back_7").hide();
   $("#back_8").hide();
  $("#back_9").hide();
   $(".newsletter").hide();
   $('.dass_hill').hide();
   $('.guestbook').hide();
   $(".impressum").hide();
   $(".menegerie").hide();
    $(this).addClass("active");
     
  }else{
    return false;

   }
    return false;

  });

$('#neues').click(function(){
	 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
  $('.blounge').hide();
  $('.kontakt').hide();
  $('.partner').hide();
  $('.speisen').hide();
	$('.getr').hide();
	$('.neues').show("slow");
     $("#back_4").fadeIn("slow");
     $("#back_2").hide();
     $("#back_1").hide();
     $("#back_3").hide();
     $("#back_5").hide();
     $("#back_6").hide();
     $("#back_7").hide();
     $("#back_8").hide();
    $("#back_9").hide();
     $(".newsletter").hide();
     $('.dass_hill').hide();
     $('.guestbook').hide();
     $(".impressum").hide();
     $(".menegerie").hide();
      $(this).addClass("active");
     
  }else{
    return false;

   }
    return false;

  });
$('#newsletter').click(function(){
 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  });  	
	$('.kontakt').hide();
	$('.newsletter').show('slow');
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
	$('.neues').hide();
	$('.partner').hide();
     $("#back_5").fadeIn("slow");
     $("#back_2").hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_6").hide();
     $("#back_7").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $('.dass_hill').hide();
     $('.guestbook').hide();
      $(".impressum").hide();
      $(".menegerie").hide();
       $(this).addClass("active");
     
  }else{
    return false;

   }
    return false;
  });
$('#kontakt').click(function(){
	 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  });  
	$('.kontakt').show('slow');
	$('.newsletter').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
	$('.partner').hide();
     $("#back_6").fadeIn("slow");
     $("#back_2").hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
      $('.neues').hide();
     $("#back_5").hide();
     $("#back_7").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $('.dass_hill').hide();
     $('.guestbook').hide();
      $(".impressum").hide();
      $(".dass_catering").hide();
      $(".location").hide();
      $(".philosophie").hide();
      $(".refer").hide();
      $(".menegerie").hide();
       $(this).addClass("active");
     
  }else{
    return false;

   }
    return false;

  });
$('#partner').click(function(){
	
	 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.newsletter').hide();
	$('.kontakt').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
	$('.partner').show('slow');
     $("#back_7").fadeIn("slow");
     $("#back_2").hide();
     $('.neues').hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_6").hide();
     $("#back_5").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $('.dass_hill').hide();
     $('.guestbook').hide();
      $(".impressum").hide();
       $(".menegerie").hide();
        $(this).addClass("active");
     
  }else{
    return false;

   }
     return false;
  });
$('#philosophie').click(function(){
	
 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.newsletter').hide();
	$('.kontakt').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
	$('.philosophie').show('slow');
     $("#back_2").fadeIn("slow");
     $("#back_6").hide();
     $('.refer').hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_7").hide();
     $("#back_5").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $('.location').hide();
     $('.guestbook').hide();
     $(".impressum").hide();
      $(".dass_catering").hide();
       $(this).addClass("active");
     
  }else{
    return false;

   }
    return false;

  });
$('#location').click(function(){
	
	 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.newsletter').hide();
	$('.kontakt').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
	$('.location').show('slow');
     $("#back_7").fadeIn("slow");
     $("#back_2").hide();
     $('.refer').hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_6").hide();
     $("#back_5").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $('.philosophie').hide();
     $('.refer').hide();
     $('.guestbook').hide();
      $(".impressum").hide();
       $(".dass_catering").hide();
        $(this).addClass("active");
     
  }else{
    return false;

   }
    return false;

  });
$('#refer').click(function(){
	
 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.newsletter').hide();
	$('.kontakt').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
	$('.refer').show('slow');
     $("#back_5").fadeIn("slow");
     $("#back_2").hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_6").hide();
     $("#back_7").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $('.philosophie').hide();
     $('.location').hide();
     $('.guestbook').hide();
      $(".impressum").hide();
       $(".dass_catering").hide();
        $(this).addClass("active");
     
  }else{
    return false;

   }
    return false;
  });
$('#menegerie').click(function(){
	
	 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.newsletter').hide();
	$('.kontakt').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
	$('.menegerie').show('slow');
     $("#back_1").fadeIn("slow");
     $("#back_2").hide();
     $('.neues').hide();
     $("#back_7").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_6").hide();
     $("#back_5").hide();
     $("#back_8").hide();
     $("#back_9").hide();
     $('.dass_hill').hide();
     $('.guestbook').hide();
      $(".impressum").hide();
      $('.partner').hide();
       $(this).addClass("active");
     
  }else{
    return false;

   }

    return false;

  });
	
	$('#gestbuch').click(function(){
	
	 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.guestbook').show('slow');
	$('.newsletter').hide();
	$('.kontakt').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
     $("#back_8").fadeIn("slow");
     $("#back_2").hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_6").hide();
     $("#back_5").hide();
     $("#back_7").hide();
     $("#back_9").hide();
     $('.neues').hide();
     $('.dass_hill').hide();
     $('.partner').hide();
     $(".impressum").hide();
     $(".dass_catering").hide();
      $(".pat").hide();
      $(".menegerie").hide();
       $(this).addClass("active");
     
  }else{
    return false;

   }

    return false;
  });
	$('#impressum').click(function(){
 if ($(this).attr("class")!="active") {
    $('.active').removeClass('active');
    $('#content').animate({"bottom": "-=1000px"}, "slow");
  $('#content').animate({"bottom": "+=1000px"}, "slow", function(){
    $('#content').clearQueue();
  }); 
	$('.impressum').show('slow');
	$('.newsletter').hide();
	$('.kontakt').hide();
	$('.speisen').hide();
	$('.getr').hide();
	$('.blounge').hide();
     $("#back_9").fadeIn("slow");
     $("#back_2").hide();
     $("#back_1").hide();
     $("#back_4").hide();
      $("#back_3").hide();
     $("#back_6").hide();
     $("#back_5").hide();
     $("#back_8").hide();
     $("#back_7").hide();
     $('.neues').hide();
     $('.dass_hill').hide();
     $('.guestbook').hide();
     $('.partner').hide();
     $(".dass_catering").hide();
      $(".location").hide();
       $(".philosophie").hide();
        $(".refer").hide();
      $(".pat").hide();
      $(".menegerie").hide();
       $(this).addClass("active");
     
  }else{
    return false;

   }

    return false;
  });


});
