@extends('lcms.layouts.master_modal')

@section('layer_title')
    상담정보
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <form class="form-horizontal" id="list_modal_form" name="list_modal_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="csm_idx" value="{{ $csm_idx }}"/>

        <div class="x_panel mt-10 form-group-sm">
            <div class="x_title">
                <h2>상담접수 내역</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content form-group-sm">
                <div class="form-group">
                    <label class="control-label col-md-1-1">운영사이트</label>
                    <div class="form-control-static col-md-4">
                        {{$data['SiteName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line">캠퍼스</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['CampusName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리</label>
                    <div class="col-md-4">
                        {{$data['CateNames']}}
                    </div>

                    <label class="control-label col-md-1-1 d-line">상담일자</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['ConsultDate']}} ({!! $yoil[date('w', strtotime($data['ConsultDate']))] !!})
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel mt-10">
            <div class="x_content form-group-sm">
                <div class="form-group">
                    <label class="control-label col-md-1-1">이름(아이디)</label>
                    <div class="form-control-static col-md-4">
                        {{$data['MemName']}} ({{$data['MemId']}})
                    </div>
                    <label class="control-label col-md-1-1 d-line">생년월일</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['BirthDay']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">연락처</label>
                    <div class="form-control-static col-md-4">
                        {{$data['Phone']}}
                    </div>

                    <label class="control-label col-md-1-1 d-line">이메일</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['Mail']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">응시직급</label>
                    <div class="form-control-static col-md-4">
                        {{$data['CandidatePositionName']}}
                    </div>

                    <label class="control-label col-md-1-1 d-line">상담예약일시</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['TimeValue']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">응시직렬</label>
                    <div class="form-control-static col-md-4">
                        {{$data['SerialName']}}
                    </div>

                    <label class="control-label col-md-1-1 d-line">수험기간</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['ExamPeriodName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">응시지역</label>
                    <div class="form-control-static col-md-4">
                        {{$data['CandidateAreaName']}}
                    </div>

                    <label class="control-label col-md-1-1 d-line">취약과목</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['SubjectName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">수강여부</label>
                    <div class="form-control-static col-md-4">
                        {{$data['StudyName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">메모</label>
                    <div class="col-md-8">
                        {!! $data['Memo'] !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel mt-10">
            <div class="x_title">
                <h2>상담진행 여부</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content form-group-sm">
                <div class="form-group">
                    <label class="control-label col-md-1-1">상담상태</label>
                    <div class="form-inline col-md-4">
                        <div class="radio">
                        <input type="radio" id="is_consult_y" name="is_consult" class="flat" value="Y" required="required" title="완료" @if($data['IsConsult']=='Y')checked="checked"@endif/> <label for="is_consult_y" class="input-label">완료</label>
                        <input type="radio" id="is_consult_n" name="is_consult" class="flat" value="N" title="미방문" @if($data['IsConsult']=='N')checked="checked"@endif/> <label for="is_consult_n" class="input-label">미방문</label>
                        </div>
                    </div>

                    <label class="control-label col-md-1-1 d-line">상담사</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{sess_data('admin_name')}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">메모</label>
                    <div class="col-md-8">
                        <textarea id="content" name="consult_memo" class="form-control" rows="3" title="메모" placeholder="{{$advertise_placeholder}}">{!! $data['ConsultMemo'] !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $list_modal_form = $('#list_modal_form');

        /*$list_modal_form.submit(function() {*/
        $('.btn-modal-modify').on('click', function() {
            var _url = '{{ site_url('/pass/consult/schedule/storeDetailMember/') }}';

            ajaxSubmit($list_modal_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url('/pass/consult/member/') }}' + getQueryString());
                }
            }, showValidateError, null, false, 'alert');
        });
    </script>
@stop

@section('add_buttons')
            <button class="btn btn-info btn-modal-modify" type="submit">등록</button>
@endsection

@section('layer_footer')
@endsection