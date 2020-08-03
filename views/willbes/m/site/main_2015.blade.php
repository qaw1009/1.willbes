@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both mb20">
        {!! banner('M_메인_01', 'MainSlider c_both', $__cfg['SiteCode'], '0') !!}
        {!! banner('M_메인_02', 'MainSlider c_both mt20', $__cfg['SiteCode'], '0') !!}

        <div class="buttonTabs noticeTabs c_both">
            {{-- board include --}}
            @include('willbes.m.site.main_partial.board')
        </div>

        <div class="bannerSec01">
            {!! banner('M_메인_03', null, $__cfg['SiteCode'], '0') !!}
        </div>

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
@stop