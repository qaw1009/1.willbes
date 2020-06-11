{{-- topnav 전체보기 메뉴 --}}

{{-- 교수진 소개 --}}
@section('mega_menu_professor')
    @if($__cfg['SiteCode'] == '2005')
        {{-- 고등고시온라인 --}}
        @if($__cfg['CateCode'] == '3094')
            {{-- 5급행정 --}}
            <ul>
                <li>
                    <span>경제학</span>
                    <a href="#none">황종휴</a>
                </li>
                <li>
                    <span>행정법</span>
                    <a href="#none">김정일</a>
                    <a href="#none">박도원</a>
                    <a href="#none">김기홍</a>
                </li>
                <li>
                    <span>행정학</span>
                    <a href="#none">박경효</a>
                    <a href="#none">이동호</a>
                    <a href="#none">최승호</a>
                    <a href="#none">백승준</a>
                </li>
                <li>
                    <span>국제법</span>
                    <a href="#none">안진우</a>
                    <a href="#none">백승호</a>
                </li>
                <li>
                    <span>정치학</span>
                    <a href="#none">김희철</a>
                    <a href="#none">정원준</a>
                    <a href="#none">최승호</a>
                    <a href="#none">백승준</a>
                </li>
                <li>
                    <span>교육학</span>
                    <a href="#none">이인재</a>
                </li>
                <li>
                    <span>재정학</span>
                    <a href="#none">황종휴</a>
                </li>
                <li>
                    <span>정책학</span>
                    <a href="#none">이동호</a>
                    <a href="#none">최승호</a>
                </li>
                <li>
                    <span>정보체계론</span>
                    <a href="#none">백승준</a>
                    <a href="#none">최승호</a>
                </li>
                <li>
                    <span>교육심리학</span>
                    <a href="#none">이인재</a>
                </li>
                <li>
                    <span>국제경제학</span>
                    <a href="#none">황종휴</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3095')
            {{-- 국립외교원 --}}
            <ul>
                <li>
                    <span>경제학</span>
                    <a href="#none">황종휴</a>
                </li>
                <li>
                    <span>국제법</span>
                    <a href="#none">안진우</a>
                    <a href="#none">백승호</a>
                </li>
                <li>
                    <span>국제경제학</span>
                    <a href="#none">황종휴</a>
                </li>
                <li>
                    <span>국제정치학</span>
                    <a href="#none">정원준</a>
                    <a href="#none">김희철</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3096')
            {{-- PSAT --}}
            <ul>
                <li>
                    <span>자료해석</span>
                    <a href="#none">석치수</a>
                </li>
                <li>
                    <span>상황판단</span>
                    <a href="#none">박준범</a>
                </li>
                <li>
                    <span>언어논리</span>
                    <a href="#none">이나우</a>
                    <a href="#none">한승아</a>
                    <a href="#none">이현나</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3097')
            {{-- 5급헌법 --}}
            <ul>
                <li>
                    <span>5급헌법</span>
                    <a href="#none">김유향</a>
                    <a href="#none">선동주</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3098')
            {{-- 법원행시 --}}
            <ul>
                <li>
                    <span>행정법</span>
                    <a href="#none">김정일</a>
                </li>
                <li>
                    <span>민법</span>
                    <a href="#none">김동진</a>
                    <a href="#none">김남훈</a>
                </li>
                <li>
                    <span>형법</span>
                    <a href="#none">이재철</a>
                    <a href="#none">이재상</a>
                </li>
                <li>
                    <span>헌법</span>
                    <a href="#none">선동주</a>
                </li>
                <li>
                    <span>상법</span>
                    <a href="#none">김남훈</a>
                </li>
                <li>
                    <span>민사소송법</span>
                    <a href="#none">김남훈</a>
                    <a href="#none">이창한</a>
                </li>
                <li>
                    <span>형사소송법</span>
                    <a href="#none">정주형</a>
                    <a href="#none">이재철</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3099')
            {{-- 변호사시험 --}}
            <ul>
                <li>
                    <span>민사>민법</span>
                    <a href="#none">김남훈</a>
                    <a href="#none">김동진</a>
                    <a href="#none">이태섭</a>
                </li>
                <li>
                    <span>민사>상법</span>
                    <a href="#none">김남훈</a>
                    <a href="#none">이종모</a>
                </li>
                <li>
                    <span>민사>민소법</span>
                    <a href="#none">김남훈</a>
                    <a href="#none">이창한</a>
                </li>
                <li>
                    <span>민사>민사법</span>
                    <a href="#none">김남훈</a>
                    <a href="#none">이종모</a>
                </li>
                <li>
                    <span>형사>형법</span>
                    <a href="#none">이재상</a>
                    <a href="#none">이재철</a>
                    <a href="#none">김기환</a>
                </li>
                <li>
                    <span>형사>형소법</span>
                    <a href="#none">이재철</a>
                    <a href="#none">김기환</a>
                    <a href="#none">정주형</a>
                </li>
                <li>
                    <span>형사법>형사법</span>
                    <a href="#none">이재상</a>
                    <a href="#none">이재철</a>
                    <a href="#none">김기환</a>
                    <a href="#none">정주형</a>
                </li>
                <li>
                    <span>공법>헌법</span>
                    <a href="#none">선동주</a>
                    <a href="#none">이국령</a>
                </li>
                <li>
                    <span>공법>행정법</span>
                    <a href="#none">박도원</a>
                    <a href="#none">임웅찬</a>
                    <a href="#none">김정일</a>
                    <a href="#none">김기홍</a>
                </li>
                <li>
                    <span>공법>공법</span>
                    <a href="#none">임웅찬</a>
                    <a href="#none">김정일</a>
                </li>
                <li>
                    <span>선택>국제거래법</span>
                    <a href="#none">이승현</a>
                </li>
            </ul>
        @endif
    @endif
@endsection

{{-- 수강신청 --}}
@section('mega_menu_lecture')
    @if($__cfg['SiteCode'] == '2005')
        {{-- 고등고시온라인 --}}
        @if($__cfg['CateCode'] == '3094')
            {{-- 5급행정 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1107') }}">원론강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1108') }}">예비순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1109') }}">GS1순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1110') }}">GS2순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1111') }}">GS3순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1112') }}">GS4순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1113') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1276') }}">황종휴경제학특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1480') }}">경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1481') }}">행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1482') }}">행정학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1483') }}">국제법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1484') }}">정치학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1485') }}">교육학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1486') }}">재정학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1487') }}">정책학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1488') }}">정보체계론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1489') }}">교육심리학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1490') }}">국제경제학</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3095')
            {{-- 국립외교원 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1107') }}">원론강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1108') }}">예비순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1109') }}">GS1순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1110') }}">GS2순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1111') }}">GS3순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1113') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1276') }}">황종휴경제학특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1480') }}">경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1483') }}">국제법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1490') }}">국제경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1491') }}">국제정치학</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3096')
            {{-- PSAT --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1128') }}">기초입문</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1129') }}">기초강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1130') }}">집중심화</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1131') }}">핵심체크</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1132') }}">실전모강+해설및핵심정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1204') }}">전국모의고사</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1113') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1245') }}">선구안특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1286') }}">역대엄선실전모강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1287') }}">기출해설</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1289') }}">기출변형</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1716') }}">자료해석</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1717') }}">상황판단</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1718') }}">언어논리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1799') }}">PSAT</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3097')
            {{-- 5급헌법 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1129') }}">기초강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1131') }}">핵심체크</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1132') }}">실전모강+해설및핵심정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1113') }}">특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1719') }}">5급헌법</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3098')
            {{-- 법원행시 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1199') }}">집중정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1200') }}">기출해설</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1201') }}">문제풀이</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1202') }}">최신판례</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1203') }}">실전문풀</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1204') }}">전국모의고사</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1481') }}">행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1734') }}">민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1735') }}">형법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1736') }}">헌법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1739') }}">상법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1737') }}">민사소송법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1738') }}">형사소송법</a>
                </li>
            </ul>
        @elseif($__cfg['CateCode'] == '3099')
            {{-- 변호사시험 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1209') }}">예비순환(기본)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1205') }}">1순환(심화)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1206') }}">2순환(심화)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1207') }}">3순환(문물)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1208') }}">4순환(핵심)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1214') }}">1순환(판례)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1215') }}">2순환(판례)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1216') }}">3순환(판례)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1210') }}">암기장특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1211') }}">핵지총특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?course_idx=1113') }}">특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1723') }}">민사>민사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1720') }}">민사>민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1721') }}">민사>상법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1722') }}">민사>민소법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1724') }}">형사>형법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1725') }}">형사>형소법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1726') }}">형사법>형사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1727') }}">공법>헌법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1728') }}">공법>행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1949') }}">기록형>민사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1950') }}">기록형>형사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1951') }}">기록형>공법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1730') }}">선택>국제법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?subject_idx=1731') }}">선택>국제거래법</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/userPackage/show/cate/' . $__cfg['CateCode'] . '/prod-code/164320') }}">빈출쟁점 다다익선 이벤트</a>
                </li>
            </ul>
        @endif
    @endif
@endsection
