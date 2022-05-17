{{-- topnav 전체보기 메뉴 > 카테고리1 --}}
@if($_menu_sub_type == 'category1')
    <div class="dropBox">
        <div class="willstory">
            @foreach($_menu_sub_data as $sm_lg_idx => $sm_lg_row)
                <a href="{{ $sm_lg_row['MenuUrl'] }}" target="_{{ $sm_lg_row['UrlTarget'] }}">{{ $sm_lg_row['MenuName'] }}</a>
            @endforeach
        </div>
    </div>
@endif
