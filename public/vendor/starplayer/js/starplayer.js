var isAtLeastIE11 = !!(navigator.userAgent.match(/Trident/) && !navigator.userAgent.match(/MSIE/));
var isIE11 = !!(navigator.userAgent.match(/Trident/) && navigator.userAgent.match(/rv 11/));
var uagent = navigator.userAgent.toLocaleLowerCase();
var isChrome = window.chrome && !navigator.userAgent.match(/Opera|OPR\//);
var isEdge = navigator.appVersion.indexOf("Edge/") != -1 ? true : false;
var isFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1;
var isOpera = navigator.userAgent.toLowerCase().indexOf("opr/") != -1 ? true : false;
if (x64()) {
    STARPLAYER_URL = STARPLAYER64_URL;
    STARPLAYER_SETUP_URL = STARPLAYER64_SETUP_URL;
    STARPLAYER_VERSION = STARPLAYER64_VERSION
} else {
    if (isMac()) {
        STARPLAYER_SETUP_URL = STARPLAYER_OSX_SETUP_URL;
        STARPLAYER_VERSION = STARPLAYER_OSX_VERSION
    }
}

function StarPlayerString() {}
StarPlayerString.INSTALL_PLUGIN = "<p>스타플레이어를 구동하려면 <a style='color:#ff0000' href='" + STARPLAYER_SETUP_URL + "'>설치 프로그램을 다운로드</a>한 후 설치하여 주십시오.</p>";
StarPlayerString.INSTALL_ACTIVEX = "<p>스타플레이어를 구동하려면 'StarPlayer' ActiveX 컨트롤을 설치하여 주십시오.</p><p>설치에 문제가 있으면 <a style='color:#ff0000' href='" + STARPLAYER_SETUP_URL + "'>설치 프로그램을 다운로드</a>한 후 설치하여 주십시오.</p>";
StarPlayerString.INSTALL_AGENT = "<p>스타플레이어를 구동하려면 <a style='color:#ff0000' href='" + STARPLAYER_AGENT_SETUP_URL + "'>설치 프로그램을 다운로드</a>한 후 설치하여 주십시오.</p>";
StarPlayerString.MEDIA_ERR_ABORTED = "비디오 재생을 중단하였습니다.";
StarPlayerString.MEDIA_ERR_NETWORK = "네트워크 오류가 발생하였습니다.";
StarPlayerString.MEDIA_ERR_DECODE = "비디오 파일이 잘못되었거나 지원하지 않는 형식입니다.";
StarPlayerString.MEDIA_ERR_SRC_NOT_SUPPORTED = "비디오를 재생할 수 없습니다. 서비스 장애가 발생하였거나 지원하지 않는 형식입니다.";
StarPlayerString.UNKNOWN = "알 수 없는 오류가 발생하였습니다.";
StarPlayerString.MULTIPLECONNECTION = "동일 아이디 동시 접속으로 동영상 재생이 차단되었습니다.";
StarPlayerString.BLOCKED_UID = "불법적 시도로 인해 아이디가 차단되었습니다.";
StarPlayerString.BLOCKED_PID = "불법적 시도로 인해 시스템이 차단되었습니다.";
StarPlayerString.BLOCKED_IP = "불법적 시도로 인해 아이피가 차단되었습니다.";
StarPlayerString.VMACHINE = "가상머신에서는 재생할 수 없습니다.";
StarPlayerString.RDESKTOP = "원격 데스크탑에서는 재생할 수 없습니다.";
StarPlayerString.MSG_DETECT_HARDWARE = "지원하지 않는 하드웨어 장비가 발견되었습니다.";

function OpenState() {}
OpenState.CLOSED = 0;
OpenState.OPENING = 1;
OpenState.OPENED = 2;
OpenState.CLOSING = 3;

function PlayState() {}
PlayState.STOPPED = 0;
PlayState.PLAYING = 1;
PlayState.PAUSED = 2;
PlayState.BUFFERING_STARTED = 3;
PlayState.BUFFERING_STOPPED = 4;
PlayState.COMPLETE = 5;

function StarPlayerError() {}
StarPlayerError.OPEN_FAILURE = 1000;
StarPlayerError.INVALID_MEDIA_TYPE = 1001;
StarPlayerError.DISK_FULL = 1002;
StarPlayerError.FILTER_NOT_INSTALLED = 1003;
StarPlayerError.FILTER_NOT_CONNECTED = 1004;
StarPlayerError.FILE_NOT_FOUND = 1005;
StarPlayerError.UNKNOWN = 1006;
StarPlayerError.MULTIPLE_CONNECTIONS = 1007;
StarPlayerError.BLOCKED_UID = 1008;
StarPlayerError.BLOCKED_IP = 1009;
StarPlayerError.BLOCKED_PID = 1010;

function WatermarkAlign() {}
WatermarkAlign.LEFT = 0;
WatermarkAlign.RIGHT = 2;
WatermarkAlign.CENTER = 1;
WatermarkAlign.TOP = 0;
WatermarkAlign.BOTTOM = 2;
WatermarkAlign.RANDOM = 3;

function WatermarkText() {}
WatermarkText.HARDWARE = "_STARPLAYER_SSN_";

function SubTitle() {}
SubTitle.NONE = 0;
SubTitle.KOR = 1;
SubTitle.ENG = 2;
SubTitle.JAP = 4;
SubTitle.CHI = 8;

function ControllerMode() {}
ControllerMode.DEFAULT = 0;
ControllerMode.EMBEDED = 1;

function LogoAlign() {}
LogoAlign.TOP = 0;
LogoAlign.BOTTOM = 1;
LogoAlign.LEFT = 0;
LogoAlign.RIGHT = 1;

function isIE() {
    if (uagent.indexOf("trident") != -1) {
        return true
    }
    return navigator.appName == "Microsoft Internet Explorer"
}

function x64() {
    if (typeof window.navigator.cpuClass != "undefined") {
        return window.navigator.platform.toLowerCase() == "win64" && window.navigator.cpuClass.toLowerCase() == "x64"
    }
    return window.navigator.platform.toLowerCase() == "win64"
}

function isMac() {
    if (navigator.platform == "MacIntel") {
        return true
    }
    return false
}

function attachIE11Event(g, e, f) {
    var a = /^function\s?([^\s(]*)/;
    var d = /\(\)|\([a-zA-Z1-9,\_\-\s]+\)/;
    var h = f.toString().match(d)[0];
    var c;
    try {
        c = document.createElement("script");
        c.setAttribute("for", g.id);
        c.event = e + h;
        c.appendChild(document.createTextNode("player." + e + h + ";"));
        if (document.body) {
            document.body.appendChild(c)
        }
    } catch (b) {}
}
var http_host = "127.0.0.1";
var http_port = "3450";
var ws_protocol = "ws";
var ws_host = "127.0.0.1";
var ws_port = "3451";
var ws_separator = "starplayer";
if (window.location.protocol == "https:") {
    ws_protocol = "wss";
    ws_host = "localhost.axissoft.co.kr";
    ws_port = "3453"
}

function StarPlayerHtml5(ad, S, X) {
    var m = this;
    var Z = false;
    var Q = false;
    var F = OpenState.CLOSED;
    var t = PlayState.STOPPED;
    var a = -1;
    var ai = -1;
    var i;
    var v;
    var J;
    var c;
    var g = 60;
    var l;
    var H;
    var b;
    var U = L(S.videoContainer);
    var p = L(S.controllerContainerHtml5);
    var E = U.parentElement;
    var A = L("watermark");
    var ag = L("subtitle");
    var R = L("logo");
    var f = null;
    var ae = new Date();
    var z = ae.getFullYear() + "/" + (ae.getMonth() + 1) + "/" + ae.getDate() + " " + ae.getHours() + ":" + ae.getMinutes() + ":" + ae.getSeconds();
    var u = 0;
    var o = 60;
    if (typeof S.subtitlePlacement == "undefined") {
        S.subtitlePlacement = 90
    }

    function L(d) {
        return document.getElementById(d)
    }

    function w(aj) {
        m._connect_callback = aj;
        var d = '{"scms" : "connection"}';
        m.websocket.send(d)
    }

    function s(aj) {
        m._opened_callback = aj;
        var d = '{"scms" : "opened"}';
        m.websocket.send(d)
    }

    function M(aj) {
        m._keepalive_callback = aj;
        var d = '{"scms" : "keepalive"}';
        m.websocket.send(d)
    }

    function C(aj) {
        m._ssn_callback = aj;
        var d = '{"ssn" : ""}';
        m.websocket.send(d)
    }

    function Y(d) {
        if (typeof m.custom_log_url != "undefined") {
            var d = '{"history" : "' + d + '"}';
            m.websocket.send(d)
        }
    }

    function e(d) {
        if (typeof m.custom_log_url != "undefined") {
            var d = '{"disconnected" : "' + d + '"}';
            m.websocket.send(d)
        }
    }

    function W(aj) {
        if (m._on_error) {
            for (var d in m._on_error) {
                m._on_error[d](aj)
            }
        }
    }

    function K() {
        return "'" + S.userId + "' " + StarPlayerString.MULTIPLECONNECTION
    }
    this.set_media = function(ak) {
        if (X.url == ak.url) {
            return
        }
        I();
        X = ak;
        var d = unescape(encodeURIComponent(encodeURIComponent(m.custom_log_extra)));
        var aj = '{"url" : "' + X.url + '","custom_log_url" : "' + m.custom_log_url + '","custom_log_extra" : "' + d + '"}';
        m.websocket.send(aj)
    };
    this.url = function() {
        return i
    };
    this.sessionid = function() {
        return v
    };
    this.open_media = function(d, aj) {
        I();
        i = d;
        w(function(ak, an, am) {
            if (ak != "" && ak != "Connected") {
                if (an !== "") {
                    W(an);
                    return
                }
                if (ak == "MultipleConnections") {
                    W(K())
                } else {
                    if (ak == "BlockedUID") {
                        W(StarPlayerString.BLOCKED_UID)
                    } else {
                        if (ak == "BlockedIP") {
                            W(StarPlayerString.BLOCKED_IP)
                        } else {
                            if (ak == "BlockedPID") {
                                W(StarPlayerString.BLOCKED_PID)
                            } else {
                                if (ak == "VMACHINE") {
                                    W(StarPlayerString.VMACHINE)
                                } else {
                                    if (ak == "RDESKTOP") {
                                        W(StarPlayerString.RDESKTOP)
                                    }
                                }
                            }
                        }
                    }
                }
                return
            }
            v = am;
            if (ad) {
                ad.controls = true;
                var al = "?";
                if (i.indexOf("?") != -1) {
                    al = "&"
                }
                ad.src = "http://" + http_host + ":" + http_port + "/" + i + al + "sid=" + v;
                ad.load();
                if (X.autoPlay != false) {
                    ad.play()
                }
                ad.controls = false
            }
            u = 0
        })
    };
    this.close_media = function() {
        m.close()
    };
    this.close = function() {
        Q = true;
        ad.src = "http://null/";
        ad.load()
    };
    this.play = function() {
        if (F != OpenState.OPENED && F != OpenState.OPENING) {
            return
        }
        ad.play();
        Z = false
    };
    this.pause = function() {
        if (F != OpenState.OPENED) {
            return
        }
        ad.pause()
    };
    this.stop = function() {
        if (F != OpenState.OPENED) {
            return
        }
        Z = true;
        ad.pause();
        N(PlayState.STOPPED);
        ad.currentTime = 0
    };
    this.addEvent = function(d, aj) {
        m.attachEvent(d, aj)
    };
    this.attachEvent = function(d, aj) {
        var ak = "_on_" + d;
        if (!m[ak]) {
            m[ak] = []
        }
        m[ak].push(aj)
    };
    this.setOpenState = function(d) {
        F = d
    };
    this.getOpenState = function() {
        return F
    };
    this.getPlayState = function() {
        return t
    };
    this.getDuration = function() {
        if (typeof X.previewTime != "undefined") {
            if (X.previewTime < ad.duration) {
                return X.previewTime
            }
        }
        return ad.duration
    };
    this.getCurrentPosition = function() {
        return parseFloat(ad.currentTime)
    };
    this.setCurrentPosition = function(ak) {
        var aj = ad.currentTime;
        if (a >= 0 || ai >= 0) {
            if (a > ak || ai < ak) {
                ak = a
            }
        }
        ad.currentTime = ak;
        if (m._on_open_state_change) {
            for (var d in m._on_position_change) {
                m._on_position_change[d](ak)
            }
        }
        if (m._on_position_change2) {
            for (var d in m._on_position_change2) {
                m._on_position_change2[d](ak, aj)
            }
        }
    };
    this.getRate = function() {
        return ad.playbackRate
    };
    this.setRate = function(d) {
        ad.playbackRate = d;
        ad.defaultPlaybackRate = d
    };
    this.getVolume = function() {
        return ad.volume
    };
    this.setVolume = function(d) {
        if (d < 0) {
            d = 0
        } else {
            if (d > 1) {
                d = 1
            }
        }
        ad.muted = false;
        ad.volume = d
    };
    this.getMute = function() {
        return ad.muted
    };
    this.setMute = function(aj) {
        if (F != OpenState.OPENED) {
            return
        }
        ad.muted = aj;
        if (m._on_volume_change) {
            for (var d in m._on_volume_change) {
                m._on_volume_change[d](ad.volume, ad.muted)
            }
        }
    };
    this.getFullscreen = function() {
        if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
            return true
        }
        return false
    };
    this.setFullscreen = function(d) {
        if (d) {
            if (E.requestFullscreen) {
                E.requestFullscreen()
            } else {
                if (E.mozRequestFullScreen) {
                    E.mozRequestFullScreen()
                } else {
                    if (E.webkitRequestFullscreen) {
                        E.webkitRequestFullscreen()
                    } else {
                        if (E.msRequestFullscreen) {
                            E.msRequestFullscreen()
                        }
                    }
                }
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen()
            } else {
                if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen()
                } else {
                    if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen()
                    } else {
                        if (document.msExitFullscreen) {
                            document.msExitFullscreen()
                        }
                    }
                }
            }
        }
    };
    var T;
    var G;
    var O;
    var ac;
    var j;
    var n;
    var V;
    var D;
    var P;
    var y = null;

    function B() {
        p.style.visibility = "visible";
        document.body.style.cursor = "default";
        clearTimeout(y);
        y = setTimeout(function() {
            p.style.visibility = "hidden";
            document.body.style.cursor = "none"
        }, 3000)
    }

    function af() {
        p.style.visibility = "visible";
        document.body.style.cursor = "default";
        clearTimeout(y)
    }

    function r() {
        var d = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        p.style.top = d - parseInt(p.style.height, 10) + "px"
    }

    function k() {
        var ao = m.getFullscreen();
        if (ao) {
            T = E.style.width;
            G = E.style.height;
            O = U.style.width;
            ac = U.style.height;
            V = p.style.position;
            D = p.style.top;
            P = p.style.left;
            j = p.style.width;
            n = p.style.height;
            E.style.width = "100%";
            E.style.height = "100%";
            U.style.width = "100%";
            U.style.height = "100%";
            U.addEventListener("mousemove", B, false);
            p.style.position = "absolute";
            p.style.left = "0px";
            var an = screen.height;
            p.style.top = an - parseInt(p.style.height, 10) + "px";
            p.style.width = "100%";
            p.classList.add("fullscreen_controller");
            p.addEventListener("mousemove", af, false);
            window.addEventListener("resize", r, false);
            ab();
            A.style.width = E.style.width;
            x(an);
            ag.style.width = E.style.width;
            ag.style.top = parseInt(an * (S.subtitlePlacement / 100) - 30, 10) + "px";
            var al = R.naturalWidth;
            var ak = R.naturalHeight;
            var d = 0;
            if (S.logoHorzAlign == LogoAlign.RIGHT) {
                var aj = screen.width;
                d = aj - al
            }
            var ap = 0;
            if (S.logoVertAlign == LogoAlign.BOTTOM) {
                ap = an - ak
            }
            R.style.left = d + "px";
            R.style.top = ap + "px"
        } else {
            clearTimeout(y);
            p.style.visibility = "visible";
            document.body.style.cursor = "default";
            U.removeEventListener("mousemove", B);
            E.style.width = T;
            E.style.height = G;
            U.style.width = O;
            U.style.height = ac;
            p.style.position = V;
            p.style.top = D;
            p.style.left = P;
            p.style.width = j;
            p.classList.remove("fullscreen_controller");
            p.removeEventListener("mousemove", af);
            window.removeEventListener("resize", r);
            ab();
            A.style.width = E.style.width;
            var an = parseInt(U.style.height, 10);
            x(an);
            ag.style.width = E.style.width;
            ag.style.top = parseInt(an * (S.subtitlePlacement / 100) - 30, 10) + "px";
            var al = R.naturalWidth;
            var ak = R.naturalHeight;
            var d = 0;
            if (S.logoHorzAlign == LogoAlign.RIGHT) {
                var aj = parseInt(E.style.width, 10);
                d = aj - al
            }
            var ap = 0;
            if (S.logoVertAlign == LogoAlign.BOTTOM) {
                ap = an - ak
            }
            R.style.left = d + "px";
            R.style.top = ap + "px"
        }
        if (m._on_fullscreen_change) {
            for (var am in m._on_fullscreen_change) {
                m._on_fullscreen_change[am](ao)
            }
        }
    }
    document.addEventListener("fullscreenchange", k, false);
    document.addEventListener("webkitfullscreenchange", k, false);
    document.addEventListener("mozfullscreenchange", k, false);
    document.addEventListener("MSFullscreenChange", k, false);
    this.getRepeat = function() {
        return m.getRepeatStartTime() >= 0 && m.getRepeatEndTime() >= 0
    };
    this.setRepeat = function(aj) {
        if (aj) {
            m.setRepeatStartTime(0);
            m.setRepeatEndTime(ad.duration)
        } else {
            m.resetRepeatStartTime();
            m.resetRepeatEndTime()
        }
        if (m._on_repeat_change) {
            for (var d in m._on_repeat_change) {
                m._on_repeat_change[d](aj)
            }
        }
    };
    this.getRepeatStartTime = function() {
        if (a < 0 && ai >= 0) {
            return 0
        } else {
            return a
        }
    };
    this.setRepeatStartTime = function(d) {
        if (F != OpenState.OPENED) {
            return
        }
        if (a == d) {
            return
        }
        a = d;
        if (a >= 0 && a > m.getRepeatEndTime()) {
            a = m.getRepeatEndTime()
        }
        if (a > m.getCurrentPosition()) {
            m.setCurrentPosition(a)
        }
        if (m._on_repeat_range_change) {
            for (var aj in m._on_repeat_range_change) {
                m._on_repeat_range_change[aj](a, m.getRepeatEndTime())
            }
        }
    };
    this.resetRepeatStartTime = function() {
        m.setRepeatStartTime(-1)
    };
    this.getRepeatEndTime = function() {
        if (ai < 0 && a >= 0) {
            return ad.duration
        } else {
            return ai
        }
    };
    this.setRepeatEndTime = function(d) {
        if (F != OpenState.OPENED) {
            return
        }
        if (ai == d) {
            return
        }
        ai = d;
        if (m._on_repeat_range_change) {
            for (var aj in m._on_repeat_range_change) {
                m._on_repeat_range_change[aj](m.getRepeatStartTime(), ai)
            }
        }
    };
    this.resetRepeatEndTime = function() {
        m.setRepeatEndTime(-1)
    };
    this.getVisible = function() {
        ad.style.visibility != "hidden"
    };
    this.setVisible = function(d) {
        if (ad) {
            ad.style.visibility = d ? "visible" : "hidden"
        }
    };
    this.command = function(d, aj) {};
    this.getPlayTime = function() {
        if (f) {
            return f.getPlayedTime()
        }
        return 0
    };

    function h() {
        var an = new Date();
        var ak = an.getFullYear() + "/" + (an.getMonth() + 1) + "/" + an.getDate() + " " + an.getHours() + ":" + an.getMinutes() + ":" + an.getSeconds();
        var al = unescape(encodeURIComponent(encodeURIComponent(S.userId)));
        var aj = unescape(encodeURIComponent(encodeURIComponent(m.custom_log_extra)));
        var am = "user_id=" + al + "&player_id=" + m.getPID() + "&content_duration=" + parseInt(m.getDuration(), 10) + "&current_position=" + parseInt(m.getCurrentPosition(), 10) + "&played_time=" + f.getPlayedTime() + "&strong_played_time=" + f.getStrongPlayedTime() + "&tracker_time=" + f.getTrackerTime() + "&tracker_data=" + f.getTracker() + "&content_url=" + m.url() + "&extra_data=" + aj + "&begin_localtime=" + encodeURIComponent(z) + "&end_localtime=" + encodeURIComponent(ak);
        return am
    }

    function q(al) {
        F = al;
        if (al == OpenState.OPENING) {
            if (m._on_volume_change) {
                for (var d in m._on_volume_change) {
                    m._on_volume_change[d](ad.volume, ad.muted)
                }
            }
        } else {
            if (al == OpenState.OPENED) {
                C(function(am) {
                    m.ssn = am
                });
                s(function(am) {
                    if (am == "UnknownError") {
                        W(StarPlayerString.UNKNOWN);
                        m.close()
                    }
                });
                J = setInterval(function() {
                    M(function(am) {
                        if (am == "MultipleConnections") {
                            m.close();
                            W(K())
                        } else {
                            if (am == "DetectHardware") {
                                m.close();
                                W(StarPlayerString.MSG_DETECT_HARDWARE)
                            }
                        }
                    })
                }, 1000 * m.keepalive_interval);
                f = new StarPlayerTracker(m);
                if (typeof m.custom_log_url != "undefined") {
                    c = setInterval(function() {
                        var am = h();
                        Y(Base64.encode(am))
                    }, 30000)
                }
                if (typeof m.timelimit != "undefined") {
                    setInterval(function() {
                        var am = m.getCurrentPosition();
                        if (am >= m.timelimit) {
                            m.stop();
                            N(PlayState.COMPLETE)
                        }
                    }, 500)
                }
                if (typeof X.cc != "undefined" && X.cc != "") {
                    ag.style.display = "block";
                    ag.style.textAlign = "center";
                    ag.style.width = E.style.width;
                    var aj = parseInt(U.style.height, 10);
                    ag.style.top = parseInt(aj * (S.subtitlePlacement / 100) - 30, 10) + "px"
                }
                if (typeof S.logoUrl != "undefined" && S.logoUrl != "") {
                    R.src = S.logoUrl;
                    R.onload = function() {
                        R.style.display = "block";
                        var ap = R.naturalWidth;
                        var ao = R.naturalHeight;
                        R.style.width = ap + "px";
                        R.style.height = ao + "px";
                        var am = 0;
                        if (S.logoHorzAlign == LogoAlign.RIGHT) {
                            var an = parseInt(E.style.width, 10);
                            am = an - ap
                        }
                        var ar = 0;
                        if (S.logoVertAlign == LogoAlign.BOTTOM) {
                            var aq = parseInt(U.style.height, 10);
                            ar = aq - ao
                        }
                        R.style.left = am + "px";
                        R.style.top = ar + "px"
                    }
                }
            } else {
                if (al == OpenState.CLOSED) {
                    var ak = "";
                    if (typeof m.custom_log_url != "undefined" && f != null) {
                        ak = h()
                    }
                    e(Base64.encode(ak));
                    J = clearInterval(J);
                    if (f) {
                        clearInterval(c);
                        f = null
                    }
                }
            }
        }
        if (m._on_open_state_change) {
            for (var d in m._on_open_state_change) {
                m._on_open_state_change[d](F)
            }
        }
    }
    var aa = null;
    var ah = null;

    function x(d) {
        if (S.watermarkText == null || S.watermarkText == "undefined") {
            return
        }
        if (typeof S.watermarkInterval == "undefined") {
            S.watermarkInterval = 5
        }
        A.style.width = E.style.width;
        if (aa) {
            clearInterval(aa)
        }
        if (ah) {
            clearTimeout(ah)
        }
        if (S.watermarkHorzAlign == WatermarkAlign.RANDOM || S.watermarkVertAlign == WatermarkAlign.RANDOM) {
            aa = setInterval(function() {
                A.innerHTML = S.watermarkText;
                A.style.display = "block";
                if (S.watermarkHorzAlign == WatermarkAlign.RANDOM) {
                    var ak = "initial";
                    switch (Math.floor(Math.random() * 10000) % 3) {
                        case 0:
                            ak = "left";
                            break;
                        case 1:
                            ak = "center";
                            break;
                        case 2:
                            ak = "right";
                            break
                    }
                    A.style.textAlign = ak
                } else {
                    if (S.watermarkHorzAlign == WatermarkAlign.LEFT) {
                        A.style.textAlign = "left"
                    } else {
                        if (S.watermarkHorzAlign == WatermarkAlign.CENTER) {
                            A.style.textAlign = "center"
                        } else {
                            if (S.watermarkHorzAlign == WatermarkAlign.RIGHT) {
                                A.style.textAlign = "right"
                            }
                        }
                    }
                }
                if (S.watermarkVertAlign == WatermarkAlign.RANDOM) {
                    var aj;
                    switch (Math.floor(Math.random() * 10000) % 3) {
                        case 0:
                            aj = 0;
                            break;
                        case 1:
                            aj = d / 2 - 20;
                            break;
                        case 2:
                            aj = d - 40;
                            break
                    }
                    A.style.top = aj + "px"
                } else {
                    if (S.watermarkVertAlign == WatermarkAlign.TOP) {
                        A.style.top = "0px"
                    } else {
                        if (S.watermarkVertAlign == WatermarkAlign.CENTER) {
                            A.style.top = (d / 2 - 20) + "px"
                        } else {
                            if (S.watermarkVertAlign == WatermarkAlign.BOTTOM) {
                                A.style.top = (d - 40) + "px"
                            }
                        }
                    }
                }
                ah = setTimeout(function() {
                    A.style.display = "none"
                }, S.watermarkShowInterval * 1000)
            }, S.watermarkInterval * 1000)
        } else {
            A.innerHTML = S.watermarkText;
            A.style.display = "block";
            if (S.watermarkHorzAlign == WatermarkAlign.LEFT) {
                A.style.textAlign = "left"
            } else {
                if (S.watermarkHorzAlign == WatermarkAlign.CENTER) {
                    A.style.textAlign = "center"
                } else {
                    if (S.watermarkHorzAlign == WatermarkAlign.RIGHT) {
                        A.style.textAlign = "right"
                    }
                }
            }
            if (S.watermarkVertAlign == WatermarkAlign.TOP) {
                A.style.top = "0px"
            } else {
                if (S.watermarkVertAlign == WatermarkAlign.CENTER) {
                    A.style.top = (d / 2 - 20) + "px"
                } else {
                    if (S.watermarkVertAlign == WatermarkAlign.BOTTOM) {
                        A.style.top = (d - 40) + "px"
                    }
                }
            }
        }
    }

    function ab() {
        clearInterval(aa);
        clearTimeout(ah);
        aa = null;
        ah = null;
        if (A) {
            A.innerHTML = ""
        }
    }

    function N(ak) {
        t = ak;
        if (m._on_play_state_change) {
            for (var d in m._on_play_state_change) {
                m._on_play_state_change[d](t)
            }
        }
        if (ak == PlayState.PLAYING) {
            var aj = parseInt(U.style.height, 10);
            x(aj)
        } else {
            if (ak == PlayState.PAUSED) {
                ab()
            } else {
                if (ak == PlayState.STOPPED) {
                    ab();
                    if (ad) {
                        if (ad.currentTime > 0) {
                            u = ad.currentTime
                        }
                    }
                } else {
                    if (ak == PlayState.COMPLETE) {
                        if (a >= 0 || ai >= 0) {
                            if (parseInt(m.getRepeatEndTime(), 10) == parseInt(ad.duration, 10)) {
                                setTimeout(function() {
                                    m.play();
                                    m.setCurrentPosition(m.getRepeatStartTime())
                                }, 10)
                            }
                        }
                    }
                }
            }
        }
    }

    function I() {
        Q = false;
        N(PlayState.STOPPED);
        q(OpenState.CLOSED);
        m.resetRepeatStartTime();
        m.resetRepeatEndTime();
        if (m.onMuteChanged) {
            for (var d in m.onMuteChanged) {
                m.onMuteChanged[d](ad.muted)
            }
        }
    }
    this.setTimelimit = function(d) {
        m.timelimit = d
    };
    this.getPID = function() {
        return m.player_id
    };
    this.getMAC = function() {
        return m.mac_address
    };
    this.getSSN = function() {
        return m.ssn
    };
    this.getTrack = function() {
        if (f) {
            return f.getTracker()
        }
        return ""
    };
    this.setTrack = function(d) {
        if (f) {
            f.setHistory(d)
        }
    };
    this.getProgressRate = function() {
        if (f) {
            return f.getPercent()
        }
        return 0
    };
    this.getStopPosition = function() {
        return u
    };
    this.getSubtitle = function() {
        return m.subtitle
    };
    this.setSubtitle = function(d) {
        m.subtitle = d;
        if (d == SubTitle.NONE) {
            ag.style.display = "none"
        } else {
            ag.style.display = "block"
        }
    };
    this.setLogUrl = function(d) {
        m.custom_log_url = d
    };
    this.setLogExtraData = function(d) {
        m.custom_log_extra = d
    };
    if (ad) {
        ad.addEventListener("loadstart", function() {
            if (Q) {
                I()
            } else {
                q(OpenState.OPENING)
            }
        }, false);
        ad.addEventListener("loadeddata", function() {
            q(OpenState.OPENED)
        }, false);
        ad.addEventListener("durationchange", function() {}, false);
        ad.addEventListener("suspend", function() {}, false);
        ad.addEventListener("playing", function() {
            ad.controls = false;
            N(PlayState.PLAYING)
        }, false);
        ad.addEventListener("pause", function() {
            if (Z) {
                Z = false;
                N(PlayState.STOPPED);
                m.resetRepeatStartTime();
                m.resetRepeatEndTime()
            } else {
                N(PlayState.PAUSED)
            }
        }, false);
        ad.addEventListener("ended", function() {
            N(PlayState.COMPLETE);
            m.stop()
        }, false);
        ad.addEventListener("waiting", function() {
            ad.controls = false;
            if (m.onBufferingData) {
                m.onBufferingData(true)
            }
            if (!isEdge) {
                N(PlayState.BUFFERING_STARTED)
            }
        }, false);
        ad.addEventListener("error", function() {
            if (ad.src == "http://null/") {
                return
            }
            var d;
            switch (ad.error.code) {
                case 1:
                    d = StarPlayerString.MEDIA_ERR_ABORTED;
                    break;
                case 2:
                    d = StarPlayerString.MEDIA_ERR_NETWORK;
                    break;
                case 3:
                    d = StarPlayerString.MEDIA_ERR_DECODE;
                    break;
                case 4:
                    d = StarPlayerString.MEDIA_ERR_SRC_NOT_SUPPORTED;
                    break;
                default:
                    d = StarPlayerString.UNKNOWN;
                    break
            }
            I();
            W(d)
        }, false);
        ad.addEventListener("ratechange", function() {
            if (m._on_rate_change) {
                for (var d in m._on_rate_change) {
                    m._on_rate_change[d](ad.playbackRate)
                }
            }
        }, false);
        ad.addEventListener("volumechange", function() {
            if (m._on_volume_change) {
                for (var d in m._on_volume_change) {
                    m._on_volume_change[d](ad.volume, ad.muted)
                }
            }
        }, false);
        ad.addEventListener("timeupdate", function() {
            if (a >= 0 || ai >= 0) {
                if (ad.currentTime >= m.getRepeatEndTime()) {
                    ad.currentTime = m.getRepeatStartTime()
                }
            }
            if (m._on_update_time) {
                for (var d in m._on_update_time) {
                    m._on_update_time[d](ad.currentTime)
                }
            }
        }, false);
        ad.oncontextmenu = function() {
            return false
        }
    }
}

function StarPlayer_API(a) {
    var b = false;
    var d = -1;
    var c = -1;
    this.url = function() {
        return a.url
    };
    this.closeBrowser = function() {
        a.close_browser()
    };
    this.open_media = function(e, f) {
        a.open_media(e, f)
    };
    this.close_media = function() {
        a.close()
    };
    this.getDuration = function() {
        return a.duration
    };
    this.getCurrentPosition = function() {
        return a.current_position
    };
    this.setCurrentPosition = function(e) {
        a.current_position = e
    };
    this.getVolume = function() {
        return a.volume
    };
    this.setVolume = function(e) {
        a.volume = e
    };
    this.getMute = function() {
        return a.mute
    };
    this.setMute = function(e) {
        a.mute = e
    };
    this.getFullscreen = function() {
        return a.fullscreen
    };
    this.setFullscreen = function(e) {
        a.fullscreen = e
    };
    this.getRate = function() {
        return a.rate
    };
    this.setRate = function(e) {
        a.rate = e
    };
    this.getRepeat = function() {
        return a.repeat
    };
    this.setRepeat = function(e) {
        a.repeat = e
    };
    this.getRepeatStartTime = function() {
        return a.repeat_start_time
    };
    this.setRepeatStartTime = function(e) {
        a.repeat_start_time = e
    };
    this.getRepeatEndTime = function() {
        return a.repeat_end_time
    };
    this.setRepeatEndTime = function(e) {
        a.repeat_end_time = e
    };
    this.getPlayTime = function() {
        return a.play_time
    };
    this.initPlayTime = function() {
        a.init_play_time()
    };
    this.play = function() {
        a.play()
    };
    this.pause = function() {
        a.pause()
    };
    this.stop = function() {
        a.stop()
    };
    this.addEvent = function(e, f) {
        if (a.attachEvent) {
            a.attachEvent(e, f)
        } else {
            attachIE11Event(a, e, f)
        }
    };
    this.setOpenState = function(e) {
        d = e
    };
    this.getOpenState = function() {
        return d
    };
    this.setPlayState = function(e) {
        c = e
    };
    this.getPlayState = function() {
        return c
    };
    this.getTopmost = function() {
        return a.topmost
    };
    this.setTopmost = function(e) {
        a.topmost = e
    };
    this.getXHR = function() {
        return a.xml_http_request
    };
    this.getVisible = function() {
        return b
    };
    this.setVisible = function(e) {
        if (isIE()) {
            if (e) {
                a.style.position = "relative";
                a.style.left = "0px"
            } else {
                a.style.position = "absolute";
                a.style.left = "-9999999px"
            }
        } else {
            a.style.visibility = e ? "visible" : "hidden"
        }
        b = e
    };
    this.getVideoWidth = function() {
        return a.video_width
    };
    this.getVideoHeight = function() {
        return a.video_height
    };
    this.getBrightness = function() {
        return a.brightness
    };
    this.setBrightness = function(e) {
        a.brightness = e
    };
    this.getContrast = function() {
        return a.contrast
    };
    this.setContrast = function(e) {
        a.contrast = e
    };
    this.getSaturation = function() {
        return a.saturation
    };
    this.setSaturation = function(e) {
        a.saturation = e
    };
    this.getHue = function() {
        return a.hue
    };
    this.setHue = function(e) {
        a.hue = e
    };
    this.setCaption = function(e) {
        a.set_caption(e)
    };
    this.clearCaption = function() {
        a.set_caption(undefined)
    };
    this.callFunction = function(e) {
        return a.call_func(e)
    };
    this.captureFrame = function(e) {
        return a.capture_frame(e)
    };
    this.control_alpha_brain = function(f, e) {
        return a.control_alpha_brain(f, e)
    };
    this.getPID = function() {
        return a.pid
    };
    this.internetCheckConnection = function(e) {
        return a.is_internet_connection(e)
    };
    this.setTimelimit = function(e) {
        a.timelimit = e
    };
    this.getSSN = function() {
        return a.ssn
    };
    this.getMAC = function() {
        return a.mac_address
    };
    this.getTrack = function() {
        return a.track
    };
    this.setTrack = function(e) {
        a.track = e
    };
    this.getProgressRate = function() {
        return a.progress_rate
    };
    this.getStopPosition = function() {
        return a.stop_position
    };
    this.getSubtitle = function() {
        return a.subtitle
    };
    this.setSubtitle = function(e) {
        a.subtitle = e
    };
    this.getMaxBandwidth = function() {
        return a.max_bandwidth
    };
    this.getBandwidth = function() {
        return a.bandwidth
    };
    this.getBitrate = function() {
        return a.bitrate
    };
    this.getAvgFrameRate = function() {
        return a.avg_frame_rate
    };
    this.getTotalBytes = function() {
        return a.total_bytes
    };
    this.getReceivedBytes = function() {
        return a.received_bytes
    };
    this.setLogUrl = function(e) {
        a.custom_log_url = e
    };
    this.setLogExtraData = function(e) {
        a.custom_log_extra = e
    };
    this.setThumbnailRootUrl = function(e) {
        a.thumbnail_root_url = e
    }
}

function installStarPlayer() {
    var a = "<object classid='CLSID:99277D5A-52B3-4B2E-AC38-B0065575FC55' width='0' height='0' codebase='" + STARPLAYER_URL + "#version=" + STARPLAYER_VERSION + "' ></object>";
    document.body.innerHTML += a
}

function StarPlayer(e, c, h) {
    var p = this;
    var b = e.id ? e.id : "__starplayer";
    var g = b + "_controller";
    var m;
    var d = 10;
    var f = false;
    var l = false;
    var a = null;
    var n = x64() != true ? e.controllerUrl : e.controller64Url;

    function j(q) {
        k(e.videoContainer).innerHTML = "<table width='100%' height='100%' style='color:red;font-size:14px'><tr><td align='center' valign='middle'>" + q + "</td></tr></table>"
    }

    function k(q) {
        return document.getElementById(q)
    }

    function o() {
        p.onInit = e.onInit;
        p.onOpenStateChange = e.onOpenStateChange;
        p.onPlayStateChange = e.onPlayStateChange;
        p.onKeyDown = e.onKeyDown;
        p.onKeyUp = e.onKeyUp;
        p.onClick = e.onClick;
        p.onMouseDown = e.onMouseDown;
        p.onMouseUp = e.onMouseUp;
        p.onMouseDbclick = e.onMouseDbclcik;
        p.onMouseWheel = e.onMouseWheel;
        p.onFullscreen = e.onFullscreen;
        p.onRateChange = e.onRateChange;
        p.onCustom = e.onCustom;
        p.onSubtitle = e.onSubtitle;
        if (!e.userId) {
            e.userId = "ANONYMOUS"
        } else {
            if (String(e.userId).replace(/ /g, "").length == 0) {
                e.userId = "ANONYMOUS"
            }
        }
        if (!e.spkId) {
            e.spkId = ""
        }
        var F = 1;
        if (e.armode != undefined) {
            F = e.armode
        }
        if (e.watermarkTextSize) {
            var I = /.*%$/g;
            if (I.test(e.watermarkTextSize)) {
                e.watermarkTextSize = e.watermarkTextSize.replace(/%$/g, "")
            } else {
                e.watermarkTextSize = -e.watermarkTextSize
            }
        }
        if (typeof c.autoPlay == "undefined") {
            c.autoPlay = true
        }

        function u(P, O) {
            var M = STARPLAYER_VERSION.split(",");
            var L = P.split(O);

            function N(R) {
                var Q = parseInt(L[R]);
                var S = parseInt(M[R]);
                if (Q > S) {
                    return 1
                } else {
                    if (Q == S) {
                        if (R == 3) {
                            return 0
                        } else {
                            return N(R + 1)
                        }
                    } else {
                        return -1
                    }
                }
            }
            return N(0)
        }

        function z(P, O) {
            var M = STARPLAYER_AGENT_VERSION.split(",");
            var L = P.split(O);

            function N(R) {
                var Q = parseInt(L[R]);
                var S = parseInt(M[R]);
                if (Q > S) {
                    return 1
                } else {
                    if (Q == S) {
                        if (R == 3) {
                            return 0
                        } else {
                            return N(R + 1)
                        }
                    } else {
                        return -1
                    }
                }
            }
            return N(0)
        }

        function t() {
            try {
                var L = navigator.plugins.StarPlayer;
                if (!L) {
                    return false
                }
                if (u(L.description.split("/")[1], ".") == -1) {
                    return false
                }
                return true
            } catch (M) {
                return false
            }
        }

        function v() {
            k(e.videoContainer).innerHTML = "<table width='100%' height='100%' style='color:white;font-size:14px'><tr><td align='center' valign='middle'>" + StarPlayerString.INSTALL_PLUGIN + "</td></tr></table>";
            setInterval(function() {
                navigator.plugins.refresh();
                if (t()) {
                    location.reload()
                }
            }, 1000)
        }

        function D() {
            k(e.videoContainer).innerHTML = "<table width='100%' height='100%' style='color:white;font-size:14px'><tr><td align='center' valign='middle'>" + StarPlayerString.INSTALL_ACTIVEX + "</td></tr></table>"
        }

        function B() {
            k(e.videoContainer).innerHTML = "<table width='100%' height='100%' style='color:white;font-size:14px'><tr><td align='center' valign='middle'>" + StarPlayerString.INSTALL_AGENT + "</td></tr></table>"
        }

        function x() {
            m = new StarPlayer_API(window.external);
            i()
        }

        function w(L) {
            var O = k(e.videoContainer).style.width;
            O = O != "" ? O : "100%";
            var N = k(e.videoContainer).style.height;
            N = N != "" ? N : "100%";
            var M = "<object style='position:absolute;left:-9999999px;' id='" + b + "' classid='CLSID:99277D5A-52B3-4B2E-AC38-B0065575FC55' width='" + O + "' height='" + N + " codebase='" + STARPLAYER_URL + "#version=" + STARPLAYER_VERSION + "' ><param name='config' value='" + STARPLAYER_CONFIG_URL + "' /><param name='controller' value='" + n + "' /><param name='user_id' value='" + e.userId + "' /><param name='spk_id' value='" + e.spkId + "' /><param name='time_limit' value='" + c.previewTime + "' /><param name='auto_play' value='" + c.autoPlay + "' /><param name='video_armode' value='" + F + "' /><param name='cpcode' value='" + e.cpcode + "' /><param name='controller_container_hwnd' value='" + L + "' /><param name='controller_params' value='" + e.controllerParams + "' /><param name='enable_block_messenger' value='" + e.blockMessenger + "' /><param name='enable_block_virtual_machine' value='" + e.blockVirtualMachine + "' /><param name='enable_dual_monitor' value='" + e.dualMonitor + "' /><param name='closed_caption_size' value='" + e.captionSize + "' /><param name='watermark_text' value='" + e.watermarkText + "' /><param name='watermark_text_color' value='" + e.watermarkTextColor + "' /><param name='watermark_text_size' value='" + e.watermarkTextSize + "' /><param name='watermark_horz_align' value='" + e.watermarkHorzAlign + "' /><param name='watermark_vert_align' value='" + e.watermarkVertAlign + "' /><param name='watermark_interval' value='" + e.watermarkInterval + "' /><param name='watermark_show_interval' value='" + e.watermarkShowInterval + "' /><param name='auto_progressive_download' value='" + e.auto_progressive_download + "' /><param name='marker' value='" + c.marker + "' /><param name='controller_mode' value='" + e.controllerMode + "' /><param name='custom_log_url' value='" + c.logUrl + "' /><param name='custom_log_extra' value='" + c.logExtraData + "' /><param name='logo_url' value='" + e.logoUrl + "' /><param name='logo_horz_align' value='" + e.logoHorzAlign + "' /><param name='logo_vert_align' value='" + e.logoVertAlign + "' /><param name='subtitle_placement' value='" + e.subtitlePlacement + "' /></object>";
            k(e.videoContainer).innerHTML += M;
            if (e.visible != false) {
                k(b).style.position = "relative";
                k(b).style.left = "0px"
            }
            if (isAtLeastIE11) {
                if (k(b).object) {
                    m = new StarPlayer_API(k(b));
                    k(b).init();
                    i();
                    setTimeout(y, 10)
                } else {
                    D()
                }
            } else {
                k(b).onreadystatechange = function() {
                    if (this.object) {
                        m = new StarPlayer_API(k(b));
                        k(b).init();
                        i();
                        setTimeout(y, 10)
                    } else {
                        D()
                    }
                };
                if (k(b).object) {
                    k(b).onreadystatechange()
                }
            }
        }

        function E(L) {
            if (t()) {
                k(e.videoContainer).innerHTML += "<object style='visibility:hidden' id='" + b + "' width='100%' height='100%' type='application/x-starplayer' codebase='" + STARPLAYER_SETUP_URL + "#version=" + STARPLAYER_VERSION + "' ><param name='config' value='" + STARPLAYER_CONFIG_URL + "' /><param name='controller' value='" + n + "' /><param name='user_id' value='" + e.userId + "' /><param name='spk_id' value='" + e.spkId + "' /><param name='time_limit' value='" + c.previewTime + "' /><param name='auto_play' value='" + c.autoPlay + "' /><param name='video_armode' value='" + F + "' /><param name='cpcode' value='" + e.cpcode + "' /><param name='controller_container_hwnd' value='" + L + "' /><param name='controller_params' value='" + e.controllerParams + "' /><param name='enable_block_messenger' value='" + e.blockMessenger + "' /><param name='enable_block_virtual_machine' value='" + e.blockVirtualMachine + "' /><param name='enable_dual_monitor' value='" + e.dualMonitor + "' /><param name='closed_caption_size' value='" + e.captionSize + "' /><param name='watermark_text' value='" + e.watermarkText + "' /><param name='watermark_text_color' value='" + e.watermarkTextColor + "' /><param name='watermark_text_size' value='" + e.watermarkTextSize + "' /><param name='watermark_horz_align' value='" + e.watermarkHorzAlign + "' /><param name='watermark_vert_align' value='" + e.watermarkVertAlign + "' /><param name='watermark_interval' value='" + e.watermarkInterval + "' /><param name='watermark_show_interval' value='" + e.watermarkShowInterval + "' /><param name='auto_progressive_download' value='" + e.progressive_download + "' /><param name='marker' value='" + c.marker + "' /><param name='controller_mode' value='" + e.controllerMode + "' /><param name='custom_log_url' value='" + c.logUrl + "' /><param name='custom_log_extra' value='" + c.logExtraData + "' /><param name='logo_url' value='" + e.logoUrl + "' /><param name='logo_horz_align' value='" + e.logoHorzAlign + "' /><param name='logo_vert_align' value='" + e.logoVertAlign + "' /><param name='subtitle_placement' value='" + e.subtitlePlacement + "' /></object>";
                if (e.visible != false) {
                    k(b).style.visibility = "visible"
                }
                setTimeout(function() {
                    m = new StarPlayer_API(k(b));
                    setTimeout(function() {
                        i();
                        y()
                    }, 200)
                }, 50)
            } else {
                v()
            }
        }

        function J(L) {
            if (c.blockMessenger && !e.blockMessenger) {
                e.blockMessenger = c.blockMessenger
            }
            if (isIE()) {
                w(L)
            } else {
                E(L)
            }
        }

        function y() {
            if (p.onInit) {
                p.onInit()
            }
            if (typeof c.previewTime != "undefined") {
                m.setTimelimit(c.previewTime)
            }
            if (c.intro) {
                m.open_media(c.intro, null);
                m.setLogUrl("")
            } else {
                if (c.intro2) {
                    m.open_media(c.intro2, null);
                    m.setLogUrl("")
                } else {
                    if (c.url) {
                        m.open_media(c.url, c.cc);
                        if (typeof e.thumbnailRootUrl != "undefined") {
                            m.setThumbnailRootUrl(e.thumbnailRootUrl)
                        }
                    }
                }
            }
            f = true
        }

        function C() {
            var N = k(e.controllerContainer).style.width;
            N = N != "" ? N : "100%";
            var M = k(e.controllerContainer).style.height;
            M = M != "" ? M : "100%";
            k(e.controllerContainer).innerHTML = "<object style='position:absolute;left:-9999999px;' id='" + g + "' classid='CLSID:7A63FEE6-E174-4FBC-A064-875DB95594A6' width='" + N + "' height='" + M + "' codebase='" + STARPLAYER_URL + "#version=" + STARPLAYER_VERSION + "' ></object>";
            var L = k(g);
            L.onreadystatechange = function() {
                if (this.object) {
                    L.style.position = "relative";
                    L.style.left = "0px";
                    A()
                } else {
                    D()
                }
            };
            if (L.object) {
                L.onreadystatechange()
            } else {
                if (isAtLeastIE11) {
                    L.addEventListener("readystatechange", L.onreadystatechange, false)
                }
            }
        }

        function K() {
            if (t()) {
                if (!isMac()) {
                    k(e.controllerContainer).innerHTML = "<object id='" + g + "' type='application/x-starplayer' width='100%' height='100%'><param name='uimode' value='true' /></object>";
                    A()
                } else {
                    J(0)
                }
            } else {
                v()
            }
        }

        function s() {
            if (k(e.controllerContainer)) {
                if (isIE()) {
                    C()
                } else {
                    K()
                }
            } else {
                J(0)
            }
        }

        function A() {
            var L = k(g);
            if (L.HWND) {
                J(L.HWND)
            } else {
                var M = setInterval(function() {
                    if (L.HWND) {
                        clearInterval(M);
                        J(L.HWND)
                    }
                }, 1)
            }
        }
        this.toggleFullscreen = function() {
            if (m.getFullscreen()) {
                m.setFullscreen(false)
            } else {
                m.setFullscreen(true)
            }
        };

        function G() {
            var L = "<video style='visibility:hidden' id='" + b + "' width='100%' height='100%' preload ondblclick='toggleFullscreen()'></video>";
            L += "<div id='watermark'></div><div id='subtitle'></div><img id='logo'/>";
            k(e.videoContainer).innerHTML = L
        }
        if (!isChrome && !isEdge && !isFirefox && !isOpera) {
            k(e.videoContainer) ? s() : x()
        } else {
            if (!("WebSocket" in window)) {} else {
                var q = false;
                G();
                var H = ws_protocol + "://" + ws_host + ":" + ws_port + "/" + ws_separator;
                var r = new WebSocket(H);
                r.onopen = function(M) {
                    q = true;
                    var N = unescape(encodeURIComponent(encodeURIComponent(e.userId)));
                    var L = unescape(encodeURIComponent(encodeURIComponent(c.logExtraData)));
                    var O = '{"url" : "' + c.url + '","config" : "' + STARPLAYER_CONFIG_URL + '","user_id" : "' + N + '","spk_id" : "' + e.spkId + '","referer" : "' + window.parent.location.href + '","cpcode" : "' + e.cpcode + '","enable_block_messenger" : ' + e.blockMessenger + ',"enable_block_virtual_machine" : ' + e.blockVirtualMachine + ',"enable_dual_monitor" : ' + e.dualMonitor + ',"custom_log_url" : "' + c.logUrl + '","custom_log_extra" : "' + L + '"}';
                    r.send(O)
                };
                r.onmessage = function(L) {
                    var M = JSON.parse(L.data);
                    if (typeof M.version !== "undefined") {
                        if (z(M.version, ".") == -1) {
                            B()
                        } else {
                            if (!m) {
                                m = new StarPlayerHtml5(k(b), e, c);
                                if (e.visible != false) {
                                    m.setVisible(true)
                                }
                                m.player_id = M.player_id;
                                m.mac_address = M.mac_address;
                                m.websocket = r;
                                if (typeof M.keepalive_interval !== "undefined") {
                                    m.keepalive_interval = M.keepalive_interval
                                }
                                i();
                                setTimeout(y, 10)
                            }
                        }
                    }
                    if (typeof M.method !== "undefined") {
                        if (M.method == "keepalive") {
                            if (m._keepalive_callback) {
                                m._keepalive_callback(M.status)
                            }
                        } else {
                            if (M.method == "connection") {
                                if (m._connect_callback) {
                                    m._connect_callback(M.status, decodeURIComponent(M.msg), M.session_id)
                                }
                            } else {
                                if (M.method == "opened") {
                                    if (m._opened_callback) {
                                        m._opened_callback(M.status)
                                    }
                                } else {
                                    if (M.method == "ssn") {
                                        if (m._ssn_callback) {
                                            m._ssn_callback(M.value)
                                        }
                                    }
                                }
                            }
                        }
                    }
                };
                r.onclose = function(L) {};
                r.onerror = function() {
                    if (q == false) {
                        B()
                    }
                }
            }
        }
    }
    if (h) {
        if (k(b) && k(g)) {
            return
        }
    }
    o();
    this.bindEvent = function(q, r) {
        var s = "_on_" + q;
        if (!p[s]) {
            p[s] = []
        }
        p[s].push(r)
    };
    this.open_state_change = function(r) {
        if (m.setOpenState) {
            m.setOpenState(r)
        }
        switch (r) {
            case OpenState.CLOSING:
                break;
            case OpenState.CLOSED:
                break;
            case OpenState.OPENING:
                if (p.isIntroMovie() || p.isIntro2Movie() || p.isOutroMovie()) {
                    m.setLogUrl("");
                    m.setLogExtraData("")
                } else {
                    if (m.url() == c.url) {
                        if (typeof c.logUrl != "undefined") {
                            if (m.setLogUrl) {
                                m.setLogUrl(c.logUrl)
                            }
                            if (m.setLogExtraData) {
                                m.setLogExtraData(c.logExtraData)
                            }
                        }
                    }
                }
                break;
            case OpenState.OPENED:
                if (m.url() == c.url && c.startTime > 0) {
                    m.setCurrentPosition(c.startTime)
                }
                if (c.autoPlay) {
                    m.play()
                }
                break
        }
        if (p.onOpenStateChange) {
            p.onOpenStateChange(r)
        }
        if (p._on_open_state_change) {
            for (var q in p._on_open_state_change) {
                p._on_open_state_change[q](r)
            }
        }
    };
    this.play_state_change = function(r) {
        if (!m) {
            return
        }
        if (r != PlayState.COMPLETE) {
            if (m.setPlayState) {
                m.setPlayState(r)
            }
        }
        switch (r) {
            case PlayState.STOPPED:
                break;
            case PlayState.PLAYING:
                if (p.completeOutro) {
                    p.completeOutro = false;
                    if (c.intro) {
                        window.setTimeout(function() {
                            m.open_media(c.intro, null)
                        }, 10);
                        return
                    } else {
                        if (c.intro2) {
                            window.setTimeout(function() {
                                m.open_media(c.intro2, null)
                            }, 10);
                            return
                        } else {
                            if (c.url) {
                                window.setTimeout(function() {
                                    m.open_media(c.url, c.cc)
                                }, 10);
                                return
                            }
                        }
                    }
                }
                break;
            case PlayState.PAUSED:
                break;
            case PlayState.BUFFERING_STARTED:
                break;
            case PlayState.BUFFERING_STOPPED:
                break;
            case PlayState.COMPLETE:
                if (p.isIntroMovie()) {
                    if (c.intro2) {
                        window.setTimeout(function() {
                            m.open_media(c.intro2, null)
                        }, 10);
                        return
                    } else {
                        if (c.url) {
                            window.setTimeout(function() {
                                m.open_media(c.url, c.cc)
                            }, 10);
                            return
                        }
                    }
                } else {
                    if (p.isIntro2Movie()) {
                        if (c.url) {
                            window.setTimeout(function() {
                                m.open_media(c.url, c.cc)
                            }, 10);
                            return
                        }
                    } else {
                        if (p.isOutroMovie()) {
                            p.completeOutro = true
                        } else {
                            if (c.outro) {
                                window.setTimeout(function() {
                                    m.open_media(c.outro, null)
                                }, 10);
                                return
                            } else {}
                        }
                    }
                }
                break
        }
        if (p.onPlayStateChange) {
            p.onPlayStateChange(r)
        }
        if (p._on_play_state_change) {
            for (var q in p._on_play_state_change) {
                p._on_play_state_change[q](r)
            }
        }
    };
    this.position_change = function(r) {
        if (p.onPositionChange) {
            p.onPositionChange(r)
        }
        if (p._on_position_change) {
            for (var q in p._on_position_change) {
                p._on_position_change[q](r)
            }
        }
    };
    this.position_change2 = function(q, s) {
        if (p.onPositionChange2) {
            p.onPositionChange2(q, s)
        }
        if (p._on_position_change2) {
            for (var r in p._on_position_change2) {
                p._on_position_change2[r](q, s)
            }
        }
    };
    this.volume_change = function(s, r) {
        if (p.onVolumeChange) {
            p.onVolumeChange(s, r)
        }
        if (p._on_volume_change) {
            for (var q in p._on_volume_change) {
                p._on_volume_change[q](s, r)
            }
        }
    };
    this.rate_change = function(r) {
        if (p.onRateChange) {
            p.onRateChange(r)
        }
        if (p._on_rate_change) {
            for (var q in p._on_rate_change) {
                p._on_rate_change[q](r)
            }
        }
    };
    this.repeat_change = function(r) {
        if (p.onRepeatChange) {
            p.onRepeatChange(r)
        }
        if (p._on_repeat_change) {
            for (var q in p._on_repeat_change) {
                p._on_repeat_change[q](r)
            }
        }
    };
    this.repeat_range_change = function(s, q) {
        if (p.onRepeatRangeChange) {
            p.onRepeatRangeChange(s, q)
        }
        if (p._on_repeat_range_change) {
            for (var r in p._on_repeat_range_change) {
                p._on_repeat_range_change[r](s, q)
            }
        }
    };
    this.update_time = function(r) {
        if (p._on_update_time) {
            for (var q in p._on_update_time) {
                p._on_update_time[q](r)
            }
        }
    };
    this.key_down = function(q) {
        if (p.onKeyDown && (!isIE() || p.getFullscreen())) {
            p.onKeyDown(q)
        }
    };
    this.key_up = function(q) {
        if (p.onKeyUp) {
            p.onKeyUp(q)
        }
    };
    this.mouse_down = function(q, r) {
        if (p.onMouseDown) {
            p.onMouseDown(q, r)
        }
    };
    this.mouse_up = function(q, r) {
        if (p.onMouseUp) {
            p.onMouseUp(q, r)
        }
        if (p.onClick) {
            p.onClick(q, r)
        }
    };
    this.mouse_dbclick = function(q, r) {
        if (p.onMouseDbclick) {
            p.onMouseDbclick(q, r)
        }
    };
    this.mouse_wheel = function(q, s, r) {
        if (p.mouseWheelHandler) {
            p.mouseWheelHandler(q, s, r)
        }
    };
    this.error = function(q) {
        if (isNaN(q)) {
            m = null;
            j(q)
        }
        if (q >= 1000) {
            if (p.isIntroMovie()) {
                if (c.intro2) {
                    m.open_media(c.intro2, null)
                } else {
                    if (c.url) {
                        m.open_media(c.url, c.cc)
                    }
                }
                return true
            } else {
                if (p.isIntro2Movie()) {
                    m.open_media(c.url, c.cc);
                    return true
                }
            }
            p.setVisible(true)
        }
        if (p.onError) {
            p.onError(q)
        }
        if (p._on_error) {
            for (var r in p._on_error) {
                p._on_error[r](q)
            }
        }
    };
    this.close = function() {
        if (p.onClose) {
            if (!p.onClose()) {
                m.closeBrowser()
            }
        } else {
            m.closeBrowser()
        }
    };
    this.destroy = function() {
        if (p.onDestroy) {
            p.onDestroy()
        }
        if (p._on_destroy) {
            for (var q in p._on_destroy) {
                p._on_destroy[q]()
            }
        }
    };
    this.marker = function(x, w, r, y, t, u, s, q) {
        if (p.onMarker) {
            p.onMarker(x, w, r, y, t, u, s, q)
        }
        if (p._on_marker) {
            for (var v in p._on_marker) {
                p._on_marker[v](x, w, r, y, t, u, s, q)
            }
        }
    };
    this.custom = function(r, s) {
        if (p.onCustom) {
            p.onCustom(r, s)
        }
        if (p._on_custom) {
            for (var q in p._on_custom) {
                p._on_custom[q](r, s)
            }
        }
    };
    this.subtitle = function(s, r) {
        if (p.onSubtitle) {
            p.onSubtitle(s, r)
        }
        if (p._on_subtitle) {
            for (var q in p._on_subtitle) {
                p._on_subtitle[q](s, r)
            }
        }
    };
    this.fullscreen_change = function(r) {
        if (p.onFullscreen) {
            p.onFullscreen(r)
        }
        if (p._on_fullscreen_change) {
            for (var q in p._on_fullscreen_change) {
                p._on_fullscreen_change[q](r)
            }
        }
    };

    function i() {
        m.addEvent("open_state_change", function(q) {
            p.open_state_change(q)
        });
        m.addEvent("play_state_change", function(q) {
            p.play_state_change(q)
        });
        m.addEvent("position_change", function(q) {
            p.position_change(q)
        });
        m.addEvent("position_change2", function(q, r) {
            p.position_change2(q, r)
        });
        m.addEvent("volume_change", function(r, q) {
            p.volume_change(r, q)
        });
        m.addEvent("rate_change", function(q) {
            p.rate_change(q)
        });
        m.addEvent("repeat_change", function(q) {
            p.repeat_change(q)
        });
        m.addEvent("repeat_range_change", function(r, q) {
            p.repeat_range_change(r, q)
        });
        m.addEvent("update_time", function(q) {
            p.update_time(q)
        });
        m.addEvent("key_down", function(q) {
            p.key_down(q)
        });
        m.addEvent("key_up", function(q) {
            p.key_up(q)
        });
        m.addEvent("mouse_down", function(q, r) {
            p.mouse_down(q, r)
        });
        m.addEvent("mouse_up", function(q, r) {
            p.mouse_up(q, r)
        });
        m.addEvent("mouse_dbclick", function(q, r) {
            p.mouse_dbclick(q, r)
        });
        m.addEvent("mouse_wheel", function(q, s, r) {
            p.mouse_wheel(q, s, r)
        });
        m.addEvent("error", function(q) {
            p.error(q)
        });
        m.addEvent("close", function() {
            p.close()
        });
        m.addEvent("destroy", function() {
            p.destroy()
        });
        m.addEvent("marker", function(x, s, w, r, q, v, u, t) {
            p.marker(x, s, w, r, q, v, u, t)
        });
        m.addEvent("custom", function(q, r) {
            p.custom(q, r)
        });
        m.addEvent("subtitle", function(r, q) {
            p.subtitle(r, q)
        });
        if (!isMac()) {
            m.addEvent("fullscreen_change", function(q) {
                p.fullscreen_change(q)
            })
        }
    }
    this.closeBrowser = function() {
        m.closeBrowser()
    };
    this.open_media = function(q) {
        c = q;
        if (typeof c.previewTime != "undefined") {
            m.setTimelimit(c.previewTime)
        }
        if (typeof c.autoPlay == "undefined") {
            c.autoPlay = true
        }
        if (f) {
            if (m.set_media) {
                m.set_media(c)
            }
            if (c.intro) {
                m.open_media(c.intro)
            } else {
                if (c.intro2) {
                    m.open_media(c.intro2)
                } else {
                    m.open_media(c.url, c.cc)
                }
            }
        }
    };
    this.close_media = function() {
        if (m.close_media) {
            m.close_media()
        }
    };
    this.getDuration = function() {
        if (m) {
            return m.getDuration()
        }
        return 0
    };
    this.getCurrentPosition = function() {
        if (m) {
            return m.getCurrentPosition()
        }
        return 0
    };
    this.setCurrentPosition = function(q) {
        if (m) {
            if (q > m.getDuration()) {
                q = 0
            }
            m.setCurrentPosition(q)
        }
    };
    this.getVolume = function() {
        if (m) {
            return m.getVolume()
        }
        return 1
    };
    this.setVolume = function(q) {
        if (m) {
            if (q > 1) {
                q = 1
            } else {
                if (q < 0) {
                    q = 0
                }
            }
            m.setVolume(q)
        }
    };
    this.getMute = function() {
        if (m) {
            return m.getMute()
        }
        return false
    };
    this.setMute = function(q) {
        if (m) {
            m.setMute(q)
        }
    };
    this.getFullscreen = function() {
        return m.getFullscreen()
    };
    this.setFullscreen = function(r) {
        if (p._on_fullscreen_change) {
            for (var q in p._on_fullscreen_change) {
                p._on_fullscreen_change[q](r)
            }
        }
        if (p.onFullscreen) {
            if (p.onFullscreen(r)) {
                m.setFullscreen(r)
            }
        } else {
            m.setFullscreen(r)
        }
    };
    this.getRate = function() {
        if (m) {
            return m.getRate()
        } else {
            return 1
        }
    };
    this.setRate = function(q) {
        if (m) {
            if (q > 2) {
                q = 2
            }
            if (q < 0.5) {
                q = 0.5
            }
            m.setRate(q)
        }
    };
    this.getRepeat = function() {
        if (m) {
            return m.getRepeat()
        }
        return false
    };
    this.setRepeat = function(q) {
        if (m) {
            m.setRepeat(q)
        }
    };
    this.getRepeatStartTime = function() {
        return m.getRepeatStartTime()
    };
    this.setRepeatStartTime = function(q) {
        m.setRepeatStartTime(q)
    };
    this.getRepeatEndTime = function() {
        return m.getRepeatEndTime()
    };
    this.setRepeatEndTime = function(q) {
        m.setRepeatEndTime(q)
    };
    this.getPlayTime = function() {
        return m.getPlayTime()
    };
    this.initPlayTime = function() {
        return m.initPlayTime()
    };
    this.play = function() {
        if (m) {
            m.play()
        }
    };
    this.pause = function() {
        if (m) {
            m.pause()
        }
    };
    this.stop = function() {
        if (m) {
            m.stop()
        }
    };
    this.addEventListener2 = function(r, q) {
        if (r == StarPlayer.OpenStateChangeEvent) {
            m.onOpenStateChange = q
        } else {
            if (r == StarPlayer.PlayStateChangeEvent) {
                m.onPlayStateChange = q
            } else {
                if (r == StarPlayer.KeyDownEvent) {
                    m.onKeyDown = q
                } else {
                    if (r == StarPlayer.KeyUpEvent) {
                        m.onKeyUp = q
                    } else {
                        if (r == StarPlayer.MouseDownEvent) {
                            m.onMouseDown = q
                        } else {
                            if (r == StarPlayer.MouseUpEvent) {
                                m.onMouseUp = q
                            } else {
                                if (r == StarPlayer.MouseDbclickEvent) {
                                    m.onMouseDbclick = q
                                } else {
                                    if (r == StarPlayer.MouseWheelEvent) {
                                        m.mouseWheelHandler = q
                                    } else {
                                        if (r == StarPlayer.ClickEvent) {
                                            m.onClick = q
                                        } else {
                                            if (r == StarPlayer.FullscreenEvent) {
                                                m.onFullscreen = q
                                            } else {
                                                if (r == StarPlayer.RateChangeEvent) {
                                                    m.onRateChange = q
                                                } else {
                                                    if (r == StarPlayer.DestroyEvent) {
                                                        m.onDestroy = q
                                                    } else {
                                                        if (r == StarPlayer.MarkerEvent) {
                                                            m.onMarker = q
                                                        } else {
                                                            if (r == StarPlayer.PositionChange) {
                                                                m.onPositionChange = q
                                                            } else {
                                                                if (r == StarPlayer.PositionChange2) {
                                                                    m.onPositionChange2 = q
                                                                } else {
                                                                    if (r == StarPlayer.CustomEvent) {
                                                                        m.onCustom = q
                                                                    } else {
                                                                        if (r == StarPlayer.Subtitle) {
                                                                            m.onSubtitle = q
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    };
    this.getOpenState = function() {
        return m.getOpenState()
    };
    this.getPlayState = function() {
        if (m) {
            return m.getPlayState()
        } else {
            return PlayState.STOPPED
        }
    };
    this.backward = function(q) {
        if (m) {
            var r = m.getCurrentPosition() - (q ? q : d);
            if (r < 0) {
                r = 0
            }
            m.setCurrentPosition(r)
        }
    };
    this.forward = function(q) {
        if (m) {
            var r = m.getCurrentPosition() + (q ? q : d);
            if (r > m.getDuration()) {
                r = m.getDuration()
            }
            m.setCurrentPosition(r)
        }
    };
    this.getStep = function() {
        return d
    };
    this.setStep = function(q) {
        d = q
    };
    this.isIntroMovie = function() {
        return c.url != c.intro && c.url != c.intro2 && m.url() == c.intro
    };
    this.isIntro2Movie = function() {
        return c.url != c.intro && c.url != c.intro2 && m.url() == c.intro2
    };
    this.isOutroMovie = function() {
        return c.url != c.outro && m.url() == c.outro
    };
    this.getTopmost = function() {
        return m.getTopmost()
    };
    this.setTopmost = function(q) {
        m.setTopmost(q)
    };
    this.getXHR = function() {
        return m.getXHR()
    };
    this.setVisible = function(q) {
        m.setVisible(q)
    };
    this.getVideoWidth = function() {
        if (m.getVideoWidth) {
            return m.getVideoWidth()
        }
        return 0
    };
    this.getVideoHeight = function() {
        if (m.getVideoHeight) {
            return m.getVideoHeight()
        }
        return 0
    };
    this.getBrightness = function() {
        if (m.getBrightness) {
            return m.getBrightness()
        }
        return 0
    };
    this.setBrightness = function(q) {
        if (m.setBrightness) {
            m.setBrightness(q)
        }
    };
    this.getContrast = function() {
        if (m.getContrast) {
            return m.getContrast()
        }
        return 0
    };
    this.setContrast = function(q) {
        if (m.setContrast) {
            m.setContrast(q)
        }
    };
    this.getSaturation = function() {
        if (typeof m.saturation !== "undefined") {
            return m.saturation
        }
        return 0
    };
    this.setSaturation = function(q) {
        if (m.setSaturation) {
            m.setSaturation(q)
        }
    };
    this.getHue = function() {
        if (m.getHue) {
            return m.getHue()
        }
        return 0
    };
    this.setHue = function(q) {
        if (m.setHue) {
            m.setHue(q)
        }
    };
    this.getBlockMessenger = function() {
        return c.blockMessenger
    };
    this.setCaption = function(q) {
        if (m.setCaption) {
            m.setCaption(q)
        }
    };
    this.clearCaption = function() {
        if (m.clearCaption) {
            m.clearCaption()
        }
    };
    this.callFunction = function(q) {
        if (m.callFunction) {
            return m.callFunction(q)
        }
    };
    this.captureFrame = function(q) {
        if (m.captureFrame) {
            return m.captureFrame(q)
        }
    };
    this.getAlphaBrain = function() {
        function q() {
            var s = 1;
            var r = 4;
            var t = 40;
            this.initialize = function() {
                s = 1;
                r = 4;
                t = 40
            };
            this.start = function(u) {
                m.control_alpha_brain("AB_Start", u ? u : [s, r, t].join("/"))
            };
            this.stop = function() {
                m.control_alpha_brain("AB_Stop", "")
            };
            this.func = function(u) {
                s = u;
                m.control_alpha_brain("AB_Function", u.toString())
            };
            this.soundUp = function(u) {
                if (r + u > 20) {
                    return
                }
                r += u;
                m.control_alpha_brain("AB_Sound_up", u.toString())
            };
            this.soundDown = function(u) {
                if (r - u < 0) {
                    return
                }
                r -= u;
                m.control_alpha_brain("AB_Sound_down", u.toString())
            };
            this.volumeUp = function(u) {
                if (t + u > 100) {
                    return
                }
                t += u;
                m.control_alpha_brain("AB_Volume_up", u.toString())
            };
            this.volumeDown = function(u) {
                if (t - u < 0) {
                    return
                }
                t -= u;
                m.control_alpha_brain("AB_Volume_down", u.toString())
            };
            this.volumeMute = function() {
                m.control_alpha_brain("AB_Volume_Mute", "")
            }
        }
        if (!a) {
            a = new q()
        }
        return a
    };
    this.getPID = function() {
        return m.getPID()
    };
    this.getSessionId = function() {
        if (m.sessionid) {
            return m.sessionid()
        } else {
            return ""
        }
    };
    this.internetCheckConnection = function(q) {
        if (m.internetCheckConnection) {
            return m.internetCheckConnection(q)
        }
        return true
    };
    this.getSSN = function() {
        if (m.getSSN) {
            return m.getSSN()
        }
        return ""
    };
    this.getMAC = function() {
        return m.getMAC()
    };
    this.getTrack = function() {
        return m.getTrack()
    };
    this.setTrack = function(q) {
        m.setTrack(q)
    };
    this.getProgressRate = function() {
        return m.getProgressRate()
    };
    this.getStopPosition = function() {
        return m.getStopPosition()
    };
    this.getSubtitleUrl = function() {
        return c.cc
    };
    this.getSubtitle = function() {
        if (m.getSubtitle) {
            return m.getSubtitle()
        }
        return 0
    };
    this.setSubtitle = function(q) {
        if (m.setSubtitle) {
            m.setSubtitle(q)
        }
    };
    this.getMaxBandwidth = function() {
        if (m.getMaxBandwidth) {
            return m.getMaxBandwidth()
        }
        return 0
    };
    this.getBandwidth = function() {
        if (m.getBandwidth) {
            return m.getBandwidth()
        }
        return 0
    };
    this.getBitrate = function() {
        if (m.getBitrate) {
            return m.getBitrate()
        }
        return 0
    };
    this.getAvgFrameRate = function() {
        if (m.getAvgFrameRate) {
            return m.getAvgFrameRate()
        }
        return 0
    };
    this.getTotalBytes = function() {
        if (m.getTotalBytes) {
            return m.getTotalBytes()
        }
        return 0
    };
    this.getReceivedBytes = function() {
        if (m.getReceivedBytes) {
            return m.getReceivedBytes()
        }
        return 0
    }
}
StarPlayer.OpenStateChangeEvent = "Event.OpenStateChange";
StarPlayer.PlayStateChangeEvent = "Event.PlayStateChange";
StarPlayer.ClickEvent = "Event.Click";
StarPlayer.KeyDownEvent = "Event.KeyDown";
StarPlayer.KeyUpEvent = "Event.KeyUp";
StarPlayer.MouseDownEvent = "Event.MouseDown";
StarPlayer.MouseUpEvent = "Event.MouseDown";
StarPlayer.MouseDbclickEvent = "Event.MouseDbclick";
StarPlayer.MouseWheelEvent = "Event.MouseWheel";
StarPlayer.FullscreenEvent = "Event.Fullscreen";
StarPlayer.RateChangeEvent = "Event.RateChage";
StarPlayer.DestroyEvent = "Event.Destroy";
StarPlayer.MarkerEvent = "Event.Marker";
StarPlayer.PositionChange = "Event.PositionChange";
StarPlayer.PositionChange2 = "Event.PositionChange2";
StarPlayer.CustomEvent = "Event.Custom";
StarPlayer.Subtitle = "Event.Subtitle";

function StarPlayerTracker(n) {
    var e = this;
    var i = 0;
    var d = 0;
    var a;
    var f = null;
    var o = 0;
    var g = 0;
    var j = 0;
    var r = [];
    var h = false;
    n.addEvent("open_state_change", m);
    n.addEvent("play_state_change", q);
    n.addEvent("position_change2", c);

    function m(s) {
        if (s == OpenState.OPENED) {
            j = parseInt(n.getCurrentPosition(), 10);
            g = parseInt(n.getDuration(), 10)
        }
    }

    function q(s) {
        switch (s) {
            case PlayState.PLAYING:
                l();
                break;
            case PlayState.PAUSED:
                k();
                break;
            case PlayState.STOPPED:
                if (!h) {
                    c(j, o)
                }
                j = 0;
                h = false;
                k();
                break;
            case PlayState.BUFFERING_STARTED:
                k();
                break;
            case PlayState.COMPLETE:
                c(j, g);
                h = true;
                setTimeout(function() {
                    b(new Date().getTime(), g)
                }, 100);
                break
        }
    }

    function c(s, t) {
        if (t < j) {
            t = j
        }
        r.push([j, parseInt(t, 10)]);
        j = parseInt(s)
    }

    function p(t, u) {
        var s;
        u = u || [];
        for (s in t) {
            if (t.hasOwnProperty(s)) {
                u[s] = t[s]
            }
        }
        return u
    }
    this.getHistory = function() {
        var x = p(r);
        var w = n.getPlayState();
        if (w != PlayState.STOPPED && w != PlayState.COMPLETE) {
            var t = parseInt(n.getCurrentPosition(), 10);
            if (t < j) {
                t = j
            }
            x.push([j, t])
        }
        var s = [];
        var v = x.length;
        for (var u = 0; u < v; u += 1) {
            s.push([x[u][0], x[u][1]].join(":"))
        }
        return s.join(",")
    };
    this.setHistory = function(v) {
        var s = v.replace(/:/g, ",").split(",");
        var u = s.length;
        for (var t = 0; t < u; t += 2) {
            r.push([s[t], s[t + 1]])
        }
    };
    this.getTrackerTime = function() {
        var z = p(r);
        var t = n.getPlayState();
        if (t != PlayState.STOPPED && t != PlayState.COMPLETE) {
            var x = parseInt(n.getCurrentPosition(), 10);
            if (x < j) {
                x = j
            }
            z.push([j, x])
        }
        z.sort(function(E, D) {
            return E[0] - D[0]
        });
        var B, C, u, w, s;
        B = 0, C = 0, u = 0, w = 0, s = 0;
        var v = z.length;
        if (v > 0) {
            C = Number(z[0][0], 10);
            u = Number(z[0][1], 10);
            for (var y = 1; y < v; y += 1) {
                w = Number(z[y][0], 10);
                s = Number(z[y][1], 10);
                if (s != w) {
                    var A = u;
                    if (A > w) {
                        u = w
                    }
                    if (A > s) {
                        s = A
                    }
                    if (u - C > 0) {
                        B += (u - C)
                    }
                    C = w;
                    u = s
                }
            }
        }
        if (u - C > 0) {
            B += (u - C)
        }
        return B
    };
    this.getPercent = function() {
        var s = e.getTrackerTime();
        return parseInt(s / g * 100, 10)
    };
    this.getTracker = function() {
        var D = [];
        var y = p(r);
        var s = n.getPlayState();
        if (s != PlayState.STOPPED && s != PlayState.COMPLETE) {
            var w = parseInt(n.getCurrentPosition(), 10);
            if (w < j) {
                w = j
            }
            y.push([j, w])
        }
        y.sort(function(F, E) {
            return F[0] - E[0]
        });
        var B, u, C, t, A;
        B = 0, u = 0, C = 0, t = 0, A = 0;
        var v = y.length;
        if (v > 0) {
            u = Number(y[0][0], 10);
            C = Number(y[0][1], 10);
            for (var x = 1; x < v; x += 1) {
                t = Number(y[x][0], 10);
                A = Number(y[x][1], 10);
                if (t != A) {
                    var z = C;
                    if (z > t && z < A) {
                        C = A
                    }
                    if (z < t) {
                        D.push([u, C].join(":"));
                        u = t;
                        C = A
                    }
                }
            }
            D.push([u, C].join(":"))
        }
        return D.join(",")
    };
    this.getStrongPlayedTime = function() {
        return parseInt(i, 10)
    };
    this.getPlayedTime = function() {
        return parseInt(d, 10)
    };

    function l() {
        a = new Date().getTime();
        if (f == null) {
            f = setInterval(function() {
                b(new Date().getTime(), parseInt(n.getCurrentPosition(), 10))
            }, 1000)
        }
    }

    function k() {
        clearInterval(f);
        f = null
    }

    function b(u, v) {
        if (v > 0) {
            o = parseInt(v, 10)
        }
        var t = new Number(n.getRate());
        var s = u - a;
        if (s < 2000) {
            i += s * t.toFixed(1) / 1000;
            d += s / 1000
        }
        a = u;
        $("#debug1").text("Progress : " + e.getPercent() + "%");
        $("#debug2").text("History : " + e.getHistory());
        $("#debug3").text("Tracker : " + e.getTracker())
    }
}
var Base64 = {
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    encode: function(c) {
        var a = "";
        var k, h, f, j, g, e, d;
        var b = 0;
        c = Base64._utf8_encode(c);
        while (b < c.length) {
            k = c.charCodeAt(b++);
            h = c.charCodeAt(b++);
            f = c.charCodeAt(b++);
            j = k >> 2;
            g = ((k & 3) << 4) | (h >> 4);
            e = ((h & 15) << 2) | (f >> 6);
            d = f & 63;
            if (isNaN(h)) {
                e = d = 64
            } else {
                if (isNaN(f)) {
                    d = 64
                }
            }
            a = a + this._keyStr.charAt(j) + this._keyStr.charAt(g) + this._keyStr.charAt(e) + this._keyStr.charAt(d)
        }
        return a
    },
    decode: function(c) {
        var a = "";
        var k, h, f;
        var j, g, e, d;
        var b = 0;
        c = c.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        while (b < c.length) {
            j = this._keyStr.indexOf(c.charAt(b++));
            g = this._keyStr.indexOf(c.charAt(b++));
            e = this._keyStr.indexOf(c.charAt(b++));
            d = this._keyStr.indexOf(c.charAt(b++));
            k = (j << 2) | (g >> 4);
            h = ((g & 15) << 4) | (e >> 2);
            f = ((e & 3) << 6) | d;
            a = a + String.fromCharCode(k);
            if (e != 64) {
                a = a + String.fromCharCode(h)
            }
            if (d != 64) {
                a = a + String.fromCharCode(f)
            }
        }
        a = Base64._utf8_decode(a);
        return a
    },
    _utf8_encode: function(b) {
        b = b.replace(/\r\n/g, "\n");
        var a = "";
        for (var e = 0; e < b.length; e++) {
            var d = b.charCodeAt(e);
            if (d < 128) {
                a += String.fromCharCode(d)
            } else {
                if ((d > 127) && (d < 2048)) {
                    a += String.fromCharCode((d >> 6) | 192);
                    a += String.fromCharCode((d & 63) | 128)
                } else {
                    a += String.fromCharCode((d >> 12) | 224);
                    a += String.fromCharCode(((d >> 6) & 63) | 128);
                    a += String.fromCharCode((d & 63) | 128)
                }
            }
        }
        return a
    },
    _utf8_decode: function(a) {
        var b = "";
        var d = 0;
        var e = c1 = c2 = 0;
        while (d < a.length) {
            e = a.charCodeAt(d);
            if (e < 128) {
                b += String.fromCharCode(e);
                d++
            } else {
                if ((e > 191) && (e < 224)) {
                    c2 = a.charCodeAt(d + 1);
                    b += String.fromCharCode(((e & 31) << 6) | (c2 & 63));
                    d += 2
                } else {
                    c2 = a.charCodeAt(d + 1);
                    c3 = a.charCodeAt(d + 2);
                    b += String.fromCharCode(((e & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    d += 3
                }
            }
        }
        return b
    }
};