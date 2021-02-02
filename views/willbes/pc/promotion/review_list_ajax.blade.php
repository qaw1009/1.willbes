<div class="title NSK-Black">합격수기 등록하기</div>

<div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
    <form id="review_search_form" name="review_search_form" method="POST">
        {!! csrf_field() !!}

        <span class="willbes-Lec-Search willbes-SelectBox mb20 f_left">
            @if(empty($arr_base['category']) === false)
                <select id="list_cate_code" name="list_cate_code" title="카테고리" class="seleCategory">
                    <option value="">카테고리</option>
                    @foreach($arr_base['category'] as $row)
                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('list_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif>{{$row['CateNameRoute']}}</option>
                    @endforeach
                </select>
            @endif

            @if(empty($arr_base['subject']) === false)
                <select id="list_subject_idx" name="list_subject_idx" title="과목" class="seleLecA" @if(empty(element('list_cate_code', $arr_input)) === true) disabled @endif>
                    <option value="">과목</option>
                    @foreach($arr_base['subject'] as $arr)
                        @if(empty($arr) === false)
                            @foreach($arr as $row)
                                <option value="{{$row['SubjectIdx']}}" class="{{$row['CateCode']}}" @if(element('list_subject_idx', $arr_input) == $row['SubjectIdx'])selected="selected"@endif>{{$row['SubjectName']}}</option>
                            @endforeach
                        @endif
                    @endforeach
                </select>
            @endif
        </span>
        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM">
            <div class="inputBox p_re">
                <input type="text" id="list_keyword" name="list_keyword" maxlength="30" value="{{ element('list_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                <button class="search-Btn" id="btn_search">
                    <span>검색</span>
                </button>
            </div>
        </span>
        <div class="subBtn blue f_right"><a href="#none" onclick="writeReviewLayer()">등록하기 ></a></div>
    </form>
</div>
<div class="LeclistTable">
    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
        <colgroup>
            @if(empty($arr_swich['arr_table_width']) === false)
                @foreach($arr_swich['arr_table_width'] as $width)
                    <col style="width: {{$width}}px;">
                @endforeach
            @else
                <col style="width: 65px;">
                @if($__cfg['CampusCcdArr'] != 'N')<col style="width: 110px;">@endif
                <col style="width: 445px;">
                <col style="width: 65px;">
                <col style="width: 100px;">
                <col style="width: 90px;">
            @endif
        </colgroup>
        <thead>
        <tr>
            <th>No<span class="row-line">|</span></th>
            <th>과목<span class="row-line">|</span></th>
            @if($__cfg['CampusCcdArr'] != 'N')<th class="{{$arr_swich['campus'] or ''}}">캠퍼스<span class="row-line">|</span></th>@endif
            <th>제목<span class="row-line">|</span></th>
            <th>첨부<span class="row-line">|</span></th>
            <th class="{{$arr_swich['name'] or 'd_none'}}">작성자<span class="row-line">|</span></th>
            <th>작성일<span class="row-line">|</span></th>
            <th>조회수</th>
        </tr>
        </thead>
        <tbody>
        @if(empty($list) === false)
            @foreach($list as $key => $row)
                <tr>
                    <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>
                    @if(empty($arr_swich['subject']) === false)
                        <td>{{ $row['SubJectName'] or ''}}</td>
                    @endif
                    @if($__cfg['CampusCcdArr'] != 'N')<td class="{{$arr_swich['campus'] or ''}}"><span class="oBox campus_{{$row['CampusCcd']}} NSK">{{$row['CampusCcd_Name']}}</span></td>@endif
                    <td class="w-list tx-left pl20">
                        <a href="#none" onclick="showReviewLayer('{{ $row['BoardIdx'] }}');">
                            @if($row['IsBest'] == '1')<strong>@endif{{hpSubString($row['Title'],0,40,'...')}}@if($row['IsBest'] == '1')</strong>@endif
                        </a>
                    </td>
                    <td class="w-file">
                        @if(empty($row['AttachData']) === false)
                            <img src="{{ img_url('prof/icon_file.gif') }}">
                        @endif
                    </td>
                    <td class="{{$arr_swich['name'] or 'd_none'}}">{!! (empty(sess_data('mem_idx')) === false && $row['RegMemIdx'] == sess_data('mem_idx')) ? $row['RegName'] : hpSubString($row['RegName'],0,2,'*') !!}</td>
                    <td class="w-date">{{$row['RegDatm']}}</td>
                    <td class="w-click">{{$row['TotalReadCnt']}}</td>
                </tr>
                @php $paging['rownum']-- @endphp
            @endforeach
        @else
            <tr>
                <td class="w-list tx-center" colspan="{{ empty($arr_swich['arr_table_width']) === false ? count($arr_swich['arr_table_width']) : '6' }}">등록된 내용이 없습니다.</td>
            </tr>
        @endif
        </tbody>
    </table>

    {!! $paging['pagination'] !!}
</div>


<!-- willbes-Layer-Notice -->
<div id="profNotice" class="willbes-Layer-Board">
</div>

<style>
    .event01_1 span { vertical-align: middle;}
    .willbes-Layer-Board .Layer-Cont { overflow-y: hidden}
</style>

<script>
    var $review_search_form = $("#review_search_form");

    $(function (){
        $('select[name="list_subject_idx"]').chained("#list_cate_code");

        //검색
        $('#btn_search').click(function () {
            var cate_code = $review_search_form.find('select[name="list_cate_code"]').val();
            var subject_idx = $review_search_form.find('select[name="list_subject_idx"]').val();
            var keyword = $review_search_form.find('input[name="list_keyword"]').val();
            fnReviewList(1,cate_code,subject_idx,keyword);
        });
    });

    function writeReviewLayer(board_idx){
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.', 'Y', $rtn_url) !!}

        var ele_id =  'profNotice';
        var data = {
            'board_idx' : board_idx,
        };
        sendAjax('/support/review/writeReviewLayer', data, function(ret) {
            $('#' + ele_id).html(ret).show();
        }, showAlertError, false, 'GET', 'html');
    }

    function showReviewLayer(board_idx,cate_code,subject_idx){
        var ele_id =  'profNotice';
        var data = {
            'board_idx' : board_idx,
            's_cate_code' : cate_code,
            'subject_idx' : subject_idx,
        };
        sendAjax('/support/review/showReviewLayer', data, function(ret) {
            $('#' + ele_id).html(ret).show();
        }, showAlertError, false, 'GET', 'html');
    }

    $("div.Paging a").on("click", function() {
        var link, temp_params, params;
        var num = 1;
        var cate_code = $review_search_form.find('select[name="list_cate_code"]').val();
        var subject_idx = $review_search_form.find('select[name="list_subject_idx"]').val();
        var keyword = $review_search_form.find('input[name="list_keyword"]').val();

        link = $(this).attr('href');
        if (link) {
            temp_params = link.split('?');
            params = temp_params[1].split('=');
            num = params[params.length - 1];
        }

        fnReviewList(num,cate_code,subject_idx,keyword);

        return false;
    });
</script>