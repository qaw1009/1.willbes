
﻿var STARPLAYER_APP_IPHONE_URL = "https://itunes.apple.com/kr/app/axis-starplayer/id598865744?mt=8";
var STARPLAYER_APP_IPAD_URL = "https://itunes.apple.com/kr/app/axis-starplayerhd/id599892711?mt=8";
var STARPLAYER_APP_INSTALL_ANDROID_URL = "market://details?id=com.axissoft.starplayer";
var STARPLAYER_APP_INSTALL_CONFIRM = "[ StarPlayer App 설치 ]\n\n설치 페이지로 이동하시겠습니까?\n\n기존에 앱이 설치되어 있다면\n '취소'버튼을 선택해주세요.";

var DataType = {};
DataType.URL = 1;
DataType.DATA = 2;
var StarPlayerApp = {};

var uagent = navigator.userAgent.toLocaleLowerCase();
StarPlayerApp.android = (uagent.search("android") > -1 || navigator.platform.toLocaleLowerCase().search("linux") > -1);
StarPlayerApp.ios = window.navigator.userAgent.match(/iP(hone|od|ad)/);
StarPlayerApp.iphone = (uagent.search("iphone") > -1 || uagent.search("ipod") > -1);
StarPlayerApp.ipad = (uagent.search("ipad") > -1);

StarPlayerApp.iphone_version = parseFloat(String(window.navigator.userAgent.match(/[0-9]_[0-9]/)).split('_')[0]+'.'+String(window.navigator.userAgent.match(/[0-9]_[0-9]/)).split('_')[1]);
StarPlayerApp.safari = (uagent.search("safari") > -1);
StarPlayerApp.chrome = (uagent.search("chrome") > -1 || uagent.search("crios") > -1);
StarPlayerApp.opera = (uagent.search("opera") > -1);
StarPlayerApp.windows = (uagent.search("windows") > -1 || uagent.search("wow64") > -1);


StarPlayerApp.executeApp = function(data, type) {
    if (typeof this.referer == 'undefined')
        this.referer = window.location.href;
    var url = this.urlscheme(data, type);
    checkInstalled2();
    if (this.android) {

        var intent = "intent://?" + url + "#Intent;";
        intent += "scheme=starplayer;";
        intent += "action=android.intent.action.VIEW;";
        intent += "category=android.intent.category.BROWSABLE;";
        intent += "package=com.axissoft.starplayer;end";
        window.parent.location.href = intent;

    } else if (this.ios) {
        if (this.opera) {
            alert("사용하고 계신 환경(OS)에서는 지원되지 않습니다.");
        } else {
            setTimeout(function(){
                window.parent.location.href = url;
            }, 10);
        }
    } else if (this.windows) {
        setTimeout(function(){
            window.parent.location.href = url;
        }, 10);
    }
}

StarPlayerApp.urlscheme = function(data, type) {
    if (typeof type === 'undefined')
        type = DataType.URL;

    if (typeof this.license === 'undefined') {
        alert("license 값이 설정되지 않았습니다.");
        return;
    }

    if (typeof data === 'undefined') {
        alert("data 값이 설정되지 않았습니다.");
        return;
    }

    var url = "";
    if (type == DataType.URL) {
        url = this.url(data);
    } else if (type == DataType.DATA) {
        //	url = this.data(data);
    }
    return url;
}

StarPlayerApp.url = function (encoded_url) {
    var result = "";
    if (this.ios)
        result += "starplayer://?";
    else if (this.windows)
        result += "starplayer://?";
    result += "license=" + encodeURIComponent(this.license) + "&url=" + encodeURIComponent(encoded_url);
    if (typeof this.referer !== 'undefined')
        result += "&referer=" + encodeURIComponent(this.referer);
    if (typeof this.debug !== 'undefined')
        result += "&debug=" + this.debug;
    else
        result += "&debug=false";

    var flag = false;
    if (this.android) {
        if (typeof this.android_version !== 'undefined') {
            result += "&version=" + this.android_version;
            flag = true;
        }
    } else {
        if (typeof this.ios_version !== 'undefined') {
            result += "&version=" + this.ios_version;
            flag = true;
        }
    }

    if (flag == false) {
        if (typeof this.version !== 'undefined')
            result += "&version=" + this.version;
        else
            result += "&version=1.0.0";
    }

    if (typeof this.pmp !== 'undefined')
        result += "&pmp=" + this.pmp;
    else
        result += "&pmp=true";


    if (this.chrome)
        result += "&from=chrome";
    else if (this.safari)
        result += "&from=safari";
    else if (this.opera)
        result += "&from=opera";
    else
        result += "&from=none";

    if (this.android) {
        if (this.android_referer_return)
            result += "&android_referer_return=" + this.android_referer_return;
        else
            result += "&android_referer_return=false";
    } else {
        if (this.referer_return)
            result += "&referer_return=" + this.referer_return;
        else
            result += "&referer_return=true";
    }

    if (typeof this.offline_check !== 'undefined')
        result += "&offline_check=" + this.offline_check;
    else
        result += "&offline_check=false";

    if (typeof this.user_id !== 'undefined')
        result += "&user_id=" + this.user_id;
    return result;
}


var checkInstalled = function() {
    //empty

}

var agentCheck = function(){
    var agent="";
    if (StarPlayerApp.iphone === true) {
        agent = STARPLAYER_APP_IPHONE_URL;
    } else if (StarPlayerApp.ipad === true){
        agent = STARPLAYER_APP_IPAD_URL;
    } else if (StarPlayerApp.android === true) {
        agent = STARPLAYER_APP_INSTALL_ANDROID_URL;
    }
    return agent;

}

var checkInstalled2 = function() {
    if (StarPlayerApp.ios || (StarPlayerApp.android && StarPlayerApp.opera)) {
        var clickedAt = +new Date;
        StarPlayerAppCheckTimer = setTimeout(function() {
            if (+new Date - clickedAt < 2000){
                if (window.confirm(STARPLAYER_APP_INSTALL_CONFIRM))
                { location.href = agentCheck(); }

            }
        }, 1500);
    }
}