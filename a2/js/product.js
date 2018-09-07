function getId(id) {
    return document.getElementById(id);
}
    
// sets unit price based on size
// values chosen by HTML rather than js
function setUnitPrice() {
    switch (getId('option').selectedIndex) {
        case 0 : return getId("smallUnitPrice").value;
        case 1 : return getId("mediumUnitPrice").value;
        case 2 : return getId("largeUnitPrice").value;
    }
}
		
//single method to increment or decrement the textArea number
function crement(incrementOrDecrement) {
    var qty = getId('qty').value; //changed from qtyId to 'qty', similar change made below

    if (Number.isInteger(parseInt(qty)))
        switch (incrementOrDecrement) {
            case "increment" : getId('qty').value = (qty>=0) ? parseInt(qty)+1 : 0;	break;
            case "decrement" : getId('qty').value = (qty>0)  ? parseInt(qty)-1 : 0;	break;
        }
    else
        getId('qty').value = 0;
        updateCost();
}
		
// For the user to read the cost as they change the values
function updateCost() {
    var unitPrice = setUnitPrice();
    var qty = getId('qty').value;
    // 2 decimal places
    var cost = (qty*unitPrice).toFixed(2);
    getId('cost').innerHTML = "$"+cost;
}
    
function formValidate() {
    return qtyCheck();
}

function qtyCheck() {
    //console.log?
    //setQtyId('qty');
    var qty = getId('qty').value;

    if (Number.isInteger(parseInt(qty)) && qty > 0)
        return true;
    //Fail case
    alert("Check the amount you entered for ordering");
    if (qty <= 0)
        getId("cost").innerHTML = "Please enter a positive quantity";
    else
        getId("cost").innerHTML = "To order, please enter a number";
        return false;
}
