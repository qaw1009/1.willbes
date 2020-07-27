{{--각종 로그스크립트(네이버, 구글등) 실행을 위해 스크립트 부분만 따로 인클루드 시킴--}}
@include('willbes.pc.layouts.header')
<!-- scripts -->
@include('willbes.pc.layouts.footer_script')
<script type="text/javascript">
    /*{{(sess_data('gw_idx'))}}*/
    $(document).ready(function(){
        {{--외부접속 로그 저장--}}
        var gateLog = function() {
            var data = {'gwIdx' : '{{$gwIdx}}', 'refer_info' : document.referrer};
            var url = frontUrl('/access/gateSave');
            sendAjax(url, data, function(ret) {
                if (ret.ret_cd) {
                   document.location.replace(ret.ret_data);
                }
            }, null, true, 'GET');
        };
        gateLog();
    })
</script>