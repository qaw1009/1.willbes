@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="Container gosi-gate NGR c_both">
        <div class="widthAuto gosi-gate-top">
            <div class="gosi-gate-sns">
                <ul>
                    <li>
                        <a href="https://www.youtube.com/channel/UCsNPdhwjR37qVtuePB599KQ" target="_blank">
                            <img src="{{ img_url('gnb/icon_youtube.png') }}" title="유튜브">
                        </a>
                    </li>
                    <li>
                        <a href="{{ site_url('/pass/promotion/index/cate/3048/code/1104') }}" target="_blank">
                            <img src="{{ img_url('gnb/icon_kakao.png') }}" title="카카오톡">
                        </a>
                    </li>
                    <li>
                        <a href="https://tv.naver.com/willbes79" target="_blank">
                            <img src="{{ img_url('gnb/icon_navertv.png') }}" title="네이버TV">
                        </a>
                    </li>
                    <li>
                        <a href="https://blog.naver.com/willbes79" target="_blank">
                            <img src="{{ img_url('gnb/icon_blog.png') }}" title="블로그">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/willbes_gong/" target="_blank">
                            <img src="{{ img_static_url('promotion/2019/10/icon_instagram.png') }}" title="인스타그램">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="gosi-logo">
                <img src="{{ img_static_url('promotion/main/gosi_gate/2003_logo.png') }}" alt="윌비스 공무원">
            </div>

            <div class="gosi-gate-search">
                {{-- 온라인강의 검색 --}}
                @include('willbes.pc.layouts.partial.site_search')
            </div>
        </div>

        {{-- 카테고리 메뉴 --}}
        <div class="gosi-gate-menu">
            <ul>
                <li><a href="{{ front_url('/home/index/cate/3092') }}">무료인강</a></li>
                <li><a href="{{ front_url('/home/index/cate/3019') }}">9급</a></li>
                <li><a href="{{ front_url('/home/index/cate/3103') }}">7급 PSAT</a></li>
                <li><a href="{{ front_url('/home/index/cate/3020') }}">7급</a></li>
                <li><a href="{{ front_url('/home/index/cate/3022') }}">세무직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3035') }}">법원직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3023') }}">소방직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3028') }}">기술직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3024') }}">군무원</a></li>
            </ul>
        </div>

        <div class="Section mt30">
            <div class="widthAuto">
                {!! banner_html(element('인트로_핵심띠배너', $data['banner'])) !!}
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_static_url('promotion/main/gosi_gate/gosi_gate_txt01.jpg') }}" alt="윌비스 패스">
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto gosi-gate-bnSec01 nSlider pick">
                <div class="f_left">
                    {!! banner_html(element('인트로_메인배너1', $data['banner']), 'sliderNum') !!}
                </div>
                <div class="f_right">
                    {!! banner_html(element('인트로_메인배너2', $data['banner']), 'sliderNum') !!}
                </div>
            </div>
        </div>

        <div class="Section gosi-gate-Sec">
        @if(empty($data['banner']['인트로_메인빅배너']) === false)            
            <div class="widthAuto">
                <img src="{{ img_static_url('promotion/main/gosi_gate/gosi_gate_txt02.jpg') }}" alt="윌비스 티패스">
                <div class="gosi-gate-bnSec02 p_re">
                    <div id="MainRollingDiv" class="MaintabList five">
                        <ul class="Maintab">
                            @foreach($data['banner']['인트로_메인빅배너'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="MainRollingSlider" class="MaintabBox">
                        {!! banner_html($data['banner']['인트로_메인빅배너'], 'MaintabSlider') !!}
                    </div>
                </div>
            </div>
        @endif
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                <ul class="gosi-gate-bnSec03">
                    <li><img src="{{ img_static_url('promotion/main/gosi_gate/gosi_gate_img01.jpg') }}" alt="공무원, 어떻게 시작해야될지 고민된다면?"></li>
                    <li>{!! banner_html(element('인트로_서브배너1', $data['banner'])) !!}</li>
                    <li>{!! banner_html(element('인트로_서브배너2', $data['banner'])) !!}</li>
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_static_url('promotion/main/gosi_gate/gosi_gate_txt03.jpg') }}" alt="윌비스 교수진">
                <ul class="gosi-gate-prof">
                    <li>
                        <div class="bSlider">
                            {!! banner_html(element('인트로_교수진1', $data['banner'])) !!}
                        </div>
                    </li>
                    <li>
                        <div class="bSlider">
                            {!! banner_html(element('인트로_교수진2', $data['banner'])) !!}
                        </div>
                    </li>
                    <li>
                        <div class="bSlider">
                            {!! banner_html(element('인트로_교수진3', $data['banner'])) !!}
                        </div>
                    </li>
                    <li>
                        <div class="bSlider">
                            {!! banner_html(element('인트로_교수진4', $data['banner'])) !!}
                        </div>
                    </li>
                    <li>
                        <div class="bSlider">
                            {!! banner_html(element('인트로_교수진5', $data['banner'])) !!}
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_static_url('promotion/main/gosi_gate/gosi_gate_txt04.jpg') }}" alt="수험생활 tip">
                <div class="castBox">
                    <ul class="castslider">
                        @foreach($data['banner'] as $section_name => $section_banners)
                            @if(starts_with($section_name, '인트로_cast') === true)
                                <li>
                                    {!! banner_html($section_banners, '', '' , false, '', '', 'castTitle') !!}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="{{ img_static_url('promotion/main/btn_arrowL.png') }}"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="{{ img_static_url('promotion/main/btn_arrowR.png') }}"></a></p>
                </div>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto gosi-gate-bnSec04 nSlider pick">
                <img src="{{ img_static_url('promotion/main/gosi_gate/gosi_gate_txt05.jpg') }}" alt="학원 실강 안내">
                <ul>
                    <li>
                        {!! banner_html(element('인트로_실강안내1', $data['banner']), 'sliderNum') !!}
                    </li>
                    <li>
                        {!! banner_html(element('인트로_실강안내2', $data['banner']), 'sliderNum') !!}
                    </li>
                    <li>
                        {!! banner_html(element('인트로_실강안내3', $data['banner']), 'sliderNum') !!}
                    </li>
                </ul>
            </div>
        </div>

        {{-- 게시판 --}}
        <div class="Section mt80">
            <div class="widthAuto">
                <div class="nNoticeBox three">
                    <div class="noticeList widthAuto350 f_left">
                        <div class="will-nlistTit p_re">공지사항 <a href="{{front_url('/support/notice/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['notice']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['notice'] as $row)
                                    <li>
                                        <a href="{{front_url('/support/notice/show?board_idx=' . $row['BoardIdx'])}}">
                                            <span>{{$row['Title']}}</span>
                                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                        </a>
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">시험공고 <a href="{{front_url('/support/examAnnouncement/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['exam_announcement']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['exam_announcement'] as $row)
                                    <li>
                                        <a href="{{front_url($row['PassRoute'] . '/support/examAnnouncement/show?board_idx='.$row['BoardIdx'], false, true)}}">
                                            <span>{{$row['Title']}}</span>
                                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                        </a>
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">수험뉴스 <a href="{{front_url('/support/examNews/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['exam_news']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['exam_news'] as $row)
                                    <li>
                                        <a href="{{front_url($row['PassRoute'] . '/support/examNews/show?board_idx=' . $row['BoardIdx'], false, true)}}">
                                            <span>{{$row['Title']}}</span>
                                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                        </a>
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK mt50 mb90">
            <div class="widthAuto">
                <div class="CScenterBox">
                    <dl>
                        <dt class="willbesNumber">
                            <ul>
                                <li>
                                    <div class="nTit">온라인 수강문의</div>
                                    <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
                                    <div class="nTxt">
                                        [운영시간]<br/>
                                        평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                        공휴일/일요일휴무<br/>
                                    </div>
                                </li>
                                <li>
                                    <div class="nTit">교재문의</div>
                                    <div class="nNumber tx-color">1544-4944</div>
                                    <div class="nTxt">
                                        [운영시간]<br/>
                                        평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                        공휴일/일요일휴무<br/>
                                    </div>
                                </li>
                                <li>
                                    <div class="nTit">학원 고객센터</div>
                                    <div class="nNumber tx-color">1544-0330</div>
                                    <div class="nTxt">
                                        [전화/방문상담 운영시간]<br/>
                                        평일/주말: 09시~ 22시<br/>
                                    </div>
                                </li>
                            </ul>
                        </dt>
                        <dt class="willbesCenter">
                            <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                            <ul>
                                <li>
                                    <a href="{{ site_url('/support/faq/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                        <div class="nTxt">자주하는<br/>질문</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ site_url('/support/mobile/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                        <div class="nTxt">모바일<br/>서비스</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ site_url('/support/qna/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                        <div class="nTxt">동영상<br/>상담실</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ site_url('/support/remote/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                        <div class="nTxt">1:1<br/>고객지원</div>
                                    </a>
                                </li>
                            </ul>
                        </dt>

                    </dl>
                </div>
            </div>
        </div>
        <!-- CS센터 //-->
    </div>
    <!-- End Container -->
    {!! popup('657005', $__cfg['SiteCode'], '0', 'blank') !!}

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // 수험생활 팁 (캐스트)
            var slidesImg1 = $('.castslider').bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:3,
                maxSlides:3,
                slideWidth: 370,
                slideMargin:5,
                autoHover: true,
                moveSlides:1,
            });

            $('#imgBannerLeft1').click(function (){
                slidesImg1.goToPrevSlide();
            });

            $('#imgBannerRight1').click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>
@stop
