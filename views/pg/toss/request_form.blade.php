{{-- 토스 결제요청 --}}
<div id="payment_layer">
    <script src="https://js.tosspayments.com/v1"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                var tossPayments = TossPayments('{{ $data['client_key'] }}');
                tossPayments
                    .requestPayment('{{ $data['pay_method'] }}', {!! $data['pay_params'] !!})
                    .catch(function (error) {
                        if (error.code === 'USER_CANCEL') {
                            // 취소 이벤트 처리
                            sendAjax('{{ $data['close_url'] }}', {
                                '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                                '_method' : 'POST'
                            });
                        } else {
                            alert(error.message);
                        }
                        $('#payment_layer').remove();
                        $('#chk_payment_layer').remove();
                    });
            }, 500);
        });
    </script>
</div>
<div id="chk_payment_layer"></div>
