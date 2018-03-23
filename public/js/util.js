/**
 * 콤마(,)를 추가하여 리턴 (가격)
 * @param value
 * @returns {string}
 */
function addComma(value) {
    return value.toString().replace(/\D/g, "")
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}

/**
 * array -> json 으로 변환
 * @param data
 * @returns {{}}
 */
function arrToJson(data) {
    var json = {};
    $.each(data, function(idx, ele){
        json[ele.name] = ele.value;
    });

    return json;
}

/**
 * checkbox 전체선택/해제
 * @param target_selector
 * @param click_selector
 */
function checkAll(target_selector, click_selector) {
    var $target = $(target_selector);
    var $click = $(click_selector);

    $target.prop('checked', $click.eq(0).is(':checked'));
}

/**
 * iCheck checkbox 전체선택/해제
 * @param target_selector
 * @param click_selector
 */
function iCheckAll(target_selector, click_selector) {
    var $target = $(target_selector);
    var $click = $(click_selector);

    $target.prop('checked', $click.eq(0).is(':checked')).iCheck('update');
}

/**
 * to query string from datatable ajax params
 * @param $datatable
 * @returns {string}
 */
function dtParamsToQueryString($datatable) {
    var $search_form = $('#search_form');
    if (typeof $datatable === 'undefined' || typeof $search_form === 'undefined') {
        return '';
    }

    var json = $datatable.ajax.params() || arrToJson($search_form.serializeArray());
    // unset csrf token
    delete json._csrf_token;

    return '?q=' + Base64.encode(JSON.stringify(json));
}

/**
 * get query string
 * @returns {string}
 */
function getQueryString() {
    return location.search;
}

/**
 * data가 json 형식인지 체크
 * @param data
 * @returns {boolean}
 */
function isJson(data) {
    if (typeof data != 'string') {
        data = JSON.stringify(data);
    }     

    try {
        JSON.parse(data);
        return true;
    } catch (e) {
        return false;
    }    
}

/**
 * 메일 도메인 셋팅
 * @param select
 * @param target
 * @param data
 */
function setMailDomain(select, target, data) {
    var $select = $('#' + select);
    var $target = $('#' + target);

    if ($select.val() != '') {
        $target.val($select.val());
        $target.prop('readonly', true);
    } else {
        $target.val('');
        $target.prop('readonly', false);
    }

    if (typeof data != 'undefined') {
        $select.val(data);
        if ($select.children('option:selected').length < 1) {
            $select.val('');
        }
        $select.change();
        $target.val(data);
    }
}

/**
 * 관리자 메뉴 (사이드바) 강제 Active
 * @param menu_link
 */
function forceMenuActive(menu_link) {
    $('#sidebar-menu').find('a[href="' + menu_link + '"]').parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active');
}

/**
 * open notify alert layer
 * @param type notify type : error, success, info, warning
 * @param title
 * @param text
 * @param delay
 * @param hide
 * @param center true 일 경우 center에 표시
 */
function notifyAlert(type, title, text, delay, hide, center) {
    title = title || "알림";
    delay = delay || 3000;
    hide = (typeof(hide) == "undefined" || hide == null) ? true : hide;
    center = (center == true)? {"dir1": "down", "dir2": "right", "firstpos1": ($(window).height()/2 -150), "firstpos2": ($(window).width()/2 - 150)} : "";

    new PNotify({
        type: type,
        title: title,
        text: text,
        hide: hide,
        delay: delay,
        stack: center,
        addclass: 'alert-' + type
    });
}

/**
 * open popup
 * @param url
 * @param name
 * @param width
 * @param height
 * @param xpos
 * @param ypos
 */
var popupWins = new Array();

function popupOpen(url, name, width, height, xpos, ypos) {
    try{
        name =  name || '_blank';
        xpos = xpos || (screen.availWidth-width)/2;
        ypos = ypos || (screen.availHeight-height)/2;

        if ( typeof( popupWins[name] ) != "object" ){
            popupWins[name] = window.open(url, name, 'width='+width+', height='+height+', left='+xpos+', top='+ypos+', menubar`o, status=no, toolbar=no, scrollbars=no, resizable=yes');
        } else {
            if (!popupWins[name].closed){
                popupWins[name].location.href = url;
            } else {
                popupWins[name] = window.open(url, name, 'width='+width+', height='+height+', left='+xpos+', top='+ypos+', menubar=no, status=no, toolbar=no, scrollbars=no, resizable=yes');
            }
        }

    }catch(e){

    }
}

/**
 * query string to json
 * @param qs
 * @returns {{}}
 */
function queryStringToJson(qs) {
    qs = qs || location.search.substr(1);
    var json = {};
    var data = qs.split('&');

    $.each(data, function(idx, ele){
        var pos = ele.indexOf('=');
        json[ele.substr(0, pos)] = ele.substr(pos+1) || '';
    });

    return json;
}

/**
 * ajax function
 * @param url
 * @param data is_file = false인 경우는 seialize된 데이터 (json), is_file = true인 경우는 FormData로 전송 필요
 * @param callback
 * @param error_callback
 * @param async
 * @param method
 * @param data_type
 * @param is_file
 */
function sendAjax(url, data, callback, error_callback, async, method, data_type, is_file) {
    $("button, .btn").prop("disabled",true);
    if(typeof is_file == 'undefined') is_file = false;
    var process_data = true;
    var content_type = 'application/x-www-form-urlencoded; charset=UTF-8';
    if(is_file){
        process_data = false;
        content_type = false;
        method = method=='GET' ? 'POST' : method; // file upload는 get 방식 불가
    }

    $.ajax({
        type: ((typeof method != 'undefined') ? method : 'POST'),
        url: url,
        data: data,
        async: (typeof async != 'undefined') ? async : false,
        processData: process_data,
        contentType: content_type,
        dataType: (typeof data_type != 'undefined') ? data_type : 'json'
    }).success(function (data, status, req) {
        if(typeof callback === "function") {
            callback(data);
        }
        $("button, .btn").prop("disabled", false);
    }).error(function(req, status, err) {
        if(typeof error_callback === "function") {
            var ret = req.responseText;
            if (isJson(ret) === true) {
                // json parser
                ret = JSON.parse(ret);
            }
            error_callback(ret, req.status);
        }
        $("button, .btn").prop("disabled", false);
    });
}

/**
 * sendAjax 에러 콜백
 * @param result
 * @param status
 */
function showError(result, status) {
    if (status === 401) {  //권한 없음 || 미로그인
        notifyAlert('error', '알림', '권한이 없습니다.');
    } else if (status === 403) {
        notifyAlert('error', '알림', (result.ret_msg) ? result.ret_msg : '토큰 정보가 올바르지 않습니다.');
    } else if (status === 422) {
        notifyAlert('error', '알림', '필수 파라미터 오류입니다.');
    } else {
        notifyAlert('error', '알림', result.ret_msg);
    }
}

/**
 * Datetimepicker 디폴트 날짜 세팅
 * 기능 : 오늘, 일주일, 한달 등...
 * @param i_period (ex. -1, 0, 1 ...)
 * @param s_period_type (ex. days, weeks, months ...)
 * @param sdate_id_name (ex. id="sDate" id name)
 * @param edate_id_name (ex. id="eDate" id name)
 */
function setDefaultDatepicker(i_period, s_period_type, sdate_id_name, edate_id_name) {
    var return_data = computeDate(i_period, s_period_type);

    $('#' + sdate_id_name).val(return_data['s_start_date']);
    $('#' + edate_id_name).val(return_data['s_end_date']);
}

/**
 * 날짜 계산
 * @param i_period
 * @param s_period_type
 * @returns {any[]}
 */
function computeDate(i_period, s_period_type) {
    var return_arr = new Array();
    var s_start_date = "";
    var s_end_date = "";

    if(s_period_type == 'days' || s_period_type == 'weeks' || s_period_type == 'months') {
        var calc_date = moment().add(i_period, s_period_type).format('YYYY-MM-DD');
        if(i_period >= 0) {
            // s_period = moment().format('YYYY-MM-DD') + ' - ' + calc_date;
            s_start_date = moment().format('YYYY-MM-DD');
            s_end_date = calc_date;
        } else{
            s_start_date = calc_date;
            s_end_date = moment().format('YYYY-MM-DD');
        }
    } else if(s_period_type == 'mon') {
        s_start_date = moment().add(i_period, 'months').date(1).format('YYYY-MM-DD');
        s_end_date = moment().add(i_period, 'months').endOf('month').format('YYYY-MM-DD');
    } else if(s_period_type == 'all') {
        s_start_date = '';
        s_end_date = '';
    }

    return_arr['s_start_date'] = s_start_date;
    return_arr['s_end_date'] = s_end_date;

    return return_arr;
}

/**
 * Layer popup
 * Modal Close 버튼이 있는 경우 id를 btn_modal_close로 지정해야 Modal 창이 닫힘
 * 사용 예
 *  $('#regist_btn').setLayer({
 *      "url" : "/sample/index",
 *      "add_param" : [
 *          {'id' : 'service_id', 'name' : '서비스 아이디', 'required' : true}
 *      ]
 *  });
 */
(function($){
    var modal_html = '<div class="modal fade" id="pop_modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content">...</div></div></div>';

    $.fn.setLayer = function(options){
        var settings = $.extend({
            url : "",
            // add_param_type : add_param을 가져올 유형
            // 1) input : ID가 name 파라미터인 input을 찾아 해당 value를 ajax get의 파라미터로 함께 넘겨준다.
            // 2) attr_param : 클릭된 버튼의 data-ID 어트리뷰트의 value를 ajax get 의 파라미터로 함께 넘겨준다.
            // 3) attr_url : 클릭된 버튼의 data-ID 어트리뷰트의 value를 ajax get의 url로 함께 넘겨준다. url/param1_value/param2_value => 순서는 add_param 순서이다.
            add_param_type : 'input',
            add_param : [],  // 추가로 넘겨주는 값  ex) [{id : 'service_id', 'name' : '서비스 아이디', 'required' : true}
            width : "620",
            max_height : "400",   // scroll/hidden 일 경우만 쓰임
            overflow : "auto",
            backdrop : 'static'     // true : 배경 포함, 클릭시 닫힘 / false : 배경 없음, 클릭시 닫히지 않음 / 'static' : 배경 포함, 클릭시 닫히지 않음
        }, options);
        this.css('cursor','pointer');

        if(settings.add_param.constructor !== Array) {
            settings.add_param = [settings.add_param];
        }

        $(document).off("click", this.selector);
        $(document).on("click", this.selector ,function(){
            var event_btn = $(this);

            for (var i = settings.add_param.length - 1; i >= 0; i--) {
                var _param = settings.add_param[i];
                if(_param.required){
                    var _param_value = '';
                    if(settings.add_param_type == 'input' && $("#"+_param.id).length >0) {
                        _param_value = $("#"+_param.id).val();
                    } else if(settings.add_param_type == 'attr_param' || settings.add_param_type == 'attr_url') {
                        _param_value = event_btn.attr('data-'+_param.id);
                    }

                    if(_param_value == ''){
                        alert(_param.name + '을 먼저 선택 하셔야 야 합니다.');
                        return false;
                    }
                }
            };

            $('body').append(modal_html);
            var pop_modal = $("#pop_modal");

            pop_modal.modal({
                show: 'false',
                backdrop: settings.backdrop
            }).on('hidden.bs.modal', function(){
                $(this).remove();
            });

            var callback = function(d){
                if(d=='fail') {
                    notifyAlert('error', '알림', '표시할 내역이 없습니다.');
                    pop_modal.modal("toggle");
                } else if(d.substr(0, 3) == 'ERR') {
                    notifyAlert('error', '에러', d.substr(4));
                    pop_modal.modal("toggle");
                } else {
                    pop_modal.find(".modal-content").html(d).end()
                        .find(".modal-dialog").css("width",settings.width+"px").end();
                    if(settings.overflow == 'scroll' || settings.overflow == 'hidden') {
                        pop_modal.find(".modal-content .box-body").css({
                            "overflow-y" : settings.overflow
                            , "max-height" : settings.max_height+"px"
                        });
                    }

                    pop_modal.find(".modal-content").on("click", "#btn_modal_close", function(event){
                        pop_modal.modal("toggle");
                        event.preventDefault();
                    });
                }
            };

            var _url = settings.url;
            var _data = {};
            for (var i = 0; i < settings.add_param.length; i++) {
                var _param = settings.add_param[i];
                var _param_value = null;
                if(settings.add_param_type == 'input') {
                    _param_value = $("#"+_param.id).val();
                    if(_param_value) _data[_param.id] = _param_value;
                } else if(settings.add_param_type == 'attr_param') {
                    _param_value = event_btn.attr('data-'+_param.id);
                    if(_param_value) _data[_param.id] = _param_value;
                } else if(settings.add_param_type == 'attr_url') {
                    _param_value = event_btn.attr('data-'+_param.id);
                    _url += '/' + _param_value
                }
            };

            sendAjax(_url, _data, callback, function(req, status, err){
                showError(req, status);
                pop_modal.modal("toggle");
            }, false, 'GET', 'html');
        });

        return this;
    };
}(jQuery));
