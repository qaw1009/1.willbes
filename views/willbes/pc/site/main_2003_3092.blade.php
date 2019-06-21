@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container gosi NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt20 mb90">
            <div class="widthAuto">
                공무원 무료강좌 샘플 페이지
            </div>
        </div>
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
