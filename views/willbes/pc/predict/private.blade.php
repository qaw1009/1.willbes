@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
<link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
<script src="/public/vendor/jqbars/jqbar.js"></script>
<link rel="stylesheet" href="/public/vendor/jqbars/jqbar.css">
<style rel="stylesheet">
    /*body {*/
        /*margin: 0;*/
        /*overflow: hidden;*/
        /*background: #152B39;*/
        /*font-family: Courier, monospace;*/
        /*font-size: 14px;*/
        /*color:#ccc;*/
    /*}*/

    .wrapper {
        display: block;
        margin: 5em auto;
        border: 2px solid #555;
        width: 900px;
        height: 350px;
        position: relative;
    }
    p{text-align:center;}
    .label {
        height: 1em;
        padding: .3em;
        background: rgba(255, 255, 255, .8);
        position: absolute;
        display: none;
        color:#333;

    }
</style>
<div class="evtCtnsBox">
    <div class="sub_warp">
        @if($dataIs == 'Y')
        <div class="sub3_1">
            <h2>지원자 정보</h2>
            <div>
                <table class="boardTypeB">
                    <col width="" />
                    <col width="" />
                    <col width="" />
                    <col width="" />
                    <col width="" />
                    <col width="" />
                    <tr>
                        <th scope="col">성명(아이디)</th>
                        <th scope="col">직렬(직류)구분</th>
                        <th scope="col">응시번호</th>
                        <th scope="col">응시과목</th>
                        <th scope="col">가산점 여부</th>
                    </tr>
                    <tr>
                        <td>{{ $_SESSION['mem_name'] }}({{ $_SESSION['mem_id'] }})</td>
                        <td>{{ $data[0]['serial'] }} ({{ $data[0]['areanm'] }})</td>
                        <td>{{ $data[0]['TakeNumber'] }}</td>
                        <td>{{ $subjectStr }}</td>
                        <td>{{ $data[0]['AddPoint'] }}점</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="sub3_1">
            <h2>직렬 점수 통계</h2>
            <div>
                <table class="boardTypeB">
                    <col width=""/>
                    <tr>
                        <th>과목</th>
                        <th>원점수</th>
                        <th>조정점수</th>
                        <th>내 석차(%)</th>
                        <th>전체 평균</th>
                        <th>상위 5% 평균</th>
                    </tr>
                    @foreach($scoreList as $key => $val)
                    <tr>
                        <th>{{ $val['subject'] }}</th>
                        <td>{{ $val['score'] }}</td>
                        <td>{{ $val['addscore'] }}</td>
                        <td>{{ $val['Rank'] != '집계중'?$val['Rank']."%" : '집계중'}}</td>
                        <td>{{ $val['AvrPoint'] }}</td>
                        <td>{{ $val['FivePerPoint'] }}</td>
                    </tr>
                    @endforeach
                    @if(empty($scoreList) == true)
                        <tr>
                            <td colspan="5"> - 입력된 점수가 없습니다.(성적채점 및 확인에서 점수를 입력해주세요) -</td>
                        </tr>
                    @endif
                </table>
                <div class="mt10">
                    * 채점결과에 따른 과목별, 총점과 응시 직렬/지역의 석차, 평균 정보입니다.<br>
                    (원점수 및 조정점수 40점 미만은 과락, 참여자 표본이 작은 경우 일부 패널 분석 데이터 합산 추정치 반영)
                </div>
            </div>
        </div>

        <div class="sub3_4_wrap">
            <div class="sub3_4_L">
                <p>나의 위치</p>
                <div class="sub3_4_L_warp">
                    <div class="cutLine">
                        <div>
                            <span style="bottom:{{ $mysumPer }}%"><strong>{{ $mysum }}</strong></span>
                        </div>
                    </div>

                    <table class="boardTypeE">
                        <col width="10%" />
                        <col width="30%" />
                        <col width="30%" />
                        <col width="30%" />

                        <tr>
                            <td>
                                <ul>
                                    <li>500</li>
                                    <li>400</li>
                                    <li>300</li>
                                    <li>200</li>
                                    <li>100</li>
                                    <li>0</li>
                                </ul>
                            </td>

                            <td>
                                <div><span class="myscore" style="height:{{ $onePerPer }}%"></span></div>
                            </td>

                            <td>
                                <div>
                                    <span class="score" style="height:{{ $avgper }}%"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span class="score" style="height:{{ $fiveperPer }}%"></span>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <th></th>
                            <th>
                                1배수컷<br>
                                {{ $onePerSum }}
                            </th>
                            <th>전체평균<br>
                                {{ $avg }}
                            </th>
                            <th>상위5%<br>
                                {{ $fiveper }}
                            </th>
                            <th> </th>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="sub3_4_R">
                <p>합격가능성 분석결과</p>
                <div>
                    <table class="boardTypeB">
                        <col />
                        <col />
                        <tr>
                            <th>합격기대권</th>
                            <td>{{ $gradeLine['ExpectAvrPoint1']?$gradeLine['ExpectAvrPoint1']:$gradeLine['ExpectAvr1Ref'] }} ~ {{ $gradeLine['ExpectAvrPoint2']?$gradeLine['ExpectAvrPoint2']:$gradeLine['ExpectAvr2Ref'] }}</td>
                        </tr>
                        <tr>
                            <th>합격유력권</th>
                            <td>{{ $gradeLine['StrongAvrPoint1']?$gradeLine['StrongAvrPoint1']:$gradeLine['StrongAvr1Ref'] }} ~ {{ $gradeLine['StrongAvrPoint2']?$gradeLine['StrongAvrPoint2']:$gradeLine['StrongAvr2Ref'] }}</td>
                        </tr>
                        <tr>
                            <th>합격안정권</th>
                            <td>{{ $gradeLine['StabilityAvrPoint']?$gradeLine['StabilityAvrPoint']:$gradeLine['StabilityAvrRef'] }}</td>
                        </tr>
                        <tr class="bg01">
                            <th>1배수컷</th>
                            <th>{{ $onePerSum }}</th>
                        </tr>
                        <tr class="bg01">
                            <th>합격예측</th>
                            <th>{!! $str !!} </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="sub3_1 mt100">
            <h2>직렬 점수대별 경쟁자 분포</h2>
            <div>
                <div class="wrapper">
                    <canvas id='c'></canvas>
                    <div class="label">text</div>
                </div>
            </div>

            <div class="mt20">
                * 합격 가능성 분석 결과는 본 서비스 참여 결과 및 패널 표본 합산 예측 결과이므로, 실제 결과와는 다를 수 있으니 참고 자료로만 활용하시기 바랍니다.
            </div>
        </div>
    </div>
    @endif
</div>
<!--evtCtnsBox//-->
<script type="text/javascript">
    var dataIs = '{{ $dataIs }}';
    $(document).ready(function () {

        if(dataIs == 'N'){
            alert('기본정보/점수를 입력해주세요.');
            var _url = '{{ site_url('/promotion/index/cate/3001/code/1211') }}';
            parent.location.href=_url;
            return ;
        }
    });

    var label = document.querySelector(".label");
    var c = document.getElementById("c");
    var ctx = c.getContext("2d");
    var cw = c.width = 900;
    var ch = c.height = 350;
    var cx = cw / 2,
        cy = ch / 2;
    var rad = Math.PI / 180;
    var frames = 0;

    ctx.lineWidth = 1;
    ctx.strokeStyle = "#999";
    ctx.fillStyle = "#ccc";
    ctx.font = "14px monospace";

    var grd = ctx.createLinearGradient(0, 0, 0, cy);
    grd.addColorStop(0, "hsla(167,72%,60%,1)");
    grd.addColorStop(1, "hsla(167,72%,60%,0)");

    var oData = {
        {!! $arrPoint !!}
    };

    var valuesRy = [];
    var propsRy = [];
    for (var prop in oData) {

        valuesRy.push(oData[prop]);
        propsRy.push(prop);
    }


    var vData = 4;
    var hData = valuesRy.length;
    var offset = 50.5; //offset chart axis
    var chartHeight = ch - 2 * offset;
    var chartWidth = cw - 2 * offset;
    var t = 1 / 7; // curvature : 0 = no curvature
    var speed = 2; // for the animation

    var A = {
        x: offset,
        y: offset
    }
    var B = {
        x: offset,
        y: offset + chartHeight
    }
    var C = {
        x: offset + chartWidth,
        y: offset + chartHeight
    }

    /*
          A  ^
            |  |
            + 25
            |
            |
            |
            + 25
          |__|_________________________________  C
          B
    */

    // CHART AXIS -------------------------
    ctx.beginPath();
    ctx.moveTo(A.x, A.y);
    ctx.lineTo(B.x, B.y);
    ctx.lineTo(C.x, C.y);
    ctx.stroke();

    // vertical ( A - B )
    var aStep = (chartHeight - 50) / (vData);

    var Max = Math.ceil(arrayMax(valuesRy) / 10) * 10;
    var Min = Math.floor(arrayMin(valuesRy) / 10) * 10;
    var aStepValue = (Max - Min) / (vData);
    console.log("aStepValue: " + aStepValue); //8 units
    var verticalUnit = aStep / aStepValue;

    var a = [];
    ctx.textAlign = "right";
    ctx.textBaseline = "middle";
    for (var i = 0; i <= vData; i++) {

        if (i == 0) {
            a[i] = {
                x: A.x,
                y: A.y + 25,
                val: Max
            }
        } else {
            a[i] = {}
            a[i].x = a[i - 1].x;
            a[i].y = a[i - 1].y + aStep;
            a[i].val = a[i - 1].val - aStepValue;
        }
        drawCoords(a[i], 3, 0);
    }

    //horizontal ( B - C )
    var b = [];
    ctx.textAlign = "center";
    ctx.textBaseline = "hanging";
    var bStep = chartWidth / (hData + 1);

    for (var i = 0; i < hData; i++) {
        if (i == 0) {
            b[i] = {
                x: B.x + bStep,
                y: B.y,
                val: propsRy[0]
            };
        } else {
            b[i] = {}
            b[i].x = b[i - 1].x + bStep;
            b[i].y = b[i - 1].y;
            b[i].val = propsRy[i]
        }
        drawCoords(b[i], 0, 3)
    }

    function drawCoords(o, offX, offY) {
        ctx.beginPath();
        ctx.moveTo(o.x - offX, o.y - offY);
        ctx.lineTo(o.x + offX, o.y + offY);
        ctx.stroke();

        ctx.fillText(o.val, o.x - 2 * offX, o.y + 2 * offY);
    }
    //----------------------------------------------------------

    // DATA
    var oDots = [];
    var oFlat = [];
    var i = 0;

    for (var prop in oData) {
        oDots[i] = {}
        oFlat[i] = {}

        oDots[i].x = b[i].x;
        oFlat[i].x = b[i].x;

        oDots[i].y = b[i].y - oData[prop] * verticalUnit - 25;
        oFlat[i].y = b[i].y - 25;

        oDots[i].val = oData[b[i].val];

        i++
    }



    ///// Animation Chart ///////////////////////////
    //var speed = 3;
    function animateChart() {
        requestId = window.requestAnimationFrame(animateChart);
        frames += speed; //console.log(frames)
        ctx.clearRect(60, 0, cw, ch - 60);

        for (var i = 0; i < oFlat.length; i++) {
            if (oFlat[i].y > oDots[i].y) {
                oFlat[i].y -= speed;
            }
        }
        drawCurve(oFlat);
        for (var i = 0; i < oFlat.length; i++) {
            ctx.fillText(oDots[i].val, oFlat[i].x, oFlat[i].y - 25);
            ctx.beginPath();
            ctx.arc(oFlat[i].x, oFlat[i].y, 3, 0, 2 * Math.PI);
            ctx.fill();
        }

        if (frames >= Max * verticalUnit) {
            window.cancelAnimationFrame(requestId);

        }
    }
    requestId = window.requestAnimationFrame(animateChart);

    /////// EVENTS //////////////////////
    c.addEventListener("mousemove", function(e) {
        label.innerHTML = "";
        label.style.display = "none";
        this.style.cursor = "default";

        var m = oMousePos(this, e);
        for (var i = 0; i < oDots.length; i++) {

            output(m, i);
        }

    }, false);

    function output(m, i) {
        ctx.beginPath();
        ctx.arc(oDots[i].x, oDots[i].y, 20, 0, 2 * Math.PI);
        if (ctx.isPointInPath(m.x, m.y)) {
            //console.log(i);
            label.style.display = "block";
            label.style.top = (m.y + 10) + "px";
            label.style.left = (m.x + 10) + "px";
            label.innerHTML = "<strong>" + propsRy[i] + "</strong> 점 - " + valuesRy[i] + "명";
            c.style.cursor = "pointer";
        }
    }

    // CURVATURE
    function controlPoints(p) {
        // given the points array p calculate the control points
        var pc = [];
        for (var i = 1; i < p.length - 1; i++) {
            var dx = p[i - 1].x - p[i + 1].x; // difference x
            var dy = p[i - 1].y - p[i + 1].y; // difference y
            // the first control point
            var x1 = p[i].x - dx * t;
            var y1 = p[i].y - dy * t;
            var o1 = {
                x: x1,
                y: y1
            };

            // the second control point
            var x2 = p[i].x + dx * t;
            var y2 = p[i].y + dy * t;
            var o2 = {
                x: x2,
                y: y2
            };

            // building the control points array
            pc[i] = [];
            pc[i].push(o1);
            pc[i].push(o2);
        }
        return pc;
    }

    function drawCurve(p) {

        var pc = controlPoints(p); // the control points array

        ctx.beginPath();
        //ctx.moveTo(p[0].x, B.y- 25);
        ctx.lineTo(p[0].x, p[0].y);
        // the first & the last curve are quadratic Bezier
        // because I'm using push(), pc[i][1] comes before pc[i][0]
        ctx.quadraticCurveTo(pc[1][1].x, pc[1][1].y, p[1].x, p[1].y);

        if (p.length > 2) {
            // central curves are cubic Bezier
            for (var i = 1; i < p.length - 2; i++) {
                ctx.bezierCurveTo(pc[i][0].x, pc[i][0].y, pc[i + 1][1].x, pc[i + 1][1].y, p[i + 1].x, p[i + 1].y);
            }
            // the first & the last curve are quadratic Bezier
            var n = p.length - 1;
            ctx.quadraticCurveTo(pc[n - 1][0].x, pc[n - 1][0].y, p[n].x, p[n].y);
        }

        //ctx.lineTo(p[p.length-1].x, B.y- 25);
        ctx.stroke();
        ctx.save();
        ctx.fillStyle = grd;
        ctx.fill();
        ctx.restore();
    }

    function arrayMax(array) {
        return Math.max.apply(Math, array);
    };

    function arrayMin(array) {
        return Math.min.apply(Math, array);
    };

    function oMousePos(canvas, evt) {
        var ClientRect = canvas.getBoundingClientRect();
        return { //objeto
            x: Math.round(evt.clientX - ClientRect.left),
            y: Math.round(evt.clientY - ClientRect.top)
        }
    }
</script>
@stop