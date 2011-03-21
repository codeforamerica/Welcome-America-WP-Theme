// AMSF js_formfunctions.js
// UPDATED	1.04.2005
// <script language="JavaScript" src="../../includes/includes/js_formFunctions.js"></script>

/* USAGE
<script language="JavaScript" src="/assets/js/formFunctions.js"></script> 
                      <script language="JavaScript">
function checkForm(wForm) {
	if (!(checkText(wForm.fname, 	"First Name"))) 		{ return false; } 
	if (!(checkText(wForm.lname, 	"Last Name"))) 			{ return false; } 
	if (!(checkText(wForm.title, 	"Title"))) 				{ return false; } 
	if (!(checkText(wForm.company, 	"Company Name"))) 		{ return false; } 			
	if (!(checkText(wForm.address1, "Address"))) 			{ return false; } 	
	if (!(checkText(wForm.city, 	"City"))) 				{ return false; } 	
	if (!(checkPulldown(wForm.state, "State"))) 			{ return false; } 
	if (!(checkText(wForm.zip, 		"Zip"))) 				{ return false; } 
	if (!(checkPulldown(wForm.country, "Country"))) 		{ return false; } 
	if (!(checkText(wForm.phone, 	"Phone"))) 				{ return false; } 
	if (!(checkEmail(wForm.email))) 					{ return false; } 		
	*/
	/* FIELD TYPES	
	if (!(checkText(wForm.textBoxField, "TEXTFIELD"))) 				{ return false; } 		
	if (!(checkEmail(wForm.EmailField))) 								{ return false; } 	
	if (!(checkOptions(wForm.radioField, "RADIO"))) 		{ return false; } 			
	if (!(checkOptions(wForm.checkBoxField, "CHECKBOX"))) 		{ return false; } 
	if (!(checkPulldown(wForm.selectField, "SELECT"))) 			{ return false; } 	
	if (!(checkText(wForm.textAreaField, "TEXTAREA"))) 			{ return false; } 		
	*/ /*
	wForm.Submit.disabled = true;
	return true;
}
</script>				
<form name="amForm" method="post" action="<%=request.ServerVariables("URL")%>" onSubmit="return checkForm(this);"> 
 
*/

function clearcombo(wCombo){
  for (var i=wCombo.options.length-1; i>=0; i--){
    wCombo.options[i] = null;
  }
  wCombo.selectedIndex = -1;
}

// Clears the combo box, then fills with array
function fillcombo(wCombo, wFillArray){
  clearcombo(wCombo);
  for (var i = 0; i < wFillArray[0].length; i++){
    wCombo.options[wCombo.options.length]=
      new Option(wFillArray[0][i],wFillArray[1][i]);
  }

}



function checkOptions(wField, rText) {		// Works for both radio and checkboxes
	if (rText == null) {
		rText = "one of the options";
	}		
	var selected = false;
	if (wField.length == null) {
		selected = wField.checked;
		focusfield = wField;
	}
	else {
		for (var i = 0; i < wField.length; i++) {
			selected = selected || wField[i].checked;
		}
		focusfield = wField[0];
	}
	if (!selected) {
		alert('Please make a selection for '  + rText);
		focusfield.focus();
		return false;
	}
	return(selected)
}

function checkPulldown(wField, rText) {
	if (rText == null) {
		rText = "this";
	}	
	if (wField[wField.selectedIndex].value == "" | wField[wField.selectedIndex].value == null) {
		 alert('Please make a selection for ' + rText);
		 wField.focus();
		 return false;
	}
	else {
		return true;
	}
}	  
function checkText(wField, rText) {
	if (rText == null) {
		rText = "This";
	}
	if (isEmpty(wField.value)) {
		alert(rText + " is a required field");
		wField.focus();
		return false;
	}
	else {
		return true;
	}
}

function isNumeric(wField, rText) {
	if (rText == null) {
		rText = "This";
	}
	if (isNaN(wField.value)) {
		alert(rText + " must be a number");
		wField.focus();
		return false;
	}
	else {
		return true;
	}
}


function checkTextClear(wField, rText) {
	if (rText == null) {
		rText = "This";
	}
	if (isEmpty(wField.value) | isStartText(wField)) {
		alert(rText + " is a required field");
		wField.focus();
		return false;
	}
	else {
		return true;
	}
}

function checkEmail(wField) {
	if (!isEmail(wField.value)) {
		wField.focus();
		return false;
	}
	else {
		return true;
	}
}

var whitespace = " \t\n\r";
function isEmpty (s){
	var i;
    if (isNull(s)) return true;
    for (i = 0; i < s.length; i++)
    {   
        var c = s.charAt(i);
        if (whitespace.indexOf(c) == -1) return false;
    }
    // All characters are whitespace.
    return true;
}

function isNull(s) {	// used by isEmpty
   return ((s == null) || (s.length == 0))
}

function isEmail(emailStr) {
	var emailPat=/^(.+)@(.+)$/
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
	var validChars="\[^\\s" + specialChars + "\]"
	var quotedUser="(\"[^\"]*\")"
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
	var atom=validChars + '+'
	var word="(" + atom + "|" + quotedUser + ")"
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
	
	var matchArray=emailStr.match(emailPat)
	if (matchArray==null) {
		alert("This Email address seems incorrect (check @ and .'s)")
		return false
	}
	var user=matchArray[1]
	var domain=matchArray[2]
	
	if (user.match(userPat)==null) {
		alert("This E-Mail address doesn't seem to be valid.")
		return false
	}
	
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
		  for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				alert("Destination IP address is invalid!")
			return false
			}
		}
		return true
	}
	
	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
		alert("This E-Mail address domain name doesn't seem to be valid.")
		return false
	}
	
	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || 
		domArr[domArr.length-1].length>3) {
	   alert("This E-Mail address must end in a three-letter domain, or two letter country.")
	   return false
	}
	
	if (len<2) {
	   var errStr="This E-Mail address is missing a hostname."
	   alert(errStr)
	   return false
	}
	
	return true;
}


function checkLimit(wField, wLimit) {
	StrLen = wField.value.length;
	if (StrLen > wLimit) {
		msgText = wField.value;
		newText = msgText.substr(0, wLimit);
		StrLen = wLimit;
		wField.value = newText;
	}
}


// clearText() thesecond parameter is allows this function to be used on password fields, the type of the password field should be set to "text"
function clearText(wField,isPassword) {			
	iValue = wField.defaultValue;
	cValue = wField.value;
	if (cValue == "") {
	    wField.value = iValue;
	}
	else if (cValue == iValue) {
	    wField.value = "";
		if (isPassword) fieldTypeToPassword(wField);		
	}	
}
function fieldTypeToPassword(oInput) {
	var newEl = document.createElement('input');
	newEl.setAttribute('type', 'password');
    newEl.setAttribute('name', oInput.name);
    newEl.onfocus = oInput.onfocus;
    newEl.onblur = oInput.onblur;	
    newEl.className = oInput.className;
	oInput.parentNode.replaceChild(newEl,oInput);
	fieldTypeToPassword.el = newEl;
	setTimeout('fieldTypeToPassword.el.focus()',100);
	return true;
}

function clearField(wField) {
	if (wField.value == wField.defaultValue) {
		wField.value = "";
	}
	else if (wField.value == "") {
		wField.value = wField.defaultValue;
	}	
}


function clearFieldSelect(wField) {
	if (wField.value == wField.defaultValue) {
		wField.value = "";
	}
	else if (wField.value == "") {
		wField.value = wField.defaultValue;
	}		
}
