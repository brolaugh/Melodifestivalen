


var korrekt = "0,0,1,2,3,4,5,6,7,8,10,12".split(",");
var Res = new Array();
var Bidrag = new Array();
	function ok(){
		for(j=1;j<13;j++){
			var lista = document.getElementsByName("song"+j);
			var number = getNumber(lista);
			if(!isFree(number,korrekt)){
				alert("Du kan bara ge samma poäng en gång.");
				korrekt = "0,0,1,2,3,4,5,6,7,8,10,12".split(",");
				return false;
			}	
		}
		return true;
	}
	function isFree(number,comp){		
		for(ind=0;ind<comp.length;ind++){
			if(number == comp[ind]){
				comp[ind] = "-1";
				return true;
			}
		}
		return false;
	}

	function getNumber(rad){
		for(i=0;i<rad.length;i++){
				if(rad[i].checked){
					return rad[i].value;
				}
	   }
	   return -1;
	}



function ladda(){
document.getElementById("reg_box").style.display = "none";
}

function show_reg(){
	document.getElementById("login_box").style.display = "none";
	document.getElementById("reg_box").style.display = "block";
}
function show_log(){
	document.getElementById("reg_box").style.display = "none";
	document.getElementById("login_box").style.display = "block";

}
function no_log(){
	alert("Du måste logga in först!");
}
function ResUpdate(){ //hämta listan av poäng var tionde sekund

	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveCObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET","getResult.php",true);
	xmlhttp.send();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {

			 var temp = xmlhttp.responseText.split("*");
			 Res = temp[0].split(",");
			 Bidrag = temp[1].split(",");  
			
		}

	}
}

var canvas;
var g;
function can()
{
	canvas = document.getElementById("resultcanvas");
	//canvas.setAttribute("width","400");
	//canvas.style.width="600px";
	//canvas.setAttribute("height",canvas.style.width/16*9);
	//canvas.style.height="400px";
	//canvas.style.background = "black";
	g = canvas.getContext("2d");
	g.fillStyle = "0023FF";
	g.fillRect(0,0,canvas.width,canvas.height);
	draw();
	 
}

function draw()
{
	ResUpdate();
	g.fillStyle = "#FFF";
	g.fillRect(0,0,canvas.width,canvas.height);

	var x = 5;
	var b = 30;
	g.strokeStyle="#FFFFFF";
	g.font="12px Verdana";
	for(var j=0;j<Res.length-1;j++)
	{
		var y =canvas.height - (Res[j]*5);
		
		var h = canvas.height-y;
		g.fillStyle="#FF0000";
		g.fillRect(x,y,b,h);
		g.strokeRect(x,y,b,h);

		g.fillStyle="#000000";
		var bidrag =  Bidrag[j];
		g.save();
		g.translate(x+7,canvas.height-5);
		g.rotate(-Math.PI/2);
		g.translate(13,12);
		g.fillText(bidrag,0,0);
		g.restore();
		x+=(b+14);

	}
	setTimeout("draw();",10000);
}

function log(message)
{
	var l = document.getElementById("loggan");
	l.innerHTML = l.innerHTML+"<br/>"+message;
}