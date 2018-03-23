@extends('lcms.layouts.master')
@section('content')
    <h5>- 윌비스에서 제공하는 전체 동영상 강의에 대한 회차별 원천 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-6">
                        <p class="form-control-static">강의명, 강의코드 검색 가능</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prof">강사검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prof" name="search_prof">
                    </div>
                    <label class="control-label col-md-1" for="search_dept_ccd">조건</label>
                    <div class="col-md-6 form-inline">
                        <select class="form-control" id="search_cp" name="search_cp">
                            <option value="">CP사</option>
                        @foreach($cp_list as $row)
                            <option value="{{ $row['wCpIdx'] }}">{{ $row['wCpName'] }}</option>
                        @endforeach
                        </select>
                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">콘텐츠유형</option>
                        @foreach($content_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control" id="search_progress" name="search_progress">
                            <option value="">진행상태</option>
                        @foreach($progress_ccd as $key => $val)
                             <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
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
                    <th>CP사</th>
                    <th>콘텐츠유형 </th>
                    <th>마스터강의명[코드] </th>
                    <th>업로드 </th>
                    <th>진행상태 </th>
                    <th>제작월 </th>
                    <th>사용여부 </th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
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
                serverSide: true,
                
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 마스터강의등록', className: 'btn-sm btn-primary border-radius-reset',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('/cms/lecture/create') }}';
                        }
                    }
                ],

                ajax: {
                    'url' : '{{ site_url('/cms/lecture/listAjax') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                }
                ,
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'wCpName'},
                    {'data' : 'wContentCcd_Name'},
                    {'data' : 'wLecName', 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-modify" data-idx="' + row.wLecIdx + '"><u>' + data + '</u></a> ['+row.wLecIdx+ ']';
                        }},
                    {'data' : 'wUnitCnt', 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-unit" data-idx="' + row.wLecIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'wProgressCcd_Name'},
                    {'data' : 'wMakeYM'},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'wRegDatm'}
                ]

            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/cms/lecture/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });


            $list_table.on('click', '.btn-unit', function() {
                $('.btn-unit').setLayer({
                    "url" : "{{ site_url('cms/lecture/createUnitModal/') }}"+ $(this).data('idx')
                    ,width : "1300"
                });
            });

        });
    </script>
@stop
