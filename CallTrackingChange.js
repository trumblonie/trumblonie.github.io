//JQuery Extension   http://jquery-howto.blogspot.com/2009/09/get-url-parameters-values-with-jquery.html
$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});

var ppcLoc = $.getUrlVar('ppc');
document.getElementById("HppcLoc").innerHTML = ppcLoc;
document.write (ppcLoc);

switch (ppcLoc){
	Case test1:
		document.getElementById("CallNumber").innerHTML = "111.111.1111";
		document.getElementById("CallNumber").href="tel:1111111111";
		break;
	Case Default:
		document.getElementById("CallNumber").innerHTML = "123.123.1234";
		document.getElementById("CallNumber").href="tel:1231231234";
		break;
}