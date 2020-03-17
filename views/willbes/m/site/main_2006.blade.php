@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both mb20">
        {!! banner('M_메인_01', 'MainSlider c_both', $__cfg['SiteCode'], '0') !!}
        <div class="MainFixBnr c_both">
            <ul>
                <li>{!! banner('M_메인_02_01', '', $__cfg['SiteCode'], '0') !!}</li>
                <li>{!! banner('M_메인_02_02', '', $__cfg['SiteCode'], '0') !!}</li>
            </ul>
        </div>
        {!! banner('M_메인_03', 'MainBnrSlider', $__cfg['SiteCode'], '0') !!}        

        <div class="gosibtns">
            <ul>
                <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/80') }}" target="_blank">강의시간표</a></li>
                <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/109') }}" target="_blank">강의계획서</a></li>
                <li><a href="{{ site_url('/m/lecture/index/pattern/free') }}" target="_blank">학원보강</a></li>
            </ul>
        </div>

        <div class="line">-</div>

        <div class="buttonTabs noticeTabs c_both">
            {{-- board include --}}
            @include('willbes.m.site.main_partial.board')
        </div>
        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
@stop