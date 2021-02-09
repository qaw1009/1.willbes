@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtMenu {background:#fff; width:100%; border-bottom:1px solid #edeff0; border-top:1px solid #edeff0}
    .tabs {width:100%; max-width:720px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:25%}
    .tabs li a {display:block; text-align:center; font-size:14px; line-height:1.5; padding:15px 0; color:#999; font-weight:bold; letter-spacing:-1px;}
    .tabs li a:hover,
    .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
    .tabs:after {content:""; display:block; clear:both}

    .evtCurri {text-align:left; padding:20px;word-break: keep-all; background:#f5f5f5}
    .evtCurri h5 {color:#414d4c; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evtCurri .evtCurriTxt01 {font-size:1.6rem;line-height:1;}
    .evtCurri .sample {margin-top:50px}
    .evtCurri .sample li {display:inline; float:left; width:49%; padding:15px 0; margin-right:1%; margin-bottom:10px; border-radius:10px; 
        background: #acacac; color:#fff; font-size:16px; font-weight:600; text-align:center}
    .evtCurri .sample li p {margin-bottom:15px;}
    .evtCurri .sample li a {display:inline-block; padding:5px 10px; font-size:14px; margin:0 2px 5px; border-radius:4px; background:#000; color:#fff;}
    .evtCurri .sample li a:hover {background:#fff; color:#000}
    .evtCurri .sample li:last-child {margin:0}
    .evtCurri .sample:after {content:""; display:block; clear:both}
    .evtCurri .curriculum {margin:30px 0}
    .evtCurri .curriculum li.cTitle {list-style:none;color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;} 
    .evtCurri dl {margin-top:30px;}
    .evtCurri dl:first-child {margin:0}
    .evtCurri dt {font-size:16px; font-weight:900; color:#414d4c; margin:30px 0 10px}
    .evtCurri dt:first-child {margin:0 0 10px}
    .evtCurri dd {margin-bottom:10px; line-height:1.4}    

    .evtCurri .evtCurriTxt02 {font-size:14px; line-height:1.4; letter-spacing:-1px; color:#333; margin:20px auto 0; text-align:left}

    .evt09 .columns {width:95%; margin:50px auto 0;
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

    .evtFooter {padding:30px 20px; text-align:left; color:#3a3a3a; background:#E1E1E1; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px}

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding:10px 0; z-index:100}
    .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    .video-container-box {width:100%; z-index:1}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:0; height:0; overflow: hidden;}
    .video-container iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
        background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2);left:0; z-index:10;
        text-align:center;
    }

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {

    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {

    }
    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {
        .evtCurri h5 br {display:none}
        .evtCurri .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}
    }

</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_top.jpg" alt="지텔프 서민지">
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_01.jpg" alt="지텔프 서민지 약력">
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
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_02.jpg" alt="런칭 기념 이벤트" >
        </div>  
    </div>  

    <div id="tab02">
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_03.jpg" alt="공인 어학 능력 시험" >
        </div> 

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_04.jpg" alt="지텔프 선택해야 하는 명확한 이유" >
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_05.jpg" alt="지텔프는 어학시험일까죠?" >
        </div>  

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_06.jpg" alt="1초 비법 서민지" >
        </div> 

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_07.jpg" alt="민지텔프" >
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/sYw3MWvWhwM?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_07_01.jpg" alt="" >
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/BT7sfyECChA?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_07_02.jpg" alt="" >
        </div>  

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_08.jpg" alt="가이드라인" >
        </div> 
        
        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1798_09.jpg" alt="서민지 지텔프 수강 후기" >
        </div>
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evtCurri">
            <h5 class="NSK-Black">
                <div>억대연봉 세일즈 마케팅</div>
            </h5>
            <div class="evtCurriTxt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            <ul class="sample">
                @if(empty($arr_base['promotion_otherinfo_data']) === false)
                    @php $i = 1; @endphp
                    @foreach($arr_base['promotion_otherinfo_data'] as $row)
                        <li>
                            <p>{{$i}}강 맛보기 수강 ▼</p>
                            <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");'>고해상도 ></a>
                            <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");'>저해상도 ></a>
                        </li>
                        @php $i += 1; @endphp
                    @endforeach
                @else
                    <li><a href="#none">1강 맛보기 수강 준비중 ></a></li>
                    <li><a href="#none">2강 맛보기 수강 준비중 ></a></li>
                @endif
            </ul>

            <div class="evt05Txt02">
                * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
            </div>

            <div class="curriculum">
                <dl>
                    <dt>INTRO</dt>
                    <dd>1강. 안녕하세요, 민지텔프의 서민지입니다.</dd>

                    <dt>CHAPTER 1. 기초부터 차근차근, 왕초보 탈출하자</dt>
                    <dd>2강. 쌩기초 영어(1)</dd>
                    <dd>3강. 쌩기초 영어(2)</dd>
                    <dd>4강. 쌩기초 영어(3)</dd>

                    <dt>CHAPTER 2. 영어에서 Should의 중요성</dt>
                    <dd>5강. Should 생략 동사</dd>
                    <dd>6강. Should 생략 형용사</dd>
                    <dd>7강. Should 생략 문제풀이</dd>

                    <dt>CHAPTER 3. 가정법, 미리 겁내지 마세요! 절대 어렵지 않습니다!</dt>
                    <dd>8강. 가정법(1) 과거 개념</dd>
                    <dd>9강. 가정법(1) 과거 문풀</dd>
                    <dd>10강. 가정법(2) 과거완료 개념</dd>
                    <dd>11강. 가정법(2) 과거완료 문풀</dd>
                    <dd>12강. 가정법 실전 문제 문풀</dd>

                    <dt>CHAPTER 4. 과거부터 미래까지, 영어 시제 한 번에 끝내자! </dt>
                    <dd>13강. 시제(1) 현재진행 개념</dd>
                    <dd>14강. 시제(1) 현재진행 문풀</dd>
                    <dd>15강. 시제(2) 과거진행 개념</dd>
                    <dd>16강. 시제(2) 과거진행 문풀</dd>
                    <dd>17강. 시제(3) 미래진행 개념</dd>
                    <dd>18강. 시제(3) 미래진행 개념</dd>
                    <dd>19강. 시제(4) 현재완료진행 개념</dd>
                    <dd>20강. 시제(4) 현재완료진행 문풀</dd>
                    <dd>21강. 시제(5) 과거완료진행 개념</dd>
                    <dd>22강. 시제(5) 과거완료진행 문풀</dd>
                    <dd>23강. 시제(6) 미래완료진행 개념</dd>
                    <dd>24강. 시제(6) 미래완료진행 문풀</dd>

                    <dt>CHAPTER 5. 잠깐! 그럼 우리 살짝 연습해볼까요?</dt>
                    <dd>25강. 실전 문제풀이1</dd>
                    <dd>26강. 실전 문제풀이2</dd>

                    <dt>CHAPTER 6. 들어도 헷갈리는 관계대명사, 이 팁이면 완벽 정리!</dt>
                    <dd>27강. 관계사(1) 관계대명사 7팁</dd>	
                    <dd>28강. 관계사(1) 관계대명사 문풀</dd>

                    <dt>CHAPTER 7. 찍기도 알아야 찍는다! 준동사 꿀팁</dt>
                    <dd>29강. 준동사 찍기 팁과 문풀</dd>

                    <dt>CHAPTER 8. 배운걸 적용하여 실전 문제 풀이!</dt>
                    <dd>30강. 테스트 1 문제풀이</dd>
                    <dd>31강. 테스트 2 문제풀이</dd>
                    <dd>32강. 테스트 3 문제풀이 / 종강</dd>
                    <dd>33강. 추가자료 (문법 모의고사,문법 총정리)</dd>
                </dl>
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
    <div class="evtCtnsBox" id="infoText">
        <div class="evtFooter">
            <h3 class="NSK-Black">[이용안내]</h3>

            <p># 사전예약 혜택</p>
            <ul>
                <li>사전예약 혜택은 2021년 2월 15일 결제완료자에 한해서만 적용됩니다.</li>
                <li>사전예약 혜택은 수강기간 1개월이 무료 제공됩니다.<br>
                    수강기간 추가 혜택은 3월 3일 일괄 적용예정
                </li>  
            </ul>

            <p># 소문내기 이벤트</p>
            <ul>
                <li>발표 시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
                <li>당첨자 발표는 2021년 3월 3일(수) 공지사항 참조</li>
            </ul>

            <p>※ 문의안내 : 1544-5006</p>
        </div>    
    </div> 
    --}}
</div> 
<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/171846" target="_blank">
        [온라인강의] 신청하기 >
        </a>
    </div>
</div>

<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
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
                $is_chk.focus();
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
</script>

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop