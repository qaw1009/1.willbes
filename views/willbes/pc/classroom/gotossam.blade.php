<form name="form" id="form" method="post" action="http://pressam.willbes.net/login/login2.html">
    <input type="hidden" name="enc_data" value="{{$enc_data}}" />
    <input type="hidden" name="event_cd" value="{{$param}}" />
</form>
<script>
    document.form.submit();
</script>