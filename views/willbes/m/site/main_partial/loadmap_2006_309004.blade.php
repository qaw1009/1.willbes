<div class="mSubTit NSK-Black mt30" ><span>{{ array_get($__cfg['SiteMenu'], 'TreeMenu.GNB.MenuName', '') }}</span> 합격 로드맵</div>
<div class="tabWrap">
    <ul class="tabWrap loadTab">
        <li><a href="#loadmap1" class="on">1차 대비</a></li>
        <li><a href="#loadmap2">2차 대비</a></li>
    </ul>
</div>
<div class="loadMap tabContent" id="loadmap1">
    <p class="start"><span>START</span></p>
    <ul>
        <li class="lmTitle"><a href="#none">1단계 기본이론강의 (3월~6월))</a>
            <div class="lmCts">
                <ul>
                    <li>개념 정리 및 기본기 다지기</li>
                    <li>기초실력 배양과 기본체계 확립</li>
                </ul>                   
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1086') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>          
        <li class="lmTitle"><a href="#none">2단계 중급강의/판례강의 (7월~9월)</a>
            <div class="lmCts">
                <div><span>심화강의 : 기본이론의 반복과 심화이론의 이해/정리</span></div> 
                <ul>
                    <li>기본이론 및 판례이론 정리</li>
                    <li>기본서 단권화 과정</li>
                    <li>판례의 이해와 기본판례이론 정리</li>
                </ul>
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1143') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>
        <li class="lmTitle"><a href="#none">3단계 객관식 문제풀이/진도별 모의고사(10월~12월)</a>
            <div class="lmCts">
                <div><span>핵심정리 & 모의고사 : 답안작성 능력 배양과 중요 논점 정리</span></div> 
                <ul>
                    <li>객관식 문제에 대한 적응력 강화 및 단권화 완성</li>
                    <li>객관식 문제를 통한 이론과 판례의 유기적 정리</li>
                    <li>최근 중요시험의 기출문제와 최신판례문제를 통하여 최근 출제경향을 파악 및 효율적인 실전연습</li>
                </ul>
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1142') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>
        <li class="lmTitle"><a href="#none">4단계 핵심정리/최종정리 (1월~2월)</a>
            <div class="lmCts">
                <ul>
                    <li>이론, 판례의 종합적 최종정리</li>
                    <li>출제가능성 높은 쟁점에 대한 집중 학습</li>
                    <li>마무리 정리를 통하여 취약부분을 최종적으로 확인하고 기본서를 빠르게 1회독 하여 최종정리</li>
                    <li>중요예상문제를 풀어보고 객관식 풀이의 필수지문을 최종적으로 습득</li>
                </ul>
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1142') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>
    </ul>
    <p class="goal"><span>GOAL</span></p>
</div>
<div class="loadMap tabContent" id="loadmap2">
    <p class="start"><span>START</span></p>
    <ul>
        <li class="lmTitle"><a href="#none">1단계 기본이론강의 (3월)</a>
            <div class="lmCts">
                <ul>
                    <li>입문자 또는 각 과목에 대한 전반적인 이해가 부족한 수험생을 위한 강좌</li>
                    <li>기본이론부터 심화이론까지 이해하기 쉽게 설명함으로써 기초실력 배양과 기본체계를 확립</li>
                </ul>                   
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1086') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>          
        <li class="lmTitle"><a href="#none">2단계 사례강의 (4월)</a>
            <div class="lmCts">
                <ul>
                    <li>사례풀이를 통한 본격적인 답안작성 연습</li>
                    <li>과목별 사례풀이 및 쟁점정리로 답안작성능력 강화</li>
                </ul>
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1143') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>
        <li class="lmTitle"><a href="#none">3단계 실전GS / 기초GS (4월~6월)</a>
            <div class="lmCts">
                <div><span>핵심정리 & 모의고사 : 답안작성 능력 배양과 중요 논점 정리</span></div> 
                <ul>
                    <li>모의고사를 통한 쟁점정리 및 답안작성 연습</li>
                    <li>이론 단권화 및 모의고사 연습으로 답안현출능력 완성</li>
                </ul>
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1146') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>
        <li class="lmTitle"><a href="#none">4단계 중급강의 / 심화강의 (7월~10월)</a>
            <div class="lmCts">
                <div><span>최종 모의고사 : 실전감각 유지와 예상 논점의 최종 정리</span></div> 
                <ul>
                    <li>기본강의와 사례강의에서 빠진 어려운 쟁점·판례 정리</li>
                    <li>최신판례, 중요판례, 중요 쟁점을 비교정리</li>
                </ul>
                <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1090') }}" class="moreBtn">강의 바로보기 ></a>
            </div>
        </li>
    </ul>
    <p class="goal"><span>GOAL</span></p>
</div>