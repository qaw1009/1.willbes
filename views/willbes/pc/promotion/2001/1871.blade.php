@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/

        .sky {position:fixed; width:160px; top:200px;right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}
        /*타이머*/
        .time {width:100%; text-align:center; background:#F5F5F5;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#000; font-size:28px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}

        .wb_cts_top {background:url(https://static.willbes.net/public/images/promotion/2020/10/1871_top_bg.jpg) no-repeat center;}
        .wb_cts03 {background:#677c69;}
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background:#fff;}
        .wb_cts06 {background:#fff;}   

        .youtube {position:absolute; top:594px; left:50%; width:607px; z-index:1;margin-left:-148px}
        .youtube iframe {width:607px; height:342px}

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:17px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="http://www.historyexam.go.kr/main/mainPage.do;jsessionid=Yke5FQKGonT87QLod2f-VDWL.historyexam51" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_sky01.png" alt="한능검 접수">
            </a>            
            <a href="#event1">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_sky02.png" alt="100프로 환급">
            </a>
            <a href="#event2">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_sky04.png" alt="100프로 환급">
            </a>
        </div>

        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>{{$arr_promotion_params['turn']}}회 한능검<br>환급 이벤트</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="evtCtnsBox wb_cts_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_top.jpg"  alt="한능검 패스" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_01.jpg"  alt="특별한 이유" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_02.jpg"  alt="오태진 한능검 유툽" usemap="#Map1871_home" border="0" />
            <map name="Map1871_home">
                <area shape="rect" coords="195,748,279,777" href="https://police.willbes.net/professor/show/cate/3001/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank" />
            </map>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/JlEBws-9a2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_03.jpg"  alt="신청하기" usemap="#Map1871_apply" border="0" />
            <map name="Map1871_apply">
                <area shape="rect" coords="197,1059,441,1144" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171829" target="_blank" alt="한능검1급대비" />
                <area shape="rect" coords="674,1058,915,1143" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" alt="경찰검정제3급대비" />
                <area shape="rect" coords="833,1238,1034,1333" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/173905" target="_blank" alt="한능검 합격대비">
            </map>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_04_01.jpg" alt="100프로 환급" usemap="#Map1871_notice" border="0"  id="event1"/><br>
            <map name="Map1871_notice">
                <area shape="rect" coords="412,765,713,820" href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=292855&" target="_blank" alt="환급공지사항" />
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1871_04_02.jpg" alt="실전모의고사 1회분" usemap="#Map1871_04" border="0" id="event2"/>
            <map name="Map1871_04">
                <area shape="rect" coords="383,678,722,751" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/173906" target="_blank" alt="실전모의고사1회분" />
            </map>
        </div>

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">이용안내</h4>
				<div class="infoTit NG"><strong>[상품안내]</strong></div>
				<ul>
					<li>한국사  전문 교수 : 오태진 교수님</li>
                </ul>  
                <div class="infoTit NG"><strong>[온라인 강의]</strong></div>
				<ul>
					<li>강의명 : 2020 오태진 한국사 기본개념완성[49강] 90일</li>
                    <li>교재 : 오태진 한국사능력검정시험(한능검) 100점 노트[심화편1,2,3급]<br><br></li>
                    <li>강의명 : 2020 오태진 한국사 요약강의[13강] 30일</li>
                    <li>교재 : 오태진 한국사 능력 검정 심기일전</li>
                </ul>   
                <div class="infoTit NG"><strong>[이벤트 혜택]</strong></div>
				<ul>
					<li>강의명 : 2020 오태진 한국사 기본개념완성[49강] 90일</li>
                    <li>-> 한능검1급 취득시 환급 (2.3급 해당사항 없슴)<br><br></li>
                    <li>강의명 : 2020 오태진 한국사 요약강의[13강] 30일</li>
                    <li>-> 3급이상 취득시 환급</li>
                </ul>    
				<ul>
					<li><strong>* 온라인강의 결제완료  + 한능검 합격</strong></li>
					<li><strong>* 2가지 모두 충족지 환급진행</strong></li>
                    <li><strong>* 한능검 50회 시험 최종합격 회원에 한함</strong></li>
				</ul>
                <div class="infoTit NG"><strong>[유의사항]</strong></div>
				<ul>
					<li>환급 대상 : 2020 한능검 1급 합격자  /  2020 한능검 3급 합격자</li>
                    <li>환급 기준 : 구매후 유료 수강기간인 40일이내 한능검합격발표후 1개월 이내 인증 서류 제출</li>
                    <li>환급 금액 : 결제금액에서  제세공과금 22% 공제한 금액 환급</li>
                    <li>신청메일 : willbescop@willbes.com</li>
                    <li>신청 방법 : 수험표 사본, 49회합격증명 서류, 신분증 사본, 통장 사본, 개인정보동의서, 합격수기<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;아이디 소유 본인 명의로 이메일 제출 (공지사항 참조)
                    </li>
                </ul>  
                <ul>
					<li><strong>※ 회사 사정으로 조기 마감될수 있습니다.</strong></li>
				</ul>
			</div>
		</div>

    </div>
    <!-- End Container -->

    <script language="javascript">

       /*디데이카운트다운*/
       $(document).ready(function() {
           dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop