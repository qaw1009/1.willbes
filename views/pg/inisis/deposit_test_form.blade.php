{{-- 이니시스 가상계좌 테스트 form --}}
<div style="text-align: center;">
<form id="deposit_form" name="deposit_form" method="POST" onsubmit="return false;">
    <p><strong>이니시스 가상계좌 테스트 form</strong></p>
    <table width="800" cellpadding="5" cellspacing="0" border="1" align="center">
        <tr>
            <td>주문번호</td>
            <td><input type="text" name="no_oid" value="{{ $data['OrderNo'] }}"/></td>
        </tr>
        <tr>
            <td>전문일련번호</td>
            <td><input type="text" name="no_msgseq" value="1"/></td>
        </tr>
        <tr>
            <td>상점아이디</td>
            <td><input type="text" name="id_merchant" value="{{ $data['PgMid'] }}"/></td>
        </tr>
        <tr>
            <td>Tid</td>
            <td><input type="text" name="no_tid" value="{{ $data['PgTid'] }}"/></td>
        </tr>
        <tr>
            <td>가상계좌발급은행코드</td>
            <td><input type="text" name="cd_bank" value="{{ $data['VBankPgCode'] }}"/></td>
        </tr>
        <tr>
            <td>가상계좌번호</td>
            <td><input type="text" name="no_vacct" value="{{ $data['VBankAccountNo'] }}"/></td>
        </tr>
        <tr>
            <td>입금금액</td>
            <td><input type="text" name="amt_input" value="{{ $data['RealPayPrice'] }}"/></td>
        </tr>
        <tr>
            <td>입금은행명</td>
            <td><input type="text" name="nm_inputbank" value="{{ $data['VBankName'] }}"/></td>
        </tr>
        <tr>
            <td>입금자명</td>
            <td><input type="text" name="nm_input" value="{{ $data['VBankDepositName'] }}"/></td>
        </tr>
        <tr>
            <td>거래일자</td>
            <td><input type="text" name="dt_trans" value="{{ date('Ymd') }}"/></td>
        </tr>
        <tr>
            <td>거래시간</td>
            <td><input type="text" name="tm_trans" value="{{ date('His') }}"/></td>
        </tr>
    </table>
    <div style="margin-top: 20px;">
        <button type="submit" name="btn_regi" onclick="depositSubmit();">입금통보</button>
    </div>
</form>
</div>
<script>
    function depositSubmit() {
        if (confirm('정말로 입금통보 하시겠습니까?')) {
            var form = document.deposit_form;
            form.action = '{{ app_url('/deposit/results', 'www') }}';
            form.submit();
        }
    }
</script>