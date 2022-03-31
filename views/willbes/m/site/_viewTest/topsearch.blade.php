<div class="searchWrap">
    <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
    @if($__cfg['SiteCode'] == '2012')
        <input type="text" name="" class="d_none">{{--삭제금지 --}}
        <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
        <input type="hidden" name="search_target" id="unifiedSearch_target" value="book">
        <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
        <input type="hidden" name="search_class" value="">
        <input type="search" id="unifiedSearch_text" name="searchfull_text" class='unifiedSearch' data-form="unifiedSearch_form" value="{{empty($arr_search_input) ? '' : element('searchfull_text',$arr_search_input)}}" placeholder="도서 검색" maxlength="100"/>
    @else
        <input type="text" name="" class="d_none">{{--삭제금지 --}}
        <input type="hidden" id="unifiedSearch_cate" name="cate" value="{{$__cfg['CateCode']}}">
        <input type="search" id="unifiedSearch_text" name="searchfull_text" class="unifiedSearch" data-form="unifiedSearch_form" value="" placeholder="온라인/학원강의 검색" title="온라인/학원강의 검색" maxlength="100"/>
    @endif
        <label for="search"><button title="검색" id="btn_unifiedSearch" class="searchBtn btn_unifiedSearch" data-form="unifiedSearch_form">검색</button></label>
        <button title="닫기" class="searchClose" onclick="return false;">닫기</button>
    </form>
</div>
