@extends('lcms.layouts.master_modal')

@section('layer_title')
    서포터즈 회원 일괄 등록
@stop

@section('layer_header')
<form class="form-horizontal" id="_regi_form" name="_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
{!! csrf_field() !!}
{!! method_field('POST') !!}
<input type="hidden" name="mem_idx[]"/>
@endsection
@section('layer_content')
    <div class="form-group-sm">
        <div class="form-group">
            <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
            </label>
            <div class="col-md-4 form-inline item">
                {!! html_site_select('', 'site_code', 'site_code', '', '운영 사이트', 'required', '', false, $arr_base['arr_site_code']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="supporters_idx">서포터즈 선택 <span class="required">*</span>
            </label>
            <div class="col-md-4 form-inline item">
                <select class="form-control" id="supporters_idx" name="supporters_idx" title="서포터즈" required="required">
                    <option value="">서포터즈 선택</option>
                    @foreach($arr_base['arr_supporters_data'] as $row)
                        <option value="{{ $row['SupportersIdx'] }}" class="{{ $row['SiteCode'] }}">{!! $row['Title'] . " [{$row['SupportersYear']}-{$row['SupportersNumber']}]" !!}</option>
                    @endforeach
                </select>
            </div>
            <label class="control-label col-md-2">활동상태
            </label>
            <div class="col-md-4 form-inline">
                <select class="form-control" name="supporters_status_ccd">
                    @foreach($arr_base['supporters_status'] as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">일괄등록
            </label>
            <div class="col-md-10 form-inline">
                <input type="file" id="search_mem_file" name="search_mem_file" class="form-control input-sm" title="회원검색파일" value="">
                <button type="button" name="btn_member_file_upload" class="btn btn-primary btn-sm mb-0">업로드하기</button>
                <span id="selected_member_file" class="hide"></span>
            </div>
            <div class="col-md-10 col-md-offset-2 mt-5">
                <p class="form-control-static"># 첨부파일은 한줄에 한 개의 아이디로 구성된 TXT 파일로 생성</p>
            </div>
            <div class="col-md-3 col-md-offset-2 mt-5">
                <select class="form-control" id="selected_member_file2" name="selected_member_file2" size="4" style="height: 100px;">
                </select>
            </div>
            <div class="col-md-3">
                <p class="form-control-static">&lt;총 <span id="selected_member_cnt">0</span>명&gt;</p>
            </div>
        </div>
    </div>

    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $_regi_form = $('#_regi_form');
        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $_regi_form.find('select[name="supporters_idx"]').chained("#site_code");

            $_regi_form.submit(function() {
                var _url = '{{ site_url("/site/supporters/member/storeGroup/") }}';
                ajaxSubmit($_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

        function addValidate() {
            if ($_regi_form.find('input[name="mem_idx[]"]').length < 1) {
                alert('회원을 선택해 주세요.');
                return false;
            }
            return true;
        }
    </script>
@stop
@section('add_buttons')
    <button type="submit" name="_btn_regist" class="btn btn-success">등록</button>
@endsection
@section('layer_footer')
</form>
@endsection