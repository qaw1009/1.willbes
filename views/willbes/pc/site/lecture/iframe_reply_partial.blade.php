<div class="replyiFrame p_re">
    <div class="replyBtnBox top">
        <ul>
            <li class="subBtn blue NSK"><a href="#none" class="btn-study" data-write-type="on">수강후기 작성하기 ></a></li>
            <li class="subBtn NSK"><a href="#none" class="btn-study" data-write-type="off">수강후기 전체보기 ></a></li>
        </ul>
    </div>
    <div id="WrapReply"></div>

    <iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{front_url("/support/studyComment/listFrame?cate=".$__cfg['CateCode']."&prod_code=".$data['ProdCode'])}}"></iframe>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-study').click(function () {
                var is_login = '{{sess_data('is_login')}}';
                var ele_id = 'WrapReply';
                var data = {
                    'ele_id' : ele_id,
                    'show_onoff' : $(this).data('write-type'),
                    'cate_code' : '{{$__cfg['CateCode']}}',
                    'prod_code' : '{{$data['ProdCode']}}',
                    'subject_idx' : '{{$data['SubjectIdx']}}',
                    'subject_name' : encodeURIComponent('{{$data['ProdName']}}'),
                    'prof_idx' : '{{$data['ProfIdx']}}'
                };

                if ($(this).data('write-type') == 'on' && is_login != true) {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                }

                sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                    $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                }, showAlertError, false, 'GET', 'html');
            });
        });

        function resizeIframe(iframe) {
            iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
        }
    </script>
</div>