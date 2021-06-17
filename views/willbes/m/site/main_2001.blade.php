@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both mb20">
        <div class="gosibtns bdb-none mt0 pb10">
            <ul>
                <li><a href="{{ app_url('/m/classroom/on/list/ongoing', 'www') }}">내강의실</a></li>
                <li><a href="{{ front_url('/lecture/index/pattern/free') }}">무료특강(보강)</a></li>
                <li><a href="{{ front_url('/support/notice/show?board_idx=259726') }}">신규강의안내</a></li>
            </ul>
        </div>
        {!! banner('M_메인_01', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        {!! banner('M_메인서브1', 'MainSlider c_both mt20', $__cfg['SiteCode'], '0') !!}

        {{-- 전문교수진 --}}
        <div class="mSubTit NSK-Black mt40 tx-left">경찰 개편 시험 대비 <span class="tx-blue">전문교수진</span></div>
        <div class="fullImg pl20 pr20">
            <ul>
                <li class="mb10">{!! banner('M_메인_전문교수진1', '', $__cfg['SiteCode'], $__cfg['CateCode']) !!}</li>
                <li class="mb10">{!! banner('M_메인_전문교수진2', '', $__cfg['SiteCode'], $__cfg['CateCode']) !!}</li>
                <li class="mb10">{!! banner('M_메인_전문교수진3', '', $__cfg['SiteCode'], $__cfg['CateCode']) !!}</li>
                <li>{!! banner('M_메인_전문교수진4', '', $__cfg['SiteCode'], $__cfg['CateCode']) !!}</li>
            </ul>
        </div>

        {{-- 경찰 캐스트 --}}
        <div class="mSubTit NSK-Black mt40 tx-left">윌비스 <span class="tx-blue">경찰 케스트</span></div>
        <div class="cast">
            {!! banner('M_메인_cast', 'swiper-container-lec', $__cfg['SiteCode'], '0') !!}
        </div>

        {{-- 베스트 강좌 --}}
        <div class="mSubTit NSK-Black mt40 tx-left" >신광은 경찰 <span class="tx-blue">베스트 강좌</span></div>
        <div class="bestView">
            <div class="overhidden">
                <div class="swiper-container-view">
                    <div class="swiper-wrapper">
                        @if(!empty($data['best_product']))
                            @foreach($data['best_product'] as $row)
                                <div class="swiper-slide">
                                    <a href="{{front_url('/lecture/show/pattern/only/cate/'.$row['CateCode'].'/prod-code/'.$row['ProdCode'])}}">
                                        <img src="{{$row['ProfLecListImg'] or ''}}" alt="{{$row['ProfNickName']}}">
                                        <div>
                                            {{$row['CourseName']}}
                                            <p>{{$row['ProdName']}}</p>
                                            <span>신청하기 ></span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        <div class="noticeTabs c_both">
            <ul class="tabWrap mainTab">
                <li><a href="#notice1" class="on">공지사항</a></li>
                <li><a href="#notice2">시험공고</a></li>
                <li><a href="#notice3">수험뉴스</a></li>
            </ul>
            <div class="tabBox buttonBox noticeBox">
                <div id="notice1" class="tabContent pd20">
                    <div class="moreBtn"><a href="{{front_url('/support/notice/index')}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['notice']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['notice'] as $row)
                                <li>
                                    <a href="{{front_url('/support/notice/show?board_idx='.$row['BoardIdx'])}}">
                                        @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div id="notice2" class="tabContent pd20">
                    <div class="moreBtn"><a href="{{front_url('/support/examAnnouncement/index')}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['exam_announcement']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['exam_announcement'] as $row)
                                <li>
                                    <a href="{{front_url('/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                        @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div id="notice3" class="tabContent pd20">
                    <div class="moreBtn"><a href="{{front_url('/support/examNews/index')}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['exam_news']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['exam_news'] as $row)
                                <li>
                                    <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                        @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="bannerSec01">
            {!! banner('M_메인서브2', '', $__cfg['SiteCode'], '0') !!}
        </div>

        {!! banner('M_메인서브3', 'MainSlider c_both mt20', $__cfg['SiteCode'], '0') !!}

        <div class="appPlayer mt20">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            // 경찰케스트
            new Swiper('.swiper-container-lec', {
                slidesPerView: 'auto',
                spaceBetween: 2,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, // 3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            // 베스트강의
            new Swiper('.swiper-container-view', {
                slidesPerView: 1,
                slidesPerColumn: 4,
                spaceBetween: 10,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, // 3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
@stop