@if($__cfg['SiteCode'] == '2012')
    {{-- 윌스토리 검색창 --}}
    <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
        <div class="Section widthAuto">
            <div class="wsSearchWrap">
                <div class="wsSearch NSK">
                    <input type="text" name="" class="d_none">{{--삭제금지 --}}
                    <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
                    <input type="hidden" name="search_target" id="unifiedSearch_target" value="book">
                    <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                    <select name="search_class">
                        <option value="">통합검색</option>
                        <option value="ProdName" {{empty($arr_search_input) ? '' : (element('search_class',$arr_search_input) == 'ProdName' ? 'selected="selected"' : '') }}>도서명</option>
                        <option value="wAuthorNames" {{empty($arr_search_input) ? '' : (element('search_class',$arr_search_input) == 'wAuthorNames' ? 'selected="selected"' : '') }}>저자명</option>
                        <option value="wPublName" {{empty($arr_search_input) ? '' : (element('search_class',$arr_search_input) == 'wPublName' ? 'selected="selected"' : '') }}>출판사</option>
                    </select>
                    <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="{{empty($arr_search_input) ? '' : element('searchfull_text',$arr_search_input)}}" placeholder="검색어를 입력하세요." maxlength="100"/>
                    <label for="onsearch" class="NSK-Black"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">Search</button></label>
                </div>
                <div class="keyword">
                    @if(empty($__cfg['SearchWordSetup']) === false)
                        @if(array_key_exists(($__cfg['CateCode'] === '' ? 0 : $__cfg['CateCode']),$__cfg['SearchWordSetup'][$__cfg['SiteCode']]))
                            <strong>윌스토리 인기검색어</strong>
                            @foreach($__cfg['SearchWordSetup'][$__cfg['SiteCode']][($__cfg['CateCode'] === '' ? 0 : $__cfg['CateCode'] )] as $idx => $row)
                                @if(date("Y-m-d") >= date("Y-m-d", strtotime($row['StartDate'])) && date("Y-m-d") <= date("Y-m-d", strtotime($row['EndDate'])))
                                    <a href="#none" class="search_word_setup" data-idx="{{$row['SwIdx']}}" data-word="{{$row['SearchWord']}}" data-target="{{$row['TargetType']}}" data-url="{{$row['TargetUrl']}}" data-open="{{$row['TargetOpen']}}">{{$row['SearchWord']}}</a>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </form>
@else
    @if($__cfg["IsPassSite"] === false)
        {{-- 온라인 사이트의 경우 검색창 노출 --}}
        <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET" >
            <div class="Section widthAuto">
                <div class="onSearch NGR">
                    <div>
                        <input type="text" name="" class="d_none">{{--삭제금지 --}}
                        <input type="hidden" name="cate" id="unifiedSearch_cate" value="{{$__cfg['CateCode']}}">
                        <input type="hidden" name="search_class" id="unifiedSearch_class" value="">
                        <input type="hidden" name="search_target" id="unifiedSearch_target" value="">
                        <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                        <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인/학원강의 검색" title="온라인/학원강의 검색" maxlength="100"/>
                        <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
                    </div>
                    @if(empty($__cfg['SearchWordSetup']) === false)
                        @if(array_key_exists(($__cfg['CateCode'] === '' ? 0 : $__cfg['CateCode']),$__cfg['SearchWordSetup'][$__cfg['SiteCode']]))
                            <div class="searchPop searchWordSetupPop" tabindex="0">
                                <div class="popTit">인기검색어</div>
                                <ul>
                                    @foreach($__cfg['SearchWordSetup'][$__cfg['SiteCode']][($__cfg['CateCode'] === '' ? 0 : $__cfg['CateCode'] )] as $idx => $row)
                                        @if(date("Y-m-d") >= date("Y-m-d", strtotime($row['StartDate'])) && date("Y-m-d") <= date("Y-m-d", strtotime($row['EndDate'])))
                                            <li><a href="#none" class="search_word_setup" data-idx="{{$row['SwIdx']}}" data-word="{{$row['SearchWord']}}" data-target="{{$row['TargetType']}}" data-url="{{$row['TargetUrl']}}" data-open="{{$row['TargetOpen']}}">{{$row['SearchWord']}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </form>
    @endif
@endif
<script>
    var autocomplete_text = {!! json_encode(array_pluck($__cfg['SearchWordAuto'],'SearchWord'),JSON_UNESCAPED_UNICODE) !!};
    $(".unifiedSearch").autocomplete({
        source: autocomplete_text,
        select: function (event, ui) {
        },
        focus: function (event, ui) {
            return false;
        },
        delay: 0,
    });
</script>
