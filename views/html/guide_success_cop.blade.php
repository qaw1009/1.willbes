@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="{{ site_url('/home/html/guide_cop') }}">경찰가이드</a></li>
                            <li><a href="{{ site_url('/home/html/guide_success_cop') }}">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>초보합격전략</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mocktest INFOZONE c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 초보합격전략
            </div>
        </div>

        <div class="willbes-Leclist c_both mt10">
            <div class="w-cop-Guide">
                <div class="willbes-cop-success-guide GM">
                    <ul class="tabWrap tabcsDepth1 tab_cop_success_Guide p_re NSK">
                        <li class="w-cop-success-guide1"><a class="qBox on" href="#cop_success_guide1"><span>시험대비법</span></a></li>
                        <li class="w-cop-success-guide2"><a class="qBox" href="#cop_success_guide2"><span>수험서공부법</span></a></li>
                    </ul>
                    <div class="tabBox mt20">
                        <div id="cop_success_guide1" class="tabContent">
                            <ul class="tabWrap tabcsDepth2 tab_cop_scuuess_list_Guide p_re NG">
                                <li class="w-cop-success-guide1"><a class="qBox on" href="#cop_success_list1_guide1"><span>수험환경 점검</span><span class="row-line">|</span></a></li>
                                <li class="w-cop-success-guide2"><a class="qBox" href="#cop_success_list1_guide2"><span>대학생 맞춤전략</span><span class="row-line">|</span></a></li>
                                <li class="w-cop-success-guide3"><a class="qBox" href="#cop_success_list1_guide3"><span>직장인 맞춤전략</span></a></li>
                            </ul>
                            <div class="tabBox c_both pt25">
                                <div id="cop_success_list1_guide1" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">수험 환경에 따른시험 대비법</h4>
                                        <div class="ps">
                                            <p class="mgB1">“평균 취업경쟁률 100대 1”, “청년 실업 100만 명 육박”. 가히 살인적인 취업 대란이 아닐 수 없다. 또한 ‘삼팔선(38세 퇴직)’, ‘사오정(45세 정년)’이라는 씁쓸한 신조어가 나돌 듯이 취업이 된다 하여도 많은 직장인들이 10년 뒤 자신의 모습을 그려 내지 못하고 있는 게 현실이다. 사정이 이렇다 보니 자신의 이력을 높일 수 있는 자격증 취득보다는 정년 보장이 가능한 공무원 시험에 대학생, 직장인 가릴 것 없이 많은 사람들이 몰리고 있다. 최근의 불황으로 공무원이란 직업의 가치가 확연히 상승한 것이다.</p>
                                            <p class="mgB1">그러나 아무리 공무원이란 직업의 가치가 높아졌다 하더라도 변하지 않는 것이 있다. 그것은 바로 누구든지 공무원이 되기 위해서는 시험공부에 최선을 다해야 한다는 것이며, 학과 공부나 직장 생활을 하면서 수험 생활을 병행하기란 절대 쉬운 일이 아니라는 사실이다. 양쪽에 발을 걸친 채 대충 ‘나 하나쯤 들어갈 자리는 있겠지.’란 안이한 생각으로 수험 생활을 한다면 합격은 절대 손을 내밀지 않을 뿐 아니라 학과 공부나 직장 생활도 모두 놓치게 된다는 점을 명심해야 한다.</p>
                                            <p class="mgB1">그래서 여기에서는 자신이 지금 처해 있는 수험 환경 속에서 어떻게 공부를 해 나가야 합격에 보다 가까워질 수 있는지를 전하고자 한다. 물론 이 문제에 있어 각각이 처한 상황이 다르기 때문에 본인의 정확한 판단과 확신이 중요하다. 다음에서 전하는 작은 조언들을 통해 자신의 위치를 점검하고 합격에 이를 수 있는 지름길을 달려 보자.</p>
                                            <strong>"출발선이 다르다면 지름길을 터득하자!"</strong>
                                        </div>
                                    </div>
                                </div>
                                <div id="cop_success_list1_guide2" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">대학생인 나!</h4>
                                        <p class="mgB2 ps mb35">학과 공부와 공무원 시험 준비를 병행하여 합격의 기쁨을 누리고자 하는 대학생이라면 수험생활을 본격적으로 시작하기 전에 다음의 사항들을 꼭 명심하길 바란다.</p>
                                        <div class="collage">
                                            <h5>나는 왜 공부를 해야하는가</h5>
                                            <ul class="listSq3">
                                                <li>수험생활을 시작하기 전 내가 왜 공무원 공부를 해야 하는가에 대해 진지하게 되짚어 보는 것이 좋다. 졸업을 앞두고 불안해하며 ‘그냥 공무원 공부나 한번 해 볼까?’하는 안이한 자세로 수험생활을 시작한다거나, 단순히 ‘철밥통’에 ‘칼퇴근’하는 직장을 잡기 위해서라면 귀중한 젊음을 낭비하기 십상이다.</li>
                                                <li>무언가를 이루기 위해서는 확고한 목표가 필요하다. 그래야 보다 적극적이고 열정적인 의지가 생길 수 있다. 본격적인 수험생활 시작 전에 현재 자신이 왜 공무원 시험을 준비하려고 하는지, 그렇다면 내가 어떠한 노력을 얼마만큼 쏟아 부을 수 있는지를 점검해 보고, 뚜렷한 목표의식을 세우도록 하자. 확고한 목표가 생겨야 성공적인 결과도 따라오는 법이다.</li>
                                            </ul>
                                        </div>
                                        <div class="collage">
                                            <h5>신속한 도전이 빠른 합격을 부른다</h5>
                                            <ul class="listSq3">
                                                <li>확고한 목표를 세우고 수험생활을 할 각오가 되었다면 되도록 빨리 시작하는 것이 좋다. 10여 년 전만 해도 대학 졸업반에 수험생활을 시작하는 것이 일반적이었으나, 현재는 갈수록 시작하는 나이가 어려지고 있다. 대부분 대학 1~2학년은 한참 놀아야 할 나이라고 생각하지만, 노량진 공무원 학원가에 붐비는 학생들의 얼굴을 직접 보게 되면 그러한 생각이 틀렸음을 알게 될 것이다.</li>
                                                <li>공무원 시험은 어린 나이에 시작할수록 유리하다. 고등학교를 졸업한 지 얼마 안 되는 학생들은 그렇지 않은 학생들에 비해 학습 자세나 암기력, 체력 등이 다소 우월한 편이며, 무엇보다 신경 쓸 일이 많지 않아 학습 시간을 확보하는 데 유리하다. 또한 저학년에 시작하여 합격하게 되면 졸업 후의 진로에 대해 따로 걱정할 필요가 없기 때문에 오히려 남은 대학생활을 즐겁게 마무리할 수 있게 된다.</li>
                                                <li>남학생의 경우는 병역 문제로 2년 이상의 공백이 생길 수밖에 없는데, 군대를 갔다 오기 전에 시작하여 끝을 맺는 게 좋다. 만약 군대를 갔다 와서 준비를 할 수밖에 없다면 3학년이 되기 전에 병역의 의무를 꼭 마치도록 하자.</li>
                                                <li>그리고 학과 수업이 적은 4학년 때 시작하고자 한다면 저학년 때 영어 공부와 가산점을 위한 자격증 취득은 필수라 해도 과언이 아니다. 영어는 대다수의 학생들이 가장 오랜 시간을 두고 공부하는 과목으로, 기초가 부실하다면 장수생의 길로 들어서는 지름길이 되어 버린다. 또한 자격증도 수험생활 중 취득하려 한다면 많은 시간을 할애해야 하기 때문에 수험기간이 길어질 수 있다.</li>
                                            </ul>
                                        </div>
                                        <div class="collage">
                                            <h5>아메바 같은 일상생활</h5>
                                            <ul class="listSq3">
                                                <li>합격수기를 읽어본 적 있는가. 합격생들은 수험생활을 하는 동안 절대 한 눈 팔지 않는다. 모든 것을 합격이라는 목표만 향해 투자한다. 공무원 수험생활을 하면서 미팅, MT, 동아리 모임, 여행, 각종 술자리, 개인 홈피 운영 등 남들 하는 것 다 하겠다고 한다면 그 사람은 수험생활을 과감히 포기하기 바란다. 그런 것들은 1~2년 고생하여 합격하고 나면 하지 말라고 해도 다 할 수 있다.</li>
                                                <li>일단 수험생활을 시작하면 아메바 같은 단순한 일상생활을 유지해야 합격에 빨리 이른다. 모든 생활을 수험 계획에 맞춰 단순화해야 한다. 수험에 영향을 미칠 수 있는 주변 환경을 생각해 보고, 최대한 빨리 정리하도록 한다. 특히 가족, 애인, 친구 등에게 수험생활에 들어감을 알려 협조를 얻도록 한다. 혹자는 공무원 시험을 준비한다고 주위에 대놓고 떠들면 심적인 부담 때문에 공부가 안 된다고 하나, 오히려 주위에 조용히 알려 양해를 구하는 편이 주변 사람들과의 트러블을 줄이게 된다. 또, 물러날 곳 없이 자신을 철저히 궁지에 몰아야 다른 생각 없이 공부에 몰두할 수 있다.</li>
                                                <li>이제부터 먹고, 공부하고, 자는 것 빼고는 아무 것도 할 수 없는 아메바가 되도록 하자.</li>
                                            </ul>
                                        </div>
                                        <div class="collage">
                                            <h5>시간은 금!</h5>
                                            <ul class="listSq3">
                                                <li>대학에 다니고 있는 경우, 학과 수업과 공무원 공부를 병행하는 것은 여간 어려운 일이 아닐 수 없다. 두 가지 일을 다 하기 위해서는 요령껏 학과 시간표를 작성해야 한다. 주5일 모두 수업을 채워 등교하고, 강의도 공무원 시험 과목과 전혀 동떨어져 있다면 시간적 효율성이 당연히 떨어질 수밖에 없다. 같은 시간 안에 최대한의 효율을 얻기 위해서는 수업시간을 조정하고 공무원 시험 과목과 유사한 강의들을 신청할 필요가 있다. 수강 신청시 수업을 2~3일로 몰아넣는다든가, 전공 외의 과목은 자신이 준비하는 직렬의 과목과 유사한 수업을 편성한다. 물론 그렇게 한다고 해도 수험시간은 턱없이 부족할 수밖에 없다. 수험시간을 확보하자고 학과 수업시간을 뺏어올 수는 없는 일 아니 겠는가.</li>
                                                <li>그렇다면 진지하게 휴학을 고려해 보자. 대학을 2년, 4년 안에 꼭 졸업해야 할 필요는 없지 않는가. 수험시간 확보로 항상 스트레스를 받는다면 휴학을 통해 충분한 시간을 확보하는 게 더 효율적일 수 있다.</li>
                                                <li>각종 국가직 및 지방직 시험이 상반기에 몰려 있기 때문에 학기 중에 수험공부를 시작한 사람이라면 1학기만을, 아예 휴학하여 공부를 하고자 한다면 2학기에 1년 휴학을 신청하는 것이 좋다. 전자의 경우, 시험을 코앞에 두고 막판 정리를 하기 위해 상반기에 시간을 내는 것이 좋고, 시험이 없는 하반기에는 학교로 복귀해 밀린 학과 공부를 하는 것이 좋다. 후자의 경우, 수험생활은 7~8월쯤 시작하는 것이 좋다. 하반기에는 강의를 듣고 정리할 수 있는 충분한 시간을 확보할 수 있고, 상반기에는 시험을 앞두고 몰아치기를 할 수 있기 때문이다.</li>
                                                <li>하지만 철저한 계획 없이 무턱대고 휴학을 하는 것은 오히려 시간 낭비가 될 수도 있다. 장시간 수험생활만 하다 보면 슬럼프에 빠질 수도 있고, 졸업이 늦어지기 때문에 혹시나 불합격하여 수험생활을 포기하는 경우 휴학으로 인해 취업시장에서 나이 제한에 걸릴 수도 있기 때문이다. 이 부분에 있어서는 본인의 확고한 의지와 신중한 선택이 필요하다.</li>
                                            </ul>
                                        </div>
                                        <div class="collage">
                                            <h5>경제적 지원군을 잡아라</h5>
                                            <ul class="listSq3">
                                                <li>수험 준비에는 상당한 비용이 소요된다. 이 부분은 수험생활에 상당히 큰 영향을 미치는 요소로, 경제적인 문제가 해결되지 못하면 불안한 마음에 공부에 집중하기도 어렵고 아르바이트를 해야 하는 등의 문제로 수험기간이 길어질 수 있으며, 종국에는 수험생활을 포기하는 사태가 벌어지기도 한다. 생각해 보라. 학과 수업과 아르바이트를 하면서 수험 공부를 할 시간을 확보할 수 있겠는가. 그래서 본격적인 수험생활에 들어가기 전에 반드시 경제적인 문제도 해결해 놓아야 한다.</li>
                                                <li>가족에게 수험공부를 언제까지 할 것이며, 총 어느 정도의 비용이 소요될 것인지를 알려 양해와 협조를 구하는 것이 바람직하다. 만약 그런 상황이 안 된다면 본격적인 수험생활을 시작하기 전에 방학 등을 통해 수험비용을 미리 마련해 두는 것이 좋다.</li>
                                            </ul>
                                        </div>
                                        <div class="collage">
                                            <h5>학원, 강의 활용법</h5>
                                            <ul class="listSq3">
                                                <li>빠른 합격을 하고자 한다면 독학은 피하는 것이 좋다. 과거에는 시험범위가 광범위하지 않아 혼자 공부하는 것이 가능했지만, 지금은 사정이 다르다. 한 과목의 교재가 보통 천 페이지를 넘기 때문에 초반에 각 과목의 전반적인 체계를 잡아 놓지 못하면 수험기간은 길어질 수밖에 없다. 따라서 비용이 들더라도 전문적인 강사의 강의를 듣는 것이 유리하다. 실제로 합격수기들을 살펴보면 강의를 이용하지 않은 사람은 거의 없고, 합격자들 대부분 강의를 중심으로 예습, 복습을 철저히 한 사람들이다.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="cop_success_list1_guide3" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">직장인인 나!</h4>
                                        <div class="ps mgB1">
                                            <strong>"1시간을 3~4시간처럼 사용하라"</strong><br/><br/>
                                            <ul class="listSq3">
                                                <li>직장인들은 우선 대학생들에 비해 절대적인 수험시간을 더 확보하기 어려운 게 현실이다. 방학도, 휴학도 없기 때문에 과감히 사표를 던지지 않는 한 시간을 쪼개고 쪼개서 사용할 수밖에 없다. 또 그렇게 시간을 확보하더라도 직장 생활로 늘 피곤하기 때문에 대학생이나 전업 공시생보다 시간당 효율이 떨어지게 된다. 따라서 직장인들은 무엇보다 시간 개념을 철저히 해야 한다. 다른 수험생들이 보통 하루에 8시간 넘게 공무원 시험공부를 하기 때문에 절대적으로 시간이 부족한 직장인 수험생들은 한 시간을 그들의 3~4시간처럼 집중하여 이용할 필요가 있다.</li>
                                                <li>출퇴근하는 지하철이나 버스에서도, 화장실 가는 시간에도 손에서 어휘집이나 요약집 등을 놓지 말아야 하며, 잠이 드는 그 순간까지도 기본서를 끼고 살아야 한다. 또한 야근 등으로 인해 실강을 듣기 어려우니 퇴근 후 동영상 강의를 이용하거나, 출퇴근 시간에 틈틈이 복습하는 것도 한 방법이 되겠다.</li>
                                                <li>물론 퇴근하고 집에 돌아오면 공부는 커녕 아무것도 하고 싶지 않은 매일 매일이겠지만, 기본적인 노력조차 하지 않으면 대학생 수험생이나 전업 공시생을 따라 잡을 방법이 없다. 일단 공무원 시험을 준비하고자 결정했다면 인사 평가에서 좋은 점수를 얻을 생각은 아예 말자. 서류에 요약한 것들을 끼워서 틈틈이 보는 방법 등 발견할 수 있는 모든 공부 방법을 강구해 보자. 또한 합격할 점수대에 이르고 여건이 된다면 과감히 사표를 던지고 몰아치기 하는 용기도 필요하다고 본다.</li>
                                                <li>직장인 수험생들은 다른 수험생들에 비해 당연히 수험기간이 길어질 수밖에 없다. 이건 직장인 수험생들 누구나 공감할 것이다. 하지만 공무원 시험에 합격하는 것은 지식의 양이나 공부 시간이 아니라 얼마만큼의 경쟁자들을 제칠 수 있느냐이다. 이 점을 상기하면서 어려운 처지인 만큼 보다 절실히 도전한다면 분명 합격에 가까워질 것이다.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div id="cop_success_guide2" class="tabContent">
                            <ul class="tabWrap tabcsDepth2 tab_cop_scuuess_list_Guide p_re NG">
                                <li class="w-cop-success-guide1"><a class="qBox on" href="#cop_success_list2_guide1"><span>수험서선택</span><span class="row-line">|</span></a></li>
                                <li class="w-cop-success-guide2"><a class="qBox" href="#cop_success_list2_guide2"><span>수험서정복</span><span class="row-line">|</span></a></li>
                                <li class="w-cop-success-guide3"><a class="qBox" href="#cop_success_list2_guide3"><span>취약과목보강</span><span class="row-line">|</span></a></li>
                                <li class="w-cop-success-guide4"><a class="qBox" href="#cop_success_list2_guide4"><span>서브노트작성</span><span class="row-line">|</span></a></li>
                                <li class="w-cop-success-guide5"><a class="qBox" href="#cop_success_list2_guide5"><span>문제풀이</span></a></li>
                            </ul>
                            <div class="tabBox c_both pt25">
                                <div id="cop_success_list2_guide1" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">1단계 : 기본 수험서 선택 + 이론 강의 선택 + 철저한 예습 / 복습</h4>
                                        <div class="ps mgB2">
                                            <p class="mgB1">공무원 시험과 관련된 인터넷 카페에 방문해 보면 가장 많은 질문 유형 중 하나가 "○○뭐 어떤가요?", "제가 고른 기본서 목록인데요, 평가 좀 해 주세요." 등의 수험서 선택에 관한 질문이다. 수험서 선택은 수험생들에게 있어 수험 기간을 줄일 수도 늘릴 수도 있는 중요한 선택 사항이 아닐 수 없다. 한번 선택한 수험서를 공부하는 중간에 갈아탄다면 새로운 교재에 적응하기 위한 시간이 많이 필요하기 때문이다.</p>
                                            <p class="mgB1">노량진 곳곳의 서점들을 방문해 보면 알겠지만, 공무원 수험서는 각 시험별로 그 종류가 매우 다양하다. 우선 종합반 강의를 수강하는 수험생은 자신이 선택한 강사가 추천하는 교재로 공부하는 것이 좋다. 그래야 강의 내용을 보다 잘 이해하면서 따라갈 수 있다. 만약 종합반을 수강하지 않는 수험생이라면 합격수기 등을 읽어보고 많은 합격생들이 추천하는 수험서를 선택하는 것이 좋다. 하지만 단순히 정보만 믿고 수험서를 선택하는 것은 실패할 확률이 있다. 귀찮더라도 서점을 방문하여 여러 교재들을 직접 비교해 보는 약간의 노력이 필요하며, 법이나 행정학 등 수시로 내용이 개정되는 과목은 판권의 발행일 등을 확인하여 최신 교재를 구입하는 것이 좋다.</p>
                                            <p class="mgB1">어려운 수험서 선택이 끝났다면 이론 강의의 진도에 맞춰 예습과 복습을 철저히 해야 한다. 예습, 복습 없이 학원 강의만 듣고 끝낸다면 수험기간만 축낼 뿐 합격에 아무런 도움이 되지 않는다. 특히 예습보다 복습의 중요성이 더 크다. 반드시 그날 들은 강의는 그날 복습해야 기억에 오래 남는다. 이때 복습이라 하더라도 전부 다 머릿속에 구겨 넣으려고 애쓰지 말자.</p>
                                            <p>세부적인 내용을 이해하고 암기하기 보다는 전반적인 흐름을 파악하여 뼈대를 잡는 것이 중요하다. 처음부터 많은 것을 알려고 하면 진도도 잘 나가지 않고, 의욕이 쉽게 꺾여 버린다. 또한 수험서의 목차를 확인하면서 진도를 체크해 보자. 교재의 전체적인 흐름을 이해하기 쉽고내가 지금 어느 부분을 공부하고 있는지 알 수 있어 수험계획을 조절하기 용이하다.</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="cop_success_list2_guide2" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">2단계 : 기본 수험서 정복</h4>
                                        <div class="ps mgB2">
                                            <ul class="stlist">
                                                <li>
                                                    <strong>① 기본 수험서는 한 권만 보자</strong>
                                                    <p>강의를 모두 청취하였다면 선택했던 그 수험서를 믿고 여러 번 반복 학습해야 한다. 시험에 대한 압박감으로 수험생들은 늘 불안하기 때문에 "요즘은 ○○○ ○○ 대세더라."와 같은 다른 사람들의 이야기에 쉽게 흔들리기 마련이다. 그래서 자신이 보던 수험서를 뒤로 한 채 이리 기웃 저리 기웃하게 되는데, 이는 결코 바람직한 상황이 아니다. 일단 수험서를 채택했다면 흔들리지 말고 그 한 권만 보자. 한 권의 책을 반복 학습하게 되면 회독수가 늘어갈수록 회독에 필요한 시간이 줄어들고, 내용 암기는 점점 늘어나 그 효율을 실감할 수 있을 것이다.</p>
                                                </li>
                                                <li>
                                                    <strong>② 복습은 필수</strong>
                                                    <p>강의를 모두 청취하였다면 선택했던 그 수험서를 믿고 여러 번 반복 학습해야 한다. 시험에 대한 압박감으로 수험생들은 늘 불안하기 때문에 "요즘은 ○○○ ○○ 대세더라."와 같은 다른 사람들의 이야기에 쉽게 흔들리기 마련이다. 그래서 자신이 보던 수험서를 뒤로 한 채 이리 기웃 저리 기웃하게 되는데, 이는 결코 바람직한 상황이 아니다. 일단 수험서를 채택했다면 흔들리지 말고 그 한 권만 보자. 한 권의 책을 반복 학습하게 되면 회독수가 늘어갈수록 회독에 필요한 시간이 줄어들고, 내용 암기는 점점 늘어나 그 효율을 실감할 수 있을 것이다.</p>
                                                </li>
                                                <li>
                                                    <strong>③ 내 기본 수험서에 살을 붙이자.</strong>
                                                    <p>합격수기를 읽다 보면 ‘단권화’라는 말이 참 많이 나온다. 여기서 ‘단권화’란 그냥 한 권의 책만 보라는 뜻이 아니다. 반복 학습하면서 부족한 부분은 다른 서적을 참고하여 적어 넣기도 하고, 문제를 풀다가 나온 중요 지문 등을 적어 넣는 등 기본 수험서 한 권에다가 내용의 살을 붙여 나가란 얘기이다. 그래야 효율적인 학습이 가능하다.</p>
                                                </li>
                                                <li>
                                                    <strong>④ 암기와 이해의 구별</strong>
                                                    <p>한 권당 천 페이지가 넘는 수험서를 접하면서 처음부터 암기해 나가는 방법은 스스로를 슬럼프에 빠지게 하는 지름길이다. 처음부터 한꺼번에 모든 것을 섭렵하려 하지 말고, 알고 있는 것에서부터 모르는 것으로 가지를 뻗듯이 학습해 나가야 한다. 초기 단계에서는 암기를 하지 말고 이해할 목적으로 수험서를 대한다. 그렇게 회독수를 늘려 가다 보면 암기해야 할 사항과 이해해야 할 사항이 자연스레 구분이 되며, 서서히 암기해야 할 부분을 공략한다. 또한 시험 직전에 필히 보고 가야 할 암기사항은 포스트잇 플래그 등을 이용해 따로 표시해 둔다.</p>
                                                </li>
                                                <li>
                                                    <strong>⑤ 최신 출제 경향에 맞춘 학습</strong>
                                                    <p>보다 요령껏, 신속히 합격하기 위해서는 자신이 응시하고자 하는 시험의 출제 경향을 염두에 두고 공부해 나가야 한다. 객관식 기출문제는 과거에 한두 번 이상은 출제된 문제들이어서 비슷한 유형으로 출제될 확률이 높기 때문에 반드시 기출문제를 많이 풀어봐야 한다. 또한 최근 출제 경향이 변화하고 있기 때문에 1~3년 전 기출문제는 반드시 분석해 볼 필요가 있다. 공무원 시험은 10여 년 전만 해도 단순 암기를 요하는 문제들이 다수를 이루었으나, 최근 시험들에서는 수능처럼 사고력을 요구하는 문제들의 출제 빈도가 높아지고 있다. 이러한 출제 경향을 알고 접근해야 합격에 한발 더 가까이 다가갈 수 있는 것이다.</p>
                                                </li>
                                                <li>
                                                    <strong>⑥ 선택 사항 - 그룹 스터디 이용</strong>
                                                    <p>의지가 약해 혼자 공부하기 힘든 사람은 그룹 스터디를 이용하는 것도 한 방법이 될 수 있다. 자신의 취약한 부분을 점검하여 그와 관련된 스터디를 구성해 보자. 학원 게시판을 보거나 공무원 관련 인터넷 카페를 방문하면 강의 스터디, 진도 스터디, 어휘 스터디, 모의고사 스터디 등 여러 형태의 그룹 스터디를 구성한다는 글들이 많다. 또한 공부는 각자 하면서 생활 패턴만 함께 하는 생활 스터디, 밥 먹을 때만 모이는 밥터디 등도 쉽게 찾아볼 수 있다. 자신이 필요한 스터디 유형이 무엇인지를 점검해 보고, 능력 있는 사람으로 스터디를 구성해 보자.</p>
                                                    <p>스터디 그룹의 인원은 4명 정도가 적당하다. 혼성 그룹의 경우 운영이 잘 된다면야 자극이 되어 효과적일 수 있으나, 동성 그룹에 비해 성격이 변질될 가능성이 매우 높기 때문에 되도록이면 동성 그룹을 구성하는 것이 더 낫다고 본다. 진도 스터디의 경우 일단 구성하기 전에 스터디에 들어오고자 하는 사람들의 수험 경력과 자신 있는 과목을 물어본 후 스터디를 짜야 한다. 어휘 스터디의 경우는 쪽지 시험을 통해 틀린 개수대로 벌금 물기 방법 등을 사용해 효율을 높일 수도 있고, 모의고사 스터디의 경우 시험 점수를 공개하여 서로 자극을 주는 방법을 사용하는 것이 좋다.</p>
                                                    <p>스터디를 구성하면 취약한 부분에 대해 도움을 받을 수도 있고, 정보 교환도 가능하며, 서로 힘들 때 의지할 수도 있다는 장점이 있다. 물론 이런 경우는 비슷한 수험 경력을 가진 사람들로 구성되고, 각자가 맡은 바에 충실하며 동료애를 가지고 스터디를 했을 때의 얘기이다. 책임감이 없는 구성원이 있다거나, 공부 이외의 다른 목적으로 모임을 가지게 되면 구성원 모두 실패할 확률이 높아지며, 그만큼 합격권에서 멀어지게 된다. 그룹 스터디의 단점만 피할 수 있다면 스터디도 합격으로 가기 위한 좋은 전략이 될 수 있다.</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="cop_success_list2_guide3" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">3단계 : 취약 과목 보강 - 단과 강의 선택</h4>
                                        <div class="ps mgB2">
                                            <p class="mgB1">[심화단과상담] 1544-0336 (10:00 ~ 18:00)</p>
                                            <p class="mgB1">모든 사람이 완벽할 수 없듯이, 수험생 역시 다른 과목에 비해 맥을 못 추는 한두 과목쯤 가지고 있게 마련이다. 이때 수험생들은 일단 눈앞에 나타난 어려움을 피할 생각부터 하게 된다. 하지만 자신 있는 과목에만 열중하고 어렵고 점수가 잘 나오지 않는 과목을 소홀히 하다 보면 시험 결과는 당연히 준비한 만큼만 나타나게 된다. 주위를 살펴보면 자신 있는 과목에서 만점에 가까운 점수를 얻고도 상대적으로 취약한 1과목에서 과락이 나 불합격하는 사례를 심심찮게 볼 수 있다. 이런 사람의 학습 패턴을 보면, 시험이 없는 다소 한가한 시기에는 취약한 과목에 대해 어려움을 호소하면서 공부를 차일피일 미루다가, 시험이 임박하여 취약 과목을 공부하려고 하면 다른 과목들이 완벽히 정리되지 않았다는 불안한 생각에 자꾸 자신 있는 다른 과목에만 손을 뻗게 된다. 또한 시험이 더 임박해져 오면 "그래, 자신 있는 4과목에서 만점 받으면 내가 싫어하는 1과목에서 50점 받아도 합격할 수 있을 거야."라는 무모한 생각에 이르게 되어 시험을 두고 일종의 도박을 벌이게 된다. 하지만 결과는 신이 내린 관운이 없는 한, ‘불합격’이다. 이러한 불상사가 발생하지 않으려면 수험 공부를 시작하는 초기부터 어려운 과목을 꾸준히 관리해 줄 필요가 있다. 이런 경우를 위해 존재하는 것이 바로 심화 단과반 강의이다.</p>
                                            <p>수험 생활 초기에 종합반으로 강의를 수강하면서 복습을 하다 보면 잘 이해되지 않거나 접근하기 어려운 과목이 있다. 그 과목의 복습을 뒤로 미루지 말고 되도록 그날 소화하려고 노력해야 하며, 종합반 강의 일정이 모두 끝나면 그 과목에 한해 복습한 지식을 바탕으로 심화 단과반 강의를 바로 수강하도록 한다. 즉, ‘종합반 강의 - 복습 - 단과반 강의 - 복습 - 무한 반복 학습’의 패턴으로 어려운 과목을 꾸준히 관리하란 뜻이다. 이렇게 수험 초반부터 어려운 과목을 정복해 나가다 보면 취약 과목은 어느새 합격을 위한 효자 과목으로 탈바꿈하게 될 것이다.</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="cop_success_list2_guide4" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">4단계 : 서브노트 작성</h4>
                                        <div class="ps mgB2">
                                            <p class="mgB1">수험 생활에 처음 입문한 수험생들은 서브노트가 무엇인지 그 개념에 대해 자주 질문하곤 한다. 수험서를 요약해 놓은 것인지, 아니면 암기할 것만 정리해 놓은 것인지, 그것도 아니면 오답 노트나 판서 노트인지. 서브노트는 이 모든 것을 포함한다. 강사가 짚어 준 중요한 부분을 요약 정리해 놓는 것, 자신이 학습하면서 머릿속에 잘 들어오지 않는 암기 부분이나 자주 틀리는 문제 등을 정리해 놓는 것, 시험 직전에 꼭 봐야 할 중요 사항들을 일목요연하게 압축해 놓는 것 등 완성작들은 그 형태나 내용이 가지각색이다.</p>
                                            <p class="mgB1">사실 시험 2~3일 전에 5000페이지가 넘는 수험서들을 어떻게 일일이 정리할 수 있을까? 그건 상당한 무리가 아닐 수 없다. 이렇게 시간이 매우 촉박한 막판 정리 기간에 서브노트가 큰 힘을 발휘한다. 물론 큰 힘을 발휘하는 서브노트는 시중에서 판매되고 있는 요약집이나 남이 만들어 놓은 서브노트가 아니라, 자신의 수험 생활을 통해 직접 작성한 서브노트이다. 판매되고 있거나 남이 만들어 놓은 서브노트는 아무리 정리가 잘 되어 있다고 하여도 세상에서 유일한 나만의 서브노트보다는 도움이 안 된다.</p>
                                            <p>그렇다면 직접 나만의 서브노트를 만들어 보는 것은 어떨까? 이때 주의할 점이 있다. 너무 의욕적인 나머지 교재의 내용을 확실히 다 이해하지도 못한 채 성급히 서브노트를 만들다 보면 모르는 내용이 많고, 또 무엇이 중요하고 시험에 필요한지를 확신할 수 없어 서브노트의 양이 크게 늘어나게 된다. 이렇게 늘어난 서브노트는 두꺼운 수험서와 별반 다를 게 없어 서브노트의 기능을 하기 힘들다. 또한 양이 불어날수록 점점 지쳐 서브노트의 작성을 아예 포기해 버리기도 한다. 따라서 분량이 적당한 서브노트를 만들기 위해서는 강의를 청취한 후 수험서를 3~4번 반복 학습하여 내용을 익히고, 기출문제를 분석한 후 관련 문제를 많이 풀어보고 작성하는 것이 좋다. 그래야 중요도와 난이도, 암기 사항 구분이 가능해지기 때문이다. 물론 서브노트는 한번 작성했다고 해서 100% 완성된 것은 아니다. 수험서를 반복 학습하다 보면 새롭게 이해하는 사항이 점점 늘어나게 되고, 구석구석 놓쳤던 부분들이 나타나기 때문에 이를 반영할 필요가 있다. 이전에는 잘 몰랐던 부분이었으나 반복 학습을 통해 새롭게 이해되는 부분은 과감히 삭제하고, 놓쳤던 부분이나 새로 풀었던 문제들의 중요 부분은 추가로 기입하는 보완 작업이 필요하다. 이렇게 해 나가다 보면 어디서 구입할 수 없는 나만의 유일한 서브노트가 완성되게 된다. 물론 서브노트가 시험 막판에만 유용한 것은 아니다. 서브노트에 삭제·추가하는 반복 과정 자체가 하나의 학습이 되는 것이다.</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="cop_success_list2_guide5" class="tabContent">
                                    <div class="examInfoGu2">
                                        <h4 class="hTy4">5단계 : 문제 풀이 - 문제집 선택 + 학원 문제 풀이</h4>
                                        <div class="ps mgB2">
                                            <p class="mgB1">최근 시험들에서는 과거와 달리 정형화된 기출문제들이 자취를 감추고 있고, 사고력을 요하는 다양한 유형의 응용문제들이 출제되고 있다. 이런 새로운 형태의 문제들에 적응하기 위해서는 앞서 말했듯이 일차적으로 기출문제 분석을 통해 최신 경향을 파악해야 하고, 그 다음에 시험장에서 이론을 응용하는 데 있어 막힘이 없도록 많은 문제들을 접해 보아야 한다. 일단 시중에 출간된 문제집은 자신의 실력을 점검하기 위한 목적으로 좋다. 자신이 어느 부분이 약한지, 잘못 이해하고 있는 부분은 없는지 등을 파악할 수 있고, 그런 후 오답노트를 만들어 정리해 두면 더욱 효과적이다. 오답노트를 보면서 틀린 문제의 정답을 무작정 외우기보다는 내가 왜 이해하지 못했는지를 파악하고 그 부분의 이론을 찾아 이해력을 높이는 데 주력해야 한다. 정답을 암기하는 것은 비슷한 내용이 유형을 달리하여 나왔을 때 전혀 효과를 발휘하지 못한다.</p>
                                            <p class="mgB1">문제집은 정보 매체의 의견을 따르기 보다는 직접 서점에서 비교 검토하여 선택하는 것이 좋다. 수록된 문제의 수는 적당한지, 난이도는 어떠한지, 오답률은 낮은지, 문제를 풀고 정리할 수 있는 여백들이 충분히 확보되어 있는지 등을 살펴 구입하도록 한다. 또한 기출문제집이 아닌 예상문제집이나 모의고사를 선택한다면 저자가 누구인지도 꼭 확인할 필요가 있다.</p>
                                            <p class="mgB1">반면 학원에서 문제풀이반을 수강하는 경우, 비용을 들인 만큼 문제집에 비해 얻을 수 있는 것이 많다. 문제집의 경우, 문제를 푼 후 해설을 보고 자신이 직접 정리해야 하기 때문에 시간이 많이 드는 편이고, 이론을 문제에 잘 적용하고 있는지를 정확히 파악할 수 없다. 또한 해설을 보고도 이해가 되지 않는 문제들은 그 자리에서 쉽게 해결할 수 없으며, 한정된 지면 안에 수록된 문제만을 접하기 때문에 가장 최근에 등장한 새로운 문제 유형을 접할 수 없다.</p>
                                            <p>하지만 문제풀이반의 경우, 강사와 함께 문제를 풀면서 이론을 일목요연하게 정리할 수 있고, 문제에 이론을 정확하게 적용하는 감각도 익힐 수 있다. 또 의문점을 그 자리에서 바로 해결할 수 있을 뿐만 아니라 새로 등장한 이론이나 신 유형의 문제들을 미리 만나볼 수 있다. 만약 시험을 2~3달 앞두고 있다면 문제풀이반을 통해 이론도 정리하면서 응용 능력을 길러 보도록 하자. 그러기 위해서는 자신이 수강했던 이론 강의에서 강의했던 강사의 문제풀이반을 신청하는 것이 효율적이다. 강사의 강의 패턴에 익숙해져 있을 뿐만 아니라 문제풀이 해설도 주 수험서를 바탕으로 이루어지기 때문에 더욱 쉽게 접근할 수 있기 때문이다.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop