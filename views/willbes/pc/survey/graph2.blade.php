@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<style type="text/css">
    .subContainer {
        min-height:auto !important;
        margin-bottom:0 !important;
    }
    .evtContent {
        position:relative;
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

    /*****************************************************************/

    .evtTop {
        background:url(https://static.willbes.net/public/images/promotion/2019/03/1140_top_bg.jpg) no-repeat center top
    }

    .evtMenu {width:100%; background:#36374d; border-bottom:5px solid #e2be43}
    .evtMenu ul {width:1120px; margin:0 auto; border-left:1px solid #686063}
    .evtMenu li {display:inline; float:left; width:25%}
    .evtMenu li a {
        display:block; text-align:center; padding:30px 0; color:#868791; font-size:150%; font-weight:900;
        background:#36374d; border-right:1px solid #686063;
    }
    .evtMenu li a span {padding:3px 10px; border-radius:15px; background:#868791; color:#36374d; font-weight:normal; font-size:70%}
    .evtMenu li a div {margin-top:8px}
    .evtMenu li:hover a,
    .evtMenu li a.active {background:#e2be43; color:#fff}
    .evtMenu li:hover a span,
    .evtMenu li a.active span {background:#fff; color:#e2be43}
    .evtMenu ul:after {content:""; display:block; clear:both}

    .tabCts {
        position:relative; width:1120px; margin:0 auto; text-align:center;
    }
    .tabCts .download span {position:absolute; top:660px; display:block; width:72px; height:24px; line-height:24px; text-align:center; z-index:1}
    .tabCts .download span:nth-child(1) {left:160px;}
    .tabCts .download span:nth-child(2) {left:362px;}
    .tabCts .download span:nth-child(3) {left:572px;}
    .tabCts .download span:nth-child(4) {left:760px;}
    .tabCts .download span:nth-child(5) {left:940px;}
    .tabCts .download span a {display:block; color:#fff; background:#d18f04; border-radius:14px;}
    .tabCts .download span a:hover {background:#e50001}
    .tabCts .youtube {width:100%; text-align:center; margin:3em 0}
    .tabCts .youtube iframe {width:800px; height:453px; margin:0 auto}

    .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#363636; font-size:90%; margin-left:20px}
    .Cts02 a:hover {background:#e50001}

    .boardD {width:900px; border-spacing:0px; border:1px solid #dedede; table-layout:auto; color:#666; margin:0 auto}
    .boardD caption {display:none}
    .boardD th {padding:10px 5px; background:#f5f5f5; border-right:1px solid #dedede; border-bottom:1px solid #dedede; color:#333}
    .boardD thead th {background:#eee; color:#333}
    .boardD td {padding:10px 5px; margin:0; border:none; text-align:center; border-right:1px solid #dedede; border-bottom:1px solid #dedede}
    .boardD td:nth-child(4) {color:#000}
    .boardD td:last-child {color:#C00}
    .boardD tr.gray th,
    .boardD tr.gray td {background:#eee}

    .Cts03 {margin-bottom:100px; text-align:left; width:100%; height:400px;}

    .Cts03 h3 {font-size:16px;}
    .Cts03 h3 span {color:#fa7738}
    .Cts03 .graphWrap {width:100%}
    .Cts03 .graphWrap {
        margin-top:50px; font-size:14px; line-height:1.5;
    }
    .Cts03 .graphWrap li {
        display:inline; float:left; width:48%; text-align:left; margin:0 0.5%; position:relative;
    }
    .Cts03 .graphWrap select {position:absolute; top:5px; right:0}
    .Cts03 .graphWrap:after {content:""; display:block; clear:both}

    .Cts03 .graphbox {width:90%; margin:20px auto; border:1px solid #000;}
    .Cts03 .graphbox .subTit {font-size:120%; color:#F30}
    .Cts03 .graph {width:20%; float:left; text-align:center; background:url(http://file.willbes.net/new_image/2015/04/graphBg.png) repeat;}
    .Cts03 .graph p {padding:10px 0; background:#fff}
    .Cts03 .graph p:last-child {border-top:1px solid #333}
    .Cts03 .graph div {position:relative; width:45px; height:250px; margin:0 auto; }
    .Cts03 .graph div img {position:absolute; bottom:0; left:0; width:100%; background:#e2be43 url(https://static.willbes.net/public/images/promotion/common/graphA.png) repeat;}
    .Cts03 .graph2 div img {background:#bdbdcc url(https://static.willbes.net/public/images/promotion/common/graphA.png) repeat;}
    .Cts03 .graphbox:after {content:""; display:block; clear:both}
    .Cts03 .graphWrap:after {content:""; display:block; clear:both}

    .Cts03_01 {width:1120px; text-align:left; margin:80px auto 0}
    .Cts03_01 div {border:1px solid #e4e4e4; padding:20px; margin-top:20px}

    .Cts04 {padding-bottom:100px}
    .Cts04 .lecture {
        width:1000px; margin:0 auto;
    }
    .Cts04 .lecture li {
        display:inline; float:left; width:25%; text-align:center; margin-bottom:20px;
    }
    .Cts04 .lecture li img.prof {
        width:200px !important; border:1px solid #ccc;
    }
    .Cts04 .t_tilte {
        line-height:1.5; padding:10px 0; color:#666; width:200px; margin:0 auto
    }
    .Cts04 .t_tilte p {border-top:1px solid #e4e4e4; padding-top:10px; margin-top:10px}
    .Cts04 .t_tilte span {
        color:#36374d; font-size:14px; ;
    }

    .Cts04 .lecture ul:after {
        content:""; display:block; clear:both;
    }
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
