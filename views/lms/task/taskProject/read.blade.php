@extends('lcms.layouts.master')

@section('content')
    <h5>- 업무프로젝트를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <div class="x_panel">
        <div class="x_title">
            <h2>업무프로젝트 정보</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1-1">프로젝트명</label>
                <div class="form-control-static col-md-10">{{ $data['TprojectName'] }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">설명</label>
                <div class="form-control-static col-md-10">{{ $data['TprojectDesc'] }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">사용여부</label>
                <div class="form-control-static col-md-10">{{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">등록자</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">등록일</label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">최종 수정자</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">최종 수정일</label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                </div>
            </div>
            <div class="form-group text-center btn-wrap mt-20">
                <button type="button" class="btn btn-success" id="btn_modify">수정</button>
                <button type="button" class="btn btn-primary" id="btn_list">목록</button>
                <button type="button" class="pull-right btn btn-danger" id="btn_delete">삭제</button>
            </div>
        </div>
    </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            $('#btn_list').click(function() {
                location.href='{{ site_url("/task/taskProject") }}' + getQueryString();
            });

            $('#btn_modify').click(function() {
                location.href='{{ site_url("/task/taskProject/create") }}/' + {{$idx}} + getQueryString();
            });

            $('#btn_delete').click(function() {
                if (!confirm('해당 업무프로젝트를 삭제하시겠습니까?')) return;

                var _url = '{{ site_url("/task/taskProject/remove") }}/' + {{$idx}} + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.href='{{ site_url("/task/taskProject") }}' + getQueryString();
                    }
                }, showError, false, 'POST');
            });

        });
    </script>
@stop