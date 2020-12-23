@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/2002_supporters.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <div class="p_re evtContent NGR" id="evtContainer">
        {{--<div class="jumpMenu">
            {{ $data['SupportersYear'] }}년 {{ $data['SupportersNumber'] }}기
        </div>--}}
        <div class="evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top_bg_2020.jpg" title="광은 서포터즈">
            <div class="notice">
                <div class="title">
                    <a href="javascript:go_popup('', '{{ $data['SupportersIdx'] }}');"><img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top_img01.png" title="공지사항 더보기"></a>
                </div>
                <ul class="list">
                    @if(empty($arr_base['notice_list']) === true)
                        <li>등록된 내용이 없습니다.</li>
                    @endif
                    @foreach($arr_base['notice_list'] as $row)
                        <li><a href="javascript:go_popup('{{ $row['BoardIdx'] }}', '{{ $row['SupportersIdx'] }}');">{{ $row['Title'] }}</a><span>{{ $row['RegDatm'] }}</span></li>
                    @endforeach
                </ul>
            </div>            
        </div>

        <div class="evt01">
            <ul class="tab NSK-Black">
                <li><a href="#tab01"><span>서포터즈 소개<span></a></li>
                <li><a href="#tab02"><span>과제수행<span></a></li>
                <li><a href="#tab03"><span>제안 및 의견<span></a></li>
                <li><a href="#tab04"><span>명예의 전당<span></a></li>
            </ul> 
            <div class="evtCtsBox">
                <div id="tab01" class="evtCts tx-center">
                    <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_tab01.jpg" title="광은 서포터즈">
                </div>

                <div id="tab02" class="evtCts">
                    @include('willbes.pc.site.supporters.home_assignment_partial')
                </div>

                <div id="tab03" class="evtCts">
                    @include('willbes.pc.site.supporters.home_suggest_partial')
                </div>

                <div id="tab04" class="evtCts">
                    @include('willbes.pc.site.supporters.home_member_partial')
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    {{--공지사항 레이어팝업--}}
    <div id="popup" class="Pstyle NGR">
        <div id="supporters_notice"></div>
    </div>

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})}
            )}
        );

        function go_popup(obj1, obj2) {
            var ele_id = 'supporters_notice';
            var data = {
                'ele_id' : ele_id,
                'board_idx' : obj1,
                'supporters_idx' : obj2
            };
            sendAjax('{{ front_url('/supporters/notice/index') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                $('#popup').bPopup();
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop