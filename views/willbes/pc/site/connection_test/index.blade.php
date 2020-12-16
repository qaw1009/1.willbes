@extends('willbes.pc.layouts.master')

@section('content')

    <script>
        $(function (){
            @if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
                setTimeout(function() {
                    var _url = "{{ site_url('/dbConnectionTest/pingStage') }}";
                    var data = {
                        '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                    };
                    sendAjax(_url, data, function(ret) {
                        if (ret.ret_data) {
                            alert(1);
                        }
                    }, showError, false, 'POST');
                }, 1000);
            @endif
        });
    </script>

@stop