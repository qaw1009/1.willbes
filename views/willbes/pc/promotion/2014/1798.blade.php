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
            bottom:20px;
            right:10px;
            z-index:1;
            width:150px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:#fdcfc2}
        .evtTop_01 {background:#ea797b}       

        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#ea797b}

        .evt02 {background:#fff; padding:100px 0}
        .evt02 .btnbuy {width:720px; margin:50px auto 0}
        .evt02 .btnbuy a {border-radius:10px; display:block; font-size:38px; background:#000; color:#fff; padding:20px 0;}
        .evt02 .btnbuy a:hover {background:#3a99f0;}

        .evt03 {background:#9fb0c1;}

        .evt04 {background:#efefef;}

        .evt05 {background:#ffffff;}

        .evt06 {background:#ff569d;}


        .evt07 {background:#9bb1c1;}
        .evt08 {background:#e3d8d4;}

        .evtCurriWrap {text-align:left; padding:100px 0; background:#f5f5f5}
        .evtCurriWrap .copy {width:720px; margin:0 auto;}
        .evtCurriWrap h5 {color:#414d4c; font-size:46px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evtCurriWrap .evtCurriTxt01 {font-size:28px; margin:20px auto 80px}
        .evtCurriWrap .sample {width:720px; margin:0 auto}
        .evtCurriWrap .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evtCurriWrap .sample li p {margin-bottom:15px;}
        .evtCurriWrap .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evtCurriWrap .sample li a:hover {background:#fff; color:#000}
        .evtCurriWrap .sample li:last-child {margin:0}
        .evtCurriWrap .sample:after {content:""; display:block; clear:both}
        .evtCurriWrap .evt05Txt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}

        .evtCurri {width:720px; margin:50px auto 0; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}   

        .evt09 {padding-bottom:100px}
        .evt09 .columns {width:720px; margin:50px auto 0;
            column-count: 1;
            column-gap:20px;
        }
        .evt09 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border-radius:10px;
            margin-bottom:40px; color:#292929; background:#f5f5f5;
            box-shadow:0 10px 10px rgba(102,102,102,0.2);
        }
        .evt09 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt09 .columns div strong {font-size:bold; color:#333}        

        .evtCtnsBox iframe {width:768px; height:391px; margin:0 auto;}

        .evtFooterWrap {background:#e1e1e1; padding:100px 0}
        .evtFooter {width:900px; margin:0 auto; text-align:left; line-height:1.5; font-size:14px; color:#3a3a3a;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#3a3a3a;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal;}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2021/02/1798_sky_01.png" alt="수강신청"></a> 
            <a href="https://njob.willbes.net/book/index/cate/3114?cate_code=3114&subject_idx=1971&prof_idx=51124
" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/02/1798_sky_02.png" alt="교재구매"></a>
            <a href="#evtCurri"><img src="https://static.willbes.net/public/images/promotion/2021/02/1798_sky_03.png" alt="맛보기강좌"></a>            
        </div>                       

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_top.jpg" alt="창업 다마고치" >             
        </div>  

        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_01.jpg" alt="창업 다마고치" >             
        </div>    

        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div>

        <div id="tab01">
            <div class="evtCtnsBox evt02" id="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_02.jpg" alt="수강료" >            
  
                <div class="btnbuy NSK-Black">
                    <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/171846" target="_blank">[온라인강의] 신청하기 ></a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_03.jpg" alt="e커머스 강좌소개" >
                
            </div> 
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_04.jpg" alt="e커머스 강좌소개" >
            </div>  
            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_05.jpg" alt="e커머스 강좌소개" >
            </div> 
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_06.jpg" alt="e커머스 강좌소개" >
            </div>
            <div class="evtCtnsBox evt07">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_07.jpg" alt="e커머스 강좌소개" ><br>
                <iframe src="https://www.youtube.com/embed/sYw3MWvWhwM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_07_01.jpg" alt="e커머스 강좌소개" ><br>
                <iframe src="https://www.youtube.com/embed/BT7sfyECChA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_07_02.jpg" alt="e커머스 강좌소개" >
            </div>
            <div class="evtCtnsBox evt08">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_08.jpg" alt="e커머스 강좌소개" >
            </div>
        </div>  

        <div id="tab03">
            <div class="evtCtnsBox evtCurriWrap" id="evtCurri">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>서민지 지텔프 32점</div>
                        <div>3시간 완성 커리큘럼</div>
                    </h5>
                    <div class="evtCurriTxt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
                </div>

                <ul class="sample">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)                            
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');">고해상도 ></a>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');">저해상도 ></a>
                            </li>
                            @php $i += 1; @endphp
                        @endforeach
                    @else
                        <li><a href="#none">1강 맛보기 준비중 ></a></li>
                        <li><a href="#none">2강 맛보기 준비중 ></a></li>
                    @endif
                </ul> 

                <div class="evt05Txt02">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <div class="evtCurri">
                    <ul>
                        <li class="cTitle">INTRO</li>
                        <li>1강. 안녕하세요, 민지텔프의 서민지입니다.</li>

                        <li class="cTitle">CHAPTER 1. 기초부터 차근차근, 왕초보 탈출하자</li>
                        <li>2강. 쌩기초 영어(1)</li>
                        <li>3강. 쌩기초 영어(2)</li>
                        <li>4강. 쌩기초 영어(3)</li>

                        <li class="cTitle">CHAPTER 2. 영어에서 Should의 중요성</li>
                        <li>5강. Should 생략 동사</li>
                        <li>6강. Should 생략 형용사</li>
                        <li>7강. Should 생략 문제풀이</li>

                        <li class="cTitle">CHAPTER 3. 가정법, 미리 겁내지 마세요! 절대 어렵지 않습니다!</li>
                        <li>8강. 가정법(1) 과거 개념</li>
                        <li>9강. 가정법(1) 과거 문풀</li>
                        <li>10강. 가정법(2) 과거완료 개념</li>
                        <li>11강. 가정법(2) 과거완료 문풀</li>
                        <li>12강. 가정법 실전 문제 문풀</li>

                        <li class="cTitle">CHAPTER 4. 과거부터 미래까지, 영어 시제 한 번에 끝내자! </li>
                        <li>13강. 시제(1) 현재진행 개념</li>
                        <li>14강. 시제(1) 현재진행 문풀</li>
                        <li>15강. 시제(2) 과거진행 개념</li>
                        <li>16강. 시제(2) 과거진행 문풀</li>
                        <li>17강. 시제(3) 미래진행 개념</li>
                        <li>18강. 시제(3) 미래진행 개념</li>
                        <li>19강. 시제(4) 현재완료진행 개념</li>
                        <li>20강. 시제(4) 현재완료진행 문풀</li>
                        <li>21강. 시제(5) 과거완료진행 개념</li>
                        <li>22강. 시제(5) 과거완료진행 문풀</li>
                        <li>23강. 시제(6) 미래완료진행 개념</li>
                        <li>24강. 시제(6) 미래완료진행 문풀</li>

                        <li class="cTitle">CHAPTER 5. 잠깐! 그럼 우리 살짝 연습해볼까요?</li>
                        <li>25강. 실전 문제풀이1</li>
                        <li>26강. 실전 문제풀이2</li>

                        <li class="cTitle">CHAPTER 6. 들어도 헷갈리는 관계대명사, 이 팁이면 완벽 정리!</li>
                        <li>27강. 관계사(1) 관계대명사 7팁</li>	
                        <li>28강. 관계사(1) 관계대명사 문풀</li>

                        <li class="cTitle">CHAPTER 7. 찍기도 알아야 찍는다! 준동사 꿀팁</li>
                        <li>29강. 준동사 찍기 팁과 문풀</li>

                        <li class="cTitle">CHAPTER 8. 배운걸 적용하여 실전 문제 풀이!</li>
                        <li>30강. 테스트 1 문제풀이</li>
                        <li>31강. 테스트 2 문제풀이</li>
                        <li>32강. 테스트 3 문제풀이 / 종강</li>
                        <li>33강. 추가자료 (문법 모의고사,문법 총정리)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt09">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_09.jpg" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <p>수강생 1230e***</p>
                        서민지 선생님께 감사드립니다. 인터넷 강의로 다른 문법강의도 들어보고 모의고사도 이것저것 사서 풀고 했는데 모의고사 성적이 안 올라 답답해서 뒤져보다 서민지 선생님 까페에 우연히 들렸습니다. 선생님의 학생 관리가 너무 좋아 보이고 왠지 학생분들도 잘 따르시는 거 보고 강의 신청을 해서 직전반까지 완강했습니다. 문제풀이 팁들과 꾸준하게 새로운 유형 체크해 주시고 진도 관리까지...직장생활 하면서 힘들었지만 보람이 있었습니다. 이번 회차가 지텔프 처음이라 듣기에서 조금 아쉽지만 아직 시험이 안 끝나서 선생님이 가르쳐 주신 방법으로 더 노력하겠습니다. 선생님 스케쥴 관리대로 따라 해보시면 금방 원하시는 점수 올리실 수 있을겁니다. 믿고 따라 해보시길 강추 드려요.
                    </div>  
                    <div>
                        <p>수강생 뿌**</p>
                        선생님께 너무 감사드립니다. 사실 고등학교때 상경계열이어서 영어를 배운 적이 없었고, 나이도 있고 직장병행이라 영어가 너무 고민이 많았습니다. 우선 65점까지 딱 턱걸이에 불과하지만 넘겼다는 부분에서 이렇게 글을 남깁니다. 처음에는 무조건 단어부터 외웠습니다. 이때 영어수준이 주어 동사 목적어도 몰랐습니다. 단어책은 빅지텔프 보카로 시작했습니다. 그리고 합격수기들을 보는데 서민지 선생님 후기가 보였습니다. 그분 후기가 저와 상황적으로 비슷했고, 내 문제가 직독직해의 문제가 있을지도 모르겠다는 생각을 했습니다 그리고 서민지 강사님 보카 강의를 듣고 상담을 했습니다. 특강을 진행한 후에 선생님과 상담후 뭐가 부족한지 많이 생각하게되었습니다. 하루에 독해 한파트씩 틀린부분 오답노트 작성하셔서 내가 문장구조에서 틀렸는지 어휘에서 틀렸는지 파악하셔서 정답률을 높이셨으면 좋겠습니다. 모두들 좋은 결과 보시길 기도 드립니다. 감사합니다.놓치고 지나간 일들을
                        찾아 포기하지 않고 창업 다마고치님의 말씀을 믿고 실천해 나가도록 하겠습니다. 
                    </div> 
                    <div>
                        <p>수강생 얀**</p>
                        일단 저는 시험 자격을 위해 지텔프 점수가 65점이 필요했었습니다. 처음 시험에서 62점을 받아서 앞으로 어떻게 공부를 해야 65점을 넘을까 라는 고민하고 있었을 때 서민지 선생님을 알게 되었습니다. 선생님께서 저번 시험에 대해서 알려달라고 하셔서 보내드렸더니 너무 상세하고 친절하게 피드백을 주셔서 저의 문제점이 무엇인지 보완해야 할 점이 무엇인지를 알 수 있었습니다. 그 덕분에 더욱 선생님을 신뢰하게 되었고 선생님이 하라는 대로 하면 목표점수는 넘겠구나 했습니다. 선생님의 꿀팁을 많이 얻을 수 있어서 좋았습니다. 특히 듣기 꿀팁이 정말로!! 많이 도움이 되었고 청취 덕분에 목표 점수가 넘었습니다. 서민지 선생님 감사합니다!
                    </div>  
                    <div>
                        <p>수강생 M***</p>
                        오랜시간동안 지텔프 영어시험을 준비했어요. 토익보다는 쉽다는 후기들을 보고 쉽게 생각하고 시험을 준비했었고 처음 시험을 봤을때 53점이 나와서 조금만 더 하면 붙을거라고 생각을 했는데 점수는 크게 오르지 않았어요. 그 후에 서민지 선생님과 성적 상담후 강의를 듣게 되었고 그결과 평균 69점으로 원하는 목표점수를 받을 수 있었습니다. 어떤 분이 서민지 선생님과 상담후에 원하는 점수에 도달했다는 후기를 보고 서민지선생님께 연락했고 선생님과 상담 후 유패스 모의고사 강의를 듣게 됐는데 정말 큰 도움이 됐고 목표점수에 도달했습니다. 저는 서민지 선생님을 더 빨리 알았으면 좋았을 텐데 라는 생각이 들 정도로 정말 많은 도움이 됐습니다.^^ 선생님 너무 감사합니다!!
                    </div> 
                    <div>
                        <p>수강생 에세***</p>
                        안녕하세요! 65점 목표로 공부했습니다. 저같은 경우는 본공부 5월부터 시작했다가 영어를 병행했었어요. 근데 이게 진짜 기초 없는 분들한테는 진짜 독인것 같아요. 저는 영어 먼저 하려고 본공부 아예 멈추고 딱 제대로 공부 1달해서 원하는 점수 이루었습니다. 혹시라도 기초 없는 상태에서 병행하실 생각인 분들은 나름 계획있으시겠지만 저같은 경우는 비추에요! 결국 영어 성적 있어야 시험 볼 자격이 생기니까 빨리 먼저 하시는거 추천드립니다. 인강으로 여러개 강의 듣다가 점수가 안나와서 고민하던중에 서민지쌤을 알게되어서 강의도 들어보고 카톡 스터디도 해보고 시험보기 직전에 특강도 들었는데 정말 빠르게 가고 싶은 분들 무조건 선생님 커리큘럼 따라가시면 될것같네요. 선생님 덕분에 원하는 점수 그 이상 이루고 갑니다. 감사해요 선생님! 다들 화이팅 하세요!!
                    </div>
                    <div>
                        <p>수강생 썜*</p>
                        저도 이렇게 합격수기를 쓰는 날이 오다니,, 너무 나도 감격스럽고 아직도 믿겨지지 않네요.. 항상 회사에서 합격 하신 분들 수기 하나하나 다 읽어가면서 나중에 저도 꼭 합격해서 수기 쓰고 싶다고 생각했는데 역시 노력은배신하지 않네요!! 우선 저는 회사를 다니고 있어서 회사랑 본공부랑 영어 세가지를 병행했습니다. 3월에 지텔프 첫 시험을 접수했지만 코로나로 인해서 계속 미뤄지는 탓에 5월에 첫 시험을 보고 성적은 역시나 59점으로 불합격.. 저는 처음에 혼자 인강 듣고 공부하면서 문법스킬은 어느 정도 파악하고 시험 유형 정도만 아는 정도였습니다. 첫 시험에서 나름 아쉽게 불합격했다고 생각해서 많은 검색을 통해 서민지쌤 카페를 발견했고 저는 선생님한테 상담 카톡을 드리고 다들 특강에서 많은 정보를 얻어 가시는 것 같아서 특강신청을 했습니다. 선생님 특강은 정말 많은 도움이 되었습니다. 문법스킬은 대충 알고 있었지만 항상 80점대에 머물렀는데, 선생님의 조동사 스킬과 시제 수일치, 요즘 경향의 문법유형을 말씀해주시면서 이후로 문법은 계속 쭉 100점을 유지한 것 같습니다. 독해는 선생님 유투브 단어 강의를 매일 출퇴근시간에 무심결에 들었으며, 선생님이 톡방에 올려주시는 자료가 최신경향을 잘 반영해서 많은 도움이 된 것 같습니다. 또한 무작정 단어를 외우는 것보단 저는 한 지문 풀고 모르는 단어는 다시 검색해가면서 흐름을 이해할려고 했습니다. 정말 멘탈적으로 많이 지치고 회사에다니면서 본공부에 영어까지 정말 버거웠습니다. 그래도 매일 자기전에 선생님이 톡방에 올려주신 독해자료는 손으로 써가면서 풀고 독해 한 지문, 듣기 한 지문씩은 꼭 풀고 잘려고 했습니다. 덕분에 77점이라는 믿기지 않는점수로 합격 할 수 있었던 것 같습니다. 정말로 감사합니다 선생님!!
                    </div>
                    <div>
                        <p>수강생 덩**</p>
                        저는 독학으로 공부하고 책은 그냥 시중에 나와있는 6회분 모의고사만 2번 풀었습니다. 독학할 때 서민지 선생님 자료가 상당히 큰 힘이 되었지요ㅜ 65점나오려면 최소52문제를 맞아야하니 문법24개 독해24개 듣기 찍어서 4개이상 이렇게 목표를 잡았습니다. 문법은 시제 가정법 관계사는 한번 정리하니 틀릴 건덕지가 별로 없더라구요. 저는 조동사와 준동사에 집중했습니다. 독해는 그냥 모의고사 풀며 지텔프에서 나오는 문장구조나 어휘에 익숙해지려 했습니다. 여튼 수험공부하시는 분들 모두 힘내시고 꼭 소기의 목적을 달성하시길 기원합니다. 저는 이제 영어걱정없이 세무사 공부에만 집중할 수 있어 너무 감사합니다.
                    </div>
                    <div>
                        <p>수강생 moo***</p>
                        우선 시험 2주남기고 65점이 꼭 필요했는데 민지쌤 실강듣고 80점이라는 과분한 점수 받아서 정말 감사드립니다~^^ 영어를 워낙 싫어하고 흥미도 없어서 예전에 수능 3등급 맞고 영어공부는 손놓고 살다가 갑자기 점수가 필요해서 먼저 토익을 시험보려고 했어요 근데 역시 영어공부를 안하다가 토익 기출문제집을 풀어보니 500점이나 겨우 나오더라구요 한 3일하다가 2주안에는 안되겠다 싶어 쉽다는 지텔프에 입문했어요. 처음 지텔프 문제를 풀어보니 토익보다는 좀 더 쉽지만 듣기가 어려워 65점이 쉽지 않겠더라구요. 그러다가 시험 일주일전쯤에 우연히 서민지쌤을 알게되었고, 쌤이 문제 푸는 스킬 들을 알려주시고 듣기도 버리지만 않으면 어느 정도 점수를 받을 수 있다고 하셔서 그대로 공부했어요 그리고 카톡으로 문제도 공유해주시고, 공부법도 알려주시고, 궁금한점 답변도 친절하게 해주셔서 큰 도움이 됐어요. 문법은 접속사 조동사문제 외에는 해석 최소화하면서 스킬위주로 빠르게 풀고 남는 시간에 듣기 선지분석이나 독해문제 풀기 듣기는 노트테이킹 연습(간략하게 들리는것만), 안들리는 문제는 포기하고 다음문제에 집중하고 제일 중요한건 '듣기를 버리지 않는다' 같아요. 독해는 지문에서 답의 근거가 되는 문장 찾는 연습이 가장 중요하다고 생각해요. 서민지쌤 강의는 저처럼 급하게 스킬을 올리실분들은 많은 도움이 되실거에요~ 그럼 다들 꼭 좋은결과 얻으시길 바랍니다^^
                    </div>
                </div> 
            </div>
        </div>

        {{--
        <div class="evtCtnsBox evtFooterWrap">
            <div class="evtFooter" id="infoText">
                <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

                <p># 수강안내</p>
                <ul>
                    <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다. (내강의실 > '수강 중 강좌'에서 확인 가능)</li>
                    <li>PC/휴대폰/태블릿에서 언제든 수강가능합니다.</li>
                    <li>커리큘럼은 사정에 따라 일부 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.</li>
                    <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                        스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                        팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>
                    <li>결제 완료 시 강의는 즉시 수강 시작되오니, 이 점 참고 부탁 드립니다.</li> 
                    <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li> 
                    <li>본 강의는 재수강,수강연장은 불가능합니다.</li>    
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
                    <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.</li>
                    <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
                    <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다.</li>
                </ul>

                <p># 기타유의사항</p>
                <ul>
                    <li>제공되는 사은혜택과 동영상은 구분하여 별도구매 불가합니다.</li>
                    <li>수강혜택으로 제공되는 기획전 수강인증코드는 수강기간이 종료되면 사용 불가합니다.</li>
                    <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
                    <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                    <li>김정환대표 강의 학습 Q&A에 질문하기는 자유롭게 등록 가능하오나 질문에 대한 답변은 
                        개별 답변이 아닌 질문유형별 FAQ 형식으로 제공될 예정이오니 이용시 양해 및 참조 부탁드립니다.
                    </li>
                </ul>

                <div>※ 이용문의 : 고객만족센터 1544-5006</div>
            </div>
        </div>
        --}}
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

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->
@stop