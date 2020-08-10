@extends('willbes.pc.layouts.master_no_sitdbar')
<link href="/public/css/willbes/basic.css" rel="stylesheet">
<link href="/public/css/willbes/style.css" rel="stylesheet">
<style type="text/css">
    .popcontent {padding:20px}
    .popcontent h3 {font-size:18px; border-bottom:2px solid #353348; color:#d39004; padding-bottom:10px}
    .question {margin-top:1em}
    .question p {padding:10px; background:#898989; border-bottom:1px solid #666; color:#fff; margin-bottom:1em}
    .question div.qBox {padding:5px 10px}
    .question span {color:#000; width:50px; display:block; font-weight:bold}
    .question div.qBox div {margin-bottom:10px}
    .question div.qBox ul {padding:0; margin:10px 0}
    .question li {display:inline; float:left; margin-right:10px}
    .question ul:after {content:""; display:block; clear:both}
    .question .tab li {display:inline; float:left; margin-right:1px}
    .question .tab:after {content:""; display:block; clear:both}
    .question .tab a {display:block; padding:5px 10px}
    .question .tab a:hover,
    .question .tab a.active {background:#464646; color:#fff}
    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 a {display:inline-block; padding:8px 16px; background:#d39004; color:#fff !important; font-weight:400; border:1px solid #d39004}
    .btnsSt3 a:hover {background:#fff; color:#d39004 !important}
</style>
@section('content')
    <div class="popcontent NGR">
        <h3>{{ $data_survey['SpTitle'] }}</h3>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="sp_idx" value="{{ $data_survey['SpIdx'] }}" />
            <input type="hidden" name="is_series" id="is_series" value="{{$is_series}}">
            <input type="hidden" name="series_subject_cnt" id="series_subject_cnt" value="1">
            <input type="hidden" name="total_cnt" id="total_cnt" value="">

            @for($i=1;$i<=$count;$i++)
                @if(empty($data_question[$i]) === false)
                    @foreach($data_question[$i] as $key => $val)

                        @if($is_series == 'Y' && $key == 0 ) {{--응시직렬--}}
                            @if($i==1)
                                <div class="question">
                                    <p>Q{{ $key+1 }}. {{ trim($val['SqTitle']) }} </p>
                                    @if(empty($val['SqJsonData']) === false)
                                        @foreach($val['SqJsonData'] as $item_k => $item_v)
                                            <div class="qBox">
                                                <ul>
                                                    @if(empty($item_v['item']) === false)
                                                        @foreach($item_v['item'] as $k => $item)
                                                            <li>
                                                                <label>
                                                                    <input type="radio" name="s_type[{{$val['SqIdx']}}][{{$item_k}}]" value="{{ $k }}" onclick="fn_display(this,{{$k}})"> {{$item}}
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        @else
                            <div class="question series_group series_{{$i}} @if($i > 1) d_none @endif">
                                <p>Q{{ $key+1 }}. {{ trim($val['SqTitle']) }} </p>

                                @if(empty($val['SqComment']) === false)
                                    <strong style="padding-left:10px;">{{ trim($val['SqComment']) }}</strong>
                                @endif

                                @if($val['SqType'] == 'T') {{-- 복수형 --}}
                                    <div class="qBox">
                                        <ul>
                                            @if(empty($val['SqJsonData']) === false)
                                                @foreach($val['SqJsonData'] as $item_k => $item_v)
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" name="t_type[]" value="{{$item_k}}" onclick="fn_visible(this,'{{$val['SqType']}}_{{$i}}_{{$val['SqIdx']}}_{{$item_k}}',{{$question_count[$i]['subject_cnt']}})"> {{$item_v['title']}}
                                                        </label>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endif

                                @if(empty($val['SqJsonData']) === false)
                                    @foreach($val['SqJsonData'] as $item_k => $item_v)
                                        <div class="qBox @if($val['SqType'] == 'T') series_type_group d_none @endif" id="{{$val['SqType']}}_{{$i}}_{{$val['SqIdx']}}_{{$item_k}}">
                                            <strong>{{$item_v['title'] or ''}}</strong>
                                            <ul>
                                                @if($val['SqType'] == 'D') {{-- 서술형 --}}
                                                    <li><textarea name="s_type[{{$val['SqIdx']}}][{{$item_k}}]" rows="7" cols="100"></textarea></li>
                                                @endif

                                                @if(empty($item_v['item']) === false) {{-- 선택형 --}}
                                                    @foreach($item_v['item'] as $k => $item)
                                                        <li>
                                                            <label>
                                                                <input type="radio" name="s_type[{{$val['SqIdx']}}][{{$item_k}}]" value="{{ $k }}"> {{$item}}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        @endif
                    @endforeach
                @endif
            @endfor

            <div class="btnsSt3 btn-submit-survey">
                <a href="javascript:fn_submit();">설문 완료</a>
            </div>
        </form>
    </div>
    <script>
        var overlap_chk = true; //중복 전송 방지
        var $regi_form = $('#regi_form');

        // 관목 선택 갯수 체크
        function fn_visible(obj, sel_target, pick_sjt_cnt){
            var cknum = $('input:checkbox[name="t_type[]"]:checked').length;
            if(cknum > pick_sjt_cnt){
                alert('직렬별 과목은 '+pick_sjt_cnt+'개까지 선택할 수 있습니다.');
                obj.checked = false;
                return;
            }
            if(obj.checked == true){
                $('#' + sel_target).removeClass('d_none');
            } else {
                $('#' + sel_target).addClass('d_none');
            }
        }

        // 응시직렬
        function fn_display(obj,idx){
            $(".series_group").addClass("d_none");
            $(".series_" + idx).removeClass("d_none");
            $(".series_type_group").addClass("d_none");
            $("#series_subject_cnt").val(idx);

            $('input:radio').not(obj).each(function(i) {
                $(this).prop("checked",false);
            });
            $('input:checkbox').each(function(i){
                $(this).prop("checked",false);
            });
            $('textarea').each(function(i) {
                $(this).prop("disabled",false);
            });
        }

        function fn_submit(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}

            var vali_msg = '';
            var series_subject_cnt = $("#series_subject_cnt").val();
            var json_data = {!! json_encode($question_count) !!};
            var pick_sjt_cnt = json_data[series_subject_cnt]['subject_cnt'];

            $("#total_cnt").val(json_data[series_subject_cnt]['total_cnt']);

            $('input:radio').each(function(i) {
                if($(this).is(':visible')){
                    if($('input:radio[name="' + $(this).prop('name') + '"]').is(':checked') === false){
                        vali_msg = '응답하지 않은 설문이 있습니다.';
                    }
                }else{
                    $(this).prop("checked",false);
                }
            });
            $('input:checkbox').each(function(i){
                if($(this).is(':visible') && $('input:checkbox[name="' + $(this).prop('name') + '"]:checked').length != pick_sjt_cnt){
                    vali_msg = '직렬별 선택 과목은 '+pick_sjt_cnt+'개 선택하셔야 합니다.';
                }
            });
            $('textarea').each(function(i) {
                if($(this).is(':visible')){
                    if(!$.trim($(this).val())){
                        vali_msg = '응답하지 않은 설문이 있습니다.';
                    }
                }else{
                    $(this).prop("disabled",true);
                }
            });

            if(vali_msg) { alert(vali_msg); return; }

            if(overlap_chk === false){
                alert('등록 중입니다');
                return false;
            }

            var _url = '{{ front_url('/eventSurvey/store') }}';
            overlap_chk = false;
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    opener.location.reload();
                    window.close();
                }
                overlap_chk = true;
            }, surveyPopValidationError, null, false, 'alert');
        }

        //클릭 중복방지 떄문에 부득이하게 에러 콜백 추가
        function surveyPopValidationError(result, status, error_view)
        {
            overlap_chk = true;
            if(typeof error_view === 'undefined') error_view = 'alert';
            var err_msg = result.ret_msg || '';
            if (err_msg === '') {
                if (status === 401) {  //권한 없음 || 미로그인
                    err_msg = '권한이 없습니다.';
                } else if (status === 403) {
                    err_msg = '토큰 정보가 올바르지 않습니다.';
                }
            }
            if (error_view === 'alert') {
                alert(err_msg);
            } else {
                notifyAlert('error', '알림', err_msg);
            }
        }

    </script>
@stop