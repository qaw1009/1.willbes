@if($__cfg['SiteCode'] == '2012')
    {{-- 윌스토리 검색창 --}}
@else
    @if($__cfg['IsPassSite'] === false)
        {{-- 온라인 사이트의 경우 검색창 노출 --}}
        <div class="searchBox">
            <div>
                <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                    <input type="text" name="" class="d_none">{{--삭제금지 --}}
                    <input type="hidden" id="unifiedSearch_cate" name="cate" value="{{$__cfg['CateCode']}}">
                    <input type="search" id="unifiedSearch_text" name="searchfull_text" data-form="unifiedSearch_form" class="unifiedSearch" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                    <label for="search"><button type="button" id="btn_unifiedSearch" data-form="unifiedSearch_form" class="btn_unifiedSearch" title="검색">검색</button></label>
                </form>
            </div>
        </div>
    @endif
@endif
