@extends('willbes.pc.layouts.master_popup')

@section('content')
    <form id="frm" name="frm" method="POST" action="{{ $ret_url }}">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="cart_type" value="{{ $cart_type }}"/>
        <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>
        <input type="hidden" name="is_direct_pay" value="{{ $is_direct_pay }}"/>
        <input type="hidden" name="prod_code[]" value="{{ $prod_code }}:613001:{{ $prod_code }}"/>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('#frm').submit();
            }, 0);
        });
    </script>
@stop