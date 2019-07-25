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
                <a href="#" >채점 및 성적확인</a>
            </div>

            <h4 class="markingTit1">결과보기</h4>
            <form id="all_regi_form" name="all_regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" id="PrIdx" name="PrIdx"    value="{{ $pridx }}">
                <input type="hidden" id="PredictIdx" name="PredictIdx" value="{{ $PredictIdx }}">
                <div>
                    <table cellspacing="0" cellpadding="0" class="table_type table_type2">
                        <col width="25%" />
                        <col width="25%" />
                        <col width="25%" />
                        <<col width="*" />
                        <tr>
                            <th scope="col">과목</th>
                            <th scope="col">원점수</th>
                            <th scope="col">조정점수</th>
                            <th scope="col">정오표</th>
                        </tr>
                        <tr>
                            <td>@if(empty($scoredata)===false) {{ $scoredata['subject'][0] }}@else 미입력 @endif {{ $addscoreIs }}</td>
                            <td>@if($scoreIs == 'Y') {{ $scoredata['score'][0] }} @else 미입력 @endif</td>
                            {{--<td>@if($scoreIs == 'Y'&& $addscoreIs == 'N') 집계중 @elseif($scoreIs == 'Y'&&$addscoreIs == 'Y') {{ $scoredata['addscore'][0] }} @else 미입력 @endif</td>--}}
                            <td>집계중</td>
                            <td rowspan="5" class="tx-center"><a href="javascript:resultPop(100001)" class="mypoint">확인 </a></td>
                        </tr>
                        <tr>
                            <td>@if(empty($scoredata)===false) {{ $scoredata['subject'][1] }}@else 미입력 @endif</td>
                            <td>@if($scoreIs == 'Y') {{ $scoredata['score'][1] }} @else 미입력 @endif</td>
                            {{--<td>@if($scoreIs == 'Y'&& $addscoreIs == 'N') 집계중 @elseif($scoreIs == 'Y'&&$addscoreIs == 'Y') {{ $scoredata['addscore'][1] }} @else 미입력 @endif</td>--}}
                            <td>집계중</td>
                        </tr>
                        <tr>
                            <td>@if(empty($scoredata)===false) {{ $scoredata['subject'][2] }}@else 미입력 @endif</td>
                            <td>@if($scoreIs == 'Y') {{ $scoredata['score'][2] }} @else 미입력 @endif</td>
                            {{--<td>@if($scoreIs == 'Y'&& $addscoreIs == 'N') 집계중 @elseif($scoreIs == 'Y'&&$addscoreIs == 'Y') {{ $scoredata['addscore'][2] }} @else 미입력 @endif</td>--}}
                            <td>집계중</td>
                        </tr>
                        <tr>
                            <td>@if(empty($scoredata)===false) {{ $scoredata['subject'][3] }}@else 미입력 @endif</td>
                            <td>@if($scoreIs == 'Y') {{ $scoredata['score'][3] }} @else 미입력 @endif</td>
                            {{--<td>@if($scoreIs == 'Y'&& $addscoreIs == 'N') 집계중 @elseif($scoreIs == 'Y'&&$addscoreIs == 'Y') {{ $scoredata['addscore'][3] }} @else 미입력 @endif</td>--}}
                            <td>집계중</td>
                        </tr>
                        <tr>
                            <td>@if(empty($scoredata)===false) {{ $scoredata['subject'][4] }}@else 미입력 @endif</td>
                            <td>@if($scoreIs == 'Y') {{ $scoredata['score'][4] }} @else 미입력 @endif</td>
                            {{--<td>@if($scoreIs == 'Y'&& $addscoreIs == 'N') 집계중 @elseif($scoreIs == 'Y'&&$addscoreIs == 'Y') {{ $scoredata['addscore'][4] }} @else 미입력 @endif</td>--}}
                            <td>집계중</td>
                        </tr>
                    </table>

                    <div class="mt10 tx-center">
                        자세한 합격예측 분석 데이터는 PC버전에서
                        확인 가능합니다.
                    </div>
                    <div class="markSbtn1">
                        <a href="javascript:examDeleteAjax()">재채점하기</a>
                    </div>
                </div>
            </form>

            <div id="mypoint" class="willbes-Layer-marking">
                <a class="closeBtn" href="#none" onclick="closeWin('mypoint')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit">정오표</div>
                <div class="Layer-Cont">
                    <ul class="markTab markTab2">
                        @foreach($subject_list as $key => $val)
                        <li><a href="javascript:tabChange('{{ $val['PpIdx'] }}')" id="tab_{{ $val['PpIdx'] }}" @if($key == 0) class="active" @endif>{{ $val['CcdName'] }}</a></li>
                        @endforeach
                    </ul>
                    @foreach($subject_list as $key => $val)
                    <div id="ss_{{ $val['PpIdx'] }}" @if($key != 0) style="display:none;" @endif>

                        <table cellspacing="0" cellpadding="0" class="table_type table_type3">
                            <col />
                            <tr>
                                <th>구분</th>
                                <th>정오</th>
                                <th>정답</th>
                                <th>내답</th>
                                <th>구분</th>
                                <th>정오</th>
                                <th>정답</th>
                                <th>내답</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][0] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][0] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][0] }}</td>
                                <th>11</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][10] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][10] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][10] }}</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][1] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][1] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][1] }}</td>
                                <th>12</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][11] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][11] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][11] }}</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][2] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][2] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][2] }}</td>
                                <th>13</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][12] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][12] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][12] }}</td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][3] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][3] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][3] }}</td>
                                <th>14</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][13] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][13] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][13] }}</td>
                            </tr>
                            <tr>
                                <th>5</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][4] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][4] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][4] }}</td>
                                <th>15</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][14] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][14] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][14] }}</td>
                            </tr>
                            <tr>
                                <th>6</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][5] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][5] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][5] }}</td>
                                <th>16</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][15] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][15] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][15] }}</td>
                            </tr>
                            <tr>
                                <th>7</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][6] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][6] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][6] }}</td>
                                <th>17</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][16] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][16] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][16] }}</td>
                            </tr>
                            <tr>
                                <th>8</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][7] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][7] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][7] }}</td>
                                <th>18</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][17] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][17] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][17] }}</td>
                            </tr>
                            <tr>
                                <th>9</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][8] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][8] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][8] }}</td>
                                <th>19</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][18] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][18] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][18] }}</td>
                            </tr>
                            <tr>
                                <th>10</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][9] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][9] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][9] }}</td>
                                <th>20</th>
                                <td>{!!$newQuestion['IsWrong'][$val['PpIdx']][19] !!}</td>
                                <td>{{ $newQuestion['RightAnswer'][$val['PpIdx']][19] }}</td>
                                <td>{{ $newQuestion['Answer'][$val['PpIdx']][19] }}</td>
                            </tr>
                        </table>
                        <div class="markingPoint"><span>원점수</span>{{ $newQuestion['OrgPoint'][$val['PpIdx']][19] }}</div>
                    </div>
                    @endforeach

                </div>
            </div>
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

    <script type="text/javascript">
        var $all_regi_form = $('#all_regi_form');
        var scoreType = '{{ $scoreType }}';

        $( document ).ready( function() {
            @if(date('YmdHi') >= '201905011600')
            alert('서비스가 종료되었습니다.');
            var url = "{{ site_url('/m/home/index') }}";
            location.href = url;
            @endif
        });

        $(function() {
            $('.tg-tit a').click(function() {
                var $lec_buy_table = $('.tg-cont');

                if ($lec_buy_table.is(':hidden')) {
                    $lec_buy_table.show().css('visibility','visible');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off_white.png');
                } else {
                    $lec_buy_table.hide().css('visibility','hidden');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on_white.png');
                }
            });
        });

        function tabChange(num){
            $("[id*='tab_']").removeClass('active');
            $('#tab_'+num).addClass('active');
            $('[id*="ss_"]').hide();
            $('#ss_'+num).show();
        }

        function resultPop(PredictIdx){
            if(scoreType == 'DIRECT'){
                alert('점수를 직접입력한 경우, 정오표를 제공하지 않습니다.');
                return ;
            }
            $('#mypoint').show();
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