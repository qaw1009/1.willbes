{{-- topnav 전체보기 메뉴 --}}
@php $menu_cate_code = $__cfg['SiteMenu']['TreeMenu']['GNB']['MenuCateCode']; @endphp

{{-- 교수진 소개 --}}
@section('mega_menu_professor')
    @if($__cfg['SiteCode'] == '2003')
        {{-- 공무원 --}}
        @if($menu_cate_code == '3019')
            {{-- 9급공무원 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>국어</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50157?subject_idx=1107') }}">오대혁</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50241?subject_idx=1107') }}">기미진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50661?subject_idx=1107') }}">김세령</a>
                </li>
                <li>
                    <span>영어</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50499?subject_idx=1108') }}">한덕현</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51070?subject_idx=1108') }}">선석</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50991?subject_idx=1108') }}">안성호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51011?subject_idx=1108') }}">이섬가</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51199?subject_idx=1108') }}">김현정</a>                  
                </li>
                <li>
                    <span>한국사</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50619/?subject_idx=1109') }}">김상범</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50027/?subject_idx=1109') }}">오태진</a>                    
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50647?subject_idx=1109') }}">조민주</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50003?subject_idx=1109') }}">원유철</a>
                </li>
                <li>
                    <span>행정법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51206?subject_idx=1111') }}">신기훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50109?subject_idx=1111') }}">황남기</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50615?subject_idx=1111') }}">이석준</a>
                </li>
                <li>
                    <span>행정학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50559?subject_idx=1112') }}">김덕관</a>
                </li>
                <li>
                    <span>형법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50133?subject_idx=1116') }}">김원욱</a>
                </li>
                <li><span>형사소송법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50035?subject_idx=1117') }}">신광은</a></li>
                <li><span>사회복지학</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51238?subject_idx=1134') }}">정형윤</a></li>
                <li><span>세법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51167?subject_idx=1123') }}">박창한</a></li>
                <li>
                    <span>회계학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51166?subject_idx=1124') }}">이윤호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50057?subject_idx=1124') }}">김현식</a>
                </li>
                <li>
                    <span>교정학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51264?subject_idx=1120') }}">함다올</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3020')
            {{-- 7급 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>행정법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50109?subject_idx=1111') }}">황남기</a>
                </li>
                <li>
                    <span>행정학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50559?subject_idx=1112') }}">김덕관</a>
                </li>
                <li>
                    <span>헌법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50109/?subject_idx=1114') }}">황남기</a>
                </li>
                <li>
                    <span>형법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50133?subject_idx=1116') }}">김원욱</a>
                </li>
                <li><span>형사소송법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50035?subject_idx=1117') }}">신광은</a></li>
                <li><span>경제학</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50487?subject_idx=1115') }}">황정빈</a></li>
                <li><span>세법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51167?subject_idx=1123') }}">박창한</a></li>
                <li>
                    <span>회계학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51166?subject_idx=1124') }}">이윤호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50057?subject_idx=1124') }}">김현식</a>
                </li>
                <li><span>국제법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50393?subject_idx=1127') }}">이상구</a></li>
                <li><span>국제정치학</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50393?subject_idx=1128') }}">이상구</a></li>
                <li><span>공직선거법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50109?subject_idx=1137') }}">황남기</a></li>
                <li><span>G-TELP</span><a href="https://lang.willbes.net/m/professor/show/cate/3093/prof-idx/50764?subject_idx=1478&subject_name=G-TELP">서민지</a></li>
                <li><span>프랑스어</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50001?subject_idx=1178') }}">박훈</a></li>
                <li><span>중국어</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50061?subject_idx=1162') }}">조소현</a></li>
            </ul>
        @elseif($menu_cate_code == '3023')
            {{-- 소방직 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>소방학개론</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51068?subject_idx=1113') }}">이종오</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50465?subject_idx=1113') }}">김종상</a>
                </li>                
                <li>
                    <span>소방관계법규</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51068?subject_idx=1138') }}">이종오</a>      
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50465?subject_idx=1138') }}">김종상</a>                
                </li>
                <li><span>행정법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50615?subject_idx=1111') }}">이석준</a></li>                
                <li>
                    <span>영어</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50309?subject_idx=1108') }}">이아림</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50071?subject_idx=1108') }}">양익</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51199?subject_idx=1108') }}">김현정</a>
                </li>
                <li>
                    <span>한국사</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50305?subject_idx=1109') }}">한경준</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50027?subject_idx=1109') }}">오태진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50003?subject_idx=1109') }}">원유철</a>
                </li>
                <li>
                    <span>국어</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50157?subject_idx=1107') }}">오대혁</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50661?subject_idx=1107') }}">김세령</a>
                </li>          
            </ul>
        @elseif($menu_cate_code == '3024')
            {{-- 군무원 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>국어</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50157?subject_idx=1107') }}">오대혁</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50241?subject_idx=1107') }}">기미진</a>                    
                </li>
                <li>
                    <span>행정법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51206?subject_idx=1111') }}">신기훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50615?subject_idx=1111') }}">이석준</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50407/?subject_idx=1111') }}">임병주</a>
                </li>
                <li>
                    <span>행정학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50559?subject_idx=1112') }}">김덕관</a>
                </li>
                <li>
                    <span>경영학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50609?subject_idx=1185') }}">황선호</a>
                </li>
                <li>
                    <span>국가정보학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50563?subject_idx=1236') }}">민진규</a>
                </li>
                <li>
                    <span>정보사회론</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50609?subject_idx=2151') }}">황선호</a>
                </li>
                <li>
                    <span>G-TELP</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50764?subject_idx=1478') }}">서민지</a>
                </li>                
                <li>
                    <span>전자회로</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50163/?subject_idx=1196') }}">최우영</a>
                </li>
                <li>
                    <span>예비전력관리담당자</span>
                    <a href="https://pass.willbes.net/promotion/index/cate/3024/code/1767" target="_blank">김도형</a>
                </li>
                <li>
                    <span>한국사검정능력시험</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50619?subject_idx=1237') }}">김상범</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50305?subject_idx=1237') }}">한경준</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3035')
            {{-- 법원직 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li><span>국어</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51220?subject_idx=1107') }}">박재현</a></li>
                <li><span>영어</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50651?subject_idx=1108') }}">박초롱</a></li>
                <li><span>한국사</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50571?subject_idx=1109') }}">임진석</a></li>
                <li><span>헌법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50591?subject_idx=1114') }}">이국령</a></li>
                <li><span>형법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50073?subject_idx=1116') }}">문형석</a></li>
                <li><span>형사소송법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50685?subject_idx=1117') }}">유안석</a></li>
                <li><span>민법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50519?subject_idx=1118') }}">김동진</a></li>
                <li><span>민사소송법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50145?subject_idx=1119') }}">이덕훈</a></li>
            </ul>
        @elseif($menu_cate_code == '3028')
            {{-- 기술직 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>국어</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50157?subject_idx=1107') }}">오대혁</a>
                </li>
                <li>
                    <span>영어</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50499?subject_idx=1108') }}">한덕현</a>
                </li>
                <li>
                    <span>한국사</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50619?subject_idx=1109') }}">김상범</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50027?subject_idx=1109') }}">오태진</a>                    
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50647?subject_idx=1109') }}">조민주</a>                   
                </li>                
                <li><span>통신직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50163') }}">최우영</a></li>
                <li><span>전기직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50163/?subject_idx=1193') }}">최우영</a></li>
                <li><span>토목직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50435?subject_idx=1215') }}">장성국</a></li>
                <li><span>농업직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50429?subject_idx=1172') }}">장사원</a></li>
                <li><span>농촌지도사</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50429?subject_idx=1230') }}">장사원</a></li>
                <li><span>유기농업기능사</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50429?subject_idx=1232') }}">장사원</a></li>
                <li><span>축산직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51150?subject_idx=2115') }}">윤용범</a></li>
                <li><span>기계직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51148?subject_idx=1216') }}">윤황현</a></li>
                <li><span>조경직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51153?subject_idx=2120') }}">이윤주</a></li>
                <li><span>전산직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51162?subject_idx=1169') }}">곽후근</a></li>
                <li><span>환경공학</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51163?subject_idx=2129') }}">신영조</a></li>
                <li><span>화학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51165?subject_idx=1182') }}">송연욱</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51164?subject_idx=1182') }}">김병일</a>
                </li>
                <li><span>환경보건</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50395?subject_idx=2130') }}">하재남</a></li>
                <li><span>산림자원직</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50541?subject_idx=1223') }}">장재영</a></li>
            </ul>
        @endif
    @elseif($__cfg['SiteCode'] == '2005')
        {{-- 고등고시온라인 --}}
        @if($menu_cate_code == '3094')
            {{-- 5급행정 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>경제학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50769?subject_idx=1480') }}">황종휴</a>
                </li>
                <li>
                    <span>행정법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50837?subject_idx=1481') }}">김정일</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50838?subject_idx=1481') }}">박도원</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50839?subject_idx=1481') }}">김기홍</a>
                </li>
                <li>
                    <span>행정학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50840?subject_idx=1482') }}">박경효</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50841?subject_idx=1482') }}">이동호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50848?subject_idx=1482') }}">최승호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50836?subject_idx=1482') }}">백승준</a>
                </li>
                <li>
                    <span>국제법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50852?subject_idx=1483') }}">안진우</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50851?subject_idx=1483') }}">백승호</a>
                </li>
                <li>
                    <span>정치학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50849?subject_idx=1484') }}">김희철</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50853?subject_idx=1484') }}">정원준</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50848?subject_idx=1484') }}">최승호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50836?subject_idx=1484') }}">백승준</a>
                </li>
                <li>
                    <span>교육학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50850?subject_idx=1485') }}">이인재</a>
                </li>
                <li>
                    <span>재정학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50769?subject_idx=1486') }}">황종휴</a>
                </li>
                <li>
                    <span>정책학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51841?subject_idx=1487') }}">이동호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50848?subject_idx=1487') }}">최승호</a>
                </li>
                <li>
                    <span>정보체계론</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50836?subject_idx=1488') }}">백승준</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50848?subject_idx=1488') }}">최승호</a>
                </li>
                <li>
                    <span>교육심리학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50850?subject_idx=1489') }}">이인재</a>
                </li>
                <li>
                    <span>국제경제학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50769?subject_idx=1490') }}">황종휴</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3095')
            {{-- 국립외교원 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>경제학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50769?subject_idx=1480') }}">황종휴</a>
                </li>
                <li>
                    <span>국제법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50852?subject_idx=1483') }}">안진우</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50851?subject_idx=1483') }}">백승호</a>
                </li>
                <li>
                    <span>국제경제학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50769?subject_idx=1490') }}">황종휴</a>
                </li>
                <li>
                    <span>국제정치학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50853?subject_idx=1491') }}">정원준</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50849?subject_idx=1491') }}">김희철</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3096')
            {{-- PSAT --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>자료해석</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50944?subject_idx=1716') }}">석치수</a>
                </li>
                <li>
                    <span>상황판단</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50945?subject_idx=1717') }}">박준범</a>
                </li>
                <li>
                    <span>언어논리</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50946?subject_idx=1718') }}">이나우</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50947?subject_idx=1718') }}">한승아</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50948?subject_idx=1718') }}">이현나</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3097')
            {{-- 5급헌법 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>5급헌법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50949?subject_idx=1719') }}">김유향</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50950?subject_idx=1719') }}">선동주</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3098')
            {{-- 법원행시 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>행정법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50837?subject_idx=1481') }}">김정일</a>
                </li>
                <li>
                    <span>민법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50954?subject_idx=1734') }}">김동진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50952?subject_idx=1734') }}">김남훈</a>
                </li>
                <li>
                    <span>형법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50959?subject_idx=1735') }}">이재철</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50957?subject_idx=1735') }}">이재상</a>
                </li>
                <li>
                    <span>헌법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50950?subject_idx=1736') }}">선동주</a>
                </li>
                <li>
                    <span>상법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50952?subject_idx=1739') }}">김남훈</a>
                </li>
                <li>
                    <span>민사소송법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50952?subject_idx=1737') }}">김남훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50955?subject_idx=1737') }}">이창한</a>
                </li>
                <li>
                    <span>형사소송법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50958?subject_idx=1738') }}">정주형</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50959?subject_idx=1738') }}">이재철</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3099')
            {{-- 변호사시험 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>민사>민사법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50952?subject_idx=1723') }}">김남훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50953?subject_idx=1723') }}">이종모</a>
                </li>
                <li>
                    <span>공법>공법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50962?subject_idx=1729') }}">임웅찬</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50837?subject_idx=1729') }}">김정일</a>
                </li>
                <li>
                    <span>민사>민법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50952?subject_idx=1720') }}">김남훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50954?subject_idx=1720') }}">김동진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50956?subject_idx=1720') }}">이태섭</a>
                </li>
                <li>
                    <span>민사>상법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50952?subject_idx=1721') }}">김남훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50953?subject_idx=1721') }}">이종모</a>
                </li>
                <li>
                    <span>민사>민소법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50952?subject_idx=1722') }}">김남훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50955?subject_idx=1722') }}">이창한</a>
                </li>
                <li>
                    <span>형사>형법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50957?subject_idx=1724') }}">이재상</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50959?subject_idx=1724') }}">이재철</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50961?subject_idx=1724') }}">김기환</a>
                </li>
                <li>
                    <span>형사>형소법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50959?subject_idx=1725') }}">이재철</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50961?subject_idx=1725') }}">김기환</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50958?subject_idx=1725') }}">정주형</a>
                </li>
                <li>
                    <span>형사법>형사법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50957?subject_idx=1726') }}">이재상</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50959?subject_idx=1726') }}">이재철</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50961?subject_idx=1726') }}">김기환</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50958?subject_idx=1726') }}">정주형</a>
                </li>
                <li>
                    <span>공법>헌법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50950?subject_idx=1727') }}">선동주</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50963?subject_idx=1727') }}">이국령</a>
                </li>
                <li>
                    <span>공법>행정법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50838?subject_idx=1728') }}">박도원</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50962?subject_idx=1728') }}">임웅찬</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50837?subject_idx=1728') }}">김정일</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50839?subject_idx=1728') }}">김기홍</a>
                </li>
                <li>
                    <span>선택>국제거래법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51012?subject_idx=1731') }}">이승현</a>
                </li>
            </ul>
        @endif
    @elseif($__cfg['SiteCode'] == '2006')
        {{-- 자격증온라인 --}}
        @if($menu_cate_code == '309002')
            {{-- 공인노무사 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>민법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50784?subject_idx=1492') }}">황보수정</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50770?subject_idx=1492') }}">김춘환</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50805?subject_idx=1492') }}">김동진</a>
                </li>
                <li>
                    <span>경영학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50783?subject_idx=1504') }}">전수환</a>
                </li>

                <li>
                    <span>경제학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51255?subject_idx=1493') }}">김영식</a>
                </li>
                <li>
                    <span>노동법(1, 2)</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50787?subject_idx=1771') }}">김광훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50794?subject_idx=1771') }}">이수진</a>
                </li>

                <li>
                    <span>사회보험법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50790?subject_idx=1508') }}">이주현</a>
                </li>

                <li>
                    <span>노동법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50794?subject_idx=1505') }}">이수진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51015?subject_idx=1505') }}">김지현</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50791?subject_idx=1505') }}">방강수</a>
                </li>

                <li>
                    <span>행정쟁송법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51120?subject_idx=1509') }}">문일</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50872?subject_idx=1509') }}">김정일</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50796?subject_idx=1509') }}">이승민</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50874?subject_idx=1509') }}">김기홍</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50779?subject_idx=1509') }}">조현</a>
                </li>

                <li>
                    <span>인사노무관리</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50799?subject_idx=1510') }}">정준모</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51069?subject_idx=1510') }}">오은지</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51117?subject_idx=1510') }}">박건민</a>
                </li>

                <li>
                    <span>경영조직론</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50799?subject_idx=1511') }}">정준모</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51069?subject_idx=1511') }}">오은지</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51117?subject_idx=1511') }}">박건민</a>
                </li>

                <li>
                    <span>노동경제학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50802?subject_idx=1512') }}">김우탁</a>
                </li>

                <li>
                    <span>민사소송법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50770?subject_idx=1513') }}">김춘환</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50807?subject_idx=1513') }}">이창한</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '309003')
            {{-- 감정평가사 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>민법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50770?subject_idx=1946') }}">김춘환</a>
                </li>

                <li>
                    <span>경제학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51255?subject_idx=1493') }}">김영식</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50771?subject_idx=1493') }}">황정빈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51187?subject_idx=1493') }}">황종휴</a>
                </li>

                <li>
                    <span>회계학</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51235?subject_idx=1494') }}">이재휴</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50772?subject_idx=1494') }}">김승철</a>
                </li>

                <li>
                    <span>감정평가관계법규</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50773?subject_idx=1497') }}">조민수</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50774?subject_idx=1497') }}">김도훈</a>
                </li>

                <li>
                    <span>부동산학원론</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/40775?subject_idx=1498') }}">송우석</a>
                </li>

                <li>
                    <span>감정평가실무</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50776?subject_idx=1499') }}">여지훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50774?subject_idx=1499') }}">김도훈</a>
                </li>

                <li>
                    <span>감정평가이론</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50777?subject_idx=1500') }}">어정민</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50778?subject_idx=1500') }}">최동진</a>
                </li>

                <li>
                    <span>감정평가 및 보상법규</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50781?subject_idx=1503') }}">이현진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50874?subject_idx=1503') }}">김기홍</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50779?subject_idx=1503') }}">조현</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50782?subject_idx=1503') }}">김선희</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '309004')
            {{-- 변리사 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li>
                    <span>민법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50805?subject_idx=1492') }}">김동진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50941?subject_idx=1492') }}">정정일</a>
                </li>
                <li>
                    <span>민사소송법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50807?subject_idx=1513') }}">이창한</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50809?subject_idx=1513') }}">김남훈</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50770?subject_idx=1513') }}">김춘환</a>
                </li>
                <li>
                    <span>생물</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50806?subject_idx=1556') }}">권용락</a>
                </li>
                <li>
                    <span>상표법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50943?subject_idx=1557') }}">이대현</a>
                </li>
                <li>
                    <span>특허법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50977?subject_idx=1558') }}">박상범</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50942?subject_idx=1558') }}">임근호</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50810?subject_idx=1558') }}">손인호</a>
                </li>
                <li>
                    <span>회로이론</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50808?subject_idx=1559') }}">양진목</a>
                </li>
            </ul>
        @endif
    @elseif($__cfg['SiteCode'] == '2008')
        @if($menu_cate_code == '3100')
            {{-- 경찰간부 --}}
            <ul>
                <li class="pl25">
                    <a href="{{ front_url('/professor/index/cate/' . $menu_cate_code) }}">교수진 전체보기</a>
                </li>
                <li><span>한국사</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50855?subject_idx=1591') }}">임진석</a></li>
                <li>
                    <span>형법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50856?subject_idx=1592') }}">문형석</a>
                </li>
                <li><span>행정학</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50858?subject_idx=1593') }}">이동호</a></li>
                <li><span>경찰학개론</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50862?subject_idx=1594') }}">정진천</a></li>
                <li><span>형사소송법</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51141?subject_idx=1595') }}">유안석</a></li>
                <li>
                    <span>민법총칙</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51176?subject_idx=1597') }}">김동진</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/50863?subject_idx=1597') }}">고태환</a>
                </li>
                <li>
                    <span>헌법</span>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51143?subject_idx=1974') }}">선동주</a>
                    <a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51142?subject_idx=1974') }}">이국령</a>
                </li>
                <li><span>범죄학</span><a href="{{ front_url('/professor/show/cate/' . $menu_cate_code . '/prof-idx/51175?subject_idx=1975') }}">김기환</a></li>
            </ul>
        @endif
    @endif
@endsection

{{-- 수강신청 --}}
@section('mega_menu_lecture')
    @if($__cfg['SiteCode'] == '2003')
        {{-- 공무원온라인 --}}
        @if($menu_cate_code == '3035')
            {{-- 법원직 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY') }}">예비순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D') }}">1순환(기본)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D') }}">2순환(심화)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D') }}">3순환(핵심)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D') }}">4순환(진도별모고)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D') }}">5순환(실전모고)</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1107') }}">국어</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1108') }}">영어</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1109') }}">한국사</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1114') }}">헌법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1116') }}">형법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1117') }}">형사소송법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1118') }}">민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1119') }}">민사소송법</a>
                </li>
                <li>
                    <span>패키지</span>
                    <a href="{{ front_url('/package/index/cate/' . $menu_cate_code . '/pack/648001') }}">순환별패키지</a>
                    <a href="{{ front_url('/periodPackage/show/cate/' . $menu_cate_code . '/pack/648001/prod-code/179624') }}">법원직PASS</a>
                </li>
            </ul>
        @endif
    @elseif($__cfg['SiteCode'] == '2004')
        {{-- 공무원학원 --}}
        <ul>
            <li>
                <span>9급</span>
                <a href="{{ front_url('/offPackage/index?cate_code=3043&campus_ccd=605001') }}">종합반</a>
                <a href="{{ front_url('/offLecture/index?cate_code=3043&campus_ccd=605001') }}">단과</a>
            </li>
            <li>
                <span>법원직</span>
                <a href="{{ front_url('/offPackage/index?cate_code=3059&campus_ccd=605001') }}">종합반</a>
                <a href="{{ front_url('/offLecture/index?cate_code=3059&campus_ccd=605001') }}">단과</a>
            </li>
            <li>
                <span>소방직</span>
                <a href="{{ front_url('/offPackage/index?cate_code=3050&campus_ccd=605001') }}">종합반</a>
                <a href="{{ front_url('/offLecture/index?cate_code=3050&campus_ccd=605001') }}">단과</a>
            </li>
            <li>
                <span>기술직</span>
                <a href="{{ front_url('/offPackage/index?cate_code=3052&campus_ccd=605001') }}">종합반</a>
                <a href="{{ front_url('/offLecture/index?cate_code=3052&campus_ccd=605001') }}">단과</a>
            </li>
            <li>
                <span>군무원</span>
                <a href="{{ front_url('/offPackage/index?cate_code=3048&campus_ccd=605001') }}">종합반</a>
                <a href="{{ front_url('/offLecture/index?cate_code=3048&campus_ccd=605001') }}">단과</a>
            </li>
        </ul>
    @elseif($__cfg['SiteCode'] == '2005')
        {{-- 고등고시온라인 --}}
        @if($menu_cate_code == '3094')
            {{-- 5급행정 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1107') }}">원론강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1108') }}">예비순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1109') }}">GS1순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1110') }}">GS2순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1111') }}">GS3순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1112') }}">GS4순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1113') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1276') }}">황종휴경제학특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1480') }}">경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1481') }}">행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1482') }}">행정학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1483') }}">국제법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1484') }}">정치학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1485') }}">교육학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1486') }}">재정학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1487') }}">정책학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1488') }}">정보체계론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1489') }}">교육심리학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1490') }}">국제경제학</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3095')
            {{-- 국립외교원 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1107') }}">원론강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1108') }}">예비순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1109') }}">GS1순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1110') }}">GS2순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1111') }}">GS3순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1113') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1276') }}">황종휴경제학특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1480') }}">경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1483') }}">국제법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1490') }}">국제경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1491') }}">국제정치학</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3096')
            {{-- PSAT --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1128') }}">기초입문</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1129') }}">기본강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1130') }}">집중심화</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1131') }}">핵심체크</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1132') }}">실전모강+해설및핵심정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1204') }}">전국모의고사</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1113') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1245') }}">선구안특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1286') }}">역대엄선실전모강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1287') }}">기출해설</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1289') }}">기출변형</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1716') }}">자료해석</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1717') }}">상황판단</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1718') }}">언어논리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1799') }}">PSAT</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3097')
            {{-- 5급헌법 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1129') }}">기초강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1131') }}">핵심체크</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1132') }}">실전모강+해설및핵심정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1113') }}">특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1719') }}">5급헌법</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3098')
            {{-- 법원행시 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1199') }}">집중정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1200') }}">기출해설</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1201') }}">문제풀이</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1202') }}">최신판례</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1203') }}">실전문풀</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1204') }}">전국모의고사</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1481') }}">행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1734') }}">민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1735') }}">형법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1736') }}">헌법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1739') }}">상법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1737') }}">민사소송법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1738') }}">형사소송법</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '3099')
            {{-- 변호사시험 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1209') }}">예비순환(기본)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1205') }}">1순환(심화)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1206') }}">2순환(심화)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1207') }}">3순환(문물)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1208') }}">4순환(핵심)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1214') }}">1순환(판례)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1215') }}">2순환(판례)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1216') }}">3순환(판례)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1210') }}">암기장특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1211') }}">핵지총특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1113') }}">특강</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1723') }}">민사>민사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1720') }}">민사>민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1721') }}">민사>상법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1722') }}">민사>민소법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1724') }}">형사>형법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1725') }}">형사>형소법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1726') }}">형사법>형사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1727') }}">공법>헌법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1728') }}">공법>행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1949') }}">기록형>민사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1950') }}">기록형>형사법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1951') }}">기록형>공법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1730') }}">선택>국제법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1731') }}">선택>국제거래법</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/userPackage/show/cate/' . $menu_cate_code . '/prod-code/164320') }}">빈출쟁점 다다익선 이벤트</a>
                </li>
            </ul>
        @endif
    @elseif($__cfg['SiteCode'] == '2006')
        {{-- 자격증온라인 --}}
        @if($menu_cate_code == '309002')
            {{-- 공인노무사 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1247') }}">1차기본이론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1248') }}">1차문제풀이</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1250') }}">1차최종정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1116') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1127') }}">동차반</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1126') }}">2차입문강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1117') }}">0순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1118') }}">1순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1119') }}">2순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1120') }}">3순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1253') }}">2차최종정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1290') }}">공부방법론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1114') }}">모의고사</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1492') }}">민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1493') }}">경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1504') }}">경영학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1771') }}">노동법(1,2)</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1508') }}">사회보험법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1505') }}">노동법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1509') }}">행정쟁송법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1510') }}">인사노무관리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1511') }}">경영조직론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1512') }}">노동경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1513') }}">민사소송법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1772') }}">설명회</a>
                </li>
                <li>
                    <span>패키지</span>
                    <a href="{{ front_url('/package/index/cate/' . $menu_cate_code . '/pack/648002') }}">추천패키지</a>
                    <a href="{{ front_url('/package/index/cate/' . $menu_cate_code . '/pack/648001') }}">T패스</a>
                    <a href="{{ front_url('/userPackage/index/cate/' . $menu_cate_code) }}">선택형종합반</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '309003')
            {{-- 감정평가사 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1247') }}">1차기본이론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1248') }}">1차문제풀이</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1249') }}">1차모의고사</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1250') }}">1차최종정리</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1116') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1251') }}">2차기본강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1252') }}">2차문제풀이</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1121') }}">0기스터디</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1122') }}">1기스터디</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1123') }}">2기스터디</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1124') }}">3기스터디</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1125') }}">4시스터디</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1220') }}">학원보강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1268') }}">입문강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1290') }}">공부방법론</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1492') }}">민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1493') }}">경제학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1494') }}">회계학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1497') }}">감정평가관계법규</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1498') }}">부동산학원론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1499') }}">감정평가실무</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1500') }}">감정평가이론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1503') }}">감정평가및보상법규</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1501') }}">감평행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1502') }}">보상법규</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1772') }}">설명회</a>
                </li>
                <li>
                    <span>패키지</span>
                    <a href="{{ front_url('/package/index/cate/' . $menu_cate_code . '/pack/648001') }}">추천패키지</a>
                    <a href="{{ front_url('/package/index/cate/' . $menu_cate_code . '/pack/648001?course_idx=1288') }}">T패스</a>
                    <a href="{{ front_url('/userPackage/index/cate/' . $menu_cate_code) }}">선택형종합반</a>
                </li>
            </ul>
        @elseif($menu_cate_code == '309004')
            {{-- 변리사 --}}
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1116') }}">특강</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1142') }}">핵심정리+객관식</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1143') }}">사례/판례강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1146') }}">기초GS</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1144') }}">실전GS</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1145') }}">단권화강의</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1090') }}">기출문제풀이</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?course_idx=1086') }}">기본이론</a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1492') }}">민법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1513') }}">민사소송법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1556') }}">생물</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1557') }}">상표법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1558') }}">특허법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?subject_idx=1559') }}">회로이론</a>
                </li>
            </ul>
        @endif
    @elseif($__cfg['SiteCode'] == '2008')
        {{-- 경찰간부 --}}
        @if($menu_cate_code == '3100')
            <ul>
                <li>
                    <span>순환별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&course_idx=1147') }}">예비순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&course_idx=1148') }}">1순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&course_idx=1149') }}">2순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&course_idx=1150') }}">3순환</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=1151') }}">특강 </a>
                </li>
                <li>
                    <span>과목별</span>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&course_idx=&subject_idx=1591') }}">한국사</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1592') }}">형법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1593') }}">행정학</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1594') }}">경찰학개론</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1595') }}">형사소송법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1596') }}">행정법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1597') }}">민법총칙</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1600') }}">설명회</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1741') }}">영어</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1974') }}">헌법</a>
                    <a href="{{ front_url('/lecture/index/cate/' . $menu_cate_code . '/pattern/only?search_order=course&c=&course_idx=&subject_idx=1975') }}">범죄학</a>
                </li>
            </ul>
        @endif
    @endif
@endsection
