@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop2013 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="widthAuto NSK mt30">
                <div class="VisualsubBox">
                    <div class="bSlider">
                        <div class="sliderStopAutoPager">
                            {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section Bnr mt20 mb80">
            <div class="widthAuto">
                <div class="willbes-Bnr">
                    <ul>
                        {!! banner_html(element('메인_띠배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                <div class="will-acadTit"><span class="tx-color">교수별</span> 강좌 추천</div>
                <ul class="PBcts">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진_'.$i]) === true)
                            <li>
                                <div class="bSlider">
                                    <div class="slider">
                                        {!! banner_html($data['arr_main_banner']['메인_교수진_'.$i], 'slider') !!}
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endfor

                </ul>
            </div>
        </div>

        <div class="Section Section1 mt60">
            <div class="widthAuto">
                <div class="noticeTabs acad">
                    <ul class="tabWrap noticeWrap_acad">
                        <li><a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" class="on">학원 공지사항</a></li>
                    </ul>
                    <div class="tabBox noticeBox_acad">
                        <div class="tabContent p_re">
                            <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                @if(empty($data['notice']) === true)
                                    <li>등록된 내용이 없습니다.</li>
                                @else
                                    @foreach($data['notice'] as $row)
                                        <li>
                                            <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                                {{$row['Title']}}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="sliderEvt pick">
                    <div class="will-acadTit">Hot <span class="tx-color">Focus</span></div>
                    <div class="bSlider acad">
                        <div>
                            {!! banner_html($data['arr_main_banner']['메인_핫포커스'], 'slider') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt50 mb50">
            <div class="widthAuto">
                <div class="will-acadTit bdb-black2 mb30">윌비스 <span class="tx-color">경찰간부</span> 학원</div>
                <div class="noticeTabs campus c_both">
                    <div class="tabBox">
                        <div id="campus1" class="tabContent">
                            <div class="map_img">
                                <img src="https://static.willbes.net/public/images/promotion/main/2013_map.jpg" alt="경찰간부학원">
                                <span class="origin">윌비스 한림법학원 경찰간부</span>
                            </div>
                            <div class="campus_info">
                                <dl>
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">경찰간부</span> 학원 오시는 길</div>
                                        <div class="c-info">
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>
                                                서울 관악구 신림로 23길 16 일성트루엘 4층
                                            </span>
                                            </div>
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">1544-1881</span>
                                            </div>
                                        </div>
                                    </dt>
                                </dl>
                                <div class="btn NSK-Black">
                                    <a href="{{front_url('/support/qna/create')}}">1:1 상담신청</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop