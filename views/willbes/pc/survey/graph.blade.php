@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
<style type="text/css">
    .Cts03 {margin-bottom:100px; text-align:left}
    .Cts03 h3 {font-size:16px;}
    .Cts03 h3 span {color:#fa7738}
    .graphWrap {width:100%; margin-top:50px; font-size:14px; line-height:1.5;}
    .graphWrap li {position:relative; display:inline; float:left; width:48%; text-align:left; margin:0 0.5%;}
    .graphWrap select {position:absolute; top:5px; right:0}
    .graphWrap:after {content:""; display:block; clear:both}
    .graphbox {width:90%; margin:20px auto; border:1px solid #000;}
    .graphbox .subTit {font-size:120%; color:#F30}
    .graph {width:20%; float:left; text-align:center; background:url(http://file.willbes.net/new_image/2015/04/graphBg.png) repeat;}
    .graph p {padding:10px 0; background:#fff}
    .graph p:last-child {border-top:1px solid #333}
    .graph div {position:relative; width:45px; height:250px; margin:0 auto;}
    .graph div img {position:absolute; bottom:0; left:0; width:100%; background:#e2be43 url(https://static.willbes.net/public/images/promotion/common/patternA.png) repeat;}
    .graph2 div img {background:#bdbdcc url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat;}
    .graphbox:after {content:""; display:block; clear:both}
    .graphWrap:after {content:""; display:block; clear:both}
    .Cts03_01 {width:1120px; text-align:left; margin:80px auto 0}
    .Cts03_01 div {border:1px solid #e4e4e4; padding:20px; margin-top:20px}
    .maxWidth135 {max-width: 135px}
</style>
<div class="Cts03">
    <ul class="graphWrap">
        <li>
            <h3>전체 시험 난이도 </h3>
            <div>
                <div class="graphbox">
                    @if(empty($resSet)===false)
                        @for($i=1; $i <= $resSet[0]['CNT']; $i++)
                            <div class="graph">
                                <p> {{ $resSet[0]['Answer'.$i] }} %</p>
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{$resSet[0]['Answer'.$i] }}%">
                                </div>
                                <p>{{ $questionSet[0]['Comment'.$i] }}</p>
                            </div>
                        @endfor
                    @else
                        <div class="graph">
                            <p> 0 %</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0 %">
                            </div>
                            <p>매우 쉬움</p>
                        </div>

                        <div class="graph">
                            <p>0 %</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                            </div>
                            <p>쉬움</p>
                        </div>

                        <div class="graph">
                            <p>0 %</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                            </div>
                            <p>보통</p>
                        </div>

                        <div class="graph">
                            <p>0 %</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0 %">
                            </div>
                            <p>어려움</p>
                        </div>

                        <div class="graph">
                            <p>0 %</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0 %">
                            </div>
                            <p>매우 어려움</p>
                        </div>
                    @endif
                </div>
                <!--graphbox//-->
            </div>
        </li>
        <li>
            <div>
                <h3>과목별 시험 난이도 : <span id="karea">@if(empty($resSet)===false) [{{ $titleSet[1] }}] @endif </span></h3>
                <select title="과목선택" onchange="fn_sel(this)" class="maxWidth135">
                    @if(empty($resSet)===false)
                        @for($i=1; $i < count($titleSet); $i++)
                            @if($typeSet[$i] == 'S') <option value="{{ $numberSet[$i] }}/{{ $titleSet[$i] }}">{{ $titleSet[$i] }}</option> @endif
                        @endfor
                    @endif
                </select>
                <div>
                    @if(empty($resSet)===false)
                        @for($i=1; $i < count($titleSet); $i++)
                            <div id="div{{ $i }}" class="graphbox" @if($i != 1) style="display:none;" @endif>
                                @for($j=1; $j <= $resSet[$i]['CNT']; $j++)
                                    @if($typeSet[$i] == 'S')
                                    <div class="graph graph2">
                                        <p>{{ $resSet[$i]['Answer'.$j] }}%</p>
                                        <div>
                                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[$i]['Answer'.$j] }}%">
                                        </div>
                                        <p>{{ $questionSet[$i]['Comment'.$j] }}</p>
                                    </div>
                                    @endif
                                @endfor

                            </div>
                        @endfor
                    @else
                        <div class="graphbox">
                            <div class="graph graph2">
                                <p>0 %</p>
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                </div>
                                <p>매우 쉬움</p>
                            </div>

                            <div class="graph graph2">
                                <p>0 %</p>
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                </div>
                                <p>쉬움</p>
                            </div>

                            <div class="graph graph2">
                                <p>0 %</p>
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                </div>
                                <p>보통</p>
                            </div>

                            <div class="graph graph2">
                                <p>0 %</p>
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                </div>
                                <p>어려움</p>
                            </div>

                            <div class="graph graph2">
                                <p>0 %</p>
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                </div>
                                <p>매우 어려움</p>
                            </div>
                        </div>
                    @endif
                    <!--graphbox//-->
                </div>
            </div>
        </li>
    </ul>
</div>
<script>
    //과목 선택
    function fn_sel(obj){
        var seltxt = obj.value;
        var arrTxt = seltxt.split('/');
        for(var i=1; i <= 25; i++){
            $('#div'+i).hide();
        }
        $('#div'+arrTxt[0]).show();
        $('#karea').html('['+arrTxt[1]+']');
    }
</script>
@stop
