@php
    if(empty($data) === true) {
        echo '<p class="ml-30 mt-30 mb-30">등록된 나의 소개 데이터가 없습니다.</p>';
        exit;
    }
@endphp

<div class="x_panel mt-10">
    <form class="form-horizontal" id="regi_form_myclass" name="regi_form_myclass" method="POST" enctype="multipart/form-data" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_hidden_data as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}">
        @endforeach
        <input type="hidden" name="smc_idx" value="{{ $data['SmcIdx'] }}">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1-1" for="attach_file">첨부</label>
                <div class="col-md-10 form-inline">
                    <input type="file" id="attach_file" name="attach_file" class="form-control input-file" title="첨부"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1" for="is_public_y">공개여부</label>
                <div class="col-md-4 item form-inline">
                    <div class="radio">
                        <input type="radio" id="is_public_y" name="is_public" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsPublic']=='Y')checked="checked"@endif/> <label for="is_public_y" class="input-label">사용</label>
                        <input type="radio" id="is_public_n" name="is_public" class="flat" value="N" @if($data['IsPublic']=='N')checked="checked"@endif/> <label for="is_public_n" class="input-label">미사용</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1" for="myclass">나의소개</label>
                <div class="col-md-10 item form-inline">
                    <textarea id="myclass_content" name="myclass_content" class="form-control" rows="7" title="내용" placeholder="" style="width: 70%;height: 300px;">{!! $data['Content'] !!}</textarea>
                </div>
            </div>

            <div class="form-group text-center btn-wrap mt-50">
                <button type="submit" class="btn btn-success mr-10">저장</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    var $regi_form = $('#regi_form_myclass');

    $(document).ready(function() {
        // 파일삭제
        $('.file-delete').click(function() {
            var _url = '{{ site_url("/board/destroyFile/") }}' + getQueryString();
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'attach_idx' : $(this).data('attach-idx')
            };
            if (!confirm('정말로 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showError, false, 'POST');
        });

        // ajax submit
        $regi_form.submit(function() {
            var _url = '{{ site_url("/site/supporters/member/storeMyClass") }}' + getQueryString();

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        });
    });
</script>