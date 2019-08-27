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
    @php
        //2019년 2차 경행경채를 위한 SpIdx. TODO 하드코딩 개선
        $sp_idx_201908 = (ENVIRONMENT == 'local' || 'dev' ? 7 : 7 );
        if($SpIdx == $sp_idx_201908){
            $TypeT[] = '수사';
            $TypeT[] = '행정법';
        }
    @endphp
    <div class="popcontent NGR">
        <h3>{{ $Title }}</h3>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="SpIdx" value="{{ $SpIdx }}" />
            @foreach($question as $key => $val)
                <div id="question{{$key}}" class="question">
                    <p>Q {{ $val['GroupNumber'][0] }}. {{ $val['GroupTitle'] }} </p>

                    @foreach($val['SubTitle'] as $key2 => $val2)
                        <div class="qBox" id="div{{ $key }}{{ $key2 }}" @if(in_array($val2, $TypeT)) style="display:none;" @endif>
                            @if($val['GroupTitle'] != $val2) <strong>{{ $val2 }}</strong> @endif
                            <ul>

                                @foreach($questionD[$val['SqIdx'][$key2]] as $key3 => $val3)
                                    <input type="hidden" id="totalIdx{{trim($val3['SqIdx']).$key}}" name="totalIdx[]" value="{{ trim($val3['SqIdx']) }}" />
                                    <input type="hidden" id="totalType{{trim($val3['SqIdx']).$key}}" name="totalType[]" value="{{ trim($val3['Type']) }}" />
                                    @if(trim($val3['Type']) == 'S')
                                        @for($i = 1; $i <= 25; $i++)
                                            @if(empty(trim($val3['Comment'.$i]))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_1" value="{{ $i }}" data-SqIdxKey="{{trim($val3['SqIdx'].$key)}}" onclick="fn_click_serial(this, {{ $key }}, {{ $i }}, {{ $val3['SqIdx'] }})" /> {{ trim($val3['Comment'.$i]) }}</label><br>{{ trim($val3['Hint'.$i]) }}</li> @endif
                                        @endfor
                                    @elseif(trim($val3['Type']) == 'M')
                                        @for($i = 1; $i <= 25; $i++)
                                            @if(empty(trim($val3['Comment'.$i]))===false)  {{ trim($val3['Comment'.$i]) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                        @endfor
                                    @elseif(trim($val3['Type']) == 'T')
                                        @for($i = 1; $i <= 25; $i++)
                                            @if(empty(trim($val3['Comment'.$i]))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}" value="{{ $i }}" data-SqIdxKey="{{trim($val3['SqIdx'].$key)}}" onclick="fn_visible(this, {{ $key }}, {{ $i }}, {{ $val3['SqIdx'] }})" /> {{ trim($val3['Comment'.$i]) }}</label><br>{{ trim($val3['Hint'.$i]) }}</li> @endif
                                        @endfor
                                    @else
                                        <li><textarea name="qd{{ trim($val3['SqIdx']) }}"></textarea></li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    @endforeach

                </div>
            @endforeach
            <div class="btnsSt3 btn-submit-survey">
                <a href="javascript:fn_submit();">설문 완료</a>
            </div>
        </form>
    </div>
    <script>
        var $regi_form = $('#regi_form');

        function fn_visible(obj, num1, num2, qnum){
            var cknum = $("input:checkbox[id=q"+qnum+"]:checked").length;
            if(cknum > 3){
                alert('직렬별 과목은 3개까지 선택할 수 있습니다.');
                obj.checked = false;
                return;
            }
            if(obj.checked == true){
                $('#div'+num1+num2).show();
            } else {
                $('#div'+num1+num2).hide();
            }
        }

        function fn_submit(){
            $('.btn-submit-survey').hide(); //중복 전송 방지
            fn_input_disabled(true,function(){
                var _url = '{{ front_url('/survey/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    fn_input_disabled(false, function(){
                        if(ret.ret_cd) {
                            alert(ret.ret_msg);
                            opener.location.reload();
                            window.close();
                        }
                    });
                }, showValidateError, null, false, 'alert');
            });
        }

        function fn_click_serial(obj, num1, num2, qnum){
            if('{{$sp_idx_201908}}' == '{{$SpIdx}}'){
                /**
                 * 2019년 2차 경행경채를 위한 로직.
                 * 경행경채는 선택과목이 없음. 형법, 형사소송법, 경찰학개론, 수사, 행정법 5개 필수 과목 고정
                 * TODO 하드코딩 개선
                 */
                if(num1 == 1){
                    //응시직렬
                    if(num2 == 2){
                        //경행경채
                        $('#div30').hide();
                        $('#div31').hide();
                        $('#div32').show();
                        $('#div33').show();
                        $('#div34').show();
                        $('#div35').show();
                        $('#div36').show();
                        $('#question4').hide();
                    }else{
                        //일반공채, 101단
                        $('#div30').show();
                        $('#div31').show();
                        $('#div32').hide();
                        $('#div33').hide();
                        $('#div34').hide();
                        $('#div35').hide();
                        $('#div36').hide();
                        $('#question4').show();
                    }
                }
            }
        }

        function fn_input_disabled(disFlag, callBackFunc){
            //보이지않는 것들은 disabled 처리
            $('input:radio:hidden, input:checkbox:hidden').each(function(i){
                var sq_idx_data = $(this).data('sqidxkey');
                if(disFlag){
                    $(this).prop('disabled',true);
                    $('#totalIdx'+sq_idx_data).prop('disabled',true);
                    $('#totalType'+sq_idx_data).prop('disabled',true);
                }else{
                    $(this).prop('disabled',false);
                    $('#totalIdx'+sq_idx_data).prop('disabled',false);
                    $('#totalType'+sq_idx_data).prop('disabled',false);
                }
            });
            callBackFunc();
        }

    </script>
@stop