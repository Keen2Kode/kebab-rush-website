// ensure that this code is placed in the footer
// add event listeners in assignment 3
// http://jsfiddle.net/AbSh2/590/


function getName(name) {
    return document.getElementByName(name);
}  
  
function formValidate(){
    var errors= 0;
    if (nameCheck()     == false)   errors++;
   	if (emailCheck()    == false)	errors++;
    if (addressCheck()  == false)   errors++;
    if (phoneCheck()    == false)   errors++;
    if (cardCheck()     == false)   errors++;
    if (expiryCheck()   == false)   errors++;
     
    switch (errors) {
        case 1 : alert("We've found " + errors + " error with your login information");     return false;
        case 2 : alert("We've found " + errors + " errors with your login information");    return false;
        default: return true;
    } 
}


// common check method
// displays errorMsg to user
function check(name,errorMsg) {
    var errorName = name + "Error";
    getName(errorName).innerHTML = errorMsg;
    
    
    if (errorMsg == "")	
    	return true;
    else
        getName(name).value = "";
        return false;
}
    











// returns true if the errorMsg is empty
// this means there is no error
function nameCheck() {
    var name = getName('name').value;
    var pattern = /[a-zA-Z_\-]+/;
    
    // input does not match pattern
    var errorMsg = (pattern.test(name)) ? "" : "Please enter a valid name";
    return check('name',errorMsg);
}


function emailCheck() {
    var email = getName('email').value;
    var pattern = /[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-.]+\.((com)|(edu)|(org)|(net)|(au))/;

    // input does not match pattern
    var errorMsg = "";
    if (!pattern.test(email))    errorMsg = "Wrong email format (should be in the format abcedg@email.com)";
    
    return check('email',errorMsg);
}

function addressCheck() {
    var address = getName('address').value;
    var pattern = /customAddressRegex/; 
    
    // input does not match pattern
    var errorMsg = (pattern.test(address)) ? "" : "Custom address error";
    return check('address',errorMsg);
}

function phoneCheck() {
    var phone = getName('phone').value;
    var pattern = /customPhoneRegex/;
    
    // input does not match pattern
    var errorMsg = (pattern.test(phone)) ? "" : "Custom phone error";
    return check('phone',errorMsg);
}

function cardCheck() {
    var card = getName('card').value;
    var pattern = /customCardRegex/;
    
    // input does not match pattern
    var errorMsg = (pattern.test(card)) ? "" : "Custom card error";
    return check('card',errorMsg);
}

function expiryCheck() {
    var expiry = getName('expiry').value;
    var pattern = /customExpiryRegex/;
    
    // input does not match pattern
    var errorMsg = (pattern.test(expiry)) ? "" : "Custom expiry error";
    return check('expiry',errorMsg);
}



