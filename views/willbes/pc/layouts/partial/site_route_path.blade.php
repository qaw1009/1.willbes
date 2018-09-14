@if($__cfg['SiteCode'] == config_item('app_intg_site_code'))
    @php $_active_menu = $__cfg['GNBMenu']['ActiveMenu'] @endphp
@else
    @php $_active_menu = $__cfg['SiteMenu']['ActiveMenu'] @endphp
@endif

@if(starts_with(element('MenuType', $_active_menu), 'P') === true)
    @php $_url_route_names = element('UrlRouteNames', $_active_menu) @endphp
@else
    @php $_url_route_names = array_slice(element('UrlRouteNames', $_active_menu, []), 2) @endphp
@endif

@if(empty($_url_route_names) === false)
    <a href="{{ site_url($__cfg['PassSiteVal'] . '/home/index/cate/' . $__cfg['CateCode']) }}"><img src="{{ img_url('sub/icon_home.gif') }}"></a>
    @foreach($_url_route_names as $idx => $route_name)
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ $route_name }}</strong></span>
    @endforeach
@endif