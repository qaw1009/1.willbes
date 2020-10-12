<div class="profLecTab">
    <ul class="tabWrap two">
        <li><a href="#on_pack_lecture" class="on">온라인강좌</a></li>
        <li><a href="#off_pack_lecture">학원강좌</a></li>
    </ul>
</div>

{{--온라인패키지--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="on_pack_lecture">
    @include('willbes.m.site.professor.stab_on_pack_lecture_partial', ['tab_data_key' => 'on_pack_lecture'])
</div>

{{--학원종합반--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="off_pack_lecture">
    @include('willbes.m.site.professor.stab_off_pack_lecture_partial', ['tab_data_key' => 'off_pack_lecture'])
</div>
