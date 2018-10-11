@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Mypage-SUPPORTZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 상담내역
                </div>
            </div>
        </div>

        <div class="willbes-Mypage-Tabs mt40">
            <div class="pointDetailWrap p_re">
                <ul class="tabWrap tabDepth4 NG">
                    <li><a href="#point1">1:1상담 (1)</a></li>
                    <li><a href="#point2">학습Q&A(2)</a></li>
                </ul>

                <div class="tabBox mt40">
                    @include('willbes.pc.classroom.qna.tab_' . $arr_input['tab'] . '_partial')
                </div>
            </div>
        </div>
    </div>
@stop