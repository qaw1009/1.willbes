@extends('willbes.pc.layouts.master_popup')

@section('content')
    <div class="Popup ExamBox">
        <div class="popTitBox">
            <div class="pop-Tit NG"><img src="/public/img/willbes//mypage/logo.gif"> 전국 모의고사</div>
            <div class="pop-subTit">{{ $productInfo['ProdName'] }}</div>
        </div>
        <div class="popupContainer">
            @include('willbes.pc.classroom.mocktestNew.result.stat_tab_menu_partial')
            <form id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" id="prod_code" name="prod_code" value="{{ $productInfo['ProdCode'] }}">
                <input type="hidden" id="mr_idx" name="mr_idx" value="{{ $productInfo['MrIdx'] }}">
                <input type="hidden" id="wrong_note_type" name="wrong_note_type" value="">

                <div class="wBx mgT1 mgB1 mt30">
                    <table cellspacing="0" cellpadding="0" class="findTb">
                        <colgroup>
                            <col style="width: 120px"/>
                            <col width="*">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>문제선택</th>
                            <td class="pl15">
                                <select class="sele" id="mp_idx" name="mp_idx">
                                    @foreach($arr_base['subject_data'] as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <select class="sele" id="is_wrong_type" name="is_wrong_type">
                                    <option value="">전체문항</option>
                                    <option value="Y">정답문항</option>
                                    <option value="N">오답문항</option>
                                </select>
                                <select class="sele" id="question_view_type" name="question_view_type">
                                    <option value="Q">문제만보기</option>
                                    <option value="A">문제+해설보기</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>영역선택</th>
                            <td class="pl15">
                                <div class="f_left chkWp area-box">
                                    <input type="checkbox" id="all_area" name="all_area" value="Y"><label for="all_area">전체영역</label>
                                    @foreach($arr_base['area_data'] as $row)
                                        <span class="mal-id-{{ $row['MpIdx'] }}" style="display: none;">
                                            <input type="checkbox" class="chkbox-mp-idx-{{ $row['MpIdx'] }}" name="mal_idx[]" id="mal_idx_{{ $row['MalIdx'] }}" value="{{ $row['MalIdx'] }}"><label for="mal_idx_{{ $row['MalIdx'] }}">{{ $row['AreaName'] }}</label>
                                        </span>
                                    @endforeach
                                </div>
                                <div class="f_right btnAgR mr20 mb10">
                                    <a class="btnGray" href="javascript:void(0);" onclick="javascript:areaListHtml();">조회</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="btnAgR mgB1 mr20">
                <a class="tx-blue" href="javascript:void(0)" onclick="myWrongNote('N')">전체문항보기</a>
                <a class="btnBlue" href="javascript:void(0)" onclick="myWrongNote('Y')">나의오답노트</a>
                <a class="btnGray" href="javascript:void(0)" onclick="printPage();">출력하기</a>
            </div>
        </div>

        <div id="content_box"></div>
    </div>
    <script type="text/javascript">
        var $search_form = $('#search_form');
        $(document).ready(function() {
            $(".mal-id-"+$("#mp_idx").val()).show();
            $search_form.on('change', '#mp_idx, #is_wrong_type, #question_view_type', function () {
                areaListHtml();
            });

            $search_form.on('change', '#mp_idx', function () {
                $(".area-box > span").hide();
                $search_form.find('input[name="all_area"]').prop('checked', false);
                $search_form.find('input[name="mal_idx[]"]').prop('checked', false);
                $(".mal-id-"+$(this).val()).show();
            });

            $search_form.on('click', '#all_area', function () {
                if($(this).is(':checked') === true) {
                    $(".chkbox-mp-idx-"+$("#mp_idx").val()).prop('checked', true);
                    /*$search_form.find('input[name="mal_idx[]"]').prop('checked', true);*/
                } else {
                    $search_form.find('input[name="mal_idx[]"]').prop('checked', false);
                }
            });

            areaListHtml();
        });

        function myWrongNote(type) {
            $("#wrong_note_type").val(type);
            areaListHtml();
        }

        // 오답노트 리스트
        function areaListHtml()
        {
            var url = "{{ site_url("/classroom/mocktest/result/areaListHtml/") }}";
            var data = $('#search_form').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#content_box").html(d).end()
                },
                function(req, status, err){
                    showError(req, status);
                }, true, 'POST', 'html');
        }

        // 출력
        function printPage() {
            $(".area-box").hide();
            $('textarea').css('width','70%');
            $('textarea').attr('rows','5');
            $.print('.exam-paperList');
            $(".area-box").show();
            $('textarea').css('width','395px');
            $('textarea').attr('rows','1');
        }
    </script>
@stop