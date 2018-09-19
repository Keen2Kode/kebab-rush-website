// ensure that this code is placed in the footer
// add event listeners in assignment 3
// http://jsfiddle.net/AbSh2/590/


function getId(id) {
    return document.getElementById(id);
}  
  
function formValidate(){
  	var errors= 0;
  	if (emailCheck()    == false)	errors++;
    if (passwordCheck() == false)	errors++;
    
    switch (errors) {
        case 1 : alert("We've found " + errors + " error with your login information");     return false;
        case 2 : alert("We've found " + errors + " errors with your login information");    return false;
        default: return true;
    }
    
}
  


// common check method
// displays errorMsg to user
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
    
    if (password.length < 3)    errorMsg = "Min. 3 characters allowed";
    if (password.includes(" ")) errorMsg = "Spaces not allowed";
    
    return check('password',errorMsg);
}

// returns true if the errorMsg is empty
// this means there is no error
function emailCheck() {
    var errorMsg = "";
    var email = getId('email').value;
    var pattern = /[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-.]+\.((com)|(edu)|(org)|(net)|(au))/;

    // input does not match pattern
    if (!pattern.test(email))    errorMsg = "Wrong email format";
    
    return check('email',errorMsg);
}
