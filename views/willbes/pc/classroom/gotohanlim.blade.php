<form name="form" id="form" method="post" action="{{$url}}/api/willbes.asp">
    <input type="hidden" name="enc_data" value="{{$enc_data}}" />
    <input type="hidden" name="param" value="{{$param}}" />
</form>
<script>
    document.form.submit();
</script>