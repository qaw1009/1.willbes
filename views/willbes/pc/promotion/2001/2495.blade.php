@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/01/2495_top_bg.jpg) no-repeat center top;} 
      
        .evt01 {background:#eee;}    
        .evt01 .tabs {width:1120px; margin:0 auto; display:flex; justify-content: space-around;}
        .evt01 .tabs li {width:calc(50% - 20px); margin:0 10px}	
        .evt01 .tabs li a {display:block; padding:20px 0; text-align:center; font-size:26px; background:#eee url(https://static.willbes.net/public/images/promotion/2022/01/2495_icon02.png) no-repeat 20% center; color:#969696; border:3px solid #969696; border-radius:10px;}
        .evt01 .tabs a.active,
        .evt01 .tabs a:hover {border-color:#000; color:#fff; background:#4b67d7 url(https://static.willbes.net/public/images/promotion/2022/01/2495_icon01.png) no-repeat 20% center;}


        .btnLink {width:600px; margin:0 auto}
        .btnLink a {display:block; border:3px solid #000; background:#fff; font-size:24px; padding:25px 0; border-radius:10px}
        .btnLink a strong {color:#d40000}
        .btnLink a:hover {background:#000; color:#fff}

        .evt02 {width:1120px; margin:0 auto 150px;}
        .evt02 .tabBig {display:flex; justify-content: space-around;}
        .evt02 .tabBig li {width:calc(33.33333%); margin-right:10px}
        .evt02 .tabBig li:last-child {margin:0}
        .evt02 .tabBig a {display:block; font-size:18px; border:5px solid #bcbcbc; color:#bcbcbc; padding:15px 0; text-align:center; line-height:1.4}
        .evt02 .tabBig a.active,
        .evt02 .tabBig a:hover {border-color:#4b67d7; color:#fff; background:#4b67d7}


        .evt02 .tabSm {margin-top:10px; display:flex; justify-content: space-around;}
        .evt02 .tabSm li {width:calc(25%); margin-right:10px}   
        .evt02 .tabSm li:last-child {margin-right:0}        
        .evt02 .tabSm a {display:block; font-size:16px; border:3px solid #bcbcbc; color:#bcbcbc; padding:15px 0; text-align:center; line-height:1.4}
        .evt02 .tabSm a.active,
        .evt02 .tabSm a:hover {border-color:#4b67d7; color:#4b67d7;}
        .evt02 .tabSm.w50 li {width:calc(50%);}
        .evt02 .tabSm.w33 li {width:calc(33.33333%);}

        .slide_con {width:1120px; margin:30px auto 0; color:#252525}
        .slide_con li {border:1px solid #ccc; padding:80px 80px 80px 280px; background:url(https://static.willbes.net/public/images/promotion/2022/01/2495_m.png) no-repeat 10% 80px; line-height:1.4; font-size:16px; text-align:left; margin-bottom:20px}
        .slide_con li.woman {background:url(https://static.willbes.net/public/images/promotion/2022/01/2495_w.png) no-repeat 10% 80px;}
        .slide_con li div {font-weight:bold; font-size:30px; margin-bottom:5px; color:#4b67d7;}
        .slide_con li p {font-weight:bold; font-size:20px; margin-bottom:30px}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="skyBanner" id="QuickMenu">
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2426" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/01/2495_sky01.jpg" alt="문제풀이 실강"></a>
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2446" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/01/2495_sky02.jpg" alt="문제풀이 인강"></a>
        </div>      

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2495_top.jpg" alt="고득점 합격이야기" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2495_01.jpg" alt="" />
            <ul class="tabs NSK-Black">
                <li>
                    <a href="#tab1">형법 & 형소법 195점!</a>
                </li>
                <li>
                    <a href="#tab2">형법 & 형소법 190점!</a>
                </li>
            </ul>
            <div id="tab1" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2495_01_01.jpg" alt="" />
            </div>
            <div id="tab2" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2495_01_02.jpg" alt="" />
                {{--<div class="btnLink"><a href="https://police.willbes.net/pass/support/notice/show?board_idx=326506" target="_blank">더 많은 <strong>고득점 수기</strong> 바로가기 ></a></div>--}}
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2495_02.jpg" alt="신광은과 함께라면" />
            <ul class="tabBig">
                <li><a href="#tabBig01">형사소송법<br>신광은 교수님</a></li>                
                <li><a href="#tabBig02">형법<br>신광은 교수님</a></li>
                <li><a href="#tabBig03">경찰학<br>장정훈 교수님</a></li>
            </ul>

            <div id="tabBig01">
                <ul class="tabSm">
                    <li><a href="#tabSm01">문제풀이 1,2,3 단계 덕분에</a></li>
                    <li><a href="#tabSm02">이해위주 학습 덕분에</a></li>
                    <li><a href="#tabSm03">커리큘럼 덕분에</a></li>
                    <li><a href="#tabSm04">완벽한 기본서 덕분에</a></li>
                </ul>

                <div class="slide_con" id="tabSm01">
                    <ul id="slidesImg1">
                        <li>
                            <div class="NSK-Black">형소법 100점 (서울청) 윤ㅇ석 </div>
                            <p>[적중률100% 족집게 강의!]</p>
                            <strong>문제풀이 2단계 동형 전 범위 모의고사, 문제풀이 3단계 파이널 실전 모의고사</strong>가 가장 도움이 컸습니다. <br>
                            <br>
                            <strong>문제풀이 2단계 동형 전범위 모의고사</strong>부터 시간 맞게 푸는 법과 모르는 게 나왔을 때 대처하는 방법 그리고 내가 알고 있다고 생각했지만 헷갈리는 것들을 다시 한번 볼 수 있었습니다.<br>
                            <br>
                            실제 시험에서는 신광은 교수님이 문제를 내신 것 같았습니다.
                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">형소법 95점 (경기남부청) 하ㅇ림 </div>
                            <p>[형사법은 묻고 따지지 말고 신광은!]</p>
                            저는 윌비스 커리큘럼 중에서 <strong>문제풀이 2단계 동형 모의고사</strong>가 가장 중요 하다고 생각합니다.<br>
                            감각도 익히고 제가 어느 부분이 약한지 파악했습니다.<br>
                            <br>
                            마지막으로 <strong>최신 판례 특강과 마무리 특강</strong>에서 다뤄 주신 중요한 지문을 봤던 게 시험 전에 큰 도움이 되었습니다.
                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">형소법 90점 (경기남부청) 이ㅇ라</div>
                            <p>[단 한 번도 점수가 떨어진 적이 없었습니다!]</p>                            
                            신광은 교수님 커리큘럼대로 따라갔고, 교수님이 하라는 대로 따라갔습니다. <br>
                            <br>
                            신광은 교수님 기본서 교재와 기출 교재에 모든 기출 지문이 완벽하게 반영되어 있었기 때문에 기본서와 기출 회독을 반복했고, 그렇게 하다 보면 동형 모의고사 때 모르는 지문이 없게 되었습니다. <br>
                            <br>
                            문제풀이 2단계 동형 전범위 모의고사 풀면서 또 중요한 지문, 헷갈리는 지문들을 전부 다루어 주시고 ‘아! 이건 설명이 조금 필요하다!’ 싶은 것들은 교수님이 귀신같이 알아채시고 설명해 주셨습니다. <br>
                            <br>
                            그럴 때마다 교수님이 정말 학생들의 약점을 누구보다 잘 알고 그걸 보완해 주시려고 노력해 주신다고 느꼈습니다. 
                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">형소법 90점 (전북청) 김ㅇ선</div>
                            <p>[따라만 가도 시험장에서 정답이 보입니다!]</p>                            
                            <strong>문제풀이 1단계(핵심요약 네친구+문제풀이), 문제풀이 2단계 동형 전범위 모의고사</strong>가 정말 중요하다 생각이 듭니다.<br>
                            <br>
                            <strong>문제풀이 1단계</strong>(핵심요약 네친구+문제풀이)에서 개념을 다시 정립하고 진도별 문제를 풀었고 <strong>문제풀이 2단계 동형 전 범위 모의고사</strong>로 약한 점을 보완하였어요. <br>
                            한 지문에서 바꿀 수 있는 곳은 다 체크하라는 말씀이 많이 도움이 되었어요. <br>
                            <br>
                            또한 계속 비교하면서 공부하면 남들 한 번 볼 때 두세 번 보는 효과를 누리라 하셔서 그대로 따라했습니다.<br>
                            <br>
                            문제풀이 2단계 동형 전 범위 모의고사 때 점수가 안 나와도 좌절하지 말고 쭉 따라가시면 좋은 결과가 시험지에 펼쳐질 거예요!
                        </li>
                        <li> 
                            <div class="NSK-Black">형소법 90점 (충남청) 안ㅇ원</div>
                            <p>[고득점으로 가는 필수 과정! 2단계 강력 추천!]</p>                            
                            많은 학생들과 마찬가지로 각 과목별로 고득점을 받기 위해서는 기출문제 회독이 중요하다고 생각합니다. <br>
                            <br>
                            특히 틀린 것을 중심으로 보면서 자신의 부족한 부분을 채워나가는 것이 시험의 좋은 결과를 낳는 베이스라고 생각하시면 됩니다. <br>
                            <br>
                            그리고 <strong>문제풀이 2단계 동형 모의고사</strong>는 정말 좋은 커리큘럼이라 생각됩니다. 정말 중요한 기출과 새로운 시험문제 트렌드가 잘 섞여 있음으로 시험을 잘 보는데 꼭 거쳐야 되는 과정입니다.
                        </li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm02">
                    <ul id="slidesImg2">
                        <li> 
                            <div class="NSK-Black">형소법 90점 (경남청) 조ㅇ호</div>
                            <p>[경찰합격! 3법은 신광은 경찰팀!]</p>                            
                            처음부터 실무 이야기를 해주시면서 <strong>이해가 쉽게 될 수 있도록 강의</strong>를 해주시는 게 정말 감사했습니다. <br>
                            <br>
                            자신 있는 파트라도 박스형 문제를 통한 연습으로 부족한 부분이 구체적으로 어디인지 확실히 알 수 있게 되고 그 부분들을 모아서 계속 반복을 하면 형소법뿐만 아니라 모든 과목이 효자 과목이 될 것입니다. <br>
                            <br>
                            “<strong>3법은 윌비스다.</strong>”라는 말은 틀린 게 아닌 말입니다. 확실히 다른 강의 퀄리티와 커리큘럼이니 믿고, 다른 생각은 하지 마시고 교수님께서 하라는 대로만 하고 복습하시면 금방 합격하실 겁니다!
                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">형소법 90점 (경남청) 강ㅇ주</div>
                            <p>[떠먹여주는 이해 위주의 독보적 형법 강의!]</p>                            
                            문제풀이 1~3단계, 신광은 형사법 <strong>유튜브 1일 1제, 신광은 형법 하프 모의고사</strong> 어느 하나 도움 되지 않는 게 없었고, 그 중에서도 신광은 교수님의 <strong>이해 위주의 강의</strong>가 제일 도움이 됐던 것 같습니다. <br>
                            <br>                            
                            이후에는 스스로 문제를 풀어보며 내가 부족한 부분이 어디인지 잘 체크하고 그 부분을 계속해서 반복하다 보면 충분히 고득점 가능합니다. <br>
                            <br>
                            자칫 지루할 수 있는 과목을 실무경험을 통해 이해하기 쉽고 재미있게 강의해 주셔서 신광은 교수님께 감사드립니다.
                        </li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm03">
                    <ul id="slidesImg3">
                        <li> 
                            <div class="NSK-Black">형소법 95점 (서울청) 손ㅇ영</div>
                            <p>[합격생들이 인정한 형사법 커리큘럼!]</p>                            
                            <strong>신광은 경찰팀의 기본 - 심화 이론 및 심화 기출 - 문제풀이 커리큘럼을 그대로 따라갔습니다.</strong><br>
                            기본, 심화를 들을 때는 교수님들의 수업을 듣고 복습을 중점으로 신의 한 수 기출 총정리로 진도에 맞게 문제를 풀며 부족한 부분을 채워 나갔습니다.<br>
                            <br>
                            교수님들의 말씀대로 혹시나 하는 마음에 100점 맞을 각오로 무한정으로 범위를 넓혀가는 공부 방식은 생각보다 멀리 돌아가게 될 수도 있습니다. 그 범위를 바르게 정해 주셨던 것이 신광은 경찰팀이라고 생각하구요. <br>
                            <br>
                            교수님들을 믿고 따라간다면 금방 목표에 도달할 수 있을 거라고 생각합니다.
                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">형소법 90점 (전남청) 김ㅇ현</div>
                            <p>[과학적인 커리큘럼으로 긴 지문의 문제도 척척!]</p>                            
                            윌비스 경찰팀 <strong>기본부터 시작하여 마지막 문제풀이 3단계 파이널 실전모의고사</strong>까지 믿고 따라갔습니다.<br>
                            <br>
                            시험 전 <strong>문제풀이 1단계</strong>(핵심요약 네친구 + 문제풀이)에선 네친구 신광은 형소법 subnote 최종 정리 단권화 하였습니다. 요즘 시험 출제경향이 지문이 길기 때문에 <strong>문제풀이 2단계</strong> 동형 전 범위 모의고사에선 포인트 체크하며 속독하는 연습을 하였습니다.<br>
                            <br>
                            그 덕분에 시험에서 빠른 시간 안에 풀고 고득점을 받았습니다.
                        </li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm04">
                    <ul id="slidesImg4">
                        <li class="woman">
                            <div class="NSK-Black">형소법 90점 (광주청) 모ㅇ영</div>
                            <p>[따뜻한 소통하면 신광은 교수님!]</p>                           
                            저는 처음에 강의를 한 번 듣고 이해가 가지 않는 부분은 반복해서 들었고, 요약정리집이 아니라 <strong>기본서로 공부하는 습관</strong>을 들였습니다. <br>
                            <br>
                            사실 이번 2차 시험에서 느낌이 더 가는 답이 보였고, 그것은 제가 마냥 찍어서 맞춘 게 아니라 그동안 <strong>기본서를 읽고 이해 형식</strong>으로 공부했던 점이 발휘를 한 것이라고 생각합니다.<br>
                            <br>
                            또한, 지방에서 공부를 해서 질문하기가 어려웠지만 신광은 교수님 카페에 질문을 올려서 질문을 해서 고민을 해결하였습니다.
                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">형소법 90점 (강원청) 서ㅇ현</div>
                            <p>[대한민국 NO.1 기본서= 신광은 형사법]</p>                            
                            저는 형소법은 <strong>기본서</strong>가 가장 중요하다고 생각했습니다. 신광은 선생님의 기본서가 정리가 잘 되어있기 때문에 <strong>기본서 중심으로 공부</strong>했습니다.<br>
                            <br>
                            그 이후 문제풀이 1단계(핵심요약 네친구+문제풀이), 문제풀이 2단계 동형 전 범위 모의고사, 문제풀이 3단계 파이널 실전모의고사를 다 따라갔습니다.<br>
                            <br>
                            선생님이 문제풀이 2단계 동형 전 범위 모의고사 때 점수가 잘 안 나와도 시험장에서 잘 나오면 된다고 하셨기 때문에 점수가 잘 안 나와도 믿고 따라갔기에 이번 시험에 90점을 받았습니다.
                        </li>
                    </ul>
                </div>
            </div>

            <div id="tabBig02">
                <ul class="tabSm w50">
                    <li><a href="#tabSm05">유튜브 1일1제 덕분에</a></li>
                    <li><a href="#tabSm06">형법 특강(하프 모의고사) 덕분에</a></li>
                </ul>

                <div class="slide_con" id="tabSm05">
                    <ul id="slidesImg5">
                        <li class="woman">
                            <div class="NSK-Black">형법 95점 (경기남부청) 하ㅇ림</div>
                            <p>[쉬운 이해 덕분에 형법 총론 만점!]</p>                           
                            <strong>형법 총론</strong>은 다른 과목보다 이해가 중요한 부분인데 신광은 교수님이 <strong>이해하기 쉽게 설명</strong>해주시고, 암기가 필요한 부분은 두문자를 만들어 주셔서 이해와 암기, 두 마리 토끼를 모두 잡을 수 있었습니다.<br>
                            <br>
                            <strong>신광은 형사법 유튜브 1일 1제</strong>를 통해 형법과 형소법 중요한 지문을 다시 한번 풀어보고, 영상 시간도 길지 않아 <strong>자투리 시간을 활용</strong>하여 공부할 수 있어서 좋았습니다!
                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">형법 95점 (서울청) 박ㅇ령</div>
                            <p>[총론의 신! 각론의 왕! 형법의 최강자!]</p>                            
                            신광은 <strong>형사법 유튜브 1일 1제</strong>가 도움이 많이 되었습니다. <br>
                            <br>
                            1년 동안 애먹었던 어려운 총론 학설을 너무 쉽게 설명해주신 것도 좋았지만 특히 각론 문제를 설명해주신 게 제일 좋았습니다. <br>
                            <br>
                            헷갈리던 총론 학설, 각론 판례들을 다시 숙지할 수 있었고 10분 이내의 동영상들은 학원 쉬는 시간에도 틈틈이 볼 수 있었습니다. 바쁜 와중에도 <strong>신광은 형사법 유튜브 1일 1제</strong>까지 찍어 주신 덕분에 제가 필기 합격할 수 있었던 거 같습니다.
                        </li>
                        <li> 
                            <div class="NSK-Black">형법 95점 (101단) 김ㅇ찬</div>
                            <p>[어디서나 언제든지 반복해서 들었습니다!]</p>                            
                            신광은 <strong>형사법 유튜브 1일 1제</strong>가 도움이 가장 많이 됐다고 생각합니다.<br>
                            신광은 교수님의 강의 스타일이 너무 잘 맞아 부족했던 총론의 강의를 봤는데 학설을 이해하기 쉽게 설명해 주셨고, 밥 먹는 시간이나 자기 전에 신광은 <strong>형사법 유튜브 1일 1제 학설파트</strong>, 유튜브에 있는 학설 강의를 추가로 보며 헷갈리는 부분을 모두 들으며 반복했습니다. <br>
                            신광은 <strong>형사법 유튜브 1일 1제</strong>를 보면 학설별로 강의가 여러 개가 올라와 있는데 하나만 듣는 게 아니라 전부 시간 날 때 듣다 보면 매번 새로운 느낌을 받았고 영상 도중 자연스럽게 대답하게끔 익혔습니다. <br>
                            틈틈이 문제 풀기도 좋고 복습도 좋고 많은 도움이 되었습니다. 
                        </li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm06">
                    <ul id="slidesImg6">
                        <li class="woman"> 
                            <div class="NSK-Black">형법 95점 (서울청) 송ㅇ희</div>
                            <p>[형법 특강 덕분에 경찰의 꿈을 이루었습니다!]</p>                            
                            시험 한 달 전부터 <strong>신광은 형사법 유튜브로 진행한 신광은 형법 하프 모의고사</strong>를 꾸준히 풀며 강의를 듣고 부족한 부분을 공부했습니다. <br>
                            <br>
                            그 덕에 제가 모르는 부분이 무엇인지를 확인하며 보충할 수 있었습니다. 수험 기간에 자기 자신을 믿고, 교수님 말씀 대로만 한다면 합격까지는 수월하게 갈 수 있을 것이라고 생각합니다.
                        </li>
                        <li> 
                            <div class="NSK-Black">형법  90점 (부산청)  박ㅇ원</div>
                            <p>[절대 합격 비결! 신광은 형사법 채널!]</p>                            
                            신광은 교수님의 <strong>형법</strong> 강의 덕분에 형법 <strong>총론</strong> 부분에 있어서는 만족스러운 점수를 얻게 되었던 것 같습니다! <br>
                            <br>
                            총론은 단어의 의미와 내용의 이해가 중요하다고 생각하는데 신광은 교수님의 알차고 재미있는 설명을 덧대서 암기하지 않아도 이해하도록 도와주셨습니다! <br>
                            <br>
                            헷갈리는 파트가 있을 때에는 유튜브에 올려주신 형법 부분을 검색해서 찾아보는 등 많은 도움을 받았습니다! 또한, 매 주말마다 진행해 주신 <strong>하프 모의고사</strong>를 활용하여 제가 부족한 부분을 체크할 수 있어서 더더욱 좋았던 것 같습니다. 다들 파이팅!
                        </li>
                    </ul>
                </div>
            </div>

            <div id="tabBig03">
                <ul class="tabSm w33">
                    <li><a href="#tabSm07">문제풀이 1,2,3 단계 덕분에</a></li>
                    <li><a href="#tabSm08">핵심 요약서 네친구 덕분에</a></li>
                    <li><a href="#tabSm09">완벽한 커리큘럼 덕분에</a></li>
                </ul>

                <div class="slide_con" id="tabSm07">
                    <ul id="slidesImg7">
                        <li class="woman"> 
                            <div class="NSK-Black">경찰학 85점  (충남청)  배ㅇ영</div>
                            <p>[교수님 말씀따라 공부했더니 경찰학 고득점!]</p>                            
                            경찰학개론 <strong>문제풀이 1단계</strong>(핵심요약 네친구 + 문제풀이) 네친구 장정훈 경찰학개론 subnote 최종정리는 조금 어려웠지만 끝까지 따라갔고 <strong>문제풀이 2단계 동형 전범위 모의고사</strong>와 함께 기출문제도 놓지 않고 함께 풀었습니다.<br>
                            <br>
                            경찰학은 교수님께서 말씀하신 대로 매일 조금씩 봐주는 게 중요하다고 생각합니다.<br>
                            <br>
                            눈에 바른다는 생각으로 매일 봐주다 시험 2주 전부터 <strogn>네친구 장정훈 경찰학개론 subnote 최종정리</strong>로 쭉 회독한 것이 고득점에 도움이 된 것 같습니다.
                        </li>
                        <li> 
                            <div class="NSK-Black">경찰학 85점 (강원청) 서ㅇ현</div>
                            <p>[네친구 서브노트= 경찰 합격 비법!]</p>                            
                            법 과목은 어느 학원보다 신광은 경찰팀이 잘 가르치신다는 생각이 있기 때문에 처음 공부할 때부터 선생님들의 커리를 다 따라갔습니다.<br>
                            <br>
                            경찰학은 <strong>문제풀이 1단계(핵심요약 네친구 + 문제풀이)</strong> 강의가 제일 좋았습니다. 암기가 특히 많은 경찰학은 '반복만이 살길이다.'라는 생각에 <strong>네친구 장정훈 경찰학 개론 subnote 최종정리</strong>를 시험을 볼 때까지 회독을 계속했습니다. <br>
                            <br>
                            문제를 풀다가 틀리면 그 틀린 지문만 보지 말고 그 파트를 꼭 <strong>네친구 장정훈 경찰학 개론 subnote 최종정리</strong>를 찾아보면서 공부를 했습니다. <br>
                            <br>
                            선생님이 하시는 말대로 커리큘럼만 따라가시면 좋은 결과 얻을 것이라 생각합니다.
                        </li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm08">
                    <ul id="slidesImg8">
                        <li> 
                            <div class="NSK-Black">경찰학 80 (인천청) 손ㅇ영</div>
                            <p>[고득점의 비결은 경찰학 네친구 반복!]</p>                            
                            “<strong>경찰학은 매일 봐야 한다.</strong>” 라는 장정훈 교수님 말씀대로 하였습니다. <br>
                            교수님의 추천대로 처음은 1주일에 <strong>네친구 장정훈 경찰학개론 subnote 최종정리</strong> 1회독을 목표로 섹션을 나누어서 두 번 정도 회독하였습니다.<br>
                            <br>
                            그 다음은 5일에 1회독, 3일에 1회독 순으로 회독을 끝내는 시간을 줄여 나갔고, 경찰학은 다른 과목과는 다르게 휘발성이 매우 강한 과목이라고 생각합니다.<br>
                            <br>
                            장정훈 교수님을 믿고 하루 30분-1시간이라도 경찰학에 투자하며 목표량을 정해 회독한다면 고득점은 충분히 가능하다고 생각합니다.
                        </li>
                        <li> 
                            <div class="NSK-Black">경찰학 80점 (서울청) 고ㅇ영 </div>
                            <p>[네친구 경찰학 무한 복습 덕분에 합격했습니다!]</p>                            
                            평소 기출 풀면서 제가 부족했다고 느껴지는 부분의 기본이론 부분을 다시 본다던가, <strong>네친구 장정훈 경찰학개론 subnote 최종정리</strong>를 빠르게 복습하거나 그때 그때 제가 필요한 방법을 찾아서 공부했습니다.<br>
                            <br>
                            그리고 문제풀이 2단계 동형 전범위 모의고사와 <strong>네친구 장정훈 경찰학개론 subnote 최종정리</strong>만 반복했지만, 경찰학 공부가 부족한 것 같다는 생각은 들지 않았었습니다.<br>
                            <br>
                            그동안 커리큘럼 따라가면서 짱쌤이 말씀해주신 공부 방법들 잊지 말고 끝까지 하시고, 경찰학은 요령 피우지 않고 마라톤처럼 꾸준히 하시면 시험에서 원하는 점수가 나올 수 있습니다!!
                        </li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm09">
                    <ul id="slidesImg9">
                        <li> 
                            <div class="NSK-Black">경찰학 85점 (충남청) 김ㅇ</div>
                            <p>[경찰학은 하루에 한 번씩 꼭 보기! 파이팅!]</p>                            
                            경찰학은 장정훈 교수님의 <strong>모든 커리큘럼</strong>을 따라가면서 공부했고, 하루에 한 번씩은 꼭 봤던 것 같습니다. <br>
                            <br>
                            분명 외웠는데 기억이 안 나오거나 잘 안 외워졌던 부분은 포스트잇에 옮겨 적어 잘 보이는 데다 붙여 두었고 자주 보았습니다. <br>
                            <br>
                            또한, 한 번 기출된 문제들을 이번엔 안 나오겠지 하며 넘어가지 않고 반드시 짚고 넘어가는 게 중요하다고 생각합니다. <br>
                            <br>
                            외우는 건 모두 다 귀찮고 힘든 일이지만 참고 반복적으로 정확히 외워두면 시험장에서 누구보다 빨리 정답을 체크할 수 있습니다. <br>

                        </li>
                        <li class="woman"> 
                            <div class="NSK-Black">경찰학 80점 (충남청) 최ㅇ영</div>
                            <p>[교수님만 믿고 따라가면 고득점은 저절로 따라옵니다!]</p>                            
                            <strong>장장훈 교수님 커리큘럼</strong>대로 장정훈 교수님만 믿고 따라가면 고득점은 따라옵니다. <br>
                            <br>
                            굳이 다른 학원들의 모의고사들을 풀면서 혼란을 가중시키지 말고 장정훈 교수님이 하라는 것만 하세요!<br>
                            <br>
                            <strong>문제풀이 1단계(핵심요약 네친구 + 문제풀이)</strong>를 들으면서 우선 진도별 기출문제를 홀수 문제만 먼저 풀었고, 혼자 <strong>네친구 장정훈 경찰학 개론 subnote 최종정리를 반복적으로 회독</strong>하면서 짝수 문제를 풀었습니다. <br>
                            <br>
                            마지막에는 진도별 모의고사 문제를 푼 뒤에 복습을 했습니다.
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
    <!-- End evtContainer -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
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