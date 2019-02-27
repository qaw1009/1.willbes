<h5>- 회원별 상담정보관리.</h5>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bar_tabs mb-0" role="tablist">
            <li role="presentation" id="tab_counsel"><a href="javascript:boardLoad('ajaxCounsel');">상담게시판({{$tabs_data['unAnswered']}})</a></li>
            <li role="presentation" id="tab_cs"><a href="javascript:boardLoad('ajaxCs');">CS상담관리({{$tabs_data['cs']}})</a></li>
            <li role="presentation" id="tab_tm"><a href="javascript:boardLoad('ajaxTm');">TM상담관리({{$tabs_data['tm']}})</a></li>
            <li role="presentation" id="tab_profQna"><a href="javascript:boardLoad('ajaxProfQna');">교수학습Q&A({{$tabs_data['profQna']}})</a></li>
            <li role="presentation" id="tab_blackConsumer"><a href="javascript:boardLoad('ajaxBlackConsumer');">블랙컨슈머({{$tabs_data['blackConsumer']}})</a></li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // 포인트 구분 탭 active 처리
        $('#tab_{{ $_board_type }}').tab('show').addClass('bold');
    });

    function boardLoad(cmd) {
        $url = '{{site_url('member/manage/')}}' + cmd;
        $data = 'memIdx={{$memIdx}}';

        sendAjax($url,
            $data,
            function(d){
                $("#tab-content").html(d).end()
            },
            function(req, status, err){
                showError(req, status);
            }, false, 'GET', 'html');
    }
</script>