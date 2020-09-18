var data;
var arrayon=["b1=1","b2=1","b3=1","b4=1","b5=1","b6=1","b7=1","b8=1","b9=1","b10=1"];
var arrayoff=["b1=0","b2=0","b3=0","b4=0","b5=0","b6=0","b7=0","b8=0","b9=0","b10=0"];
var butt=[];
var buttold=[];
var buttnew=[];
var buttstatus1=[];
var buttstatus2=[];
var ind=[(0,3)];
var i;
var k;
var j;
var l;

function initi()
{ 
    for(i=0;i<10;i++)
    {
    var k;
    k=i+1;
    butt[i] = document.getElementById("butt"+k);
    buttstatus1[i] = document.getElementById("butt"+k+"status1");
    buttstatus2[i] = document.getElementById("butt"+k+"status2");
    }
}



function update()
{
    for(i=0;i<10;i++)
    {
    if (butt[i].checked == true)
    {
    buttstatus2[i].style.display = "block";
    buttstatus1[i].style.display = "none";
    } 
    if (butt[i].checked == false)
    {
    buttstatus1[i].style.display = "block";
    buttstatus2[i].style.display = "none";
    }
    }
    
}


function req(i)
{
    var t=i;
    document.getElementById("txtHint2").innerHTML=t;
    if (butt[t].checked == true)
    {
        t=t+1;
        makeonrequest(t);
        document.getElementById("txtHint3").innerHTML="turning on";
        

    } 
    else if (butt[t].checked == false)
    {
        t=t+1;
        makeoffrequest(t);
        document.getElementById("txtHint3").innerHTML="turning off";

    }
    
    
}

function update2()
{
 
  for(l=0;l<100; l++)
   {
    for(j=4;j<100; j++)    
     {
      for(k=0;k<10;k++)
       {
        if(data.substr(l,j)==arrayon[k])
         {
             document.getElementById("txtHint2").innerHTML=(data.substr(l,j)==arrayon[k]);
          butt[k].checked = true;
          l=l+4;
          j=j+4;
         }
        else if(data.substr(l,j)==arrayoff[k])
         {
          butt[k].checked = false;
          l=l+4;
          j=j+4;
         }
       }
     }
   }
}



function getXMLHttpRequest() {
	var xmlHttpReq = false;
	// to create XMLHttpRequest object in non-Microsoft browsers
	if (window.XMLHttpRequest) {
		xmlHttpReq = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		try {
			// to create XMLHttpRequest object in later versions
			// of Internet Explorer
			xmlHttpReq = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (exp1) {
			try {
				// to create XMLHttpRequest object in older versions
				// of Internet Explorer
				xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (exp2) {
				xmlHttpReq = false;
			}
		}
	}
	return xmlHttpReq;
}
/*
 * AJAX call starts with this function
 */
 
function makeonrequest(h) {
	var xmlHttpRequest = getXMLHttpRequest();
	xmlHttpRequest.onreadystatechange = getReadyStateHandler(xmlHttpRequest);
	xmlHttpRequest.open("POST", "https://h-a-sys.000webhostapp.com/tx2.php?id=99999&pw=25282528&unit=2"+h+"&b"+h+"=1", true);
	xmlHttpRequest.send();
}


function makeoffrequest(h) {
	var xmlHttpRequest = getXMLHttpRequest();
	xmlHttpRequest.onreadystatechange = getReadyStateHandler(xmlHttpRequest);
	xmlHttpRequest.open("POST", "https://h-a-sys.000webhostapp.com/tx2.php?id=99999&pw=25282528&unit=2"+h+"&b"+h+"=0", true);
	xmlHttpRequest.send();
}
 
 
 
function makeRequest() {
    initi();
	var xmlHttpRequest = getXMLHttpRequest();
	xmlHttpRequest.onreadystatechange = getReadyStateHandler(xmlHttpRequest);
	xmlHttpRequest.open("GET", "https://h-a-sys.000webhostapp.com/tx2.php?id=99999&pw=25282528&unit=3", true);
	xmlHttpRequest.send();
}

/*
 * Returns a function that waits for the state change in XMLHttpRequest
 */
function getReadyStateHandler(xmlHttpRequest) {

	// an anonymous function returned
	// it listens to the XMLHttpRequest instance
	return function() {
		if (xmlHttpRequest.readyState == 4) {
			if (xmlHttpRequest.status == 200) {
				data = xmlHttpRequest.responseText;
				document.getElementById("txtHint").innerHTML=data;
				update2();
				update();
			} else {
				alert("HTTP error " + xmlHttpRequest.status + ": " + xmlHttpRequest.statusText);
			}
		}setTimeout(makeRequest,10000);
	};
}