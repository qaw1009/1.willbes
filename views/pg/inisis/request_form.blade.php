{{-- 이니시스 결제요청 form --}}
<div id="payment_layer">
    <form id="payment_form" name="payment_form" method="POST">
        <input type="hidden" name="version" value="{{ $data['version'] }}"/>
        <input type="hidden" name="mid" value="{{ $data['mid'] }}"/>
        <input type="hidden" name="oid" value="{{ $data['oid'] }}"/>
        <input type="hidden" name="goodname" value="{{ $data['goodname'] }}"/>
        <input type="hidden" name="price" value="{{ $data['price'] }}"/>
        <input type="hidden" name="currency" value="{{ $data['currency'] }}"/>
        <input type="hidden" name="buyername" value="{{ $data['buyername'] }}"/>
        <input type="hidden" name="buyertel" value="{{ $data['buyertel'] }}"/>
        <input type="hidden" name="buyeremail" value="{{ $data['buyeremail'] }}"/>
        <input type="hidden" name="gopaymethod" value="{{ $data['gopaymethod'] }}"/>
        <input type="hidden" name="timestamp" value="{{ $data['timestamp'] }}"/>
        <input type="hidden" name="signature" value="{{ $data['signature'] }}"/>
        <input type="hidden" name="mKey" value="{{ $data['mKey'] }}"/>
        <input type="hidden" name="charset" value="{{ $data['charset'] }}"/>
        <input type="hidden" name="languageView" value="{{ $data['languageView'] }}"/>
        <input type="hidden" name="payViewType" value="{{ $data['payViewType'] }}"/>
        <input type="hidden" name="closeUrl" value="{{ $data['closeUrl'] }}"/>
        <input type="hidden" name="popupUrl" value="{{ $data['popupUrl'] }}"/>
        <input type="hidden" name="returnUrl" value="{{ $data['returnUrl'] }}"/>
        <input type="hidden" name="nointerest" value="{{ $data['nointerest'] }}"/>
        <input type="hidden" name="quotabase" value="{{ $data['quotabase'] }}"/>
        <input type="hidden" name="offerPeriod" value=""/>
        <input type="hidden" name="acceptmethod" value="{{ $data['acceptmethod'] }}"/>
        <input type="hidden" name="merchantData" value="{{ $data['merchantData'] }}"/>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            var s = document.createElement('script');
            s.src = '{{ $data['script_src'] }}';
            s.id = 'payment_js';
            s.charset = 'UTF-8';
            $('body').append(s);

            setTimeout(function() {
                INIStdPay.pay('payment_form');
            }, 500);
        });
    </script>
</div>