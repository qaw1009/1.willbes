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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .skyBanner {position:fixed; width:150px; top:200px; right:10px; z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/06/2681_top_bg.jpg) no-repeat center top;} 
      
        .evt01 {background:#000;} 
        .evt02 {padding-bottom:150px} 
        .evt02 .tabs {width:860px; margin:0 auto; display:flex}		
        .evt02 .tabs li {width:50%; text-align:center}
        .evt02 .tabs li a {color:#adadad; font-size:26px; border:1px solid #d2d2d2; border-radius:10px; padding:20px 0; text-align:center; display:block; letter-spacing:-2px}
        .evt02 .tabs li a:hover,
        .evt02 .tabs li a.active {color:#fff; border-color:#2784d2; background:#2784d2}
        .evt02 .tabs li:nth-child(1) {margin-right:10px}

        .evt02 .youtubeBox {width:860px; margin:50px auto 0;}
        .evt02 .youtube iframe {width:860px; height:484px;}
        .evt02 .youtubeTxt {font-size:20px; line-height:1.4; font-weight:bold; margin-top:20px} 
        .evt02 .youtubeTxt strong {color:#2784d2; font-size:30px}

        /*슬라이드*/
        .evt02 .slide_con {position:relative; width:860px; margin:40px auto 0;}
        .slidesImg {}
        .slide_con > p {position:absolute; top:50%; margin-top:-45px; width:39px; height:97px; z-index:90}
        .slide_con > p a {cursor:pointer}
        .slide_con > p.leftBtn {left:-40px;}
        .slide_con > p.rightBtn {right:0;}

        .passReivew {font-size:14px; width:860px; margin:0 auto; text-align:left; line-height:1.4}
        .passReivew h5 {background:#2784d2; color:#fff; padding:20px 30px; border-radius:10px 10px 0 0; font-size:22px}
        .passReivew h5 strong {color:#f7ec1e}
        .passReivew .review {border:1px solid #2784d2;  padding:20px 30px; border-radius:0 0 10px 10px}
        .passReivew p {font-size:30px; color:#2784d2; margin-bottom:20px}
        .passReivew .review div {padding-bottom:20px; margin-bottom:20px; border-bottom:1px solid #d7d7d7}
        .passReivew .review div:last-child {border:0; margin:0; padding:0}

        .btnLink {width:600px; margin:100px auto 0}
        .btnLink a {display:block; background:#000; color:#fff; font-size:36px; padding:25px 0; border-radius:50px}
        .btnLink a strong {color:#00ffff}
        .btnLink a:hover {background:#333;}

        .evt03 {background:#f9f9f9; padding-bottom:150px}
        .evt03 .wrap{width:1040px; margin:0 auto;}

        .evt03 .tabBig {display:flex; border-bottom:3px solid #2784d2}
        .evt03 .tabBig li { width:calc(25% - 4px); margin-right:4px}
        .evt03 .tabBig li:last-child {width:25%; margin-right:0}
        .evt03 .tabBig li a {color:#8b8b8b; font-size:26px; border-radius:6px 6px 0 0; padding:20px 0; text-align:center; display:block; letter-spacing:-2px; background:#e0e0e0}
        .evt03 .tabBig li a.active,
        .evt03 .tabBig li a:hover {color:#fff; background:#2784d2}

        .evt03 .tabSm {margin-top:20px; display:flex; justify-content: center; }
        .evt03 .tabSm li {margin:0 30px}         
        .evt03 .tabSm li a {display:block; font-size:30px; padding:15px 0; text-align:center;}
        .evt03 .tabSm li a span {border-bottom:3px solid #cfcfcf; color:#cfcfcf; }
        .evt03 .tabSm li a.active span,
        .evt03 .tabSm li a:hover span {border-bottom:3px solid #2784d2; color:#2784d2}

        .evt03 p {margin-top:20px; display:block; font-size:16px; border:3px solid #4b67d7; color:#4b67d7; padding:15px 0; text-align:center;}

        .lecReview {font-size:14px; margin:0 auto; text-align:left; line-height:1.4; background:#fff url(https://static.willbes.net/public/images/promotion/2022/06/2681_icon_m.png) no-repeat 50px 50px; border:1px solid #d2d2d2; border-radius:6px; padding:50px}
        .lecReview.typeW {background-image:url(https://static.willbes.net/public/images/promotion/2022/06/2681_icon_w.png);}
        .lecReview div {margin-left:150px; font-size:22px; margin-bottom:10px}
        .lecReview div strong {font-size:28px; color:#2784d2}
        .lecReview h5 {margin-left:150px; font-size:36px; letter-spacing:-2px; margin-bottom:40px}
        .evt03 .slide_con {position:relative; margin:30px auto 0;}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        {{--
        <div class="skyBanner">
            <a href="https://police.willbes.net/promotion/index/cate/3010/code/2177" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/06/2681_sky01.jpg" alt="문제풀이 풀패키지"></a>
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2164" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/06/2681_sky02.jpg" alt="문제풀이 풀패키지"></a>
        </div> 
        --}}     

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2681_top.jpg" alt="고득점 합격이야기" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2681_01_01.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2681_01.jpg" alt="" />
            <ul class="tabs">
                <li><a href="#tab1">영상으로 보는 고득점 인터뷰</a></li>
                <li><a href="#tab2">과목별 고득점 수기</a></li>
            </ul>
            <div id="tab1">
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/PHsCoF9Uey4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="youtubeTxt">
                        2022년 1차 <strong>3법 240점!</strong> (원점수 환산점 96점)<br>
                        경기남부청 엄*룡
                    </div>
                </div>
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/O_GHIPZdvvY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="youtubeTxt">
                        2022년 1차 <strong>3법 237.5점!</strong> (원점수 환산점 95점)<br>
                        서울청 김*지
                    </div>
                </div>
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/S-48kW58T2M?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="youtubeTxt">
                        2022년 1차 <strong>3법 235점! 경찰학 100점!</strong><br>
                        서울청 권*재
                    </div>
                </div>
                <div class="btnLink">
                    <a href="https://www.youtube.com/playlist?list=PLl65lsiDN8NOR78sIh792GSrnfV_Zl_f8" target="_blank">더 많은 <strong>고득점 영상</strong>  바로가기 ></a>
                </div>
            </div>
            <div id="tab2">
                <div class="slide_con">
                    <div id="slidesImg">
                        <div class="passReivew">
                            <h5 class="NSK-Black">3법 240점 (원점수 환산점 96점) <strong>경기남부청 엄*룡</strong></h5>
                            <div class="review">
                                <div>
                                    <p class="NSK-Black">형사법 97.5점</p>
                                    신광은 교수님의 형법 강의는 이해를 중점을 두고 가르쳐 주셔서 정말 도움이 되었습니다. 특히 총론의 학설에서
                                    빛을 발합니다. 이해가 되지 않아도 반복해서 듣다 보면 자연스럽게 이해됩니다. <br>
                                    형소법 또한 교수님을 전적으로 믿고 가셔도 되고, 교수님께서 시키시는 것 하면 됩니다.<br> 
                                    그리고 문제풀이 2단계 동형 모의고사를 추천합니다. 교수님의 모든 커리큘럼의 정수라고 생각합니다. 
                                    전 범위 모의고사를 반복하면서 약점을 찾을 수 있습니다. 
                                </div>
                                <div>
                                    <p class="NSK-Black">경찰학 95점</p>           
                                    점수를 잘 받을 수 있었던 이유는 교수님 강의와 교재 덕분이라고 생각합니다. <br>
                                    경찰학은 그 특성상 중요한 부분과 중요하지 않은 부분들이 섞여 있고 수험생 스스로 판단하기가 어렵지만, 정확한 분석으로 장정훈 교수님께서 잘 정리해 주셨습니다. <br>
                                    커리큘럼만 충실하게 따라가도 70~80점은 기본적으로 받을 수 있습니다. 
                                </div>
                                <div>
                                    <p class="NSK-Black">헌법(이) 47.5점</p>
                                    기본강의를 2번 들은 후 모의고사나 기출문제집에서 틀린 적이 거의 없었습니다. <br>
                                    물론 2단계도 필수적으로 해야 하지만, 기본 완성 강의에서 정말 많은 부분을 완성시켜 주셨기 때문에 기본강의를 잘 듣는 것을 추천합니다.
                                </div>
                            </div>
                        </div>
                        <div class="passReivew">
                            <h5 class="NSK-Black">3법 237.5점! (원점수 환산점 95점) <strong>서울청 김*지</strong></h5>
                            <div class="review">
                                <div>
                                    <p class="NSK-Black">형사법 95점</p>
                                    형법은 신교수님께서 말씀하듯 기본기가 중요한 과목입니다. <br>
                                    교수님의 두문자만 제대로 숙지해도 형법의 반은 한 것입니다. 두문자는 사랑입니다. 전부 외우면 문제 푸는 속도와 응용 능력 자체가 달라집니다! 신교수님의 두문자와 초등학생도 이해시켜 주시는 설명으로 어렵지 않게 공부했습니다. <br>
                                    형소법은 수업을 들으면 저절로 이해되기에 이미 단권화 되어있는 신 교수님 기본서 회독을 최대한 많이 하길 추천합니다.
                                </div>
                                <div>
                                    <p class="NSK-Black">경찰학 92.5점</p>           
                                    경찰학은 기본서를 보면서 기출문제집을 같이 풀어야 합니다. 문제가 어떤 식으로 나오고 어느 부분을 틀리게 하는지를 알아야 합니다.<br>
                                    처음에 경찰학 공부할 때 그날 배운 부분을 복습하고 기출문제집을 풀었습니다. 기본서를 충분히 반복해서 보고 나서 기출로 들어가야 합니다.<br>
                                    시험 한 달 전에 문제풀이에 집중했고 틈틈이 네친구를 회독했습니다. 문제풀이를 하면서 새로 알게 된 것들은 네친구에 단권화 작업을 했습니다
                                </div>
                                <div>
                                    <p class="NSK-Black">헌법(이) 50점</p>
                                    모의고사든, 기출문제집이든 교수님께서 하라는 대로만 했더니 항상 고득점이 나왔습니다. <br>
                                    암기할 부분은 암기가 쏙쏙 되도록  두문자와 방법들을 다 만들어 주셨고, 최신판례도 다른 학원 사람들은 합헌까지 배울 때 저희는 위헌만 딱 제대로 배우고 나머지는 합헌으로 푸는 전략을 가졌고, 역시나 시험장에서 처음 보는 판례는 합헌으로 풀고 헌법 만점을 받을 수 있었습니다. 
                                </div>
                            </div>
                        </div>
                        <div class="passReivew">
                            <h5 class="NSK-Black">3법 235점! (원점수 환산점 94점) 경찰학 100점!<strong>서울청 권*재</strong></h5>
                            <div class="review">
                                <div>
                                    <p class="NSK-Black">형사법 90점</p>
                                    형법은 교수님이 강조하셨듯 원칙을 지키려고 계속 노력했습니다. 틀을 잡아서 틀에 맞는 판례들은 외울 필요 없이 틀에 따라 해결하고, 어긋나는 판례들만 따로 암기를 해주는 방식으로 하려고 노력했어요. 그리고 개인적으로 재산범죄가 어려웠지만 교수님이 강의로 전부 해결해 주셨습니다.<br>
                                    형소법도 교수님이 설명해주시는 순서를 그대로 따라가시면 서 복습만 잘 해도 형소법은 부담 없이 점수 받고 들어가는 과목이 아닐까 합니다.
                                </div>
                                <div>
                                    <p class="NSK-Black">경찰학 100점</p>           
                                    교수님 말씀대로 경찰학은 커리큘럼 따라 가면서 매일매일 따로 시간을 내어 공부했습니다. 그리고 특히 시간 내어 공부하는 것 외에도 밥먹는 시간이나 운동하는 시간 같은 짬짬이 시간에 유튜브 1일 1제를 들었습니다. 4순환 이상 들은 것 같습니다. <br>
                                    유튜브 강의를 보면 매일 변함없이 밝은 모습으로 강의하시는 교수님이 서서 저는 다른 유튜브 동영상보다 재미있었습니다. 힘이 빠진 날에도, 교수님의 한결같으신 모습에 많은 위로를 받았습니다.
                                </div>
                                <div>
                                    <p class="NSK-Black">헌법(김) 45점</p>
                                    기본적으로 교수님 커리큘럼을 다 따랐습니다. 김원욱 교수님의 최대 장점은 판례들의 포인트를 잡아 주셔서 공부 할 양을최소화 시켜 주십니다. 덕분에 형사법과 경찰학에 조금 더 시간을 투자할 수 있었던 것 같습니다.<br>
                                    핵지총이라는 교재가 개인적으로 잘 맞아서 핵지총을 기본서보다 애용했습니다. 핵지총을 주로 보면서 어려운 파트를 기본서에서 회독하는 방식으로 공부했습니다.
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2022/04/2594_left.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2022/04/2594_right.png"></a></p>
                </div>
                <div class="btnLink">
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=326506" target="_blank">더 많은 <strong>고득점 수기</strong> 바로가기 ></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2681_02.jpg" alt="" />
            <div class="wrap">
                <ul class="tabBig">
                    <li><a href="#tabBig01">형사소송법 신광은</a></li>
                    <li><a href="#tabBig02">경찰학 장정훈</a></li>
                    <li><a href="#tabBig03">헌법 김원욱</a></li>
                    <li><a href="#tabBig04">헌법 이국령</a></li>
                </ul>

                <div id="tabBig01">
                    <ul class="tabSm">
                        <li><a href="#tabSm01"><span>기출문제집 덕분에</span></a></li>
                        <li><a href="#tabSm02"><span>문제풀이 덕분에</span></a></li>
                        <li><a href="#tabSm03"><span>커리큘럼 덕분에</span></a></li>
                    </ul>

                    <div class="slide_con" id="tabSm01">
                        <div id="slidesImg1">
                            <div class="lecReview">
                                <div><strong>형사법 100점</strong> 서울청 노*윤</div>
                                <h5 class="NSK-Black">[형법은 ox문제집 반복 회독 덕분에 100점!]</h5>
                                신광은 교수님 수업 말씀을 하나도 놓치지 않으려 노력했습니다. <br><br>
                                그렇게 마음먹었던 이유는 교수님께서 "수업 시간에 한 것만 제대로 해도 수석을 한다."라고 말씀해 주셨던 게 제 머리에 각인이 된 것 같습니다. 
                                수업 중 책에 있는 내용들은 알 수 있도록 체크만 해  두었고,  교수님이 강조하시는 부분인데 기출화 되어 있지 않은 그런 부분 노트에 적어와 컴퓨터에 입력한 뒤 일요일마다 까먹지 않으려고 했고, 그리고 하루에 교수님 OX문제집은 200페이지씩 풀었던 것 같습니다. <br><br>
                                또한, 학설은 정확하게 이해가 가도록 강의해 주셔서 어떠한 학설이 나와도 두렵지 않았습니다. 여기까지 만점을 받을 수 있었던 비결이었습니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>형사법 92.5점</strong> 인천청 김*훈 </div>
                                <h5 class="NSK-Black">[OX 문제집이 Real 신의 한수였다!]</h5>
                                이제는 시험 지문이 예전처럼 기출 지문 ctrl +c, ctrl+v가 아니라 각 해당 범죄 성립요건부터 보호법익이 개인인지 국가인지 사회인지 정확한 개념을 알고 있어야 그리고 그 개념을 지문에 녹여내서 해결해야 하는 시험이 된 것 같아요.<br><br>
                                그래서 더욱 신광은 교수님으로 시작과 끝을 내야 한다고 생각합니다. 신 교수님 기출문제집은 그냥 ox가 아니라 해당 지문 중에 논점이 되는 부분을 괄호형으로 만드셔서 ex) 7세. 3세인 아들을 죽인 아버지 판례 (위계에 의한 살인죄/자살교사죄/살인죄)가 성립한다. 이런 식으로 한 번 더 생각하게 만드는 지문들로 공부하다 보니 단순 암기식 공부보다 이해식 공부가 되어서 이번 시험 형사법 체감 난도 높았지만 잘 해결할 수 있었습니다. 신광은 형사법 강력 추천합니다. 
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm02">
                        <div id="slidesImg2">
                            <div class="lecReview">
                                <div><strong>형사법 97.5점</strong> 경기남부청 엄*룡 </div>
                                <h5 class="NSK-Black">[문제풀이 2단계 동형 전범위 모의고사로 고득점 완성!]</h5>
                                먼저 기본이론 강의들을 빠짐없이 들었고, 기초를 탄탄하게 하는 게 중요합니다. 
                                신광은 교수님은 이해를 최고 목표로 수업하시기 때문에, 기초 단계를 지나면 문제집의 70% 정도는 이해를 바탕으로 풀리게 됩니다. 이후 기출문제집을 계속 반복해서 풀면서 이해가 안 된 부분, 암기가 덜된 부분을 찾았습니다. <br>
                                <br>
                                기출문제집을 10회독 이상 할 즈음 마무리 강의인 문제풀이 1+2+3단계가 시작하는데 문제풀이 2단계 동형 전범위 모의고사는 무조건 풀어야 합니다. 
                                문제풀이 2단계 동형 전범위 모의고사를 통해 부족한 부분을 채우면서 마지막까지 기출을 함께 회독하면 형사법 고득점이 충분히 가능합니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>형사법 95점</strong> 서울청 이*섭</div>
                                <h5 class="NSK-Black">[2단계 동형 전범위 모의고사로 박스형 문제 완벽 대비!]</h5>
                                교수님의 문제풀이 2, 3단계 수업이 정말 많이 도움 되었어요. 
                                특히 교수님께서 문제풀이 2단계 동형 전범위 모의고사에서 박스형 개수 문제를 많이 내주셔서 헷갈리는 지문을 꼼꼼히 확인할 수 있었고, 개수형에 단련된 덕분에 실제 시험에서 시간 조절할 수 있었어요.<br>
                                <br>
                                추가로 신광은 교수님의 유튜브 형사법 1일 1제도 추천합니다. 추상적이고 헷갈리던 총론 학설, 각론 판례들을 다시 숙지할 수 있었고 10분 이내의 동영상들은 학원 쉬는 시간에도 틈틈이 볼 수 있었습니다. 바쁜 와중에도 신광은 형사법 유튜브 1일 1제까지 찍어 주신 덕분에 제가 필기 합격할 수 있었던 거 같습니다.
                            </div>
                            <div class="lecReview typeW">
                                <div><strong>형사법 95점</strong> 울산청 이*지</div>
                                <h5 class="NSK-Black">[합격을 위해서는 문제풀이 1·2·3단계는 필수입니다.]</h5>
                                저는 형사법 점수가 그리 높은 편이 아니어서 일단 신광은 교수님 수업을 들으면서 말씀해 주신 두문자는 전부 외우고 가자고 생각하면서 공부했고, 기본서에 하트가 붙은 것 위주로 반복해서 읽었습니다. 그리고 심화기출 강의 때 o,x문제들만 모아 놓은 문제집으로 틀린 걸 체크하면서 2번 더 자세히 봤습니다.<br>
                                <br>
                                형사법은 세 과목 중 가장 방대한 양을 가지고 있지만, 기본반 때 너무 욕심부리지 말고 기초를 잘 닦아 놓고 심화를 거쳐 문제풀이 1단계와 문제풀이 2단계 동형 전범위 모의고사를 통해서 빛이 납니다. <br>
                                <br>
                                절대 욕심부리지 말고 기초는 지금 보고 다시 안본 다는 생각으로 잘 쌓는 게 중요한 것 같습니다.
                            </div>
                            <div class="lecReview typeW">
                                <div><strong>형사법 92.5점</strong> 전북청 유*연</div>
                                <h5 class="NSK-Black">[2단계 동형 전범위 모의고사로 박스형 문제 완벽 대비!]</h5>
                                저는 커리큘럼을 따라가면서 신광은 교수님 강의는 역시 누구도 따라올 수 없다는 생각이 가장 많이 들었습니다! 정말 누구보다 열정적이시고 항상 학생들에게 좋은 강의를 해주시려는 모습이 정말 감사했어요. 신교수님이 하라는 대로 믿고 끝까지 포기하지 않고 따라온 결과 짧은 기간에 이렇게 좋은 점수 받은 거 같아서 정말 감사합니다.<br>
                                <br>
                                학설도 정말 꼼꼼히 설명해 주시고 이젠 학설이 제일 재밌고 좋습니다!!! <br>
                                <br>
                                신광은 형사법 유튜브 1일 1제나 신광은 형법 하프 모의고사 영상들도 추가로 볼 수 있어서 정말 도움이 되었고, 문제풀이 1~3단계까지 하면서 점수에 연연하지 말고 실제 시험에서 잘 보면 된다고 말씀해 주시면서 응원해 주셨는데 저 또한 문제풀이 1·2·3단계에선 점수가 별로 좋지 않아서 자책도 많이 하고 했지만, 결국에는 약점들을 보완하고 고득점을 취득할 수 있었습니다. 저는 문제풀이 1~3단계 강력 추천합니다!!!!! 
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm03">
                        <div id="slidesImg3">
                            <div class="lecReview typeW">
                                <div><strong>형사법 95점</strong> 서울청 민ㅇ이</div>
                                <h5 class="NSK-Black">[문제풀이 2단계 동형 전범위 모의고사로 고득점 완성!]</h5>
                                형사법은 기본기가 굉장히 중요한 과목이라고 생각합니다. 기본에서 심화, 심화에서 1단계, 1단계에서 2단계로 넘어갈수록 암기했던 내용이 이해되고, 이미 알고 있던 내용도 쉽게 이해할 수 있었습니다. <br>
                                <br>
                                형법에서 나오는 많은 학설들은 암기만으로 한계가 있다고 느꼈는데 이해를 기반으로 공부하니 생소한 문제도 쉽게 풀 수 있었습니다. 그리고 O,X 문제집도 아주 큰 도움이 되었습니다. <br>
                                <br>
                                강의를 통해 기본기를 쌓고 시험이 다가올수록 문제를 풀어보며 모르는 내용, 지문을 찾아서 집중적으로 공부했던 점이 형사법에서 고득점을 받게 해줄 수 있었습니다.
                            </div>
                            <div class="lecReview typeW">
                                <div><strong>형사법 92.5점</strong> 서울청 이*임</div>
                                <h5 class="NSK-Black">[기본에 충실한 신광은 형사법이 고득점의 지름길!]</h5>
                                형사법은 기본이 전부입니다. 기본만 철저히 또 완벽하게 이해하시면 아무리 어려운 이론을 배워도 금방 이해가 됩니다. 중요한 기본을 신광은 교수님이 아주 쉽게 이해시켜 주십니다. 수업만 잘 듣고, 모르는 건 바로바로 질문하며 따라가면 형사법으로 고민하는 일은 없을 것입니다. <br>
                                <br>
                                신교수님은, 이론들은 체계적으로 아주 쉽게 이해시켜 주시고 암기는 아주 간단하고 기억에 잘 남는 두문자를 이용하시기 때문에 수업 때 이것들을 머리에 잘 넣어두고 있다가, 문제풀이 때 이 지식들을 활용해서 문제를 푸는 능력을 키우시면 됩니다. <br>
                                <br>
                                신교수님 수업을 듣고 배운 이론들을 총동원하여 어려운 문제가 풀렸을 때의 희열을 여러분들도 꼭 느껴보셨으면 좋겠습니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>형사법 92.5점</strong> 전북청 구*회</div>
                                <h5 class="NSK-Black">[기본에 충실한 신광은 형사법이 고득점의 지름길!]</h5>
                                저는 교수님의 강의 방식 중에서 이해를 기반으로 기본 틀을 제대로 잡는 것과 두문자로 암기할 부분을 보완하는 것이 큰 도움이 됐습니다.<br>
                                <br>
                                형사법 공부를 하다 보면 판례만 나와도 어려운데…… 학설까지 나오면서 더 어렵게 느껴지기도 합니다. 하지만 신광은 교수님이 어려운 학설이나 증거법칙 때 강의하시면서 말씀하시는데 한 가지 사례를 기억하고 그 사례에 대입해 보면서 공부하시다 보면 지문에서 물어보는 게 어느 학설인지 바로 깨닫게 되는 날이 옵니다! <br><br>
                                정말 공부하는 사람들이 모두 어렵고 힘들어하는 부분을 신광은 선생님이 알려주시는 대표적 사례나 자신이 기억하기 쉬운 사례로 대입해 보면서 공부하는 법을 추천드립니다!
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tabBig02">
                    <ul class="tabSm">
                        <li><a href="#tabSm04"><span>커리큘럼 덕분에</span></a></li>
                        <li><a href="#tabSm05"><span>문제풀이 덕분에</span></a></li>
                        <li><a href="#tabSm06"><span>"네친구", "기출문제집" 덕분에</span></a></li>
                    </ul>

                    <div class="slide_con" id="tabSm04">
                        <div id="slidesImg4">
                            <div class="lecReview">
                                <div><strong>경찰학 100점</strong> 서울청 권*재</div>
                                <h5 class="NSK-Black">[장정훈 교수님이 체크해 주신 것만 봐서 100점]</h5>
                                저는 기본 이론 -> 심화이론 -> 심화기출 -> 문제풀이 1~3단계 문제풀이까지 순서대로 전부 수강했습니다. <br><br>
                                장정훈 교수님이 언급해 주시는 부분들 모두 체크해 놓았다가 중요도를 나누지 않고 공평하게 최대한 하나하나 보수적으로 공부했습니다. <br><br>
                                개편 후 첫 시험이기도 한 만큼 수업을 따라가면서 꼼꼼하게 버리는 파트 없이 준비했던 게 고득점을 받을 수 있었던 이유인 것 같습니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>경찰학 95점 </strong> 서울청 권*빈</div>
                                <h5 class="NSK-Black">[OX 문제집이 Real 신의 한수였다!]</h5>
                                개편 전에도 어떤 것이 튀어나올지 예측 불가능한 경찰학이라고 들었는데, 개편 후에는 더욱 범위를 종잡을 수 없어 교수님께서 광범위하게 커버해 주신 덕에 강의 외에 따로 공부를 안 한 저에게는 오히려 굉장한 시너지 효과였습니다.<br><br>
                                장교수님 커리큘럼 따라가면서 이해 위주로 진행하시는  교수님 수업만 충실히 수강하다 보면 시험날 귓가에 맴도는 목소리를 따라가 답 체크를 하면 그것이 답이었습니다.
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm05">
                        <div id="slidesImg5">
                            <div class="lecReview">
                                <div><strong>경찰학 95점 </strong> 경기남부청 엄*룡</div>
                                <h5 class="NSK-Black">[문제풀이 2단계 동형 전범위 모의고사로 고득점 완성!]</h5>
                                경찰학은 암기과목의 성격이 강하지만, 이해를 바탕으로 하면 암기 또한 편해집니다. 
                                기본이론 강의 당시에는 무조건 암기보다는 내용과 친숙해지는 데 중점을 두어야 합니다. 
                                예를 들면 대륙법계 경찰학의 발전과정을 시민의식의 향상에 따라 경찰권이 점점 약해지는 과정이라는 것을 이해하면 자연스럽게 흐름이 보이게 됩니다. 
                                <br><br>
                                기본이론 단계가 끝나면 기출문제집을 또한 회독한다. 경찰학은 주로 기출을 바탕으로 나오기 때문에 경찰학 기출만 마스터해도 경찰학 때문에 불합격하진 않습니다. 
                                <br><br>
                                새로 들어오는 법령과 미기출된 부분은 교수님께서 수업 중이나 문제풀이 2단계 동형 전범위 모의고사 등에서 보완 해줍니다. 때문에 경찰학 역시 문제풀이 1단계를 거쳐서 2단계 전범위 모의고사만큼은 꼭 풀어보고 적어도 틀린 문제는 그대로 외워서라도 내용을 숙지해야 합니다.
                            </div>
                            <div class="lecReview typeW">
                                <div><strong>경찰학 95점 </strong> 경기남부청 오*화</div>
                                <h5 class="NSK-Black">[출제경향 정확히 예측! 문제풀이 과정을 통해 고득점 완성!]</h5>
                                저는 경찰학을 항상 공부할 때만 점수가 잘 나오고 막상 시험 보면 매번 색다른 문제가 많이 나와 점수를 잘 받은 적이 거의 없었습니다. 
                                <br><br>
                                또한, 이번엔 개정 후 첫 시험이라 어떻게 문제가 나올지 몰라 장정훈 교수님께서 해주신 영역까지 넓게 공부를 했고 예전과 다르게 최근엔 원래 바꾸던 부분의 단어만 바꾸지 않고, 지문에서 맞는 부분이라 생각하고 훑던 부분도 단어를 바꿔내는 경향이 보여서 지문 전체를 다 집중해서 공부했습니다. 
                                그리고 경찰학은 역시나 문제를 많이 풀면 풀수록 지문에서 틀린 부분이 눈에 들어옵니다. <br><br>
                                문제풀이 1~3단계 이후 품격 있는 모의고사 15회 분량 책을 사서 마지막 3일 동안 하루 5개씩 풀었습니다. 그랬더니 이번엔 경찰학이 효자 과목이 됐네요~ 노력은 절대 배신하지 않고 도와줍니다! 파이팅!!
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm06">
                        <div id="slidesImg6">
                            <div class="lecReview typeW">
                                <div><strong>경찰학 95점 </strong> 경기남부청 유ㅇ연</div>
                                <h5 class="NSK-Black">[네친구와 기출문제집 반복으로 경찰학 해결!]</h5>
                                저는 3법 중에서 가장 자신 없는 과목이 경찰학이었는데요. 암기를 정말 안 좋아하는 저는 경찰학을 제대로 암기한지는 약 3개월밖에 지나지 않았는데 이번 시험에서 제일 높은 점수를 받아서 정말 뿌듯하고 끝까지 교수님 수업 들으면서 응원받고 열정적으로 수업해 주신 모습에 저도 더 힘내서 할 수 있었어요!!! 
                                <br><br>
                                장정훈 교수님께서 기출문제 정말 꼼꼼히 다 해설해 주시고 이번 좋은 점수를 받게 해주신 거 같아서 정말 감사드립니다! 
                                <br><br>
                                저는 장정훈 교수님의 네 친구와 기출문제집 교재를 진심으로 추천합니다. 약 3개월간 네 친구 교재로만 다 암기를 했고, 기출문제집을 여러번 회독해서 이번에는 좋은 점수를 받은 거 같아요!
                            </div>
                            <div class="lecReview">
                                <div><strong>경찰학 95점 </strong> 제주청) 강*웅</div>
                                <h5 class="NSK-Black">[교수님이 강조한 부분을 확실하게 이해하고 암기하면 합격]</h5>
                                경찰학은 양도 많긴 하지만 어디서 나올지 아무도 예측하기 힘들고, 가장 지엽적으로 나오기 쉬운 과목입니다. 그렇기 때문에 천천히 이해하면서 회독을 늘리되, 장정훈 교수님이 강조하신 부분을 잘 보셔서 지엽적인 걸 틀리더라도, 필수적이고 중요하고 배운 부분을 확실하게 잡고 가는 게 중요합니다. 
                                <br><br>
                                그리고 어렵다는 행정법은 걱정하지 마시고 이론 부분은 장정훈 교수님의 수업을 잘 들으시면 금방 이해가 가고, 학생들은 네친구로 복습 위주로 착실하게 공부하는 게 고득점이 지름길이라 생각합니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>경찰학 92.5점 </strong> 경기남부청 장*복 </div>
                                <h5 class="NSK-Black">[네친구를 꾸준한 반복, 장쌤의 두문자 덕분에 고득점!]</h5>
                                장정훈 교수님께서 경찰학은 매일 공통과목처럼 조금씩 하라는 말씀을 듣고, 바로 실천에 옮겨 하루에 세 ~ 네시간은 무조건 경찰학 공부를 했습니다. 
                                <br><br>
                                1~3단계 전까지는 기본서와 기출문제집을 반복하여 회독하였고, 시험 전에는 네친구와 기출을 반복 회독했습니다. 
                                <br><br>
                                경찰학은 휘발성이 강한 과목이라, 늘 첫 장부터 끝장까지 한 줄 한 줄 빼지 않고 회독했던 것 같습니다. 교수님의 노하우가 가득 담긴 두문자가 굉장한 도움이 되었던 것 같습니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>경찰학 92.5점 </strong> 충남청 이*제</div>
                                <h5 class="NSK-Black">[네친구로 단권화 후 빠른 회독 덕분에 고득점!]</h5>
                                단순하게 윌비스 커리큘럼 그대로 수강하면서 경찰학은 모르는 지문이나 틀렸던 지문들 옆에 체크하여 네친구에 표시하여 반복적으로 회독을 한 것이 고득점 비결이었던 거 같습니다.
                                <br><br>
                                경찰학은 휘발성이 강하다 생각하여 10일 주기로 매일 오전에 1일 차 땐 뒷 번호가 1번인 문제 2일 차 땐 뒷 번호가 2번인 문제를 풀어 매일 전범위를 볼 수 있게 하여 10일에 기출 1회독을 할 수 있게 하였고 모르는 지문이나 틀렸던 지문들 옆에 체크하고, 네 친구에 표시하여 네 친구를 표시된 부분 위주로 빠르게 반복적으로 회독을 한 것이 고득점 비결이었던 거 같습니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>경찰학 92.5점 </strong> 경북청 이*진</div>
                                <h5 class="NSK-Black">[‘티끌 모아 태산’ 경찰학 1일 1제가 도움이 많이 되었다.]</h5>
                                저는 경찰학을 그렇게 잘 하는 편이 아니라서 제일 걱정을 한 과목이었습니다. 경찰학 공부는 하루에 조금씩이라도 봐주는 게 가장 좋을 거 같아서 학원에서 집까지 걸어갈 때 20-30분 1일 1제 영상을 유튜브에서 매일 봐준 것이 큰 도움이 된 거 같습니다. 
                                <br><br>
                                특히 이번 시험이 행정학으로 바뀌면서 처음 배우는 부분이 너무 많아 어려웠지만, 심화 2번 정도 듣고 혼자 하루에 30p씩만 보다 보니까 행정학이 어렵지 않게 들리더라고요! 그래서 문제풀이 2단계 동형 전범위 모의고사 때 행정학 비중을 높게 두어도 고득점을 받을 수 있었습니다. 
                                <br><br>
                                장정훈 교수님 커리만 잘 따라간다면 문제없이 필기 합격할 것이라고 생각합니다.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tabBig03">
                    <ul class="tabSm">
                        <li><a href="#tabSm07"><span>기출문제집 덕분에</span></a></li>
                        <li><a href="#tabSm08"><span>문제풀이 덕분에</span></a></li>
                        <li><a href="#tabSm09"><span>커리큘럼 덕분에</span></a></li>
                    </ul>

                    <div class="slide_con" id="tabSm07">
                        <div id="slidesImg7">
                            <div class="lecReview">
                                <div><strong>헌법 50점 </strong> 경기남부청 장*복</div>
                                <h5 class="NSK-Black">[장정훈 교수님이 체크해 주신 것만 봐서 100점]</h5>
                                김원욱 선생님의 두문자 따시는 능력은 예전부터 잘 알고 있었습니다. <br><br>
                                헌법은 엄청 추상적인 과목이라 처음엔 이해가 어려웠었는데, 기출문제집과 병행해서 공부 하다 보니 이해가 수월했던 것 같습니다. <br><br>
                                김원욱 교수님께서 주시던 두문자 그리고 문제 자료들에는 다양한 판례가 있었는데, 폭넓은 판례를 공부한 것이 도움이 많이 된 것 같습니다.
                            </div>
                            <div class="lecReview">
                                <div><strong>헌법 50점 </strong> 서울청 노*윤</div>
                                <h5 class="NSK-Black">[핵지총과 기출문제집 반복 덕분에 헌법 만점!]</h5>
                                저는 강의를 듣고 이해가 안 가는 부분은 과감하게 넘기고 바로 문제로 접근했습니다. <br><br>
                                문제를 여러 번 풀다 보니 이해가 가는 것도 있고 도저히 이해가 안 가는 부분들은 그냥 암기했습니다. 그리고 하나하나 틀린 것들을 보완했습니다.<br><br>
                                그 후 김원욱 교수님께서 출간해 주신 핵지총과 기출문제집을 반복하고 시험장에 들어갔습니다. 여기까지 만점을 받을 수 있었던 비결입니다.
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm08">
                        <div id="slidesImg8">
                            <div class="lecReview typeW">
                                <div><strong>헌법 47.5점 </strong> 서울청 민*이</div>
                                <h5 class="NSK-Black">[문제풀이 2단계 동형 전범위 모의고사로 고득점 완성!]</h5>
                                최단 시간에 최대 효율을 낼 수 있는 강의와 교재라고 생각합니다. 교수님께서 암기보다 이해 중심의 강의를 해 주셔서 헌법에 할애하는 시간을 많이 줄일 수 있었습니다. <br><br>
                                보충자료에서는 따로 해설을 적어주는 대신 기본서 몇 페이지에 있는지 써주셨는데, 그 덕에 스스로 찾아보고 공부할 수 있어서 한번 틀린 내용도 더 오래 기억에 남았습니다. <br><br>
                                교수님께서 기본서나 기출문제집 중 하나를 정해서 계속 회독하라고 하셨는데 같은 책을 반복 회독하는 게 큰 도움이 됐습니다. <br><br>
                                기본, 심화 강의로 기본기를 다지고 1,2,3단계 수업에서 최신 출제경향과 최신판례만 익히고 가도 충분히 고득점 할 수 있다고 생각합니다.
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm09">
                        <div id="slidesImg9">
                            <div class="lecReview typeW">
                                <div><strong>헌법 45점 </strong> 경기남부 김*진</div>
                                <h5 class="NSK-Black">[커리 따라가면서 하라는 대로 하면 실제 시험해서 정답만 쏙쏙!!!]</h5>
                                저는 기본이론부터 문제풀이까지 모든 커리 전부다 수강했고 교수님께서 수업 시간 때 위헌 판례로 안 배웠으면 합헌이다 하고 시험장에서 풀었더니 빠른 시간 안에 정답만 쏙쏙 골랐어요.<br><br>
                                헌법은 정말 교수님이 하라는 대로 했습니다. 수업시간 때 위헌판례로 안 배웠으면 합헌이다하고 시험장에서 풀었더니 빠른 시간 안에 정답만 쏙쏙 골랐어요. 헌법 또한 이해를 중심으로 키워드 잡아서 암기한 게 도움이 되었습니다 !!<br><br>
                                김원욱 교수님의 콤팩트한 강의 덕에요점을 딱 집어서 필요한 부분만 알려주시니 범위가 불필요하게 늘어나지 않았고 공부 시간을 최소화한 덕에 다른 두 과목에 힘을 좀 더 실을 수 있었던 것 같습니다.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tabBig04">
                    <ul class="tabSm">
                        <li><a href="#tabSm10"><span>커리큘럼 덕분에</span></a></li>
                        <li><a href="#tabSm11"><span>기출문제집 덕분에</span></a></li>
                        <li><a href="#tabSm12"><span>컴팩트한 강의 덕분에</span></a></li>
                    </ul>

                    <div class="slide_con" id="tabSm10">
                        <div id="slidesImg10">
                            <div class="lecReview">
                                <div><strong>헌법 47.5점 </strong> 인천청 안*준</div>
                                <h5 class="NSK-Black">[커리큘럼을 따라가면서 단권화를 집중했던 것이 고득점으로 연결!]</h5>
                                기본이 가장 중요하다고 생각해 국령쌤의 커리큘럼을 모두 따라갔습니다. 기본강의를 수강한 후 바로 기출강의로 넘어갔습니다. 기출강의를 수강한 후 심화 강의를 수강했습니다. 그리고 부족했던 이론들을 채운 후 문제풀이 1·2·3단계를 빠짐없이 수강했습니다. <br><br>
                                그 기출문제에 국령쌤이 수업시간에 판서하시는 것 모두 다 적어놓고 기본/심화에서 제공해 주셨던 프린트에 있던 헷갈리거나 틀렸던 문제들 모두 기출문제집에 다 옮겨 적어놓고 기출문제집만 수도 없이 회독한 것 같습니다. <br><br>
                                또 제가 고득점을 받을 수 있었던 이유는 유튜브인 거 같습니다. 독서실을 왔다 갔다 할 때나 밥 먹을 때 혹은 쉬는 시간에 이국령 교수님 유튜브를 항상 켜놓고 그냥 들었습니다. 방대한 양의 헌법이지만 이국령 교수님이 제시해 주신 방향대로 잘 따라가 고득점이 나온 것 같습니다!!
                            </div>
                            <div class="lecReview">
                                <div><strong>헌법 47.5점 </strong> 서울청 김*우</div>
                                <h5 class="NSK-Black">[단권화와 모든 커리큘럼 수강하고 무난하게 합격!]</h5>
                                처음부터 끝까지 모든 수업 전부 수강했습니다. 교수님은 쉬운 설명으로 이해를 잘 시켜주시고, 비교적 양이 많은 다른 과목에 투자할 시간을 벌어주기 위해 공부할 양을 많이 줄여주십니다. 양이 적다고 걱정하시는 분들도 있던데 절대 그럴 필요 없고, 교수님 믿고 따라가시면 됩니다. <br><br>
                                교수님은 항상 단권화를 강조하셨는데 단권화가 끝나면 그 단권화된 책을 시험 때까지 계속 반복하는 것을 추천합니다. 단권화는 또 어떻게 할지 걱정이 많으실 수 있지만 교수님이 말씀하시는 대로 잘 따라가면 기본서든 기출문제집이든 단권화가 되어 있을 것이고, 그 단권화된 책을 며칠에 한번 회독 하겠다 계획을 하고 그 회독 주기를 줄여나가며 시험 전까지 계속 반복해서 보시면 됩니다. 그럼 충분합니다! 이국령 교수님 정말 최고입니다.
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm11">
                        <div id="slidesImg11">
                            <div class="lecReview">
                                <div><strong>헌법 47.5점 </strong> 경기남부청 엄*룡 </div>
                                <h5 class="NSK-Black">[얇지만 모두 담은 기출문제집에 단권화하여 반복학습]</h5>
                                기본 이론을 두 번 듣고 심화이론을 한번 들어 기본서의 내용은 거의 이해가 안 가는 부분이 없게 했습니다. 이후 기출문제집을 풀었는데 총 16회독을 했습니다.<br><br>
                                기출문제집의 모든 지문과 해설을 모두 보려고 노력했고, 이후에 문제풀이 1·2·3단계를 풀면서 최신 기출문제와 최신판례를 정리해 기출문제집에 단권화 했습니다.<br><br>
                                그리고 기출문제집에 나왔던 문제도 논점을 바꾸어 다르게 낼 수 있는데, 해당 문제들을 발견하면 기출 집에서 찾아 체크했습니다.
                            </div>
                        </div>
                    </div>

                    <div class="slide_con" id="tabSm12">
                        <div id="slidesImg12">
                            <div class="lecReview">
                                <div><strong>헌법 45점 </strong> 강원청 김*선</div>
                                <h5 class="NSK-Black">[커리 따라가면서 하라는 대로 하면 실제 시험해서 정답만 쏙쏙!!!]</h5>
                                이국령 교수님 강의도 쉽게 해주시고 양도 많이 줄여 주셔서 다른 과목에 더 투자할 수 있었고 쉽게 공부했던 것 같습니다.<br><br>
                                또한 문제 퀄리티도 엄청 신경 써서 내주시던데 그것도 큰 장점이라고 생각합니다. 양이 적지만 필요한 부분만 제대로 알려주셔서 문제 푸는데 지장은 없었고 했던 것만 제대로 하자라는 마인드로 문제풀이 1·2·3단계 복습을 몇 번 정도 했고 틀린 것만 봤습니다. <br><br>
                                시험 7일 전 기본서 회독 1번 필기노트를 몇 번 그거 보고 들어갔더니 알려주신 데로 나왔더라고요 쉬웠습니다.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

    </div>
    <!-- End evtContainer -->


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});
    </script> 

<script type="text/javascript">    
        $(document).ready(function() {
            var slidesImg = $("#slidesImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:860,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });

            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            var slidesImg5 = $("#slidesImg5").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            var slidesImg6 = $("#slidesImg6").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            var slidesImg7 = $("#slidesImg7").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            var slidesImg10 = $("#slidesImg10").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });
        });
    </script>

    <script type="text/javascript">  
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()}
                )}
            )}
        ); 

        $(document).ready(function(){
            $('.tabBig').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()}
                )}
            )}
        ); 

        $(document).ready(function(){
            $('.tabSm').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()}
                )}
            )}
        ); 
    </script>


@stop