
jQuery(document).ready(function($){

	// Email must be an email
	$('#newsletter_bright-email').on('input', function() {
		var input=$(this);
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var is_email=re.test(input.val());
		if(is_email){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});

	$("#newsletter_bright-submit").click(function(e){
		e.preventDefault();
		var element = $('#newsletter_bright-email');
		var valid = element.hasClass("valid");
		var sendemail = element.val();
		$('#newsletter_bright-info p.succes').hide();
		$('#newsletter_bright-info p.error').hide();
		$('#newsletter_bright-info p.valid').hide();
		//console.log(valid);
		//console.log(sendemail);

		if (valid) {
				var brighturl =	'http://bmmapi.bright.pt/integration/subscriber?ClientKey=dianovanews';	
				var data = {
						action: 'my_action',
						name  : 'Name if available',
						email : sendemail,
						groups : [47],
					};
				
				jQuery.post(
				brighturl,
				data,
				function(response) {
					console.log(response);
				
				})
			  	.done(function() {
			    	$('#newsletter_bright-info p.succes').slideDown();
			  	})
			  	.fail(function() {
			    	$('#newsletter_bright-info p.error').slideDown();
			  	});
		} else {
			$('#newsletter_bright-info p.valid').slideDown();
		}
	});//end click

}) //end document.ready 