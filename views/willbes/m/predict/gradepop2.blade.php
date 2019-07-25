@extends('willbes.m.layouts.master_no_footer')
@section('content')
<link href="/public/css/willbes/promotion/2002_1332M.css" rel="stylesheet">
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="predictWrap">
        <div class="willbes-Tit">
            합격예측 풀서비스 <span class="NGEB">사전예약</span>
        </div>
        <div class="marktxt2">빠르고 간편한 모바일 전용 채점 서비스 입니다.</div>
        <div class="tg-note">
            <div class="tg-tit"> <a href="#none">채점 시 유의사항<img src="{{ img_url('m/mypage/icon_arrow_off_white.png') }}"></a></div>
            <div class="tg-cont">
                <ul>
                    <li>
                        성적 신뢰도를 위해 최초채점을 제외하고 2회까지만 재채점을 통해 수정이 가능합니다.
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
                        기본정보는 사전예약 기간에만(~8/30) 수정이 가능하며, 본 서비스 오픈 후에는(8/31~) 수정이 불가합니다.
                    </li>
                    <li>
                        자세한 합격예측 분석 데이터는 PC버전에서 확인 가능합니다.
                    </li>
                </ul>
            </div>
        </div>
        <!-- //tg-note -->

        <div class="markMbtn2">
            <a href="javascript:parent.location.reload()" class="btn2">기본정보입력</a>
            <a href="javascript:alert('기본정보를 저장하고 채점해주세요.');" >채점 및 성적확인</a>
        </div>

        <h4 class="markingTit1">채점하기</h4>
        <form id="all_regi_form" name="all_regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id="PrIdx" name="PrIdx"    value="{{ $pridx }}">
            <input type="hidden" id="PredictIdx" name="PredictIdx" value="{{ element('PredictIdx', $arr_input) }}">
            <ul class="markTab">
                <li><a href="#tab1" class="active">빠른채점</a></li>
                <li><a href="javascript:gotab({{ element('PredictIdx', $arr_input) }})">직접입력</a></li>
            </ul>
            <div id="tab1">
                <div class="marking">
                @foreach($subject_list as $key => $val)
                        <h5>{{ $val['CcdName'] }}</h5>
                        <ul>
                            @foreach($newQuestion['numset'][$val['PpIdx']] as $key2 => $val2)
                            <li>
                                <div>
                                    <label>{{ $val2 }}번</label>
                                    <input type="text" name="Answer[]" maxlength="5" oninput="maxLengthCheck(this)" value="{{ $newQuestion['answerset'][$val['PpIdx']][$key2] }}">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    <input type="hidden" name="PpIdx[]" value="{{ $val['PpIdx'] }}" />
                @endforeach
                </div>

                <div class="mt10 tx-center">
                    답안을 다시 한번 확인 하시고,
                    하단 완료 버튼을 눌러 주세요.
                </div>
                <div class="markSbtn1">
                    <a href="javascript:lastSave()">완료</a>
                    <a href="javascript:examDeleteAjax()" class="btn3">취소</a>
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
    var scoreIs = '{{ $scoreIs }}';

    $( document ).ready( function() {
        @if(date('YmdHi') >= '201905011600')
        alert('서비스가 종료되었습니다.');
        var url = "{{ site_url('/m/home/index') }}";
        location.href = url;
        @endif

        if(scoreIs == 'Y'){
            _url = '{{ front_url('/predict/popwin4/?PredictIdx=') }}' + $('#PredictIdx').val() + '&pridx='+$('#PrIdx').val();
            location.replace(_url);
        }

    });

    function maxLengthCheck(object){
        if (object.value.length > object.maxLength){
            object.value = object.value.slice(0, object.maxLength);
        }
    }

    function gotab(PredictIdx){
        _url = '{{ front_url('/predict/popwin3/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
        location.replace(_url);
    }

    function lastSave(){
        if (confirm('정답을 제출하시겠습니까?')) {
            var _url = '{{ front_url('/predict/examSendAjax2') }}';
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
                    parent.location.replace('{{ front_url('/promotion/index/cate/3001/code/1210') }}');
                }
            }, showValidateError, null, false, 'alert');
        }
    }
</script>
@stop