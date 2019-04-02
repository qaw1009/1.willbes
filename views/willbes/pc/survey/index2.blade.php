@extends('willbes.pc.layouts.master_no_sitdbar')

<link href="/public/css/willbes/basic.css" rel="stylesheet">
<link href="/public/css/willbes/style.css" rel="stylesheet">
<style type="text/css">
    /* 팝업*/
    .popcontent {padding:20px}
    .popcontent h3 {font-size:18px; border-bottom:2px solid #353348; color:#d39004; padding-bottom:10px}
    .question {margin-top:1em}
    .question p {padding:10px; background:#898989; border-bottom:1px solid #666; color:#fff; margin-bottom:1em}
    .question div.qBox {padding:5px 10px}
    .question span {color:#000; width:50px; display:block; font-weight:bold}
    .question div.qBox div {margin-bottom:10px}
    .question div.qBox ul {margin:0; padding:0; margin:10px 0}
    .question div.qBox ul input:checked + label{
        background: #fefe38;  
        }

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
    <!-- Container -->

    <div class="popcontent NGR">
        <h3>{{ $Title }}</h3>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" name="SpIdx" value="{{ $SpIdx }}" />
            @foreach($question as $key => $val)
            <div class="question">
                <p>Q {{ $val['GroupNumber'][0] }}. {{ $val['GroupTitle'] }} </p>
                @foreach($val['SubTitle'] as $key2 => $val2)
                <div class="qBox" id="div{{ $key }}{{ $key2 }}" @if(in_array($val2, $TypeT)) style="display:none;" @endif>
                    @if($val['GroupTitle'] != $val2) <strong>{{ $val2 }}</strong> @endif
                    <ul>
                        @foreach($questionD[$val['SqIdx'][$key2]] as $key3 => $val3)
                            <input type="hidden" name="totalIdx[]" value="{{ trim($val3['SqIdx']) }}" />
                            <input type="hidden" name="totalType[]" value="{{ trim($val3['Type']) }}" />
                            @if(trim($val3['Type']) == 'S')
                                @if(empty(trim($val3['Comment1']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_1" value="1" /> {{ trim($val3['Comment1']) }}</label><br>{{ trim($val3['Hint1']) }}</li> @endif
                                @if(empty(trim($val3['Comment2']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_2" value="2" /> {{ trim($val3['Comment2']) }}</label><br>{{ trim($val3['Hint2']) }}</li> @endif
                                @if(empty(trim($val3['Comment3']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_3" value="3" /> {{ trim($val3['Comment3']) }}</label><br>{{ trim($val3['Hint3']) }}</li> @endif
                                @if(empty(trim($val3['Comment4']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_4" value="4" /> {{ trim($val3['Comment4']) }}</label><br>{{ trim($val3['Hint4']) }}</li> @endif
                                @if(empty(trim($val3['Comment5']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_5" value="5" /> {{ trim($val3['Comment5']) }}</label><br>{{ trim($val3['Hint5']) }}</li> @endif
                                @if(empty(trim($val3['Comment6']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_6" value="6" /> {{ trim($val3['Comment6']) }}</label><br>{{ trim($val3['Hint6']) }}</li> @endif
                                @if(empty(trim($val3['Comment7']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_7" value="7" /> {{ trim($val3['Comment7']) }}</label><br>{{ trim($val3['Hint7']) }}</li> @endif
                                @if(empty(trim($val3['Comment8']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_8" value="8" /> {{ trim($val3['Comment8']) }}</label><br>{{ trim($val3['Hint8']) }}</li> @endif
                                @if(empty(trim($val3['Comment9']))===false)  <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_9" value="9" /> {{ trim($val3['Comment9']) }}</label><br>{{ trim($val3['Hint9']) }}</li> @endif
                                @if(empty(trim($val3['Comment10']))===false) <li><label><input type="radio" name="q{{ trim($val3['SqIdx']) }}" id="q{{ trim($val3['SqIdx']) }}_10" value="10" /> {{ trim($val3['Comment10']) }}</label><br>{{ trim($val3['Hint10']) }}</li> @endif
                            @elseif(trim($val3['Type']) == 'M')
                                @if(empty(trim($val3['Comment1']))===false)  {{ trim($val3['Comment1']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment2']))===false)  {{ trim($val3['Comment2']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment3']))===false)  {{ trim($val3['Comment3']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment4']))===false)  {{ trim($val3['Comment4']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment5']))===false)  {{ trim($val3['Comment5']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment6']))===false)  {{ trim($val3['Comment6']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment7']))===false)  {{ trim($val3['Comment7']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment8']))===false)  {{ trim($val3['Comment8']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment9']))===false)  {{ trim($val3['Comment9']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                                @if(empty(trim($val3['Comment10']))===false) {{ trim($val3['Comment10']) }} <textarea name="q{{ trim($val3['SqIdx']) }}[]" /></textarea><br> @endif
                            @elseif(trim($val3['Type']) == 'T')
                                @if(empty(trim($val3['Comment1']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_1" value="1" onClick="fn_visible(this, {{ $key }}, 1)" /> {{ trim($val3['Comment1']) }}</label><br>{{ trim($val3['Hint1']) }}</li> @endif
                                @if(empty(trim($val3['Comment2']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_2" value="2" onClick="fn_visible(this, {{ $key }}, 2)" /> {{ trim($val3['Comment2']) }}</label><br>{{ trim($val3['Hint2']) }}</li> @endif
                                @if(empty(trim($val3['Comment3']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_3" value="3" onClick="fn_visible(this, {{ $key }}, 3)" /> {{ trim($val3['Comment3']) }}</label><br>{{ trim($val3['Hint3']) }}</li> @endif
                                @if(empty(trim($val3['Comment4']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_4" value="4" onClick="fn_visible(this, {{ $key }}, 4)" /> {{ trim($val3['Comment4']) }}</label><br>{{ trim($val3['Hint4']) }}</li> @endif
                                @if(empty(trim($val3['Comment5']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_5" value="5" onClick="fn_visible(this, {{ $key }}, 5)" /> {{ trim($val3['Comment5']) }}</label><br>{{ trim($val3['Hint5']) }}</li> @endif
                                @if(empty(trim($val3['Comment6']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_6" value="6" onClick="fn_visible(this, {{ $key }}, 6)" /> {{ trim($val3['Comment6']) }}</label><br>{{ trim($val3['Hint6']) }}</li> @endif
                                @if(empty(trim($val3['Comment7']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_7" value="7" onClick="fn_visible(this, {{ $key }}, 7)" /> {{ trim($val3['Comment7']) }}</label><br>{{ trim($val3['Hint7']) }}</li> @endif
                                @if(empty(trim($val3['Comment8']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_8" value="8" onClick="fn_visible(this, {{ $key }}, 8)" /> {{ trim($val3['Comment8']) }}</label><br>{{ trim($val3['Hint8']) }}</li> @endif
                                @if(empty(trim($val3['Comment9']))===false)  <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_9" value="9" onClick="fn_visible(this, {{ $key }}, 9)" /> {{ trim($val3['Comment9']) }}</label><br>{{ trim($val3['Hint9']) }}</li> @endif
                                @if(empty(trim($val3['Comment10']))===false) <li><label><input type="checkbox" name="q{{ trim($val3['SqIdx']) }}[]" id="q{{ trim($val3['SqIdx']) }}_10" value="10" onClick="fn_visible(this, {{ $key }}, 10)" /> {{ trim($val3['Comment10']) }}</label><br>{{ trim($val3['Hint10']) }}</li> @endif
                            @else
                                <li><textarea name="qd{{ trim($val3['SqIdx']) }}" /></textarea></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            @endforeach

            <div class="btnsSt3">
                {{--@if($Is == 'N')--}}
                <a href="javascript:fn_submit();">설문 완료</a>
                {{--@endif--}}
            </div>
        </form>
    </div>
    <script>
        var $regi_form = $('#regi_form');

        function fn_visible(obj, num1, num2){
            if(obj.checked == true){
                $('#div'+num1+num2).show();
            } else {
                $('#div'+num1+num2).hide();
            }
        }

        function fn_submit(){

            var _url = '{{ front_url('/survey/store') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    opener.location.reload();
                    window.close();
                }
            }, showValidateError, null, false, 'alert');

        }
    </script>
@stop