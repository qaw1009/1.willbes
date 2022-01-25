{{-- 온라인/학원실강 탭 --}}
@if($__cfg['SiteGroupCode'] == '1002' && (isset($data['toptab_menu_exclude']) === true && in_array($__cfg['CateCode'],$data['toptab_menu_exclude']) === false))
    <div class="tab-onoff">
        <ul>
            <li><a href="{{ front_url('/intro/index', false, true) }}" class="@if($__cfg['IsPassSite'] === false) on @endif">온라인(메인)</a></li>
            <li><a href="{{ front_url('/home/index', true) }}" class="@if($__cfg['IsPassSite'] === true) on @endif">학원실강</a></li>
        </ul>
    </div>
@endif