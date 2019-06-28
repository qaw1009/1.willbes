<h4>● 서포터즈 미션! 과제를 수행하라</h4>
<div>
    윌비스 신광은 경찰 학원 및 사이트 개선을 위한 매월 정기 주제별 과제 참여 공간입니다.<br>
    바쁘시더라도 서포터즈 여러분들의 성실한 과제 수행을 당부 드립니다.<br>
    과제를 제출하시면 포인트 1천점을 적립해 드립니다.<br>
    <span class="tx-red">※ 정당한 사유 없이 3회 이상 과제 미제출시 서포터즈 혜택을 제한합니다.</span>
</div>

<div class="mt30" id="assignment_table"></div>

{{--과제제출--}}
<div id="EDITPASS" class="willbes-Layer-Black"></div>

{{--과제수정--}}
<div id="MARKPASS" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    $(document).ready(function(){
        Main_AssignmentListAjax(1);
    });

    function Main_AssignmentListAjax(num) {
        var data = {
            'supporters_idx' : '{{ $data['SupportersIdx'] }}',
            'page' : num
        };
        sendAjax('{{ front_url('/supporters/assignment/index') }}', data, function(ret) {
            $('#assignment_table').html(ret);
        }, showAlertError, false, 'GET', 'html');
    }
</script>