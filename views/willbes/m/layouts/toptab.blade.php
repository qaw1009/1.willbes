{{-- 온라인/학원실강 탭 --}}
@if($__cfg['SiteGroupCode'] == '1002' && $__cfg['CateCode'] != '3035' && $__cfg['CateCode'] != '3103')
    {{-- 사이트그룹이 공무원이면서 법원직이 아닐 경우, 7급 PSAT 아닐 경우 --}}
    <div class="tab-onoff">
        <ul>
            <li><a href="{{ front_url('/intro/index', false, true) }}" class="@if($__cfg['IsPassSite'] === false) on @endif">온라인(메인)</a></li>
            <li><a href="{{ front_url('/home/index', true) }}" class="@if($__cfg['IsPassSite'] === true) on @endif">학원실강</a></li>
        </ul>
    </div>
@endif
