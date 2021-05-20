{{-- 공무원온라인 메뉴 레이어 class 설정 --}}
@if($__cfg['SiteCode'] == '2003')
    @php $menu_layer_class = 'gosi'; @endphp
    @if($__cfg['CateCode'] == '3024')
        @php $menu_layer_class = 'gp'; @endphp
    @elseif($__cfg['CateCode'] == '3030')
        @php $menu_layer_class = 'noncom'; @endphp
    @endif
@endif

{{-- 공무원온라인 메뉴 --}}
@section('mega_menu_professor')
    {{-- 교수진소개 --}}
    @if($__cfg['SiteCode'] == '2003')
        {{-- 공무원 온라인 --}}
        <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 {{ $menu_layer_class }}">
            <div class="prof-drop-Box">
                <h5>9급</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">김세령</a>
                    </li>
                    <li>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/51070/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">선석</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50991/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">안성호</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/51011/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">이섬가</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/51199/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">김현정</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                        
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">원유철</a>                       
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">황남기</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">이석준</a>                     
                    </li>                    
                    <li>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                        <span>[형법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50133/?subject_idx=1116')}}">김원욱</a>
                        <span>[형사소송법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50035/?subject_idx=1117&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">신광은</a>
                    </li>
                    <li>
                        <span>[사회복지학]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/51238?subject_idx=1134')}}">정형윤</a>                    
                    </li>
                    <li>
                        <span>[세법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                        <span>[회계학]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김현식</a>
                    </li>
                    <li>                        
                        <span>[국제법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95')}}">이상구</a>
                        <span>[공직선거법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95')}}">황남기</a>
                    </li>
                    <li>
                        <span>[사회]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                        <span>[수학]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99')}}">곽윤근</a>                        
                    </li>                        
                </ul>
                <h5>법원직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/51220?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">박재현</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">박초롱</a>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50571/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">임진석</a>
                    </li>
                    <li>
                        <span>[헌법]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50591/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95')}}">이국령</a>
                        <span>[형법]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50073/?subject_idx=1116&subject_name=%ED%98%95%EB%B2%95')}}">문형석</a>
                        <span>[형사소송법]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50685/?subject_idx=1117&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">유안석</a>
                    </li>
                    <li>
                        <span>[민법]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50519/?subject_idx=1118&subject_name=%EB%AF%BC%EB%B2%95')}}">김동진</a>
                        <span>[민사소송법]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50145/?subject_idx=1119&subject_name=%EB%AF%BC%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">이덕훈</a>
                    </li>
                </ul>
                <h5>소방직</h5>
                <ul>
                    <li>
                        <span>[소방학개론]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/51068/?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0')}}">이종오</a>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50465/?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0')}}">김종상</a>
                    </li>
                    <li>
                        <span>[소방관계법규]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/51068/?subject_idx=1138&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C')}}">이종오</a>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50465/?subject_idx=1138&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C')}}">김종상</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50615?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">이석준</a>
                    </li>
                    <li>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50071/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">양익</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">원유철</a>
                    </li>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">김세령</a>
                    </li>
                </ul>                   
            </div>

            <div class="prof-drop-Box">
                <h5>7급</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                    </li>
                    <li>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">원유철</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50615/?subject_idx=1111')}}">이석준</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">황남기</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">윤세훈</a>
                    </li>
                    <li>
                        <span>[헌법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50139/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95')}}">유시완</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50109/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95')}}">황남기</a>
                        <span>[경제학]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50487/?subject_idx=1115&subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99')}}">황정빈</a>
                        <span>[형법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50133/?subject_idx=1116')}}">김원욱</a>
                        <span>[형사소송법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50035/?subject_idx=1117&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">신광은</a>
                    </li>
                    <li>
                        <span>[세법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                        <span>[회계학]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김현식</a>
                        <span>[국제법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95')}}">이상구</a>
                    </li>
                    <li>
                        <span>[국제정치학]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50393/?subject_idx=1128&subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99')}}">이상구</a>
                        <span>[공직선거법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95')}}">황남기</a>
                    </li>
                    <li>
                        <span>[G-TELP]</span>
                        <a href="https://lang.willbes.net/professor/show/cate/3093/prof-idx/50764/?subject_idx=1478&subject_name=G-TELP&search_order=course&tab=home&series=">서민지</a>
                        <span>[프랑스어]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50001/?subject_idx=1178&subject_name=%ED%94%84%EB%9E%91%EC%8A%A4%EC%96%B4')}}">박훈</a>
                    </li>
                    <li>
                        <span>[중국어]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50061/?subject_idx=1162&subject_name=%EC%A4%91%EA%B5%AD%EC%96%B4')}}">조소현</a>
                        <span>[경영학]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50763/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99&search_order=course&tab=open_lecture&series=')}}">고강유</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">전수환</a>
                    </li>                    
                </ul>
                <h5>기술직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">원유철</a>
                    </li>
                    <li>                        
                        <span>[전기기기]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50718/?subject_idx=1168&subject_name=%EC%A0%84%EA%B8%B0%EA%B8%B0%EA%B8%B0')}}">최우영</a>
                    </li>
                    <li>
                        <span>[재배학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99')}}">장사원</a>
                        <span>[식용작물]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50429/?subject_idx=1172&subject_name=%EC%8B%9D%EC%9A%A9%EC%9E%91%EB%AC%BC')}}">장사원</a>
                        <span>[전기이론]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50718/?subject_idx=1173&subject_name=%EC%A0%84%EA%B8%B0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                    </li>
                    <li>
                        <span>[전자공학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50163/?subject_idx=1193&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99')}}">최우영</a>
                        <span>[무선공학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50163/?subject_idx=1194&subject_name=%EB%AC%B4%EC%84%A0%EA%B3%B5%ED%95%99')}}">최우영</a>
                        <span>[통신이론]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50163/?subject_idx=1195&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                    </li>
                    <li>
                        <span>[회로이론]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50718/?subject_idx=1198&subject_name=%ED%9A%8C%EB%A1%9C%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                        <span>[전기자기학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50163/?subject_idx=1210&subject_name=%EC%A0%84%EA%B8%B0%EC%9E%90%EA%B8%B0%ED%95%99')}}">최우영</a>
                    </li>
                    <li>
                        <span>[토목설계]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50435/?subject_idx=1215&subject_name=%ED%86%A0%EB%AA%A9%EC%84%A4%EA%B3%84')}}">장성국</a>
                        <span>[응용역학개론]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50435/?subject_idx=1214&subject_name=%EC%9D%91%EC%9A%A9%EC%97%AD%ED%95%99%EA%B0%9C%EB%A1%A0')}}">장성국</a>
                    </li>
                    <li>
                        <span>[작물생리학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50429/?subject_idx=1220&subject_name=%EC%9E%91%EB%AC%BC%EC%83%9D%EB%A6%AC%ED%95%99')}}">장사원</a>
                        <span>[생물]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50429/?subject_idx=1222&subject_name=%EC%83%9D%EB%AC%BC')}}">장사원</a>
                    </li>
                    <li>
                        <span>[농촌지도론]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50429/?subject_idx=1230&subject_name=%EB%86%8D%EC%B4%8C%EC%A7%80%EB%8F%84%EB%A1%A0')}}">장사원</a>
                        <span>[유기농업기능사]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50429/?subject_idx=1232&subject_name=%EC%9C%A0%EA%B8%B0%EB%86%8D%EC%97%85%EA%B8%B0%EB%8A%A5%EC%82%AC')}}">장사원</a>
                        <span>[토양학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50429/?subject_idx=1243&subject_name=%ED%86%A0%EC%96%91%ED%95%99')}}">장사원</a>
                        <span>[가축사양학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51150?subject_idx=2115&subject_name=%EA%B0%80%EC%B6%95%EC%82%AC%EC%96%91%ED%95%99')}}">윤용범</a> 
                        <span>[가축육종학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51150?subject_idx=2116&subject_name=%EA%B0%80%EC%B6%95%EC%9C%A1%EC%A2%85%ED%95%99')}}">윤용범</a>                       
                    </li>
                    <li>                        
                        <span>[기계일반]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51148?subject_idx=1216&subject_name=%EA%B8%B0%EA%B3%84%EC%9D%BC%EB%B0%98')}}">윤황현</a>
                        <span>[기계설계]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51148?subject_idx=1217&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84')}}">윤황현</a>
                    </li>
                    <li>
                        <span>[조경학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51152?subject_idx=2117&subject_name=%EC%A1%B0%EA%B2%BD%ED%95%99')}}">이윤주</a>
                        <span>[조경계획 및 설계/생태계관리]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51152?subject_idx=2119&subject_name=%EC%A1%B0%EA%B2%BD%EA%B3%84%ED%9A%8D%20%EB%B0%8F%20%EC%84%A4%EA%B3%84')}}">이윤주</a>
                    </li>
                    <li>
                        <span>[컴퓨터일반]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51162?subject_idx=1169&subject_name=%EC%BB%B4%ED%93%A8%ED%84%B0%EC%9D%BC%EB%B0%98')}}">곽후근</a>
                        <span>[정보보호론]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51162?subject_idx=1170&subject_name=%EC%A0%95%EB%B3%B4%EB%B3%B4%ED%98%B8%EB%A1%A0')}}">곽후근</a>
                    </li>
                    <li>
                        <span>[환경공학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51163?subject_idx=2129&subject_name=%ED%99%98%EA%B2%BD%EA%B3%B5%ED%95%99')}}">신영조</a>
                        <span>[화학]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51165?subject_idx=1182&subject_name=%ED%99%94%ED%95%99')}}">송연욱</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/51164?subject_idx=1182&subject_name=%ED%99%94%ED%95%99')}}">김병일</a>
                        <span>[환경보건]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50395?subject_idx=2130&subject_name=%ED%99%98%EA%B2%BD%EB%B3%B4%EA%B1%B4')}}">하재남</a>
                    </li>
                    <li>
                        <span>[임업경영]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50541?subject_idx=1223&subject_name=%EC%9E%84%EC%97%85%EA%B2%BD%EC%98%81')}}">장재영</a>
                        <span>[조림]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50541?subject_idx=1224&subject_name=%EC%A1%B0%EB%A6%BC')}}">장재영</a>
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>세무직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                    </li>
                    <li>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">원유철</a>
                    </li>
                    <li>
                        <span>[세법]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/51167/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95')}}">박창한</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                    </li>
                    <li>
                        <span>[회계학]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/51166/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">이윤호</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김현식</a>
                    </li>
                    <li>
                        <span>[사회]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                    </li>
                    <li>
                        <span>[수학]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99')}}">곽윤근</a>
                    </li>
                </ul>
                <h5>7급 PSAT</h5>
                <ul>
                    <li>
                        <span>[언어논리]</span>
                        <a href="https://pass.willbes.net/home/index/cate/3103" target="_blank">이나우</a>
                        <a href="https://pass.willbes.net/home/index/cate/3103" target="_blank">한승아</a>
                    </li>
                    <li>
                        <span>[자료해석]</span>
                        <a href="https://pass.willbes.net/home/index/cate/3103" target="_blank">석치수</a>
                        <span>[상황판단]</span>
                        <a href="https://pass.willbes.net/home/index/cate/3103" target="_blank">박준범</a>
                    </li>
                </ul> 
                <h5>군무원</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50157/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">오대혁</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50621/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">임재진</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">이석준</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50407/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">임병주</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50107/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김헌</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                    </li>
                    <li>
                        <span>[경영학]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50609/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">황선호</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50763/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">고강유</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">전수환</a>
                    </li>
                    <li>
                        <span>[국가정보학]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50563/?subject_idx=1236&subject_name=%EA%B5%AD%EA%B0%80%EC%A0%95%EB%B3%B4%ED%95%99')}}">민진규</a>
                        <span>[정보사회론]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50609/?subject_idx=2151&subject_name=%EC%A0%95%EB%B3%B4%EC%82%AC%ED%9A%8C%EB%A1%A0')}}">황선호</a>
                    </li>
                    <li>
                        <span>[G-TELP]</span>
                        <a href="https://lang.willbes.net/professor/show/cate/3093/prof-idx/50764/?subject_idx=1478&subject_name=G-TELP&search_order=course&tab=home&series=">서민지</a>
                        <span>[전자회로]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50163/?subject_idx=1196&subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C')}}">최우영</a>
                    </li>
                    <li>
                        <span>[한국사검정능력시험]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50619/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98')}}">김상범</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50305/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98')}}">한경준</a>
                    </li>
                    <li>
                        <span>[예비전력관리업무담당자]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/51056?subject_idx=1967&subject_name=%EC%98%88%EB%B9%84%EC%A0%84%EB%A0%A5%EA%B4%80%EB%A6%AC')}}">김도형</a>
                    </li>
                </ul>
            </div>
        </div>
    @elseif($__cfg['SiteCode'] == '2004')
        {{-- 공무원 학원 --}}
        <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 GA">
            <div class="prof-drop-Box">
                <h5>9급</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50500/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        <a href="{{front_url('/professor/show/prof-idx/50310/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                        <a href="{{front_url('/professor/show/prof-idx/50072/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">양익</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50648/?cate_code=3043&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/prof-idx/50306/?cate_code=3043&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50616/?cate_code=3043&subject_idx=1257&subject_name=행정법')}}">이석준</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50560/?cate_code=3043&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                    </li>
                    <li>
                        <span>[국제법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50394/?cate_code=3043&subject_idx=1273&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95')}}">이상구</a>
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>7급</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50242/?cate_code=3044&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50500/?cate_code=3044&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>                        
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50648/?cate_code=3044&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50616/?cate_code=3044&subject_idx=1257&subject_name=행정법')}}">이석준</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50560/?cate_code=3044&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                        <span>[헌법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50140/?cate_code=3044&subject_idx=1260&subject_name=%ED%97%8C%EB%B2%95')}}">유시완</a>
                    </li>
                    <li>
                        <span>[경제학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50488/?cate_code=3044&subject_idx=1261&subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99')}}">황정빈</a>
                        <span>[세법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50188/?cate_code=3044&subject_idx=1269&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                        <span>[회계학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50228/?cate_code=3044&subject_idx=1270&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>
                    </li>
                    <li>
                        <span>[국제법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50394/?cate_code=3044&subject_idx=1273&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95')}}">이상구</a>
                        <span>[국제정치학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50394/?cate_code=3044&subject_idx=1274&subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99')}}">이상구</a>                    </li>
                    <li>
                        <span>[프랑스어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50002/?cate_code=3044&subject_idx=1324&subject_name=%ED%94%84%EB%9E%91%EC%8A%A4%EC%96%B4')}}">박훈</a>
                        <span>[중국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50062/?cate_code=3044&subject_idx=1308&subject_name=%EC%A4%91%EA%B5%AD%EC%96%B4')}}">조소현</a>
                        <span>[경영학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50762/?cate_code=3044&subject_idx=1331&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">고강유</a>
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>세무직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50242/?cate_code=3046&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50500/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        <a href="{{front_url('/professor/show/prof-idx/50310/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50648/?cate_code=3046&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/prof-idx/50306/?cate_code=3046&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50560/?cate_code=3046&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                        <span>[세법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50188/?cate_code=3046&subject_idx=1269&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                    </li>
                    <li>
                        <span>[회계학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50228/?cate_code=3046&subject_idx=1270&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>
                        {{--
                        <span>[사회]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50182/?cate_code=3046&subject_idx=1279&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                        --}}
                    </li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>법원직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51254?cate_code=3059&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">박재현</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50652/?cate_code=3059&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">박초롱</a>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50572/?cate_code=3059&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">임진석</a>
                    </li>
                    <li>
                        <span>[헌법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50592/?cate_code=3059&subject_idx=1260&subject_name=%ED%97%8C%EB%B2%95')}}">이국령</a>
                        <span>[민법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50520/?cate_code=3059&subject_idx=1264&subject_name=%EB%AF%BC%EB%B2%95')}}">김동진</a>
                        <span>[민사소송법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50146/?cate_code=3059&subject_idx=1265&subject_name=%EB%AF%BC%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">이덕훈</a>
                    </li>
                    <li>
                        <span>[형법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50074/?cate_code=3059&subject_idx=1262&subject_name=%ED%98%95%EB%B2%95')}}">문형석</a>
                        <span>[형사소송법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50686/?cate_code=3059&subject_idx=1263&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95')}}">유안석</a>
                    </li>
                </ul>
                <h5>소방직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50662/?cate_code=3050&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">김세령</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50310/?cate_code=3050&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                        <a href="{{front_url('/professor/show/prof-idx/50072/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">양익</a>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50306/?cate_code=3050&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                    </li>
                    <li>
                        <span>[소방학개론]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51055/?cate_code=3050&subject_idx=1259&subject_name=소방학개론')}}">이종오</a>
                        <span>[소방관계법규]]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51055/?cate_code=3050&subject_idx=1284&subject_name=소방관계법규')}}">이종오</a>
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>기술직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50242/?cate_code=3052&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50500/?cate_code=3052&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        {{--
                        <a href="{{front_url('/professor/show/prof-idx/50346/?cate_code=3052&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                        --}}
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50648/?cate_code=3052&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/prof-idx/50306/?cate_code=3052&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                    </li>
                    <li>
                        <span>[전기기기]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50719/?cate_code=3052&subject_idx=1314&subject_name=%EC%A0%84%EA%B8%B0%EA%B8%B0%EA%B8%B0')}}">최우영</a>
                        <span>[전기이론]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50719/?cate_code=3052&subject_idx=1319&subject_name=%EC%A0%84%EA%B8%B0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                        <span>[전자공학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1339&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99')}}">최우영</a>
                    </li>
                    <li>
                        <span>[무선공학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1340&subject_name=%EB%AC%B4%EC%84%A0%EA%B3%B5%ED%95%99')}}">최우영</a>
                        <span>[통신이론]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1341&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                        <span>[회로이론]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50719/?cate_code=3052&subject_idx=1344&subject_name=%ED%9A%8C%EB%A1%9C%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                    </li>
                    <li>
                        <span>[전자이론]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1342&subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C')}}">최우영</a>
                        <span>[전기자기학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1356&subject_name=%EC%A0%84%EA%B8%B0%EC%9E%90%EA%B8%B0%ED%95%99')}}">최우영</a>
                    </li>
                    <li>
                        <span>[재배학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1317&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99')}}">장사원</a>
                        <span>[식용작물]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1318&subject_name=%EC%8B%9D%EC%9A%A9%EC%9E%91%EB%AC%BC')}}">장사원</a>
                        <span>[작물생리학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1366&subject_name=%EC%9E%91%EB%AC%BC%EC%83%9D%EB%A6%AC%ED%95%99')}}">장사원</a>
                    </li>
                    <li>
                        <span>[생물]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1327&subject_name=%EC%83%9D%EB%AC%BC')}}">장사원</a>
                        <span>[농촌지도론]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1376&subject_name=%EB%86%8D%EC%B4%8C%EC%A7%80%EB%8F%84%EB%A1%A0')}}">장사원</a>
                        <span>[토양학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1389&subject_name=%ED%86%A0%EC%96%91%ED%95%99')}}">장사원</a>
                    </li>
                    <li>
                        <span>[유기농업기능사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50430/?cate_code=3052&subject_idx=1378&subject_name=%EC%9C%A0%EA%B8%B0%EB%86%8D%EC%97%85%EA%B8%B0%EB%8A%A5%EC%82%AC')}}">장사원</a>
                        <span>[응용역학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50436/?cate_code=3052&subject_idx=1360&subject_name=%EC%9D%91%EC%9A%A9%EC%97%AD%ED%95%99%EA%B0%9C%EB%A1%A0')}}">장성국</a>
                        <span>[토목설계]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50436/?cate_code=3052&subject_idx=1361&subject_name=%ED%86%A0%EB%AA%A9%EC%84%A4%EA%B3%84')}}">장성국</a>
                        <span>[가축사양학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51151?cate_code=3052&subject_idx=2113&subject_name=%EA%B0%80%EC%B6%95%EC%82%AC%EC%96%91%ED%95%99')}}">윤용범</a>
                        <span>[가축육종학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51151?cate_code=3052&subject_idx=2114&subject_name=%EA%B0%80%EC%B6%95%EC%9C%A1%EC%A2%85%ED%95%99')}}">윤용범</a>
                        <span>[기계일반]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51149?cate_code=3052&subject_idx=1362&subject_name=%EA%B8%B0%EA%B3%84%EC%9D%BC%EB%B0%98')}}">윤황현</a>
                        <span>[기계설계]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51149?cate_code=3052&subject_idx=1363&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84')}}">윤황현</a>
                        <span>[조경학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51153?cate_code=3052&subject_idx=2120&subject_name=%EC%A1%B0%EA%B2%BD%ED%95%99')}}">이윤주</a>
                        <span>[조경계획 및 설계/생태계관리]</span>
                        <a href="{{front_url('/professor/show/prof-idx/51153?cate_code=3052&subject_idx=2120&subject_name=%EC%A1%B0%EA%B2%BD%ED%95%99')}}">이윤주</a>
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>군무원</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50242/?cate_code=3048&subject_idx=1253&subject_name=국어')}}">기미진</a>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50616/?cate_code=3048&subject_idx=1257&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">이석준</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50560/?cate_code=3048&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                    </li>
                    <li>
                        <span>[경영학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50762/?cate_code=3048&subject_idx=1331&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">고강유</a>
                        <span>[전자공학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1339&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99')}}">최우영</a>
                        <span>[통신이론]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50164/?cate_code=3052&subject_idx=1341&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0')}}">최우영</a>
                    </li>
                </ul>
            </div>
        </div>
    @elseif($__cfg['SiteCode'] == '2017')
        {{-- 임용 --}}
        <div class="drop-Box list-drop-Box list-drop-Box-ssam">
            <table class="ssamProf">
                <thead>
                    <tr>
                        <th rowspan="2" scope="col">교육학</th>
                        <th colspan="2" scope="col">유 · 초등</th>
                        <th colspan="10" scope="col">중등</th>
                    </tr>
                    <tr>
                        <th>유아</th>
                        <th>초등</th>
                        <th>국어</th>
                        <th>영어</th>
                        <th>수학</th>
                        <th>생물</th>
                        <th>도덕윤리</th>
                        <th>역사</th>
                        <th>음악</th>
                        <th>전기전자통신</th>
                        <th>정보컴퓨터</th>
                        <th>중국어</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51074?cate_code=3134&subject_idx=1980')}}">이인재</a></li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51075?cate_code=3134&subject_idx=1980')}}">홍의일</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981')}}">민정선</a></li>
                    </td>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51077?cate_code=3136&subject_idx=1982')}}">배재민</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li class="subTit">국어/문학<br>교육론</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51078?cate_code=3137&subject_idx=1983')}}">송원영</a></li>
                            <li class="subTit">문법</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51079?cate_code=3137&subject_idx=1983')}}">이원근</a></li>
                            <li class="subTit">문법</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51080?cate_code=3137&subject_idx=1983')}}">권보민</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li class="subTit">일반영어<br>영미문학</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51081?cate_code=3137&subject_idx=1984')}}">김유석</a></li>
                            <li class="subTit">영어학</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51082?cate_code=3137&subject_idx=1984')}}">김영문</a></li>
                            <li class="subTit">영어학<br>영어교육론</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51083?cate_code=3137&subject_idx=1984')}}">공훈</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li class="subTit">전공수학</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51084?cate_code=3137&subject_idx=1985')}}">김철홍</a></li>
                            <li class="subTit">수학교육론</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51085?cate_code=3137&subject_idx=1986')}}">박태영</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li class="subTit">전공생물</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51086?cate_code=3137&subject_idx=1987')}}">강치욱</a></li>
                            <li class="subTit">생물교육론</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51087?cate_code=3137&subject_idx=1988')}}">양혜정</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51088?cate_code=3137&subject_idx=1989')}}">김병찬</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51089?cate_code=3137&subject_idx=1990')}}">최용림</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991')}}">다이애나</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992')}}">최우영</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li class="subTit">정보컴퓨터</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51092?cate_code=3137&subject_idx=1993')}}">송광진</a></li>
                            <li class="subTit">정컴교육론</li>
                            <li><a href="{{front_url('/professor/show/prof-idx/51093?cate_code=3137&subject_idx=1994')}}">장순선</a></li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><a href="{{front_url('/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995')}}">정경미</a></li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
            {{--
            <ul>
                <li class="Tit">교육학</li>
                <li>
                    <a href="{{front_url('/professor/show/prof-idx/51073?cate_code=3134&subject_idx=1980')}}">김차웅</a>
                    <a href="{{front_url('/professor/show/prof-idx/51074?cate_code=3134&subject_idx=1980')}}">이인재</a>
                    <a href="{{front_url('/professor/show/prof-idx/51075?cate_code=3134&subject_idx=1980')}}">홍의일</a>
                </li>
                <li class="Tit">유아</li>
                <li>
                    <a href="{{front_url('/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981')}}">민정선</a>
                </li>
                <li class="Tit">초등</li>
                <li>
                    <a href="{{front_url('/professor/show/prof-idx/51077?cate_code=3136&subject_idx=1982')}}">배재민</a>
                </li>
            </ul>            
            <ul>
                <li class="Tit">중등</li>
                <li>
                    <span>전공국어</span>
                    <a href="{{front_url('/professor/show/prof-idx/51078?cate_code=3137&subject_idx=1983')}}">송원영</a>
                    <a href="{{front_url('/professor/show/prof-idx/51079?cate_code=3137&subject_idx=1983')}}">이원근</a>
                    <a href="{{front_url('/professor/show/prof-idx/51080?cate_code=3137&subject_idx=1983')}}">권보민</a>
                </li>
                <li>
                    <span>전공영어</span>
                    <a href="{{front_url('/professor/show/prof-idx/51081?cate_code=3137&subject_idx=1984')}}">김유석</a>
                    <a href="{{front_url('/professor/show/prof-idx/51082?cate_code=3137&subject_idx=1984')}}">김영문</a>
                    <a href="{{front_url('/professor/show/prof-idx/51083?cate_code=3137&subject_idx=1984')}}">공훈</a>
                </li>
                <li>
                    <span>전공수학</span>
                    <a href="{{front_url('/professor/show/prof-idx/51084?cate_code=3137&subject_idx=1985')}}">김철홍</a>
                </li>
                <li>
                    <span>수학교육론</span>
                    <a href="{{front_url('/professor/show/prof-idx/51085?cate_code=3137&subject_idx=1986')}}">박태영</a>
                </li>
                <li>
                    <span>전공생물</span>
                    <a href="{{front_url('/professor/show/prof-idx/51086?cate_code=3137&subject_idx=1987')}}">강치욱</a>
                </li>
                <li>
                    <span>생물교육론</span>
                    <a href="{{front_url('/professor/show/prof-idx/51087?cate_code=3137&subject_idx=1988')}}">양혜정</a>
                </li>
                <li>
                    <span>도덕윤리</span>
                    <a href="{{front_url('/professor/show/prof-idx/51088?cate_code=3137&subject_idx=1989')}}">김병찬</a>
                </li>
                <li>
                    <span>전공역사</span>
                    <a href="{{front_url('/professor/show/prof-idx/51089?cate_code=3137&subject_idx=1990')}}">최용림</a>
                </li>
                <li>
                    <span>전공음악</span>
                    <a href="{{front_url('/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991')}}">다이애나</a>
                </li>
                <li>
                    <span>전기전자통신</span>
                    <a href="{{front_url('/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992')}}">최우영</a>
                </li>
                <li>
                    <span>정보컴퓨터</span>
                    <a href="{{front_url('/professor/show/prof-idx/51092?cate_code=3137&subject_idx=1993')}}">송광진</a>
                </li>
                <li>
                    <span>정보교육론</span>
                    <a href="{{front_url('/professor/show/prof-idx/51093?cate_code=3137&subject_idx=1994')}}">장순선</a>
                </li>
                <li>
                    <span>전공중국어</span>
                    <a href="{{front_url('/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995')}}">정경미</a>
                </li>
            </ul>
            --}}
        </div>
    @endif
@endsection

@section('mega_menu_lecture')
    {{-- 수강신청 --}}
    @if($__cfg['SiteCode'] == '2003')
        {{-- 공무원 온라인 --}}
        <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 {{ $menu_layer_class }}2">
            <div class="lec-drop-Box-gosi">
                <h5>9급</h5>
                <ul>
                    <li>
                        <strong>직렬</strong>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614001')}}">일반행정직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614002')}}">교육행정직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614011')}}">검찰사무직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614003')}}">출입국관리직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614004')}}">선거행정직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614005')}}">사회복지직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614006')}}">9급견습직</a>                                  
                    </li>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3019/pack/648001')}}">추천패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3019/code/1842')}}">T-PASS</a> 
                    </li>                                
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1117')}}">형사소송법</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1116')}}">형법</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1127')}}">국제법</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1133')}}">사회</a>
                    </li>
                    <li>
                        <strong>과정</strong>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box-gosi">
                <h5>7급</h5>
                <ul>
                    <li>
                        <strong>직렬</strong>
                        <a href="{{front_url('/home/index/cate/3103')}}">PSAT</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614001')}}">일반행정직</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614010')}}">세무직</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614011')}}">검찰사무직</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614004')}}">선거행정직</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614003')}}">출입국관리직</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614013')}}">외무영사직</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614014')}}">감사직</a>                                  
                    </li>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3020/pack/648001')}}">추천패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3020/code/1878')}}">2차 전문과목 PASS</a> 
                    </li>
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/home/index/cate/3103')}}">PSAT</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1114')}}">헌법</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1115')}}">경제학</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1117')}}">형사소송법</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1116')}}">형법</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1123')}}">세법</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1124')}}">회계학</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1127')}}">국제법</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1128')}}">국제정치학</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1185')}}">경영학</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1162')}}">중국어</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1178')}}">프랑스어</a>
                    </li>
                    <li>
                        <strong>과정</strong>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box-gosi">
                <h5>세무직</h5>
                <ul>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3022/pack/648001')}}">추천패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3019/code/1842')}}">T-PASS</a> 
                    </li>
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1123')}}">세법</a>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1124')}}">회계학</a>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1133')}}">사회</a>
                    </li>
                    <li>
                        <strong>과정</strong>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                        <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box-gosi">
                <h5>법원직</h5>
                <ul>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3035/pack/648001')}}">순환별패키지</a>
                    </li>
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1114')}}">헌법</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1118')}}">민법</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1119')}}">민사소송법</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1116')}}">형법</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1117')}}">형사소송법</a>
                    </li>
                    <li>
                        <strong>과정</strong>
                        <a href="{{front_url('/promotion/index/cate/3035/code/1485')}}">예비순환</a>
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D')}}">1순환(기본)</a>   
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D')}}">2순환(심화)</a>   
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D')}}">3순환(핵심)</a>   
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D')}}">4순환(진도별모고)</a>   
                        <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D')}}">5순환(실전모고)</a>   
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box-gosi">
                <h5>소방직</h5>
                <ul>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3023/pack/648001')}}">추천패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3023/code/1724')}}">T-PASS</a>
                        <a href="{{front_url('/promotion/index/cate/3023/code/1060')}}">소방 PASS</a>
                    </li>
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1113')}}">소방학개론</a>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1138')}}">소방관계법규</a>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1133')}}">사회</a>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                    </li>
                    <li>
                        <strong>과정</strong>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                        <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box-gosi">
                <h5>기술직</h5>
                <ul>
                    <li>
                        <strong>직렬</strong>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1071#tab3')}}">방송통신직</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1071#tab3')}}">통신직</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1071#tab3')}}">전기직</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1068#tab1')}}">9급농업직</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1068#tab2')}}">7급농업직</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1068#tab3')}}">농촌지도사</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1129&series_ccd=614025')}}">보건직</a> 
                        <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614014')}}">토목직</a> 
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&series_ccd=614044')}}">축산직</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&series_ccd=614020')}}">기계직</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&series_ccd=614045')}}">조경직</a>                                 
                    </li>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3028/pack/648001')}}">추천패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1071')}}">전기직 패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1071')}}">통신직 패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1068')}}">농업직 패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3028/code/1068')}}">농촌지도사 패키지</a>
                    </li>
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1171')}}">재배학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1172')}}">식물작물</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1243')}}">토양학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1220')}}">작물생리학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1222')}}">생물학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1230')}}">농촌지도론</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1232')}}">유기농업기능사</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1130')}}">공중보건</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1129')}}">보건행정</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1229')}}">자동차구조론</a><br>
                        <strong>&nbsp;</strong>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1168')}}">전기기기</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1173')}}">전기이론</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1193')}}">전자공학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1194')}}">무선공학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1195')}}">통신이론</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1210')}}">전기자기학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1198')}}">회로이론</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1196')}}">전자회로</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1214')}}">응용역학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1215')}}">토목설계</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1216')}}">기계일반</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1217')}}">기계설계</a><br>
                        <strong>&nbsp;</strong>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=2116')}}">가축육종학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=2115')}}">가축사양학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=2117')}}">조경학</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=2119')}}">조경계획/조경설계 및 생태계관리</a>
                    </li>
                    <li>
                        <strong>과정</strong>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box-gosi">
                <h5>군무원</h5>
                <ul>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3024/pack/648001')}}">추천패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3024/code/1751')}}">군무원 PASS</a>
                    </li> 
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1185')}}">경영학</a>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1196')}}">전자회로</a>
                        <a href="http://lang.willbes.net/home/index/cate/3093">G-TELP</a>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1237')}}">한국사능력시험</a>
                    </li>
                    <li>
                        <strong>과정</strong>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                        <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                    </li>
                </ul>
            </div>
        </div>
    @elseif($__cfg['SiteCode'] == '2004')
        {{-- 공무원 학원 --}}
        <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 GA2">
            <div class="lec-drop-Box">
                <h5>9급</h5>
                <ul>
                    <li>
                        <a href="{{front_url('/offPackage/index?cate_code=3043&campus_ccd=605001')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3043&campus_ccd=605001')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3019')}}">교재구매</a>
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box">
                <h5>7급</h5>
                <ul>
                    <li>
                        <a href="{{front_url('/offPackage/index?cate_code=3044&campus_ccd=605001')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3044&campus_ccd=605001')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3020')}}">교재구매</a>
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box">
                <h5>세무직</h5>
                <ul>
                    <li>
                        <a href="{{front_url('/offPackage/index?cate_code=3046&campus_ccd=605001')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3046&campus_ccd=605001')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3022')}}">교재구매</a>
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box">
                <h5>군무원</h5>
                <ul>
                    <li>
                        <a href="{{front_url('/offPackage/index?cate_code=3048&campus_ccd=605001')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3048&campus_ccd=605001')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3024')}}">교재구매</a>
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box">
                <h5>소방직</h5>
                <ul>
                    <li>
                        <a href="{{front_url('/offPackage/index?cate_code=3050&campus_ccd=605001')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3050&campus_ccd=605001')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3023')}}">교재구매</a>
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box">
                <h5>기술직</h5>
                <ul>
                    <li>
                        <a href="{{front_url('/offPackage/index?cate_code=3052&campus_ccd=605001')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3052&campus_ccd=605001')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3028')}}">교재구매</a>
                    </li>
                </ul>
            </div>
            <div class="lec-drop-Box">
                <h5>법원직</h5>
                <ul>
                    <li>
                        <a href="{{front_url('/offPackage/index?cate_code=3059&campus_ccd=605001')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3059&campus_ccd=605001')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3035')}}">교재구매</a>
                    </li>
                </ul>
            </div>
        </div>
    @elseif($__cfg['SiteCode'] == '2015')
        {{-- 인천학원 --}}
        <div class="drop-Box list-drop-Box list-drop-Box-ic">
            <ul>
                <li class="Tit">9급 공무원</li>
                <li>
                    <span>종합반</span>
                    <a href="{{front_url('/offPackage/index?cate_code=3124&course_idx=1301')}}">관리형 ALL PASS</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3124&course_idx=1302')}}">ALL PASS</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3124&course_idx=1303')}}">이론과정</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3124&course_idx=1304')}}">문제풀이</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3124&course_idx=1305')}}">특강</a>
                </li>
                <li>
                    <span>단과</span>
                    <a href="{{front_url('/offLecture/index?cate_code=3124&course_idx=1303')}}">이론과정</a>
                    <a href="{{front_url('/offLecture/index?cate_code=3124&course_idx=1304')}}">문제풀이</a>
                    <a href="{{front_url('/offLecture/index?cate_code=3124&course_idx=1305')}}">특강</a>
                </li>
                <li class="Tit">경찰 공무원</li>
                <li>
                    <span>종합반</span>
                    <a href="{{front_url('/offPackage/index?cate_code=3125&course_idx=1301')}}">관리형 ALL PASS</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3125&course_idx=1302')}}">ALL PASS</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3125&course_idx=1303')}}">이론과정</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3125&course_idx=1304')}}">문제풀이</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3125&course_idx=1305')}}">특강</a>
                </li>
                <li>
                    <span>단과</span>
                    <a href="{{front_url('/offLecture/index?cate_code=3125&course_idx=1303')}}">이론과정</a>
                    <a href="{{front_url('/offLecture/index?cate_code=3125&course_idx=1304')}}">문제풀이</a>
                    <a href="{{front_url('/offLecture/index?cate_code=3125&course_idx=1305')}}">특강</a>
                </li>
                <li class="Tit">소방 공무원</li>
                <li>
                    <span>종합반</span>
                    <a href="{{front_url('/offPackage/index?cate_code=3126&course_idx=1301')}}">관리형 ALL PASS</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3126&course_idx=1302')}}">ALL PASS</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3126&course_idx=1303')}}">이론과정</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3126&course_idx=1304')}}">문제풀이</a>
                    <a href="{{front_url('/offPackage/index?cate_code=3126&course_idx=1305')}}">특강</a>
                </li>
                <li>
                    <span>단과</span>
                    <a href="{{front_url('/offLecture/index?cate_code=3126&course_idx=1303')}}">이론과정</a>
                    <a href="{{front_url('/offLecture/index?cate_code=3126&course_idx=1304')}}">문제풀이</a>
                    <a href="{{front_url('/offLecture/index?cate_code=3126&course_idx=1305')}}">특강</a>
                </li>
                <li class="Tit">스파르타 독서실</li>
                <li>
                    <a href="{{front_url('/offLecture/index?cate_code=3130')}}">바로가기</a>
                </li>
            </ul>
        </div>
    @endif
@endsection