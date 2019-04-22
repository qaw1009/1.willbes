<div id="Reply" class="willbes-Layer-ReplyBox" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">수강후기</div>

    <!-- List -->
    <div id="AddList" class="Layer-Cont" style="display: {{$style_display['list']}}">
        <form class="form-horizontal form-label-left" id="_ajax_search_form" name="_ajax_search_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id="search_cate_code" name="search_cate_code" value="{{element('cate_code', $arr_input)}}">
            <input type="hidden" id="search_subject_idx" name="search_subject_idx" value="{{element('subject_idx', $arr_input)}}">
            <input type="hidden" id="search_prof_idx" name="search_prof_idx" value="{{element('prof_idx', $arr_input)}}">
            <input type="hidden" id="search_prod_code" name="search_prod_code">
            <input type="hidden" id="orderby" name="orderby">

            <div class="curriWrap c_both">
                <div class="CurriBox">
                    <table cellspacing="0" cellpadding="0" class="curriTable curriTableLayer">
                        <colgroup>
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td colspan="8">
                                <ul class="curriSelect">
                                    <li><a href="#none" id="subject_all" onclick="ajaxProfInfo('{{element('cate_code', $arr_input)}}', 'all', true);" class="subject-list">전체</a></li>
                                    @foreach($arr_base['subject'] as $idx => $row)
                                        <li><a href="#none" id="subject_{{$row['SubjectIdx']}}" class="subject-list" onclick="ajaxProfInfo('{{element('cate_code', $arr_input)}}', '{{$row['SubjectIdx']}}', true);">{{$row['SubjectName']}}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="8" id="prof_list" class="tx-blue">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                        </tr>
                        {{--<tr>
                            <th class="tx-gray">강좌선택</th>
                            <td colspan="8">
                                <select id="sel_prod_code" name="sel_prod_code" title="강좌를 선택해 주세요.">
                                    <option value="">강좌를 선택해 주세요.</option>
                                    @foreach($arr_base['on_my_lecture'] as $key => $val)
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- curriWrap -->
            <div class="willbes-Leclist c_both">
                <div class="willbes-LecreplyList tx-gray">
                    <dl class="Select-Btn NG">
                        <dt><a href="#none" id="order_by_best" class="btn-order-by on" data-order-by="best">BEST순</a></dt>
                        <dt><a href="#none" id="order_by_date" class="btn-order-by" data-order-by="date">최신순</a></dt>
                        <dt><a href="#none" id="order_by_score" class="btn-order-by" data-order-by="score">평점순</a></dt>
                    </dl>
                    {{--<div class="search-Btn btnAuto120 h27 f_right">
                        <button type="submit" onclick="{!! (sess_data('is_login') == true) ? "closeWin('AddList'); openWin('AddModify')" : "javascript:alert('로그인 후 이용해 주십시오.');"!!}" class="mem-Btn bg-blue bd-dark-blue">
                            <span>수강후기 작성</span>
                        </button>
                    </div>--}}
                </div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable replyTable upper-black upper-gray bdb-gray tx-gray" id="ajax_table">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 90px;">
                            <col style="width: 100px;">
                            <col style="width: 120px;">
                            <col style="width: 260px;">
                            <col style="width: 90px;">
                            <col style="width: 100px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></th>
                            <th>과목<span class="row-line">|</span></th>
                            <th>교수명<span class="row-line">|</span></th>
                            <th>평점<span class="row-line">|</span></th>
                            <th>제목<span class="row-line">|</span></th>
                            <th>작성자<span class="row-line">|</span></th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="willbes-Lec-Search GM p_re mt30">
                    <div class="inputBox">
                        <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="btn" id="btn_search" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- willbes-Leclist -->
            <div class="row">
                <div class="col-xs-12 add-paging"></div>
            </div>
        </form>
    </div>

    <!-- Write -->
    <div id="AddModify" class="Layer-Cont" style="display: {{$style_display['show']}}">
        <ul class="replyInfo tx-gray NG">
            <li>· 수강 종료 강좌는 수강이 종료된 날로부터 30일 이내에만 후기 등록이 가능합니다.</li>
            <li>· 강좌와 무관한 내용, 의미없는 문자 나열, 비방이나 욕설이 있을 시 삭제될 수 있습니다.</li>
        </ul>
        <form id="_ajax_reg_form" name="_ajax_reg_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" id="start_count" name="start_count">
            <input type="hidden" name="board_idx" value=""/>
            <input type="hidden" name="study_cate_code" value="{{element('cate_code', $arr_input)}}"/>
            <input type="hidden" name="study_prod_code" value="{{element('prod_code', $arr_input)}}"/>
            <input type="hidden" name="study_subject_idx" value="{{element('subject_idx', $arr_input)}}"/>
            <input type="hidden" name="study_prof_idx" value="{{element('prof_idx', $arr_input)}}"/>

            <div class="willbes-Leclist c_both">
                <div class="LecWriteTable">
                    <table cellspacing="0" cellpadding="0" class="listTable writeTable upper-gray upper-black bdt-gray bdb-gray fc-bd-none tx-gray">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 720px;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">수강정보</td>
                            <td class="w-selected tx-left pl30 item">
                                {{ urldecode($arr_base['subject_name']) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">평점<span class="tx-light-blue">(*)</span></td>
                            <td class="w-selected tx-left pl30">
                                <!-- Rating Stars Box -->
                                <div class="rating-stars text-center GM">
                                    <ul id="stars">
                                        <li class="star" title="평점1" data-value='1' onclick="starCount(1);">
                                            <i class="fa fa-star fa-fw"></i>
                                        </li>
                                        <li class="star" title="평점2" data-value='2' onclick="starCount(2);">
                                            <i class="fa fa-star fa-fw"></i>
                                        </li>
                                        <li class="star" title="평점3" data-value='3' onclick="starCount(3);">
                                            <i class="fa fa-star fa-fw"></i>
                                        </li>
                                        <li class="star" title="평점4" data-value='4' onclick="starCount(4);">
                                            <i class="fa fa-star fa-fw"></i>
                                        </li>
                                        <li class="star" title="평점5" data-value='5' onclick="starCount(5);">
                                            <i class="fa fa-star fa-fw"></i>
                                        </li>
                                    </ul>
                                    <div class="success-box">
                                        <div class="text-message">0</div>/ 5
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                            <td class="w-text tx-left pl30 item">
                                <input type="text" id="study_title" name="study_title" title="제목" class="iptTitle" maxlength="30" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                            <td class="w-textarea write tx-left pl30 item">
                                <textarea name="study_content" title="내용" required="required"></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="search-Btn mt20 h36 p_re">
                        <button type="submit" onclick="closeWin('AddModify'),openWin('AddList')" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <span class="tx-purple-gray">취소</span>
                        </button>
                        <button type="button" id="btn_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                            <span>저장</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <!-- willbes-Leclist -->
    </div>
</div>
<div id="LayerReply" class="willbes-Layer-Black" style="display: block"></div>

<script src="/public/vendor/validator/multifield.js"></script>
<script type="text/javascript">
    var $_ajax_search_form = $('#_ajax_search_form');
    var $_ajax_reg_form = $('#_ajax_reg_form');
    var $mem_id = '{{sess_data('mem_id')}}';

    $(document).ready(function(){
        var is_login = '{{sess_data('is_login')}}';
        $_ajax_reg_form.find('select[name="study_prof_idx"]').chained("#study_subject_idx");

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover').removeClass('none');
                } else {
                    $(this).removeClass('hover').addClass('none');
                }
            });
        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover').removeClass('none');
            });
        });

        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = ratingValue;
            } else {
                msg = ratingValue;
            }
            responseMessage(msg);
        });

        //contents hide,show
        $_ajax_search_form.on('click', 'tr.replyList', function() {
            $('tr.replyList').removeClass('hover');

            if ($(this).next().is(':visible')) {
                $(this).next().hide();
                $(this).removeClass('hover');
            } else {
                $('tr.replyTxt').hide();
                $(this).next().show();
                $(this).addClass('hover');
            }
        });

        //검색
        $('#btn_search').click(function () {
            callAjax(1);
        });

        //교수선택
        $_ajax_search_form.on('click', '.prof-list', function() {
            $('#search_prof_idx').val($(this).data('prof-idx'));
            $('.prof-list').attr('class','prof-list off');
            $('#prof_' + $(this).data('prof-idx')).attr('class','prof-list on');

            callAjax(1);
        });

        //강좌선택
        $_ajax_search_form.on('change', '#sel_prod_code', function() {
            $('#search_prod_code').val($('#sel_prod_code').val());
            callAjax(1);
        });

        //정렬
        $_ajax_search_form.on('click', '.btn-order-by', function() {
            $('#orderby').val($(this).data('order-by'));
            $('.btn-order-by').attr('class','btn-order-by off');
            $('#order_by_' + $(this).data('order-by')).attr('class','btn-order-by on');
            callAjax(1);
        });

        //수강후기 등록
        $_ajax_reg_form.on('click', '#btn_submit', function() {
            @if(sess_data('is_login') != true)
            alert('로그인 후 이용해 주세요.');
                    @else
            var url = '{{ front_url('/support/studyComment/store') }}';
            ajaxSubmit($_ajax_reg_form, url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    closeWin('AddModify'),openWin('AddList');
                    callAjax(1);
                }
            }, showValidateError, null, false, 'alert');
            @endif
        });

        callAjax(1);
    });

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html(msg);
    }

    //list ajax
    function listAjax(page) {
        var add_table = '';
        var orderby = $_ajax_search_form.find('input[name="orderby"]').val();
        var _url = '{{ front_url("/support/studyComment/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $_ajax_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'search_cate_code' : $('#search_cate_code').val(),
            'search_subject_idx' : $('#search_subject_idx').val(),
            'search_prof_idx' : $('#search_prof_idx').val(),
            'search_prod_code' : $('#search_prod_code').val(),
            's_keyword' : $('#s_keyword').val(),
            'page' : page,
            'orderby' : orderby
        };

        sendAjax(_url, data, function(ret) {
            var set_table_style;
            var param_board_idx = "{{ element('board_idx', $arr_input) }}";
            var rownum = ret.paging.rownum;
            var lecture_path = "{{ front_url('/lecture/show/cate/' . element('cate_code', $arr_input) . '/pattern/only' . '/prod-code/') }}";

            if (ret.ret_data.length < 1) {
                add_table += '<tr class="replyList w-replyList">';
                add_table += '<td colspan="7">수강후기 목록이 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    if (item.BoardIdx == param_board_idx) {
                        set_table_style = "table-row";
                    } else {
                        set_table_style = 'none';
                    }

                    add_table += '<tr class="replyList w-replyList">';
                    add_table += '<td class="w-no">';
                    if (item.IsBest == 1) {
                        add_table += '<img src="{{ img_url('prof/icon_best_reply.gif') }}">';
                    } else {
                        add_table += rownum;
                    }
                    add_table += '</td>';
                    add_table += '<td class="w-lec">' + item.SubjectName + '</td>';
                    add_table += '<td class="w-name">' + item.ProfName + '</td>';
                    add_table += '<td class="w-star star' + item.LecScore + '"></td>';
                    add_table += '<td class="w-list tx-left pl20">';
                    add_table += sub_str(item.Title, 15, '...');
                    add_table += '<div class="subTit">' + item.ProdName + '</div>';
                    add_table += '</td>';

                    if (item.RegMemId == $mem_id) {
                        add_table += '<td class="w-write">' + item.RegMemName + '</td>';
                    } else {
                        add_table += '<td class="w-write">' + sub_str(item.RegMemName, 2, '*') + '</td>';
                    }

                    add_table += '<td class="w-date">' + item.RegDatm + '</td>';
                    add_table += '</tr>';
                    add_table += '<tr class="replyTxt w-replyTxt tx-gray" style="display:' + set_table_style + '">';
                    add_table += '<td colspan="7">';
                    add_table += '<div class="tx-blue"><a href="' + lecture_path + item.ProdCode + '" target="_blank">' + item.ProdName + '</a></div>';
                    add_table += (item.RegType == 1) ? item.Content : nl2br(item.Content);
                    add_table += '</td>';
                    add_table += '</tr>';

                    rownum = rownum - 1;
                });
            }
            $('#ajax_table > tbody').html(add_table);
        }, showError, false, 'GET');
    }

    //문자열 길이 체크
    function sub_str(string, length, sing) {
        if(string != null && string.length > length) {
            return string.substr(0,length)+sing;
        } else {
            return string;
        }
    }

    //page ajax
    function ajaxPaging(page)
    {
        var _url = '{{ front_url("/support/studyComment/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $_ajax_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'search_cate_code' : $('#search_cate_code').val(),
            'search_subject_idx' : $('#search_subject_idx').val(),
            'search_prof_idx' : $('#search_prof_idx').val(),
            'search_prod_code' : $('#search_prod_code').val(),
            's_keyword' : $('#s_keyword').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            $('.add-paging').html(ret.paging.pagination);
        }, showError, false, 'GET');
    }

    //href 리턴 false, list,page ajax 호출
    function applyPagination() {
        $("div.Paging a").on("click", function() {
            var link, temp_params, params, num;
            /*var num = $(this).text();
            callAjax(num);*/

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                callAjax(num);
            } else {
                callAjax(1);
            }
            return false;
        });
    }

    function nl2br(str){
        return str.replace(/\n/g, "<br />");
    }

    function callAjax(num) {
        listAjax(num);    //list data load
        ajaxPaging(num);  //page data load
        applyPagination();
    }

    function starCount(count) {
        $('#start_count').val(count);
    }

    //교수목록조회
    function ajaxProfInfo(cate_code, subject_idx, ajax_call_type) {
        $('#search_subject_idx').val(subject_idx);
        $('.subject-list').attr('class','subject-list off');
        $('#subject_'+subject_idx).attr('class','subject-list on');

        if (ajax_call_type == true) {
            $('#search_prof_idx').val('');
        }

        var _url = '{{ front_url("/support/studyComment/ajaxProfInfo") }}';
        var data = {
            '{{ csrf_token_name() }}' : $_ajax_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'cate_code' : cate_code,
            'subject_idx' : subject_idx
        };

        sendAjax(_url, data, function(ret) {
            var add_data = '';
            if (ret.ret_cd) {
                if (Object.keys(ret.ret_data).length == 0) {
                    if (subject_idx == 'all') {
                        $('#prof_list').html('* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!');
                    } else {
                        $('#prof_list').html('* 선택하신 과목의 교수진이 없습니다.');
                    }
                } else {
                    add_data += '<ul class="curriSelect">';
                    $.each(ret.ret_data, function (k, v) {
                        add_data += '<li>';
                        add_data += '<a href="#none" id="prof_'+k+'" data-prof-idx="'+k+'" class="prof-list">' + v + '</a>';
                        add_data += '</li>';
                    });
                    add_data += '<ul>';
                    $('#prof_list').html(add_data);
                }
            }
        }, showError, false, 'POST');

        if (ajax_call_type == true) {
            callAjax(1);
        }
    }
</script>