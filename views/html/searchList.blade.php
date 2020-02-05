@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Section widthAuto">
        <div class="onSearch NGR">
            <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
            <label for="onsearch"><button title="검색">검색</button></label>
        </div>
    </div>

    <div class="Menu widthAuto NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li class="dropdown">
                    <a href="#none">PASS</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">PASS</li>
                            <li><a href="#none">0원 PASS</a></li>
                            <li><a href="#none">6개월 PASS</a></li>
                            <li><a href="#none">12개월 PASS</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="police">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div> 

    <div class="Section widthAuto">
        <div class="onSearch onSearchBig NG">
            <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
            <label for="onsearch"><button title="검색">검색</button></label>
            <span>
                <input type="checkbox" id="research" name="" value="" />
                <label for="research">결과 내 재검색</label>
            </span>
            <div><strong>신광은</strong>에 대한 강좌 검색결과 <strong>30</strong>건</div>
        </div>
    </div>

    <div class="widthAuto p_re">
        {{-- 검색 결과 없을 경우--}}
        <div class="searchZero">
            <span><img src="{{ img_url('common/icon_search_big.png')}}"> </span>
            <h3 class="NG">검색 결과가 없습니다.</h3>
            <p>검색어를 바르게 입력하셨는지 확인해주세요.<br>
            검색어의 띄어쓰기를 다르게 해보세요.<br>
            검색어를 줄이거나 다른 단어로 다시 검색해 보세요.
            </p>
        </div>

        {{-- 검색 결과 있을 경우--}}
        <div class="searchList">
            <ul class="searchListTap NG">
                <li><a href="#tab01" class="on">단강좌 [<span>20</span>]</a></li>
                <li><a href="#tab02">무료강좌 [<span>6</span>]</a></li>
                <li><a href="#tab03">추천패키지 [<span>5</span>]</a></li>
                <li><a href="#tab04">선택패키지 [<span>5</span>]</a></li>
                <li><a href="#tab05">기타 [<span>4</span>]</a></li>
            </ul>
            <div class="searchView">
                <div id="tab01">
                    <div>
                        <h4 class="NG">단강좌</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="NG">무료강좌</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="NG">추천패키지</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="NG">선택패키지</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="NG">기타</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="tab02">
                    <div>
                        <h4 class="NG">무료강좌</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="tab03">
                    <div>
                        <h4 class="NG">추천패키지</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="tab04">
                    <div>
                        <h4 class="NG">선택패키지</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="tab05">
                    <div>
                        <h4 class="NG">기타</h4>
                        <ul>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                            <li>
                                <a href="#none" class="NG">2019년 1차대비 신광은 형사소송법 동형 전범위모의고사</a>
                                <div>형사소송법 · 신광은 · 강의수 : 1강 · 수강기간 : 7일 · 수강료: 70,000원</div> 
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>   
    </div>

</div>
<!-- End Container -->
@stop