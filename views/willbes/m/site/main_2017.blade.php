@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NSK ssam mb40">
        {!! banner('M_메인', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        {{-- 수강후기 --}}
        @include('willbes.m.site.main_partial.study_comment_' . $__cfg['SiteCode'])

        <div class="noticeTabs c_both mt30">
            {{-- 게시판 --}}
            @include('willbes.m.site.main_partial.board')
        </div>

        @if(empty($data['top_order_lecture']) === false)
            <div class="mainTit NSK-Black tx-center">
                윌비스 임용 <span class="tx-main">실시간 인기강의 TOP3</span>
            </div>
            <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
            <ul class="bestLecBox">
                @foreach($data['top_order_lecture'] as $key => $row)
                    <li class="bestLec">
                        <a href="{{ site_url('/m/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode']) }}">
                            <ul class="lecinfo">
                                <li class="NSK-Black"><span class="NSK">{{ $row['ProdCateName'] }}</span>{{ $row['ProfNickNameAppellation'] }}</li>
                                <li><strong>{{ $row['CourseName'] }}</strong></li>
                            </ul>
                        </a>
                        <div class="profImg"><img src="{{ $row['ProfImgPathM'] }}" title="{{ $row['ProfNickNameAppellation'] }}"></div>
                        <div class="best NSK-Black">{{ $key + 1 }}</div>
                    </li>
                @endforeach
            </ul>
        @endif

        @if(empty($data['new_product']) === false)
            <div class="mainTit NSK-Black  tx-center mt30" >윌비스 임용 <span class="tx-main">대표 강의 맛보기</span></div>
            <div class="sampleView">
                <div class="overhidden">
                    <div class="swiper-container-view">
                        <div class="swiper-wrapper">
                            @foreach($data['new_product'] as $row)
                                @php
                                    $sample_info = [];
                                    if($row['LectureSamplewUnit'] !== 'N') {
                                        $sample_info = json_decode($row['LectureSamplewUnit'], true);
                                    }
                                @endphp
                                <div class="swiper-slide">
                                    @if(!empty($sample_info[0]['wUnitIdx']))
                                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row["ProdCode"]}}&u={{$sample_info[0]["wUnitIdx"]}}&q={{$sample_info[0]["wHD"] != '' ? 'HD' : 'SD'}}", "{{config_item('starplayer_license')}}");'>
                                    @else
                                        <a href="javascript:alert('샘플영상 준비중입니다.')">
                                    @endif
                                            <img src="{{$row['ProfLecListImg'] or ''}}" alt="{{$row['ProfNickName']}}">
                                            <div>
                                                {{$row['SubjectName']}}<span></span><strong>{{$row['ProfNickName']}}</strong>
                                                <p>{{$row['ProdName']}}</p>
                                            </div>
                                        </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        @endif

        <div class="mainTit NSK-Black  tx-center mt30" >윌비스 임용 <span class="tx-main">시험 정보</span></div>
        <div class="examInfo mt10">
            <ul>
                <li>
                    <a href="{{front_url('/examInfo/system')}}">
                        <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam01.png">
                        임용가이드
                    </a>
                </li>
                <li>
                    <a href="{{front_url('/examInfo/trend')}}">
                        <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam02.png">
                        최근10년동향
                    </a>
                </li>
                <li>
                    <a href="{{front_url('/examInfo/notice')}}">
                        <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam03.png">
                        지역별공고
                    </a>
                </li>
                <li>
                    <a href="{{front_url('/pass/support/examQuestion/index')}}">
                        <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam04.png">
                        자료실
                    </a>
                </li>
            </ul>
        </div>

        {{-- 고객센터 --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

    </div>
    <!-- End Container -->

    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script>
        $(function() {
            //수강후기
            var swiper_review = new Swiper ('.swiper-container-reply', {
                slidesPerView: 'auto',
                spaceBetween: 0,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            //맛보기강의
            var swiper_lecture = new Swiper('.swiper-container-view', {
                slidesPerView: 1,
                slidesPerColumn: 4,
                spaceBetween: 10,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
@stop