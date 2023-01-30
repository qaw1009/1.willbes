@extends('willbes.m.layouts.master')

@section('content')
<style>
    .gosiTitle {
        font-size: 2.2vh;
        text-align: center;
        padding: 7vh 0 2vh;
        word-break: keep-all;
        line-height: 1.2;
    }
    .swiper-sec06-Wrap {
        position: relative;
        overflow: hidden;
        margin-top:7vh;
    }
    .swiper-sec06-Wrap .gosiTitle {
        padding: 0 0 20px;
    }
    .swiper-sec06-Wrap .swiper-wrapper {display: flex; justify-content: space-between; height: auto; margin-left:4%}
    .swiper-sec06-Wrap .swiper-slide {
        width: 208px; align-items: flex-start; margin-right:10px;
    }
    .swiper-sec06-Wrap .swiper-slide:last-child {margin-right:0}
    .swiper-sec06-Wrap .swiper-slide a {
        display: block;
    }
    .swiper-sec06-Wrap .swiper-slide img {
        max-width: 100%;
    }

    .csCenter li {
        width: 50%;
    }
    /* iPhone 5/SE */
    @@media only screen and (max-width: 374px) {
        .swiper-sec06-Wrap .swiper-slide {
            width: 150px; 
        }            
    }
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .swiper-sec06-Wrap .swiper-slide {
            width: 150px; 
        }
    }
</style>
    <!-- Container -->
    <div id="Container" class="Container NG gosi mb40">
        {!! banner('M_메인_01', 'MainSlider c_both', $__cfg['SiteCode'], '0') !!}

        <div class="gosiSecBn01 mt20">
            <ul>
                <li class="f_left">
                    {!! banner('M_메인_서브_1', '', $__cfg['SiteCode'], '0') !!}
                </li>
                <li class="f_right">
                    {!! banner('M_메인_서브_2', 'MainSlider', $__cfg['SiteCode'], '0') !!}
                </li>
            </ul>
        </div>

        <div class="gosiTitle NSK">
            <span class="NSK-Black">신규개강</span> 안내
        </div>
        {!! banner('M_메인_서브_3', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        <div class="swiper-sec06-Wrap">
            <div class="gosiTitle NSK">
                합격을 책임지는 <strong class="NSK-Black">소방대표 교수진</strong>
            </div>
            <div class="swiper-sec06">
                <div class="swiper-wrapper">
                    @if(empty($data['arr_main_banner']['메인_M_교수진']) === false)
                        @foreach($data['arr_main_banner']['메인_M_교수진'] as $key => $row)
                            <div class="swiper-slide">
                                @if(empty($row['LinkUrl']) === true || $row['LinkUrl'] == '#')
                                    <a href="javascript:void(0);">
                                        <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                    </a>
                                @else
                                    <a href="{{front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www')}}" target="_{{$row['LinkType']}}">
                                        <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="gosiTitle NSK">
            윌비스 <span class="NSK-Black">불꽃소방</span> 오시는 길
            <a name="map_campus"></a>
        </div>
        <div class="campus">
            <div class="mapCts">
                @if(empty($data['arr_campus_info']) === false)
                    <div id="map01">
                        <div><img src="{{array_value_first($data['arr_campus_info'])['Info'][0]['MapPath']}}" alt="{{array_value_first($data['arr_campus_info'])['Info'][0]['CampusDispName']}}"></div>
                        <div class="add">
                            <p>{{array_value_first($data['arr_campus_info'])['Info'][0]['Addr1']}}</p>
                            <p>{{array_value_first($data['arr_campus_info'])['Info'][0]['Tel']}}</p>
                            <a href="https://open.kakao.com/o/sYbXiXWe" target="_blank">실시간 상담신청 ></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="noticeTabs c_both mt50">
            {{-- board include --}}
            @include('willbes.m.site.main_partial.board')
        </div>

        {{-- 고객센터 --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->

    <script>   
        //교수진
        var swiper6 = new Swiper('.swiper-sec06', {
        slidesPerView: 'auto',
        slidesPerColumn: 1,
        spaceBetween: 10,
        autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
        });

    </script> 
@stop