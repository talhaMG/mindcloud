function member_validation(form_data)
{
	var nf = jQuery("#user_firstname");
	var nl = jQuery("#user_lastname");
	var em = jQuery("#user_email");
	var ps = jQuery("#user_password");

	var user_firstname	 	= form_data.find("#user_firstname").val();
	var user_lastname	 	= form_data.find("#user_lastname").val();
	var name_regex 			= new RegExp(/[a-zA-Z]{2,100}$/); // reg ex name check
	var email				= form_data.find("#user_email").val();
	var email_regex 		= /^[\w%_\-.\d]+@[\w.\-]+.[A-Za-z]{2,6}$/; // reg ex email check
	var password			= form_data.find("#user_password").val();


	//-------------- ** First name Validation Start ** --------------//
	if(user_firstname.length < 2)
	{
		nf.attr('placeholder' , 'First name field is required');
		nf.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
		notification_popup('error' , 'Error Found' , 'First name field is required');
		
		first_name_error = 1;
	}
	else
	{
		if(!name_regex.test(user_firstname))
		{
			nf.attr('placeholder' , 'First name field is required');
			nf.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
			notification_popup('error' , 'Error Found' , 'First name field is required');
			
			first_name_error = 1;
		}
		else
		{
			nf.attr('style' ,  'border-color : green ; color:green ; border:1px solid'); 
			first_name_error = 0;
		}
	}
	//-------------- ** First Name Validation End ** --------------//

	//-------------- ** Last name Validation Start ** --------------//
	if(user_lastname.length < 2)
	{
		nl.attr('placeholder' , 'Last name field is required');
		nl.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
		notification_popup('error' , 'Error Found' , 'Last name field is required');
		
		last_name_error = 1;
	}
	else
	{
		if(!name_regex.test(user_lastname))
		{
			nl.attr('placeholder' , 'Last name field is required');
			nl.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
			notification_popup('error' , 'Error Found' , 'Last name field is required');
			
			last_name_error = 1;
		}
		else
		{
			nl.attr('style' ,  'border-color : green ; color:green ; border:1px solid'); 
			last_name_error = 0;
		}
	}
	//-------------- ** Last Name Validation End ** --------------//

	//-------------- ** Email Validation Start ** --------------//
  
	if(email == "") 
	{
		em.attr('placeholder' ,"Email field is required.");
		em.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
		notification_popup('error' , 'Error Found' , 'Email field is required');

		email_error = 1;
	} 
	else 
	{
		// if invalid email
		if(!email_regex.test(email))
		{
			em.attr('placeholder' ,"Invalid Email!");
			em.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
			notification_popup('error' , 'Error Found' , 'Invalid Email!');

			email_error = 1;
		}
		else 
		{
			em.attr('style' ,  'border-color : green ; color:green ; border:1px solid');
			email_error = 0;
		}
	}

	//-------------- ** Email Validation End ** --------------//

	
	//-------------- ** Password Validation Start ** --------------//
	if(password.length < 7) {
		ps.attr('placeholder',"This password field is required min 7 characters.");
		ps.attr('style',"border-color : red ; color:red ; border:1px solid");
		notification_popup('error' , 'Error Found' , 'This password field is required min 7 characters.');

		password_error = 1;
	} 
	else {
		if(password.length > 50) {
			ps.attr('placeholder',"Password field is max length 50 characters.");
			ps.attr('style',"border-color : red ; color:red ; border:1px solid");
			notification_popup('error' , 'Error Found' , 'Password field is max length 50 characters.');

			password_error = 1;
		} 
		else{
			ps.attr('style',"border-color : green ; color:green ; border:1px solid");
			password_error = 0;
		}
	}

	//-------------- ** Password Validation End ** --------------//

	if(first_name_error == 0 && last_name_error == 0 && email_error == 0 && password_error == 0)
		return true;
	else
		return false;
}




function sign_in_validation(form_data)
{
	var em = jQuery("#sign_in_email");
	var ps = jQuery("#sign_in_password");

	var email				= form_data.find("#sign_in_email").val();
	var email_regex 		= /^[\w%_\-.\d]+@[\w.\-]+.[A-Za-z]{2,6}$/; // reg ex email check
	var password			= form_data.find("#sign_in_password").val();

	//-------------- ** Email Validation Start ** --------------//
  
	if(email == "") 
	{
		em.attr('placeholder' ,"Email field is required.");
		em.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
		notification_popup('error' , 'Error Found' , 'Email field is required');

		email_error = 1;
	} 
	else 
	{
		// if invalid email
		if(!email_regex.test(email))
		{
			em.attr('placeholder' ,"Invalid Email!");
			em.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
			notification_popup('error' , 'Error Found' , 'Invalid Email!');

			email_error = 1;
		}
		else 
		{
			em.attr('style' ,  'border-color : green ; color:green ; border:1px solid');
			email_error = 0;
		}
	}

	//-------------- ** Email Validation End ** --------------//

	
	//-------------- ** Password Validation Start ** --------------//
	if(password.length < 7) {
		ps.attr('placeholder',"This password field is required min 7 characters.");
		ps.attr('style',"border-color : red ; color:red ; border:1px solid");
		notification_popup('error' , 'Error Found' , 'This password field is required min 7 characters.');

		password_error = 1;
	} 
	else {
		if(password.length > 50) {
			ps.attr('placeholder',"Password field is max length 50 characters.");
			ps.attr('style',"border-color : red ; color:red ; border:1px solid");
			notification_popup('error' , 'Error Found' , 'Password field is max length 50 characters.');

			password_error = 1;
		} 
		else{
			ps.attr('style',"border-color : green ; color:green ; border:1px solid");
			password_error = 0;
		}
	}

	//-------------- ** Password Validation End ** --------------//

	if(email_error == 0 && password_error == 0)
		return true;
	else
		return false;
}


function forgot_password_validation(form_data)
{
	var em = jQuery("#forgot_password_email");

	var email				= form_data.find("#forgot_password_email").val();
	var email_regex 		= /^[\w%_\-.\d]+@[\w.\-]+.[A-Za-z]{2,6}$/; // reg ex email check

	//-------------- ** Email Validation Start ** --------------//
  
	if(email == "") 
	{
		em.attr('placeholder' ,"Email field is required.");
		em.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
		notification_popup('error' , 'Error Found' , 'Email field is required');

		email_error = 1;
	} 
	else 
	{
		// if invalid email
		if(!email_regex.test(email))
		{
			em.attr('placeholder' ,"Invalid Email!");
			em.attr('style' ,  'border-color : red ; color:red ; border:1px solid');
			notification_popup('error' , 'Error Found' , 'Invalid Email!');

			email_error = 1;
		}
		else 
		{
			em.attr('style' ,  'border-color : green ; color:green ; border:1px solid');
			email_error = 0;
		}
	}

	//-------------- ** Email Validation End ** --------------//

	

	if(email_error == 0)
		return true;
	else
		return false;
}


function reset_password_validation(form_data)
{
	var ps = jQuery("#reset_password_password");

	var password			= form_data.find("#reset_password_password").val();

	//-------------- ** Password Validation Start ** --------------//
	if(password.length < 7) {
		ps.attr('placeholder',"This password field is required min 7 characters.");
		ps.attr('style',"border-color : red ; color:red ; border:1px solid");
		notification_popup('error' , 'Error Found' , 'This password field is required min 7 characters.');

		password_error = 1;
	} 
	else {
		if(password.length > 50) {
			ps.attr('placeholder',"Password field is max length 50 characters.");
			ps.attr('style',"border-color : red ; color:red ; border:1px solid");
			notification_popup('error' , 'Error Found' , 'Password field is max length 50 characters.');

			password_error = 1;
		} 
		else{
			ps.attr('style',"border-color : green ; color:green ; border:1px solid");
			password_error = 0;
		}
	}

	//-------------- ** Password Validation End ** --------------//

	if(password_error == 0)
		return true;
	else
		return false;
}
