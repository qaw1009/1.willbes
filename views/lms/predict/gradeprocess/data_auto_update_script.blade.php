@extends('lcms.layouts.master_single')

@section('content')
<form id="data_form" name="data_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" id="PredictIdx" name="PredictIdx" value="{{ $predict_idx }}" />
</form>

<form name="search_form">
    <input type="hidden" id="depth_type_1" name="depth_type_1" value="0">
    <input type="hidden" id="depth_type_2" name="depth_type_2" value="0">
    <input type="hidden" id="result" name="result" value="0">
    <input type="hidden" id="cnt" name="cnt" value="0">
</form>

<div class="text-left mt-10">
    <p class="mt-10" style="font-size: 15px">
        * 새로고침할 경우 스크립트로 반영한 데이터는 모두 초기화 됨.
    </p>
    <b>원점수입력</b> : <span id="txt_depth_1" style="font-size: 15px;">미실행</span><br>
    <b>조정점수반영</b> : <span id="txt_depth_2" style="font-size: 15px;">미실행</span><br>
    <b>시험통계처리</b> : <span id="txt_depth_3" style="font-size: 15px;">미실행</span><br>
    <b>최종결과</b> : <span id="txt_result" style="font-size: 15px;">미실행</span><br>
    <b>스크립트 실행횟수</b> : <span id="txt_cnt" style="font-size: 15px;">미실행</span><br>
</div>

<div class="text-left mt-20">
    <div class="mt-10" style="font-size: 15px">
        실행여부 : <span id="start_type">대기중</span>
    </div>
    <div class="mt-10" style="font-size: 15px">
        <button onclick="startUpdate();">시작</button>
        <button onclick="stopUpdate();">중단</button>
    </div>
</div>

<script>
    var $data_form = $("#data_form");
    var $search_form = $("#search_form");
    $(document).ready(function() {
        var time = 1000 * 60 * {{$timer}};  //1시간단위
        //var time = 5000;  //1시간단위
        console.log(time);

        startUpdate = function() {
            $("#start_type").addClass('red').text('시작중');
            starting = setInterval(function() {
                depth_1();
                if ($("#depth_type_1").val() == 1) {
                    depth_2();
                    if ($("#depth_type_2").val() == 1) {
                        depth_3();
                    }
                }
            }, time);
        };
    });

    stopUpdate = function() {
        $("#start_type").removeClass('red').text('중지');
        clearInterval(starting);
    };

    //원점수반영
    function depth_1() {
        var _url = '{{ site_url('/predict/gradeprocessing/scoreMakeStep1Ajax') }}';
        ajaxSubmit($data_form, _url, function(ret) {
            if(ret.ret_cd) {
                $("#txt_depth_1").text("실행").trigger("change");
                $("#depth_type_1").val("1");
            }
        }, function(result, status) {
            showValidateError(result, status);
            stopUpdate();
        }, null, false, 'alert');
    }

    //조정점수반영
    function depth_2() {
        var _url = '{{ site_url('/predict/gradeprocessing/scoreMakeStep2Ajax') }}';
        ajaxSubmit($data_form, _url, function(ret) {
            if(ret.ret_cd) {
                $("#txt_depth_2").text("실행");
                $("#depth_type_2").val("1");
            }
        }, function(result, status) {
            showValidateError(result, status);
            stopUpdate();
        }, null, false, 'alert');
    }

    //시험통계처리
    function depth_3() {
        var d = new Date();
        var d_write = d.getFullYear() + '-' + d.getMonth() + 1 + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();

        var _url = '{{ site_url('/predict/gradeprocessing/scoreMakeStep3Ajax') }}';
        ajaxSubmit($data_form, _url, function(ret) {
            if(ret.ret_cd) {
                $("#txt_depth_3").text("실행");
                $("#depth_type_3").val("1");
                $("#cnt").val(parseInt($("#cnt").val()) + 1);

                $("#txt_result").text("성공");
                $("#txt_cnt").text(d_write + ' ' + $("#cnt").val());
            }
        }, function(result, status) {
            showValidateError(result, status);
            stopUpdate();
        }, null, false, 'alert');
    }
</script>
@stop