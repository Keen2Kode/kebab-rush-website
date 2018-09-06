function getId(id) {
    return document.getElementById(id);
}  
  
function formValidate(){
  	var errors= 0;
  	if (check('email') == false)	errors++;
    if (check('password') == false)	errors++;
    if (errors>0){
        alert("We've found " + errors + " errors with your login information");
    	return false;
    }
    return true;
}
  
function check(id){
  	var errorMsg = "";
    if (getId(id).value.length == 0)	errorMsg = "Please enter " + id;
    if (getId(id).value.includes(" "))	errorMsg = "Spaces are not allowed";
    
    var errorId = id + "Error";
    getId(id).placeholder = errorMsg;
    
    if (errorMsg == "")	
    	return true;
    getId(id).value = "";
    return false;
}