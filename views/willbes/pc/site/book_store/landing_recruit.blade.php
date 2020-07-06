@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <div class="wsBook-Subject tx-dark-black NG">
            · 저자모집
        </div>
        <div><img src="{{ img_static_url('promotion/sub/2012_sub_img01.jpg') }}" alt="윌스토리 저자모집"> </div>
        <div class="wsBook_recruit NG">
            <strong>① 원고 접수</strong>
            - 원고: 양식이나 분량과 상관없이 전체 또는 일부를 첨부하여 메일로 발송<br>
            - 원고 외: 메일 발송 시 간단한 저자 이력 및 해당 원고의 주제 및 분야 <br>
            - 메일주소: yeon0530@willbes.com <br>
            <br>
            <strong>② 출판사 검토</strong>
            - 접수된 원고는 출판사 편집팀에서 검토 후 연락 드립니다. <br>
            <br>
            <strong>③ 저자와 출간 기획 및 도서 출간</strong>
            - 출판이 결정된 원고는 저자와 출간 기획 협의 과정을 거쳐 정식 출간합니다.<br>
        </div>
    </div>

    {{-- 날개 배너 --}}
    {!! banner('교재구매_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}

    {{-- 퀵 메뉴 --}}
    @include('willbes.pc.site.book_store.quick_menu')
</div>
<!-- End Container -->
@stop
