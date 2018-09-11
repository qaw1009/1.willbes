@if(empty($__cfg['TabMenu']['TreeMenu']) === false)
<div class="Menu NSK c_both">
    <h3>
        <ul class="menu-List menu-List-Center @if($__cfg['TabMenu']['ActiveMenu']['MenuType'] == 'PS') cscenter @endif">
            @foreach($__cfg["TabMenu"]["TreeMenu"] as $top_row)
            <li>
                <a href="{{$top_row['MenuUrl']}}">{{$top_row['MenuName']}} HOME</a>
            </li>
                @if(empty($top_row["Children"]) === false)
                    @foreach($top_row["Children"] as $menu_row)
                        @if(empty($menu_row["Children"]) === false)
                            <li class="dropdown">
                                <a href="{{$menu_row['MenuUrl']}}">{{$menu_row['MenuName']}}</a>
                                <div class="drop-Box list-drop-Box">
                                    <ul>
                                        <li class="Tit">{{$menu_row['MenuName']}}</li>
                                        @foreach($menu_row["Children"] as $sub_row)
                                            <li><a href="{{ $sub_row['MenuUrl'] }}">{{$sub_row["MenuName"]}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="{{ $menu_row['MenuUrl']}}">{{$menu_row['MenuName']}}</a>
                            </li>
                        @endif

                    @endforeach
                @endif
            @endforeach
        </ul>
    </h3>
</div>
@endif
