@extends('lcms.layouts.master')
@section('content')
    <h5>- 윌비스 제휴사의 기본정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">명칭,코드, 연락처 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_dept_ccd">조건</label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
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
                    <th class="searching">CP사코드</th>
                    <th class="searching">CP사명 </th>
                    <th class="searching">담당자명 </th>
                    <th class="searching">연락처 </th>
                    <th class="searching_is_use">사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ ($loop->count) - ($loop->index) + 1}}</td>
                        <td>{{ $row['wCpIdx'] }}</td>
                        <td>
                            <a href="#none" class="btn-modify" data-idx="{{ $row['wCpIdx'] }}" data-code-type="group" data-group-ccd="0" ><u> {{ $row['wCpName'] }} </u></a>
                        </td>
                        <td>
                            {{ $row['wCpManagerName'] }}
                        </td>
                        <td>
                            @if(empty($row['wCpTel2']) === false && empty($row['wCpTel3']) === false)
                                {{ $row['wCpTel1'] }}-{{ $row['wCpTel2'] }}-{{ $row['wCpTel3'] }}<BR>
                            @endif
                            @if( empty($row['wCpPhone2']) === false && empty($row['wCpPhone3']) === false )
                                {{ $row['wCpPhone1'] }}-{{ $row['wCpPhone2'] }}-{{ $row['wCpPhone3'] }}<BR>
                            @endif
                        </td>
                        <td>{!! str_replace('미사용','<span class="red">미사용</span>',$row['wIsUseView']) !!}<span class="hide">{{ $row['wIsUse'] }}</span></td>
                        <td>{{ $row['wAdminName'] }}</td>
                        <td>{{ $row['wRegDatm'] }}</td>
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

            $datatable = $list_table.DataTable({
                serverSide: false,
                ajax : false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> CP사등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
            });

            // 검색
            $search_form.submit(function(e) {
                e.preventDefault();
                datatableSearching();
            });

            //event
            $search_form.find('input[name="search_value"], select[name="search_is_use"]').on('keyup change', function () {
                datatableSearching();
            });

            // 검색 실행
            var datatableSearching = function() {
                $datatable
                    .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                    .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                    .draw();
            };

            $('.btn-regist, .btn-modify').click(function() {

                var strCpIdx = '';
                var uri_param = '';

                strCpIdx = ($(this).data('idx') == undefined ? '' : $(this).data('idx'));

                $('.btn-regist, .btn-modify').setLayer({
                    "url" : "{{ site_url('sys/cp/createModal/') }}"+ strCpIdx
                    ,width : "800"
                });
            });
        });
    </script>
@stop
