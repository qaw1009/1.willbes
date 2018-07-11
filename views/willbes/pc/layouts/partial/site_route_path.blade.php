@if(isset($__cfg['SiteActiveMenu']['UrlRouteNames'][2]) === true)
    <a href="{{ site_url($__cfg['PassSiteVal'] . '/home/index/cate/' . $__cfg['CateCode']) }}"><img src="{{ img_url('sub/icon_home.gif') }}"></a>
    @foreach(array_slice($__cfg['SiteActiveMenu']['UrlRouteNames'], 2) as $idx => $route_name)
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ $route_name }}</strong></span>
    @endforeach
@endif