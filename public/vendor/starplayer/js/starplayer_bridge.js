function DownloadStatus() {}
DownloadStatus.PENDING = 1;
DownloadStatus.CONNECTED = 2; //deprecated. no longer support.
DownloadStatus.PROGRESS = 3;
DownloadStatus.ERROR = -1;
DownloadStatus.PAUSED = -2;
DownloadStatus.COMPLETED = -3;

function StarPlayerBridge() {
    var self = this;
    var bridge = null;

    function setupWebViewJavascriptBridge(callback) {
        if (window.WebViewJavascriptBridge) {
            return callback(WebViewJavascriptBridge);
        }

        if (window.WVJBCallbacks) {
            return window.WVJBCallbacks.push(callback);
        }

        window.WVJBCallbacks = [callback];

        var WVJBIframe = document.createElement('iframe');
        WVJBIframe.style.display = 'none';
        WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
        //WVJBIframe.src = 'https://__bridge_loaded__';
        document.documentElement.appendChild(WVJBIframe);
        setTimeout(function() {
            document.documentElement.removeChild(WVJBIframe)
        }, 0)
    }

    setupWebViewJavascriptBridge(function(bridge) {
        self.bridge = bridge;
        bridge.registerHandler('initEvent', function(data) {
            self.initEvent();
        })

        bridge.registerHandler('downloadEvent', function(data) {
            var j = JSON.parse(data);
            self.downloadEvent(j);
        })


        bridge.registerHandler('playerClosedEvent', function(data) {
            var j = JSON.parse(data);
            self.playerClosedEvent(j);
        })
    });

    this.initEvent = function() {
        if (self._on_initEvent) {
            for (var i in self._on_initEvent) {
                self._on_initEvent[i]();
            }
        }
    }

    this.downloadEvent = function(data) {
        if (self._on_downloadEvent) {
            for (var i in self._on_downloadEvent) {
                self._on_downloadEvent[i](data.url, data.status, data.sofarBytes, data.totalBytes);
            }
        }
    }

    this.playerClosedEvent = function(data) {
        if (self._on_playerClosedEvent) {
            for (var i in self._on_playerClosedEvent) {
                self._on_playerClosedEvent[i](data.url, data.contentId, data.currentPosition);
            }
        }
    }

    this.bindEvent = function(name, value) {
        var id = "_on_" + name;
        if (!self[id])
            self[id] = [];
        self[id].push(value);
    }

    this.login = function(token) {
        alert(1);
        var obj = {"func":"login", "token":token};
        alert(2);
        self.bridge.callHandler('StarPlayer', obj, function(response) { alert('OK');});
        alert(3);
    }

    this.logout = function() {
        var obj = {"func":"logout"};
        self.bridge.callHandler('StarPlayer', obj, function(response) {});
    }

    this.getToken = function(callback) {
        var obj = {"func":"getToken"};
        self.bridge.callHandler('StarPlayer', obj, function(response) {
            if (callback) {
                var j = JSON.parse(response);
                callback(j.token);
            }
        });
    }

    this.getDeviceId = function(callback) {
        var obj = {"func":"getDeviceId"};
        self.bridge.callHandler('StarPlayer', obj, function(response) {
            if (callback) {
                var j = JSON.parse(response);
                callback(j.deviceId);
            }
        });
    }

    this.getDeviceInfo = function(callback) {
        var obj = {"func":"getDeviceInfo"};
        self.bridge.callHandler('StarPlayer', obj, function(response) {
            if (callback) {
                var j = JSON.parse(response);
                callback(j.deviceId, j.deviceName, j.deviceModel);
            }
        });
    }

    this.setCategoryInfo = function(info) {
        var obj = {
            "func":"setCategory",
            "category":info.category,
            "thumbnail":info.thumbnail,
            "desc":info.desc,
            "teacher":info.teacher
        };
        self.bridge.callHandler('StarPlayer', obj, function(response) {});
    }

    this.multiDownload = function(list) {
        var obj = {
            "func":"multiDownload",
            "list": list
        };
        self.bridge.callHandler('StarPlayer', obj, function(response) {});
    }

    this.getDownloadStatus = function(media, callback) {
        var obj = {
            "func":"getDownloadStatus",
            "category":media.category,
            "url":media.url
        };
        self.bridge.callHandler('StarPlayer', obj, function(response) {
            if (callback) {
                var j = JSON.parse(response);
                callback(j.url, j.status, j.sofarBytes, j.totalBytes);
            }
        });
    }

    this.pauseDownload = function(media) {
        var obj = {
            "func":"pause_download",
            "category":media.category,
            "url":media.url
        };
        self.bridge.callHandler('StarPlayer', obj, function(response) {});
    }

    this.streaming = function(media) {
        var obj = {
            "func":"streaming",
            "url":media.url,
            "cc":media.cc,
            "position":media.position,
            "tracker":media.tracker,
            "title":media.title,
            "qna_url":media.qna_url,
            "content_id":media.content_id,
            "subpage":media.subpage,
            "begin":media.begin,
            "end":media.end,
            "intros":media.intros
        };
        self.bridge.callHandler('StarPlayer', obj, function(response) {});
    }


    this.iap = function(iap_info) {
        var obj = {
            "func":"iap",
            "token":iap_info.token,
            "package_name":iap_info.package_name,
            "service_manager":iap_info.service_manager,
            "product_id":iap_info.product_id
        };
        self.bridge.callHandler('StarPlayer', obj, function(response) {});
    }
}