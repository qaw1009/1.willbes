<div class="replyiFrame p_re pb40">
    <div class="replyBtnBox top">
        <ul>
            <li class="subBtn blue NSK"><a href="#none" class="btn-study" data-write-type="on">수강후기 작성하기 ></a></li>
            <li class="subBtn NSK"><a href="#none" class="btn-study" data-write-type="off">수강후기 전체보기 ></a></li>
        </ul>
    </div>
    <div id="WrapReply"></div>

    <iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{site_url("/support/studyComment/listFrame?cate=".$__cfg['CateCode']."&prof_idx=".$data['ProfIdx'])}}"></iframe>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-study').click(function () {
                var ele_id = 'WrapReply';
                var data = {
                    'ele_id' : ele_id,
                    'show_onoff' : $(this).data('write-type'),
                    'cate_code' : '{{$__cfg['CateCode']}}'
                };
                sendAjax('{{ site_url('/support/studyComment/') }}', data, function(ret) {
                    $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                }, showAlertError, false, 'GET', 'html');
            });
        });

        function resizeIframe(iframe) {
            iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
        }
    </script>

    <div class="replyBtnBox btm">
        <ul>
            <li class="subBtn blue NSK"><a href="#none" class="btn-study" data-write-type="on">수강후기 작성하기 ></a></li>
            <li class="subBtn NSK"><a href="#none" class="btn-study" data-write-type="off">수강후기 전체보기 ></a></li>
        </ul>
    </div>
</div>