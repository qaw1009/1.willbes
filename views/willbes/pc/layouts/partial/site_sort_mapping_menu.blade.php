{{-- 일반메뉴 (전체보기) > 전체메뉴(소트매핑) 메뉴 --}}
<div class="drop-Box-wsBook">
    <table>
        <colgroup>
            <col width="150px">
            <col>
        </colgroup>
        <tbody>
            {{-- 대분류 카테고리 --}}
            @foreach($_sort_mapping_menu as $sm_lg_idx => $sm_lg_row)
                <tr>
                    <th>{{ $sm_lg_row['MenuName'] }}</th>
                    <td>
                        @if(empty($sm_lg_row['Children']) === false)
                            {{-- 중분류 카테고리 --}}
                            @foreach($sm_lg_row['Children'] as $sm_md_idx => $sm_md_row)
                                <div class="two-depth">
                                    @if(empty($sm_md_row['Children']) === false)
                                        <a href="{{ $sm_md_row['MenuUrl'] }}" target="_{{ $sm_md_row['UrlTarget'] }}">{{ $sm_md_row['MenuName'] }}<span>∨</span></a>
                                        {{-- 과목 --}}
                                        <ul class="three-depth">
                                        @foreach($sm_md_row['Children'] as $sm_sm_idx => $sm_sm_row)
                                            <li><a href="{{ $sm_sm_row['MenuUrl'] }}" target="_{{ $sm_sm_row['UrlTarget'] }}">{{ $sm_sm_row['MenuName'] }}</a><li>
                                        @endforeach
                                        </ul>
                                    @else
                                        <a href="{{ $sm_md_row['MenuUrl'] }}" target="_{{ $sm_md_row['UrlTarget'] }}">{{ $sm_md_row['MenuName'] }}</a>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
