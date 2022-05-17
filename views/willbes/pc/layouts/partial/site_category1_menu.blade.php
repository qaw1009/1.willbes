{{-- 일반메뉴 (전체보기) > 전체메뉴(1차카테고리) 메뉴 --}}
<div class="drop-Box-wsBook wsBook2">
    <div class="bookmenu2">
        @foreach($_menu_sub_data as $sm_lg_idx => $sm_lg_row)
            <a href="{{ $sm_lg_row['MenuUrl'] }}" target="_{{ $sm_lg_row['UrlTarget'] }}">{{ $sm_lg_row['MenuName'] }}</a>
        @endforeach
    </div>
</div>
