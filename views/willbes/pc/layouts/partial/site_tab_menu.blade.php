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
                        @if(sess_data('mem_interest') == '718009')
                            {{-- 임용관련 메뉴 안보이게하기 --}}
                            @if(strpos(strtoupper($menu_row['MenuUrl']), 'CLASSROOM/PASS') !== false ||
                                strpos(strtoupper($menu_row['MenuUrl']), 'CLASSROOM/MOCKTEST') !== false )
                                @continue
                            @endif
                        @endif
                        @if(empty($menu_row["Children"]) === false)
                            <li class="dropdown">
                                <a href="{{$menu_row['MenuUrl']}}">{{$menu_row['MenuName']}}</a>
                                <div class="drop-Box list-drop-Box">
                                    <ul>
                                        <li class="Tit">{{$menu_row['MenuName']}}</li>
                                        @foreach($menu_row["Children"] as $sub_row)
                                            @if(sess_data('mem_interest') == '718009')
                                                {{-- 임용관련 메뉴 안보이게하기 --}}
                                                @if(strpos(strtoupper($menu_row['MenuUrl']), 'CLASSROOM/MESSAGE') !== false &&
                                                    strpos(strtoupper($sub_row['MenuUrl']), 'CLASSROOM/PROFQNA') !== false)
                                                    @continue
                                                @endif
                                            @endif
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
