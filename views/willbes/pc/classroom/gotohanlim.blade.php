<form name="form" id="form" method="post" action="{{$url}}/api/willbes.asp">
    <input type="hidden" name="enc_data" value="{{$enc_data}}" />
</form>
<script>
    document.form.submit();
</script>