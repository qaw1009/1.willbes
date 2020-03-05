@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both mb20">
        <div class="onlecgosi">
            <div>동영상 수강신청 ▼</div>
            <div>
                <a href="{{ front_url('/lecture/index/pattern/only?search_order=course&cate_code=3094') }}">5급행정</a>
                <a href="{{ front_url('/lecture/index/pattern/only?search_order=course&cate_code=3095') }}">국립외교원</a>
                <a href="{{ front_url('/lecture/index/pattern/only?search_order=course&cate_code=3096') }}">PSAT</a>
                <a href="{{ front_url('/lecture/index/pattern/only?search_order=course&cate_code=3097') }}">5급헌법</a>
                <a href="{{ front_url('/lecture/index/pattern/only?search_order=course&cate_code=3098') }}">법원행시</a>
                <a href="{{ front_url('/lecture/index/pattern/only?search_order=course&cate_code=3099') }}">변호사시험</a>
            </div>
        </div>

        {!! banner('M_메인상단', 'MainSlider c_both', $__cfg['SiteCode'], '0') !!}
        <div class="MainFixBnr c_both">
            <ul>
                <li>{!! banner('M_메인서브1', '', $__cfg['SiteCode'], '0') !!}</li>
                <li>{!! banner('M_메인서브2', '', $__cfg['SiteCode'], '0') !!}</li>
            </ul>
        </div>
        {!! banner('M_메인', 'MainSlider swiper-container swiper-container-page c_both', $__cfg['SiteCode'], '0') !!}

        <div class="gosibtns">
            <ul>
                <li><a href="{{ front_app_url('/classroom/on/list/ongoing', 'www') }}">내강의실</a></li>
                <li><a href="{{ site_url('/support/notice/show/cate/3094?board_idx=261349') }}">신규동영상안내</a></li>
                <li><a href="{{ front_url('/lecture/index/pattern/free') }}">무료특강(보강)</a></li>
                <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/80') }}">강의시간표</a></li>
                <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/109') }}">강의계획서</a></li>
                <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/82') }}">강의실배정표</a></li>
            </ul>
        </div>

        <div class="buttonTabs noticeTabs c_both">
            {{-- board include --}}
            @include('willbes.m.site.main_partial.board_off')
        </div>
        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
@stop