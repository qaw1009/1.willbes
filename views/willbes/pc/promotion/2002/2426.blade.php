@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/            

        .sky {position:fixed;top:200px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:15px}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2426_top_bg.jpg) repeat-y center top;} 

        .evt01 {background:#00030C;} 

        .evt02 {background:#F8F8F8;}

        .evt03 {background:#ddd;}

        .evt04 {background:#F1F1F1;}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;margin-top:50px;}
        .tabContaier ul{width:964px;margin:0 auto;height:80px;border-bottom:5px solid #000;} 
        .tabContaier li{display:inline-block;width:400px;height:75px;line-height:75px;background:#ebebeb;color:#7f7f7f;float:left;font-size:25px;font-weight:bold;}
        .tabContaier li:first-child {margin-right:20px;margin-left:75px;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#000;font-size:40px;background:#fff;border:5px solid #000;border-bottom:none;}

        .evt05 {background:#fff;padding-bottom:50px;}
        .evt05_table {width:1000px; margin:0 auto; padding:50px; background:#fff;}        
        .evt05_table .title {font-size:30px; color:#1f2327; text-align:left; margin-bottom:30px;margin-top:45px;}
        .evt05_table .title  span {color:#FEE15F; border-bottom:3px solid #9e96c2}
        .evt05_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .evt05_table tr.st01 {background:#e3e4e5}
        .evt05_table tr:hover {background:#f4f2fe;}
        .evt05_table th,
        .evt05_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt05_table th {background:#FEE15F; color:#000 ;border-right:1px solid #000;font-weight:bold;}
        .evt05_table th:last-child{border:0;}
        .evt05_table td:nth-child(1) {text-align:center;border-right:1px solid #000;font-weight:bold;}
        .evt05_table td:nth-child(2) {border-right:1px solid #000;font-weight:bold;}
        .evt05_table td:nth-child(3) {border-right:1px solid #000;font-weight:bold;}
        .evt05_table td:last-child {border:0}
        .evt05_table td p {font-size:12px}
        .evt05_table a {padding:10px 14px; color:#000; background:#FEE15F; font-size:14px; display:block; border-radius:20px;}    
        .evt05_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .evt05_table{background:#fff;}      

        .evt06 {background:#7d7d7d;}
        .evt06 div {width:1120px; margin:0 auto; position:relative}
        .evt06 div ul {position:absolute; width:88px; top:375px; left:527px; z-index:10}
        .evt06 div li {margin-bottom:20px}
        .evt06 div li:nth-child(3) {margin-bottom:20px}
        .evt06 div li:nth-child(4) {margin-bottom:20px}
        .evt06 div li:nth-child(5) {margin-bottom:22px}
        .evt06 div li:nth-child(6) {margin-bottom:22px}
        .evt06 div li a {display:block; height:21px; line-height:21px; font-size:13px; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family:'Noto Sans KR', Arial, Sans-serif}
        .evt06 div li a:hover {background:#ffda38; color:#231f20}
        .evt06 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .evt06 div span em {font-size:11px}
        .evt06 div span.on {background:#ffda38; color:#231f20}
        .evt06 div span.area01 {top:438px; left:809px} /*본원*/
        .evt06 div span.area02 {top:522px; left:764px} /*광주*/
        .evt06 div span.area03 {top:490px; left:725px} /*인천*/        
        .evt06 div span.area04 {top:727px; left:764px} /*광주*/
        .evt06 div span.area05 {top:667px; left:795px} /*전주,익산*/ 
        .evt06 div span.area06 {top:675px; left:905px} /*대구*/
        .evt06 div span.area07 {top:737px; left:944px} /*부산*/
        .evt06 div span.area08 {top:750px; left:856px} /*진주*/
        .evt06 div span.area09 {top:859px; left:754px} /*제주*/

        .evtInfo {padding:100px 0; background:#222; color:#fff; font-size:17px}
		.evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:35px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .clicks{display:none;margin:0 auto;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_sky01.png" alt="사전접수 할인이벤트" >
            </a>
            <a href="#evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_sky02.png" alt="문제풀이 단원별 패키지" >
            </a>
            <a href="https://police.willbes.net/pass/offinfo/boardInfo/show/78?board_idx=369816&" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_sky03.png" alt="3개월 필합패스" >
            </a>
        </div>    

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        문제풀이 종합반<br>사전접수 이벤트
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>                   
        
        <div class="evtCtnsBox evtTop00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_top.gif" title="문제풀이 풀패키지">                    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_01.jpg" title="문제풀이 과정">           
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_02.jpg" title="단계별">           
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_03.jpg" title="신청하기">
                <a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" title="1단계" style="position: absolute;left: 32.55%;top: 35.29%;width: 35.3%;height: 2.61%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" title="2단계" style="position: absolute;left: 32.55%;top: 62.69%;width: 35.3%;height: 2.61%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank" title="3단계" style="position: absolute;left: 32.55%;top: 90.09%;width: 35.3%;height: 2.61%;z-index: 2;"></a>
            </div>
        </div>       

        <div class="evtCtnsBox evt04" id="evt_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_04.jpg" title="풀패키지 신청하기">
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" title="패키지 신청하기" style="position: absolute;left: 28.75%;top: 75.79%;width: 42.3%;height: 9.61%;z-index: 2;"></a>
            </div>        
        </div>

        <div class="evtCtnsBox evt05" id="evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_05.jpg" title="단계별 종합반">
            <div class="evt05_table">
                <div class="title NSK-Black">              
                    문제풀이 1단계
                </div>   
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="60%" />
                        <col width="25%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>수강료</th>                        
                                <th>학원수강</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022년 1차대비 1단계종합반(헌법 김원욱)</td>
                                <td><span style="text-decoration: line-through;">1,000,000원</span><br />
                                <span style="color:#f72739">550,000원</span></td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/187836" target="_blank">신청하기 ></a></td>
                            </tr>
                            <tr>
                                <td>2022년 1차대비 1단계종합반(헌법 이국령)</td>
                                <td><span style="text-decoration: line-through;">1,000,000원</span><br />
                                <span style="color:#f72739">550,000원</span></td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/187837" target="_blank">신청하기 ></a></td>
                            </tr>                                                                  
                        </tbody>
                    </table>        
                </div>
                <div class="title NSK-Black">              
                    문제풀이 2단계
                </div>   
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="60%" />
                        <col width="25%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>수강료</th>                        
                                <th>학원수강</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022년1차대비 2단계 동형모의고사 종합반 (헌법 김원욱)</td>
                                <td><span style="text-decoration: line-through;">1,000,000원</span><br />
                                <span style="color:#f72739">500,000원</span></td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/187831" target="_blank">신청하기 ></a></td>
                            </tr>
                            <tr>
                                <td>2022년1차대비 2단계 동형모의고사 종합반(헌법 이국령)</td>
                                <td><span style="text-decoration: line-through;">1,000,000원</span><br />
                                <span style="color:#f72739">500,000원</span></td>                    
                                <td><a href="https://police.willbes.net/pass/offPackage/show/prod-code/187834" target="_blank">신청하기 ></a></td>
                            </tr>                                                         
                        </tbody>
                    </table>        
                </div>
                <div class="title NSK-Black">              
                    문제풀이 3단계
                </div>   
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="60%" />
                        <col width="25%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>수강료</th>                        
                                <th>학원수강</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022년1차대비 3단계 파이널 모의고사 종합반 (헌법 김원욱/이국령 택1)</td>
                                <td><span style="text-decoration: line-through;">200,000원</span><br />
                                <span style="color:#f72739">90,000원</span></td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank">신청하기 ></a></td>
                            </tr>                                                          
                        </tbody>
                    </table>        
                </div>
                <div class="title NSK-Black">              
                    문제풀이 2+3단계
                </div>   
                <div> 
                    <table border="0" cellspacing="0" cellpadding="0">
                        <col width="60%" />
                        <col width="25%" />
                        <col width="15%" />
                        <thead>
                            <tr>
                                <th>강의명</th>
                                <th>수강료</th>                        
                                <th>학원수강</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022년 1차대비 2+3단계 종합반 (헌법 김원욱/이국령 택1)</td>
                                <td><span style="text-decoration: line-through;">1,200,000원</span><br />
                                <span style="color:#f72739">550,000원</span></td>                        
                                <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank">신청하기 ></a></td>
                            </tr>                                                          
                        </tbody>
                    </table>        
                </div>                                                        
            </div>             
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">          
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2426_06.jpg" title="1차대비 문제풀이강이 문의">
                <ul>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');">신청하기</a></li>
                    <li><a href="#none" alt="광주(참수리)" onmouseover="$('span.area02').addClass('on');" onmouseleave="$('span.area02').removeClass('on');">학원으로 문의</a></li>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605005&course_idx=1043" target="_blank" alt="인천" onmouseover="$('span.area03').addClass('on');" onmouseleave="$('span.area03').removeClass('on');">신청하기</a></li>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605006&course_idx=" target="_blank" alt="광주" onmouseover="$('span.area04').addClass('on');" onmouseleave="$('span.area04').removeClass('on');">신청하기</a></li>
                    <li><a href="https://blog.naver.com/als9946" target="_blank" alt="전주" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>                   
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605004&course_idx=" target="_blank" alt="대구" onmouseover="$('span.area06').addClass('on');" onmouseleave="$('span.area06').removeClass('on');">신청하기</a></li>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605003&course_idx=" target="_blank" alt="부산" onmouseover="$('span.area07').addClass('on');" onmouseleave="$('span.area07').removeClass('on');">신청하기</a></li>                   
                    <li><a href="https://police.willbes.net/pass/campus/show/code/605009" target="_blank" alt="제주" onmouseover="$('span.area09').addClass('on');" onmouseleave="$('span.area09').removeClass('on');">신청하기</a></li>
                </ul>
                <span class="area01">노량진</span>
                <span class="area02">광주(참수리)</span>
                <span class="area03">인천</span>
                <span class="area04">광주</span>
                <span class="area05">전북<em>(전주)</em></span>
                <span class="area06">대구</span>
                <span class="area07">부산</span>
                <span class="area09">제주</span>   
			</div>     
        </div>

        <div class="evtCtnsBox evtInfo NGR" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NGEB">문풀 풀패키지 학원 실강 이용안내</h4>
				<div class="infoTit NG"><strong>2022 문제풀이 풀패키지 경찰 전문 교수진</strong></div>
				<ul>
                    <li><br>
                        1. 형사법 – 신광은 교수님<br>
                        2. 경찰학 – 장정훈 교수님<br>
                        3. 헌법 – 김원욱 교수님 & 이국령 교수님(택 1)
                    </li>
                </ul>
                <div class="infoTit NG"><strong>문제풀이 유의사항</strong></div>
                <ul>
					<li>
                        ① 문제풀이 1단계<br/>
                        - 형사법,경찰학,헌법 : 오전 핵심요약 , 오후 진도별 모의고사  진행됩니다.<br/>
                        - 형사법 & 경찰학 10회 , 헌법 6회 진행됩니다.<br/>
                        - 형사법(1/3 개강) , 경찰학(1/5 개강) , 헌법(1/7 개강)
                    </li> 
                    <li>
                        ② 문제풀이 2단계<br/>                        
                        - 형사법(2/7 개강) , 경찰학(2/8 개강) , 헌법(2/11 개강)
                    </li>
                    <li>
                        ③ 문제풀이 3단계<br/>
                        - 파이널모의고사 진행됩니다.
                        - 일정은 추후공지 됩니다.
                    </li>
                    <li>
                        ④국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 <br/>
                        대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.
                    </li>  
                           
				</ul>
				<div class="infoTit NG"><strong>문제풀이 이벤트 유의사항</strong></div>
				<ul>
					<li>①사전접수 이벤트 <br/>                        
                        - 이벤트 기간 :  조기마감 유의!
                    </li>
                    <li>② 재등록 대상자 이벤트 <br/>                        
                        - 신광은 경찰학원 문제풀이 1+2+3단계 종합반 실강 수강이력이 있는 수험생
                    </li>
                    <li>③ 2021년 필합 대상자 <br/>                        
                        - 2021년 1차 또는 2차 필기합격 인증이 가능한 수험생
                    </li>
                    <li>④ 타학원 환승 이벤트 <br/>                        
                    - 환승 대상자 (아래 두 가지 모두 해당할 시 가능) <br/>
                    * 타 경찰학원 정규과정 실강 또는 인강 수강이력 증빙이 가능한 수강생 <br/>
                    * 2020년 1월 이후 신광은 경찰학원 정규과정 수강이력이 없는 수강생 <br/>
                    - 타학원 수강이력 증빙 필수
                    </li>                   
				</ul>                
				<div class="infoTit NG"><strong>학원 문의 : 1544-0336</strong></div>			
			</div>
		</div>
        
	</div>
   <!-- End Container -->

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

<script type="text/javascript">    
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
    });         

    $(document).ready(function(){
        $(".confirm").click(function(){
            $(".clicks").toggle();
        });
    });   

    /*탭(텍스터버전)*/
        $(document).ready(function(){
        $(".tabContents").hide();
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){
        var activeTab = $(this).attr("href");
        $(".tabContaier ul li a").removeClass("active");
        $(this).addClass("active");
        $(".tabContents").hide();
        $(activeTab).fadeIn();
        return false;
        });
    });
</script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop