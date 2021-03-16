@if($__cfg['SiteCode'] == '2012')
    {{-- 윌스토리 검색창 --}}
    <div class="searchBox book">
        <div>
            <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                <input type="text" name="" class="d_none">{{--삭제금지 --}}
                <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
                <input type="hidden" name="search_target" id="unifiedSearch_target" value="book">
                <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                <input type="hidden" name="search_class" value="">
                <input type="search" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="{{empty($arr_search_input) ? '' : element('searchfull_text',$arr_search_input)}}" placeholder="도서 검색" maxlength="100"/>
                <label for="search"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
            </form>
        </div>
    </div>
@else
    @if($__cfg['IsPassSite'] === false)
        {{-- 온라인 사이트의 경우 검색창 노출 --}}
        <div class="searchBox">
            <div>
                <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                    <input type="text" name="" class="d_none">{{--삭제금지 --}}
                    <input type="hidden" id="unifiedSearch_cate" name="cate" value="{{$__cfg['CateCode']}}">
                    <input type="search" id="unifiedSearch_text" name="searchfull_text" data-form="unifiedSearch_form" class="unifiedSearch" value="" placeholder="온라인/학원강의 검색" title="온라인/학원강의 검색" maxlength="100"/>
                    <label for="search"><button type="button" id="btn_unifiedSearch" data-form="unifiedSearch_form" class="btn_unifiedSearch" title="검색">검색</button></label>
                </form>
            </div>
        </div>
    @endif
@endif
