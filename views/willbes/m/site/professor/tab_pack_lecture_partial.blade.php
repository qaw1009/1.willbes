{{--하위탭 리스트--}}
@include('willbes.m.site.professor.stab_partial')

@if($arr_input['tab'] == 'on_pack_lecture')
    {{--온라인패키지--}}
    <div class="lineTabs lecListTabs c_both pd-zero" id="on_pack_lecture">
        @include('willbes.m.site.professor.stab_on_pack_lecture_partial', ['tab_data_key' => 'on_pack_lecture'])
    </div>
@endif

@if($arr_input['tab'] == 'off_pack_lecture')
    {{--학원종합반--}}
    <div class="lineTabs lecListTabs c_both pd-zero" id="off_pack_lecture">
        @include('willbes.m.site.professor.stab_off_pack_lecture_partial', ['tab_data_key' => 'off_pack_lecture'])
    </div>
@endif
