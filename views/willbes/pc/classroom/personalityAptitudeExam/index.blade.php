@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Mypage-ONLINEZONE c_both">
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                <div class="Txt">
                                    - 해당 인적성검사는 검사시작 후(시작일 포함) 7일까지만 응시 가능합니다.<br>
                                    - 검사기간은 인적성검사 페이지에서 ‘검사시작’ 클릭 시점으로 시작일과 종료일이 셋팅됩니다.<br>
                                    - 인적성검사를 시작한 이후에는 환불이 불가합니다.<br>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="c_both tx-right mt40"><a href="{{front_url('/classroom/home/index')}}" class="bdb-dark-gray pb5">내강의실 메인으로 이동하기 →</a></div>
            <div class="willbes-Mypage-EDITZONE mt20 c_both p_re">
                <div class="tx-red">📌 검사완료 후 검사기간, 검사상태가 업데이트 되지 않거나 ‘결과보기’ 버튼이 보이지 않을 경우 새로고침(ctrl+F5)를 실행해 주세요.</div>
                <div class="LeclistTable mt20 c_both">
                    <table cellspacing="0" cellpadding="0" class="listTable editTable under-gray bdt-gray tx-gray" id="ajax_table">
                        <input type="hidden" id="op_idx">
                        <colgroup>
                            <col style="width: 60px;">
                            <col>
                            <col style="width: 120px;">
                            <col style="width: 220px;">
                            <col style="width: 100px;">
                            <col style="width: 100px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></th>
                            <th>인적성검사명<span class="row-line">|</span></th>
                            <th>신청일<span class="row-line">|</span></th>
                            <th>검사기간<span class="row-line">|</span></th>
                            <th>검사상태<span class="row-line">|</span></th>
                            <th>검사결과</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <div id="Aptitude" class="willbes-Layer-Black">
                <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h460 fix abs">
                    <a class="closeBtn" href="javascript:void(0);" onclick="close_layer_popup()">
                        <img src="{{ img_url('sub/close.png') }}">
                    </a>
                    <div class="Layer-Tit NG tx-dark-black">인적성검사 사전 안내사항</div>
                    <div class="Layer-Cont">
                        <div class="strong mt20 mb10 tx-gray">[유의사항]</div>
                        <div class="mb20 lh1_5">
                            · 해당 인적성검사는 검사시작 후(시작일 포함) <span class="tx-red">7일까지만 응시 가능</span>합니다.<br/>
                            · ‘인적성검사 페이지로 이동하기’ 버튼 클릭 시 한국인재개발진흥원에서 제공하는 인적성검사 페이지에서 유의사항 확인 후  ‘검사시작’  버튼 클릭 시 인적성검사가 시작됩니다.<br/>
                            <span class="tx-red">· 인적성검사를 시작한 이후에는 환불이 불가합니다.</span>
                        </div>
                        <div class="aptitudeBox">
                            <label>위 유의사항 및 개인정보처리 사전 안내사항을 모두 확인하였고 이에 동의합니다.  <input type="checkbox" name="is_agree" id="is_agree" value="Y"></label>
                            <a href="javascript:void(0);" id="btn_exam_popup" class="NG">인적성검사 페이지로 이동하기 ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var canwe_popup;
        var interval;
        var arr_exam_state = {!! json_encode($base_data['arr_exam_state']) !!};
        $(document).ready(function() {
            var exam_url = '{{front_url('/classroom/personalityAptitudeExam/exam')}}';
            listAjax();

            $(document).on('click','.btn-aptitude-layer',function() {
                var today = new Date();
                var dayStr;
                var op_idx = $(this).data('op-idx');
                var end_day = $(this).data('end-day');

                dayStr = today.getFullYear().toString();
                dayStr += inZero(today.getMonth()+1,2);
                dayStr += inZero(today.getDate(),2);
                if (end_day != null && end_day < dayStr) {
                    alert('검사기간이 만료되었습니다.');
                    location.reload();
                    return false;
                }

                if ($(this).data('is-agree') == 'Y') {
                    exam_popup(op_idx,exam_url);
                } else {
                    $('#op_idx').val(op_idx);
                    openWin('Aptitude');
                }
            });

            //인적성 검사 팝업
            $('#btn_exam_popup').on('click', function() {
                if($("input:checkbox[name=is_agree]").is(":checked") == false) {
                    alert('유의사항 및 개인정보처리 사전 안내사항에 동의하셔야 합니다.');
                    return false;
                }
                var op_idx = $("#op_idx").val();
                exam_popup(op_idx,exam_url);
            });

            $('.btn-report').on('click', function() {
                var report_url = '{{front_url('/classroom/personalityAptitudeExam/report/')}}' + $(this).data("pae-idx");
                window.open(report_url,'report_popup', 'scrollbars=no,toolbar=no,resizable=no,width=1350,height=920,top=50,left=100');
            });
        });

        //list ajax
        function listAjax() {
            var add_table = '';
            var _url = '{{ front_url("/classroom/personalityAptitudeExam/listAjax") }}';
            var data = {};

            sendAjax(_url, data, function (ret) {
                var rownum = ret.rownum;
                $.each(ret.ret_data, function (i, item) {
                    add_table += '<tr>';
                    add_table += '<td class="w-no">' + rownum + '</td>';
                    if (item.PayStatusCcd == '676006') {
                        add_table += '<td class="w-list tx-left pl20">' + item.subProdName + '</td>';
                        add_table += '<td>' + item.CompleteDatm + '</td>';
                        add_table += '<td></td>';
                        add_table += '<td><span class="tx-red">환불완료</span><br/>('+item.RefundDay+')</td>';
                        add_table += '<td></td>';
                    } else {
                        add_table += '<td class="w-list tx-left pl20">';
                        if (item.ExamState == '3' || item.ExamState == '9') {
                            add_table += item.subProdName;
                        } else {
                            add_table += '<a href="javascript:void(0);" class="tx-blue underline btn-aptitude-layer" data-op-idx=' + item.OrderProdIdx + ' data-is-agree=' + item.IsAgree + ' data-end-day=' + item.ExamEndDayForNumber + '>';
                            add_table += item.subProdName;
                            add_table += '</a>';
                        }
                        add_table += '</td>';
                        add_table += '<td>' + item.CompleteDatm + '</td>';
                        add_table += '<td>';
                        if (item.ExamStartDatm == null || item.ExamStartDatm == '') {
                            add_table += '검사시작 후(시작일 포함) 7일까지';
                        } else {
                            add_table += item.ExamStartDay + ' ~ ' + item.ExamEndDay;
                        }
                        add_table += '</td>';
                        add_table += '<td>';
                        if (item.ExamStartDatm == null || item.ExamStartDatm == '') {
                            add_table += '검사대기';
                        } else {
                            if (arr_exam_state[item.ExamState] == undefined) {
                                add_table += '상태정보 없음';
                            } else {
                                add_table += arr_exam_state[item.ExamState];
                            }
                        }
                        add_table += '</td>';
                        add_table += '<td>';
                        if (item.ExamStartDatm != null || item.ExamStartDatm != '') {
                            if (item.ExamState == 3 || item.ExamState == 9) {
                                add_table += '<a href="javascript:void(0);" class="aBox answerBox tx-blue btn-report" data-pae-idx=' + item.PaeIdx + '>결과보기</a>';
                            }
                        }
                        add_table += '</td>';
                    }
                    add_table += '</tr>';
                    rownum = rownum - 1;
                });

                $('#ajax_table > tbody').html(add_table);
            }, showError, false, 'GET');
        }

        //인적성검사 팝업
        function exam_popup(op_idx,url) {
            var popup_url = url + '/' + op_idx
            $("#op_idx").val('');
            $("input:checkbox[id='is_agree']").prop("checked", false);
            interval = setInterval(function () {
                popup_check();
            },30000); //30초단위
            close_layer_popup();
            canwe_popup = window.open(popup_url,'exam_popup', 'scrollbars=no,toolbar=no,resizable=no,width=1350,height=920,top=50,left=100');
        }

        //레이어팝업 닫기
        function close_layer_popup() {
            $("#op_idx").val('');
            $("input:checkbox[id='is_agree']").prop("checked", false);
            closeWin('Aptitude');
        }

        //팝업 오픈 여부 체크 (오픈인경우 listAjax 호출)
        function popup_check() {
            if (canwe_popup != undefined) {
                if (canwe_popup.closed) {
                    clearInterval(interval);
                } else {
                    listAjax();
                }
            }
        }

        function inZero(p1,p2){
            var zero = "";
            for(var i=0; i<p2; i++){
                zero += "0";
            }
            return zero.toString().concat(p1).match(new RegExp("\\d{"+p2+"}$"));
        }
    </script>
@stop