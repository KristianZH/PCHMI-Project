
function validate(){
	var username = document.getElementById("username");
	var password = document.getElementById("password");
	var repeated_password = document.getElementById("pass");
	var errors = document.getElementById("errors");
	alert(username.value);
	
	if(username.value.trim().length < 3 || username.value.trim().length > 10 || !isValidUsername(username.value)){
		errors.innerHTML = "Невалидно потребителско име!";
		return false;
	}else if(password.value.trim().length < 6 || !hasLowerCase(password.value) || !hasUpperCase(password.value) || !hasNumbers(password.value)){
		errors.innerHTML = "Невалидна парола!";
		return false;
	}else if(repeated_password.value != password.value){
		errors.innerHTML = "Паролите не съвпадат!";
		return false;
	}
}

function hasNumbers(str){
	return /\d/.test(str);
}

function hasLowerCase(str) {
    return (/[а-яa-z]/.test(str));
}

function hasUpperCase(str) {
    return (/[A-Z]/.test(str));
}


function isValidUsername(str){
	return str.match("^[а-яА-Яa-zA-Z0-9_]+$");
}