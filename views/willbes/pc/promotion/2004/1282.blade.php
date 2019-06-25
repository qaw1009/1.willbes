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
            background:#000 url("https://static.willbes.net/public/images/promotion/2019/06/1282_bg.jpg") no-repeat center top
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {}
        .wb_cts02 {padding-bottom:80px}
        .wb_cts02 .memo {width:1020px; margin:0 auto; background:#fff; padding:40px; text-align:left; line-height:1.5; font-size:14px; position:relative; color:#666}
        .memoTab {position:absolute; right:40px; top:40px; z-index:10}
        .memoTab li {margin-bottom:10px}
        .memoTab li a {display:block; width:40px; height:40px; background:#cfc3bb; font-size:0; text-indent:-9999px}
        .memoTab li a:hover,
        .memoTab li a.active {background:#61371e;}
        .memo .tabCts {margin-right:80px}
        .memo .ctsHead {background:#e5e5e5; padding:40px;}
        .memo .ctsHead h4 {font-size:30px; border-bottom:1px solid #61371e; padding-bottom:15px; margin-bottom:15px; color:#000}
        .memo .ctsHead h4 span {font-size:16px}
        .memo .ctsHead p {font-size:20px; font-weight:bold; color:#61371e !important; margin-bottom:15px}
        .memo .ctsHead li {list-style-type:disc; margin-left:20px;}
        .memo .tabCts .sTitle {border-bottom:1px solid #61371e; margin-bottom:10px; margin-top:30px}
        .memo .tabCts .sTitle strong {display:inline-block; padding:0 20px; height:30px; line-height:30px; color:#fff; background:#61371e}
        .memo .tabCts p {color:#000; margin:10px 0; font-weight:bold}

        .memoTabFixed {position:fixed; top: 40px; left:50%; margin-left:430px}

  </style>

  <div class="p_re evtContent NGR" id="evtContainer">
  
	<div class="evtCtnsBox wb_cts01">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1282_top.jpg" title="프로필"/>
	</div>

  
    <div class="evtCtnsBox wb_cts02">
	    <div class="memo">
            <ul class="memoTab">
                <li><a href="#tab01" class="active">1</a></li>
                <li><a href="#tab02">2</a></li>
                <li><a href="#tab03">3</a></li>                
                <li><a href="#tab04">4</a></li>
                {{--
                <li><a href="#tab05">5</a></li>
                <li><a href="#tab06">6</a></li>
                <li><a href="#tab07">7</a></li>
                <li><a href="#tab08">8</a></li>
                --}}
            </ul>

            <div id="tab01" class="tabCts">
                <div class="ctsHead NSK">
                    <h4 class="NSK-Black">2019 전남 구조 김OO <span class="NSK-Thin">수험번호 76230019</span></h4>
                    <p>"간절한 마음으로 노력하면 꿈은 이루어 집니다."</p>
                    <ul>
                        <li>총 수강기간: 10개월</li>
                        <li>하루 공부시간: 7 ~ 10시간</li>
                        <li>온라인 강의 수강시간: 하루 1-2시간씩 자습실에서 인강시청</li>
                        <li>가장 많이 투자한 과목: 소방학개론</li>
                        <li>운동 시작 시기: 꾸준히 하면서 체력학원은 1월에 다니기 시작</li>
                        <li>하루 운동시간: 1시간 ~ 1시간 30분</li>
                    </ul>
                </div>
                <div class="sTitle"><strong>첫 시작</strong></div>
                <div>
                    군 생활을 하며 소방공무원이라는 것을 알게 된 후 부대에서 근무하며 소방학개론을 틈틈이 보긴 했지만 제대로 공부를 시작한 것은 
                    전직교육기간인 18년6월부터 였습니다. 저는 군 생활을 10년 이상을 하여 전직기간이 10개월이었고 18년 하반기시험을 목표로 집 앞 
                    독서실에서 공부를 하였습니다. 하지만 영어점수가 안되어 하반기 시험을 불합격 하였고, 마지막으로 최선을 다하자는 생각으로 국방부 
                    과정으로 윌비스 고시학원에서 공부를 시작하게 되었습니다. 18년 11월부터 국방부과정으로 주말반으로 국어, 생활영어, 소방학개론을 공부하였고 
                    평일에는 최대한 복습을 하였습니다. 그리고 19년 1월부터 본격적으로 평일과정으로 수업을 시작하였습니다. 
                </div>
                <div class="sTitle"><strong>과목별 학습법</strong></div>
                <div>
                    <p>국어</p>
                    김세령교수님이 하라는 대로만 갔습니다. 오랜만에 하는 공부였지만 국어는 우리나라말이고 중고등학교때 국어과목은 그다지 못하는 편은 아니었기 때문에 
                    어느 정도 자신감도 있었습니다. 하지만 문제풀이를 시작하자 정말 상상도 할 수 없을 정도로 점수가 안 나왔고, 점수가 안 나와 좌절해 있을 때 
                    세령교수님이 직접 면담도 해주시고 동기부여를 정말 많이 주셨던 것 같습니다. 국어는 감으로 푸는 것이 아니라 “문법” 말 그대로 암기과목이라고 
                    하신말씀대로 최대한 많이 외우려고 노력했습니다.
                    <p>영어</p>
                    개인적으로 가장 자신이 없는 과목이었습니다. 18년 하반기시험에서도 영어과락을 받았었고 잘하지 못하다 보니 혼자 공부할 때는 자신 있는 
                    소방학개론만 계속 공부하고 영어공부는 안 하는 학습편식을 했었던 것 같습니다. 하지만 학원에 온 후 기초부터 다시 시작했고 인칭부터 비동사까지 
                    정말 처음부터 다시 시작했습니다. 그렇게 알아간 영어지식이 저에게 영어에 흥미를 주었던 거 같고, 공채와는 다른 생활영어 특성상 속담이나 
                    구동사등이 많은데 이현정교수님이 시험에 나올 것 같은 속담 구동사등을 정해주시고 자료를 배포해주셨고 암기를 했던 것이 큰 도움이 되었던 것 같습니다. 
                    <p>소방학개론</p>
                    소방학개론은 개인적으로 가장 자신 있는 과목이었습니다. 18년 하반기에 난이도가 쉬웠다고 하지만 100점을 맞았었고, 
                    공부시간 중에 가장 많이 투자한 과목이었습니다. 하지만 책만 보고 공부했었기 때문에 한계는 있었고 계산문제는 전혀 알지 못했습니다. 
                    김종상교수님에게 소방학개론 수업을 들으면서 가장 좋았던 점은 다양한 소방계산문제에 대해 마스터 할 수 있었던 것이었습니다. 
                    계산문제에 대해 궁금한 점이 있으면 정말 쉽게 알려주셨고 큰 도움이 되었던 것 같습니다.
                </div>
                <div class="sTitle"><strong>불꽃소방팀에서의 수험생활</strong></div>
                <div>
                    학원 다니면서 가장 좋았던 점은 학원전용 자습실이 있어서 정말 좋았던 것 같습니다. 자습실에서 아침7시부터 밤12시까지 공부할 수 있고, 
                    이동시간을 줄일 수 있었습니다. 체력학원도 학원과 연계 되어있는 아이언짐에서 운동을 하였고 훌륭한 코치님들의 지도아래 저렴하게 운동할 수 있었습니다. 
                    또한 학원에 소방전담 선생님이 4층에 계셔서 영어단어 확인 이라던지 공부 플랜짜기 등 여러 가지 학습적인 면에서 도움을 주셨고, 
                    공부를 하다가 힘들거나 지칠 때 상담을 통해 멘탈적인 면에서도 많은 도움을 주셨던 것 같습니다. 아직 최종합격을 하진 않았지만 
                    이 자리를 빌어 다시 한 번 많은 분들께 감사드리고, 꼭 최종합격하여 저의 도움을 필요로 하는 여러 사람들에게 도움이 될 수 있는 구조대원이 되도록 하겠습니다.
                </div>
                <div class="sTitle"><strong>나만의 암기법</strong></div>
                <div>
                시간이 약간 오래 걸리지만 하루에 한번은 소방학개론 모든 내용을 훑듯이 본다. 영어는 무조건 외운다.(답 없음).
                국어는 만화로 된 책으로 된 책을 보았다.(고대가요부터 한권으로 된 만화책이 있음)
                </div>
                
            </div>

            <div id="tab02" class="tabCts">
                <div class="ctsHead NSK">
                    <h4 class="NSK-Black">2019 서울 구급 이OO <span class="NSK-Thin">수험번호 220216</span></h4>
                    <p>"기초가 부족하다면, 학원 커리큘럼의 도움을 받아보세요."</p>
                    <ul>
                        <li>총 수강기간: 하반기 대비 6주 + 3개월</li>
                        <li>하루 공부시간: 8 ~ 10시간</li>
                        <li>온라인 강의 수강시간: 하루 평균 2 ~ 3시간</li>
                        <li>가장 많이 투자한 과목: 국어</li>
                        <li>운동 시작 시기: 2월</li>
                        <li>하루 운동시간: : 2,3월은 1시간, 4월 부터는 2시간 이상 꾸준히 학습</li>
                    </ul>
                </div>
                <div class="sTitle"><strong>과목별 학습법</strong></div>
                <div>
                    <p>국어</p>
                    국어는 김세령 교수님의 문법이론강의와 문학이론강의1/2정도를 실강으로 들었습니다. 2018년도 하반기 6주 공부는 준비 없이 갑자기 서울생활을 하게 되어 
                    목금토일 8시간씩 실강을 듣고 실강 때 내준 숙제를 하고 복습하는 시간도 굉장히 부족했음. 특히 기본 이론 지식 없이 6주 주말 이론반과 5주 완성 
                    문제풀이반을 병행했기 때문에 문제풀이 시 생소한 것들이 들어와 머릿속에서 섞이면서 제대로 정리가 되지 않았음. 하지만 첫 시험에 대한 부담감과 
                    스트레스가 크지 않아 편안히 준비할 수 있었고, 취약했던 문법부분을 김세령교수님의 세령국어를 수강하면서 다행히 기초를 닦는데 큰 도움이 되어 
                    2018년 하반기에 100점을 맞을 수 있었음. 국어는 무조건 실강과 복습에 중점을 두었고 그날 들은 수업 중 모르는 내용이 없도록 실강 시 많은 질문을 했었음. 
                    윌비스는 실강 인원이 비교적 적고 김세령 교수님이 학생 한 명 한 명을 열정적으로 가르치시기 때문에 좋은 결과를 받을 수 있었음. 
                    2018년 하반기 시험 후 3개월 정도 일을 하면서 공백기가 있어 배운 것을 많이 잊어버린 상태로 알바와 병행하며 공부를 진행하여 기출문제 풀이 시 어려움이 컸음. 
                    그러나 1~2월에 이론 강의를 다시 한 번 실강으로 듣게 되면서 이론 개념을 다시 잡았음. 기본적으로 국어는 학원에서 시행하는 7~3월(9개월) 커리큘럼을 
                    내 가능한 시간대로 4개월 정도로 줄여서 다른 인원들과 진도가 맞게 최대한 빈틈이 없도록 노력했음. 
                    <p>영어</p>
                    영어는 생활영어로 2018년 하반기 5주간, 금요일4시간 수업으로 문제풀이만 했고 고등학교 때 외웠던 단어들을 다시 외우면서 기억을 되새겨보는 연습을 했습니다. 
                    2019년 상반기에도 12주간 금요일4시간 수업으로 문제풀이만 했고 단어 암기와 생활영어 관용어 암기에 중점을 뒀습니다. 
                    영어는 2번의 시험 모두 90점으로 점수 향상이 저에게는 어려운 과목이었습니다. 점수 변동이 크지 않은 과목이기 때문에 영어보다는 소방학개론에 
                    더 비중을 두고 준비했습니다. 지금 생각해보면, 고등단어 암기에 더 많은 노력을 했었으면.. 하는 아쉬움이 남습니다.
                    <p>소방학개론</p>
                    소방학개론은 2018년 하반기에 이론을 절반밖에 모르는 상태로 시험을 보게 되었습니다. 거기에 개인 실수까지 더해져 이 과목으로 인해 시험에 떨어지게 되었습니다. 
                    2019년 상반기에는 개론 뒷부분 이론수업을 다시 인강으로 메우고 학원 커리큘럼대로 문제풀이와 동형모의고사, 
                    기출문제를 반복하여 풀어 보다 좋은 점수를 얻게 되었습니다.
                </div>
                <div class="sTitle"><strong>나만의 암기법</strong></div>
                <div>
                반복학습, 1회독 때는 알지 못했던 개념들이 2회독 이상 시에는 유기적으로 연결되어 답을 저절로 이해하게 되었습니다.
                </div>
                <div class="sTitle"><strong>체력준비</strong></div>
                <div>
                    저는 이전 직업으로 체력 베이스가 있는 어느 정도 상태였지만, 누구든지 스트레칭으로 좌전굴을 미리 만점으로 만들고 달리기 연습을 한다면 체력학원은 
                    3개월 정도면 충분할 것으로 예상됩니다.
                </div>
                <div class="sTitle"><strong>수험생들에게 하고 싶은 말</strong></div>
                <div>
                    일단, 2018~2019년 소방시험지를 풀고 본인이 부족한 부분을 찾으십시오. 노베이스(기본이론개념이 전혀 없는 상태)이신 분들은 학원 커리큘럼에 따라 
                    진행하는 것이 중요합니다. 준비 없이 산발적으로 기출-이론-기출 등으로 왔다갔다하면 개념 정리가 되지 않기 때문에 이해하는데 시간이 오래 걸립니다. 
                    수험기간을 줄이고 싶다면 먼저 기본 이론을 1~2회독 하시고 기출문제를 풀고 시험 1개월 전에는 동형 모의고사로 시험시간과 같은 시간에 문제를 풀어보며 
                    마인드컨트롤을 하십시오. 승리하십시오.!!!
                </div>
            </div>

            <div id="tab03" class="tabCts">
                <div class="ctsHead NSK">
                    <h4 class="NSK-Black">2019 인천 공채 신OO <span class="NSK-Thin">수험번호 101555</span></h4>
                    <p>"중요한 것은 선택과 집중! 오직 현재에 충실하자."</p>
                    <ul>
                        <li>총 수강기간: 2년 6개월</li>
                        <li>하루 공부시간: 5 ~ 7시간</li>
                        <li>온라인 강의 수강시간: 없음</li>
                        <li>가장 많이 투자한 과목: 영어</li>
                        <li>운동 시작 시기: 4월(시험 임박 해서는 격일로 헬스)</li>
                        <li>하루 운동시간: : 2시간 (필기시험 후, 체력학원 등록 하여 준비)</li>
                    </ul>
                </div>
                <div class="sTitle"><strong>과목별 학습법</strong></div>
                <div>
                    <p>국어</p>
                    <span class="underline strong">실용한자 20개, 고사성어 10개, 어휘 20개 암기 → 문법 1파트 스킵 → 독해 1파트 5문제 풀기</span><br>
                    김세령 선생님은 모든 부분에서 탁월하다. 특히 문법과 고전파트에서 군계일학이다. 본 강의만 제대로 복습하고 자기화한다면 공채든 특채든 고득점은 문제없다.
                    평소에 한자(어휘, 고사성어), 실용언어 어휘를 꾸준히 조금씩 반복해서 보았다. 언어과목은 웬만하면 오전 중에 계획한 공부를 모두 끝마쳤다. 
                    가장 머리회전이 가장 빠르고 실제 시험에서도 오전에 국어 시험을 보기 때문이다.
                    <p>한국사</p>
                    <span class="underline strong">사건별 요약 / 수시로 암기</span><br>
                    배준환 선생님 강의는 무척 재미가 있어서 집중해서 강의를 듣게 된다. 그 와중에 역사적 사건을 스토리텔링으로 설명하셔서 수업시간만 집중하더라도 
                    학습한 내용이 기억에 많이 남는다.
                    우선 국사는 전체흐름이 중요하지만 세세한 사건별 정리가 더 중요하다. 실제로 시험 1달 전까지 모의고사 점수가 과락에서 60점이 전부였다. 
                    무리하게 전체흐름을 위주로 공부하면 세세한 부분을 놓치기 때문에 시간순서 문제나 인물세부문제는 틀릴 수밖에 없다. 
                    조그마한 강줄기가 모여서 큰 강을 이루듯이 사건별 정리가 모이면 전체흐름까지도 자연스레 꿰뚫을 수 있으니 실전에서 만점은 문제없다.
                    <p>영어</p>
                    <span class="underline strong">단어 100개 암기 → 문법 1파트 스킵, 관련문제 풀기 → 독해 1파트 5문제 풀기</span><br>
                    이현정 선생님 강의는 학생들이 어려움을 느끼는 문법이나 독해를 눈높이에 맞게 가르치신다. 
                    문제 풀이할 때 해석을 하면서 동시에 주요단어나 문법을 가르쳐주셔서 수업 중에 알려주신 부분을 복습하는 것만으로도 고득점이 얼마든지 가능하다.
                    타학원 모의고사나 강의에 기웃 거리지 말고, 본 강의에 집중하는 것을 추천한다.
                    <p>소방학개론</p>
                    <span class="underline strong">주요빈출 내용, 내용이 비슷해 구분이 필요한 내용 요약 암기</span><br>
                    김종상 선생님은 소방 전문가이다. 여타의 소방학 선생님과는 차별적이고, 강의 내용이 다소 어렵다고 느낄 수 있으나 더 멀리 보면 소방관으로서 
                    당연히 알아야 할 내용들이다.
                    강의내용이 좀 깊을 수도 있으니 수위조절은 본인이 판단해야 한다. 전공과목은 이해도 필요하나 대부분 단순암기가 많다. 
                    굵직한 내용은 누구나 아는 부분이기 때문에 쉬우나 내용이 비슷해서 혼동하기 쉬운 내용은 반드시 따로 정리해서 수시로 눈에 익혀야 고득점 이 가능하다.
                </div>
                <div class="sTitle"><strong>당락을 좌우하는 영어</strong></div>
                <div>
                    영어는 전직렬 통틀어 당락을 좌우하는 과목이다. 다른 과목은 한글이라서 잘하는 사람들이 많고 어떻게든 물어볼 수가 있으나 
                    영어는 외국어라서 꾸준히 일정시간을 투자하지 않으면 문제 자체가 생소해지는 과목이므로 매일 아침마다 단어와 문법, 독해를 반복해야만 한다. 
                    공부 할 시간이 나지 않는다면 단어라도 익히고 감을 잃지 않으려고 노력해야 한다.
                </div>
                <div class="sTitle"><strong>나만의 암기법</strong></div>
                <div>
                    우리시험은 얼마만큼 잘 외웠는가를 평가하는 것이 대부분이다. 아는 내용이더라도 꾸준히 눈에 익혀야 하므로 요약노트가 가장 효율적이다. 
                    특히 중요한 빈출내용, 자주 잊혀지는 부분, 모의고사 틀린 내용은 필히 요약노트에 기록해서 손에 들고 다니면서 보아야 한다. 
                    하지만 평소에 너무 많이 요약노트에 시간을 할애해서는 안되고 꾸준히 기본을 공부하면서 지하철이나 자투리 시간에 일정 파트를 나눠서 볼 것을 추천한다. 
                    평소에 필요한 내용들을 잘 기록하고 시험 전날 요약노트 만 집중해서 보고 마무리하면 가장 이상적이다.
                </div>
                <div class="sTitle"><strong>체력준비</strong></div>
                <div>
                    저는 이전 직업으로 체력 베이스가 있는 어느 정도 상태였지만, 누구든지 스트레칭으로 좌전굴을 미리 만점으로 만들고 달리기 연습을 한다면 
                    체력학원은 3개월 정도면 충분할 것으로 예상됩니다.
                    헬스는 격일 2시간씩 했다. 운동을 좋아해서 15년 전부터 헬스를 해왔다. 
                    경량 웨이트나 단순 운동은 매일 해도 상관없으나 중량 웨이트는 매일 하는 것은 추천하지 않는다. 
                    우선 우리시험은 필기가 75%이므로 무엇보다 필기점수가 가장 중요하다. 따라서 필기공부하는데 운동이 방해가 되어서는 안된다. 
                    대신 격일에 한 번씩 빠지지 말고 운동하고, 나는 필기시험 이 끝나고 체력시험 1달 남은 상황에서 체력학원을 등록해서 6종목을 다 연습하기에는 쉽지가 않았다. 
                    웬만하면 2달 전에 체력학원을 등록해서 체력시험을 준비하는 것을 추천한다.<br>
                    <br>
                    [종목별 운동방법]<br>
                    <br>
                    1) 약력/배근력<br>
                    일단 기계로 측정하는 종목은 무조건 기계를 많이 잡아보는 것이 유리하다. 평소에 체력학원에서 악력과 배근력 운동을 하고 꾸준히 테스트기로 측정을 해볼 것을 권유한다.<br>
                    <br>
                    2) 윗몸 일으키기<br>
                    크런치를 많이 해야 한다. 실제 테스트를 해보면 복근만 쓰는 것이 아니다. 
                    특히 목근육과 허벅지 근육은 복근과 함께 쓰이고 실제 윗몸일으키기 시험에서 마지막 힘이 빠질 때 목과 허벅지로 끌어당겨야 1점이라도 더 받을 수가 있다.<br>
                    <br>
                    3) 좌전굴<br>
                    발레리나들이 허리높이의 바에 다리를 올리고 상체를 숙이는 장면을 본 적이 있을 것이다. 자기 가슴이 무릎에 자연스럽게 닿는다면 무조건 만점이다. 다만, 타인이 상체를 누르면 다칠 수도 있기 때문에 혼자서 연습해야 한다.<br>
                    <br>
                    4) 제자리 멀리뛰기 <br>
                    이 종목은 자세가 절대적이다. 점프력은 타고나야 한다. 그러나 자세만 제대로 잡으면 10센티미터는 더 멀리 갈 수 있다. 무조건 잘 뛰는 사람의 자세를 연구하고 연습을 하되 너무 많이 하면 허리나 무릎이 다칠 수도 있으니 머릿속으로 시뮬레이션을 돌려서 자세 연습을 먼저 하기를 권유한다.<br>
                    <br>
                    5) 왕복 오래달리기<br>
                    20미터를 뛰고 턴을 할 때 시간감각이 중요하다. 뛸수록 시간간격이 줄어들기 때문에 감각적으로 턴을 해서 뛰어야 한다. 주 2회 이상 왕복오래달리기 연습을 해보아야 한다.
                </div>
                <div class="sTitle"><strong>수험생들에게 하고 싶은 말</strong></div>
                <div>
                    2018년 12월 첫 모의고사 점수는 총 186점이었다. 물론 일을 하다가 공부를 시작해서 감이 없었던 것도 있지만 그때는 다소 충격적이었다. 중요한 것은 선택과 집중이다. 공부를 하다 보면 무수히 많은 좌절과 시련이 온다. 이것을 스스로 극복하지 못하면 장수생이 되거나 결국 시험을 포기 하고 만다. 합격은 평소에 묵묵히 준비하다 보면 눈치 챌 여지도 없이 갑자기 툭 다가오는 것 같다. 
                    수험생활을 할 때 시험결과는 신에게 맡겨두고 오직 현재에 충실하기를 바란다. 지금 공부하고 있는 각 과목별 문제에 집중하고 꾸준히 요약노트를 보고 운동하다 보면 어느덧 합격수기를 쓰고 있는 자신 바라보게 될 것이다.
                </div>
            </div>

            <div id="tab04" class="tabCts">
                <div class="ctsHead NSK">
                    <h4 class="NSK-Black">2019 전남 구조 이OO <span class="NSK-Thin">수험번호 76230072</span></h4>
                    <p>"못해서 안하는것이 아니고 안해서 못하는 것"</p>
                    <ul>
                        <li>총 수강기간: 5개월</li>
                        <li>하루 공부시간: 12시간</li>
                        <li>온라인 강의 수강시간: 하루에 1~2시간씩 한달 정도 수강</li>
                        <li>가장 많이 투자한 과목: 국어</li>
                        <li>운동 시작 시기: 10월</li>
                        <li>하루 운동시간: : 2시간 (필기시험 후, 체력학원 등록 + 개인운동 병행)</li>
                    </ul>
                </div>
                <div class="sTitle"><strong>과목별 학습법</strong></div>
                <div>
                    <p>국어</p>
                    가장 걱정했던 과목으로 문법, 어휘, 맞춤법 등 문학과 비문학을 제외한 모든 분야에서 상당히 부족했습니다.
                    문법은 말 그대로 규칙이므로 반드시 외워야 할 부분은 외우면서 이틀에 한번씩 무조건 반복 학습 했습니다. 
                    문법이 가장 어려울 듯 했지만, 시작해보니 어휘와 맞춤법, 띄어쓰기가 훨씬 어렵게 느껴졌습니다. 어휘는 소방에서 빈출이 높은 어휘 위주로 매일 반복해서 눈에 익혀두었습니다. 
                    어휘는 정말 혼동되는 단어가 많으니 반드시 매일매일 눈이 익히는 것이 중요합니다. 
                    한자성어는 저도 과감하게 버리려고 생각했으나 소방에서 나오는 한자성어는 대체로 쉬운 한자성어가 나오기 때문에 공부하는 것을 추천 드립니다. 특히 이번 19년도
                    전반기 국어시험에서는 음을 적어주지 않고 한자 그대로 나왔기 때문에 반드시 한문을 읽을 줄 알아야 했습니다.비문학은 자신 있는 부분이었기 때문에 토론의 종류 등 다소 생소했던 부분만 집중적으로 공부하였습니다.
                    문학은 고전문학 위주로 공부하였고, 현대문학은 어느 정도 익숙한 작품들이 많아 생소한 작품만 공부하고 나머진 정독하는 방식으로 공부하였습니다. 
                    지식국어는 무조건 암기! 필기시험을 한달 남긴 시점에서 모의고사를 집중적으로 응시하였습니다. 저는 오답노트를 따로 만들지 않고 틀린문제를 빈 공간에 필기하며 공부하였습니다.
                    <p>영어</p>
                    중3 필수단어 및 문법, 소방용어, 속담, 구동사, 숙어 이것만 매일 외웠습니다. 스팰링은 외우지 않고 보면 읽고 해석할 수 있을 정도로 달달 외웠습니다. 
                    생활영어가 요즘 독해 빈도가 높아졌다고는 하나 어휘를 많이 알고 있으면 해석하는데 어렵지 않기 때문에 중3 필수단어는 반드시 모두 외워 두었습니다. 
                    시간이 된다면 수능영단어도 함께 학습 하시면 좋습니다. 공부하면서 가장 어려웠던 것은 구동사. 
                    구동사는 숙어와는 달리, 관용어처럼 되어있어 구성된 단어로만은 의미를 유추할 수 없고 반드시 그대로 외워야 합니다. 
                    소방용어는 염좌, 홍수, 태풍 등등 기본적인 단어부터 심폐소생술, 협심증 등 평소 접하지 않은 단어들도 나오니 반드시 공부해두어야 합니다. 
                    구동사와 소방용어가 나오는 문제는 지문해석 즉 독해는 쉬우나 보기를 몰라 틀리는 경우가 많습니다. 모의고사 풀이 중 막히는 단어는 체크했다가 암기하고, 
                    모의고사로 마무리 하는 시점에서도 틀린 문제만 집중적으로 하는 것이 아니라 첫 줄에 적어놓은 중3 필수단어 및 문법, 소방용어, 속담, 구동사, 숙어를 
                    시험보기 하루 전에도 외웠습니다. 이렇게 하니 실제 시험당일에는 영어 지문을 읽으면서 머릿속으로 바로 해석이 가능하게 되었습니다.
                    <p>소방학개론</p>
                    인강으로 한달 동안 동영상강의 1회 완강 및 암기. 교재에 중요한 부분을 체크하고 노트에 따로 필기하여 서브노트를 만들었습니다. 
                    이렇게 만든 서브노트 내용은 모두 암기하였습니다, 하루 8시간 인강 시청 후 다음날 인강 내용을 서브노트에 정리하여 외우는 방식으로 한달 안에 끝내고 
                    필기시험 전까지 소방조직, 재난관리, 연소이론, 화재이론, 소화이론을 하루에 한 파트씩 로테이션으로 꾸준히 암기한 것을 재 확인하였습니다.
                    (계산문제는 매일 꾸준히 풀어봄)
                </div>
                <div class="sTitle"><strong>나만의 암기법</strong></div>
                <div>
                    1단계 : 강의시간에 필기한 내용이나 공부하며 암기해야 하는 부분을 노트에 정리<br>
                    2단계 : 정리된 내용을 공노트에 써가며 암기<br>
                    3단계 : 암기한 내용을 공노트에 생각나는 데로 써가며 정리된 노트와 비교하며 확인<br>
                </div>
                <div class="sTitle"><strong>체력준비</strong></div>
                <div>
                    1)  18년 10월부터 필기시험 전까지<br>
                    07:00 ~ 08:00 : 아침운동(달리기) <br>
                    22:00 ~ 23:30 : 저녁운동(달리기, 윗몸, 생활근력운동)<br><br>
                    2) 필기시험 가채점 후 소방체력학원 등록<br>
                    주 5일 ~ 7일(4일 학원통제, 3일 개인운동) - 소방체력 <br>
                </div>
                <div class="sTitle"><strong>수험생들에게 하고 싶은 말</strong></div>
                <div>
                    소방공무원 시험이 타 직렬 시험보다 쉬운 건 사실이나 이 역시 공무원 시험임을 반드시 명심하고 공부를 해야 합니다.
                    특히 특전사출신 구조특채 지원예정 인원이 소방공무원 시험을 굉장히 쉬운 시험으로 인식하는 경향이 있습니다.
                    특전장교 출신으로 공부를 해 본 경험으론 절대 만만한 시험이 아닙니다. 사실 공부하기 전까진 저도 쉬운 시험으로 인식하고 있었습니다. 
                    본인의 좌우명은 '못해서 안하는것이 아니고 안해서 못하는 것' 입니다. 꼼꼼히 준비한다면 쉬운 시험이 될 것이고 쉽게 생각하고 준비하지 않는다면 풀어낼 수 없는 시험이 될 것입니다. 
                    그리고 공부하면서 모의고사 준비기간이 되면 반드시 시간을 체크하며 실전에 대비 하는 것이 중요합니다. 
                    특채는 공채와는 다르게 시간을 확보할 수 있는 과목이 소방학개론 한 과목입니다. 저는 영어가 시간이 오래 소요되어 소방학개론에서 줄인 시간을 영어에 투자하려고 소방학개론(10분), 국어(20분), 영어(30분) 순으로 연습하였습니다. 막상 실제 시험에서는 너무 급하게 풀어내는 바람에 충분히 맞춰야 하는 3문제를 실수를 하였습니다. 실제 시험이라 여유를 갖는다는 것은 다소 무리가 있을 수 있겠지만 시간분배 연습을 충분히 하여 실제 시험에서는 여유를 갖고 문제를 해결하는 능력을 기르는 것도 중요하다고 생각됩니다.
                    체력도 꾸준히 준비해야 합니다. 특전사 체력은 근력과 폐활량 위주라 윗몸과 왕복오래달리기에선 유리 할 수 있으나 악력, 좌전굴, 배근력, 제자리멀리뛰기는 방법과 요령을 배워야 하며 장비로 측정하는 종목도 있어 소방전문체력 학원에서 전문적으로 숙달 하는 것을 추천합니다. 의외로 만점자가 없으며 고득점 하는 인원도 많지 않습니다. 공채인원은 특히 체력에서 과락하는 인원이 상당히 많으니 준비를 더 잘해야 합니다. 
                    소방체력 의외로 쉽지 않습니다. 결국 필기, 체력 2가지 모두 반복 숙달을 얼마나 꾸준히 끈질기게 하느냐, 그것이 시험의 당락을 결정한다고 생각됩니다.
                </div>
            </div>
        </div>
    </div>  
</div>
<!-- End Container -->

<script type="text/javascript">	
	$(function(e){
		var targetOffset= $("#evtContainer").offset().top;
		$('html, body').animate({scrollTop: targetOffset}, 500);
		/*e.preventDefault(); */   
	});

    $(document).ready(function(){
        $('.memoTab').each(function(){
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

                e.preventDefault()})})}
        ); 

        /* 스크롤배너*/
        $( document ).ready( function() {
            var jbOffset = $( '.memoTab' ).offset();
            $( window ).scroll( function() {
            if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.memoTab' ).addClass( 'memoTabFixed' );
            }
            else {
                $( '.memoTab' ).removeClass( 'memoTabFixed' );
            }
            });
        });
</script>
@stop