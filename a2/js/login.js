function getId(id) {
    return document.getElementById(id);
}  
  
function formValidate(){
  	var errors= 0;
  	if (emailCheck()    == false)	errors++;
    if (passwordCheck() == false)	errors++;
    if (errors>0){
        alert("We've found " + errors + " errors with your login information");
    	return false;
    }
    return true;
}
  


// common check method
function check(id,errorMsg) {
    getId(id).placeholder = errorMsg;
    
    //var errorId = id + "Error"; assignment 3
    if (errorMsg == "")	
    	return true;
    else
        getId(id).value = "";
        return false;
}
    
// returns true if the errorMsg is empty
// this means there is no error
function passwordCheck() {
    var errorMsg = "";
    var password = getId("password").value;
    
    if (password.length < 3)	errorMsg = "Min. 3 characters allowed";
    if (password.includes(" "))	errorMsg = "Spaces not allowed";
    
    return check('password',errorMsg);
}

function emailCheck() {
    var errorMsg = "";
    var email = getId('email').value;
    var pattern = /^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-.]+$/;

    // input does not match pattern
    if (!pattern.test(email))    errorMsg = "Wrong email format";
    
    return check('email',errorMsg);
}
