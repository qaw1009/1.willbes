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
</style>
<div class="Cts03">
    <ul class="graphWrap">
        <li>
            <h3>전체 시험 난이도 </h3>
            <div>
                <div class="graphbox">
                    <div class="graph">
                        <p>{{ $resSet[0]['Answer1'] }}%</p>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[0]['Answer1'] }}%">
                        </div>
                        <p>매우 쉬움</p>
                    </div>

                    <div class="graph">
                        <p>{{ $resSet[0]['Answer2'] }}%</p>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[0]['Answer2'] }}%">
                        </div>
                        <p>쉬움</p>
                    </div>

                    <div class="graph">
                        <p>{{ $resSet[0]['Answer3'] }}%</p>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[0]['Answer3'] }}%">
                        </div>
                        <p>보통</p>
                    </div>

                    <div class="graph">
                        <p>{{ $resSet[0]['Answer4'] }}%</p>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[0]['Answer4'] }}%">
                        </div>
                        <p>어려움</p>
                    </div>

                    <div class="graph">
                        <p>{{ $resSet[0]['Answer5'] }}%</p>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[0]['Answer5'] }}%">
                        </div>
                        <p>매우 어려움</p>
                    </div>
                </div>
                <!--graphbox//-->
            </div>
        </li>
        <li>
            <div>
                <h3>과목별 시험 난이도 : <span id="karea">[{{ $titleSet[1] }}]</span></h3>
                <select title="과목선택" onchange="fn_sel(this)">
                    @for($i=1; $i < count($titleSet); $i++)
                    <option value="{{ $numberSet[$i] }}/{{ $titleSet[$i] }}">{{ $titleSet[$i] }}</option>
                    @endfor
                </select>
                <div>
                    @for($i=1; $i < count($titleSet); $i++)
                    <div id="div{{ $i }}" class="graphbox" @if($i != 1) style="display:none;" @endif>
                        <div class="graph graph2">
                            <p>{{ $resSet[$i]['Answer1'] }}%</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[$i]['Answer1'] }}%">
                            </div>
                            <p>매우 쉬움</p>
                        </div>

                        <div class="graph graph2">
                            <p>{{ $resSet[$i]['Answer2'] }}%</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[$i]['Answer2'] }}%">
                            </div>
                            <p>쉬움</p>
                        </div>

                        <div class="graph graph2">
                            <p>{{ $resSet[$i]['Answer3'] }}%</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[$i]['Answer3'] }}%">
                            </div>
                            <p>보통</p>
                        </div>

                        <div class="graph graph2">
                            <p>{{ $resSet[$i]['Answer4'] }}%</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[$i]['Answer4'] }}%">
                            </div>
                            <p>어려움</p>
                        </div>

                        <div class="graph graph2">
                            <p>{{ $resSet[$i]['Answer5'] }}%</p>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $resSet[$i]['Answer5'] }}%">
                            </div>
                            <p>매우 어려움</p>
                        </div>
                    </div>
                    @endfor
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

        for(var i=1; i <= 10; i++){
            $('#div'+i).hide();
        }

        $('#div'+arrTxt[0]).show();
        $('#karea').html('['+arrTxt[1]+']');

    }
</script>
@stop
