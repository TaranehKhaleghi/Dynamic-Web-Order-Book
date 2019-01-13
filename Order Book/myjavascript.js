
function submitForm(){ 
	var firstname =""; 
	var namePattern =/^[a-zA-Z]+$/;
	firstname = document.getElementById("firstName").value;
	firstname = firstname.trim();
	if(firstname=="")
	{
		document.getElementById("ok1").innerHTML = "";
		document.getElementById("fNerror").innerHTML = "&nbsp Please Enter your First Name";
		document.getElementById("firstName").focus();
	}
	else
	{	
		if(!firstname.match(namePattern))
		{
			document.getElementById("ok1").innerHTML = "";
			document.getElementById("fNerror").innerHTML = "&nbsp Please enter only letters";
			document.getElementById("firstName").focus();
		}
		else
		{	
			document.getElementById("firstName").value = firstname.charAt(0).toUpperCase()+firstname.substr(1).toLowerCase();
			document.getElementById("fNerror").innerHTML = "";
			document.getElementById("ok1").innerHTML = "&nbsp Ok";
		}
	}	
	var lastname = "";
	lastname = document.getElementById("lastName").value;
	lastname = lastname.trim();
	if(lastname=="")
	{
		document.getElementById("ok2").innerHTML = "";
		document.getElementById("lNerror").innerHTML = "&nbsp Please Enter your Last Name";
		document.getElementById("lastName").focus();
	}
	else
	{		
		if(!lastname.match(namePattern))
		{
			document.getElementById("ok2").innerHTML = "";
			document.getElementById("lNerror").innerHTML = "&nbsp Please enter only letters";
			document.getElementById("lastName").focus();
		}
		else
		{			
			document.getElementById("lastName").value= lastname.charAt(0).toUpperCase()+lastname.substr(1).toLowerCase();;
			document.getElementById("lNerror").innerHTML = "";
			document.getElementById("ok2").innerHTML = "&nbsp Ok";
		}
	}	
	var phone = "";   
	var phonePattern = /^\d{3}\s?\d{3}\s?\d{4}$/;
	phone = document.getElementById("phoneNumber").value;
	phone = phone.trim();
	if(phone=="")
	{
		document.getElementById("ok3").innerHTML ="";
		document.getElementById("pherror").innerHTML = "&nbsp Please Enter phone number";
		document.getElementById("phoneNumber").focus();
	}
	else
	{				
		if(!phone.match(phonePattern))
		{
			document.getElementById("ok3").innerHTML ="";
			document.getElementById("pherror").innerHTML ="&nbsp Please enter 10 digits";
			document.getElementById("phoneNumber").focus();
		}
		else
		{		
			document.getElementById("pherror").innerHTML ="";
			document.getElementById("ok3").innerHTML ="&nbsp Ok";
		}
	}
	
	var email = "";
	var emailPattern = /^[A-Za-z0-9!@#$%^&*()_?><.]+@[A-Za-z]+\.[a-zA-Z]{2,5}$/;
	email = document.getElementById("email").value;
	email = email.trim();
 
	if(email=="")
	{
		document.getElementById("ok4").innerHTML ="";
		document.getElementById("emerror").innerHTML = "&nbsp Email address is optional";
	}
	else
	{		
		document.getElementById("emerror").innerHTML = "";
		if(!email.match(emailPattern))
		{
			document.getElementById("ok4").innerHTML ="";
			document.getElementById("emerror").innerHTML ="&nbsp Please enter as email pattern";
		}
		else
		{			
			document.getElementById("emerror").innerHTML ="";
			document.getElementById("ok4").innerHTML ="&nbsp Ok";
		}
	}
		
	var address = "";
	var addressPattern = /^[A-Za-z0-9]+\s?[A-Za-z0-9]+\s?[A-Za-z0-9]+$/;
	address = document.getElementById("address").value;
	address = address.trim();
	if(address=="")
	{
		document.getElementById("ok5").innerHTML ="";
		document.getElementById("aderror").innerHTML = "&nbsp Address is required";
	}
	else
	{		
		document.getElementById("aderror").innerHTML = "";
		if(!address.match(addressPattern))
		{
			document.getElementById("ok5").innerHTML ="";
			document.getElementById("aderror").innerHTML ="&nbsp Please enter as address pattern";
		}
		else
		{			
			document.getElementById("address").value = address.toUpperCase();
			document.getElementById("aderror").innerHTML ="";
			document.getElementById("ok5").innerHTML ="&nbsp Ok";
		}
	}
	
	var postalCode = "";
	var postalPattern = /^[a-zA-Z]\d[a-zA-Z]\s?\d[a-zA-Z]\d$/;
	postalCode = document.getElementById("postalCode").value;
	postalCode = postalCode.trim().toUpperCase();
	if(postalCode=="")
	{
		document.getElementById("ok6").innerHTML ="";
		document.getElementById("pcerror").innerHTML = "&nbsp Postal code is required";
	}
	else
	{		
		document.getElementById("pcerror").innerHTML = "";
		if(!postalCode.match(postalPattern))
		{
			document.getElementById("ok6").innerHTML ="";
			document.getElementById("pcerror").innerHTML ="&nbsp Please enter as postal code pattern";
		}
		else
		{
			document.getElementById("postalCode").value = postalCode.toUpperCase();
			document.getElementById("pcerror").innerHTML ="";
			document.getElementById("ok6").innerHTML ="&nbsp Ok";
		}
	}
}

	



	



	


