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
            top:250px;
            right:0;
            display:none;
            z-index:1;
        }

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/03/1564_top_bg.jpg) repeat-x left top}
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

        .evt01 .dday span {color:#3a99f0; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}
        .evt01 .btnbuy {width:940px; margin:50px auto 0}
        .evt01 .btnbuy a {border-radius:50px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt01 .btnbuy a:hover {background:#3a99f0;
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
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#3a99f0}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt03 {background:#fff; padding-top:100px;}
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

        .evt04 {background:#ececec; padding:100px 0}
        .evt04 img {border-bottom:1px solid #e4e4e4;}
        .evt04 h4 {color:#3a99f0; font-size:18px}
        .evt04 .columns {width:940px; margin:50px auto 0;
            column-count: 2;
            column-gap:20px;
        }
        .evt04 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:20px; color:#888; background:#fff;
        }
        .evt04 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt04 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt04 .columns div strong {font-size:bold; color:#333}

        .evt05 {background:#3a99f0; padding-bottom:100px}
        .evt05 ul {width:940px; margin:0 auto;}
        .evt05 li {display:inline; float:left; width:50%}
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
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#lect"><img src="https://static.willbes.net/public/images/promotion/2020/03/1561_sky01.png" alt="스카이베너" ></a>
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_top.jpg" alt="창업 다마고치" > 
            <span><a href="#tab03"><img src="https://static.willbes.net/public/images/promotion/2020/03/1564_pup.png" alt="맛보기강의" > </a></span>
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
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_01.jpg" alt="사전예약 이벤트" >
                <div class="dday NSK-Thin">신청마감 <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_img01.png" alt="시계" ><strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong></div>
                <div class="btnbuy NSK-Black"><a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">[온라인강의] 사전예약 신청하기 ></a></div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt02">
                <iframe src="https://www.youtube.com/embed/pgfPkHvbVJs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="evt02Txt01">
                    안녕하세요, 네이버 스마트스토어를  운영하고 있고,<br>
                    유튜브에 저의 창업 성장기를 많은 분들께<br>
                    공유하고 있는 <span class="NSK-Black">창업다마고치 김정환</span>입니다. 
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_02.jpg" alt="인플루언서" >
            </div>
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_01.jpg" alt="e커머스 강좌소개" ><br>
                <iframe src="https://www.youtube.com/embed/_yVIa13RFW8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_02.jpg" alt="e커머스 강좌소개" ><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_03.jpg" alt="e커머스 강좌소개" ><br>
            </div>   
        </div>  

        <div id="tab03">
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_04_0327_01.jpg" alt="커리큘럼 강좌소개" >

                <ul>
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            {{-- <li><a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');">{{$i}}강 맛보기 수강 ></a></li> --}}
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>
                                {{--<a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" class="btnst01">WIDE ></a>--}}
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

                <div class="evt03Txt01">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_04_0327_02.jpg" alt="커리큘럼 강좌소개" >
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_04_01.png" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <h4>지금 바로 시작하게 만드는 다마고치님의 강의! </h4>
                        <p>보라도리(shin****)</p>
                        <strong>가장 좋았던 것은 역시나 실행하는 모습이란 어떤 것인지 몸소 보여준 창업 다마고치님의 밀도 높은 강의 내용과
                        실제로 경험했기에 전달 가능한 알고 실행하면 엄청난 이익금이 창출되는 팁들의 대방출 이었습니다.</strong><br>
                        각종 영상자료로 이해하기 쉽게 알차게 강의를 구성한 점이 특히 좋았습니다. 강의자료 준비에 공을 들인 것이
                        확실히 느꼈습니다.<br>
                        이번 강의를 통해 ‘나도 해볼 수 있겠다’는 생각이 불끈불끈 들었습니다. 그렇게 때문에 훌륭한 강의 추천할만한 강의
                        였습니다. 엄지척 
                    </div>  
                    <div>
                        <h4>알차고 뜻깊은 4시간</h4>
                        <p>캣치사운드(catc****)</p>
                        먼저 결론부터 말씀드리자면 저는 강의 4시간동안 알차고 뜻깊은 시간있었습니다. 
                        거기에 반성과 후회 그리고 다짐의 시간이기도 했습니다.<br>
                        왜 이걸 몰랐지? 난 3년동안 스마트스토어를 운영하면서 무엇을 한거지?
                        대박을 꿈꾸면서 나 아무것도 하지도 하려고 하지않았구나?<br>
                        난 정말 바보처럼 스마트스토어를 모르면서 운영했었구나... 강의를 듣는 매순간 순간 반성과 다짐을 했습니다.
                        <strong>만약 창업다마고치님의 강의를 모르고 지나갔거나 20만원이 아까워 강의신청을 하지 않았더라면
                        전 아직까지 매출없는 스마트스토어를 운영하면서 전전긍긍했을겁니다. 아니 어쩌면 포기했을수도 있습니다.</strong>
                        창업 다마고치님의 강의를 통해 다시한번 더 천천히 다시 시작하는 마음으로 그동안 놓치고 지나간 일들을
                        찾아 포기하지 않고 창업 다마고치님의 말씀을 믿고 실천해 나가도록 하겠습니다. 
                    </div> 
                    <div>
                        <h4>닉네임 바꾸세요! 창업다마고치 X !! 창업다아라찌 O!</h4>
                        <p>라비앙로즈(euni****)</p>
                        강의 듣기 전에 다른분들 후기에 왜 강의에 대한 자세한 이야기가 없을까... 궁금하기도 했구요~
                        강의 듣고 나니 그 이유를 알 것 같네요~<br>
                        왜? 나만 알고 싶은 강의니까!<br>
                        죄송하지만 저도 강의 내용은 발설하지 못합니다. 약오르신 분들은 꼭 다음번 강의 신청하시길 바래요.
                        (이젠 더 바빠지셔서 다음 강의를 진행할 수 있을지는 확답할 수 없다고 하셨지만요 --;;;)<br>
                        <strong>확실한 건 다마고치님 강의 내용을 듣고 실행한다면 20만원 아닌 200만원 이상의 가치가 있을거라는거! </strong>
                    </div>  
                    <div>
                        <h4>다마고치님 강의 아쉬움을 느꼈던 이유</h4>
                        <p>해피U(sam5****)</p>
                        좀더 일찍 강의를 들었더라면 시간을 허비하지 않았을텐데 하는 아쉬움을 느꼈습니다.<br>
                        강의를 들으면서 내가 뭘 모르는지도 몰랐던 부분을 알게된 것과
                        수많은 다른 강의를 들으면서 그냥 머릿속에 떠다니기만해 답답해 하던 것들
                        ‘그렇게 하세요’, ‘그래서 어쩌라고’하며 속상해 울상지었던 것들에 대해
                        <strong>어느 강의에서도 들어보지 못알만큼 현실적이고 실천가능한 방법으로 알려주시는
                        강의 내용에 놀라면서도 감사했습니다.</strong><br>
                        감의비는 20만원 이었지만 이것을 100배 1,000배로 만들 수 있겠다는 생각이 들었습니다! 
                    </div> 
                    <div>
                        <h4>이 강의가 20만원이나해?</h4>
                        <p>SCV 출동 준비완료(suga****)</p>
                        요즘은 온라인 쇼핑몰 관련 강의도 많고 들어간 비용에 비해 내용이 부실한 경우가 많아
                        처음 강의를 듣기전에는 도대체 어떤 강의이기에 20만원씩이나해? 이런 생각을 했습니다.
                        <strong>강의를 다 듣고 나서는 이건 20만원에 해주셔서 감사해야 하는 강의라는 걸 깨달았습니다. ^^</strong><br>
                        그렇게 생각하게 된데에는 정말 많은 이유가 있지만 유튜브에서도 나오지 않았고 책에도 적지 못한
                        진짜배기 정보들이 알이 꽉 찬 무 처럼 단단하게 채워져 있었다는 겁니다. <br>
                        정말 있는 그대로 1년 동안의 경험담을 진지하면서도 유머러스하게 강의해주셔서 감동! 이었습니다.<br>
                        그외에도 좋았던 점들이 정말 많았어요.<br>
                        유튜브에서만 나온 내용으로만 해도 월수익 500 가능했던 시절은 끝이났다 라는 말씀에 전적으로 동의합니다.
                        누구나 쉽게 얻을 수 있는 정보가 되어 많은 사람들이 똑같이 하고 있기에 다른 무언가가 더 필요하다고
                        생각했습니다.<br>
                        솔직히 강의를 마친후에 많은 숙제를 떠안은 것처럼 마음이 무겁기도 하지만
                        일단 나아갈 방향을 알게 된 것에 대해 감사한 마음이 큽니다. 
                    </div>           
                </div>                
            </div>
            {{-- 상품바로결제 정보 --}}
            <div id="pass" style="display: none">
                <input type="checkbox" name="y_pkg" value="162748" checked/>
                <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
            </div>

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_04_02.jpg" alt="BEST 수강후기" >
                <ul>
                    <li>
                        {{-- <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/162748" target="_blank"> --}}
                        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">
                        <span class="NSK-Black">지금, 사전예약 </span>
                        신청하고 100만원 만들기 도전! → 
                        </a>
                    </li>
                    <li>
                        <a href="javascript:alert('사전예약 신청기간 종료 후, 4월 9일 부터 혜택 제공됩니다.');">
                        <span class="NSK-Black">이미 신청했다면,</span>
                        위탁/사입상품 추천 받기! → 
                        </a>
                    </li>
                </ul>
            </div>	
        </div>

        @include('willbes.pc.promotion.2014.promotionInfo')
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
@stop