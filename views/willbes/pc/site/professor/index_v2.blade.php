@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <!-- left nav -->
    <div class="Lnb NG">
        @include('willbes.pc.site.professor.lnb_menu_partial_v2')
    </div>
    <div class="Content p_re ml20">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        {{-- 카테고리별 교수 리스트 --}}
        @foreach($data['group'] as $group_code => $group_name)
        <div class="willbes-Prof-List NG c_both">
            <div class="willbes-Prof-Subject tx-dark-black{{ $loop->index == 1 ? ' pt-zero' : '' }}">· {{ $group_name }}</div>
            <!-- willbes-Prof-Subject -->
            <ul class="profGrid">
            {{-- 교수 리스트 loop --}}
            @foreach($data['list'][$group_code] as $idx => $row)
                <li class="profList">
                    <a class="profBox" href="{{ front_url('/professor/show/prof-idx/' . $row['ProfIdx'] . '?cate_code=' . $row['CateCode'] . '&subject_idx=' . $row['SubjectIdx'] . '&subject_name=' . rawurlencode($row['SubjectName'])) }}">
                        @if(empty($row['ProfEventData']) === false)
                            <a href="{{ $row['ProfEventData']['Link'] }}"><img class="Evt" src="{{ img_url('prof/icon_event.gif') }}"></a>
                        @endif
                        <div class="Obj">{!! $row['ProfSlogan'] !!}</div>
                        <div class="Name">
                            <strong>{{ $row['ProfNickName'] }}</strong><br/>
                            {{ $row['AppellationCcdName'] }}
                            @if($row['IsNew'] == 'Y') <img class="N" src="{{ img_url('prof/icon_N.gif') }}"> @endif
                        </div>
                        <img class="profImg" src="{{ $row['ProfReferData']['prof_index_img'] or '' }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none" onclick="{{ empty($row['ProfReferData']['ot_url']) === false ? 'fnPlayerProf(\'' . $row['ProfIdx'] . '\', \'OT\');' : 'alert(\'등록된 대표강의가 없습니다.\');' }}">대표강의</a></dt>
                            <dt><a href="#none" class="btn-prof-profile" data-group-code="{{ $group_code }}" data-prof-idx="{{ $row['ProfIdx'] }}">프로필</a></dt>
                        </dl>
                    </div>
                    <div id="ProfileWrap{{ $group_code . '' . $row['ProfIdx'] }}"></div>
                </li>
            @endforeach
            </ul>
        </div>
        @endforeach
        <!-- willbes-Prof-List -->
    </div>
</div>
{!! popup('657003') !!}
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        // 프로필 버튼 클릭
        $('.profList').on('click', '.btn-prof-profile', function() {
            var $prof_idx = $(this).data('prof-idx');
            var ele_id = $(this).data('group-code') + '' + $prof_idx;
            var data = { 'ele_id' : ele_id };

            sendAjax('{{ front_url('/professor/profile/prof-idx/') }}' + $prof_idx, data, function(ret) {
                $('#ProfileWrap' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showError, false, 'GET', 'html');

            openWin('LayerProfile' + ele_id);
            openWin('Profile' + ele_id);
        });
    });
</script>
@stop
