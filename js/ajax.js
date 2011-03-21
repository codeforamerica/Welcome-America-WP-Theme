//var divid = "response"; 
//var url = "getLeadershipTeamMemberDetails.php"; 

//////////////////////////////// 
// 
// Setting DIV innerHTML 
// 
//////////////////////////////// 
function getContent(divid,id,url)
{ 

	// The XMLHttpRequest object 
	var xmlHttp; 
	try{ 
		xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari 
	} 
	catch (e){ 
					try{ 
						xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer 
					} 
					catch (e){ 
								try{ 
									xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); 
								} 
								catch (e){ 
									alert("Your browser does not support AJAX."); 
								return false; 
								} 

					} 
	} 

	 // Timestamp for preventing IE caching the GET request 
	fetch_unix_timestamp = function() 
	{ 
			return parseInt(new Date().getTime().toString().substring(0, 10)) 
	} 
	 
	var timestamp = fetch_unix_timestamp(); 
	var nocacheurl = url+"?t="+timestamp; 

	// The code... 

	xmlHttp.onreadystatechange=function()
	{ 
			if(xmlHttp.readyState!=4){ 
		 
			// Working 
			document.getElementById(divid).innerHTML='<center><img src="images/loading.gif" border=0 /></center>'; 
			} 
			if(xmlHttp.readyState==4){ 
		 
			// Finished. Return response... 
			document.getElementById(divid).innerHTML=xmlHttp.responseText; 
			} 
	}
	

	xmlHttp.open("GET",nocacheurl+"&divid="+divid+"&id="+id,true); 
	xmlHttp.send(null); 
}
 

 function doNothing()
 {
	//return false;
 }
