@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴사 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">

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
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
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
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th class="searching">제휴사 코드</th>
                        <th class="searching">제휴사명</th>
                        <th class="searching">담당자</th>
                        <th class="searching">연락처</th>
                        <th class="searching">참조도메인</th>
                        <th class="searching">설명</th>
                        <th class="searching_is_use">사용여부</th>
                        <th>등록자</th>
                        <th>등록일</th>
                        <th>IP등록</th>
                        <th>사용자</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ ($loop->count) - ($loop->index) + 1}}</td>
                            <td>{{ $row['BtobIdx'] }}</td>
                            <td><a href="#" class="btn-modify" data-idx="{{ $row['BtobIdx'] }}"><u>{{ $row['BtobName'] }}</u></a> ({{ $row['BtobId'] }})</td>
                            <td>{{ $row['ManagerName'] }}</td>
                            <td>@if(!empty($row['Tel2'])){{ $row['Tel1'] .'-'. $row['Tel2'].'-'.$row['Tel3']  }}@endif</td>
                            <td>{{ $row['ReferDomains'] }}</td>
                            <td>{{ $row['Desc'] }}</td>
                            <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                                <span class="hide">{{ $row['IsUse'] }}</span>
                            </td>
                            <td>{{ $row['RegAdminName'] }}</td>
                            <td>{{ $row['RegDatm'] }}</td>
                            <td><button type="button" class="btn btn-primary btn_ip" id="btn_ip" data-idx="{{$row['BtobIdx']}}">등록</button></td>
                            <td><button type="button" class="btn btn-primary btn_list" id="btn_list" data-idx="{{$row['BtobIdx']}}">사용자목록</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 제휴사 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
            });


            // 등록/수정 모달창 오픈
            $('.btn-regist, .btn-modify').click(function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = (is_regist === true) ? '' : $(this).data('idx');

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/sys/btob/btobInfo/create/') }}' + uri_param,
                    'width' : 900
                    ,'modal_id' : 'modal_info'
                });
            });

            $('.btn_ip').click(function(){
                var uri_param = $(this).data('idx');
                $('.btn_ip').setLayer({
                    'url' : '{{ site_url('/sys/btob/btobInfo/createIp/') }}' + uri_param,
                    'width' : 700
                    ,'modal_id' : 'modal_ip'
                });
            });

            $('.btn_list').click(function(){
                var uri_param = $(this).data('idx');
                $('.btn_list').setLayer({
                    'url' : '{{ site_url('/sys/btob/btobInfo/listCpMember/') }}' + uri_param,
                    'width' : 1000
                    ,'modal_id' : 'modal_cp_member'
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .draw();
        }
    </script>
@stop
