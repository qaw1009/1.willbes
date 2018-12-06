<iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{site_url("/classroom/assignment?p={$lec['ProdCode']}&pf={$lec['ProfIdx']}&sd=".$lec['LecStartDate']."&ed=".$lec['RealLecEndDate'])}}"></iframe>
<div id="EDITPASS" class="willbes-Layer-Black"></div>
<div id="MARKPASS" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 65) + "px";
    }

    function open_popup(open_target, open_content, notice_idx) {
        var ele_id = '';
        var data = '';
        var _url = '';

        if (open_target == 'ing') {
            ele_id = 'EDITPASS';
            data = {'ele_id' : ele_id, 'board_idx' : notice_idx};
            _url = '{{ site_url('/classroom/assignment/create') }}';
        } else {
            ele_id = 'MARKPASS';
            data = {'ele_id' : ele_id, 'board_idx' : notice_idx, 'tab' : open_target, 'oc' : open_content};
            _url = '{{ site_url('/classroom/assignment/show') }}';
        }

        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>