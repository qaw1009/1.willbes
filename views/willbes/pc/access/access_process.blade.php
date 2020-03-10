@include('willbes.pc.layouts.header')
<!-- 광고 스크립트 삽입 //-->
<!-- 광고 스크립트 삽입 //-->
<body>

</body>
<script type="text/javascript">
    /*
    {{(sess_data('gw_idx'))}}
    */
    $(document).ready(function(){
        @if(empty($result_msg) !== true)
        {{--alert('{{$result_msg}}');--}}
        @endif
        document.location.replace('{{ empty($move_url) ? site_url('/') : $move_url}}');
    })
</script>
</html>

