<div id="WrapReply"></div>
<script>
    // 수강후기 레이어팝업
    function go_study_comment_popup(){
        var ele_id = 'WrapReply';
        var _url = "{{front_url('/support/studyComment/')}}";

        @if(empty($arr_base['promotion_otherinfo_data'][0]) === false && empty($arr_promotion_params['cate_code']) === false)
            var data = {
                'ele_id' : ele_id,
                'cate_code' : '{{ $arr_promotion_params['cate_code'] }}',
                'prof_idx' : '{{ element('ProfIdx', $arr_base['promotion_otherinfo_data'][0]) }}',
                'subject_idx' : '{{ element('SubjectIdx', $arr_base['promotion_otherinfo_data'][0]) }}'
            };
        @else
            alert('필수값 누락 되었습니다.')
            return;
        @endif

        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>