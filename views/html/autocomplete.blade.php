@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop NGR c_both">
        <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
            <div class="Section widthAuto">
                <div class="onSearch NGR">
                    <div>
                        <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
                        <input type="hidden" name="search_class" id="unifiedSearch_class" value="">
                        <input type="hidden" name="search_target" id="unifiedSearch_target" value="">
                        <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                        <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                        <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
                    </div>
                    <div class="searchPop">
                        <div class="popTit">인기검색어</div>
                        <ul>
                            <li><a href="#nnon">신광은</a></li>
                            <li><a href="#nnon">무료특강</a></li>
                            <li><a href="#nnon">형소법</a></li>
                            <li><a href="#nnon">기미진</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                            <li><a href="#nnon">모의고사</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>

        <div class="Menu widthAuto NGR c_both">
            <h3>
                <ul class="menu-Tit">
                    <li class="Tit">온라인공무원<span class="row-line">|</span></li>
                    <li class="subTit"><a href="//pass.local.willbes.net/home/index/cate/3019">9급</a></li>
                </ul>
                <ul class="menu-List">
                    <li class="  dropdown ">
                        <a href="//pass.local.willbes.net/professor/index/cate/3019" target="_self">
                            교수진소개
                        </a>
                        <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi">
                            <div class="prof-drop-Box">
                                <h5>9급</h5>
                                <ul>
                                    <li>
                                        <span>[국어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50661/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                    </li>
                                    <li>
                                        <span>[영어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50345/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50383/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">김영</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50651/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">박초롱</a><br>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50309/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4" class="ml40">이아림</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50071/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">양익</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50991/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">안성호</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/51011/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">이섬가</a>
                                    </li>
                                    <li>
                                        <span>[한국사]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50647/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50305/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50027/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50003/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">원유철</a>
                                    </li>
                                    <li>
                                        <span>[행정법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50109/?subject_idx=1111&amp;subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50717/?subject_idx=1111&amp;subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50615/?subject_idx=1111&amp;subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                    </li>
                                    <li>
                                        <span>[행정학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50559/?subject_idx=1112&amp;subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50041/?subject_idx=1112&amp;subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                        <span>[세법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50187/?subject_idx=1123&amp;subject_name=%EC%84%B8%EB%B2%95">고선미</a>
                                    </li>
                                    <li>
                                        <span>[회계학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50227/?subject_idx=1124&amp;subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50057/?subject_idx=1124&amp;subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                        <span>[국제법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&amp;subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95">이상구</a>
                                    </li>
                                    <li>
                                        <span>[사회]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50181/?subject_idx=1133&amp;subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                        <span>[수학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50201/?subject_idx=1135&amp;subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                        <span>[공직선거법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3019/prof-idx/50109/?subject_idx=1137&amp;subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="prof-drop-Box">
                                <h5>7급</h5>
                                <ul>
                                    <li>
                                        <span>[국어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50241/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    </li>
                                    <li>
                                        <span>[영어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50499/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50345/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                        <span>[한국사]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50647/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50027/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    </li>
                                    <li>
                                        <span>[행정법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50717/?subject_idx=1111&amp;subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50109/?subject_idx=1111&amp;subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                        <span>[행정학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&amp;subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50041/?subject_idx=1112&amp;subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                    </li>
                                    <li>
                                        <span>[헌법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50139/?subject_idx=1114&amp;subject_name=%ED%97%8C%EB%B2%95">유시완</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50109/?subject_idx=1114&amp;subject_name=%ED%97%8C%EB%B2%95">황남기</a>
                                        <span>[경제학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50487/?subject_idx=1115&amp;subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99">황정빈</a>
                                    </li>
                                    <li>
                                        <span>[세법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50187/?subject_idx=1123&amp;subject_name=%EC%84%B8%EB%B2%95">고선미</a>
                                        <span>[회계학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50227/?subject_idx=1124&amp;subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50057/?subject_idx=1124&amp;subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                        <span>[국제법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50393/?subject_idx=1127&amp;subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95">이상구</a>
                                    </li>
                                    <li>
                                        <span>[국제정치학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50393/?subject_idx=1128&amp;subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99">이상구</a>
                                        <span>[공직선거법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50109/?subject_idx=1137&amp;subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>
                                    </li>
                                    <li>
                                        <span>[G-TELP]</span>
                                        <a href="https://lang.willbes.net/professor/show/cate/3093/prof-idx/50764/?subject_idx=1478&amp;subject_name=G-TELP&amp;search_order=course&amp;tab=home&amp;series=">서민지</a>
                                        <span>[프랑스어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50001/?subject_idx=1178&amp;subject_name=%ED%94%84%EB%9E%91%EC%8A%A4%EC%96%B4">박훈</a>
                                    </li>
                                    <li>
                                        <span>[중국어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50061/?subject_idx=1162&amp;subject_name=%EC%A4%91%EA%B5%AD%EC%96%B4">조소현</a>
                                        <span>[경영학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50763/?subject_idx=1185&amp;subject_name=%EA%B2%BD%EC%98%81%ED%95%99&amp;search_order=course&amp;tab=open_lecture&amp;series=">고강유</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3020/prof-idx/50549/?subject_idx=1185&amp;subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="prof-drop-Box">
                                <h5>세무직</h5>
                                <ul>
                                    <li>
                                        <span>[국어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50241/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    </li>
                                    <li>
                                        <span>[영어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50499/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50345/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    </li>
                                    <li>
                                        <span>[한국사]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50647/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50027/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    </li>
                                    <li>
                                        <span>[세법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50187/?subject_idx=1123&amp;subject_name=%EC%84%B8%EB%B2%95">고선미</a>
                                    </li>
                                    <li>
                                        <span>[회계학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50227/?subject_idx=1124&amp;subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50057/?subject_idx=1124&amp;subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                    </li>
                                    <li>
                                        <span>[사회]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50181/?subject_idx=1133&amp;subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    </li>
                                    <li>
                                        <span>[수학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3022/prof-idx/50201/?subject_idx=1135&amp;subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                    </li>
                                    <li>&nbsp;</li>
                                </ul>
                            </div>

                            <div class="prof-drop-Box">
                                <h5>법원직</h5>
                                <ul>
                                    <li>
                                        <span>[국어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50065/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">이현나</a>
                                        <span>[영어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50651/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">박초롱</a>
                                        <span>[한국사]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50571/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">임진석</a>
                                    </li>
                                    <li>
                                        <span>[헌법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50591/?subject_idx=1114&amp;subject_name=%ED%97%8C%EB%B2%95">이국령</a>
                                        <span>[형법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50073/?subject_idx=1116&amp;subject_name=%ED%98%95%EB%B2%95">문형석</a>
                                        <span>[형사소송법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50685/?subject_idx=1117&amp;subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">유안석</a>
                                    </li>
                                    <li>
                                        <span>[민법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50519/?subject_idx=1118&amp;subject_name=%EB%AF%BC%EB%B2%95">김동진</a>
                                        <span>[민사소송법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3035/prof-idx/50145/?subject_idx=1119&amp;subject_name=%EB%AF%BC%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">이덕훈</a>
                                    </li>
                                </ul>
                                <h5>소방직</h5>
                                <ul>
                                    <li>
                                        <span>[국어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50661/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                    </li>
                                    <li>
                                        <span>[영어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50309/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">이아림</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50071/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">양익</a>
                                    </li>
                                    <li>
                                        <span>[한국사]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50305/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50027/?subject_idx=1109&amp;subject_name=한국사">오태진</a>
                                    </li>
                                    <li>
                                        <span>[소방학개론]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50465/?subject_idx=1113&amp;subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0">김종상</a>
                                        <span>[사회]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50181/?subject_idx=1133&amp;subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    </li>
                                    <li>
                                        <span>[소방관계법규]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3023/prof-idx/50465/?subject_idx=1138&amp;subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C">김종상</a>
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
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50241/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                        <span>[영어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50499/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50345/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50383/?subject_idx=1108&amp;subject_name=%EC%98%81%EC%96%B4">김영</a>
                                    </li>
                                    <li>
                                        <span>[한국사]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50647/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50027/?subject_idx=1109&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    </li>
                                    <li>
                                        <span>[보건행정]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50395/?subject_idx=1129&amp;subject_name=%EB%B3%B4%EA%B1%B4%ED%96%89%EC%A0%95">하재남</a>
                                        <span>[공중보건]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50395/?subject_idx=1130&amp;subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>
                                        <span>[전기기기]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50718/?subject_idx=1168&amp;subject_name=%EC%A0%84%EA%B8%B0%EA%B8%B0%EA%B8%B0">최우영</a>
                                    </li>
                                    <li>
                                        <span>[재배학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&amp;subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99">장사원</a>
                                        <span>[식용작물]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1172&amp;subject_name=%EC%8B%9D%EC%9A%A9%EC%9E%91%EB%AC%BC">장사원</a>
                                        <span>[전기이론]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50718/?subject_idx=1173&amp;subject_name=%EC%A0%84%EA%B8%B0%EC%9D%B4%EB%A1%A0">최우영</a>
                                    </li>
                                    <li>
                                        <span>[전자공학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50163/?subject_idx=1193&amp;subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99">최우영</a>
                                        <span>[무선공학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50163/?subject_idx=1194&amp;subject_name=%EB%AC%B4%EC%84%A0%EA%B3%B5%ED%95%99">최우영</a>
                                        <span>[통신이론]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50163/?subject_idx=1195&amp;subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0">최우영</a>
                                    </li>
                                    <li>
                                        <span>[회로이론]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50718/?subject_idx=1198&amp;subject_name=%ED%9A%8C%EB%A1%9C%EC%9D%B4%EB%A1%A0">최우영</a>
                                        <span>[전기자기학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50163/?subject_idx=1210&amp;subject_name=%EC%A0%84%EA%B8%B0%EC%9E%90%EA%B8%B0%ED%95%99">최우영</a>
                                    </li>
                                    <li>
                                        <span>[토목설계]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50435/?subject_idx=1215&amp;subject_name=%ED%86%A0%EB%AA%A9%EC%84%A4%EA%B3%84">장성국</a>
                                        <span>[응용역학개론]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50435/?subject_idx=1214&amp;subject_name=%EC%9D%91%EC%9A%A9%EC%97%AD%ED%95%99%EA%B0%9C%EB%A1%A0">장성국</a>
                                    </li>
                                    <li>
                                        <span>[작물생리학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1220&amp;subject_name=%EC%9E%91%EB%AC%BC%EC%83%9D%EB%A6%AC%ED%95%99">장사원</a>
                                        <span>[생물]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1222&amp;subject_name=%EC%83%9D%EB%AC%BC">장사원</a>
                                    </li>
                                    <li>
                                        <span>[농촌지도론]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1230&amp;subject_name=%EB%86%8D%EC%B4%8C%EC%A7%80%EB%8F%84%EB%A1%A0">장사원</a>
                                        <span>[유기농업기능사]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1232&amp;subject_name=%EC%9C%A0%EA%B8%B0%EB%86%8D%EC%97%85%EA%B8%B0%EB%8A%A5%EC%82%AC">장사원</a>
                                        <span>[토양학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3028/prof-idx/50429/?subject_idx=1243&amp;subject_name=%ED%86%A0%EC%96%91%ED%95%99">장사원</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="prof-drop-Box">
                                <h5>군무원</h5>
                                <ul>
                                    <li>
                                        <span>[국어]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50729/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">오훈</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50621/?subject_idx=1107&amp;subject_name=%EA%B5%AD%EC%96%B4">임재진</a>
                                    </li>
                                    <li>
                                        <span>[행정법]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50615/?subject_idx=1111&amp;subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                        <span>[행정학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50107/?subject_idx=1112&amp;subject_name=%ED%96%89%EC%A0%95%ED%95%99">김헌</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50559/?subject_idx=1112&amp;subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                    </li>
                                    <li>
                                        <span>[공중보건]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50395/?subject_idx=1130&amp;subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>
                                        <span>[G-TELP]</span>
                                        <a href="https://lang.willbes.net/professor/show/cate/3093/prof-idx/50764/?subject_idx=1478&amp;subject_name=G-TELP&amp;search_order=course&amp;tab=home&amp;series=">서민지</a>
                                    </li>
                                    <li>
                                        <span>[경영학]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50763/?subject_idx=1185&amp;subject_name=%EA%B2%BD%EC%98%81%ED%95%99">고강유</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50549/?subject_idx=1185&amp;subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>
                                        <span>[전자회로]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50163/?subject_idx=1196&amp;subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C">최우영</a>
                                    </li>
                                    <li>
                                        <span>[한국사검정능력시험]</span>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50619/?subject_idx=1237&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">김상범</a>
                                        <a href="//pass.local.willbes.net/professor/show/cate/3024/prof-idx/50305/?subject_idx=1237&amp;subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">한경준</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="  dropdown ">
                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only" target="_self">
                            수강신청
                        </a>
                        <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi2">
                            <div class="lec-drop-Box-gosi">
                                <h5>9급</h5>
                                <ul>
                                    <li>
                                        <strong>직렬</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614001">일반행정직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614002">교육행정직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614003">출입국관리직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614004">선거행정직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614005">사회복지직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614006">9급견습직</a>
                                    </li>
                                    <li>
                                        <strong>패키지</strong>
                                        <a href="//pass.local.willbes.net/package/index/cate/3019/pack/648001">추천패키지</a>
                                        <a href="//pass.local.willbes.net/userPackage/show/cate/3019/prod-code/154935/lidx/3">DIY패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3019/code/1281">T-PASS</a>
                                    </li>
                                    <li>
                                        <strong>과목</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=1107">국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=1108">영어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=1109">한국사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=1111">행정법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=1112">행정학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=1127">국제법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=1133">사회</a>
                                    </li>
                                    <li>
                                        <strong>과정</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1055">기본과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1097">심화과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1098">기출문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1056">단원별문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1100">모의고사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1057">특강(새벽/테마)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lec-drop-Box-gosi">
                                <h5>7급</h5>
                                <ul>
                                    <li>
                                        <strong>직렬</strong>
                                        <a href="//pass.local.willbes.net/home/index/cate/3103">PSAT</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614001">일반행정직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614010">세무직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614011">검찰사무직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614004">선거행정직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614003">출입국관리직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614013">외무영사직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614014">감사직</a>
                                    </li>
                                    <li>
                                        <strong>패키지</strong>
                                        <a href="//pass.local.willbes.net/package/index/cate/3020/pack/648001">추천패키지</a>
                                        <a href="//pass.local.willbes.net/userPackage/show/cate/3020/prod-code/154961/lidx/3">DIY패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3020/code/1659">7급 PASS</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3020/code/1658">외무영사 PASS</a>
                                    </li>
                                    <li>
                                        <strong>과목</strong>
                                        <a href="//pass.local.willbes.net/home/index/cate/3103">PSAT</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1107">국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1108">영어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1109">한국사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1111">행정법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1112">행정학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1114">헌법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1115">경제학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1123">세법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1124">회계학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1127">국제법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1128">국제정치학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1185">경영학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1162">중국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=1178">프랑스어</a>
                                    </li>
                                    <li>
                                        <strong>과정</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1055">기본과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1097">심화과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1098">기출문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1056">단원별문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1100">모의고사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1057">특강(새벽/테마)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lec-drop-Box-gosi">
                                <h5>세무직</h5>
                                <ul>
                                    <li>
                                        <strong>패키지</strong>
                                        <a href="//pass.local.willbes.net/package/index/cate/3022/pack/648001">추천패키지</a>
                                        <a href="//pass.local.willbes.net/userPackage/show/cate/3022/prod-code/154935/lidx/3">DIY패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3022/code/1281">T-PASS</a>
                                    </li>
                                    <li>
                                        <strong>과목</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=1107">국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=1108">영어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=1109">한국사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=1123">세법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=1124">회계학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=1112">행정학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=1133">사회</a>
                                    </li>
                                    <li>
                                        <strong>과정</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1055">기본과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1097">심화과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1098">기출문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1056">단원별문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1100">모의고사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3022/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1057">특강(새벽/테마)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lec-drop-Box-gosi">
                                <h5>법원직</h5>
                                <ul>
                                    <li>
                                        <strong>패키지</strong>
                                        <a href="//pass.local.willbes.net/package/index/cate/3035/pack/648001">순환별패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3035/code/1480">법원직 PASS</a>
                                    </li>
                                    <li>
                                        <strong>과목</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1107">국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1108">영어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1109">한국사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1114">헌법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1118">민법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1119">민사소송법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1116">형법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=1117">형사소송법</a>
                                    </li>
                                    <li>
                                        <strong>과정</strong>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3035/code/1485">예비순환</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=&amp;search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D">1순환(기본)</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=&amp;search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D">2순환(심화)</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=&amp;search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D">3순환(핵심)</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=&amp;search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D">4순환(진도별모고)</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&amp;subject_idx=&amp;search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D">5순환(실전모고)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lec-drop-Box-gosi">
                                <h5>소방직</h5>
                                <ul>
                                    <li>
                                        <strong>패키지</strong>
                                        <a href="//pass.local.willbes.net/package/index/cate/3023/pack/648001">추천패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3023/code/1081">T-PASS</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3019/code/1656">소방 PASS</a>
                                    </li>
                                    <li>
                                        <strong>과목</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=1107">국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=1108">영어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=1109">한국사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=1113">소방학개론</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=1138">소방관계법규</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=1133">사회</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=1111">행정법</a>
                                    </li>
                                    <li>
                                        <strong>과정</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1055">기본과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1097">심화과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1098">기출문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1056">단원별문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1100">모의고사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3023/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1057">특강(새벽/테마)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lec-drop-Box-gosi">
                                <h5>기술직</h5>
                                <ul>
                                    <li>
                                        <strong>직렬</strong>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1071#tab3">방송통신직</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1071#tab3">통신직</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1071#tab3">전기직</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1068#tab1">9급농업직</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1068#tab2">7급농업직</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1068#tab3">농촌지도사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1129&amp;series_ccd=614025">보건직</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3020/pattern/only?search_order=regist&amp;subject_idx=&amp;series_ccd=614014">토목직</a>
                                    </li>
                                    <li>
                                        <strong>패키지</strong>
                                        <a href="//pass.local.willbes.net/package/index/cate/3028/pack/648001">추천패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1071">전기직 패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1071">통신직 패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1068">농업직 패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3028/code/1068">농촌지도사 패키지</a>
                                    </li>
                                    <li>
                                        <strong>과목</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1107">국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1108">영어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1109">한국사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1171">재배학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1172">식물작물</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1243">토양학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1220">작물생리학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1222">생물학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1230">농촌지도론</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1232">유기농업기능사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1130">공중보건</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1129">보건행정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1229">자동차구조론</a><br>
                                        <strong>&nbsp;</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1168">전기기기</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1173">전기이론</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1193">전자공학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1194">무선공학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1195">통신이론</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1210">전기자기학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1198">회로이론</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1196">전자회로</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1214">응용역학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1215">토목설계</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1216">기계일반</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=1217">기계설계</a>
                                    </li>
                                    <li>
                                        <strong>과정</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1055">기본과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1097">심화과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1098">기출문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1056">단원별문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1100">모의고사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1057">특강(새벽/테마)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lec-drop-Box-gosi">
                                <h5>군무원</h5>
                                <ul>
                                    <li>
                                        <strong>패키지</strong>
                                        <a href="//pass.local.willbes.net/package/index/cate/3024/pack/648001">추천패키지</a>
                                        <a href="//pass.local.willbes.net/userPackage/show/cate/3024/prod-code/155023/lidx/3">DIY패키지</a>
                                        <a href="//pass.local.willbes.net/promotion/index/cate/3019/code/1655">군무원 PASS</a>
                                    </li>
                                    <li>
                                        <strong>과목</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=1107">국어</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=1111">행정법</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=1112">행정학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=1185">경영학</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=1196">전자회로</a>
                                        <a href="http://lang.willbes.net/home/index/cate/3093">G-TELP</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=1237">한국사능력시험</a>
                                    </li>
                                    <li>
                                        <strong>과정</strong>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1055">기본과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1097">심화과정</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1098">기출문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1056">단원별문제</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1100">모의고사</a>
                                        <a href="//pass.local.willbes.net/lecture/index/cate/3024/pattern/only?search_order=regist&amp;subject_idx=&amp;course_idx=1057">특강(새벽/테마)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class=" ">
                        <a href="//pass.local.willbes.net/lecture/index/cate/3019/pattern/free" target="_self">
                            무료특강
                        </a>
                    </li>
                    <li class="  dropdown ">
                        <a href="//pass.local.willbes.net/support/examAnnouncement/index/cate/3019" target="_self">
                            수험정보
                        </a>
                        <div class="drop-Box list-drop-Box">
                            <ul>
                                <li class="Tit">수험정보</li>
                                <li><a href="//pass.local.willbes.net/support/examAnnouncement/index/cate/3019" target="_self">시험공고</a></li>
                                <li><a href="//pass.local.willbes.net/support/examNews/index/cate/3019" target="_self">수험뉴스</a></li>
                                <li><a href="//pass.local.willbes.net/support/examQuestion/index/cate/3019" target="_self">기출문제</a></li>
                                <li><a href="//pass.local.willbes.net/guide/show/cate/3019/pattern/gosi" target="_self">공무원가이드</a></li>
                                <li><a href="//pass.local.willbes.net/guide/show/cate/3019/pattern/gosi_success" target="_self">초보합격전략</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class=" ">
                        <a href="//pass.local.willbes.net/book/index/cate/3019" target="_self">
                            교재구매
                        </a>
                    </li>
                    <li class=" pass   dropdown ">
                        <a href="//pass.local.willbes.net/pass/home/index" target="_self">
                            공무원학원
                            <span class="arrow-Btn">&gt;</span>
                        </a>
                        <div class="drop-Box list-drop-Box">
                            <ul>
                                <li class="Tit">공무원학원</li>
                                <li><a href="//pass.local.willbes.net/pass/home/index" target="_self">노량진(본원)</a></li>
                                <li><a href="//pass.local.willbes.net/pass/campus/show/code/605003" target="_self">부산</a></li>
                                <li><a href="//pass.local.willbes.net/pass/campus/show/code/605004" target="_self">대구</a></li>
                                <li><a href="//pass.local.willbes.net/pass/campus/show/code/605005" target="_self">인천</a></li>
                                <li><a href="//pass.local.willbes.net/pass/campus/show/code/605006" target="_self">광주</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="Section Section7 mt50 mb50">
            <div class="widthAuto">
                <div class="collaborate">
                    <div id="collaboslides">
                        <ul>
                            <li>
                                <a href="https://www.police.go.kr/main.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_01.jpg" alt="경찰청"></a>
                                <a href="http://www.smpa.go.kr/home/homeIndex.do?menuCode=kidonghq" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_02.jpg" alt="서울지방경찰청기동본부"></a>
                                <a href="http://www.gangdong.ac.kr/Home/Main.mbz" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_03.jpg" alt="강동대학교"></a>
                                <a href="http://kollabo.kiu.ac.kr/pages/index_mapsi.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_04.jpg" alt="경일대학교"></a>
                                <a href="http://cover.kimpo.ac.kr/intro/new/index.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_05.jpg" alt="김포대학교"></a>
                                <a href="http://www.jjpolice.go.kr/jjpolice" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_06.jpg" alt="제주지방경찰청"></a>
                                <a href="https://www.police.ac.kr/police/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_07.jpg" alt="경찰대학"></a>
                                <a href="https://job.kyungnam.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_08.jpg" alt="경남대학교"></a>
                                <a href="http://ipsi.kmcu.ac.kr/admission/index.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_09.jpg" alt="계명문화대학교"></a>
                                <a href="http://www.dju.ac.kr/kor/html/main.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_10.jpg" alt="대전대학교"></a>
                            </li>
                            <li>
                                <a href="http://www.seowon.ac.kr/web/kor/home" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_11.jpg" alt="서원대학교"></a>
                                <a href="http://www.sehan.ac.kr/main/main.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_12.jpg" alt="세한대학교"></a>
                                <a href="http://www.jbnu.ac.kr/kor/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_13.jpg" alt="전북대학교"></a>
                                <a href="https://www3.chosun.ac.kr/chosun/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_14.jpg" alt="조선대학교"></a>
                                <a href="https://www.hyundai1990.ac.kr/index/main.asp?re=y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_15.jpg" alt="특성화학교"></a>
                                <a href="https://lily.sunmoon.ac.kr/MainDefault.aspx" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_16.jpg" alt="선문대학교"></a>
                                <a href="http://www.wku.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_17.jpg" alt="원광대학교"></a>
                                <a href="http://www.jj.ac.kr/jj/index.jsp" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_18.jpg" alt="전주대학교"></a>
                                <a href="http://www.joongbu.ac.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_19.jpg" alt="중부대학교"></a>
                                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_temp.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            <ul>
                <li>
                    <div class="QuickDdayBox">
                        <div class="q_tit">3차 필기시험</div>
                        <div class="q_day">2018.12.12</div>
                        <div class="q_dday NSK-Blac">D-5</div>
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        <div class="sliderNum">
                            <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('cop/quick/quick_190108.jpg') }}" title="배너명"></a></div>
                            <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('cop/quick/quick_190109.jpg') }}" title="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}" title="배너명"></a>
                </li>
                <li>
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" title="배너명"></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Container -->

    <div class="mainBottomBn">
        <div>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/2019/03/1009_mainBottom_bn.jpg" title="" class="mbBanner">
            </a>
            <span class="btmEvClose">닫기</span>
        </div>
    </div>

    <link rel="stylesheet" href="/public/vendor/jquery/v.1.12.1/jquery-ui.css">
    <script src="/public/vendor/jquery/v.1.12.1/jquery-ui.js"></script>

    <script>
        $(function(){
            var autocomplete_text = ["스파르타","신광은","모의고사","장정훈","최신판례","김원욱","하승민","형사소송법","네친구","해설","형법","최신","수사","실용글쓰기","최기판","오태진","승진","면접","리마인드","원유철","숫자","판례","해설강의","경찰학","김현정","기출","Flex","원기총","형소법","개정","실무종합","영어","문제풀이","마무리","오현웅","행정법","동형","2단계","2020","경찰학개론","송광호","학설","한국사","좋은데이","조문","심화","신광은 형사소송법","문제폭격","최신기출","1차","실용","추록","최신 판례","형사소송","신의한수","해양경찰","총평","숫자특강","심화이론","기지개","특강","형사법","구문독해","마무리특강","경찰승진","입문특강","해사법규","위원회","키워드","김준기","교재","형사소송법 심화","무료특강","2020년 1차","시험","승진기출","기본이론","헌법","실무","모의","글쓰기","해양경찰학","합격","공득인","김원욱 형법","체력","형법 심화","형법 최신","형법 심화이론","법학경채","아침","박우찬","기출해설","적중","형법 핵심이론 요약정리","조문특강","파이널","합기독","ox","개정법령","마무리 특강","5개년","형법 최신판례","패키지","최신기출판례","기본","독해","사료","요약","법학","20년 1차","범죄수사","기출문제","장정훈 경찰학개론","2차","문제","주관식","형사","찍기","심화기출","2차대비","해양경찰학개론","보강","1단계","문풀","죄수론","2020년 1차대비 신광은 형사소송법","법령","최신판례특강","죄수","전문법칙","역사","민법","일정","2020 1차","강의","하이힐","단계","박영식","판례특강","진도별","경찰실무","정태정","2019","경찰간부","19년 2차","해설특강","최기","2020년 2차","오태진 한국사","해양","간부","최신판","형법최신판례","제이슨","숫자 특강","무료","형사소송법 입문","해사영어","경찰","김원욱 형법 기본","300","신광은 형사법","실전","도사국사","경찰작용법","2018","2020년 1차대비 김원욱 형법 기본","찍기특강","선박","2020년 2차대비 신광은 형사소송법","형사소송법 최신판례","면접캠프","2018년 3차","기관술"," 마무리","베이직","형법 마무리","3개월","아침영어","신광은 형소법","이것만","인증","김원욱형법","이론","국어","경찰특공대","해수부","이기자","문제폭격 스파르타","신광은 경찰","신광은 형사소송법 기본이론 ","장정훈 행정법","풀이","1차대비","최신 기출","한국사 기본","1개년","심화이론특강","300제"];
            $("#unifiedSearch_text").autocomplete({
                source: autocomplete_text,
                select: function(event, ui) {
                },
                focus: function(event, ui) {
                    return false;
                }
            })
        });

        //인기검색어
        $(document).ready(function() {
            var fieldExample = $('.unifiedSearch');
                fieldExample.focus(function() {
                var div = $('div.searchPop').show();
                $(document).bind('focusin.example click.example',function(e) {
                    if ($(e.target).closest('.example, .unifiedSearch').length) return;
                    $(document).unbind('.example');
                    div.fadeOut('medium');
                });
            });
            $('div.searchPop').hide();
        });

    </script>


@stop