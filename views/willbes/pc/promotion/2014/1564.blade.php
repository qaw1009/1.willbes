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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:0;
            display:none;
            z-index:1;
        }

        .evtTop {background:#404040; height:600px}
        .evtTop span {font-size:200px; font-weight:bold; color:#fff; display:block; padding-top:250px;
            -webkit-animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @@-webkit-keyframes text-pop-up-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: none;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
            }
        }
        @@keyframes text-pop-up-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: none;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
            }
        }
        .evt01 {background:#d6e7fb; padding:150px 0}   
        .evt01 .dday {font-size:50px}
        .evt01 .btnbuy {margin-top:50px}
        .evt01 .btnbuy a {border-radius:50px; display:block; width:40%; margin:0 auto; font-size:40px; background:#000; color:#fff; padding:20px 0}
        
        .evt02 {background:#e4e4e4; padding:150px 0}
        iframe {width:854px; height:480px; margin:0 auto}
        .evt02 div {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px;}
        .evt02 div span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(235,204,60,1); color:#000}

        .evt03 {background:#696d73; padding:150px 0}
        .evt03 div {line-height:1.5; text-align:left; width:1120px; margin:0 auto; font-size:20px; color:#fff;}

        .evt04 {background:#f9f9f9; padding:150px 0}
        .evt04 .columns {width:1120px; margin:0 auto; 
            column-width:200px;
            column-count: 4;
            column-gap:20px;
        }
        .evt04 .columns div {            
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block; 
            padding:20px; border:1px solid #e4e4e4; border-radius:10px;
            margin-bottom:20px; color:#666;
        }
        .evt04 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt04 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt04 ul {width:1120px; margin:0 auto;}
        .evt04 li {display:inline; float:left; width:50%}
        .evt04 li a {display:block; font-size:20px; color:#fff; padding:30px 0; text-align:center; background:blue; line-height:1.5}
        .evt04 li span {display:block; font-size:24px}
        .evt04 li:last-child a{background:green; margin-left:10px}
        .evt04 ul:after {content:""; display:block; clear:both}

        .evtMenu {background:#fff;}        
        .tabs {width:1120px; margin:0 auto; height:80px;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}
        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10
        }       

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#lect"><img src="https://static.willbes.net/public/images/promotion/2020/03/1561_sky01.png" alt="스카이베너" ></a>
        </div>              

		<div class="evtCtnsBox evtTop NSK-Black">
            <span>김정환 대표</span>           
        </div>
        
        <div class="evtCtnsBox evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" class="active">사전예약 이벤트</a></li>
                <li><a href="#tab02">인플루언서</a></li>
                <li><a href="#tab03">e커머스 강좌소개</a></li>
                <li><a href="#tab04">BEST 수강후기</a></li>
            </ul>
        </div>

        <div class="evtCtnsBox evt01" id="tab01">
            <div class="dday NSK-Thin">신청마감 <span class="NSK-Black">09 day 09:23:25</span></div>
            <div class="btnbuy"><a href="#none">사전예약 신청하기 ></a></div>
        </div>

        <div class="evtCtnsBox evt02" id="tab02">
            <iframe src="https://www.youtube.com/embed/pRQcUkiDs30" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div>
                안녕하세요, 네이버 스마트스토어를  운영하고 있고,<br>
                유튜브에 저의 창업 성장기를 많은 분들께<br>
                공유하고 있는 <span class="NSK-Black">창업다마고치 김정환</span>입니다. 
            </div>
        </div>      

        <div class="evtCtnsBox evt03" id="tab03">
            <div class="NSK-Thin">
                이 강의에서는 제가 앞서 경험한 사업적 기술을 토대로 <br>
                그간 공개한 적 없던 여러 시행착오들과 <br>
                어려움 극복 과정을 통해 과거 저처럼 돈을 벌고 싶은데 <br>
                방법을 몰라 막막해할 누군가에게 새로운 기회를 제공하고 싶습니다. <br>
                <br>
                맨땅에 헤딩만 하기보다, 우여곡절만 겪기보다, <br>
                제대로 시작도 못하고 포기하기보다, <br>
                적어도 돈을 벌 수 있는 발판을 마련하는 데 <br>
                보탬이 되기를 바라는 마음으로<br>
                <br>
                팔리는 상세 페이지 만드는 법부터 유튜브로 <br>
                수익 창출하는 비법은 물론, 장사의 본질을 이해하는 것과 <br>
                사업 기초를 다지는 기술까지 안내해 드리겠습니다!<br>
            </div>
        </div>

        <div class="evtCtnsBox evt04" id="tab04">
            <div class="columns">
                <div>
                    <p>김철호</p>
                    1주 전 방송보고 설레는 마음으로 플레이 오토 대표번호로 상담 전화드렸는데 방송에 나온 분과 달리, 
                    어떤 여자 분이 너무 퉁명스럽게 할려면 하고 말려면 말라 하는식으로 전화 받으셔서 실망하고 끊었습니다. 
                    플레이오토도 고객응대 신경쓰셔야 겠습니다.
                </div>
                <div>
                    <p>kwang woong Park</p>
                    이런 프로그램은 처음 봤네요 어쩐지 그많은 정보들을 한사람이 작업해서 올린다는게 
                    쉽지않을거라고 생각했는데 좋은정보 감사합니다. 그런데 그럼 올리는 상품들은 모두 위탁상품 들인건가요?
                </div>
                <div>
                    <p>박한마</p>
                    위탁으로 올리는건데 제가 놓친것같아 질문드리자면, 주문이 들어왔을때 업체관리는 어떻게하나요? 
                    또 저는 마진율을 보고 선정하는데 마진율이 명시돼있지않으면 업체랑 직접 연락하는데..
                    고런 부분은 어떻게 하는지 알고싶어요ㅠㅠ
                </div>
                <div>
                    <p>홍길동</p>
                    위탁판매하려면 영상처럼 도매꾹같은곳에 있는 물건을 링크만 가져오면 되나요? 따로 도매업체와 컨택이 없어도 되는건가요?
                </div>
                <div>
                    <p>BTS</p>
                    궁금한게있는데요..생초보자의 경우 위탁 거래처를 확보하지 못한채 프로그램을 사용하고
                     실제 판매가 이뤄지면, 세금계산서 발행방식은 어떻게 처리하는건가요? 그냥 막 긁어와서 판매해도 되는건지 진짜 몰라서 문의드립니다
                </div>
                <div>
                    <p>kwang woong Park</p>
                    이런 프로그램은 처음 봤네요 어쩐지 그많은 정보들을 한사람이 작업해서 올린다는게 
                    쉽지않을거라고 생각했는데 좋은정보 감사합니다. 그런데 그럼 올리는 상품들은 모두 위탁상품 들인건가요?
                </div>
                <div>
                    <p>박한마</p>
                    위탁으로 올리는건데 제가 놓친것같아 질문드리자면, 주문이 들어왔을때 업체관리는 어떻게하나요? 
                    또 저는 마진율을 보고 선정하는데 마진율이 명시돼있지않으면 업체랑 직접 연락하는데..
                    고런 부분은 어떻게 하는지 알고싶어요ㅠㅠ
                </div>
                <div>
                    <p>BTS</p>
                    궁금한게있는데요..생초보자의 경우 위탁 거래처를 확보하지 못한채 프로그램을 사용하고
                     실제 판매가 이뤄지면, 세금계산서 발행방식은 어떻게 처리하는건가요? 그냥 막 긁어와서 판매해도 되는건지 진짜 몰라서 문의드립니다
                </div>
                <div>
                    <p>kwang woong Park</p>
                    이런 프로그램은 처음 봤네요 어쩐지 그많은 정보들을 한사람이 작업해서 올린다는게 
                    쉽지않을거라고 생각했는데 좋은정보 감사합니다. 그런데 그럼 올리는 상품들은 모두 위탁상품 들인건가요?
                </div>
                <div>
                    <p>박한마</p>
                    당신을 위해 기도합니다 
                    이제 깨어날 때입니다 
                    주안에서 평안하길♡^----^♡
                    [뜻하신 그곳에 나 있기 원합니다. 연약한 내 영혼 통하여 일하소서...]
                </div>
                <div>
                    <p>BTS</p>
                    저번 영상 보면서도 느낀거지만..혹시 기사님 고용하셨나요...?
                </div>
                <div>
                    <p>kwang woong Park</p>
                    대박!!!    좋은 정보 정말 감사드립니다.~~매번 많이 배우고 있어요.^^
                </div>                
            </div>
            <ul>
                <li>
                    <a href="#none">
                    <span class="NSK-Black">지금, 사전예약 </span>
                    신청하고 1억 만들기 도전! → 
                    </a>
                </li>
                <li>
                    <a href="#none">
                    <span class="NSK-Black">이미 신청했다면,</span>
                    위탁/사입상품 추천 받기! → 
                    </a>
                </li>
            </ul>
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

        
          /*디데이카운트다운*/
          $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop