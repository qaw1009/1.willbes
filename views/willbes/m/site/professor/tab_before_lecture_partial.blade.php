{{--하위탭 리스트--}}
@include('willbes.m.site.professor.stab_partial')

{{--온라인단강좌--}}
<div class="lineTabs lecListTabs c_both pd-zero">
    @include('willbes.m.site.professor.stab_on_only_lecture_partial', ['tab_data_key' => 'on_lecture_before'])
</div>
