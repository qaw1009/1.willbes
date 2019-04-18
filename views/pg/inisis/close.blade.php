{{-- 취소 처리로 Overlay 창을 닫아주는 역활을 하는 페이지 --}}
<script language="javascript" type="text/javascript">
    var layer = parent.document.getElementById('payment_layer');
    var js = parent.document.getElementById('payment_js');
    var btn_pay = parent.document.getElementById('btn_pay');

    if (layer) {
        layer.parentNode.removeChild(layer);
    }

    if (js) {
        js.parentNode.removeChild(js);
    }

    if (btn_pay) {
        //btn_pay.setAttribute('data-is-clicked', '');
    }
</script>
<script language="javascript" type="text/javascript" src="https://stgstdpay.inicis.com/stdjs/INIStdPay_close.js" charset="UTF-8"></script>