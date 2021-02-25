{{--하위탭 리스트--}}
@include('willbes.m.site.professor.stab_partial')

{{--학원단과--}}
<div class="lineTabs lecListTabs c_both pd-zero">
    @include('willbes.m.site.professor.stab_off_only_lecture_partial', ['tab_data_key' => 'off_lecture'])
</div>
