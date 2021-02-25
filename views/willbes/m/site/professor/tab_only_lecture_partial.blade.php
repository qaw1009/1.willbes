{{--하위탭 리스트--}}
@include('willbes.m.site.professor.stab_partial')

@if($arr_input['tab'] == 'on_only_lecture')
    {{--온라인단강좌--}}
    <div class="lineTabs lecListTabs c_both pd-zero" id="on_only_lecture">
        @include('willbes.m.site.professor.stab_on_only_lecture_partial', ['tab_data_key' => 'on_lecture'])
    </div>
@endif

@if($arr_input['tab'] == 'off_only_lecture')
    {{--학원단과--}}
    <div class="lineTabs lecListTabs c_both pd-zero" id="off_only_lecture">
        @include('willbes.m.site.professor.stab_off_only_lecture_partial', ['tab_data_key' => 'off_lecture'])
    </div>
@endif
