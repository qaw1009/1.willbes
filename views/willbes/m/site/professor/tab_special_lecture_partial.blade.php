<div class="profLecTab">
    <ul class="tabWrap two">
        <li><a href="#on_special_lecture" class="on">온라인강좌</a></li>
        <li><a href="#off_special_lecture">학원강좌</a></li>
    </ul>
</div>

{{--온라인단강좌--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="on_special_lecture">
    @include('willbes.m.site.professor.stab_on_only_lecture_partial', ['tab_data_key' => 'on_lecture'])
</div>

{{--학원단과--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="off_special_lecture">
    @include('willbes.m.site.professor.stab_off_only_lecture_partial', ['tab_data_key' => 'off_lecture'])
</div>
