@extends('lcms.layouts.master')
@section('content')
    <h5>- 윌비스 사이트 운영을 위한 공통코드를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_dept_ccd">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>

                        <select class="form-control" id="search_is_value_use" name="search_is_value_use">
                            <option value="">세부항목값사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th class="searching rowspan">그룹유형 [<span class="blue">코드</span>]</th>
                    <th class="searching">세부항목명 [<span class="blue">코드</span>] <button type="button" class="btn btn-xs btn-success ml-10 btn-regist" data-code-type="sub">추가</button></th>
                    <th>세부항목값</th>
                    <th>세부항목설명</th>
                    <th class="searching_is_value_use">값사용여부</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td class="row_td">
                            <input type="radio" name="GroupCcd" value="{{ $row['ParentCcd'] }}"  class="flat"/>
                            <a href="#none" class="btn-modify" data-ccd="{{ $row['ParentCcd'] }}" data-code-type="group" data-group-ccd="0" ><u> {{ $row['ParentName'] }}  [<span class="blue">{{$row['ParentCcd']}}</span>]</u></a>
                        </td>
                        <td>@if(empty($row['Ccd']) === false)
                                <a href="#none" class="btn-modify" data-ccd="{{ $row['Ccd'] }}" data-code-type="sub" data-group-ccd="{{ $row['ParentCcd'] }}"><u>{{ $row['CcdName'] }}  [<span class="blue">{{$row['Ccd']}}</span>]</u></a>
                                @endif
                        </td>
                        <td>{{ $row['CcdValue'] }}</td>
                        <td>{{ $row['CcdDesc'] }}</td>
                        <td>{!! $row['IsValueUse']=='Y' ? '<span class="red">사용</span>' : '미사용'!!} <span class="hide">{{ $row['IsValueUse'] }}</span></td>
                        <td>{!! str_replace('미사용','<span class="red">미사용</span>',$row['IsUseView']) !!}<span class="hide">{{ $row['IsUse'] }}</span></td>
                        <td>{{ $row['wAdminName'] }}</td>
                        <td>{{ $row['RegDatm'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            //setRowspan('row_td'); //td rowspan

            $datatable = $list_table.DataTable({
                serverSide: false,
                ajax : false,
                paging: true,
                pageLength: 50,
                searching: true,
                rowsGroup: ['.rowspan'],
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 그룹유형등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
            });

            $('#list_ajax_table_wrapper').on('click', '.btn-regist, .btn-modify-parent, .btn-modify', function() {
                var strMakeType = '';
                var strGroupCcd = '';
                var strCcd = '';
                var uri_param = '';
                var is_regist = $(this).prop('class').indexOf('btn-regist') !== -1;

                if (is_regist) {    //등록
                    strMakeType = (typeof $(this).data('code-type') !== 'undefined') ? $(this).data('code-type') : "group";

                    if(strMakeType === "group") {
                        strGroupCcd = "0"
                    } else {
                        if ($list_table.find('input[name="GroupCcd"]:checked').length === 0) {
                            alert("그룹유형을 선택해 주세요.");
                            return false;
                        }
                        strGroupCcd =$list_table.find('input[name="GroupCcd"]:checked').val();
                    }
                    uri_param = strMakeType+"/"+strGroupCcd+"/";
                }  else {           //수정
                    strMakeType = $(this).data('code-type');
                    strGroupCcd = $(this).data('group-ccd');
                    strCcd = $(this).data('ccd');
                    //alert(strMakeType+" - "+strCcd);
                    uri_param = strMakeType+"/"+strGroupCcd+"/"+strCcd;
                }

                $('.btn-regist, .btn-modify').setLayer({
                    "url" : "{{ site_url('sys/code/createModal/') }}"+ uri_param
                    ,width : "800"
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_is_value_use').search($search_form.find('select[name="search_is_value_use"]').val())
                .draw();
        }
    </script>
@stop
