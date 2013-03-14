<!DOCTYPE html>
<html>
<head>
	<title>Hill restoraunt</title>
	<!--<meta name="keywords" content="">
	<meta name="description" content="Nesto">-->
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="css/basics.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css"/>
	

	 <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="js/basic.js"></script>	
	<script type="text/javascript" src="js/validation.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
    </head>
<body>
<script>
    (function($){
        $(document).ready(function(){
            $(".content").mCustomScrollbar({

            	 set_width:false, 
  					set_height:false, 
					  horizontalScroll:false, 
					  scrollInertia:550, 
					  scrollEasing:"easeOutCirc", 
					  mouseWheel:"auto", 
					  autoDraggerLength:false, 
					  scrollButtons:{ 
					    enable:false, 
					    scrollType:"continuous", 
					    scrollSpeed:20, 
					    scrollAmount:1000 
					  },
					  advanced:{
					    updateOnBrowserResize:true, 
					    updateOnContentResize:true, 
					    autoExpandHorizontalScroll:false, 
					    autoScrollOnFocus:true 
					  },
					  callbacks:{
					    onScrollStart:function(){}, 
					    onScroll:function(){}, 
					    onTotalScroll:function(){}, 
					    onTotalScrollBack:function(){}, 
					    onTotalScrollOffset:0, 
					    whileScrolling:false, 
					    whileScrollingInterval:30 
					  }
            });
        });
    })(jQuery);
</script>
