<form id="myclass_regi_form" name="myclass_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="idx" value="{{ $smc_idx }}"/>
    <input type="hidden" name="supporters_idx" value="{{ $supporters_idx }}"/>

    <span class="b-close"><img src="{{ img_url('sub/close.png') }}"></span>
    <h3 class="NSK-Black">나의 소개</h3>
    <div class="content">
        <div class="mt30">
            <table class="tableTypeA">
                <col width="15%"/>
                <col width=""/>
                <tbody>
                <tr>
                    <th>공개여부</th>
                    <td class="tx-left">
                        <input type="radio" id="is_public_y" name="is_public" value="Y" @if($data['IsPublic']=='N')checked="checked"@endif><label for="is_public_y">공개</label>
                        <input type="radio" id="is_public_n" name="is_public" class="ml20" value="N" @if($method == 'POST' || $data['IsPublic']=='N')checked="checked"@endif><label for="is_public_n">비공개</label>
                    </td>
                </tr>
                <tr>
                    <th>내용<span class="tx-light-blue">(*)</span></th>
                    <td class="tx-left">
                        <textarea id="myclass_content" name="myclass_content" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>첨부</th>
                    <td class="tx-left">
                        <ul class="attach">
                            <li class="mb5">
                                <input type="file" id="attach_file" name="attach_file" class="input-file" size="3">
                            </li>
                        </ul>
                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                        • jpg, gif, png만 등록 가능합니다.
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="btnsSt3">
                <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray btn-myclass-list">
                    <span class="tx-purple-gray">취소</span>
                </button>
                <button type="submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray btn-myclass-submit">
                    <span>저장</span>
                </button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    var $myclass_regi_form = $('#myclass_regi_form');

    $(document).ready(function() {
        $('.btn-myclass-list').click(function () {
            $('.b-close').trigger('click');
        });

        $('.btn-myclass-submit').click(function() {
            var _url = '{{front_url('/supporters/myClass/store')}}';

            ajaxSubmit($myclass_regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    /*location.reload();*/
                    $('.b-close').trigger('click');
                    Main_MyClassListAjax(1);
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        var addValidate = function () {
            if ($('#myclass_content').val() == '') {
                alert('내용을 입력해 주세요.');
                return false;
            }

            return true;
        }
    });
</script>