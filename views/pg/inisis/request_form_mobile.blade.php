{{-- 이니시스 모바일 결제요청 form --}}
<div id="payment_layer">
    <form id="payment_form" name="payment_form" method="POST" accept-charset="EUC-KR">
        <input type="hidden" name="inipaymobile_type" value="{{ $data['type'] }}"/>
        <input type="hidden" name="P_MID" value="{{ $data['mid'] }}"/>
        <input type="hidden" name="P_OID" value="{{ $data['oid'] }}"/>
        <input type="hidden" name="P_GOODS" value="{{ $data['goodname'] }}"/>
        <input type="hidden" name="P_AMT" value="{{ $data['price'] }}"/>
        <input type="hidden" name="P_UNAME" value="{{ $data['buyername'] }}"/>
        <input type="hidden" name="P_MOBILE" value="{{ $data['buyertel'] }}"/>
        <input type="hidden" name="P_EMAIL" value="{{ $data['buyeremail'] }}"/>
        <input type="hidden" name="P_NEXT_URL" value="{{ $data['next_url'] }}"/>
        <input type="hidden" name="P_NOTI_URL" value="{{ $data['noti_url'] }}"/>
        <input type="hidden" name="P_RETURN_URL" value="{{ $data['return_url'] }}"/>
        <input type="hidden" name="P_CANCEL_URL" value="{{ $data['cancel_url'] }}"/>
        <input type="hidden" name="P_QUOTABASE" value="{{ $data['quotabase'] }}"/>
        <input type="hidden" name="P_VBANK_DT" value="{{ $data['vbank_dt'] }}"/>
        <input type="hidden" name="P_VBANK_TM" value="{{ $data['vbank_tm'] }}"/>
        <input type="hidden" name="P_CHARSET" value="{{ $data['charset'] }}"/>
        <input type="hidden" name="P_RESERVED" value="{{ $data['option'] }}"/>
        <input type="hidden" name="P_NOTI" value="{{ $data['return_data'] }}"/>
    </form>
    <script type="text/javascript">
        var frm = document.payment_form;

        frm.action = '{!! $data['request_url'] !!}';
        frm.submit();
    </script>
</div>