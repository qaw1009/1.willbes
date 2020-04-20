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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/03/1565_top_bg.jpg) repeat-x left top}
        .evtTop span { position:absolute; left:50%; margin-left:350px; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
        @@keyframes upDown{
             from{top:500px}
             50%{top:520px}
             to{top:500px}
         }
        @@-webkit-keyframes upDown{
             from{top:500px}
             50%{top:520px}
             to{top:500px}
         }

        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#fff; padding:100px 0}
        .evt01 .dday {font-size:30px; position:absolute; top:430px; left:50%; width:940px; margin-left:-470px; text-align:center;}
        .evt01 .dday strong {font-size:40px}
        .evt01 .dday img {display:inline-block; margin:0 20px;
            -webkit-animation: vibrate-1 1s linear infinite both;
            animation: vibrate-1 1s linear infinite both;
        }
        @@-webkit-keyframes vibrate-1 {
             0% {
                 -webkit-transform: translate(0);
                 transform: translate(0);
             }
             20% {
                 -webkit-transform: translate(-2px, 2px);
                 transform: translate(-2px, 2px);
             }
             40% {
                 -webkit-transform: translate(-2px, -2px);
                 transform: translate(-2px, -2px);
             }
             60% {
                 -webkit-transform: translate(2px, 2px);
                 transform: translate(2px, 2px);
             }
             80% {
                 -webkit-transform: translate(2px, -2px);
                 transform: translate(2px, -2px);
             }
             100% {
                 -webkit-transform: translate(0);
                 transform: translate(0);
             }
         }
        @@keyframes vibrate-1 {
             0% {
                 -webkit-transform: translate(0);
                 transform: translate(0);
             }
             20% {
                 -webkit-transform: translate(-2px, 2px);
                 transform: translate(-2px, 2px);
             }
             40% {
                 -webkit-transform: translate(-2px, -2px);
                 transform: translate(-2px, -2px);
             }
             60% {
                 -webkit-transform: translate(2px, 2px);
                 transform: translate(2px, 2px);
             }
             80% {
                 -webkit-transform: translate(2px, -2px);
                 transform: translate(2px, -2px);
             }
             100% {
                 -webkit-transform: translate(0);
                 transform: translate(0);
             }
         }

        .evt01 .dday span {color:#ff0066; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
        .evt01 .btnbuy {width:940px; margin:50px auto 0}
        .evt01 .btnbuy a {border-radius:50px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt01 .btnbuy a:hover {background:#ff0066;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @@-webkit-keyframes shadow-drop-2-center {
             0% {
                 -webkit-transform: translateZ(0);
                 transform: translateZ(0);
                 -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                 box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
             }
             100% {
                 -webkit-transform: translateZ(50px);
                 transform: translateZ(50px);
                 -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                 box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
             }
         }
        @@keyframes shadow-drop-2-center {
             0% {
                 -webkit-transform: translateZ(0);
                 transform: translateZ(0);
                 -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                 box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
             }
             100% {
                 -webkit-transform: translateZ(50px);
                 transform: translateZ(50px);
                 -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                 box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
             }
         }

        .evt02 {background:#f6f6f6; padding-top:100px}
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#464646}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt03 {background:#fff; padding-top:100px}
        .evt03 ul li {display:inline; float:left; width:48%; padding:20px; margin:0 1%; border-radius:10px; background:#353267; color:#fff}
        .evt03 ul li p {font-size:20px; margin-bottom:15px; font-weight:600}
        .evt03 ul li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:4px}
        .evt03 ul li a.btnst01 {border:1px solid #ccc;}
        .evt03 ul li a.btnst02 {border:1px solid #000; color:#fff; background:#333}
        .evt03 ul li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc}
        .evt03 ul li a:hover {background:#000; color:#fff}
        .evt03 ul:after {content:""; display:block; clear:both}
        .evt03 .evt03Txt01 {font-size:16px; line-height:1.4; margin-top:20px; letter-spacing:-1px; color:#333; padding-left:140px;}
        .evt03 ul {width:900px; margin:0 auto}
        .evt03 div {line-height:1.5; text-align:left; width:1120px; margin:0 auto; font-size:20px; color:#fff;}

        .evt04 {background:#ececec; padding:100px 0 50px}
        .evt04 img {border-bottom:1px solid #e4e4e4;}
        .evt04 h4 {color:#383368; font-size:18px}
        .evt04 .columns {width:940px; margin:50px auto 0;
            column-count: 2;
            column-gap:20px;
        }
        .evt04 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:20px; color:#666; background:#fff;
        }
        .evt04 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt04 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}

        .evt05 {background:#ff0066; padding-bottom:100px}
        .evt05 ul {width:940px; margin:0 auto;}
        .evt05 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt05 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt05 li span {display:block; font-size:28px}
        .evt05 li:last-child a{margin-left:10px}
        .evt05 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10
        }

        .evtFooter {width:900px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1565_sky.png" alt="스카이베너" usemap="#Map1565_sky" border="0" >
            <map name="Map1565_sky" id="Map1565_sky">
                <area shape="rect" coords="7,6,112,447" href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y/')}}');" alt="강의신청" />
            </map>
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_top.jpg" alt="" >    
            <span><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/03/1564_pup.png" alt="맛보기강의" > </a></span>
            <div class="evtMenu">
                <ul class="tabs">
                    <li><a href="#tab01" data-tab="tab01" class="top-tab">신규런칭 이벤트</a></li>
                    <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                    <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                    <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
                </ul>
            </div>  
        </div>       

        <div id="tab01">
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1603_01.jpg" alt="사전예약 이벤트" usemap="#Map1565A" border="0" >
                <map name="Map1565A" id="Map1565A">
                    <area shape="rect" coords="193,781,375,814" href="https://njob.willbes.net/support/notice/show/cate/3114?board_idx=268601" target="_blank" alt="이용안내" />
                </map>
                <div class="dday NSK-Thin">신청마감 <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_img01.png" alt="시계" ><strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong></div>
                <div class="btnbuy NSK-Black"><a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y/')}}');">[온라인강의] 신청하기 ></a></div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt02">
                <iframe src="https://www.youtube.com/embed/v8vHoj2Cpt8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="evt02Txt01">
                    안녕하세요. 올해 대학을 졸업했고,<br>
                    대학 졸업 전 취업보다는 창업을 선택해,<br>
                    무재고로 쇼핑몰 사업을 하고 있는 <span class="NSK-Black">황채영</span>입니다. 
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_02.jpg" alt="인플루언서" >
            </div>  
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_03_01.jpg" alt="e커머스 강좌소개" ><br>               
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_03_02.jpg" alt="e커머스 강좌소개" ><br>
            </div> 
        </div>  

        <div id="tab03">
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_03_04_01.jpg" alt="e커머스 강좌소개" >
                <ul>
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');" class="btnst02">HIGH ></a>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');" class="btnst03">LOW ></a>
                            </li>
                            @php $i += 1; @endphp
                        @endforeach
                    @else
                        <li><a href="#none">1강 맛보기 수강 준비중 ></a></li>
                        <li><a href="#none">2강 맛보기 수강 준비중 ></a></li>
                    @endif
                </ul>
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1603_03_04_02.jpg" alt="e커머스 강좌소개" >
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_04_01.png" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <h4>신*화 대표님</h4>
                        <p></p>
                        스터디끝나고 고민하시는 분들에게 완전 강추합니다. 정문진 강사님과는 다르게 또 다른 스타일로 알차게 커리큘럼이 짜여있어서 좋았습니다. 
                    </div>  
                    <div>
                        <h4>김*훈 대표님</h4>
                        <p></p>
                        쇼핑몰을 처음 시작하면서 여러 실수도 많고 어려움도 많았습니다. 황채영 선생님을 만나 제가 몰랐던 부분들을
                        많이 채워갔습니다. 쇼핑몰 기본부터 판매전략, 상품관리, 운영관리, 그리고 문제해결까지.<br>
                        소핑몰 운영에 관련하 새로운 관점과 노하우를 많이 얻어가는 기회였습니다. 선생님께 다시한번 감사의 말씀을 전합니다.
                    </div> 
                    <div>
                        <h4>박*현 대표님</h4>
                        <p></p>
                        수업시간에 알기쉽게 설명해 주시고 질의에 대해서도 잘 답변해주셔서 감사했습니다. 그리고 수업시간 외에 개인적으로
                        질문했을 때에도 친절하게 답변해주셔서 감동이었답니다! 2020년 첫 수업 같이해서 좋았어요^^ <br>
                        서로 번창해서 다시 만나요 ^^!
                    </div>  
                    <div>
                        <h4>이*원 대표님</h4>
                        <p></p>
                        강사님의 친절한 강의에 모르는 부분을 많이 알 수 있는 교육이였습니다. 초보셀러인 저에게는 많은 도움이 되었습니다.<br>
                        감사합니다.
                    </div> 
                    <div>
                        <h4>조*희 대표님</h4>
                        <p></p>
                        샵플링을 처음 활용해봐서 시작할 때는 많이 힘들었는데 강사님께서 귀에 쏙쏙 들어오게 알려주셔서 잘 배웠습니다. 
                        강사님의 도움으로 많이 성장했습니다. 프로그램 활용하기에는 아직 미흡한 점이 많지만 알려주신 내용을 토대로
                        열심히 해보겠습니다 :)
                    </div>
                    <div>
                        <h4>김*아 대표님</h4>
                        <p></p>
                        정적으로 가르쳐 주셔서 한 달간 감사했습니다. 많이 배운 것 같은데 여전히 많이 어렵습니다 선생님^^ <br>
                        어린 나이에 그 자리에 왜 계신지 알 것 같은 시간이였습니다.
                    </div>            
                </div>                
            </div>

            {{-- 상품바로결제 정보 --}}
            <div id="pass" style="display:none">
                <input type="checkbox" name="y_pkg" value="162747" checked/>
                <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
            </div>

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_04_02.jpg" alt="BEST 수강후기" >
                <ul>
                    <li>
                        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y/')}}');">
                        <span class="NSK-Black">지금, 수강신청하고 </span>
                        재고없이 월1천만원 도전! → 
                        </a>
                    </li>
                </ul>
            </div>	
        </div>

        <div class="evtFooter">
            <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

            <p># 런칭기념  이벤트 안내</p>
            <div>강좌는 내강의실>수강대기 강좌에서 확인 가능합니다.( 4월 9일부터 수강 시작)</div>

            <p># 수강안내</p>
            <ul>
                <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                <li>PC/휴대폰/태블릿에서 언제든 수강가능합니다.</li>
                <li>커리큘럼은 사정에 따라 일부 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.</li>
                <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>
            </ul>

            <p># 환불안내</p>
            <ul>
                <li>이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.</li>
                <li>강의재생시간에 관계없이 강의를 재생한 경우, 학습 자료 및 모바일 다운로드 이용한 경우 수강한 것으로 간주합니다.(맛보기 강의 제외)</li>
                <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.<br>
                * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
                * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
                * 수강시작일로부터 7일 이내 위약금 없음<br>
                * 수강시작일로부터 7일 이후 위약금 적용 (정상가의 10% 공제) </li>
                <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.<br>
                (샵플링 프로그램 1개월 정가 275,000원 기준 환불시 기사용분 차감)</li>
                <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
                <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다.</li>
            </ul>

            <p># 기타유의사항</p>
            <ul>
                <li>제공되는 사은혜택과 동영상은 구분하여 별도구매 불가합니다.</li>
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
                <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                <li>지급된 샵플링 프로그램 이용을 위해서는 사업자등록번호가 필요합니다. (2020년 4월 9일 이전 별도 공지)</li>
                <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
            </ul>

            <div>※ 이용문의 : 고객만족센터 1544-5006</div>
        </div>

        <div class="evtCtnsBox reply">
            {{--수강후기--}}
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop