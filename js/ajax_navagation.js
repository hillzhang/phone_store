/*
Design By Xinge At 2007-05-22
Demo:http://www.sysapi.com/test/ajax2/test.htm
*/
var please_wait = null;

function open_url(url, target) {
   var link;

if (!document.getElementById) return false;
  
if (please_wait != null) document.getElementById(target).innerHTML = please_wait;
  
if (window.ActiveXObject) {
   try{link = new ActiveXObject("Msxml2.XMLHTTP");}
   catch(e){link = new ActiveXObject("Microsoft.XMLHTTP");}
   } else if (window.XMLHttpRequest) link = new XMLHttpRequest();

   if (link == undefined) return false;

   link.onreadystatechange = function() { response(link, url, target); }
   link.open("GET", url, true);
   link.send(null);
}

function response(link, url, target) {
//alert(link.readyState + ' -- ' + target);
//alert(link.readyState);
if (link.readyState < 4) {
   document.getElementById(target).innerHTML = "<span style='padding-left:5px; font-size: 14px; color:#FF9900';>hold on...</span>";
} else {
   //document.getElementById(target).innerHTML = (link.status == 200) ? link.responseText : "Ooops!! A broken link! Please contact the webmaster of this website and give him the fallowing errorcode: " + link.status;
   document.getElementById(target).innerHTML = (link.status == 200) ? link.responseText : "Ooops!! A broken link!";
}
}

function set_loading_message(msg) {
   please_wait = msg;
}

