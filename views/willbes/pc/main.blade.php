@extends('willbes.pc.layouts.master')

@section('content')
    <link href="/public/css/willbes/style_main_v3.css?ver={{time()}}" rel="stylesheet">
    <style type="text/css">
        .favor-cate-on {background: #0396cf;color: #fff !important;}
    </style>
    <div id="Container" class="Container mainV3 NG c_both">
        <div class="Section Area1">
            {{-- 선택된 관심분야 영역 --}}
            <ul id="favor_cate_view" class="addList">
                <li></li>
            </ul>
            <span><a href="#none" onclick="initFavorCatePop();" class="add">관심분야 설정</a></span>
            {{--//추가팝업--}}
            <div id="addArea" class="willbes-Layer-Black gate-add-popup">
                <div class="willbes-Layer-CartBox">
                    <a class="closeBtn" href="#none" onclick="closeWin('addArea')">
                        <img src="{{ img_url('cart/close_cart.png') }}">
                    </a>
                    <div class="Layer-Tit NG">나의 관심분야를 선택해 주세요!</div>
                    <div id="favor_cate_pop" class="gate-add-cts">
                        <div>
                            <h5>ㆍ 공무원</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3019" data-url="{{ front_app_url('/home/index/cate/3019', 'pass') }}">9급 공무원</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3020" data-url="{{ front_app_url('/home/index/cate/3020', 'pass') }}">7급 공무원</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3103" data-url="{{ front_app_url('/home/index/cate/3103', 'pass') }}">7급PSAT</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3022" data-url="{{ front_app_url('/home/index/cate/3022', 'pass') }}">세무직</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3035" data-url="{{ front_app_url('/home/index/cate/3035', 'pass') }}">법원직</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3023" data-url="{{ front_app_url('/home/index/cate/3023', 'pass') }}">소방직</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3028" data-url="{{ front_app_url('/home/index/cate/3028', 'pass') }}">기술직</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2003_3024" data-url="{{ front_app_url('/home/index/cate/3024', 'pass') }}">군무원</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 경찰</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2001_3001" data-url="{{ front_app_url('/home/index/cate/3001', 'police') }}">일반경찰</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2001_3002" data-url="{{ front_app_url('/home/index/cate/3002', 'police') }}">경행경채</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2001_3006" data-url="{{ front_app_url('/home/index/cate/3006', 'police') }}">경찰승진</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2001_3007" data-url="{{ front_app_url('/home/index/cate/3007', 'police') }}">해양경찰</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2001_3008" data-url="{{ front_app_url('/home/index/cate/3008', 'police') }}">해양경찰특채</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2008_3100" data-url="{{ front_app_url('/home/index/cate/3100', 'spo') }}">경찰간부(간부후보생)</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 교원임용</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="ssam_1" data-url="http://ssam.willbes.net/main/index.html">교육학</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="ssam_2" data-url="http://ssam.willbes.net/main/index.html">유아.초등</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="ssam_3" data-url="http://ssam.willbes.net/main/index.html">중등</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 어학</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2007_3093" data-url="{{ front_app_url('/home/index/cate/3093', 'lang') }}">G-TELP</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 고등고시</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2005_3094" data-url="{{ front_app_url('/home/index/cate/3094', 'gosi') }}" >5급행정(입법고시)</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2005_3095" data-url="{{ front_app_url('/home/index/cate/3095', 'gosi') }}" >국립외교원</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2005_3096" data-url="{{ front_app_url('/home/index/cate/3096', 'gosi') }}" >PSAT</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2005_3097" data-url="{{ front_app_url('/home/index/cate/3097', 'gosi') }}" >5급헌법</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2005_3098" data-url="{{ front_app_url('/home/index/cate/3098', 'gosi') }}" >법원행시</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2005_3099" data-url="{{ front_app_url('/home/index/cate/3099', 'gosi') }}" >변호사</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 전문자격증</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_309002" data-url="{{ front_app_url('/home/index/cate/309002', 'job') }}"> 공인노무사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_309003" data-url="{{ front_app_url('/home/index/cate/309003', 'job') }}"> 감정평가사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_309004" data-url="{{ front_app_url('/home/index/cate/309004', 'job') }}"> 변리사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_309006" data-url="{{ front_app_url('/home/index/cate/309006', 'job') }}"> 세무사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_309005" data-url="{{ front_app_url('/home/index/cate/309005', 'job') }}"> 관세사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_309001" data-url="{{ front_app_url('/home/index/cate/309001', 'job') }}"> 스포츠지도사</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 기타자격증</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_308901" data-url="{{ front_app_url('/home/index/cate/308901', 'job') }}"> 소방(산업)기사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_308902" data-url="{{ front_app_url('/home/index/cate/308902', 'job') }}"> 전기(산업)기사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_310101" data-url="{{ front_app_url('/home/index/cate/310101', 'job') }}"> 소프트웨어자산관리사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_310102" data-url="{{ front_app_url('/home/index/cate/310102', 'job') }}"> 경제교육지도사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_310103" data-url="{{ front_app_url('/home/index/cate/310103', 'job') }}"> 진로직업체험지도사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="2006_309101" data-url="{{ front_app_url('/home/index/cate/309101', 'job') }}"> 한국사능력시험</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 나무경영아카데미</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="namu_1" data-url="http://www.namucpa.com">회계사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="namu_2" data-url="http://www.namucpa.com">세무사</a></li>
                                <li><a href="#none" class="favor-cate-each" data-key="namu_3" data-url="http://www.namucpa.com">관세사</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ N잡/e창업</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2014_3114" data-url={{ front_app_url('/home/index/cate/3114', 'njob') }}>e-커머스</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 취업</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="2009_3102" data-url={{ front_app_url('/home/index/cate/3102', 'work') }}>공기업</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>ㆍ 학점은행</h5>
                            <ul>
                                <li><a href="#none" class="favor-cate-each" data-key="bank_1" data-url="http://www.willbeslife.net/">학점은행</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="addBtn">
                        <a href="#none" onclick="saveFavorCatePop();">관심분야 추가하기</a>
                    </div>
                </div>
            </div>
            {{--추가팝업//--}}
        </div>

        {{-- 검색 영역 --}}
        <div class="Section gateSearch">
            <img src="https://static.willbes.net/public/images/promotion/main/gate_v3_01.png">
            <div>
                <form id="areaSearch_form" name="areaSearch_form" method="GET">
                    <input type="hidden" name="cate" id="areaSearch_cate" value="{{empty($arr_search_input) ? $__cfg['CateCode'] : element('cate',$arr_search_input)}}"/>
                    <input type="hidden" name="searchfull_order" id="searchfull_order" value=""/>
                    <input type="search" name="searchfull_text" id="areaSearch_text" class='areaSearch' data-form="areaSearch_form" value="{{empty($arr_search_input) ? '' : element('searchfull_text',$arr_search_input)}}" placeholder="검색어를 입력하세요." maxlength="100"/>
                    <label for="search"><button type="button" id="btn_areaSearch" class='btn_areaSearch' data-form="areaSearch_form" title="검색">검색</button></label>
                </form>
            </div>
        </div>

        {{-- 윌비스 전체사이트 링크 --}}
        <div class="Section Area2 mt50">
            <div class="widthAuto">
                <div class="will-Tit mb-zero">윌비스 1등 대표 과정 <span class="will-subTit">더 나은 미래, 윌비스가 책임지겠습니다.</span></div>
                <div class="NSK">
                    <table>
                        <col width="18%">
                        <col width="">
                        <col width="15%">
                        <col width="">
                        <col width="15%">
                        <col width="">
                        <tr>
                            <th scope="row">공무원</th>
                            <td colspan="5">
                                <a href="{{ front_app_url('/home/index/cate/3019', 'pass') }}" target="_blank">9급 공무원</a>
                                <a href="{{ front_app_url('/home/index/cate/3020', 'pass') }}" target="_blank">7급 공무원</a>
                                <a href="{{ front_app_url('/home/index/cate/3103', 'pass') }}" target="_blank">7급PSAT</a>
                                <a href="{{ front_app_url('/home/index/cate/3022', 'pass') }}" target="_blank">세무직</a>
                                <a href="{{ front_app_url('/home/index/cate/3035', 'pass') }}" target="_blank">법원직</a>
                                <a href="{{ front_app_url('/home/index/cate/3023', 'pass') }}" target="_blank">소방직</a>
                                <a href="{{ front_app_url('/home/index/cate/3028', 'pass') }}" target="_blank">기술직</a>
                                <a href="{{ front_app_url('/home/index/cate/3024', 'pass') }}" target="_blank">군무원 </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">경찰</th>
                            <td colspan="5">
                                <a href="{{ front_app_url('/home/index/cate/3001', 'police') }}" target="_blank">일반경찰</a>
                                <a href="{{ front_app_url('/home/index/cate/3002', 'police') }}" target="_blank">경행경채</a>
                                <a href="{{ front_app_url('/home/index/cate/3006', 'police') }}" target="_blank">경찰승진</a>
                                <a href="{{ front_app_url('/home/index/cate/3007', 'police') }}" target="_blank">해양경찰</a>
                                <a href="{{ front_app_url('/home/index/cate/3008', 'police') }}" target="_blank">해양경찰특채</a>
                                <a href="{{ front_app_url('/home/index/cate/3100', 'spo') }}" target="_blank">경찰간부(간부후보생)</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">임용</th>
                            <td colspan="3">
                                <a href="http://ssam.willbes.net/main/index.html" target="_blank">교육학</a>
                                <a href="http://ssam.willbes.net/main/index.html" target="_blank">유아.초등</a>
                                <a href="http://ssam.willbes.net/main/index.html" target="_blank">중등</a>
                            </td>
                            <th>어학</th>
                            <td><a href="{{ front_app_url('/home/index/cate/3093', 'lang') }}" target="_blank">G-TELP</a></td>
                        </tr>
                        <tr>
                            <th scope="row">고등고시</th>
                            <td colspan="5">
                                <a href="{{ front_app_url('/home/index/cate/3094', 'gosi') }}" target="_blank">5급행정(입법고시)</a>
                                <a href="{{ front_app_url('/home/index/cate/3095', 'gosi') }}" target="_blank">국립외교원</a>
                                <a href="{{ front_app_url('/home/index/cate/3096', 'gosi') }}" target="_blank">PSAT</a>
                                <a href="{{ front_app_url('/home/index/cate/3097', 'gosi') }}" target="_blank">5급헌법</a>
                                <a href="{{ front_app_url('/home/index/cate/3098', 'gosi') }}" target="_blank">법원행시</a>
                                <a href="{{ front_app_url('/home/index/cate/3099', 'gosi') }}" target="_blank">변호사</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">전문자격증</th>
                            <td colspan="5">
                                <a href="{{ front_app_url('/home/index/cate/309002', 'job') }}" target="_blank">공인노무사</a>
                                <a href="{{ front_app_url('/home/index/cate/309003', 'job') }}" target="_blank">감정평가사</a>
                                <a href="{{ front_app_url('/home/index/cate/309004', 'job') }}" target="_blank">변리사</a>
                                <a href="{{ front_app_url('/home/index/cate/309006', 'job') }}" target="_blank">세무사</a>
                                <a href="{{ front_app_url('/home/index/cate/309005', 'job') }}" target="_blank">관세사</a>
                                <a href="{{ front_app_url('/home/index/cate/309001', 'job') }}" target="_blank">스포츠지도사</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">기타자격증</th>
                            <td colspan="5">
                                <a href="{{ front_app_url('/home/index/cate/308901', 'job') }}" target="_blank">소방(산업)기사</a>
                                <a href="{{ front_app_url('/home/index/cate/308902', 'job') }}" target="_blank">전기(산업)기사</a>
                                <a href="{{ front_app_url('/home/index/cate/310101', 'job') }}" target="_blank">소프트웨어자산관리사</a>
                                <a href="{{ front_app_url('/home/index/cate/310102', 'job') }}" target="_blank">경제교육지도사</a>
                                <a href="{{ front_app_url('/home/index/cate/310103', 'job') }}" target="_blank">진로직업체험지도사</a>
                                <a href="{{ front_app_url('/home/index/cate/309101', 'job') }}" target="_blank">한국사능력시험</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">나무경영아카데미</th>
                            <td colspan="5">
                                <a href="http://www.namucpa.com" target="_blank">회계사</a>
                                <a href="http://www.namucpa.com" target="_blank">세무사</a>
                                <a href="http://www.namucpa.com" target="_blank">관세사</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">N잡/e창업</th>
                            <td><a href="{{ front_app_url('/home/index/cate/3114', 'njob') }}" target="_blank">e-커머스 <img src="https://static.willbes.net/public/images/promotion/main/gate_icon03.png"></a></td>
                            <th>취업</th>
                            <td><a href="{{ front_app_url('/home/index/cate/3102', 'work') }}" target="_blank">공기업</a></td>
                            <th>학점은행</th>
                            <td><a href="http://www.willbeslife.net" target="_blank">학점은행</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        {{-- 메인_서브 배너 --}}
        <div class="Section Area7">
            <div class="widthAuto">
                <div class="bar-banner">
                    {!! banner('메인_서브1', '', $__cfg['SiteCode'], '0') !!}
                </div>
                <div class="bar-banner">
                    {!! banner('메인_서브2', '', $__cfg['SiteCode'], '0') !!}
                </div>
            </div>
        </div>

        {{-- 시험일정 --}}
        @if(empty($data['dday']) === false)
            <div class="Section Area3">
                <div class="widthAuto">
                    <div class="will-Tit mb-zero">시험일정</div>
                    <ul class="sliderDayList">
                        @foreach($data['dday'] as $idx => $row)
                            <li>
                                <div class="dDayBox">
                                <span class="dTit">
                                    {{ $row['DayMainTitle'] }}
                                    <div class="w-date">{{ $row['DayDatm'] }}</div>
                                </span>
                                    <span class="dDay">D{{ $row['DDay'] }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="Section Area4 mt50">
            <div class="widthAuto">
                <dl>
                    {{-- 공지사항 --}}
                    <dt class="NowWillbes">
                        <div class="will-Tit">윌비스 소식 <a href="{{ site_url('/support/notice/index') }}" target="_blank">+ 더보기</a></div>
                        <ul>
                            @if(empty($data['notice']) === false)
                                @foreach($data['notice'] as $row)
                                    <li>
                                        <a href="{{ site_url('/support/notice/show?board_idx='.$row['BoardIdx']) }}">
                                            <span class="w-tit">{{$row['Title']}}
                                                @if(date('Y-m-d') == $row['RegDatm']) <span class="w-new">N</span> @endif
                                            </span>
                                            <span class="w-date">{{$row['RegDatm']}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </dt>
                    {{-- 메인_미들 배너 --}}
                    <dt class="WhyWillbes">
                        <div>{!! banner('메인_미들1', '', $__cfg['SiteCode'], '0') !!}</div>
                        <div>{!! banner('메인_미들2', '', $__cfg['SiteCode'], '0') !!}</div>
                    </dt>
                </dl>
            </div>
        </div>

        {{-- 윌비스 직영학원 --}}
        <div class="Section Area5 mt50">
            <div class="widthAuto">
                <div class="will-Tit">윌비스 직영학원</div>
                <div class="acadList">
                    <ul>
                        <li>
                            <strong>공무원</strong>
                            <a href="{{ front_app_url('/home/index', 'pass', true) }}" target="_blank">노량진</a><span>|</span>
                            <a href="http://willbesedu.co.kr" target="_blank">인천</a><span>|</span>
                            <a href="https://pass.willbes.net/pass/campus/show/code/605004" target="_blank">대구</a><span>|</span>
                            <a href="http://busan.willbes.net" target="_blank">부산</a>
                        </li>
                        <li>
                            <strong>경찰</strong>
                            <a href="{{ front_app_url('/home/index', 'police', true) }}" target="_blank">노량진</a><span>|</span>
                            <a href="{{ front_app_url('/campus/show/code/605005', 'police', true) }}" target="_blank">인천</a><span>|</span>
                            <a href="{{ front_app_url('/campus/show/code/605004', 'police', true) }}" target="_blank">대구</a><span>|</span>
                            <a href="{{ front_app_url('/campus/show/code/605003', 'police', true) }}" target="_blank">부산</a><span>|</span>
                            <a href="{{ front_app_url('/campus/show/code/605006', 'police', true) }}" target="_blank">광주</a><span>|</span>
                            <a href="{{ front_app_url('/campus/show/code/605009', 'police', true) }}" target="_blank">제주</a><span>|</span>
                            <a href="https://blog.naver.com/als9946" target="_blank">전북</a><span>|</span>
                            <a href="{{ front_app_url('/campus/show/code/605010', 'police', true) }}" target="_blank">경기 광주(기숙형)</a>
                        </li>
                        <li>
                            <strong>경찰간부</strong>
                            <a href="{{ front_app_url('/home/index', 'spo', true) }}" target="_blank">신림(한림법학원)</a>
                        </li>
                        <li>
                            <strong>교원임용</strong>
                            <a href="http://ssam.willbes.net" target="_blank">노량진</a>
                        </li>
                        <li>
                            <strong>고등고시</strong>
                            <a href="{{ front_app_url('/home/index/cate/3094', 'gosi') }}" target="_blank">신림(한림법학원)</a>
                        </li>
                        <li>
                            <strong>전문자격</strong>
                            <a href="{{ front_app_url('/home/index/cate/309002', 'job') }}" target="_blank">감평/노무 - 신림(한림법학원)</a><span>|</span>
                            <a href="http://www.namucpa.com" target="_blank">CPA/CTA(나무경영아카데미)</a><span>|</span>
                            <a href="{{ front_app_url('/home/index/cate/309004', 'job') }}" target="_blank">변리사-강남</a>
                        </li>
                    </ul>
                </div>
                <div class="imgBox">
                    <ul>
                        <li><a href="http://www.willstory.co.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_willstory.jpg" alt="온라인 서점 윌스토리"></a></li>
                        <li><a href="http://www.willbeslife.net" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_willbeslife.jpg" alt="학점은행"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- 고객센터 --}}
        <div class="Section Area6 mt50 mb50">
            <div class="widthAuto">
                <div class="will-Tit">윌비스 고객센터</div>
                <div class="CScenterBox">
                    <ul>
                        <li>ㆍ <span>수강</span>문의 <strong>1544-5006</strong></li>
                        <li>ㆍ <span>교재</span>문의 <strong>1544-4944</strong> [운영시간] 평일 9시 ~ 18시 | 주말, 공휴일 휴무</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- 엔잡 배너 --}}
        {{--
        <div class="njobBn">
            <a href="{{ front_app_url('/home/index/cate/3114', 'njob') }}" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_full.gif" alt="N job"></a>
        </div>
        --}}
        {!! popup('657001', $__cfg['SiteCode']) !!}
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var default_cate = new Array('2001_3001', 'ssam_1', '2005_3094', '2005_3095', '2003_3019', '2003_3035', '2006_309002', '2014_3114');
        var favor_cate_cnt = 8;
        var $favor_cate_pop = $('#favor_cate_pop');
        var images = ['gate_v3_bg1.jpg', 'gate_v3_bg2.jpg', 'gate_v3_bg3.jpg'];

        $(document).ready(function(){
            // 팝업 클릭 이벤트
            $('.favor-cate-each').click(function() {
                if($(this).hasClass('favor-cate-on')) {
                    //$(this).removeClass('favor-cate-on');
                } else {
                    if($favor_cate_pop.find('.favor-cate-on').length >= favor_cate_cnt) {
                        alert('관심분야는 ' + favor_cate_cnt + '개까지 선택 가능합니다.'); return;
                    }
                    $(this).addClass('favor-cate-on');
                }
            });

            initFavorCateView();{{-- 관심분야 화면 초기 셋팅 --}}

            // 상단 백그라운드 이미지
            $('.mainV3').css({'background-image': 'url(https://static.willbes.net/public/images/promotion/main/' + images[Math.floor(Math.random() * images.length)] + ')'});
        });

        function initFavorCateView() {
            var favor_cate = $.cookie('favor_cate');
            if(typeof favor_cate == 'undefined') {
                $.cookie('favor_cate', default_cate, { expires: 365 });
            }
            var arr_favor_cate = getCookieStrToArr($.cookie('favor_cate'));
            var cate_html = '';
            var cate_html_cnt = 0;
            for(var i = 0; i < arr_favor_cate.length; i++) {
                $favor_cate_pop.find('.favor-cate-each').each(function() {
                    if(arr_favor_cate[i] === $(this).data('key')) {
                        cate_html += '<li>';
                        cate_html += '  <a href="' + $(this).data('url') + '">' + $(this).html() + '</a>';
                        cate_html += '  <span onclick="removeFavorCateView(this);" data-key="' + $(this).data('key') + '">x</span>';
                        cate_html += '</li>';
                        cate_html += '';
                        cate_html_cnt += 1;
                    }
                });
            }

            {{-- 남은 갯수 그리기 --}}
            /*for(cate_html_cnt; cate_html_cnt < favor_cate_cnt; cate_html_cnt++) {
                cate_html += '<li><a href="javascript:initFavorCatePop();" class="blank">+</a></li>';
            }*/
            //$('#favor_cate_view').children().first().nextAll().remove();
            //$('#favor_cate_view').children().first().after(cate_html);

            $('#favor_cate_view').html(cate_html);
        }

        {{-- 카테고리 즐겨찾기 팝업 셋팅 --}}
        function initFavorCatePop() {
            var favor_cate = $.cookie('favor_cate');
            if(typeof favor_cate == 'undefined') {
                $.cookie('favor_cate', default_cate, { expires: 365 });
            }
            var arr_favor_cate = getCookieStrToArr($.cookie('favor_cate'));

            {{-- 쿠키 팝업 셋팅 --}}
            if(typeof arr_favor_cate != 'undefined') {
                {{-- 제거 --}}
                $favor_cate_pop.find('.favor-cate-each').each(function(){
                    $(this).removeClass('favor-cate-on');
                });

                {{-- 추가 --}}
                for(var i = 0; i < arr_favor_cate.length; i++) {
                    $favor_cate_pop.find('.favor-cate-each').each(function(){
                        if(arr_favor_cate[i] === $(this).data('key')) {
                            $(this).addClass('favor-cate-on');
                        }
                    });
                }
            }
            openWin('addArea');
        }

        {{-- 카테고리 즐겨찾기 저장 --}}
        function saveFavorCatePop() {
            var arr_favor_cate = new Array();

            $favor_cate_pop.find('.favor-cate-each').each(function(){
                if($(this).hasClass('favor-cate-on')) {
                    arr_favor_cate.push($(this).data('key'));
                }
            });

            if(arr_favor_cate.length === 0) {
                alert('관심분야를 선택해주세요.'); return;
            } else if(arr_favor_cate.length > favor_cate_cnt) {
                alert('관심분야는 ' + favor_cate_cnt + '개까지 선택 가능합니다.'); return;
            }
            $.cookie('favor_cate', arr_favor_cate, { expires: 365 });
            initFavorCateView();
            closeWin('addArea');
        }

        {{-- 화면 개별삭제 --}}
        function removeFavorCateView(ele) {
            var favor_cate_key = $(ele).data('key');
            if(typeof favor_cate_key != 'undefined') {
                var arr_favor_cate = getCookieStrToArr($.cookie('favor_cate'));
                for(var i = 0; i < arr_favor_cate.length; i++) {
                    if(arr_favor_cate[i] === favor_cate_key) {
                        arr_favor_cate.splice(i, 1);
                    }
                }
                $.cookie('favor_cate', arr_favor_cate, { expires: 365 });
                initFavorCateView();
            }
        }

        function getCookieStrToArr(str) {
            if(!str) return '';
            return str.split(',');
        }
    </script>
@stop
