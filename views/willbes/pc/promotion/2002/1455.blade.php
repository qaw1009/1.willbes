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
        .evtTop00 {background:#404040}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/11/1455_top_bg.jpg) no-repeat center top;}     

        .evt01 {background:#f8f8f8;} 

        .evt02 {background:#ddd;}

        .evt03 {background:#f1f1f1;}

        .evt04 {background:#fff;}

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

        .evt06 {background:#555;}

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
        .skybanner2 {position:fixed;top:410px;right:0;z-index:1;}    

        .click{display:none;margin:0 auto;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 

        <div class="skybanner">
            <a href="#to_go">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_skybanner.png" alt="스카이베너" >
            </a>
        </div>     
        
        <div class="skybanner2">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_skybanner2.png" alt="스카이베너2" >
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
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_top.jpg" title="문제풀이 풀패키지">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_1.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_2.jpg" usemap="#Map1455z" title="합격으로 증명" border="0">
            <map name="Map1455z" id="Map1455z">
                <area shape="rect" coords="337,847,779,918" class="confirm" />
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_2_click.jpg" alt="1단계 핵심요약.문제풀이 스케쥴" class="click">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_2s.jpg" title="2단계.3단계">
        </div>

        <div class="evtCtnsBox evt03" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_3.jpg" usemap="#Map1455a" title="1+2+3단계 종합반" border="0">
            <map name="Map1455a" id="Map1455a">
                <area shape="rect" coords="370,831,751,910" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" />
                <area shape="rect" coords="376,1301,753,1377" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1043" target="_blank" />
            </map>     
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_4.jpg" usemap="#Map1455b"  title="단계별 종합반 수강신청" border="0">
            <map name="Map1455b" id="Map1455b">
                <area shape="rect" coords="889,555,1033,686" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" />
                <area shape="rect" coords="888,841,1034,882" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
                <area shape="rect" coords="889,1030,1030,1073" href=" https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank" />
                <area shape="rect" coords="887,1219,1033,1262" href=" https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
                <area shape="rect" coords="888,1610,1037,1653" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1043" target="_blank" />
                <area shape="rect" coords="890,1797,1033,1843" href=" https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1044" target="_blank" />
            </map>             
        </div>

        <div class="evtCtnsBox evt05" id="apply">			
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_5.jpg"  alt="시간표 및 장소" />
                <ul>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');">신청하기</a></li>
                    <li><a href="#none" alt="광주(참수리)" onmouseover="$('span.area02').addClass('on');" onmouseleave="$('span.area02').removeClass('on');">학원문의</a></li>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605005&course_idx=1043" target="_blank" alt="인천" onmouseover="$('span.area03').addClass('on');" onmouseleave="$('span.area03').removeClass('on');">신청하기</a></li>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605006&course_idx=" target="_blank" alt="광주" onmouseover="$('span.area04').addClass('on');" onmouseleave="$('span.area04').removeClass('on');">신청하기</a></li>
                    <li><a href="https://blog.naver.com/als9946" target="_blank" alt="전주" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>
                   
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605004&course_idx=" target="_blank" alt="대구" onmouseover="$('span.area06').addClass('on');" onmouseleave="$('span.area06').removeClass('on');">신청하기</a></li>
                    <li><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605003&course_idx=&search_text=UHJvZE5hbWU666y47KCc7ZKA7J20" target="_blank" alt="부산" onmouseover="$('span.area07').addClass('on');" onmouseleave="$('span.area07').removeClass('on');">신청하기</a></li>
                   
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

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1455_6.jpg" title="학원 실강 이용안내">           
        </div>
	</div>
    <!-- End Container -->

<script type="text/javascript">    

 /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });


        $(function(){			
			$(".confirm").click(function(){
				$(".click").css({"display":"block"});		
			});
		});  
 
</script>

 {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')


@stop