<h5>- 회원별 상담정보관리.</h5>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bar_tabs mb-0" role="tablist">
            <li role="presentation" id="tab_counsel"><a href="javascript:crmLoad('ajaxSms');">SMS관리</a></li>
            <li role="presentation" id="tab_cs"><a href="javascript:crmLoad('ajaxMessage');">쪽지관리</a></li>
            <li role="presentation" id="tab_tm"><a href="javascript:crmLoad('ajaxMail');">메일관리</a></li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // 포인트 구분 탭 active 처리
        $('#tab_{{ $_crm_type }}').tab('show').addClass('bold');
    });

    function crmLoad(cmd) {
        /*$url = '{{site_url('member/manage/')}}' + cmd;
        $data = 'memIdx={{$memIdx}}';

        sendAjax($url,
            $data,
            function(d){
                $("#tab-content").html(d).end()
            },
            function(req, status, err){
                showError(req, status);
            }, false, 'GET', 'html');*/
    }
</script>