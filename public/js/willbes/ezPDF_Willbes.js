
function ezPDFSecData(opt)
{
	this._seckey = "Willbes";
	if (opt == 1) // 저장(o), 인쇄(o)
	    this._secdata = "7CFA9DBEADC1BBAAAEC3DEA576E9C04C3C05A8605831ABB0C9C6DC40C1BDF37E690B244F901491144A5F1D8D4AA6E8716932CC37F507441F45291EEC32016164A156A4A1523E5352C539630A72246C59E04B7FBCDAB1E1DA7BFDA26D7CCC3BA0E7276DE71D40F6FAFC81AB86E39C3B3370B58CD139701D5DFC17B3468B08B0EF656EBA89D50AA02EC91F59768CBCCBFADC8919E295CC2B4C39569E795E659609";
	else if (opt == 2) // 저장(X), 인쇄(o)
	    this._secdata = "7CFA9DBEADC1BBAAAEC3DEA576E9C04C3C05A8605831ABB0C9C6DC40C1BDF37E5924E0EC56B4D74704B8B9E9F20D1CA16932CC37F507441F45291EEC32016164A156A4A1523E5352C539630A72246C59E04B7FBCDAB1E1DA7BFDA26D7CCC3BA0E7276DE71D40F6FAFC81AB86E39C3B3370B58CD139701D5DFC17B3468B08B0EF656EBA89D50AA02EC91F59768CBCCBFADC8919E295CC2B4C39569E795E659609"
	else if (opt == 3) // 저장(x), 인쇄(x)
	    this._secdata = "7CFA9DBEADC1BBAAAEC3DEA576E9C04C3C05A8605831ABB0C9C6DC40C1BDF37E5924E0EC56B4D74704B8B9E9F20D1CA169344B5B5D46A6F1961C9A3D17D49B71A156A4A1523E5352C539630A72246C59E04B7FBCDAB1E1DA7BFDA26D7CCC3BA0E7276DE71D40F6FAFC81AB86E39C3B3312B9E1C814B76B5705094C20A3DC08DC";
}

ezPDFData = new function() {
	this._enc = false;
    this._pdf = "";
	this._sec = null;
	this._printqueryurl = "";
	this._subject = "";
	this._setprintcount = "1";
	this._watermarks = new Array();
	this._printpdfs = new Array();
	this._app_title = "";
	this._eventURL = "";

	ezPDFWatermark = function (wtype, wtext, wfont, wcolor, wsize, wtextalign, wfile, wzoom, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype)
	{
 		this._wtype = wtype;
		this._wtext = wtext;
		this._wfont = wfont;
		this._wcolor = wcolor;
		this._wsize = wsize;
		this._wtextalign = wtextalign;
		this._wfile = wfile;
		this._wzoom = wzoom;
		this._wrotate = wrotate;
		this._walpha = walpha;
		this._wvpos = wvpos;
		this._whpos = whpos;
		this._wposx = wposx;
		this._wposy = wposy;
		this._wstartpage = wstartpage;
		this._endpage = wendpage;
		this._wviewtype = wviewtype;
	};

	ezPDFPrintPdf = function(pdf, count)
	{
	    this._pdf = pdf;
	    this._count = count;
	};

	this.SetSubject = function(s)
	{
	   this._subject = s;
	};

	this.SetAppTitle = function(s)
	{
	   this._app_title = s;
	};

	this.SetEventURL = function(s)
	{
		this._eventURL = s;
	};

	this.SetPDF = function(pdf, enc) {
        this._pdf = pdf;
		this._enc = enc;
    };

	this.SetSecData = function(s) {
        this._sec = s;
    };

	this.SetPrintQueryURL = function(s) {
        this._printqueryurl = s;
    };

	this.SetWatermarkTxt = function(wtext, wfont, wcolor, wsize, wtextalign, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype) {
		this._watermarks.push(new ezPDFWatermark(1, wtext, wfont, wcolor, wsize, wtextalign, "", 100, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype));
	};

	this.SetWatermarkImg = function(wfile, wzoom, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype) {
		this._watermarks.push(new ezPDFWatermark(2, "", "", "", 0, 0, wfile, wzoom, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype));
	};

	this.InitialWatermark = function () {
	    while (this._watermarks.length > 0) {
	        this._watermarks.pop();
	    }
	};

	this.InitialPrint = function () {
	    while(this._printpdfs.length > 0) {
	        this._printpdfs.pop();
	    }
	};

	this.SetPrintCount = function (count) {
	    this._setprintcount = count;
	}

	this.SetPrintPDF = function(pdf, count) {
        this._printpdfs.push(new ezPDFPrintPdf(pdf, count));
    };

	this.GetJSON = function()
	{
		var obj = new Object();
		if(this._enc == true)
		{
			obj.enc_pdf = this._pdf;
			obj.seckey = this._sec._seckey;
			obj.secdata = this._sec._secdata;
			obj.subject = this._subject;
			obj.setprintcount = this._setprintcount;
			if(this._printqueryurl.length > 0)
				obj.printqueryurl = this._printqueryurl;
			obj.app_title = this._app_title;
		}
		else
		{
		    obj.pdf = this._pdf;
			obj.seckey = this._sec._seckey;
			obj.secdata = this._sec._secdata;
			obj.subject = this._subject;
			obj.setprintcount = this._setprintcount;
			if(this._printqueryurl.length > 0)
				obj.printqueryurl = this._printqueryurl;
			obj.app_title = this._app_title;
		}
		obj.event_url = this._eventURL;

		var wmArray = new Array();
		for (i=0; i<this._watermarks.length; i++) {
			var wmObj = new Object();

			wmObj.wtype = this._watermarks[i]._wtype;
			wmObj.wtext = this._watermarks[i]._wtext;
			wmObj.wfont = this._watermarks[i]._wfont;
			wmObj.wcolor = this._watermarks[i]._wcolor;
			wmObj.wsize = this._watermarks[i]._wsize;
			wmObj.wtextalign = this._watermarks[i]._wtextalign;
			wmObj.wfile = this._watermarks[i]._wfile;
			wmObj.wzoom = this._watermarks[i]._wzoom;
			wmObj.wrotate = this._watermarks[i]._wrotate;
			wmObj.walpha = this._watermarks[i]._walpha;
			wmObj.wvpos = this._watermarks[i]._wvpos;
			wmObj.whpos = this._watermarks[i]._whpos;
			wmObj.wposx = this._watermarks[i]._wposx;
			wmObj.wposy = this._watermarks[i]._wposy;
			wmObj.wstartpage = this._watermarks[i]._wstartpage;
			wmObj.wendpage = this._watermarks[i]._endpage;
			wmObj.wviewtype = this._watermarks[i]._wviewtype;

			wmArray.push(wmObj);
		}

		if(wmArray.length > 0)
			obj.watermark = wmArray;

		//printpdf array;
		var printArray = new Array();
		for (i=0; i<this._printpdfs.length; i++) {
			var printObj = new Object();

			printObj.pdf = this._printpdfs[i]._pdf;
			printObj.count = this._printpdfs[i]._count;

			printArray.push(printObj);
		}

		if(printArray.length > 0)
			obj.printpdf = printArray;

		return obj;
	};
};

var ezPDFWSPrinter = new function() {

	this._moduleprint = false;

	this._module = "ezPDFReaderWillbes";
	this._version = "3.1.0.69";
	this._key = "0E7F67724DD1BB66A7992D13654DCF0A";
	this._id = "";

	this._printmodule = "ezPDFPrintExWillbes";
	this._printkey = "5B3F9DCC5E6EAF4660C9100A08AEA161";
	this._printid = "";

	this._installPage = "ezPDFSetupNonax.html";
};

function ezPDFWFLauncher(m, d, ssl) {
	this._debug = 0;
	this._ezpdfmodule = m;
	this._ezpdfdata = d;
	this._t = this.SupportBrowserType();

	if(this._t == 0)
	{
		if(ssl == 1)
		{
			this._type ="wss";
			this._port = 23108;
		}else{
			this._type ="ws";
			this._port = 23107;
		}
	}else{
		if(ssl == 1)
		{
			this._type ="https";
			this._port = 23108;
		}else{
			this._type ="http";
			this._port = 23107;
		}
	}

	this._protocol = "ezpdf-msg-protocol";
	this._bError = false;
	this._webSocket;

	this.Connect();
};

ezPDFWFLauncher.prototype.SetSubject = function(p){
	this._ezpdfdata.SetSubject(p);
};

ezPDFWFLauncher.prototype.SetAppTitle = function(p){
	this._ezpdfdata.SetAppTitle(p);
};

ezPDFWFLauncher.prototype.SetEventURL = function(p){
	this._ezpdfdata.SetEventURL(p);
};

ezPDFWFLauncher.prototype.SetPDF = function(p, enc){
	this._ezpdfdata.SetPDF(p, enc);
};

ezPDFWFLauncher.prototype.SetSecData = function(p){
	this._ezpdfdata.SetSecData(new ezPDFSecData(p));
};

ezPDFWFLauncher.prototype.SetPrintQueryURL = function(p){
	this._ezpdfdata.SetPrintQueryURL(p);
};

ezPDFWFLauncher.prototype.SetWatermarkTxt = function(wtext, wfont, wcolor, wsize, wtextalign, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype){
	this._ezpdfdata.SetWatermarkTxt(wtext, wfont, wcolor, wsize, wtextalign, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype);
};

ezPDFWFLauncher.prototype.SetWatermarkImg = function(wfile, wzoom, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype){
	this._ezpdfdata.SetWatermarkImg(wfile, wzoom, wrotate, walpha, wvpos, whpos, wposx, wposy, wstartpage, wendpage, wviewtype);
};

ezPDFWFLauncher.prototype.InitialWatermark = function () {
    this._ezpdfdata.InitialWatermark();
};

ezPDFWFLauncher.prototype.InitialPrint = function () {
    this._ezpdfdata.InitialPrint();
};

ezPDFWFLauncher.prototype.SetPrintCount = function (Count) {
    this._ezpdfdata.SetPrintCount(Count);
}

ezPDFWFLauncher.prototype.SetPrintPDF = function(pdf, count){
	this._ezpdfdata.SetPrintPDF(pdf, count);
};

ezPDFWFLauncher.prototype.SetPort = function(p){
	this._port = p;
};

ezPDFWFLauncher.prototype.GetURL = function(){
	var url;
	if(this._t == 0)
		url = this._type + "://127.0.0.1:" + this._port + "/";
	else
		url = this._type + "://127.0.0.1:" + this._port + "/launch";

	return url;
};

ezPDFWFLauncher.prototype.SupportBrowserType = function(){
	var type = 0;

	if(this._debug == 1)
		alert(navigator.userAgent.toLowerCase());

	var is_safari = navigator.userAgent.toLowerCase().indexOf('safari/') > -1 && navigator.userAgent.toLowerCase().indexOf('chrome/') < 1;
	if(is_safari)
	{
		if(this._debug == 1)
			alert("XMLHttpRequest");
		type = 2;
		return type;
	}
/*
	var is_ie7 = navigator.userAgent.toLowerCase().indexOf('msie 7') > -1;
	if(is_ie7)
	{
		if(this._debug == 1)
			alert("MSXML2.XMLHTTP.3.0");
		type = 3;
		return type;
	}
*/
	if(window.WebSocket)
	{
		type = 0;
		if(this._debug == 1)
			alert("WebSocket");
	}
	else
	{
		if(window.XDomainRequest)
		{
			type = 1;
			if(this._debug == 1)
				alert("XDomainRequest");
		}else if(window.XMLHttpRequest){
			type = 2;
			if(this._debug == 1)
				alert("XMLHttpRequest");
		}else{
			type = 3;
			if(this._debug == 1)
				alert("MSXML2.XMLHTTP.3.0");
		}
	}
	return type;
};

ezPDFWFLauncher.prototype.Connect = function(){
	if(this._debug == 1)
		alert("ezPDFWFLauncher.Connect called");

	var url = this.GetURL();
	if(this._t == 0)
	{
		if(this._debug == 1)
			alert(url);

		this._webSocket = new WebSocket(url, this._protocol);

		if(this._debug == 1)
			alert(this._webSocket);

		this._webSocket.onopen = function(e) {
			if(this._debug == 1)
				alert("_webSocket.onopen");

			setTimeout(CheckVersion, 5000);
		};

		this._webSocket.onclose = function(e) {
			if(this._debug == 1)
				alert("_webSocket.onclose");
		};

		this._webSocket.onerror = function (e) {
			if(this._debug == 1)
				alert("WebSocket : onerror");
			ReRun();
		};

		this._webSocket.onmessage = function (message) {
			var contact = JSON.parse(message.data);

			var type = contact.type;
			var code = contact.code;
			var msg = contact.msg;

			if(this._debug == 1)
				alert("WebSocket : onmessage : " + type + " : " + code  + " : " + msg);

			switch (type) {
				case "check":
					SetCheckVersion(code);
					break;
				case "launch":
					SetLaunch(code, msg);
					break;
				case "launchcheck":
					SetLaunchCheck(code);
					break;
				case "close":
					SetClose();
					break;
				case "method":
					SetMethod(code, msg);
					break;
				default:
					break;
			}
		};

	}else{
		setTimeout(CheckVersion, 5000);
	}

	if(this._debug == 1)
		alert("ezPDFWFLauncher.Connect ended.");
};

ezPDFWFLauncher.prototype.Send = function(input){
	if(this._debug == 1)
		alert("ezPDFWFLauncher.Send called");

	if(this._t == 0)
	{
		if(this._debug == 1)
		{
			alert("_t == 0");
			alert(input);
		}

		this._webSocket.send(input);
	}else
	{
		var xmlhttp;
		if(this._t == 1)
		{
			if(this._debug == 1)
				alert("_t == 1");

			xmlhttp = new window.XDomainRequest;
			xmlhttp.open("POST", this.GetURL());
			xmlhttp.onerror = function() {
				if(this._debug == 1)
					alert("XDomainRequest : onerror");
				ReRun();
			};
			xmlhttp.onload = function() {
				var contact = JSON.parse(xmlhttp.responseText);
				var type = contact.type;
				var code = contact.code;
				var msg = contact.msg;

				if(this._debug == 1)
					alert("XDomainRequest : onload : " + type + " : " + code  + " : " + msg);

				switch (type) {
					case "check":
						SetCheckVersion(code);
						break;
					case "launch":
						SetLaunch(code, msg);
						break;
					case "launchcheck":
						SetLaunchCheck(code);
						break;
					case "close":
						SetClose();
						break;
					case "method":
						SetMethod(code, msg);
						break;
					default:
						break;
				}
			};
			xmlhttp.send(input);
		}
		else if(this._t == 2)
		{
			if(this._debug == 1)
				alert("_t == 2");

			xmlhttp = new window.XMLHttpRequest;
			xmlhttp.open("POST", this.GetURL(), true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			//xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			//xmlhttp.setRequestHeader('Content-Length', input.length);
			xmlhttp.send(input);
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4) {
					if(xmlhttp.status == 200)
					{
						var contact = JSON.parse(xmlhttp.responseText);
						var type = contact.type;
						var code = contact.code;
						var msg = contact.msg;

						if(this._debug == 1)
							alert("XMLHttpRequest : onload : " + type + " : " + code  + " : " + msg);

						switch (type) {
							case "check":
								SetCheckVersion(code);
								break;
							case "launch":
								SetLaunch(code, msg);
								break;
							case "launchcheck":
								SetLaunchCheck(code);
								break;
							case "close":
								SetClose();
								break;
							case "method":
								SetMethod(code, msg);
								break;
							default:
								break;
						}
					}else{
						if(this._debug == 1)
							alert("XMLHttpRequest : error");
						ReRun();
					}
				}
			};
		} else {
			if(this._debug == 1)
				alert("_t > 1");

			xmlhttp = new ActiveXObject("MSXML2.XMLHTTP.3.0");
			xmlhttp.open("POST", this.GetURL(), true);
			xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			xmlhttp.setRequestHeader('Content-Length', input.length);
			xmlhttp.send(input);
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4) {
					if(xmlhttp.status == 200)
					{
						var contact = JSON.parse(xmlhttp.responseText);
						var type = contact.type;
						var code = contact.code;
						var msg = contact.msg;

						if(this._debug == 1)
							alert("MSXML2.XMLHTTP.3.0 : onreadystatechange : " + type + " : " + code  + " : " + msg);

						switch (type) {
							case "check":
								SetCheckVersion(code);
								break;
							case "launch":
								SetLaunch(code, msg);
								break;
							case "launchcheck":
								SetLaunchCheck(code);
								break;
							case "close":
								SetClose();
								break;
							case "method":
								SetMethod(code, msg);
								break;
							default:
								break;
						}
					}else{
						if(this._debug == 1)
							alert("MSXML2.XMLHTTP.3.0 : error");
						ReRun();
					}
				}
			};
		}
	}

	if(this._debug == 1)
		alert("ezPDFWFLauncher.Send ended.");
};

ezPDFWFLauncher.prototype.Launch = function(print){
	if(this._debug == 1)
		alert("ezPDFWFLauncher.Launch called");

	this._ezpdfmodule._moduleprint = print;
	if(this._ezpdfmodule._moduleprint)
	{
		var input = {
			type: "launch",
			module: this._ezpdfmodule._printmodule,
			key: this._ezpdfmodule._printkey
			//data : this._ezpdfdata.GetJSON()
		};
		var result = JSON.stringify(input);
		if(this._debug == 1)
			alert(result);
		this.Send(result);
	}else{
		if(this._ezpdfmodule._id == "")
		{
			if(this._debug == 1)
				alert("_ezpdfmodule._id is NULL");

			var input = {
				type: "launch",
				module: this._ezpdfmodule._module,
				key: this._ezpdfmodule._key
				//data : this._ezpdfdata.GetJSON()
			};
			var result = JSON.stringify(input);
			if(this._debug == 1)
				alert(result);
			this.Send(result);
		}else{
			if(this._debug == 1)
				alert("_ezpdfmodule._id is not NULL");

			var input = {
				type: "launchcheck",
				module: this._ezpdfmodule._module,
				key: this._ezpdfmodule._key,
				id: this._ezpdfmodule._id,
				data : this._ezpdfdata.GetJSON()
			};
			var result = JSON.stringify(input);
			if(this._debug == 1)
				alert(result);
			this.Send(result);
		}
	}
};

ezPDFWFLauncher.prototype.LaunchDirectPrint = function(){
		var input = {
			type: "directprint",
			module: this._ezpdfmodule._module,
			key: this._ezpdfmodule._key,
			data : this._ezpdfdata.GetJSON()
		};
		var result = JSON.stringify(input);
		if(this._debug == 1)
			alert(result);
		this.Send(result);
};

ezPDFWFLauncher.prototype.Close = function(){
	if(this._debug == 1)
		alert("ezPDFWFLauncher.Close called.");

	if(this._ezpdfmodule._id != "")
	{
		if(this._debug == 1)
			alert('_ezpdfmodule._id != ""');

		var input = {
			type: "close",
			id: this._ezpdfmodule._id
		};
		var result = JSON.stringify(input);
		if(this._debug == 1)
			alert(result);
		this.Send(result);
	}

	if(this._debug == 1)
		alert("ezPDFWFLauncher.Close ended.");
};

function CheckVersion(){

	if(ezpdf._debug == 1)
		alert("CheckVersion() called");

	var input = {
		type: "check",
		module: ezpdf._ezpdfmodule._module,
		version: ezpdf._ezpdfmodule._version
	};
	var result = JSON.stringify(input);
		if(ezpdf._debug == 1)
			alert(result);
	ezpdf.Send(result);
};

function RunMethod(){
	if(ezpdf._ezpdfmodule._moduleprint)
	{
		var input = {
			type: "method",
			module: ezpdf._ezpdfmodule._printmodule,
			key: ezpdf._ezpdfmodule._printkey,
			id: ezpdf._ezpdfmodule._printid,
			data : ezpdf._ezpdfdata.GetJSON()
		};
		var result = JSON.stringify(input);
		if(ezpdf._debug == 1)
			alert(result);
		ezpdf.Send(result);
	}else{
		var input = {
			type: "method",
			module: ezpdf._ezpdfmodule._module,
			key: ezpdf._ezpdfmodule._key,
			id: ezpdf._ezpdfmodule._id,
			data : ezpdf._ezpdfdata.GetJSON()
		};
		var result = JSON.stringify(input);
		if(ezpdf._debug == 1)
			alert(result);
		ezpdf.Send(result);
	}
};

function ReRun() {
	if(ezpdf._debug == 1)
		alert("ReRun() called.");

	if(!ezpdf._bError)
	{
		ezpdf._bError = true;
		if (ezpdf._webSocket != null)
		{
			if(ezpdf._t == 1)
			{
				ezpdf._webSocket.close();
			}
		}
		ezpdf._webSocket = null;
		ezpdf.Connect();
	}else{
		alert("[ezPDFWFLauncher Guide : onerror]\n\"ezPDFWFLauncher\"가 설치되지 않았거나 비정상적으로 종료되었습니다. 설치 페이지로 이동합니다.");
		//location.href = _contextPath+"/std/com/ezPDFDownload.jsp";
		//location.href = ezpdf._ezpdfmodule._installPage;
		location.href = "http://ssam.willbes.net/html/user/ezPDFSetupNonax.html";
		//location.href = "/html/user/ezPDFSetupNonax.html";
	}

	if(ezpdf._debug == 1)
		alert("ReRun() ended.");
};

function SetCheckVersion(code) {
	if(code != "0")
	{
		alert("[ezPDFWFLauncher Guide : onerror]\n\"ezPDFWFLauncher\"를 업데이트 되어야 합니다. 설치 페이지로 이동합니다.");
		//location.href = _contextPath+"/std/com/ezPDFDownload.jsp";
		//location.href = ezpdf._ezpdfmodule._installPage;
		location.href = "http://ssam.willbes.net/html/user/ezPDFSetupNonax.html";
        //location.href = "/html/user/ezPDFSetupNonax.html";
	}
};

function SetLaunchCheck(code) {
	if(code != "0")
	{
		if(ezpdf._ezpdfmodule._moduleprint)
			ezpdf._ezpdfmodule._printid = "";
		else
			ezpdf._ezpdfmodule._id = "";
		ezpdf.Launch();
	}
};

function SetLaunch(code, msg) {
	if(code != 0)
	{
		if(ezpdf._ezpdfmodule._moduleprint)
			ezpdf._ezpdfmodule._printid = "";
		else
			ezpdf._ezpdfmodule._id = "";
		alert("[ezPDFWFLauncher Guide : launch error(" + code + ")]\n" + msg);
	}else{
		if(ezpdf._ezpdfmodule._moduleprint)
			ezpdf._ezpdfmodule._printid = msg;
		else
			ezpdf._ezpdfmodule._id = msg;
		//setTimeout(RunMethod, 30);
		setTimeout( function(){ RunMethod(); }, 1000);
	}
};

function SetClose() {
	if(ezpdf._debug == 1)
		alert("SetClose() called.");

	if(ezpdf._ezpdfmodule._moduleprint)
		ezpdf._ezpdfmodule._printid = "";
	else
		ezpdf._ezpdfmodule._id = "";

	if(ezpdf._debug == 1)
		alert("SetClose() ended.");
};

function SetMethod(code, msg) {
	if(code != "0")
	{
		//alert("[ezPDFWFLauncher Guide : method error(" + code + ")]\n" + msg);
	}
};