@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    @include('willbes.pc.layouts.partial.site_tab_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>

    <div class="Content p_re">
        <div class="willbes-Mypage-Tabs mt40">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <div class="pointDetailWrap p_re">
                <ul class="tabWrap tabDepth4 NG">
                    <li><a href="#none" id="hover_counsel">1:1상담 <!--({{$count_complete_type['counsel']['not_complete']}})--></a></li>
                    <li><a href="#none" id="hover_professor">학습Q&A <!--({{$count_complete_type['professor']['not_complete']}})--></a></li>
                </ul>

                <div class="tabBox mt40" class="tabLink">
                    @include('willbes.pc.classroom.qna.tab_' . $arr_input['tab'] . '_partial')
                </div>
            </div>
        </div>
    </div>
    {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    {{--<div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>--}}
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('.pointDetailWrap .tabWrap li a').removeClass('on');
            $('.pointDetailWrap .tabWrap #hover_{{ $arr_input['tab'] }}').addClass('on');
            $('.pointDetailWrap .tabBox .tabLink').css('display', 'block');
        });

        $('#hover_counsel').click(function (){
            location.href='{{ site_url("/classroom/qna/index?tab=counsel") }}';
        });

        $('#hover_professor').click(function (){
            location.href='{{ site_url("/classroom/profQna/index?tab=professor") }}';
        });
    });
</script>
@stop