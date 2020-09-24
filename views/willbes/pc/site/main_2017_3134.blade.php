@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container ssam NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="VisualBox p_re">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="MainRollingSlider" class="MaintabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}

                        <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>

                        <div id="MainRollingDiv" class="MaintabList">
                            <ul class="Maintab">
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section mt40">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section1 mt40">
            <div class="widthAuto smallTit NSK-Black">
                <p>
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img01.png">
                    <span><strong>기출적중&수강후기로 증명</strong>하는 윌비스 임용 교수진</span>
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img02.png">
                </p>
            </div>
            <div class="VisualSubBox p_re mt20">
                {{--<img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_title.jpg">  --}}
                <div id="SubRollingSlider" class="SubtabBox">
                    <ul class="SubtabSlider">
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_mjs.jpg" alt="유아 민정선"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bjm.jpg" alt="초등 배재민"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcw.jpg" alt="교육학 김차웅"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_lij.jpg" alt="교육한 이인재"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_hei.jpg" alt="교육한 홍의일"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_swy.jpg" alt="전공국어 송원영"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_lwg.jpg" alt="전공국어 이원근"></a></li>
                        <li><a href="#none"><img src="http://file1.willbes.net/datassam/event/191106_main_wsam32.jpg" alt="전공국어 권보민"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kys.jpg" alt="전공영어 김유석"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kym.jpg" alt="전공영어 김영문"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kh.jpg" alt="전공영어 공훈"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcm.jpg" alt="전공수학 김철홍"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bty.jpg" alt="수학교육론 박태영"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcu.jpg" alt="전공생물 강치욱"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_yhj.jpg" alt="생물교육론 양혜정"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kbc.jpg" alt="도덕윤리 김병찬"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_diana.jpg" alt="음악 다이애나"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_cuy.jpg" alt="전기전자통신 최우영"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_sgj.jpg" alt="정보컴퓨터 송광진"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_jss.jpg" alt="정컴교육론 장순선"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_jgm.jpg" alt="전공중국어 정경미"></a></li>
                    </ul>
                    <p class="leftBtn" id="imgBannerLeft2"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight2"><a href="none">다음</a></p>
                </div>
                <div id="SubRollingDiv" class="SubtabList">
                    <ul class="Subtab">
                        <li><a data-slide-index='0' href="javascript:void(0);" class="active">유아 민정선</a></li>
                        <li><a data-slide-index='1' href="javascript:void(0);">초등 배재민</a></li>
                        <li><a data-slide-index='2' href="javascript:void(0);">교육학 김차웅</a></li>
                        <li><a data-slide-index='3' href="javascript:void(0);">교육학 이인재</a></li>
                        <li><a data-slide-index='4' href="javascript:void(0);">교육학 홍의일</a></li>
                        <li><a data-slide-index='5' href="javascript:void(0);">전공국어 송원영</a></li>
                        <li><a data-slide-index='6' href="javascript:void(0);">전공국어 이원근</a></li>
                        <li><a data-slide-index='7' href="javascript:void(0);">전공국어 권보민</a></li>
                        <li><a data-slide-index='8' href="javascript:void(0);">전공영어 김유석</a></li>
                        <li><a data-slide-index='9' href="javascript:void(0);">전공영어 김영문</a></li>
                        <li><a data-slide-index='10' href="javascript:void(0);">전공영어 공훈</a></li>
                        <li><a data-slide-index='11' href="javascript:void(0);">전공수학 김철홍</a></li>
                        <li><a data-slide-index='12' href="javascript:void(0);">수학교육론 박태영</a></li>
                        <li><a data-slide-index='13' href="javascript:void(0);">전공생물 강치욱</a></li>
                        <li><a data-slide-index='14' href="javascript:void(0);">생물교육론 양혜정</a></li>
                        <li><a data-slide-index='15' href="javascript:void(0);">도덕윤리 김병찬</a></li>
                        <li><a data-slide-index='16' href="javascript:void(0);">전공음악 다이애나</a></li>
                        <li><a data-slide-index='17' href="javascript:void(0);">전기전자통신 최우영</a></li>
                        <li><a data-slide-index='18' href="javascript:void(0);">정보컴퓨터 송광진</a></li>
                        <li><a data-slide-index='19' href="javascript:void(0);">정컴교육론 장순선</a></li>
                        <li><a data-slide-index='20' href="javascript:void(0);">전공중국어 정경미</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Section2 mt40">
            <div class="widthAuto p_re">
                {{-- study comment include --}}
                @include('willbes.pc.site.main_partial.study_comment_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section3 mt40">
            <div class="widthAuto">
                <div class="will-nTit">윌비스 임용 <span class="tx-color">합격 교수진</span></div>
                <ul>
                    @for($i=1; $i<=24; $i++)
                        @if(empty($data['arr_main_banner']['메인_교수진'.$i]) === false)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section Section4 mt80">
            <div class="widthAuto">
                <div class="widthAuto smallTit NSK-Black">
                    <p><span>윌비스 임용 <strong>실시간 인기강의 TOP3</strong></span></p>
                </div>
                <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
                <ul class="bestLecBox">
                    <li class="bestLec">
                        <a href="#none">
                            <ul class="lecinfo">
                                <li class="NSK-Black"><span class="NSK">유아</span>민정선 교수</li>
                                <li><strong>이론반</strong></li>
                                <li><span>2020 (7~9월) 영역별 정리/문제풀이반 (10주)</span></li>
                            </ul>
                        </a>
                        <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/main/2018/prof_280x290_01.png" title="교수명"></div>
                        <div class="best NSK-Black">1</div>
                    </li>
                    <li class="bestLec">
                        <a href="#none">
                            <ul class="lecinfo">
                                <li class="NSK-Black"><span class="NSK">유아</span>민정선 교수</li>
                                <li><strong>이론반</strong></li>
                                <li><span>2020 (7~9월) 영역별 정리/문제풀이반 (10주)</span></li>
                            </ul>
                        </a>
                        <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/main/2018/prof_280x290_02.png" title="교수명"></div>
                        <div class="best NSK-Black">2</div>
                    </li>
                    <li class="bestLec">
                        <a href="#none">
                            <ul class="lecinfo">
                                <li class="NSK-Black"><span class="NSK">유아</span>민정선 교수</li>
                                <li><strong>이론반</strong></li>
                                <li><span>2020 (7~9월) 영역별 정리/문제풀이반 (10주)</span></li>
                            </ul>
                        </a>
                        <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/main/2018/prof_280x290_03.png" title="교수명"></div>
                        <div class="best NSK-Black">3</div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section Section5 mt80">
            <div class="widthAuto">
                {{-- new product include --}}
                @include('willbes.pc.site.main_partial.new_product_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section6 mt60">
            <div class="widthAuto">
                <div class="will-nTit">윌비스 임용 <span class="tx-color">시험정보</span></div>
                <div class="examInfo">
                    <ul class="examTop">
                        <li>
                            <div class="titleSubject NSK-Black">유아</div>
                            <div class="tx16">전국 모집인원 비교</div>
                            <div class="subject">
                                <select id="" name="">
                                    <option value="">유아</option>
                                    <option value="">초등</option>
                                    <option value="">중등전체</option>
                                    <option value="">국어</option>
                                    <option value="">수학</option>
                                    <option value="">역사</option>
                                    <option value="">일반사회</option>
                                    <option value="">도덕윤리</option>
                                    <option value="">체육</option>
                                    <option value="">음악</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <table>
                                <colgroup>
                                    <col width="77px">
                                    <col width="77px">
                                    <col width="77px">
                                    <col width="77px">
                                    <col width="77px">
                                    <col width="77px">
                                    <col width="*">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th colspan="2">2019학년도</th>
                                    <th colspan="2">2019 추시</th>
                                    <th colspan="2">2020학년도</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="first">
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                </tr>
                                <tr>
                                    <td>948</td>
                                    <td>9,955</td>
                                    <td>482</td>
                                    <td>12,505</td>
                                    <td>1,154</td>
                                    <td>13,103</td>
                                </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                    <div class="examBottom">
                        <div class="titleTrend NSK-Black">전국 모집인원(경쟁률, 합격선) 현황 및 최근 10년간 모집 동향 분석</div>
                        <ul>
                            <li><a href="#Container" onclick="openWin('LayerTrend'),openWin('examTrend')">유아</a></li>
                            <li><a href="#Container" onclick="openWin('LayerTrend'),openWin('examTrend')">초등</a></li>
                            <li><a href="#Container" onclick="openWin('LayerTrend'),openWin('examTrend')">국어</a></li>
                            <li><a href="#none">영어</a></li>
                            <li><a href="#none">수학</a></li>
                            <li><a href="#none">도덕윤리</a></li>
                            <li><a href="#none">역사</a></li>
                            <li><a href="#none">일반사회</a></li>
                            <li><a href="#none">전기·전자·통신</a></li>
                            <li><a href="#none">정보컴퓨터</a></li>
                            <li><a href="#none">음악</a></li>
                            <li><a href="#none">미술</a></li>
                            <li><a href="#none">체육</a></li>
                            <li><a href="#none">물리</a></li>
                            <li><a href="#none">화학</a></li>
                            <li><a href="#none">생물</a></li>
                            <li><a href="#none">지구과학</a></li>
                            <li><a href="#none">보건</a></li>
                            <li><a href="#none">특수</a></li>
                            <li><a href="#none">중국어</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section Section7 mt40">
            <div class="widthAuto">
                <ul class="NSK-Black">
                    <li><span class="NSK">WILLBES</span>학습자료실</li>
                    <li><a href="#none">#기출문제 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon01.png" title="기출문제"></a></li>
                    <li><a href="#none">#학습프로그램 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon02.png" title="학습프로그램"></a></li>
                    <li><a href="#none">#임용가이드북 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon03.png" title="임용가이드북"></a></li>
                    <li><a href="#none">#모바일수강가이드 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon04.png" title="모바일수강가이드"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt40 mb40 c_both">
            <div class="widthAuto">
                <div class="CScenterBox">
                    <dl>
                        <dt class="willbesCenter">
                            <ul>
                                <li>
                                    <a href="#none">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon01.png"></span>
                                        <div class="nTxt">학원 FAQ</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#none">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon02.png"></span>
                                        <div class="nTxt">동영상 FAQ</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#none">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon03.png"></span>
                                        <div class="nTxt">모바일 FAQ</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#none">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon04.png"></span>
                                        <div class="nTxt">동영상 원격지원</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#none">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon05.png"></span>
                                        <div class="nTxt">대학특강 문의</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#none">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon06.png"></span>
                                        <div class="nTxt">교수채용</div>
                                    </a>
                                </li>
                            </ul>
                        </dt>
                        <dt class="willbesNumber">
                            <ul>
                                <li>
                                    <div class="nTit">강의&동영상 문의</div>
                                    <div class="nNumber tx-color">1544-3169</div>
                                    <div class="nTxt">
                                        [운영시간]<br/>
                                        월~토: 09시 ~ 22시
                                    </div>
                                </li>
                                <li>
                                    <div class="nTit">교재문의</div>
                                    <div class="nNumber tx-color">1544-4944</div>
                                    <div class="nTxt">
                                        [운영시간]<br/>
                                        평일: 09시~ 17시 (점심시간 12시 ~ 13시)
                                    </div>
                                </li>
                            </ul>
                        </dt>
                        <dd class="GM">※ 전화상담 시 통화 내용은 자동녹취되며, 일요일 및 법정공휴일은 휴무입니다.</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

        {{-- 동향 분석 팝업 willbes-Layer-Trend --}}
        <div id="examTrend" class="willbes-Layer-Trend">
            <a class="closeBtn" href="#" onclick="closeWin('LayerTrend'),closeWin('examTrend')"><img src="{{ img_url('prof/close.png') }}"></a>
            <div class="Layer-Tit NG tx-dark-black"><strong class="tx-blue">유아</strong> 시험정보 : 지역별 응시 인원 및 합격선</div>

            <div class="Layer-Cont">
                <div class="mainPop_con">
                    <div class="mainPop_map">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/mainPop_map.jpg" alt="">
                        <div class="seoul">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">서울</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>159</td>
                                    <td>55</td>
                                    <td>96</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>1,869</td>
                                    <td>2,209</td>
                                    <td>1,776</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>11.75</td>
                                    <td>40.16</td>
                                    <td>18.5</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>86</td>

                                    <td>82.67</td>

                                    <td>83</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="ic">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">인천</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>19</td>
                                    <td>32</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>286</td>
                                    <td>632</td>
                                    <td>288</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>15.05</td>
                                    <td>19.75</td>
                                    <td>22.15</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>90</td>

                                    <td>79.34</td>

                                    <td>80</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="cn">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">충남</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>28</td>
                                    <td>16</td>
                                    <td>61</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>377</td>
                                    <td>444</td>
                                    <td>647</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>13.46</td>
                                    <td>27.75</td>
                                    <td>10.61</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>87</td>

                                    <td>79.67</td>

                                    <td>77.33</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="sj">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">세종</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>28</td>
                                    <td>-</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>311</td>
                                    <td>-</td>
                                    <td>102</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>11.11</td>
                                    <td>-</td>
                                    <td>14.57</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>87</td>

                                    <td>-</td>

                                    <td>87.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="dj">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">대전</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>35</td>
                                    <td>16</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>446</td>
                                    <td>636</td>
                                    <td>400</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>12.74</td>
                                    <td>39.75</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>86</td>

                                    <td>80.33</td>

                                    <td>81</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="gj">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">광주</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>13</td>
                                    <td>11</td>
                                    <td>34</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>215</td>
                                    <td>500</td>
                                    <td>404</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>16.54</td>
                                    <td>45.45</td>
                                    <td>11.88</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>86</td>

                                    <td>81</td>

                                    <td>78.33</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="jn">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">전남</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>52</td>
                                    <td>5</td>
                                    <td>63</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>452</td>
                                    <td>187</td>
                                    <td>531</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>8.69</td>
                                    <td>37.4</td>
                                    <td>8.43</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>86</td>

                                    <td>76.67</td>

                                    <td>78.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="jb">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">전북</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>38</td>
                                    <td>22</td>
                                    <td>74</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>462</td>
                                    <td>680</td>
                                    <td>780</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>12.16</td>
                                    <td>30.91</td>
                                    <td>10.54</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>85</td>

                                    <td>79</td>

                                    <td>78.33</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="gg">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">경기</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>233</td>
                                    <td>149</td>
                                    <td>377</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>2,358</td>
                                    <td>3,409</td>
                                    <td>3,816</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>10.12</td>
                                    <td>22.88</td>
                                    <td>10.12</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>86</td>

                                    <td>80.33</td>

                                    <td>80.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="jj">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">제주</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>21</td>
                                    <td>10</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>175</td>
                                    <td>207</td>
                                    <td>201</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>8.33</td>
                                    <td>20.7</td>
                                    <td>16.75</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>84</td>

                                    <td>77.66</td>

                                    <td>77.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="gw">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">강원</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>30</td>
                                    <td>25</td>
                                    <td>54</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>295</td>
                                    <td>442</td>
                                    <td>502</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>9.83</td>
                                    <td>17.68</td>
                                    <td>9.3</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>84</td>

                                    <td>77.33</td>

                                    <td>75.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="cb">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">충북</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>40</td>
                                    <td>25</td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>460</td>
                                    <td>549</td>
                                    <td>656</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>11.5</td>
                                    <td>21.96</td>
                                    <td>8.75</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>88</td>

                                    <td>81</td>

                                    <td>76.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="kb">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">경북</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>29</td>
                                    <td>45</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>277</td>
                                    <td>698</td>
                                    <td>538</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>9.55</td>
                                    <td>15.51</td>
                                    <td>13.45</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>87</td>

                                    <td>77.67</td>

                                    <td>78</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="dg">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">대구</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>34</td>
                                    <td>25</td>
                                    <td>21</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>322</td>
                                    <td>518</td>
                                    <td>396</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>9.47</td>
                                    <td>20.72</td>
                                    <td>18.86</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>83</td>

                                    <td>79.66</td>

                                    <td>79.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="us">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">울산</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>10</td>
                                    <td>21</td>
                                    <td>27</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>127</td>
                                    <td>448</td>
                                    <td>288</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>12.7</td>
                                    <td>21.33</td>
                                    <td>10.67</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>84</td>

                                    <td>81</td>

                                    <td>77.67</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="bs">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">부산</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>40</td>
                                    <td>25</td>
                                    <td>62</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>388</td>
                                    <td>946</td>
                                    <td>737</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>9.7</td>
                                    <td>37.84</td>
                                    <td>11.89</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>84</td>

                                    <td>81.67</td>

                                    <td>81.34</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="kn">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">경남</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>139</td>
                                    <td>-</td>
                                    <td>118</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>1,155</td>
                                    <td>-</td>
                                    <td>1,041</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>8.31</td>
                                    <td>-</td>
                                    <td>8.82</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>87</td>

                                    <td>-</td>

                                    <td>76.33</td>

                                </tr>
                                </tbody></table>
                        </div>

                        <div class="total">
                            <table>
                                <colgroup>
                                    <col width="21%">
                                    <col width="25%">
                                    <col width="27%">
                                    <col width="27%">
                                </colgroup>
                                <tbody><tr>
                                    <th class="blue_th">전국</th>
                                    <th>2019학년도</th>
                                    <th>2019 추시</th>
                                    <th>2020학년도</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>948</td>
                                    <td>482</td>
                                    <td>1,154</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>9,975</td>
                                    <td>12,505</td>
                                    <td>13,103</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>10.52</td>
                                    <td>27.99</td>
                                    <td>11.35</td>
                                </tr>
                                <tr>
                                    <th>합격 선</th>

                                    <td>85.88</td>

                                    <td>79.67</td>

                                    <td>79.29</td>

                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                    <div class="trendView">
                        <div class="trendTitle">최근 10 년 모집 동향 분석</div>
                        <div class="graph"></div>
                        <div class="graph"></div>
                        <div class="trendData">
                            <table cellspacing="0">
                                <colgroup>
                                    <col width="25%">
                                    <col width="25%">
                                    <col width="25%">
                                    <col width="25%">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>학년도</th>
                                    <th>모집</th>
                                    <th>지원</th>
                                    <th>경쟁률</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2020</td>
                                    <td>1,154</td>
                                    <td>13,103</td>
                                    <td>11.35</td>
                                </tr>
                                <tr>
                                    <td>2019 추시</td>
                                    <td>482</td>
                                    <td>12,505</td>
                                    <td>25.9</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>948</td>
                                    <td>9,955</td>
                                    <td>10.5</td>
                                </tr>
                                <tr>
                                    <td>2018</td>
                                    <td>1,365</td>
                                    <td>8,992</td>
                                    <td>6.59</td>
                                </tr>
                                <tr>
                                    <td>2017</td>
                                    <td>596</td>
                                    <td>6,133</td>
                                    <td>10.29</td>
                                </tr>
                                <tr>
                                    <td>2016</td>
                                    <td>696</td>
                                    <td>5,597</td>
                                    <td>8.04</td>
                                </tr>
                                <tr>
                                    <td>2015</td>
                                    <td>619</td>
                                    <td>4,888</td>
                                    <td>7.9</td>
                                </tr>
                                <tr>
                                    <td>2014</td>
                                    <td>397</td>
                                    <td>4,418</td>
                                    <td>11.13</td>
                                </tr>
                                <tr>
                                    <td>2013</td>
                                    <td>578</td>
                                    <td>3,863</td>
                                    <td>6.68</td>
                                </tr>
                                <tr>
                                    <td>2012</td>
                                    <td>234</td>
                                    <td>4,664</td>
                                    <td>19.93</td>
                                </tr>
                                <tr>
                                    <td>2011</td>
                                    <td>113</td>
                                    <td>5,079</td>
                                    <td>44.95</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="LayerTrend" class="willbes-Layer-Black"></div>
        <!-- // willbes-Layer-Trend -->
    </div>
    <!-- End Container -->


    <script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        //상단배너
        $(function(){
            var slidesImg = $(".MaintabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:3000,
                sliderWidth:1120,
                auto : true,
                autoHover: true,
                pagerCustom: '#MainRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        //적중배너
        $(function(){
            var slidesImg = $(".SubtabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:3000,
                sliderWidth:1120,
                auto : true,
                autoHover: true,
                pagerCustom: '#SubRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#SubRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft2").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        //교재
        $(function() {
            var slidesImg1 = $(".bookList").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:5,
                maxSlides:5,
                slideWidth: 190,
                slideMargin:20,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft3").click(function (){
                slidesImg1.goToNextSlide();
            });
            $("#imgBannerRight3").click(function (){
                slidesImg1.goToPrevSlide();
            });
        });

        // 동향 분석 팝업 백그라운드 클릭 닫기
        document.querySelector('.willbes-Layer-Trend .closeBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.examInfo').scrollIntoView({ behavior: 'smooth' });
        });

        $(document).ready(function() {
            $('#LayerTrend.willbes-Layer-Black').on('click', function(e) {
                e.preventDefault();
                $('.willbes-Layer-Trend').fadeOut();
                $(this).fadeOut();
                document.querySelector('.examInfo').scrollIntoView({ behavior: 'smooth' });
            });
        });

    </script>
@stop