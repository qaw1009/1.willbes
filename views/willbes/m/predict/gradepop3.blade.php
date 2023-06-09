@extends('willbes.m.layouts.master_no_footer')
@section('content')
<link href="/public/css/willbes/promotion/2002_1332M.css" rel="stylesheet">
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="predictWrap">
            <div class="willbes-Tit">
                합격예측 풀서비스 <span class="NGEB"></span>
            </div>
            <div class="marktxt2">빠르고 간편한 모바일 전용 채점 서비스 입니다.</div>
            <div class="tg-note">
                <div class="tg-tit"> <a href="#none">채점 시 유의사항<img src="{{ img_url('m/mypage/icon_arrow_off_white.png') }}"></a></div>
                <div class="tg-cont">
                    <ul>
                        <li>
                            성적 신뢰도를 위해 채점은 1회만 수정 가능하오니, 신중하게 채점해 주시기 바랍니다.
                        </li>
                        <li>
                            채점하는 방식은 본인의 상황에 맞게 선택할 수 있습니다.<br />
                            - '일반채점' : 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크 (PC)<br />
                            - '빠른채점'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력 (PC/모바일)<br />
                            - '직접입력'은 별도 채점 없이 본인의 점수를 직접 입력 (PC/모바일)
                        </li>
                        <li>
                            채점 후 ‘완료’ 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.
                        </li>
                        <li>
                            기본정보는 사전예약 기간에만(~3/25) 수정이 가능하며, 본 서비스 오픈 후에는(3/26~) 수정이 불가합니다.
                        </li>
                        <li>
                            자세한 합격예측 분석 데이터는 PC버전에서 확인 가능합니다.
                        </li>
                    </ul>
                </div>
            </div>
            <!-- //tg-note -->

            <div class="markMbtn2">
                <a href="#none" onclick="javascript:event_step_1();" class="btn2">기본정보입력</a>
                <a href="#none" onclick="javascript:alert('기본정보를 저장하고 채점해주세요.');" >채점 및 성적확인</a>
            </div>

            <h4 class="markingTit1">채점하기</h4>
            <form id="all_regi_form" name="all_regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" id="PrIdx" name="PrIdx" value="{{ $pridx }}">
                <input type="hidden" id="PredictIdx" name="PredictIdx" value="{{ element('PredictIdx', $arr_input) }}">

                <ul class="markTab">
                    <li><a href="javascript:gotab({{ element('PredictIdx', $arr_input) }})">빠른채점</a></li>
                    <li><a href="#tab2" class="active">직접입력</a></li>
                </ul>

                <div id="tab2">
                    <div class="marking marking2">
                        <ul>
                            @foreach($subject_list as $key => $val)
                            <li>
                                <div>
                                    <label>{{ $val['CcdName'] }}</label>
                                    <input type="number" name="Score[]" maxlength="4" data-take-mock-part="{{$val['TakeMockPart']}}" data-max-num="{{$val['TotalScore']}}" oninput="maxLengthCheck(this)" @if(empty($subject_grade)===false) value="{{ $subject_grade[$val['PpIdx']] }}" @endif >
                                    <input type="hidden" name="PpIdx[]" value="{{ $val['PpIdx'] }}" />
                                    <span>점</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt10 tx-center">
                        점수를 직접 입력 하실 경우,
                        정오표는 별도로 제공되지 않습니다.
                    </div>
                    <div class="markSbtn1">
                        <a href="javascript:lastSave();">완료</a>
                        {{--<a href="javascript:examDeleteAjax()" class="btn3">취소</a>--}}
                    </div>
                </div>

            </form>

        </div>
        <!-- predictWrap //-->

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->

    <script>
        var $all_regi_form = $('#all_regi_form');

        $( document ).ready( function() {
            {{--@if(date('YmdHi') >= '201905011600')
            alert('서비스가 종료되었습니다.');
            var url = "{{ site_url('/m/home/index') }}";
            location.href = url;
            @endif--}}
        });

        function maxLengthCheck(object) {
            if($(object).prop('type') == 'number') {
                /*object.value = object.value.replace(/[^0-9.]/g, "");*/
                if($(object).data('max-num') != undefined) {
                    if( Number(object.value) > Number($(object).data('max-num')) ) {
                        object.value = object.value.slice(0, -1);
                    }
                }
            }

            if (object.value.length > object.maxLength) {
                object.value = object.value.slice(0, object.maxLength);
            }
        }

        function event_step_1() {
            location.href = '{{ front_url('/predict/index/') }}' + $('#PredictIdx').val();
        }

        function gotab(PredictIdx){
            _url = '{{ front_url('/predict/popwin2/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
            location.replace(_url);
        }

        function lastSave(){
            var vali_msg = '';
            var check = true;

            $('input[name="Score[]"]').each(function(){
                var scoring = ($(this).data("take-mock-part") == 300) ? 5 : 2.5;
                var scr_val = $(this).val();

                if($.trim(scr_val) == ''){
                    vali_msg = '점수를 입력하지 않은 과목이 있습니다';
                    check = false;
                }else if(scr_val < 0 || scr_val > 100){
                    vali_msg = '점수는 0~100점 사이 이어야 합니다';
                    check = false;
                } else {
                    if(scr_val % scoring == 0) {
                    } else {
                        vali_msg = '정확한 원점수를 입력해주세요'; //한문제당 0.5점
                        check = false;
                    }
                }
            });
            if(check == false){ alert(vali_msg); return false; }

            if (confirm('정답을 제출하시겠습니까?')) {
                var _url = '{{ front_url('/predict/examSendAjax3') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        {{--parent.location.replace('{{ front_url('/promotion/index/cate/3001/code/1210') }}');--}}
                        _url = '{{ front_url('/predict/popwin4/?PredictIdx=') }}' + $('#PredictIdx').val() + '&pridx='+$('#PrIdx').val();
                        location.replace(_url);
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        function examDeleteAjax() {
            if (confirm('채점취소시 기존의 성적모든데이터는 삭제됩니다. \n 채점취소 하시겠습니까?')) {
                var _url = '{{ front_url('/predict/examDeleteAjax') }}';
                ajaxSubmit($all_regi_form, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        parent.location.replace('{{ front_url('/promotion/index/cate/3001/code/2272') }}');
                    }
                }, showValidateError, null, false, 'alert');
            }
        }
    </script>
@stop