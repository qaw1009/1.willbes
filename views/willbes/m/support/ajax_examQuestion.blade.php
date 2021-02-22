<form class="form-horizontal" id="_ajax_search_form" name="_ajax_search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}

    <div class="willbes-Lec-Selected NG tx-gray pt-zero">
        <select id="s_year" name="s_year" title="연도" class="seleProcess width40p" onchange="callAjax(1);">
            <option value="">{{empty($arr_swich['school_year']) === false ? $arr_swich['school_year'] : $arr_base['school_year']}}</option>
            @for($i = date('Y') - (empty($arr_swich['compare_year']) === false ? $arr_swich['compare_year'] : $arr_base['compare_year']); $i <= date('Y') + $arr_base['compare_year']; $i++)
                <option value="{{$i}}" @if(element('s_year', $arr_input) == $i)selected="selected"@endif>{{$i}}</option>
            @endfor
        </select>

        <select id="s_subject" name="s_subject" title="과목" class="seleCampus width40p ml1p" onchange="callAjax(1);">
            <option value="">과목</option>
            @foreach($arr_base['subject'] as $key => $val)
                <option value="{{$key}}" @if(element('s_subject', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
            @endforeach
        </select>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray" id="ajax_table">
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center">등록된 내용이 없습니다.</td>
                </tr>
            @endif

            @foreach($list as $row)
                <tr>
                    <td class="w-data file">
                        <dl class="w-info">
                            <dt>{{$row['ExamProblemYear']}}{{empty($arr_swich['school_year']) === false ? $arr_swich['school_year'] : ''}}<span class="row-line">|</span>{{$row['SubjectName']}}</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="{{front_url($default_path.'/examQuestion/show?board_idx='.$row['BoardIdx'])}}">
                                {{hpSubString($row['Title'],0,40,'...')}}
                            </a>
                            @if(empty($row['AttachData']) === false)
                                @foreach($row['AttachData'] as $val)
                                    <div class="download">
                                        <a href="{{front_url($default_path.'/examQuestion/download?file_idx='.$val['FileIdx'].'&board_idx='.$row['BoardIdx']) }}" target="_blank">다운하기</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {!! $paging['pagination'] !!}
    </div>

</form>

<script type="text/javascript">
    var $_ajax_search_form = $('#_ajax_search_form');

    function callAjax(num) {
        listAjax(num);    //list data load
        ajaxPaging(num);  //page data load
        applyPagination();
    }

    //list ajax
    function listAjax(page) {
        var add_table = '';
        var _url = '{{ front_url($default_path."/examQuestion/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $_ajax_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            's_year' : $('#s_year option:selected').val(),
            's_subject' : $('#s_subject option:selected').val(),
            'page' : page,
        };

        sendAjax(_url, data, function(ret) {
            if (ret.ret_data.length < 1) {
                add_table += '<tr>';
                add_table += '<td class="w-list tx-center">등록된 내용이 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    add_table += '<tr>';
                    add_table += '<td class="w-data file">';
                    add_table += '<dl class="w-info">';
                    add_table += '<dt>';
                    add_table += item.ExamProblemYear + '{{empty($arr_swich['school_year']) === false ? $arr_swich['school_year'] : ''}}';
                    add_table += '<span class="row-line">|</span>';
                    add_table += item.SubjectName;
                    add_table += '</dt>';
                    add_table += '<div class="w-tit">';
                    add_table += '<a href="{{front_url($default_path.'/examQuestion/show?board_idx=')}}' + item.BoardIdx + '">';
                    add_table += sub_str(item.Title, 40, '...');
                    add_table += '</a>';
                    if(item.AttachData){
                        $.each(item.AttachData, function (k, v) {
                            add_table += '<div class="download">';
                            add_table += '<a href="{{front_url($default_path.'/examQuestion/download?file_idx=')}}' + v.FileIdx + '&board_idx=' + item.BoardIdx + '" target="_blank">다운하기';
                            add_table += '</a>';
                            add_table += '</div>';
                        });
                    }
                    add_table += '</div>';
                    add_table += '</td>';
                    add_table += '</tr>';
                });
            }

            $('#ajax_table > tbody').html(add_table);
        }, true, false, 'GET');
    }

    //page ajax
    function ajaxPaging(page)
    {
        var _url = '{{ front_url($default_path."/examQuestion/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $_ajax_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            's_year' : $('#s_year option:selected').val(),
            's_subject' : $('#s_subject option:selected').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            $('.add-paging').html(ret.paging.pagination);
        }, true, false, 'GET');
    }

    //문자열 길이 체크
    function sub_str(string, length, sing) {
        if(string != null && string.length > length) {
            return string.substr(0,length)+sing;
        } else {
            return string;
        }
    }

    //href 리턴 false, list,page ajax 호출
    function applyPagination() {
        $("div.Paging a").on("click", function() {
            var link, temp_params, params, num;
            /*var num = $(this).text();
            callAjax(num);*/

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