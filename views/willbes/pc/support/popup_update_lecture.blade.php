<div id="profNotice" class="willbes-Layer-Board" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">강의 업데이트</div>

    <form id="ajax_list_form" name="ajax_list_form" method="GET">
        {!! csrf_field() !!}
    </form>

    <div class="Layer-Cont">
        <div class="Acad_info mt40">
            <div class="willbes-Leclist c_both">
                <div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="search_subject" name="search_subject" title="과목" class="seleAcad">
                            <option value="">과목</option>
                            @foreach($arr_base['subject'] as $row)
                                <option value="{{$row['SubjectIdx']}}" @if(empty($subject_idx) === false &&  $subject_idx == $row['SubjectIdx']) selected @else disabled @endif>{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                        <select id="search_prof" name="search_prof" title="교수">
                            <option value="">교수</option>
                            @foreach($arr_base['professor'] as $row)
                                <option value="{{$row['ProfIdx']}}" @if(empty($prof_idx) === false && $prof_idx == $row['ProfIdx']) selected @else disabled @endif >{{$row['ProfNickName']}}</option>
                            @endforeach
                        </select>
                    </span>
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM">
                        <div class="inputBox p_re">
                            <input type="text" id="search_value" name="search_value" class="labelSearch" placeholder="강의명을 입력해주세요." maxlength="30">
                            <button type="button" onclick="callAjax(1);" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </span>
                </div>

                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray" id="ajax_table">
                            <colgroup>
                                <col style="width: 60px;">
                                <col style="width: 110px;">
                                <col style="width: 100px;">
                                <col>
                                <col style="width: 250px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>과목<span class="row-line">|</span></th>
                                <th>교수<span class="row-line">|</span></th>
                                <th>강좌명<span class="row-line">|</span></th>
                                <th>강의 회차</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-xs-12 add-paging"></div>
                        </div>
                    </div>
                </div>
                <!-- willbes-Leclist -->
            </div>
        </div>
    </div>
</div>

<div id="Layerprof" class="willbes-Layer-Black" style="display: block"></div>


<script type="text/javascript">
    var $ajax_list_form = $('#ajax_list_form');

    $(document).ready(function(){
        callAjax($("#page").val());
    });

    function callAjax(num) {
        listAjax(num);    //list data load
        applyPagination();
    }

    //list ajax
    function listAjax(page) {
        var add_table = '';
        var _url = '{{ front_url("/UpdateLectureInfo/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'search_subject': $('#search_subject').val(),
            'search_prof': $('#search_prof').val(),
            'search_value': $('#search_value').val(),
            'page' : page
        };

        sendAjax(_url, data, function(ret) {
            var rownum = ret.paging.rownum;

            if (ret.ret_data.length < 1) {
                add_table += '<tr>';
                add_table += '<td colspan="5" class="w-list tx-center">검색 결과가 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    var yyyy = item.unit_regdate.substr(0,4);
                    var mm = item.unit_regdate.substr(5,2);
                    var dd = item.unit_regdate.substr(8,2);

                    add_table += '<tr>';
                    add_table += '<td class="w-no">'+ rownum +'</td>';
                    add_table += '<td class="w-campus">'+ item.SubjectName +'</td>';
                    add_table += '<td>'+ item.ProfNickName +'</td>';
                    add_table += '<td class="w-list tx-left pl20"><a href="{{front_url('/lecture/show/cate/')}}' + item.CateCode + '/pattern/only/prod-code/' + item.ProdCode + '#Leclist">'+ item.ProdName +'</a></td>';
                    add_table += '<td class="w-date">'+ mm + '월' + dd + '일 총' + item.unit_cnt + '강 업로드</td>';
                    add_table += '</tr>';
                    rownum = rownum - 1;
                });
            }

            $('#ajax_table > tbody').html(add_table);
            $('.add-paging').html(ret.paging.pagination);

        }, showError, false, 'GET');
    }

    //href 리턴 false, list,page ajax 호출
    function applyPagination() {
        $("div.Paging a").on("click", function() {
            var link, temp_params, params, num;

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                callAjax(num);
            } else {
                callAjax(1);
            }
            return false;
        });
    }
</script>