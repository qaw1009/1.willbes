<ul class="tabWrap lineWrap rowlineWrap lecListWrap three mt-zero">
    <li><a href="#on_only_lecture" class="on">단과강좌</a><span class="row-line">|</span></li>
    <li><a href="#on_pack_normal">추천패키지</a><span class="row-line">|</span></li>
    <li><a href="#on_pack_choice">선택패키지</a></li>
</ul>

{{--단과강좌--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="on_only_lecture">
    @include('willbes.m.site.professor.stab_on_only_lecture_partial', ['tab_data_key' => 'on_lecture'])
</div>

{{--추천패키지--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="on_pack_normal">
    @include('willbes.m.site.professor.stab_on_pack_lecture_partial', ['tab_data_key' => 'on_pack_normal'])
</div>

{{--선택패키지--}}
<div class="lineTabs lecListTabs c_both pd-zero" id="on_pack_choice">
    @include('willbes.m.site.professor.stab_on_pack_lecture_partial', ['tab_data_key' => 'on_pack_choice'])
</div>
