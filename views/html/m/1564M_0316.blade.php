@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
        .evtCtnsBox {width:100%; text-align:center; position:relative; font-size:0.867rem}    
        .evtCtnsBox > img {width:100%; max-width:1120px;}
        .evtTop {background:#888687} 
        .evtTop01 {background:#000; color:#fff; text-align:left; padding:2rem 2.5rem} 
        .evtTop01 h4 {font-size:1.2rem; margin-bottom:1rem}
        .evtTop01 li {list-style:disc; margin-left:15px; margin-bottom:0.6rem}
        .evtTop02 {background:#1c1b24} 

        .evtMenu {background:#fff; width:100%; border-bottom:1px solid #edeff0}        
        .tabs {width:100%; max-width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:14px; line-height:1.5; padding:15px 0; color:#999; font-weight:bold; letter-spacing:-1px;}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}             

        .evt01 {background:#fff; padding:100px 0}         
        .evt01 .dday {font-size:0.9rem; position:absolute; top:45%; left:50%; width:100%; margin-left:-50%; text-align:center;}
        .evt01 .dday strong {font-size:1.20rem;}
        .evt01 .dday img {display:inline-block; margin:0 10px; width:30px;
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

        .evt01 .dday span {color:#3a99f0; box-shadow:inset 0 -10px 0 rgba(0,0,0,0.1);}
        
        
        .evt02 {background:#f6f6f6; padding-top:100px}       
        .evt02 .evt02Txt01 {font-size:1.1rem; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#3a99f0}
        .evt02 .evt02Txt01 span {font-size:1.3rem; box-shadow:inset 0 -20px 0 rgba(0,0,0,.1);}
        .evt02_01 {background:url(https://static.willbes.net/public/images/promotion/2020/03/1564_02_01.jpg) repeat-x center top; background-size:cover; padding:2rem; text-align:left}

        .evt03 {background:#fff; padding-top:100px}

        .evt04 {background:#ececec; padding:100px 0 50px}
        .evt04 img {border-bottom:1px solid #e4e4e4;}
        .evt04 h4 {color:#3a99f0; font-size:1.1rem}
        .evt04 .columns {padding:20px;
            column-count: 1;
            column-gap:20px;
        }
        .evt04 .columns div {            
            text-align:justify; font-size:0.875rem; line-height:1.4;
            display:inline-block; 
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:20px; color:#666; background:#fff;
        }
        .evt04 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt04 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}

        .evt05 {background:#3a99f0; padding-bottom:50px}
        .evt05 li {display:inline; float:left; width:50%}
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
        .btnbuy a:hover {background:#3a99f0; 
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
        /* 폰 가로, 태블릿 세로*/
        @@media only all and (min-width: 408px)  {   

        }

        /* 태블릿 세로 */
        @@media only all and (min-width: 768px) {
            .tabs li a {font-size:16px; padding:25px 0;}
            .evt01 .dday {font-size:1.2rem; top:42%;}
            .evt01 .dday strong {font-size:1.75rem;}
            .evt01 .dday img {width:40px;}
            .evt01 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}           
            .evt02 .evt02Txt01 {font-size:1.5rem;}
            .evt02 .evt02Txt01 span {font-size:1.75rem; box-shadow:inset 0 -25px 0 rgba(0,0,0,.1);}
            .video-container-box {width:768px; margin:0 auto; padding:0}
            .evt04 .columns {column-count: 2;}
            .evt05 {padding-bottom:70px}
            .btnbuy br {display:none}
        }

        /* 태블릿 가로, PC */
        @@media only all and (min-width: 1024px) {
            .evt01 .dday {font-size:2.0rem;}
            .evt01 .dday strong {font-size:2.5rem;}
            .evt01 .dday img {width:68px;}
            .evt01 .dday span {box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}            
            .evt02 .evt02Txt01 {font-size:1.75rem;}
            .evt02 .evt02Txt01 span {font-size:2rem; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1);}
            .video-container-box {width:980px; margin:0 auto; padding:0}
            .evt04 .columns {width:980px; margin:0 auto}
            .evt05 ul {width:940px; margin:0 auto;}
            .evt05 li a {font-size:24px;}
            .evt05 {padding-bottom:100px}
        }       
    </style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_top_01.jpg" alt="창업 다마고치" >   
    </div> 
    <div class="evtCtnsBox evtTop01">
       <h4 class="NSK-Black">김정환 대표</h4>
       <ul>
            <li>1억뷰  N잡  창업  대표 강사</li>
            <li>유튜브 창업 다마고치 영상 6개월 누적  조회수 100만뷰 기록</li>
            <li>‘지금 바로 돈 버는 기술’ 저자</li>
            <li>홍익대학교 게임그래픽학과 졸업</li>
            <li>네이버  대표 카페 ‘킵고잉’  공동 운영</li>
            <li>온/오프라인 강의를 통해 많은 신규 창업자를 위한 강의 진행</li>
            <li>3개의 네이버 스마트스토어  및  오픈마켓 (지마켓, 옥션, 11번가) 운영  중</li>
        </ul>   
    </div>
    <div class="evtCtnsBox evtTop02">
        <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_top_02.jpg" alt="창업 다마고치" >   
    </div> 
    
    <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab active">사전예약 이벤트</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">e커머스 강좌소개</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div> 

    <div id="tab01">
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_01.jpg" alt="사전예약 이벤트" >
            <div class="dday NSK-Thin">신청마감 <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_img01.png" alt="시계" ><strong class="NSK-Black"><span>9일 12:00:12</span> 남았습니다.</strong></div>
        </div>
    </div>


    <div id="tab02">
        <div class="evtCtnsBox evt02">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/pgfPkHvbVJs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt02Txt01">
                안녕하세요. <br>
                네이버 스마트스토어를  운영하고 있고,<br>
                유튜브에 저의 창업 성장기를 많은 분들께<br>
                공유하고 있는 <span class="NSK-Black">창업다마고치 김정환</span>입니다. 
            </div>
        </div>  
        <div class="evtCtnsBox evt02_01"> 
            평범한 직장인이었던 제가 <br>
            사업가 친구가 알려주는 코칭을<br>
            그대로 따르기만 했는데도<br>
            다마고치가 자라듯이 <br>
            빠르게 성장할 수 있었고 <br>
            그 과정에서 저만의 방법을 찾기 위한 <br>
            수많은 시도를 거듭했습니다.<br>
            <br>
            앞서 그 길을 간 누군가가 <br>
            자신의 경험을 공유해주고 <br>
            바른 방향을 제시한다면<br>
            그리고 거기에 자신의 열망과 <br>
            노력이 더해진다면, <br>
            창업을 통해 <br>
            소득이 급격히 늘어나는 일이<br> 
            결코 허황된 일이 아니라는 것을 <br>
            저는 체험했습니다.<br>
            <br>
            저는 그동안 유튜브 채널과 <br>
            저의 책을 통해 매출 0원부터 <br>
            9천만원에 이르기까지 <br>
            저의 성장기를 가감없이 보여드렸고<br>
            이제는 강의를 통해서 제가 갔던 길을 <br>
            누구나 쉽게 따라 오실 수 있도록<br>
            도와드리려 합니다.<br>
        </div>
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_01.jpg" alt="e커머스 강좌소개" >

            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/_yVIa13RFW8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_02.jpg" alt="e커머스 강좌소개" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_03.jpg" alt="e커머스 강좌소개" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_03_04.jpg" alt="e커머스 강좌소개" ><br>
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_04_01.png" alt="BEST 수강후기" >
            <div class="columns">
                <div>
                    <h4>지금 바로 시작하게 만드는 다마고치님의 강의! </h4>
                    <p>보라도리(shin****)</p>
                    가장 좋았던 것은 역시나 실행하는 모습이란 어떤 것인지 몸소 보여준 창업 다마고치님의 밀도 높은 강의 내용과
                    실제로 경험했기에 전달 가능한 알고 실행하면 엄청난 이익금이 창출되는 팁들의 대방출 이었습니다.<br>
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
                    만약 창업다마고치님의 강의를 모르고 지나갔거나 20만원이 아까워 강의신청을 하지 않았더라면
                    전 아직까지 매출없는 스마트스토어를 운영하면서 전전긍긍했을겁니다. 아니 어쩌면 포기했을수도 있습니다.
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
                    확실한 건 다마고치님 강의 내용을 듣고 실행한다면 20만원 아닌 200만원 이상의 가치가 있을거라는거! 
                </div>  
                <div>
                    <h4>다마고치님 강의 아쉬움을 느꼈던 이유</h4>
                    <p>해피(sam5****)</p>
                    좀더 일찍 강의를 들었더라면 시간을 허비하지 않았을텐데 하는 아쉬움을 느꼈습니다.<br>
                    강의를 들으면서 내가 뭘 모르는지도 몰랐던 부분을 알게된 것과
                    수많은 다른 강의를 들으면서 그냥 머릿속에 떠다니기만해 답답해 하던 것들
                    ‘그렇게 하세요’, ‘그래서 어쩌라고’하며 속상해 울상지었던 것들에 대해
                    어느 강의에서도 들어보지 못알만큼 현실적이고 실천가능한 방법으로 알려주시는
                    강의 내용에 놀라면서도 감사했습니다.<br>
                    감의비는 20만원 이었지만 이것을 100배 1,000배로 만들 수 있겠다는 생각이 들었습니다! 
                </div> 
                <div>
                    <h4>이 강의가 20만원이나해?</h4>
                    <p>SCV 출동 준비완료(suga****)</p>
                    요즘은 온라인 쇼핑몰 관련 강의도 많고 들어간 비용에 비해 내용이 부실한 경우가 많아
                    처음 강의를 듣기전에는 도대체 어떤 강의이기에 20만원씩이나해? 이런 생각을 했습니다.
                    강의를 다 듣고 나서는 이건 20만원에 해주셔서 감사해야 하는 강의라는 걸 깨달았습니다. ^^<br>
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
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1564_04_02.jpg" alt="BEST 수강후기" >
            <ul>
                <li>
                    <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/162748" target="_blank">
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

    <div class="btnbuy NSK-Black">        
        <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/162748" target="_blank"><span class="NSK">미리 신청하면 24%할인!</span><br>
        사전예약 신청하기 ></a>
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
</script>
@stop