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
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">김신주</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">김영</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">박초롱</a><br>                 
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}" class="ml40">이아림</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50071/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">양익</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50991/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">안성호</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/51011/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">이섬가</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">원유철</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">김윤수</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">박민주</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">황남기</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">한세훈</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">이석준</a>
                    </li>
                    <li>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">윤세훈</a>
                        <span>[세법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                    </li>
                    <li>
                        <span>[회계학]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김영훈</a>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99')}}">김현식</a>
                        <span>[국제법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95')}}">이상구</a>
                    </li>
                    <li>
                        <span>[사회]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                        <span>[수학]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99')}}">곽윤근</a>
                        <span>[공직선거법]</span>
                        <a href="{{front_url('/professor/show/cate/3019/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95')}}">황남기</a>
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
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">김윤수</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">한세훈</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">황남기</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">윤세훈</a>
                    </li>
                    <li>
                        <span>[헌법]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50139/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95')}}">유시완</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50109/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95')}}">황남기</a>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50577/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95')}}">박기범</a>
                        <span>[경제학]</span>
                        <a href="{{front_url('/professor/show/cate/3020/prof-idx/50487/?subject_idx=1115&subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99')}}">황정빈</a>
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
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">김신주</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">김윤수</a>
                    </li>
                    <li>
                        <span>[세법]</span>
                        <a href="{{front_url('/professor/show/cate/3022/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95')}}">고선미</a>
                    </li>
                    <li>
                        <span>[회계학]</span>
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
                    <li>&nbsp;</li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>법원직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3035/prof-idx/50065/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">이현나</a>
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
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">김세령</a>
                    </li>
                    <li>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50071/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">양익</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                    </li>
                    <li>
                        <span>[소방학개론]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50465/?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0')}}">김종상</a>
                        <span>[사회]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                    </li>
                    <li>
                        <span>[소방관계법규]</span>
                        <a href="{{front_url('/professor/show/cate/3023/prof-idx/50465/?subject_idx=1138&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C')}}">김종상</a>
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
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
                <h5>기술직</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">기미진</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">권기태</a>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">한덕현</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">김신주</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">김영</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">오태진</a>
                    </li>
                    <li>
                        <span>[보건행정]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50395/?subject_idx=1129&subject_name=%EB%B3%B4%EA%B1%B4%ED%96%89%EC%A0%95')}}">하재남</a>
                        <span>[공중보건]</span>
                        <a href="{{front_url('/professor/show/cate/3028/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4')}}">하재남</a>
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
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>군무원</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50729/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">오훈</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50621/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4')}}">임재진</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">이석준</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50107/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김헌</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                    </li>
                    <li>
                        <span>[공중보건]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4')}}">하재남</a>
                        <span>[G-TELP]</span>
                        <a href="https://lang.willbes.net/professor/show/cate/3093/prof-idx/50764/?subject_idx=1478&subject_name=G-TELP&search_order=course&tab=home&series=">서민지</a>
                    </li>
                    <li>
                        <span>[경영학]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50763/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">고강유</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99')}}">전수환</a>
                        <span>[전자회로]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50163/?subject_idx=1196&subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C')}}">최우영</a>
                    </li>
                    <li>
                        <span>[한국사검정능력시험]</span>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50619/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98')}}">김상범</a>
                        <a href="{{front_url('/professor/show/cate/3024/prof-idx/50305/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98')}}">한경준</a>
                    </li>
                </ul>
                <h5>부사관</h5>
                <ul>
                    <li>
                        <span>[영어]</span>
                        <a href="{{front_url('/professor/show/cate/3030/prof-idx/50479/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4')}}">이현정</a>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/cate/3030/prof-idx/50649/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">정훈의</a>
                        <span>[언어논리]</span>
                        <a href="{{front_url('/professor/show/cate/3030/prof-idx/50231/?subject_idx=1146&subject_name=%EC%96%B8%EC%96%B4%EB%85%BC%EB%A6%AC')}}">이서연</a>
                    </li>
                    <li>
                        <span>[자료해석/공간/지각/상황판단]</span>
                        <a href="{{front_url('/professor/show/cate/3030/prof-idx/50239/?subject_idx=1197&subject_name=%EC%9E%90%EB%A3%8C%ED%95%B4%EC%84%9D%2F%EA%B3%B5%EA%B0%84%2F%EC%A7%80%EA%B0%81%2F%EC%83%81%ED%99%A9%ED%8C%90%EB%8B%A8')}}">황두기</a>
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
                        {{--
                        <a href="{{front_url('/professor/show/prof-idx/50346/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                        <a href="{{front_url('/professor/show/prof-idx/50274/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">김신주</a>
                        --}}
                        <a href="{{front_url('/professor/show/prof-idx/50310/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">이아림</a>
                        <a href="{{front_url('/professor/show/prof-idx/50072/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">양익</a>
                    </li>
                    <li>
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50648/?cate_code=3043&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                        <a href="{{front_url('/professor/show/prof-idx/50306/?cate_code=3043&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">한경준</a>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50716/?cate_code=3043&subject_idx=1257&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">한세훈</a>
                        <span>[행정학]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50560/?cate_code=3043&subject_idx=1258&subject_name=%ED%96%89%EC%A0%95%ED%95%99')}}">김덕관</a>
                    </li>
                    <li>
                        {{--
                        <span>[사회]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50182/?cate_code=3043&subject_idx=1279&subject_name=%EC%82%AC%ED%9A%8C')}}">문병일</a>
                        --}}
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
                        {{--<a href="{{front_url('/professor/show/prof-idx/50346/?cate_code=3044&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>--}}
                        <span>[한국사]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50648/?cate_code=3044&subject_idx=1255&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC')}}">조민주</a>
                    </li>
                    <li>
                        <span>[행정법]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50716/?cate_code=3044&subject_idx=1257&subject_name=%ED%96%89%EC%A0%95%EB%B2%95')}}">한세훈</a>
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
                        <a href="{{front_url('/professor/show/prof-idx/50394/?cate_code=3044&subject_idx=1274&subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99')}}">이상구</a>
                        {{--
                        <span>[일본어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50727/?cate_code=3044&subject_idx=1307&subject_name=%EC%9D%BC%EB%B3%B8%EC%96%B4')}}">황선아</a>
                        --}}
                    </li>
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
                        {{--
                        <a href="{{front_url('/professor/show/prof-idx/50346/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">성기건</a>
                        <a href="{{front_url('/professor/show/prof-idx/50274/?cate_code=3046&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4')}}">김신주</a>
                        --}}
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
                        <a href="{{front_url('/professor/show/prof-idx/50066/?cate_code=3059&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">이현나</a>
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
                        <a href="{{front_url('/professor/show/prof-idx/50466/?cate_code=3050&subject_idx=1259&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0')}}">김종상</a>
                        <span>[소방관계법규]]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50466/?cate_code=3050&subject_idx=1284&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C')}}">김종상</a>
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
                    </li>
                </ul>
            </div>

            <div class="prof-drop-Box">
                <h5>군무원</h5>
                <ul>
                    <li>
                        <span>[국어]</span>
                        <a href="{{front_url('/professor/show/prof-idx/50728/?cate_code=3048&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4')}}">오훈</a>
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
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614003')}}">출입국관리직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614004')}}">선거행정직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614005')}}">사회복지직</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614006')}}">9급견습직</a>                                  
                    </li>
                    <li>
                        <strong>패키지</strong>
                        <a href="{{front_url('/package/index/cate/3019/pack/648001')}}">추천패키지</a>
                        <a href="{{front_url('/userPackage/show/cate/3019/prod-code/154935/lidx/3')}}">DIY패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3019/code/1281')}}">T-PASS</a> 
                    </li>                                
                    <li>
                        <strong>과목</strong>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                        <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
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
                        <a href="{{front_url('/userPackage/show/cate/3020/prod-code/154961/lidx/3')}}">DIY패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3020/code/1519')}}">7급 PASS</a> 
                        <a href="{{front_url('/promotion/index/cate/3020/code/1520')}}">외무영사 PASS</a> 
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
                        <a href="{{front_url('/userPackage/show/cate/3022/prod-code/154935/lidx/3')}}">DIY패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3022/code/1281')}}">T-PASS</a> 
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
                        <a href="{{front_url('/promotion/index/cate/3035/code/1480')}}">법원직 PASS</a>
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
                        <a href="{{front_url('/promotion/index/cate/3023/code/1081')}}">T-PASS</a>
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
                        <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1217')}}">기계설계</a>
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
                        <a href="{{front_url('/userPackage/show/cate/3024/prod-code/155023/lidx/3')}}">DIY패키지</a>
                        <a href="{{front_url('/promotion/index/cate/3024/code/1521')}}">군무원 PASS</a>
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
                        <a href="{{front_url('/offPackage/index?cate_code=3043')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3043')}}">단과</a>
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
                        <a href="{{front_url('/offPackage/index?cate_code=3044')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3044')}}">단과</a>
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
                        <a href="{{front_url('/offPackage/index?cate_code=3046')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3046')}}">단과</a>
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
                        <a href="{{front_url('/offPackage/index?cate_code=3048')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3048')}}">단과</a>
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
                        <a href="{{front_url('/offPackage/index?cate_code=3050')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3050')}}">단과</a>
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
                        <a href="{{front_url('/offPackage/index?cate_code=3052')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3052')}}">단과</a>
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
                        <a href="{{front_url('/offPackage/index?cate_code=3059')}}">종합반</a>
                    </li>
                    <li>
                        <a href="{{front_url('/offLecture/index?cate_code=3059')}}">단과</a>
                    </li>
                    <li>
                        <a href="{{site_url('/book/index/cate/3035')}}">교재구매</a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
@endsection