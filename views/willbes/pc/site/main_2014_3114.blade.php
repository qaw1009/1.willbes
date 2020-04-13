@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="Container njob2 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section Section0">
            <div class="widthAuto">
                <a href="javascript:popup()" ><img src="https://static.willbes.net/public/images/promotion/main/3114_fullx110.gif" alt="1억뷰 N잡"></a>
            </div>
        </div>

        <div class="Section1 p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                        {{--
                        <div class="sliderStopAutoPager">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_01.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_02.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_03.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_04.jpg" alt="배너명"></a></div>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK mt70">
            <div class="widthAuto">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 인기강좌</div>
                <ul class="bestLec">
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_01.png" alt="김정한 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>가장 현실적인 월 100만원 만들기, <br>
                                    지금 바로 시작하는 스마트스토어!</li>
                                <li>다마고치 김정환 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_02.png" alt="김경은 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>혼자서도 할 수 있는 <br>
                                    1인 온라인 창업</li>
                                <li>단아쌤 김경은 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_03.png" alt="황채영 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>재고없이 오픈마켓으로<br>
                                    월 1천만원 수익 만들기</li>
                                <li>황채영 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_04.png" alt="정문진 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>진짜 고수에게 배우는 스마트스토어로, <br>
                                    제2의 월급통장 만들기!</li>
                                <li>정문진 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section2 mt70">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/3114_fullx600.jpg" alt="전강좌 10% 할인">
            </div>
        </div>

        <div class="Section3 pb100">
            <div class="widthAuto">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 클립 영상</div>
                <ul class="bestLec">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_hot클립'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_hot클립'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                    {{--
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_01.png" alt="김정한"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_02.png" alt="김경은"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_03.png" alt="황채영"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_04.png" alt="정문진"></a></li>
                    --}}
                </ul>
            </div>

            <div class="widthAuto mt70">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> PD 추천 꿀 Tip</div>
                <ul class="tipLec NSK-Black">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_추천tip'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_추천tip'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                    {{--
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_01.png" alt="김정한"></a>[추천] 김정환 대표</li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_02.png" alt="김경은"></a>[추천] 김경은 대표</li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_03.png" alt="황채영"></a>[추천] 황채영 대표</li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_04.png" alt="정문진"></a>[추천] 정문진 대표</li>
                    --}}
                </ul>
            </div>
        </div>

        <div class="Section mt70 mb70 NSK">
            <div class="widthAuto">
                <div class="willbesNews">
                    <div class="will-listTit NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> 공지사항 <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></div>
                    <ul class="List-Table">
                        @if(empty($data['notice']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['notice'] as $row)
                                <li>
                                    <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <!--willbesNews //-->

                <div class="willbesCenter f_right">
                <h5 class="NSK-Black">서비스 <span class="tx-color">이용안내</span> <span class="tx13 NSK ml20 tx-black">궁금하신 사항에 대해 자세히 알려드립니다.</span></h5>
                <ul>
                    <li>
                        <a href="{{ front_url('/support/faq/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                            <div class="nTxt">자주하는 질문</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/mobile/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                            <div class="nTxt">모바일 서비스</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/qna/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                            <div class="nTxt">동영상 상담실</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/remote/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                            <div class="nTxt">1:1 고객지원</div>
                        </a>
                    </li>
                </ul>
                <div class="tel">
                    수강문의 전화 <span class="NSK-Black tx-color ml10">1544-5006</span><br>
                    운영시간 평일 <span class="NSK-Black tx-color ml10">09시~18시 (점심시간 12시~1시)  주말/공휴일 휴무</span>
                </div>
            </div> 
            </div>
        </div>

    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

<script>
    function popup(){
            var url = "https://www.youtube.com/embed/sBGMUCaAq6k";
            var name = "Njob";

            var _width = '650';
            var _height = '380';
            
            // 팝업을 가운데 위치시키기 위해 아래와 같이 값 구하기
            var _left = Math.ceil(( screen.width - _width )/2);
            var _top = Math.ceil(( screen.height - _height )/2); 
        
            window.open(url, name, 'width='+ _width +', height='+ _height +', left=' + _left + ', top='+ _top );
        }
</script>



@stop