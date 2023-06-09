@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NSK gosi mb40">

        <div class="gosiTitle NSK">
            윌비스공무원학원 <span class="NSK-Black">직렬별 개강 시리즈</span>
        </div>

        {!! banner('M_메인빅배너', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        <div class="gosiSecBn01 mt20">
            <ul>
                <li class="f_left">
                    {!! banner('M_메인서브1', 'MainSlider', $__cfg['SiteCode'], '0') !!}
                </li>
                <li class="f_right">
                    {!! banner('M_메인서브2', 'MainSlider', $__cfg['SiteCode'], '0') !!}
                </li>
            </ul>
        </div>

        <div class="gosiTitle NSK">
            윌비스 교수진 <span class="NSK-Black">신규개강</span> 안내
        </div>

        {!! banner('M_메인서브3', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        <div class="gosiTitle NSK">
            합격을 책임질 <span class="NSK-Black">윌비스 교수진</span>
        </div>

        <div class="gosiProf">
            {!! banner('M_메인_교수진', 'swiper-container-prof', $__cfg['SiteCode'], '0') !!}
        </div>

        <div class="gosiTitle NSK">
            윌비스 공무원학원 <span class="NSK-Black">캠퍼스</span>
            <a name="map_campus"></a>
        </div>

        @if(empty($data['arr_campus_info']) === false)
            <div class="campus">
                <ul class="tabWrap">
                    @foreach($data['arr_campus_info'] as $campus_ccd => $row)
                        <li><a href="#map{{ $loop->index }}">{{$row['CampusReName']}}</a></li>
                    @endforeach
                    <li><a href="#map{{ count($data['arr_campus_info']) + 1 }}">가산(서울)</a></li>
                </ul>
                <div class="mapCts">
                    @foreach($data['arr_campus_info'] as $campus_ccd => $row)
                        <div id="map{{ $loop->index }}">
                            <div><img src="{{$row['Info'][0]['MapPath']}}" alt="{{$row['Info'][0]['CampusDispName']}}"></div>
                            @if($campus_ccd == '605001')
                                <div class="add">
                                    @if(empty($row['Info'][0]['Addr1']) === false)
                                        <p>[9급/기술직] {{$row['Info'][0]['Addr1']}}</p>
                                    @endif
                                    @if(empty($row['Info'][0]['Addr2']) === false)
                                        <p>[소방/기술직] {{$row['Info'][0]['Addr2']}}</p>
                                    @endif
                                    @if(empty($row['Info'][0]['Addr3']) === false)
                                        <p>[법원/검찰직] {{$row['Info'][0]['Addr3']}}</p>
                                    @endif
                                    <p>{{$row['Info'][0]['Tel']}}</p>
                                    <a href="{{front_url('/support/qna/create?s_campus='.$campus_ccd)}}">상담신청 ></a>
                                </div>
                            @else
                                <div class="add">
                                    {{$row['Info'][0]['Addr1'] . $row['Info'][0]['Addr2']}} <span>ㅣ</span> <br>
                                    {{$row['Info'][0]['Tel']}}
                                    <a href="{{front_url('/support/qna/create?s_campus='.$campus_ccd)}}">상담신청 ></a>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <div id="map{{ count($data['arr_campus_info']) + 1 }}">
                        <div><img src="https://static.willbes.net/public/images/willbes/gosi_acad/map/mapSeoulGasan.jpg"></div>
                        <div class="add">
                            <p>[9급/기술직] 서울 금천구 벚꽃로 298(대륭포스트타워6차) 707호</p>
                            <p>[소방/기술직] 서울 동작구 만양로 105 한성빌딩 2층</p>
                            <p>[법원/검찰직] 서울 동작구 노량진로 196 JH빌딩 7층</p>
                            <p>[연락처] 1544-0330</p>
                            <a href="#none">상담신청 ></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="noticeTabs c_both mt30">
            {{-- 게시판 --}}
            @include('willbes.m.site.main_partial.board_'.$__cfg['SiteCode'])
        </div>

        {{-- 고객센터 --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            // 교수진
            new Swiper('.swiper-container-prof', {
                slidesPerView: 'auto',
                slidesPerColumn: 2,
                spaceBetween: 30,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, // 3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        spaceBetween: 10,
                    },
                }
            });

            // 수험생활 팁
            new Swiper('.swiper-container-tip', {
                slidesPerView: 'auto',
                spaceBetween: 5,
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