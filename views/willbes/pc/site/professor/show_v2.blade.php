@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ rawurldecode(element('subject_name', $arr_input, '')) }}</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ $data['ProfNickName'] }} {{$data['AppellationCcdName']}}</strong></span>
    </div>
    <!-- left nav -->
    <div class="Lnb NG">
        <h2>교수진 소개</h2>
        @include('willbes.pc.site.professor.lnb_menu_partial')
    </div>
    <div class="Content p_re ml20 NG">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <!-- willbes-Prof-Tabs -->
        <div class="willbes-Prof-Tabs">
            <div class="ProfDetailWrap">
                <a name="tabLink"></a>
                <ul class="tabWrap tabDepthProf tabDepthProf_6">
                    <li><a href="#none" id="hover_pack_lecture" onclick="goTabUrl('tab', 'pack_lecture');">패키지강의</a></li>
                    <li><a href="#none" id="hover_only_lecture" onclick="goTabUrl('tab', 'only_lecture');">단과강의</a></li>
                    <li><a href="#none" id="hover_live_lecture" onclick="goTabUrl('tab', 'live_lecture');">전국 라이브 영상반</a></li>
                    <li><a href="#none" id="hover_special_lecture" onclick="goTabUrl('tab', 'special_lecture');">특강</a></li>
                    <li><a href="#none" id="hover_before_lecture" onclick="goTabUrl('tab', 'before_lecture');">수강생 전용</a></li>
                    <li><a href="#none" id="hover_book" onclick="goTabUrl('tab', 'book');">교재</a></li>
                </ul>
                <div class="tabBox">
                    <div id="{{ $arr_input['tab'] }}" class="tabLink">
                        {{--@include('willbes.pc.site.professor.tab_' . $arr_input['tab'] . '_partial')--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- // willbes-Prof-Tabs -->
    </div>
</div>
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        @if($is_tab_select === true)
            // 선택된 탭이 있을 경우 자동 스크롤
            $("html, body").animate({ scrollTop: $('a[name="tabLink"]').offset().top }, 0);
        @endif

        $(function() {
            $('.willbes-Prof-Tabs .tabWrap li a').removeClass('on');
            $('.willbes-Prof-Tabs .tabWrap #hover_{{ $arr_input['tab'] }}').addClass('on');
            $('.willbes-Prof-Tabs .tabBox .tabLink').css('display', 'block');
        });

        // 수강후기 레이어팝업
        $('.btn-study').click(function () {
            var ele_id = 'WrapReply';
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : 'off',
                'cate_code' : '{{$def_cate_code}}',
                'prof_idx' : '{{$prof_idx}}',
                'board_idx' : $(this).data('board-idx'),
                'subject_idx' : '{{$arr_input['subject_idx']}}'
            };
            sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });
    });

    // 메인 탭 클릭
    function goTabUrl(key, val) {
        removeFormInput('#url_form', 'cate_code,subject_idx,subject_name,tab');
        goUrl(key, val);
    }
</script>
@stop
