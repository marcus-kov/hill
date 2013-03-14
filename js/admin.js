$(document).ready(function($) {
	
	var AJAX = "/projects/hill/ajax/";

    /***** DATA TABLES INITILAZATION ******/
	$('#news_data').dataTable(
		{
			"sPaginationType": "full_numbers",
			"bJQueryUI": true
		});
     /***************************************/


	//Reset fields 
	$(".reset").click(function()
		{
			$('input:text').val('');
			return false;
		});


    //Animation
    $("#add_news_show").live("click",function()
    {
        $(".admin_active").hide();
        $(".admin_active").removeClass('admin_active');
        $("#add_news_form").show().addClass('admin_active');
        return false;
    });
    $("#send_newsletter_show").live("click",function()
    {
        $(".admin_active").hide();
        $(".admin_active").removeClass('admin_active');
        $("#newsletter_form").show().addClass("admin_active").removeClass("inactive");
        return false;
    });
    $("#upload").live("click",function()
    {
        $(".admin_active").hide();
        $(".admin_active").removeClass('admin_active');
        $("#file_upload").show().addClass("admin_active").removeClass("inactive");
        return false;
    });
    $("#validate_comment_show").live("click",function()
    {
        $(".admin_active").hide();
        $(".admin_active").removeClass('admin_active');
        $("#comment_review").show().addClass("admin_active").removeClass("inactive");
        return false;
    });

	/*
	*CATCH onClick EVENT AND GET DATA
	*FOR THE NEW NEWS
	*@param title
	*@param category
	*@param news text
 	*/

 	$("#add_news").click(function()
 		{
 			

            var id = new Array();

            $(".cat_id").each(function()
            {
                if($(this).attr("checked")) id.push($(this).attr("id"));
                
            });

 			$.post(AJAX+$(this).attr("id"),
 			{
 				title     : $("#title").val(),
 				text  	  : tinyMCE.get('news_text').getContent(),
 				category  : id
 			},
 			function(data)
 			{
 				console.log(data);
 				if(data)
 				{
 					window.location.reload();
 				}
 				else
 				{
 					console.log("Error");
 				}
 			});
 			return false;
 		});

 	/**
 	*Retrive data for update
 	*@author Marko Kovacevic
 	*/

 	$(".update").click(function()
 	{

 		var id = $(this).attr("id");

 		$.post(AJAX+$(this).attr('class'),
 		{
 			news_id : id
 		},
 		function(data)
 		{
 			var obj = jQuery.parseJSON(data);
      

 			if(obj!=undefined)
 			{

 				$("#title").val(obj.Title);
 				$("#add_news_form").show();
 				tinyMCE.get('news_text').setContent(obj.Text);
 				$("#"+obj.CategoryID).attr('selected',true);
 				$("#news_id").val(obj.newsID);

                    var t = $.trim(obj.CategoryID);
                    var newArray = new Array();

                newArray = t.split(', ');
                 for (var i = 0; i < newArray.length; i++) {

                    $(".cat_id").each(function()
                {
                    if($(this).attr("id")==newArray[i]) $(this).attr('checked',true);
                });
               };

                  
              
 				$("#add_news").hide();
 				$("#update_news").show();
 			}
 			else
 			{
 				console.log("Error");
 			}

 		});
 		return false;
 	});

 	/**
 	*Update
 	*
 	*
 	*/
 	$("#update_news").click(function()
	 	{
	 		  var id = new Array();

            $(".cat_id").each(function()
            {
                if($(this).attr("checked")) id.push($(this).attr("id"));
                
            });
	 		$.post(AJAX+$(this).attr("id"),
	 		{
	 			title     : $("#title").val(),
 				text  	  : tinyMCE.get('news_text').getContent(),
 				category  : id,
 				newsID    : $("#news_id").val()
	 		},
	 		function(data)
	 		{
	 			var obj = jQuery.parseJSON(data);

	 			if(obj.success)
	 			{
	 				window.location.reload();
	 			}
	 			else
	 			{
	 				console.log("Error");
	 			}
	 		});
	 		return false;
	 	});

 	/**
 	*DELETE NEWS
 	*@author Marko Kovacevic
 	*@return boolean
 	*/

 	$(".delete").click(function()
 		{
 			var id = $(this).attr("id");

 			$.post(AJAX+$(this).attr("class"),
 			{
 				newsID : id
 			},
 			function(data)
 			{
 				var obj = jQuery.parseJSON(data);

 				if(obj.success)
 				{
 					window.location.reload();
 				}
 				else
 				{
 					console.log("error");
 				}
 			});
 			return false;
 		});

 	/**
 	* Sends username and password for validation
 	* @author Marko Kovacevic
 	* @return boolean
 	*/

 	$("#log_in_btn").click(function()
 		{
 			var username = $("#username").val();
 			var password = $("#password").val();

 			$.post(AJAX+$(this).attr("name"),
 			{
 				userName : username,
 				password : password
 			},
 			function(data)
 			{
 				
 				var obj = jQuery.parseJSON(data);
 				if(obj.success)
 				{
 					window.location = "/projects/hill/admin";
 				}
 				else
 				{
 					alert("Wrong combination\n username/password");
 				}

 			});
 			return false;
 		});

 	$("#logOut").click(function()
 	{
 		$.post(AJAX+$(this).attr("id"),
 			function(data)
 			{
 				window.location.reload();
 			});
 		return false;
 	});
 	$(".review").click(function()
 	{

 		$("#read").html("<p>"+$(this).attr("name")+"</p>");
 	});

 	//Comments approve
    $(".approve").click(function()
    {
        var id = $(this).attr("id");
        $.post(AJAX+$(this).attr("name"),
            {
                id :id
            },
        function(data)
        {
            var obj = jQuery.parseJSON(data);
            if(obj.success)
            {
                $("."+id).remove();
            }
            else
            {
                alert(data);
            }
        });
        return false;
    });
    //Comments for deleting
    $(".decline").click(function()
    {
        var id = $(this).attr("id");
        $(this).parent().remove();
        $.post(AJAX+$(this).attr("name"),
            {
                id : id
            },
            function(data)
            {
                var obj = jQuery.parseJSON(data);
                if(obj.success)
                {
                    $("."+id).remove();
                }
                else
                {
                   console.log(data);
                }
            });
        return false;
    });

});
