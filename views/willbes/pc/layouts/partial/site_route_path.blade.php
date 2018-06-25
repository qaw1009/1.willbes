<img src="{{ img_url('sub/icon_home.gif') }}">
@if(isset($__cfg['SiteActiveMenu']['UrlRouteNames'][2]) === true)
    @foreach(array_slice($__cfg['SiteActiveMenu']['UrlRouteNames'], 2) as $idx => $route_name)
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ $route_name }}</strong></span>
    @endforeach
@endif