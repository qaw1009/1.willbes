@extends('lcms.layouts.master_modal')
@section('layer_title')
    첨부파일 다운로드 로그
@stop

@section('layer_header')
@endsection

@section('layer_content')
    {!! form_errors() !!}
    <div class="x_panel mt-10">
        <div class="x_content">
            <form name="log_form" id="log_form" method="post">
                <input type="hidden" name="m" value="{{$param['m']}}" />
                <input type="hidden" name="o" value="{{$param['o']}}" />
                <input type="hidden" name="op" value="{{$param['op']}}" />
                <input type="hidden" name="p" value="{{$param['p']}}" />
                <input type="hidden" name="ps" value="{{$param['ps']}}" />
                <input type="hidden" name="l" value="{{$param['l']}}" />
                <input type="hidden" name="u" value="{{$param['u']}}" />
                {!! csrf_field() !!}
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{$curriculum['wUnitNum']}}회 {{$curriculum['wUnitLectureNum']}}강</th>
                        <th>{{$curriculum['wUnitName']}}</th>
                        <td>{{$curriculum['wBookPage']}} 페이지</td>
                        <td>강의사간 : {{$curriculum['wRuntime']}}분</td>
                        <td>수강시간 : {{floor(intval($curriculum['RealStudyTime'])/60)}}분 {{intval($curriculum['RealStudyTime'])%60}}초</td>
                        <td>배수시간 : {{$curriculum['RealExpireTime']}}분</td>
                    </tr>
                    </thead>
                </table>
            </form>
            <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>방식</th>
                    <th>시간</th>
                    <th>아이피</th>
                    <th>삭제일</th>
                    <th>삭제자</th>
                    <th>삭제</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#log_form');
        var $list_table = $('#list_ajax_table_modal');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging : false,
                ajax: {
                    'url' : '{{ site_url("/member/manage/ajaxDownlog/") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return arrToJson($search_form.serializeArray());
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta){
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'DownloadType', 'render' : function(data, type, row, meta){
                            return (data == 'P' ? '인쇄' : '다운로드');
                        }},
                    {'data' : 'DownloadDatm'},
                    {'data' : 'DownloadIp'},
                    {'data' : 'DelDatm'},
                    {'data' : 'adminName'},
                    {'data' : 'LddIdx', 'render' : function(data, type, row, meta) {
                            if(row.IsStatus == 'Y'){
                                return '<button type="button" class="btn btn-dark bg-red mr-10" onclick="deleteLog('+data+');">삭제</botton>';
                            } else {
                                return '';
                            }

                        }}
                ]
            });
        });

        function deleteLog(lIdx)
        {
            if(!window.confirm('다운로드 이력을 삭제하시겠습니까?')){
                return;
            }
            var _url = '{{ site_url("/member/manage/deleteDownlog") }}/' + lIdx;

            ajaxSubmit($search_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();
                }
            }, showValidateError, false, 'alert');
        }
    </script>
@stop

@section('add_buttons')

@endsection

@section('layer_footer')

@endsection