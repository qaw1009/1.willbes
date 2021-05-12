@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;position:relative;}

        /************************************************************/

        .sky {position:fixed;top:200px;right:0;z-index:1;}

        .evtTop00 {background:#404040}
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

        .wb_cts_top {background:#C4C6C1 url(https://static.willbes.net/public/images/promotion/2020/09/1795_top_bg.jpg) no-repeat center;}
        .wb_cts03 {background:#3F4FD6;}
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

        <ul class="sky">
            <li>
                <a href="http://www.historyexam.go.kr/main/mainPage.do;jsessionid=Yke5FQKGonT87QLod2f-VDWL.historyexam51" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_sky01.png" alt="한능검 접수">
                </a>
            </li>
            <li style="margin-top:10px;">
                <a href="#event1">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_sky02.png" alt="100프로 환급">
                </a>
            </li>
            <li style="margin-top:10px;">
                <a href="#event2">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_sky03.png" alt="소문내면 치킨">
                </a>
            </li>
        </ul>
         <!-- 타이머 -->
         <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>49회 한능검<br>환급 이벤트</span></td>
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

        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>       

        <div class="evtCtnsBox wb_cts_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_top.jpg"  alt="한능검 패스" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_01.jpg"  alt="특별한 이유" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_02.jpg"  alt="오태진 한능검 유툽" usemap="#Map1795_home" border="0" />
            <map name="Map1795_home" id="Map1795_home">
                <area shape="rect" coords="195,748,279,777" href="https://police.willbes.net/professor/show/cate/3001/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank" />
            </map>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/JlEBws-9a2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" id="event1">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_03.jpg"  alt="신청하기" usemap="#Map1795_apply" border="0" />
            <map name="Map1795_apply" id="Map1795_apply">
                <area shape="rect" coords="197,1066,441,1151" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171829" target="_blank" />
                <area shape="rect" coords="675,1067,916,1152" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_04.jpg"  alt="100프로 환급" usemap="#Map1795_notice" border="0" />
            <map name="Map1795_notice" id="Map1795_notice">
                <area shape="rect" coords="419,820,702,865" href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=292855&" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts05" id="event2">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_05.jpg"  alt="매일 1권씩 추첨" />
            {{--댓글url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif  
        </div>

        <div class="evtCtnsBox wb_cts06">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1795_06.jpg"  alt="한능검 패스 이미지 다운받기" usemap="#Map1795_image" border="0" />
            <map name="Map1795_image" id="Map1795_image">
                <area shape="rect" coords="368,878,747,924" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="한능검 패스 이미지" />
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif   

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
                    <li>교재 : 오태진 한국사능력검정시험(한능검) 100점 노트[심화편1,2,3급]</li><br>
                    <li>강의명 : 2020 오태진 한국사 요약강의[13강] 30일</li>
                    <li>교재 : 오태진 한국사 능력 검정 심기일전</li>
                </ul>   
                <div class="infoTit NG"><strong>[이벤트 혜택]</strong></div>
				<ul>
					<li>강의명 : 2020 오태진 한국사 기본개념완성[49강] 90일</li>
                    <li>-> 한능검1급 취득시 환급 (2.3급 해당사항 없슴)</li><br>
                    <li>강의명 : 2020 오태진 한국사 요약강의[13강] 30일</li>
                    <li>-> 3급이상 취득시 환급</li>
                </ul>    
				<ul>
					<li><strong>* 온라인강의 결제완료  + 한능검 합격</strong></li>
					<li><strong>* 2가지 모두 충족지 환급진행</strong></li>
                    <li><strong>* 한능검49회 시험 최종합격 회원에 한함</strong></li>
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