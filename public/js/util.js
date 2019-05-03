/**
 * 샘플강좌 플레이어
 * @param $prodCode
 * @param $unitIdx
 * @param $quility
 */
function fnPlayerSample($prodCode, $unitIdx, $quility){
    popupOpen(app_url('/Player/Sample/'+$prodCode+'/'+$unitIdx+'/'+$quility, 'www'), 'Player', '1000', '600', null, null, 'no', 'no');
}

/**
 * 샘플강좌 플레이어
 * @param $prodCode
 * @param $unitIdx
 * @param $quility
 */
function fnPlayerFree($prodCode, $unitIdx, $quility){
    popupOpen(app_url('/Player/Free/'+$prodCode+'/'+$unitIdx+'/'+$quility, 'www'), 'Player', '1000', '600', null, null, 'no', 'no');
}

/**
 * 강사 소개 플레이어
 * @param $ProfessorCode
 * @param $viewType ( OT | WS | S1 | S2 | S3 )
 */
function fnPlayerProf($ProfessorCode, $viewType){
    popupOpen(app_url('/Player/Professor/'+$ProfessorCode+'/'+$viewType+"/_", 'www'), 'Player', '1000', '600', null, null, 'no', 'no');
}

/**
 * 일반강좌 플레이어
 */
function fnPlayer($OrderIdx, $ProdCode, $subProdCode, $lecIdx, $unitIdx, $quility){
    popupOpen(app_url('/Player/?o='+$OrderIdx+'&p='+$ProdCode+'&sp='+$subProdCode+'&l='+$lecIdx+'&u='+$unitIdx+'&q='+$quility, 'www'), 'Player', '1000', '600', null, null, 'no', 'no');
}

function fnPlayerBookmark($OrderIdx, $ProdCode, $subProdCode, $lecIdx, $unitIdx, $quility, $t){
    popupOpen(app_url('/Player/?o='+$OrderIdx+'&p='+$ProdCode+'&sp='+$subProdCode+'&l='+$lecIdx+'&u='+$unitIdx+'&q='+$quility+'&t='+$t, 'www'), 'Player', '1000', '600', null, null, 'no', 'no');
}

/**
 * 모바일웹 모바일 플레이어
 */
function fnMobile($info_url, $license)
{
    StarPlayerApp.license = $license;
    StarPlayerApp.version = "1.0.0";
    StarPlayerApp.android_version = "1.6.31";
    StarPlayerApp.ios_version = "1.0.0";
    StarPlayerApp.referer = window.location.href;
    StarPlayerApp.android_referer_return = "false";
    StarPlayerApp.debug = "false";
    StarPlayerApp.pmp = "false";

    checkInstalled2();
    $info_url = decodeURIComponent($info_url);
    StarPlayerApp.executeApp($info_url);
}

/**
 * 앱 스트리밍 플레이어
 * @param $url
 * @param $data
 */
function fnApp($url, $data, $subpage)
{
    $device_id = $('#device_id').val();
    $device_name = $('#device_name').val();
    $device_model = $('#device_model').val();
    $data = $data + '&device_id=' + $device_id + '&device_model=' + $device_model + '&device_name=' + $device_name;

    sendAjax($url, $data,
        function(d){
            var media = null;
            media = d.ret_data;
            media['subpage'] = $subpage;
            app.streaming(media);
        },
        function(ret, status){
            alert(ret.ret_msg);
        }, false, 'GET', 'json');
}

/**
 * 앱 멀티 다운로드
 * @param $url
 * @param $data
 */
function fnAppDown($url, $data)
{
    $device_id = $('#device_id').val();
    $device_name = $('#device_name').val();
    $device_model = $('#device_model').val();
    $data = $data + '&device_id=' + $device_id + '&device_model=' + $device_model + '&device_name=' + $device_name;

    sendAjax($url, $data,
        function(d){
            var media = null;
            media = d.ret_data;
            app.multiDownload(media);
        },
        function(ret, status){
            alert(ret.ret_msg);
        }, false, 'GET', 'json');
}

/**
 * 만나이
 * @param birth YYYYMMDD || YYYY-MM-DD
 * @returns {number}
 */
function calcAge(birth) {
    var date = new Date();
    var year = date.getFullYear();
    var month = (date.getMonth() + 1);
    var day = date.getDate();
    if (month < 10) month = '0' + month;
    if (day < 10) day = '0' + day;
    var monthDay = month + day;

    birth = birth.replace('-', '').replace('-', '');
    var birthdayy = birth.substr(0, 4);
    var birthdaymd = birth.substr(4, 4);

    var age = monthDay < birthdaymd ? year - birthdayy - 1 : year - birthdayy;
    return age;
}

/**
 * 환경에 따라서 URL 생성 
 * CI 의 app_url 과 동일하게 사용
 * @param $uri
 * @param $sub_domain
 * @returns {string}
 */
function app_url($uri, $sub_domain) {
    var $host = location.host;
    var $base_domain = 'willbes.net';
    var $env_domain = '';

    if($uri.substring(0,1) !== '/') {
        $uri = '/'+$uri;
    }

    if( $host.indexOf('.local.') > 0 ){
        $env_domain = 'local.';
    } else if( $host.indexOf('.dev.') > 0 ){
        $env_domain = 'dev.';
    } else if( $host.indexOf('.stage.') > 0 ){
        $env_domain = 'stage.';
    }

    return (location.protocol+'//'+$sub_domain+'.'+$env_domain+$base_domain+$uri);
}

/**
 * 콤마(,)를 추가하여 리턴 (가격)
 * @param value
 * @returns {string}
 */
function addComma(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

/**
 * 즐겨찾기 추가
 */
function addFavorite() {
    var url = window.location.href;
    var title = document.title;

    if (window.sidebar && window.sidebar.addPanel) {
        // Firefox
        window.sidebar.addPanel(title, url, '');
    } else {
        if (window.external && ('AddFavorite' in window.external)) {
            // Internet Explorer
            window.external.AddFavorite(url, title);
        } else {
            // Opera, Google Chrome and Safari
            alert('해당 브라우저는 즐겨찾기 추가 기능이 지원되지 않습니다.\n수동으로 즐겨찾기에 추가해 주세요.');
        }
    }
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
 * checkbox 단일 선택
 * @param group_selector
 * @param checked_value
 */
function checkOnly(group_selector, checked_value) {
    var $selector = $(group_selector);
    var $checked_selector = $selector.filter('[value="' + checked_value + '"]');

    if ($checked_selector.is(':checked') === true) {
        $selector.prop('checked', false);
        $checked_selector.prop('checked', true);
    }
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
    if (typeof $datatable === 'undefined' || $search_form.length < 1) {
        return '';
    }

    var json = $datatable.ajax.params() || arrToJson($search_form.serializeArray());
    // unset csrf token
    delete json._csrf_token;

    return '?q=' + encodeURIComponent(Base64.encode(JSON.stringify(json)));
}

/**
 * form dynamic 생성 후 submit, 생성된 form 자동 삭제
 * @param url
 * @param params
 * @param method
 * @param target
 */
function formCreateSubmit(url, params, method, target) {
    method = method || 'POST';

    var form = document.createElement('form');
    form.setAttribute('method', method);
    form.setAttribute('action', url);

    if (typeof target !== 'undefined') {
        form.setAttribute('target', target);
    }

    if (params != null) {
        for(var i = 0; i < params.length; i++) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', params[i].name);
            hiddenField.setAttribute('value', params[i].value);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}

/**
 * 온라인, 학원 사이트를 구분하여 URL 생성 (base_helper > front_url 함수와 동일한 역할 수행)
 * @param uri
 * @returns {string}
 */
function frontUrl(uri) {
    if (location.pathname.indexOf('/pass/') === 0) {
        uri = '/pass' + uri;
    }

    return siteUrl(uri);
}

/**
 * 학원 사이트 URL 생성
 * @param uri
 * @returns {string}
 */
function frontPassUrl(uri) {
    return siteUrl('/pass' + uri);
}

/**
 * get query string
 * @returns {string}
 */
function getQueryString() {
    return location.search;
}

/**
 * go url (form get method 이용)
 * @param key
 * @param val
 * @param selector
 */
function goUrl(key, val, selector) {
    var $url_form = $(selector || '#url_form');
    var $url_input = $url_form.find('[name="' + key + '"]');
    var $url_hidden = $url_form.find('input[type="hidden"][name="' + key + '"]');
    var $arr_except = ['page'];

    if ($url_input.length > 0) {
        $url_input.val(val);
        if ($url_input.length > 1 && $url_hidden.length > 0) {
            // 동일한 파라미터가 2개 이상일 경우 hidden 파라미터 제거
            $url_hidden.remove();
        }
    } else {
        $url_form.append('<input type="hidden" name="' + key + '" value="' + val + '"/>');
    }

    // 제외 파라미터 제거
    $.each($arr_except, function(index, item) {
        $url_form.find('input[type="hidden"][name="' + item + '"]').remove();
    });

    $url_form.prop('action', location.protocol + '//' + location.host + location.pathname);
    $url_form.submit();
}

/**
 * data가 json 형식인지 체크
 * @param data
 * @returns {boolean}
 */
function isJson(data) {
    if (typeof data !== 'string') {
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
 * 숫자 포맷 리턴 (소수점이 있을 경우 불필요한 뒷자리 0값 삭제)
 * @param num
 * @param decimal
 * @returns {*}
 */
function decimalFormat(num, decimal) {
    num = (num * 1).toFixed(decimal);

    if (decimal > 0) {
        var arr_num, i_num, d_num;

        arr_num = num.toString().split('.');
        i_num = addComma(arr_num[0]);
        d_num = parseFloat('0.' + arr_num[1]);
        num = i_num + (d_num > 0 ? '.' + d_num.toString().substr(2) : '')
    } else {
        num = addComma(num);
    }

    return num;
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

    if ($select.val() !== '') {
        $target.val($select.val());
        $target.prop('readonly', true);
    } else {
        $target.val('');
        $target.prop('readonly', false);
    }

    if (typeof data !== 'undefined') {
        $select.val(data);
        if ($select.children('option:selected').length < 1) {
            $select.val('');
        }
        $select.change();
        $target.val(data);
    }
}

/**
 * 사이트 URL 생성 (site_url 함수와 동일한 역할 수행)
 * @param uri
 * @returns {string}
 */
function siteUrl(uri) {
    var url = location.protocol + '//' + location.host;
    return url + uri;
}

/**
 * 관리자 메뉴 (사이드바) 강제 Active
 * @param menu_link
 */
function forceMenuActive(menu_link) {
    var $sidebar_menu = $('#sidebar-menu');
    $sidebar_menu.find('a').parent('li').removeClass('current-page').parents('ul').parent().removeClass('active');
    $sidebar_menu.find('a[href="' + menu_link + '"]').parent('li').addClass('current-page').parents('ul').slideDown(function() {
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
    hide = (typeof(hide) === "undefined" || hide == null) ? true : hide;
    center = (center === true)? {"dir1": "down", "dir2": "right", "firstpos1": ($(window).height()/2 -150), "firstpos2": ($(window).width()/2 - 150)} : "";

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
 * @param scrollbar
 */
var popupWins = new Array();

function popupOpen(url, name, width, height, xpos, ypos, scrollbar, resizable) {
    try{
        name =  name || '_blank';
        xpos = xpos || (screen.availWidth-width)/2;
        ypos = ypos || (screen.availHeight-height)/2;
        scrollbar = scrollbar || 'no';
        resizable = resizable || 'yes';


        if ( typeof( popupWins[name] ) !== "object" ){
            popupWins[name] = window.open(url, name, 'width='+width+', height='+height+', left='+xpos+', top='+ypos+', menubar=no, status=no, toolbar=no, scrollbars='+scrollbar+', resizable='+resizable);
        } else {
            if (!popupWins[name].closed){
                popupWins[name].location.href = url;
            } else {
                popupWins[name] = window.open(url, name, 'width='+width+', height='+height+', left='+xpos+', top='+ypos+', menubar=no, status=no, toolbar=no, scrollbars='+scrollbar+', resizable='+resizable);
            }
        }

        popupWins[name].focus();

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
 * replace modal (modal 내용 변경)
 * @param url
 * @param data
 */
function replaceModal(url, data) {
    sendAjax(url, data, function(ret) {
        $("#pop_modal .modal-content").html(ret);
    }, showError, false, 'GET', 'html');
}

/**
 * reset modal
 * @param selector
 */
function resetModal(selector) {
    $(selector).modal('toggle');
    $(selector).remove();
    $('.modal-backdrop').remove();
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
    //var target = (event.target) ? $(event.target) : $("button, .btn");
    var target = (typeof(event) === 'undefined' || target == null) ? $("button, .btn") : $(event.target);
    target.prop("disabled",true);

    if(typeof is_file === 'undefined') is_file = false;
    var process_data = true;
    var content_type = 'application/x-www-form-urlencoded; charset=UTF-8';
    if(is_file){
        process_data = false;
        content_type = false;
        method = method === 'GET' ? 'POST' : method; // file upload는 get 방식 불가
    }

    $.ajax({
        type: ((typeof method !== 'undefined') ? method : 'POST'),
        url: url,
        data: data,
        async: (typeof async !== 'undefined') ? async : false,
        processData: process_data,
        contentType: content_type,
        dataType: (typeof data_type !== 'undefined') ? data_type : 'json'
    }).success(function (data, status, req) {
        if(typeof callback === "function") {
            callback(data);
        }
        target.prop("disabled",false);
    }).error(function(req, status, err) {
        if(typeof error_callback === "function") {
            var ret = req.responseText;
            if (isJson(ret) === true) {
                // json parser
                ret = JSON.parse(ret);
            }
            error_callback(ret, req.status);
        }
        target.prop("disabled",false);
    });
}

/**
 * ajax function for loading indicator
 * @param url
 * @param data is_file = false인 경우는 seialize된 데이터 (json), is_file = true인 경우는 FormData로 전송 필요
 * @param callback
 * @param error_callback
 * @param method
 * @param loading_target
 * @param data_type
 * @param is_file
 */
function sendLoadingAjax(url, data, callback, error_callback, method, loading_target, data_type, is_file) {
    $("button, .btn").prop("disabled",true);
    if(typeof is_file === 'undefined') is_file = false;
    var process_data = true;
    var content_type = 'application/x-www-form-urlencoded; charset=UTF-8';
    if(is_file){
        process_data = false;
        content_type = false;
        method = method === 'GET' ? 'POST' : method; // file upload는 get 방식 불가
    }

    $.ajax({
        type: ((typeof method !== 'undefined') ? method : 'POST'),
        url: url,
        data: data,
        async: true,
        processData: process_data,
        contentType: content_type,
        dataType: (typeof data_type !== 'undefined') ? data_type : 'json',
        beforeSend: function() {
            loading_target.showLoading({
                'addClass': 'loading-indicator-bars'
            });
        }
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
        loading_target.hideLoading();
    }).complete(function() {
        loading_target.hideLoading();
    });
}

/**
 * sendAjax 에러 콜백 (alert 사용)
 * @param result
 * @param status
 */
function showAlertError(result, status) {
    var err_msg = result.ret_msg || '';

    if (err_msg === '') {
        if (status === 401) {  //권한 없음 || 미로그인
            err_msg = '권한이 없습니다.';
        } else if (status === 403) {
            err_msg = '토큰 정보가 올바르지 않습니다.';
        } else if (status === 404) {
            err_msg = '데이터 조회에 실패했습니다.';
        } else if (status === 422) {
            err_msg = '필수 파라미터 오류입니다.';
        }
    }

    alert(err_msg);
}

/**
 * sendAjax 에러 콜백
 * @param result
 * @param status
 */
function showError(result, status) {
    var err_msg = result.ret_msg || '';

    if (err_msg === '') {
        if (status === 401) {  //권한 없음 || 미로그인
            err_msg = '권한이 없습니다.';
        } else if (status === 403) {
            err_msg = '토큰 정보가 올바르지 않습니다.';
        } else if (status === 404) {
            err_msg = '데이터 조회에 실패했습니다.';
        } else if (status === 422) {
            err_msg = '필수 파라미터 오류입니다.';
        }
    }

    notifyAlert('error', '알림', err_msg);
}

/**
 * Datetimepicker 디폴트 날짜 세팅
 * 기능 : 오늘, 일주일, 한달 등...
 * @param i_period (ex. -1, 0, 1 ...)
 * @param s_period_type (ex. days, weeks, months ...)
 * @param sdate_id_name (ex. id="sDate" id name)
 * @param edate_id_name (ex. id="eDate" id name)
 * @param s_default_date (ex. 2018-01-01)
 */
function setDefaultDatepicker(i_period, s_period_type, sdate_id_name, edate_id_name, s_default_date) {
    var return_data = computeDate(i_period, s_period_type, s_default_date);

    $('#' + sdate_id_name).val(return_data['s_start_date']);
    $('#' + edate_id_name).val(return_data['s_end_date']);
}

/**
 * 날짜 계산
 * @param i_period
 * @param s_period_type
 * @param s_default_date
 * @returns {any[]}
 */
function computeDate(i_period, s_period_type, s_default_date) {
    var return_arr = new Array();
    var s_start_date = "";
    var s_end_date = "";
    s_default_date = moment(s_default_date).format('YYYY-MM-DD') || moment().format('YYYY-MM-DD');

    if(s_period_type === 'days' || s_period_type === 'weeks' || s_period_type === 'months') {
        var calc_date = moment(s_default_date).add(i_period, s_period_type).format('YYYY-MM-DD');
        if(i_period >= 0) {
            // s_period = moment().format('YYYY-MM-DD') + ' - ' + calc_date;
            s_start_date = moment(s_default_date).format('YYYY-MM-DD');
            s_end_date = calc_date;
        } else{
            s_start_date = calc_date;
            s_end_date = moment(s_default_date).format('YYYY-MM-DD');
        }
    } else if(s_period_type === 'mon') {
        s_start_date = moment(s_default_date).add(i_period, 'months').date(1).format('YYYY-MM-DD');
        s_end_date = moment(s_default_date).add(i_period, 'months').endOf('month').format('YYYY-MM-DD');
    } else if(s_period_type === 'all') {
        s_start_date = '';
        s_end_date = '';
    }

    return_arr['s_start_date'] = s_start_date;
    return_arr['s_end_date'] = s_end_date;

    return return_arr;
}

/**
 * 바이트 수 리턴 함수
 * @param val
 * @returns {number}
 */
function fn_chk_byte(val){
    var str_len = val.length;
    var rbyte = 0;
    var one_char = "";
    for(var i=0; i<str_len; i++){
        one_char = val.charAt(i);
        if(escape(one_char).length > 4){
            rbyte += 2; //한글2Byte
        }else{
            rbyte++;    //영문 등 나머지 1Byte
        }
    }
    return rbyte;
}

/**
 * 원격지원서비스 실행
 */
function remoteOpen() {
    popupOpen("https://www.whelper.co.kr/willbes","whelper","1000","800",'','',"yes");
}

/**
 * 단축키
 */
$(document).bind('keypress', function(event) {
    if( event.which===90 && event.shiftKey ) {
        remoteOpen();
    }
});

/**
 * setRowspan 함수
 * @param classname
 */
function setRowspan(classname) {
    $("."+classname).each(function () {
        var rows = $("."+classname+":contains('" + $(this).text() + "')");
        if (rows.length > 1) {
            rows.eq(0).attr("rowspan", rows.length);
            rows.not(":eq(0)").remove();
        }
    });
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
    $.fn.setLayer = function(options){
        var settings = $.extend({
            url : '',
            // add_param_type : add_param을 가져올 유형
            // 1) input : ID가 name 파라미터인 input을 찾아 해당 value를 ajax get의 파라미터로 함께 넘겨준다.
            // 2) attr_param : 클릭된 버튼의 data-ID 어트리뷰트의 value를 ajax get 의 파라미터로 함께 넘겨준다.
            // 3) attr_url : 클릭된 버튼의 data-ID 어트리뷰트의 value를 ajax get의 url로 함께 넘겨준다. url/param1_value/param2_value => 순서는 add_param 순서이다.
            // 4) param : add_param의 id와 value 값을 그대로 넘겨준다.
            add_param_type : 'input',
            add_param : [],  // 추가로 넘겨주는 값  ex) [{id : 'service_id', 'name' : '서비스 아이디', 'required' : true}], param => [{id : 'service_id', 'name' : '서비스 아이디', 'value' : '값', 'required' : true}]
            width : '620',
            max_height : '400',   // scroll/hidden 일 경우만 쓰임
            overflow : 'auto',
            backdrop : 'static',        // true : 배경 포함, 클릭시 닫힘 / false : 배경 없음, 클릭시 닫히지 않음 / 'static' : 배경 포함, 클릭시 닫히지 않음
            modal_id : 'pop_modal'   // modal html element id
        }, options);
        this.css('cursor', 'pointer');

        // modal html source
        var modal_html = '<div class="modal" id="' + settings.modal_id + '" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content">...</div></div></div>';

        if(settings.add_param.constructor !== Array) {
            settings.add_param = [settings.add_param];
        }

        $(document).off("click", this.selector);
        $(document).on("click", this.selector, function() {
            var event_btn = $(this);
            var i, _param = '', _param_value = '';

            for (i = settings.add_param.length - 1; i >= 0; i--) {
                _param = settings.add_param[i];
                if(_param.required){
                    _param_value = '';
                    if(settings.add_param_type === 'input' && $('#' +_param.id).length > 0) {
                        _param_value = $("#"+_param.id).val();
                    } else if(settings.add_param_type === 'attr_param' || settings.add_param_type === 'attr_url') {
                        _param_value = event_btn.attr('data-'+_param.id);
                    } else if(settings.add_param_type === 'param') {
                        _param_value = _param.value;
                    }

                    if(_param_value === ''){
                        alert(_param.name + '을 먼저 선택하셔야 합니다.');
                        return false;
                    }
                }
            }

            $('body').append(modal_html);
            var pop_modal = $("#" + settings.modal_id);

            pop_modal.modal({
                show: 'false',
                backdrop: settings.backdrop
            }).on('hidden.bs.modal', function(){
                $(this).remove();
            });

            var callback = function(d) {
                if(d === 'fail') {
                    notifyAlert('error', '알림', '표시할 내역이 없습니다.');
                    pop_modal.modal("toggle");
                } else if(d.substr(0, 3) === 'ERR') {
                    notifyAlert('error', '에러', d.substr(4));
                    pop_modal.modal("toggle");
                } else {
                    pop_modal.find(".modal-content").html(d).end()
                        .find(".modal-dialog").css("width",settings.width+"px").end();
                    if(settings.overflow === 'scroll' || settings.overflow === 'hidden') {
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
            for (i = 0; i < settings.add_param.length; i++) {
                _param = settings.add_param[i];
                _param_value = null;

                if(settings.add_param_type === 'input') {
                    _param_value = $("#"+_param.id).val();
                    if(_param_value) _data[_param.id] = _param_value;
                } else if(settings.add_param_type === 'attr_param') {
                    _param_value = event_btn.attr('data-'+_param.id);
                    if(_param_value) _data[_param.id] = _param_value;
                } else if(settings.add_param_type === 'attr_url') {
                    _param_value = event_btn.attr('data-'+_param.id);
                    _url += '/' + _param_value
                } else if(settings.add_param_type === 'param') {
                    _data[_param.id] = _param.value;
                }
            }

            sendAjax(_url, _data, callback, function(req, status, err){
                showError(req, status);
                pop_modal.modal("toggle");
            }, false, 'GET', 'html');
        });

        return this;
    };
}(jQuery));


/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // CommonJS
        factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

    var pluses = /\+/g;

    function encode(s) {
        return config.raw ? s : encodeURIComponent(s);
    }

    function decode(s) {
        return config.raw ? s : decodeURIComponent(s);
    }

    function stringifyCookieValue(value) {
        return encode(config.json ? JSON.stringify(value) : String(value));
    }

    function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
            // This is a quoted cookie as according to RFC2068, unescape...
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        try {
            // Replace server-side written pluses with spaces.
            // If we can't decode the cookie, ignore it, it's unusable.
            // If we can't parse the cookie, ignore it, it's unusable.
            s = decodeURIComponent(s.replace(pluses, ' '));
            return config.json ? JSON.parse(s) : s;
        } catch(e) {}
    }

    function read(s, converter) {
        var value = config.raw ? s : parseCookieValue(s);
        return $.isFunction(converter) ? converter(value) : value;
    }

    var config = $.cookie = function (key, value, options) {
        // Write
        if (value !== undefined && !$.isFunction(value)) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setTime(+t + days * 864e+5);
            }

            return (document.cookie = [
                encode(key), '=', stringifyCookieValue(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        // Read
        var result = key ? undefined : {};

        // To prevent the for loop in the first place assign an empty array
        // in case there are no cookies at all. Also prevents odd result when
        // calling $.cookie().
        var cookies = document.cookie ? document.cookie.split('; ') : [];

        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = parts.join('=');

            if (key && key === name) {
                // If second argument (value) is a function it's a converter...
                result = read(cookie, value);
                break;
            }

            // Prevent storing a cookie that we couldn't decode.
            if (!key && (cookie = read(cookie)) !== undefined) {
                result[name] = cookie;
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        if ($.cookie(key) === undefined) {
            return false;
        }

        // Must not alter options, thus extending a fresh object...
        $.cookie(key, '', $.extend({}, options, { expires: -1 }));
        return !$.cookie(key);
    };

}));

