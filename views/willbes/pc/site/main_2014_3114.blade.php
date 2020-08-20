@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="Container njob2 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        {{--
        <div class="Section Section0">
            <div class="widthAuto">
                <a href="javascript:popup()" ><img src="https://static.willbes.net/public/images/promotion/main/3114_fullx110.gif" alt="1억뷰 N잡"></a>
            </div>
        </div>
        --}}

        <div class="Section1 p_re mt20">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section4">
            <div class="widthAuto">
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1626"><img src="https://static.willbes.net/public/images/promotion/main/2014/3114_1120x110.gif" alt="헤드라인 뉴스"></a>
            </div>
        </div>

        <div class="Section NSK mt70">
            <div class="widthAuto">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 인기강좌</div>
                <ul class="bestLec">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_hot인기강좌'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_hot인기강좌'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NSK mt70">
            <div class="widthAuto">
                <div class="will-listTi NSK-Black">
                    <img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> 신규강좌
                    {{--<span>사전 예약시 수강기간 1년 + 20% 할인권 증정</span>--}}
                </div>
                <ul class="bestLec">
                    @for($i=1; $i<=8; $i++)
                        @if(isset($data['arr_main_banner']['메인_신규강좌'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_신규강좌'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section2 mt70">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2014/3114_fullx1190.gif" alt="전강좌 10% 할인">
            </div>
        </div>

        <div class="Section3 pb100">
            <div class="widthAuto">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 클립 영상</div>
                <ul class="bestLec">
                    @for($i=1; $i<=8; $i++)
                        @if(isset($data['arr_main_banner']['메인_hot클립'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_hot클립'.$i]) !!}
                            </li>
                        @endif
                    @endfor
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
                </ul>
            </div>
        </div>

        <div class="Section mb70 NSK">
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

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
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