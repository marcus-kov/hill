$(document).ready(function(){


$(".kontakt").validate
({
	rules:
	{
		name_kon:{
			 required:true,
			 minlength: 5
		},
		
		email_kon:{
			required:true,
			email: true
		},
		persone_kon:{
			required:true,
			
		},
		telefon_kon:{
			required:true

		},
		uhrzeit_kon:{
			required:true
			
		},
		datum_kon:{
			required:true,
			date:true
			
		},
		raucher_kon:{
			required:true
		}
		
	}
});

$(".newsletter").validate
({
	rules:
	{
		name_news:{
			 required:true,
			 minlength: 5
		},
		
		email_news:{
			required:true,
			email: true
		},
	}
});
$(".guestbook").validate
({
	rules:
	{
		name:{
			 required:true,
			 minlength: 5
		},
		
		email:{
			required:true,
			email: true
		},
	}
});

});
