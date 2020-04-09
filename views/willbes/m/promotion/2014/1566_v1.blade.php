@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; text-align:center; position:relative; font-size:0.867rem}
    .evtCtnsBox > img {width:100%; max-width:1120px;}
    .evtTop {background:#fff7f5 url(https://static.willbes.net/public/images/promotion/2020/03/1566_top_bg.jpg) repeat-x left top}
    .evtTop span {position:absolute; left:50%; margin-left:30%; top:30%; animation: sp01 1.5s linear infinite;}
    .evtTop span img { width:70px}
    @@keyframes sp01{
         from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
     }

    .evtMenu {background:#fff; width:100%; border-bottom:1px solid #edeff0}
    .tabs {width:100%; max-width:1120px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:25%}
    .tabs li a {display:block; text-align:center; font-size:14px; line-height:1.5; padding:15px 0; color:#999; font-weight:bold; letter-spacing:-1px;}
    .tabs li a:hover,
    .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
    .tabs:after {content:""; display:block; clear:both}

    .evt01 {background:#fff; padding:100px 0}
    .evt01 .dday {font-size:0.875rem; position:absolute; top:50%; left:50%; width:100%; margin-left:-50%; text-align:center; letter-spacing: -1px;}
    .evt01 .dday strong {font-size:0.9rem;}
    .evt01 .dday img {display:inline-block; margin:0 10px; width:20px;
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

    .evt01 .dday span {color:#00c73c; box-shadow:inset 0 -10px 0 rgba(0,0,0,0.1);}

    .evt02 {background:#f6f6f6; padding-top:100px}
    .evt02 .evt02Txt01 {font-size:1.25rem; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#464646}
    .evt02 .evt02Txt01 span {font-size:1.5rem; box-shadow:inset 0 -20px 0 rgba(0,0,0,.1); color:#000}

    .evt03 {background:#fff;}
    .evt03 ul {width:80%; max-width:900px; margin:0 auto}
    .evt03 ul li {display:inline; float:left; width:48%; padding:20px; margin:0 0.5%; border-radius:10px; background:#353267; color:#fff; line-height:1.5}
    .evt03 ul li p {font-size:16px; margin-bottom:15px; font-weight:600}
    .evt03 ul li a {display:block; padding:8px 0; width:90px; text-align:center; font-size:14px; margin:0 auto 5px; border-radius:4px;}
    .evt03 ul li a.btnst01 {border:1px solid #ccc;}
    .evt03 ul li a.btnst02 {border:1px solid #000; color:#fff; background:#333}
    .evt03 ul li a.btnst03 {border:1px solid #ccc; color:#000; background:#ccc}
    .evt03 ul li a:hover {background:#000; color:#fff}
    .evt03 ul:after {content:""; display:block; clear:both}

    .evt04 {background:#ececec; padding:100px 0 50px}
    .evt04 img {border-bottom:1px solid #e4e4e4; max-width:940px;}
    .evt04 h4 {color:#383368; font-size:18px}
    .evt04 .columns {padding:20px;
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

    .evt05 {background:#00c73c; padding-bottom:50px}
    .evt05 li a {display:block; font-size:0.8rem; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px; margin:0 1.5%;}
    .evt05 li a:hover {background:#fff; color:#000;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .evt05 li span {display:block; font-size:1.25rem}
    .evt05 ul:after {content:""; display:block; clear:both}

    .video-container-box {padding:20px}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
        background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10
    }

    .btnbuy {width:100%; position:fixed; bottom:5px;}
    .btnbuy a {display:block; width:95%; max-width:940px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#00c73c;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    .evtFooter {max-width:900px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666}
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal; }
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
    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {

    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evtTop span {left:50%; margin-left:30%; top:35%;}
        .evtTop span img { width:108px}
        .tabs li a {font-size:16px; padding:25px 0;}
        .evt01 .dday {font-size:1.2rem;}
        .evt01 .dday strong {font-size:1.75rem;}
        .evt01 .dday img {width:40px;}
        .evt01 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}
        .evt02 .evt02Txt01 {font-size:1.5rem;}
        .evt02 .evt02Txt01 span {font-size:1.75rem; box-shadow:inset 0 -25px 0 rgba(0,0,0,.1);}
        .video-container-box {width:768px; margin:0 auto; padding:0}
        .evt03 ul li {padding:20px 0; font-size:16px;}
        .evt03 ul li p {font-size:20px; margin-bottom:15px; font-weight:600}
        .evt03 ul li br {display:none}
        .evt03 ul li a {display:inline-block; padding:10px 0; font-size:16px;}
        .evt05 {padding-bottom:70px}
        .btnbuy br {display:none}
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {
        .evtTop span {left:50%; margin-left:23%; top:35%;}
        .evt01 .dday {font-size:2.0rem; top:40%;}
        .evt01 .dday strong {font-size:2.5rem;}
        .evt01 .dday img {width:68px;}
        .evt01 .dday span {box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
        .evt02 .evt02Txt01 {font-size:1.75rem;}
        .evt02 .evt02Txt01 span {font-size:2rem; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1);}
        .video-container-box {width:980px; margin:0 auto; padding:0}
        .evt03 ul li a {display:inline-block; padding:10px 0; font-size:16px;}
        .evt04 .columns {width:980px; margin:0 auto}
        .evt05 ul {width:940px; margin:0 auto;}
        .evt05 li a {font-size:24px;}
        .evt05 {padding-bottom:100px}
    }
</style>
<div id="pass" style="display: none">
    <input type="checkbox" name="y_pkg" value="162745" checked/>
    <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
</div>

<div id="Container" class="Container NG c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_top.jpg" alt="네이버 파트너스퀘어 공식강사" ><br>
        <span><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/03/1564_pup.png" alt="맛보기강의"></a></span>
        <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_top_01.jpg" alt="네이버 파트너스퀘어 공식강사" >    
        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab">사전예약 이벤트</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div>  
    </div>       

    <div id="tab01">
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_01.jpg" alt="사전예약 이벤트" >
            <div class="dday NSK-Thin">신청마감 <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_img01.png" alt="시계" ><strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong></div>
        </div>
    </div>

    <div id="tab02">
        <div class="evtCtnsBox evt02">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/SqJMAs2mic8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt02Txt01">
                안녕하세요. 네이버 파트너스퀘어 공식 강사이자,<br>
                유튜브 채널 "단아쌤TV"를 운영중인<br>
                <span class="NSK-Black">단아쌤 김경은</span>입니다. 
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_02_01.jpg" alt="인플루언서" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_02_02.jpg" alt="인플루언서" >
        </div>
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_03_01.jpg" alt="e커머스 강좌소개" >  
        </div>  
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_03_02_01.jpg" alt="커리큘럼" >
            <ul>
                @if(empty($arr_base['promotion_otherinfo_data']) === false)
                    @php $i = 1; @endphp
                    @foreach($arr_base['promotion_otherinfo_data'] as $row)
                        <li>
                            <p>{{$i}}강 맛보기 수강 ▼</p>
                            <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");' class="btnst02">HIGH ></a>
                            <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");' class="btnst03">LOW ></a>
                        </li>
                        @php $i += 1; @endphp
                    @endforeach
                @else
                    <li>1강 맛보기<br>수강 준비중 ></li>
                    <li>2강 맛보기<br>수강 준비중 ></li>
                @endif
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_03_02_02.jpg" alt="커리큘럼" >
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_04_01.png" alt="BEST 수강후기" >
            <div class="columns">
                <div>
                    <h4>수강생 조*정 님</h4>
                    <p></p>
                    강사님 경험을 토대로 말씀해주셔서 와 닿아서 정말 좋았던 것 같아요. 또한 경쟁이 될 수 있을 수 있음에도 불구하고
                    현재 하시는 부분까지 공개 하시면서 알려 주시더라구요! 더불어 어제까지만 해도 막막해서 어떻게 해야 고민이 많았는데
                    덕분에 용기도 얻고 감사합니다!
                </div>  
                <div>
                    <h4>수강생 김*미 님</h4>
                    <p></p>
                    여태까지 들었던 강의 중 제일 좋았던 강의였습니다. 
                    스마트스토어가 무엇인지, 듣는 사람들이 뭘 원하는지, 정확히 알고 강의 하셨습니다. 더 많은 것들을 알려주시려 하다 보니 
                    시간이 좀 초과는 되었지만, 하나라도 더 알려주시려 하시다 얘기가 길어지다 보니 시간이 빨리 가는 느낌이었습니다. 
                    강의에 대한 열정과 위트까지 겸비한 최고의 강사였습니다. 이분 강의를 더 많이 듣고 싶네요.
                </div> 
                <div>
                    <h4>수강생 한*희 님</h4>
                    <p></p>
                    스마트스토어에 뛰어들 의지를 강하게 주는 강의여서 굉장히 유익하고 
                    도움이 많이 되었습니다.~! 나도 할 수 있겠다라는 생각이 드네요. 
                    (사입 과정 설명 부분 매우 유익했어요)
                </div>            
            </div>                
        </div>
        {{-- 상품바로결제 정보 --}}
        <div id="pass" style="display: none">
            <input type="checkbox" name="y_pkg" value="162745" checked/>
            <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1566_04_02.jpg" alt="BEST 수강후기" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'])}}');">
                    <span class="NSK-Black">지금, 사전예약 </span>
                    신청하고 1억 만들기 도전! → 
                    </a>
                </li>
            </ul>
        </div>	
    </div>

    <div class="btnbuy NSK-Black">        
        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'])}}');">
            <span class="NSK">미리 신청하면 24%할인!</span><br>
            [온라인강의] 사전예약 신청하기 >
        </a>
    </div>

    <div class="evtFooter">
            <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

            <p># 사전예약 이벤트 안내</p>
            <div>사전예약신청 강좌는 내강의실>수강대기 강좌에서 확인 가능합니다.<br>
            (현재 진행중인 2020년 3월 9일 사전 예약신청 강좌의 경우 4월 9일부터 수강 시작)</div>

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
                <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
            </ul>

            <div>※ 이용문의 : 고객만족센터 1544-5006</div>
        </div>
</div>
<!-- End Container -->
    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
        });

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

        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            {{-- 장바구니 저장 기본 파라미터 --}}
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            {{-- 선택된 상품코드 파라미터 --}}
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            {{-- 장바구니 저장 URL로 전송 --}}
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

        // 날짜차이 계산
        var dDayDateDiff = {
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },
            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },
            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },
            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        {{--
         * 프로모션용 디데이카운터 텍스트
         * @@param end_date [마감일 (YYYY-MM-DD)]
        --}}
        function dDayCountDownText(end_date, ele_id) {
            if(!ele_id) ele_id = 'ddayCountText';
            var arr_end_date = end_date.split('-');
            var event_day = new Date(arr_end_date[0], parseInt(arr_end_date[1]) - 1, arr_end_date[2], 23, 59, 59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));
            var date_left = String( dDayDateDiff.inDays(now, event_day) );
            var hour_left = String( timeGap.getHours() );
            var minute_left = String( timeGap.getMinutes() );
            var second_left = String(  timeGap.getSeconds() );

            if(date_left.length == 1) date_left = '0' + date_left;
            if(hour_left.length == 1) hour_left = '0' + hour_left;
            if(minute_left.length == 1) minute_left = '0' + minute_left;
            if(second_left.length == 1) second_left = '0' + second_left;

            if ((event_day.getTime() - now.getTime()) > 0) {
                $('#'+ele_id).html(date_left + '일 ' + hour_left + ':' + minute_left + ':' + second_left);

                setTimeout(function() {
                    dDayCountDownText(end_date, ele_id);
                }, 1000);
            } else {
                $('#'+ele_id).hide();
            }
        }

    </script>

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop