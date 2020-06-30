@if($__cfg['SiteCode'] == '2012')
    {{-- 윌스토리 검색창 --}}
    <div class="Section widthAuto">
        <div class="wsSearchWrap">
            <div class="wsSearch NSK">
                <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                    <select name="search_type">
                        <option value="0">통합검색</option>
                        <option value="1">도서명</option>
                        <option value="2">저자명</option>
                        <option value="3">출판사</option>
                    </select>
                    <input type="search" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="검색어를 입력하세요." maxlength="100"/>
                    <label for="onsearch" class="NSK-Black"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">Search</button></label>
                </form>
            </div>
            <div class="keyword">
                <strong>윌스토리 인기검색어</strong>
                <a href="#none">김정일</a>
                <a href="#none">김유향</a>
                <a href="#none">PSAT</a>
                <a href="#none">김동진</a>
                <a href="#none">NCS</a>
                <a href="#none">로스쿨</a>
                <a href="#none">나무경영아카데미</a>
                <a href="#none">노무사</a>
                <a href="#none">황종휴</a>
            </div>
        </div>
    </div>
@else
    @if($__cfg["IsPassSite"] === false)
        {{-- 온라인 사이트의 경우 검색창 노출 --}}
        <div class="Section widthAuto">
            <div class="onSearch NGR">
                <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                    <input type="hidden" name="cate" id="unifiedSearch_cate" value="{{$__cfg['CateCode']}}">
                    <input type="search" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                    <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
                </form>
            </div>
        </div>
    @endif
@endif
