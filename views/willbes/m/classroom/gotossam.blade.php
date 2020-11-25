<form name="form" id="form" method="post" action="http://ssam.miraenet.com/m/login/login2.html">
    <input type="hidden" name="enc_data" value="{{$enc_data}}" />
    <input type="hidden" name="param" value="{{$param}}" />
</form>
<script>
    document.form.submit();
</script>