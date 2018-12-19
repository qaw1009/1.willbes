@extends('lcms.layouts.master_modal')
@section('layer_title')
    회원이름변경
@stop

@section('layer_header')
    <form class="form-horizontal" id="chg_form_modal" name="chg_form_modal" method="POST" enctype="multipart/form-data" onsubmit="return false;">
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
            <div class="x_panel">
                <div class="x_title">
                    <div class="pull-right">
                        <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_name">변경이름 <span class="required">*</span></label>
                        <div class="col-md-3 item">
                            <input type="text" id="chgd_name" name="chg_name" required="required" class="form-control" title="변경이름" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_reason">변경사유 <span class="required">*</span></label>
                        <div class="col-md-9 item">
                            <input type="text" id="chg_reason" name="chg_reason" required="required" class="form-control" title="변경사유" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_file">증빙자료</label>
                        <div class="col-md-9 item">
                            <input type="file" id="attach_file" name="attach_file" class="form-control" title="첨부"/>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mr-10">변경</button>
                    </div>
                </div>
            </div>
            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>변경이름</th>
                            <th>변경사유</th>
                            <th>증빙자료</th>
                            <th>변경일</th>
                            <th>변경자</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cdata as $row)
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td>{{ $row['UpdData'] }}</td>
                                <td>{{ $row['UpdMemo'] }}</td>
                                <td><a href="{{ $row['ReferFileRoute'] }}">{{ $row['ReferFile'] }}</a></td>
                                <td>{{ $row['UpdDatm'] }}</td>
                                <td>{{ $row['adminName'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $list_table = $('#list_ajax_table_modal');
                var $regi_form = $('#chg_form_modal');

                $(document).ready(function() {
                    $datatable = $list_table.DataTable({
                        ajax: false,
                        paging: false,
                        searching: false
                    });

                    // ajax submit
                    $regi_form.submit(function() {
                        var _url = '{{ site_url("/member/manage/chgname_Proc") }}' + getQueryString();

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                // 성공후에 layer 안에 내용 변경하기
                                sendAjax("{{ site_url("/member/manage/chgname/{$data['MemIdx']}") }}",
                                    '',
                                    function(d){
                                        $("#pop_modal").find(".modal-content").html(d).end()
                                    },
                                    function(req, status, err){
                                        showError(req, status);
                                    }, false, 'GET', 'html');
                            }
                        }, showValidateError, false, 'alert');
                    });
                });
            </script>
        @stop

        @section('add_buttons')

        @endsection

        @section('layer_footer')
    </form>
@endsection