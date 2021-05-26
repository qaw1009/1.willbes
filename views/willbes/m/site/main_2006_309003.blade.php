@extends('willbes.m.layouts.master')

@section('content')
    <div id="Container" class="Container NSK mb40">
        {{-- top menu --}}
        @include('willbes.m.site.main_partial.topmenu_'.$__cfg['SiteCode'])

        {!! banner('M_메인', 'MainSlider', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

        <div class="bnSec02">
            <ul>
                <li>
                    {!! banner('M_메인서브1', 'MainSlider', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
                </li>
                <li>
                    {!! banner('M_메인서브2', 'MainSlider', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
                </li>
                <li>
                    {!! banner('M_메인서브3', 'MainSlider', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
                </li>
            </ul>
        </div>

        <div class="noticeTabs c_both">
            @include('willbes.m.site.main_partial.board_'.$__cfg['SiteCode'])
        </div>

        <div class="mSubTit NSK-Black" >윌비스 한림법학원 <span>이달의 강의</span></div>
        <div class="thisMonth">
            <div class="swiper-container-lec">
                <div class="swiper-wrapper">
                    @if(!empty($data['best_product']))
                        @foreach($data['best_product'] as $row)
                            <div class="swiper-slide">
                                <a href="{{front_url('/lecture/show/pattern/only/cate/'.$row['CateCode'].'/prod-code/'.$row['ProdCode'])}}">
                                    <img src="{{$row['ProfIndexImg'] or ''}}" alt="{{$row['ProfNickName']}}">
                                    <div>
                                        <span>{{$row['ProfNickName']}}</span>
                                        {{$row['SubjectName']}}<br>
                                        {{$row['CourseName']}}
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

        <div class="mSubTit NSK-Black mt30" >윌비스 <span>대표 강의 맛보기</span></div>
        <div class="sampleView">
            <div class="overhidden">
                <div class="swiper-container-view">
                    <div class="swiper-wrapper">
                        @if(!empty($data['new_product']))
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
                        @endif
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        {{-- 합격 로드맵 --}}
        @include('willbes.m.site.main_partial.loadmap_'.$__cfg['SiteCode'].'_'.$__cfg['CateCode'])

        {{-- cs box --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script type="text/javascript">
        $(function() {
            // 이달의강의
            new Swiper ('.swiper-container-Lec', {
                slidesPerView: 'auto',
                spaceBetween: 7, 
                slidesPerGroup: 2,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: { 
                    el: '.swiper-pagination', 
                    type: 'fraction', 
                }, 
            }); 

            // 맛보기강의
            new Swiper('.swiper-container-view', {
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

            // 로드맵
            $('.loadMap .lmTitle a').click(function() {
                var $loadmap_table = $(this).parents('.loadMap li').find('.lmCts');
                if ($loadmap_table.is(':hidden')) {
                    $loadmap_table.show().css('display','block');
                    $(this).css('background-image','url("/public/img/willbes/m/main/icon_arr_bottom.png")');
                } else {
                    $loadmap_table.hide().css('display','none');
                    $(this).css('background-image','url("/public/img/willbes/m/main/icon_arr_top.png")');
                }
            });
        });
    </script>
@stop
