<div class="profLecTab">
    <ul class="tabWrap two">
        <li><a href="#off_only_lecture" class="on">단과</a></li>
        <li><a href="#off_pack_lecture">종합반</a></li>
    </ul>
</div>

{{--단과--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="off_only_lecture">
    @include('willbes.m.site.professor.stab_off_only_lecture_partial', ['tab_data_key' => 'off_lecture'])
</div>

{{--종합반--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="off_pack_lecture">
    @include('willbes.m.site.professor.stab_off_pack_lecture_partial', ['tab_data_key' => 'off_pack_lecture'])
</div>
