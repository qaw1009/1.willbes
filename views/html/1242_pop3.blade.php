@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">   
    .willbes-Layer-PassBox span {vertical-align:auto}
    .eventPop {width:640px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;} 

    .eventPopS1 {margin-top:1em}
    .eventPopS1 ul > li {padding:15px 0}
    .eventPopS1 ul > li.w50 {display:inline; float:left; width:50%}
    .eventPopS1 strong {display:block; margin-bottom:10px; font-size:14px}
    .eventPopS1 p {margin-bottom:10px}
    .eventPopS1 p a {float:right; text-decoration:underline}
    .eventPopS1 ul > li > div {padding:20px; border:1px solid #e4e4e4; margin-bottom:10px}
    .eventPopS1 ul > li div strong {font-size:12px}
    .eventPopS1 li ul {margin-bottom:10px}
    .eventPopS1 li li {display:inline-block; border:0; margin-right:10px; padding:0}

    .viewTb {width:100%; border-top:1px solid #cdcdcd}
	.viewTb th,
	.viewTb td{padding:8px; border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd}
	.viewTb thead th,
	.viewTb tbody th {text-align:center; font-weight:bold; border-right:1px solid #cdcdcd; background:#f0f0f0}
    .viewTb th:last-child,
    .viewTb td:last-child {border-right:0}
	.viewTb tr.txtC td {text-align:center}
	.viewTb input[type=text],
	.viewTb input[type=password],
	.viewTb input[type=number] {width:70px}
	.viewTb td .route li {display:inline; float:left; width:50%}
    .viewTb td .route:after {content:""; display:block; clear:both}

    .pyramid {position:relative; width:450px; height:400px; overflow:hidden; margin:0 auto; padding:0}
	.pyramid .transparent {position:absolute; width:100%; z-index:2}
	.pyramid .chart {margin-top:36px; padding:0}
	.pyramid .chart li {display:block; width:400px; width:100%; margin:0 !important; padding:0 !important}
	.pyramid .chart li.bar01 {background-color :#6babf9}
	.pyramid .chart li.bar02 {background-color:#498de1}
	.pyramid .chart li.bar03 {background-color:#377acd}
	.pyramid .chart li.bar04 {background-color:#2a6ab9}
	.pyramid .chart li.bar05 {background-color:#14519d}
	.pyramid .chart li span {display:block; width:100%; height:64px;}
	.pyramid .chart li span.active {background-image:url(https://static.willbes.net/public/images/promotion/common/patternC.png)}
	.pyramid .myPosition {position:absolute; margin-top:36px; left:52%; padding:0; z-index:3; border:0}
	.pyramid .myPosition li {display:block; height:64px; margin:0 !important; padding:0 !important}
	.pyramid .myPosition li.active {background-color:rgba(255,255,255,0.8); padding:5px !important; border:1px solid #000;
	-webkit-box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.15);
	-moz-box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.15);
	box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.15);
	}
	.pyramid .myPosition li strong {color:#810eda; text-decoration:underline; display:inline}

    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff !important; font-weight:bold; border:1px solid #333}
    .btnsSt3 a:hover {background:#fff; color:#333 !important}

    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}    
    select,
    input[type=text] {padding:2px; margin-right:10px; height:26px; border:1px solid #e4e4e4}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
}

</style>
<div class="willbes-Layer-PassBox NGR">
    <form id="" name="" method="post" action="">
    <div class="eventPop">
        <h3>
            <span class="tx-bright-blue">나의 위치</span> 
        </h3>
        <div class="eventPopS1">
            <ul>
                <li>
                    <strong>* 기본정보</strong>
                    <table class="viewTb">
                        <col width="30%" />
                        <col width="" />
                        <tbody>
                        <tr>
                            <th>이름 </th>
                            <td>홍길동 </td>
                        </tr>
                        <tr>
                            <th>응시번호 </th>
                            <td>12345678</td>
                        </tr>
                        <tr>
                            <th>직렬/지역 구분 </th>
                            <td>일반공채:남 | 서울</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
                <li>
                    <strong>* <span class="tx-blue">일반공채:남 | 서울</span> 필기합격자 정보</strong>
                    <table class="viewTb">
                        <col width="30%" />
                        <col width="" />
                        <tbody>
                            <tr>
                                <th>전체 필기 합격자 </th>
                                <td>00 명 </td>
                            </tr>
                            <tr>
                                <th>서비스 이용자 </th>
                                <td>00 명</td>
                            </tr>
                        </tbody>
                    </table> 
                </li>
                <li>
                    <strong>* 나의 위치 파악</strong>
                    <div>
                        <p class="tx14 tx-center"><span class="tx-blue">홍길동</span> 님은 현재 총 입력자 <span class="tx-blue">000</span> 명 중 <span class="tx-blue">00</span>등입니다.</p>
                        <div class="pyramid">				
                            <div class="transparent"><img src="https://static.willbes.net/public/images/promotion/2019/05/1242_transparent.png"  alt="피라미드" /></div>
                            <ul class="myPosition">                                
                                <li class="active">
                                    <strong>홍길동</strong> 님의 현재 추정<br>
                                    백분위는 동일한 직렬 응시 입력자 중<br>
                                    <strong>상위 16%</strong> 입니다.
                                </li>                  
                            </ul>
                            <ul class="chart">
                                <li class="bar01"><span class="active"></span></li>
                                <li class="bar02"><span></span></li>
                                <li class="bar03"><span></span></li>
                                <li class="bar04"><span></span></li>
                                <li class="bar05"><span></span></li>
                            </ul>                            
                        </div>
                        <p class="tx14 tx-center">최종합격하는 그날까지 윌비스 신광은경찰이 함께하겠습니다.<br>
                        막판 역전을 위해 면접에도 최선을 다하시길 바랍니다.^^</p>
                    </div>
                </li>
                <li>
                    * 위 내용은 윌비스 최종합격예측서비스 입력자 분석결과를 바탕으로 하였으므로, 실제와 차이가 있을 수 있습니다.<br>
                    * 서비스 참여자가 많아 질수록, 내 위치는 변경될 수 있습니다.
                </li>
            </ul>
        </div>
        
        <div class="btnsSt3">
            <a href="javascript:close();">확인</a>
        </div>
    </div> 
    </form>
</div>
<!--willbes-Layer-PassBox//-->

@stop