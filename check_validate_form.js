function validate_form(userForm) {
	div=document.getElementById("email");
	div.style.color="red";
	if(div.hasChildNodes())
	{
		div.removeChild(div.firstChild);
	}
	regex=/(^\w+\@\w+\.\w+)/;
	match=regex.exec(userForm.emailaddress.value);
	if(!match)
	{
		div.appendChild(document.createTextNode("Invalid Email"));
		alert("Invalid Email");
		userForm.emailaddress.focus();
		return false;
	}
	div=document.getElementById("password");
	div.style.color="red";
	if(div.hasChildNodes())
	{
		div.removeChild(div.firstChild);
	}
	if(userForm.password.value.length <=5)
	{
		div.appendChild(document.createTextNode("The password should be of at least size 6"));
		userForm.password.focus();
		alert("The password should be of at least size 6");
		return false;
	}
	div=document.getElementById("repassword");
	div.style.color="red";
	if(div.hasChildNodes())
	{
		div.removeChild(div.firstChild);
	}
	if(userForm.password.value != userForm.repassword.value)
	{
		div.appendChild(document.createTextNode("The two passwords don't match"));
		alert("The two passwords don't match");
		userForm.password.focus();
		return false;
	}
 	var div=document.getElementById("name");
	div.style.color="red";
	if(div.hasChildNodes())
	{
		div.removeChild(div.firstChild);
	}
	if(userForm.complete_name.value.length ==0)
	{
		div.appendChild(document.createTextNode("Name cannot be blank"));
		userForm.complete_name.focus();
		alert("Name cannot be blank");
		return false;
	}
	return true;
}

	