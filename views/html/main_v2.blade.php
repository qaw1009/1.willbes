@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container mainV2 NG c_both">
    <div class="Section gateSearch">
        <input type="search" id="search" name="" value="" placeholder="검색어를 입력하세요." />
        <label for="search"><button title="검색">검색</button></label>
    </div>

    <div class="Section Area1 widthAuto">
        <ul class="addList">
            <li><a href="#none" onclick="openWin('addArea')" class="add">+</a></li>
            <li><a href="#none">일반경찰<span>x</span></a></li>
            <li><a href="#none">9급공무원<span>x</span></a></li>
            <li><a href="#none">기술직<span>x</span></a></li>
            <li><a href="#none">법원직<span>x</span></a></li>
            <li><a href="#none">경찰간부<span>x</span></a></li>
            <li><a href="#none" onclick="openWin('addArea')" class="blank">+</a></li>
            <li><a href="#none" onclick="openWin('addArea')" class="blank">+</a></li>            
        </ul>
        {{--추가팝업--}}
        <div id="addArea" class="willbes-Layer-Black gate-add-popup">
            <div class="willbes-Layer-CartBox">
                <a class="closeBtn" href="#none" onclick="closeWin('addArea')">
                    <img src="{{ img_url('cart/close_cart.png') }}">
                </a>
                <div class="Layer-Tit NG">나의 관심분야를 선택해 주세요!</div>
                <div class="gate-add-cts">
                    <div>
                        <h5>ㆍ 공무원</h5>
                        <ul>
                            <li><a href="#none">9급공무원</a></li>
                            <li><a href="#none" class="active">7급 공무원</a></li>
                            <li><a href="#none">7급PSAT</a></li>
                            <li><a href="#none">세무직</a></li>                                                               
                            <li><a href="#none">법원직</a></li>
                            <li><a href="#none">소방직</a></li>
                            <li><a href="#none">기술직</a></li>
                            <li><a href="#none">군무원</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ 경찰</h5>
                        <ul>
                            <li><a href="#none">일반경찰</a></li>
                            <li><a href="#none">경행경채</a></li>
                            <li><a href="#none">경찰승진</a></li>
                            <li><a href="#none">해양경찰</a></li>                                                               
                            <li><a href="#none">해양경찰특채</a></li>
                            <li><a href="#none">경찰간부(간부후보생)</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ 교원임용</h5>
                        <ul>
                            <li><a href="#none">교원임용</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ 취업</h5>
                        <ul>
                            <li><a href="#none">공기업</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ N잡</h5>
                        <ul>
                            <li><a href="#none">e-커머스</a></li>
                        </ul>
                    </div>                   
                </div>
                <div class="addBtn">
                    <a href="#none">관심분야 추가하기</a>
                </div>
            </div>
        </div>
        {{--//추가팝업--}}
    </div>

    <div class="Section mt40">
        <div class="widthAuto">
            <div class="bar-banner">
                <div class="slider">
                    <div><a href="none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/main_900x90_01.jpg"></a></div>
                    <div><a href="none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/main_900x90_02.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>

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
                            <a href="https://pass.willbes.net/home/index/cate/3019" target="_blank">9급 공무원</a>
                            <a href="https://pass.willbes.net/home/index/cate/3020" target="_blank">7급 공무원</a> 
                            <a href="https://pass.willbes.net/home/index/cate/3103" target="_blank">7급PSAT</a>
                            <a href="https://pass.willbes.net/home/index/cate/3022" target="_blank">세무직</a>                                                               
                            <a href="https://pass.willbes.net/home/index/cate/3025" target="_blank">법원직</a>
                            <a href="https://pass.willbes.net/home/index/cate/3023" target="_blank">소방직</a>
                            <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank">기술직</a>
                            <a href="https://pass.willbes.net/home/index/cate/3024" target="_blank">군무원 </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">경찰</th>
                        <td colspan="5">
                            <a href="https://police.willbes.net/home/index/cate/3001" target="_blank">일반경찰</a>
                            <a href="https://police.willbes.net/home/index/cate/3002" target="_blank">경행경채</a>
                            <a href="https://police.willbes.net/home/index/cate/3005" target="_blank">경찰승진</a>
                            <a href="https://police.willbes.net/home/index/cate/3007" target="_blank">해양경찰</a>
                            <a href="https://police.willbes.net/home/index/cate/3008" target="_blank">해양경찰특채</a> 
                            <a href="https://police.willbes.net/home/index/cate/3100" target="_blank">경찰간부(간부후보생)</a> 
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
                        <td><a href="https://lang.willbes.net/home/index/cate/3093" target="_blank">G-TELP</a></td>
                    </tr>
                    <tr>
                        <th scope="row">고등고시</th>
                        <td colspan="5">
                            <a href="https://gosi.willbes.net/home/index/cate/3094" target="_blank">5급행정(입법고시)</a>
                            <a href="https://gosi.willbes.net/home/index/cate/3095" target="_blank">국립외교원</a>
                            <a href="https://pass.willbes.net/home/index/cate/3096" target="_blank">PSAT</a>
                            <a href="https://gosi.willbes.net/home/index/cate/3097" target="_blank">5급헌법</a>
                            <a href="https://gosi.willbes.net/home/index/cate/3098" target="_blank">법원행시</a> 
                            <a href="https://gosi.willbes.net/home/index/cate/3099" target="_blank">변호사</a>   
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">전문자격증</th>
                        <td colspan="5">
                            <a href="https://job.willbes.net/home/index/cate/309002" target="_blank">공인노무사</a>
                            <a href="https://job.willbes.net/home/index/cate/309003" target="_blank">감정평가사</a>
                            <a href="https://job.willbes.net/home/index/cate/309004" target="_blank">변리사</a>  
                            <a href="https://job.willbes.net/home/index/cate/309006" target="_blank">세무사</a>                             
                            <a href="https://job.willbes.net/home/index/cate/309005" target="_blank">관세사</a>                                
                            <a href="https://job.willbes.net/home/index/cate/309001" target="_blank">스포츠지도사</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">기타자격증</th>
                        <td colspan="5">
                            <a href="https://job.willbes.net/home/index/cate/308901" target="_blank">소방(산업)기사</a>
                            <a href="https://job.willbes.net/home/index/cate/308902" target="_blank">전기(산업)기사</a>
                            <a href="https://job.willbes.net/home/index/cate/310101" target="_blank">소프트웨어자산관리사</a>  
                            <a href="https://job.willbes.net/home/index/cate/310102" target="_blank">경제교육지도사</a>                             
                            <a href="https://job.willbes.net/home/index/cate/310103" target="_blank">진로직업체험지도사</a>                                
                            <a href="https://job.willbes.net/home/index/cate/309101" target="_blank">한국사능력시험</a>
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
                        <th scope="row">N잡</th>
                        <td><a href="https://lang.willbes.net/home/index/cate/3093" target="_blank">e-커머스 <img src="https://static.willbes.net/public/images/promotion/common/icon_new.png"></a></td>
                        <th>취업</th>
                        <td><a href="https://work.willbes.net/home/index/cate/3102" target="_blank">공기업</a></td>
                        <th>학점은행</th>
                        <td><a href="https://lang.willbes.net/home/index/cate/3093" target="_blank">학점은행</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    

    <div class="Section Area3 mt50">
        <div class="widthAuto">
            <div class="will-Tit mb-zero">시험일정</div>
            <ul class="sliderDayList">
                <li>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 경찰 3차
                                <div class="w-date">2018-11-23</div>
                            </span>
                            <span class="dDay tx-color">D-349</span>
                        </a>
                    </div>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 서울시
                                <div class="w-date">2018-10-05</div>
                            </span>
                            <span class="dDay tx-color">D-35</span>
                        </a>
                    </div>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 지방직
                                <div class="w-date">2019-04-18</div>
                            </span>
                            <span class="dDay tx-color">D-94</span>
                        </a>
                    </div>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 법원/검찰직
                                <div class="w-date">2019-04-19</div>
                            </span>
                            <span class="dDay tx-color">D-97</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 경찰 5차
                                <div class="w-date">2019-12-25</div>
                            </span>
                            <span class="dDay tx-color">D-1</span>
                        </a>
                    </div>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2019 서울시
                                <div class="w-date">2019-00-00</div>
                            </span>
                            <span class="dDay tx-color">D-20</span>
                        </a>
                    </div>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 지방직
                                <div class="w-date">2019-04-18</div>
                            </span>
                            <span class="dDay tx-color">D-94</span>
                        </a>
                    </div>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 법원/검찰직
                                <div class="w-date">2019-04-19</div>
                            </span>
                            <span class="dDay tx-color">D-97</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dDayBox">
                        <a href="#none">
                            <span class="dTit">
                                2018 지방직
                                <div class="w-date">2019-04-18</div>
                            </span>
                            <span class="dDay tx-color">D-94</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>    

    <div class="Section Area4 mt50">
        <div class="widthAuto">
            <dl>
                <dt class="NowWillbes">
                    <div class="will-Tit">윌비스 소식 <a href="https://www.willbes.net/support/notice/index?s_cate_code=&s_campus=&s_keyword=&prof_idx=&subject_idx=&view_type=&page=&s_cate_code_disabled=" target="_blank">+</a></div>
                    <ul>
                        <li><a href="#none"><span class="w-tit">2019 대비 9-10월 신규강좌 선접수 이벤트<span class="w-new">N</span></span><span class="w-date">2018.03.06</span></a></li>
                        <li><a href="#none"><span class="w-tit">신광은 경찰학원 '광은 장학회 4기' 합격자 발표</span><span class="w-date">2018.03.05</span></a></li>
                        <li><a href="#none"><span class="w-tit">면접 A반(월수금)과 면접스파르타반 마감! B반(화목토) 101단</span><span class="w-date">2018.03.04</span></a></li>
                        <li><a href="#none"><span class="w-tit">체력관리 이벤트 당첨자 발표</span><span class="w-date">2018.03.03</span></a></li>
                        <li><a href="#none"><span class="w-tit">2018년 9~11월 모의고사반 개강 안내</span><span class="w-date">2018.03.02</span></a></li>                       
                    </ul>
                </dt>
                <dt class="WhyWillbes">
                    <div>
                        <div><a href="#none" target="_blank"><img src="{{ img_url('main/banner/bnr_180918.jpg') }}"></a></div>
                        <div><a href="#none" target="_blank"><img src="{{ img_url('main/banner/bnr_180919.jpg') }}"></a></div>
                    </div>
                </dt>          
            </dl>
        </div>
    </div>
    
    <div class="Section Area5 mt50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 직영학원</div>
            <div class="acadList">
                <ul>
                    <li>
                        <strong>공무원</strong>
                        <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">노량진</a><span>|</span>
                        <a href="http://willbesedu.co.kr" target="_blank">인천</a><span>|</span>
                        <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">대구</a><span>|</span>
                        <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">부산</a>
                    </li>
                    <li>
                        <strong>경찰</strong>
                        <a href="{{ app_url('/pass/campus/show/code/605001', 'police') }}" target="_blank">노량진</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605005', 'police') }}" target="_blank">인천</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605004', 'police') }}" target="_blank">대구</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605003', 'police') }}" target="_blank">부산</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605006', 'police') }}" target="_blank">광주</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605009', 'police') }}" target="_blank">제주</a><span>|</span>
                        <a href="https://blog.naver.com/als9946" target="_blank">전북</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605010', 'police') }}" target="_blank">경기 광주(기숙형)</a>
                    </li>
                    <li>
                        <strong>경찰간부</strong>
                        <a href="http://wpa.willbes.net/main_spo.asp?category_id=912" target="_blank">신림(한림법학원)</a>
                    </li>
                    <li>
                        <strong>교원임용</strong>
                        <a href="http://ssam.willbes.net" target="_blank">노량진</a>
                    </li>
                    <li>
                        <strong>고등고시</strong>
                        <a href="{{ app_url('/home/index/cate/3094', 'gosi') }}">신림(한림법학원)</a>
                    </li>
                    <li>
                        <strong>전문자격</strong>
                        <a href="{{ app_url('/home/index/cate/309002', 'job') }}">감평/노무 - 신림(한림법학원)</a><span>|</span>
                        <a href="http://www.namucpa.com" target="_blank">세무/회계 종로(나무아카데미)</a><span>|</span>
                        <a href="{{ app_url('/home/index/cate/309004', 'job') }}">변리사-강남</a>
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
    
    <div class="njobBn">
        <a href="https://njob.willbes.net/home/index/cate/3114"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_full.gif" alt="N job"></a>
    </div>
</div>
<!-- End Container -->
@stop