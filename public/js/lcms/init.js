/*
 * DATATABLE DEFAULT SETTING
 */
$.extend(true, $.fn.dataTable.defaults, {
    "autoWidth": false,
    "sPaginationType": "full_numbers",
    //"dom": 'T<"clear">lfBrtip',
    // searcing input box display
    //"dom": 'T<"clear"><<"pull-left mr-30"l><"pull-left"f><"pull-right"B>><"clear">rtip',
    "dom": 'T<"clear"><<"pull-left"l><"pull-right"B>><"clear">rtip',
    "aLengthMenu": [[10, 20, 50], [10, 20, 50]],
    "iDisplayLength": 20,
    "oLanguage": {
        "sSearch": "검색 : ",
        "oPaginate": {
            "sFirst" : "처음",
            "sPrevious" : "이전",
            "sNext" : "다음",
            "sLast" : "마지막"
        },
        "sInfo": "총 _TOTAL_개의 항목 중 _START_ ~ _END_ 표시",
        "sLengthMenu": "_MENU_ 개의 항목 표시",
        "sProcessing": "로딩 중 ... <i class='fa fa-spin fa-refresh'></i>",
        "sEmptyTable": "조회된 데이터가 없습니다.",
        "sZeroRecords": "일치하는 데이터가 없습니다.",
        "sInfoFiltered": "",
        "sInfoEmpty": ""
    },
    // ordering
    ordering: false,
    // column position change
    colReorder: true,
    // row position change
    rowReorder: false,
    // processing text display
    processing: true,
    // excel cell rounded color
    keys: false,
    // row selected color
    /*select: {
        style: 'single',
        info: false
    },*/
    select: false,
    // search input display
    searching: false,
    responsive: true,
    buttons: [],
    columnDefs: [
        // ordering disabled
        { targets: 'no-sort', orderable: false },
        // return original data
        { targets: 'raw', render: false },
        // xss clean
        { targets: 'xss-clean', render: $.fn.dataTable.render.text() }
        // all colums xss protection
        //{ targets: '_all', render: $.fn.dataTable.render.text() }
    ],
    ajax: {
        complete: function() {
            //$(".right_col").css("height", $(document).height());
            var scroll_obj = $('.modal').length > 0 ? '.modal' : 'html, body';
            $(scroll_obj).animate({
                scrollTop: 0
            }, 300);
        },
        error: function(xmlHttpRequest, textStatus, errorThrown) {
            if(xmlHttpRequest.readyState === 0 || xmlHttpRequest.status === 0) {
                return;
            } else {
                if(xmlHttpRequest.status === 401) {
                    notifyAlert("error", "권한 없음", "리스트 조회 권한이 없습니다. [" + xmlHttpRequest.status + "]");
                } else {
                    notifyAlert("error", "알림", "리스트 조회를 실패하였습니다. [" + xmlHttpRequest.status + "]");
                }
            }
        }
    }
});

$(document).ready(function() {
    // 관리자 목록 페이지 검색어 설정
    var json = queryStringToJson();
    var $search_form = $('#search_form');
    var $tab_site_code = $('.tabs-site-code');

    if ($search_form.length < 1 || json.hasOwnProperty('q') === false) {
        return;
    }

    // to json from query string
    var qs = JSON.parse(Base64.decode(decodeURIComponent(json.q)));

    // set search form input value
    var search_pattern = /^search_/i;   // input text, select box
    var search_chk_pattern = /^search_chk_/i;   // checkbox, radio
    $.each(qs, function(key, value) {
        if (search_pattern.test(key) === true) {
            if (search_chk_pattern.test(key) === true) {
                $search_form.find('[name="' + key + '"][value="' + value + '"]').prop('checked', true).iCheck('update');
            } else {
                $search_form.find('[name="' + key + '"]').val(value);
            }

            if (key === 'search_site_code' && value !== '' && $tab_site_code.length > 0) {
                // 사이트 탭 자동 선택
                $tab_site_code.children('li').removeClass('active');
                $tab_site_code.find('a[data-site-code="' + value + '"]').parent('li').addClass('active');
            }
        }
    });

    // set datatable length and page
    if (typeof qs.start !== 'undefined' && typeof qs.length !== 'undefined') {
        // datatable ajax
        $.extend(true, $.fn.dataTable.defaults, {
            iDisplayStart: qs.start,
            iDisplayLength: qs.length
        });
    } else {
        if ($search_form.hasClass('searching') === true) {
            setTimeout(function() {
                $search_form.submit();
            }, 0);
        }
    }
});
