@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container main NSK c_both">
        <div class="Section MainVisual mt30 mb50">
            <div class="widthAuto">
                <a href="{{ site_url('/member/join/') }}" target="_blank"><img src="{{ img_url('main/visual/visualTop.jpg') }}" title="통합회원 가입, 한번이면 OK"></a>
            </div>
        </div>
        <div class="Section Act1 NGR mb50">
            <div class="widthAuto">
                <div class="will-Tit">윌비스 평생교육 대표 과정 <span class="will-subTit">더 나은 미래, 윌비스가 책임지겠습니다.</span></div>
                <div class="ProcessBox">
                    <ul>
                        <li>
                            <a href="{{ app_url('/home/index/cate/3019', 'pass') }}" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes1.png') }}"> 공무원
                                </div>
                                <div class="wTxt">
                                    9급/7급/법원/소방/기술직 명가<br/>
                                    <strong>윌비스 고시학원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ app_url('/home/index/cate/3001', 'police') }}" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes2.png') }}"> 경찰
                                </div>
                                <div class="wTxt">
                                    독보적일반/경행/승진/해경<br/>
                                    <strong>윌비스 신광은경찰학원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://wpa.willbes.net/main_spo.asp?category_id=912" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes2.png') }}"> 경찰
                                </div>
                                <div class="wTxt">
                                    간부후보생 선발시험 대비<br/>
                                    <strong>윌비스 한림법학원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://ssam.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes3.png') }}"> 교원임용
                                </div>
                                <div class="wTxt">
                                    유아/초등/중등합격을부르는<br/>
                                    <strong>윌비스 임용</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.hanlimgosi.co.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes4.png') }}"> 고등고시
                                </div>
                                <div class="wTxt">
                                    5급행정/입법/외교/법원/변호사<br/>
                                    <strong>윌비스 한림법학원</strong>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="http://value.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes5.png') }}"> 전문자격증
                                </div>
                                <div class="wTxt">
                                    노무/감평/변리/관세/세무/회계<br/>
                                    <strong>윌비스 한림법학원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.namucpa.com" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes5.png') }}"> 나무경영
                                </div>
                                <div class="wTxt">
                                    회계/세무/관세<br/>
                                    <strong>윌비스 나무경영 아카데미</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://cert.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes6.png') }}"> 자격증
                                </div>
                                <div class="wTxt">
                                    국가기술자격/분야별일반자격증<br/>
                                    <strong>윌비스 패스하자</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willpass.co.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes7.png') }}"> 취업
                                </div>
                                <div class="wTxt">
                                    공기업/대기업/NCS/능력검정<br/>
                                    <strong>윌패스</strong>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="http://lang.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes8.png') }}"> 어학
                                </div>
                                <div class="wTxt">
                                    토익/텝스/지텔프/영어/지2외국어<br/>
                                    <strong>윌비스랑</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willbeslife.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes10.png') }}"> 학점은행
                                </div>
                                <div class="wTxt">
                                    교육부 인정 학점은행 원격교육기관<br/>
                                    <strong>윌비스 원격평생교육원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://willbes.or.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes9.png') }}"> 국비교육
                                </div>
                                <div class="wTxt">
                                    대한민국 국비교육 기관<br/>
                                    <strong>윌비스 평생교육원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://willbesedu.or.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes10.png') }}"> 출석 학점은행
                                </div>
                                <div class="wTxt">
                                    학점은행 평가인정 교육기관<br/>
                                    <strong>윌비스 고시학원 출석학점은행</strong>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Bnr">
            <div class="widthAuto">
                <div class="willbes-Bnr">
                    <ul>
                        <li>{!! banner('메인_띠배너', '', $__cfg['SiteCode'], '0') !!}</li>
                    </ul>
                </div>
            </div>
        </div>

        @if(isset($data['dday']) === true)
            {{-- Dday --}}
            <div class="Section Act2 mb50 mt50">
                <div class="widthAuto">
                    <div class="will-Tit mb-zero">시험일정</div>
                    <div class="sliderDayList cSlider">
                        <div class="sliderControls">
                            <div>
                                @foreach($data['dday'] as $idx => $row)
                                    @if($idx != 0 && $idx % 4 == 0)
                            </div><div>
                                @endif
                                <div class="dDayBox">
                                    <a href="#none">
                                        <span class="dTit">{{ $row['DayTitle'] }}<div class="w-date">{{ $row['DayDatm'] }}</div></span>
                                        <span class="dDay tx-color">D{{ $row['DDay'] }}</span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="Section Bnr mb50">
            <div class="widthAuto">
                <dl class="willbes-Bnr">
                    <dt>
                        {!! banner('메인_미들1', '', $__cfg['SiteCode'], '0') !!}
                    </dt>
                    <dt>
                        {!! banner('메인_미들2', '', $__cfg['SiteCode'], '0') !!}
                    </dt>
                </dl>
            </div>
        </div>
        <div class="Section Act4 mb50">
            <div class="widthAuto">
                <dl>
                    <dt class="WhyWillbes">
                        <div class="will-Tit bd-none mb-zero">Why 윌비스 <span class="will-subTit sm">* JTBC·SBS·KBS·MBC · EBS·연합뉴스등국내주요언론및일본· 대만등해외취재</span></div>
                        <div class="whyBox c_both">
                            <a href="{{ app_url('/promotion/index/cate/3001/code/1021', 'police') }}" target="_blank"><img src="{{ img_url('main/video/video_180921.jpg') }}"></a>
                        </div>
                    </dt>
                    <dt class="NowWillbes">
                        <div class="will-Tit">Now 윌비스</div>
                        <ul class="List-Table">
                            @foreach($data['notice'] as $row)
                                <li>
                                    <a href="{{site_url('/support/notice/show?board_idx='.$row['BoardIdx'])}}">
                                        <span class="w-tit">{{$row['Title']}}</span>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}" alt="new"/>@endif
                                        <span class="w-date">{{$row['RegDatm']}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </dt>
                </dl>
            </div>
        </div>
        <div class="Section Act5 mb50">
            <div class="widthAuto">
                <div class="will-Tit">윌비스 직영학원</div>
                <dl class="ListBox">
                    <dt class="acadList">
                        <table cellspacing="0" cellpadding="0" class="MainacadTable">
                            <colgroup>
                                <col style="width: 125px;"/>
                                <col style="width: 675px;"/>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th class="Tit">공무원</th>
                                <td>
                                    <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">노량진</a>
                                    <a href="http://willbesedu.co.kr" target="_blank">인천</a>
                                    <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">대구</a>
                                    <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">부산</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">경찰</th>
                                <td>
                                    <a href="{{ app_url('/pass/campus/show/code/605001', 'police') }}" target="_blank">노량진</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605002', 'police') }}" target="_blank">신림</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605005', 'police') }}" target="_blank">인천</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605004', 'police') }}" target="_blank">대구</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605003', 'police') }}" target="_blank">부산</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605006', 'police') }}" target="_blank">광주</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605009', 'police') }}" target="_blank">제주</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605007', 'police') }}" target="_blank">전북</a>
                                    <a href="{{ app_url('/pass/campus/show/code/605008', 'police') }}" target="_blank">진주</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">간부경찰</th>
                                <td>
                                    <a href="http://wpa.willbes.net/main_spo.asp?category_id=912" target="_blank">신림(한림법학원)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">교원임용</th>
                                <td>
                                    <a href="http://ssam.willbes.net" target="_blank">노량진</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">고등고시</th>
                                <td>
                                    <a href="http://www.hanlimgosi.co.kr" target="_blank">신림(한림법학원)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">전문자격</th>
                                <td>
                                    <a href="http://value.willbes.net" target="_blank">감평/노무 - 신림(한림법학원)</a>
                                    <a href="http://www.namucpa.com" target="_blank">세무/회계 종로(나무아카데미)</a>
                                    <a href="http://patent.willbes.net" target="_blank">변리사-강남</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </dt>
                    <dt class="imgBox">
                        <ul>
                            <li><a href="http://www.willstory.co.kr" target="_blank"><img src="{{ img_url('main/familysite_willstory.jpg') }}"></a></li>
                            <li><a href="http://www.willbeslife.net" target="_blank"><img src="{{ img_url('main/familysite_life.jpg') }}"></a></li>
                            <li><a href="http://www.willbes.co.kr" target="_blank"><img src="{{ img_url('main/familysite_edu.jpg') }}"></a></li>
                        </ul>
                    </dt>
                </dl>
            </div>
        </div>
        <div class="Section Act6 mb50">
            <div class="widthAuto">
                <div class="CScenterBox">
                    <table cellspacing="0" cellpadding="0" class="mainTable">
                        <colgroup>
                            <col style="width: 209px;"/>
                            <col style="width: 1px;"/>
                            <col style="width: 330px;"/>
                            <col style="width: 260px;"/>
                            <col style="width: 1px;"/>
                            <col style="width: 319px;"/>
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="mTit">고객센터</td>
                            <td class="line">-</td>
                            <td>
                                <span class="nTit">수강문의</span><span class="nNumber tx-color">1544-5006</span><br/>
                                <span class="nTit">교재문의</span><span class="nNumber tx-color">1544-4944</span>
                            </td>
                            <td class="nTxt">
                                [운영시간]<br/>
                                평일 : 09시 ~ 18시<br/>
                                공휴일/일요일은 휴무<br/>
                                ※ 전화상담시 자동녹취<br/>
                            </td>
                            <td class="line">-</td>
                            <td class="nInfo">
                                <img src="{{ img_url('main/icon_info.png') }}">
                                <span>
                                    윌비스는 항상 열려있습니다.<br/>
                                    다양한 의견을 올려주세요.
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->
    {!! popup('657001') !!}
@stop
