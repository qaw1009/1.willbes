@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/        
        .sky {position:fixed;top:250px;right:25px;z-index:1;} 
        .sky a {display:block; margin-bottom:15px}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2164_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#f8f8f8;} 

        .evt02 {background:#ddd;position:relative;}

        .evt03 {background:#f1f1f1;position:relative;}

        .evt04 {background:#fff;padding-bottom:100px;}
        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;margin-top:50px;}
        .tabContaier ul{width:964px;margin:0 auto;height:80px;border-bottom:5px solid #000;} 
        .tabContaier li{display:inline-block;width:400px;height:75px;line-height:75px;background:#ebebeb;color:#7f7f7f;float:left;font-size:25px;font-weight:bold;}
        .tabContaier li:first-child {margin-right:20px;margin-left:75px;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#000;font-size:40px;background:#fff;border:5px solid #000;border-bottom:none;}

        .evt04_table {width:1000px; margin:0 auto; padding:50px; background:#fff;}        
        .evt04_table .title {font-size:30px; color:#1f2327; text-align:left; margin-bottom:30px;margin-top:45px;}
        .evt04_table .title  span {color:#FEE15F; border-bottom:3px solid #9e96c2}
        .evt04_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .evt04_table tr.st01 {background:#e3e4e5}
        .evt04_table tr:hover {background:#f4f2fe;}
        .evt04_table th,
        .evt04_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt04_table th {background:#FEE15F; color:#000 ;border-right:1px solid #000;font-weight:bold;}
        .evt04_table th:last-child{border:0;}
        .evt04_table td:nth-child(1) {text-align:center;border-right:1px solid #000;font-weight:bold;}
        .evt04_table td:nth-child(2) {border-right:1px solid #000;font-weight:bold;}
        .evt04_table td:nth-child(3) {border-right:1px solid #000;font-weight:bold;}
        .evt04_table td:last-child {border:0}
        .evt04_table td p {font-size:12px}
        .evt04_table a {padding:10px 14px; color:#000; background:#FEE15F; font-size:14px; display:block; border-radius:20px;}    
        .evt04_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .evt04_table{background:#fff;}      

        .evt05 {background:#7d7d7d;}
        .evt05 div {width:1120px; margin:0 auto; position:relative}
        .evt05 div ul {position:absolute; width:88px; top:375px; left:527px; z-index:10}
        .evt05 div li {margin-bottom:20px}
        .evt05 div li:nth-child(3) {margin-bottom:20px}
        .evt05 div li:nth-child(4) {margin-bottom:20px}
        .evt05 div li:nth-child(5) {margin-bottom:22px}
        .evt05 div li:nth-child(6) {margin-bottom:22px}
        .evt05 div li a {display:block; height:21px; line-height:21px; font-size:13px; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family:'Noto Sans KR', Arial, Sans-serif}
        .evt05 div li a:hover {background:#ffda38; color:#231f20}
        .evt05 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .evt05 div span em {font-size:11px}
        .evt05 div span.on {background:#ffda38; color:#231f20}
        .evt05 div span.area01 {top:438px; left:809px} /*본원*/
        .evt05 div span.area02 {top:522px; left:764px} /*광주*/
        .evt05 div span.area03 {top:490px; left:725px} /*인천*/        
        .evt05 div span.area04 {top:727px; left:764px} /*광주*/
        .evt05 div span.area05 {top:667px; left:795px} /*전주,익산*/ 
        .evt05 div span.area06 {top:675px; left:905px} /*대구*/
        .evt05 div span.area07 {top:737px; left:944px} /*부산*/
        .evt05 div span.area08 {top:750px; left:856px} /*진주*/
        .evt05 div span.area09 {top:859px; left:754px} /*제주*/

        .evtInfo {padding:100px 0; background:#555; color:#fff; font-size:17px}
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

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="sky">
            <a href="#apply1">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_sky1.png" alt="사전접수 할인 이벤트" >
            </a>
            <a href="#apply2">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_sky2.png" alt="문제풀이 단원별 패키지" >
            </a>
            <a href="javascript:alert('Coming Soon!')">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_sky3.png" alt="5개월 필합 패스" >
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
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_top.jpg" title="문제풀이 풀패키지">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_01.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_02.jpg" title="문제풀이 단계" />
            <a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" title="1단계 신청하기" style="position: absolute; left: 40.21%; top: 30.21%; width: 19.93%; height: 3.26%; z-index: 2;"></a>
            <a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" title="2단계 신청하기" style="position: absolute; left: 40.21%; top: 62.21%; width: 19.93%; height: 3.26%; z-index: 2;"></a>
            <a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank" title="3단계 신청하기" style="position: absolute; left: 40.21%; top: 92.21%; width: 19.93%; height: 3.26%; z-index: 2;"></a>
        </div>    

        <div class="evtCtnsBox evt03" id="apply1">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_03.jpg" title="문풀 풀패키지" />
            <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" title="일반공채 신청하기" style="position: absolute; left: 30.21%; top: 78.21%; width: 17.93%; height: 10.26%; z-index: 2;"></a>
            <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1043" target="_blank" title="경행경채 신청하기" style="position: absolute; left: 51.21%; top: 78.21%; width: 18.93%; height: 10.26%; z-index: 2;"></a>
        </div>

        <div class="evtCtnsBox evt04" id="apply2">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_04.jpg" title="단계별 종합반" >
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier" id="apply">    
                    <ul>    
                        <li><a href="#tab1" class="active">일반공채</a></li>                            
                        <li><a href="#tab2">경행경채</a></li>          
                    </ul>
                </div> 

                <div id="tab1" class="tabContents">   
                    <div class="evt04_table">     
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
                                        <td>2021년 2차대비  1단계종합반 (한국사 원유철)</td>
                                        <td><span style="text-decoration: line-through;">750,000원</span><br />
                                        <span style="color:#f72739">525,000원</span></td>              
                                        <td><a href="javascript:alert('Coming Soon!')">신청하기 ></a></td>
                                    </tr>     
                                    <tr>
                                        <td>2021년 2차대비  1단계종합반 (한국사 오태진)</td>
                                        <td><span style="text-decoration: line-through;">690,000원</span><br />
                                        <span style="color:#f72739">483,000원</span></td>                         
                                        <td><a href="javascript:alert('Coming Soon!')" >신청하기 ></a></td>
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
                                        <td>2021년2차대비 2단계 동형모의고사 종합반 (한국사 원/오 택1)</td>
                                        <td><span style="text-decoration: line-through;">500,000원</span><br />
                                        <span style="color:#f72739">450,000원</span></td>                       
                                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank">신청하기 ></a></td>
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
                                        <td>2021년2차대비 3단계 파이널 모의고사 종합반 (한국사 원/오 택1)</td>
                                        <td><span style="text-decoration: line-through;">100,000원</span><br />
                                        <span style="color:#f72739">70,000원</span></td>                        
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
                                        <td>2021년 2차대비 2+3단계 종합반 (한국사 원/오 택1)</td>
                                        <td><span style="text-decoration: line-through;">600,000원</span><br />
                                        <span style="color:#f72739">480,000원</span></td>                        
                                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank">신청하기 ></a></td>
                                    </tr>                                                              
                                </tbody>
                            </table>        
                        </div>                                                                          
                    </div>    
                </div>

                <div id="tab2" class="tabContents">    
                    <div class="evt04_table">     
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
                                        <td>2021년 2차대비 1단계 종합반</td>
                                        <td><span style="text-decoration: line-through;">630,000원</span><br />
                                        <span style="color:#f72739">441,000원</span></td>                        
                                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1043" target="_blank">신청하기 ></a></td>
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
                                        <td>2021년2차대비 2단계 동형모의고사 종합반</td>
                                        <td><span style="text-decoration: line-through;">500,000원</span><br />
                                        <span style="color:#f72739">450,000원</span></td>                       
                                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1044" target="_blank">신청하기 ></a></td>
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
                                        <td>2021년2차대비 3단계 파이널 모의고사 종합반</td>
                                        <td><span style="text-decoration: line-through;">100,000원</span><br />
                                        <span style="color:#f72739">70,000원</span></td>                         
                                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1045" target="_blank">신청하기 ></a></td>
                                    </tr>                        
                                </tbody>
                            </table>        
                        </div> 
                        <div class="title NSK-Black">              
                            2+3단계 종합반
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
                                        <td>2021년 2차대비 2+3단계 종합반</td>
                                        <td><span style="text-decoration: line-through;">600,000원</span><br />
                                        <span style="color:#f72739">480,000원</span></td>                          
                                        <td><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1044" target="_blank">신청하기 ></a></td>
                                    </tr>                             
                                </tbody>
                            </table>        
                        </div>                                                                          
                    </div>               
                </div>     

            </div>     
        </div>

        <div class="evtCtnsBox evt05">			
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2164_05.jpg"  alt="전국 문제풀이 문의" />
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

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">문풀 풀패키지 학원 실강 이용안내</h4>
				<div class="infoTit NG"><strong>문제풀이 유의사항</strong></div>
				<ul>
					<li>
                        ① 문제풀이 1단계<br/>
                        - 형소법, 형법, 경찰학, 원유철 한국사 : 오전 핵심요약 , 오후 진도별 모의고사 약 2시간 진행됩니다.<br/>
                        - 오태진 한국사 : 오전 사이다 전범위 모의고사로 진행됩니다.<br/>   
                        - 영어과목 : 오전 (김현정 독해) , 오후(하승민 어법) 진행됩니다. (월~금 5회강의)<br/>
                        - 수사 : 오전 진도별 모의고사만 진행됩니다.<br/>
                        - 행정법 : 오전 네친구 핵심요약만 진행됩니다.
                    </li> 
                    <li>
                        ② 문제풀이 2단계<br/>
                        - 7월 5일(월) 시작되며 , 일정은 추후공지 됩니다.                    
                    </li>
                    <li>
                        ③ 문제풀이 3단계<br/>
                        - 8월9일(월) 시작되며 , 일정은 추후공지 됩니다.
                    </li>     
                    <li>
                        ④국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 <br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.
                    </li>                
				</ul>
				<div class="infoTit NG"><strong>문제풀이 이벤트 유의사항</strong></div>
				<ul>
					<li>① 사전접수 이벤트<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 이벤트 기간 : 조기마감 유의!</li>
                    <li>② 타학원 환승 이벤트<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;- 환승 대상자 (아래 두 가지 모두 해당할 시 가능)<br/> 
                    &nbsp;&nbsp;&nbsp;&nbsp;* 타학원 정규과정 실강 또는 인강 수력이력 증빙이 가능한 수강생<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;* 최근 1년 이내 신광은 경찰학원 정규과정 수강이력이 없는 수강생<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;- 타학원 수강이력 증빙 필수          
                    </li>
                    <li>③ 다시 챌린지 이벤트(최불자)<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 21년 1차 필기합격 인증이 가능한 수강생<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 수험표 또는 성적증빙자료 필수</li>  
				</ul>                
				<div class="infoTit NG"><strong>학원 문의 : 1544-0336</strong></div>			
			</div>
		</div>
        
	</div>
    <!-- End Container -->

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