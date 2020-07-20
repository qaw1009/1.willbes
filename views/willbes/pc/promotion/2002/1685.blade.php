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
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop00 {background:#0a0a0a}

        .evtTop {background:#273445 url(https://static.willbes.net/public/images/promotion/2020/07/1685_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#f8f8f8;} 

        .evt02 {background:#ddd;}

        .evt03 {background:#f1f1f1;}

        .evt04 {background:#fff;}
        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;margin:50px 0;}
        .tabContaier ul{width:964px;margin:0 auto;height:80px;border-bottom:5px solid #000;} 
        .tabContaier li{display:inline-block;width:400px;height:75px;line-height:75px;background:#ebebeb;color:#7f7f7f;float:left;font-size:25px;font-weight:bold;}
        .tabContaier li:first-child {margin-right:20px;margin-left:75px;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#000;font-size:40px;background:#fff;border:5px solid #000;border-bottom:none;}

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

        .skybanner {position:fixed;top:200px;right:0;z-index:1;} 
        .skybanner a {display:block; margin-bottom:5px}

        .clicks{display:none;margin:0 auto;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1685_sky.png" alt="스카이베너" >
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
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1685_top.jpg" title="문제풀이 풀패키지">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1685_01.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1685_02.jpg" usemap="#Map1685_step1" title="문제풀이 단계" border="0"/>
            <map name="Map1685_step1" id="Map1685_step1">
                <area shape="rect" coords="355,945,764,1009" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" />
                <area shape="rect" coords="355,1896,762,1956" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
            </map>
        </div>

        {{--
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1685_03.jpg" usemap="#Map1685_apply" title="풀패키지 신청하기" border="0"/>
            <map name="Map1685_apply" id="Map1685_apply">
                <area shape="rect" coords="175,915,465,974" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" />
                <area shape="rect" coords="658,914,949,974" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1043" target="_blank" />
            </map>
        </div>
        --}}

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1685_04.jpg" title="단계별 종합반" >
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier" id="apply">    
                    <ul>    
                        <li><a href="#tab1" class="active">일반공채</a></li>                            
                        <li><a href="#tab2">경행경채</a></li>          
                    </ul>
                </div> 
                <div id="tab1" class="tabContents">   
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1685_04_tab01.jpg" usemap="#Map1685a"  title="일반공채 수강신청" border="0" />
                    <map name="Map1685a" id="Map1685a">
                        <area shape="rect" coords="897,146,1024,179" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
                        <area shape="rect" coords="897,335,1024,369" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank" />
                        <area shape="rect" coords="897,524,1025,559" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
                    </map>  
                </div>
                <div id="tab2" class="tabContents">    
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1685_04_tab02.jpg" usemap="#Map1685b"  title="경행경채 수강신청" border="0" />
                    <map name="Map1685b" id="Map1685b">
                        <area shape="rect" coords="897,146,1026,179"  href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1044" target="_blank" />
                        <area shape="rect" coords="897,335,1025,370" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1045" target="_blank" />
                        <area shape="rect" coords="897,525,1026,559" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1044" target="_blank" />
                    </map>   
                </div>     
            </div>     
        </div>

        <div class="evtCtnsBox evt05">			
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1685_05.jpg"  alt="전국 문제풀이 문의" />
                <ul>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');">신청하기</a></li>
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
				<h4 class="NGEB">문제풀이 풀패키지 학원 실강 이용안내</h4>
				<div class="infoTit NG"><strong>문제풀이 유의사항</strong></div>
				<ul>
					<li>① 문제풀이 1단계는 영어 제외 모두 오전강의만 진행됩니다. (영어과목은 오전,오후 모두 진행)<br/>
                    &nbsp;&nbsp;- 형소법, 경찰학, 형법, 한국사(원), 수사, 행정법 : 핵심요약 진행 / 영어 : 오전)핵심요약, 오후)진도별 문제풀이 / 한국사(오) : 전범위 모의고사
                    </li> 
                    <li>② 문제풀이 2,3단계 일정은 2020년 2차 시험 일정에 따라 변경될 수 있습니다.</li>                
				</ul>
				<div class="infoTit NG"><strong>문제풀이 이벤트 유의사항</strong></div>
				<ul>
					<li>① 사전접수 이벤트<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이벤트 기간 : 조기마감유의(할인진행중)</li>
                    <li>② 타학원 환승 이벤트<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;- 환승 대상자 (아래 두 가지 모두 해당할 시 가능)<br/> 
                    &nbsp;&nbsp;&nbsp;&nbsp;* 타학원 정규과정 실강 또는 인강 수력이력 증빙이 가능한 수강생<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;* 최근 1년 이내 신광은 경찰학원 정규과정 수강이력이 없는 수강생<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;- 타학원 수강이력 증빙 필수          
                    </li>  
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