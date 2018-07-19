<html>
<head>
    <title>NICE평가정보 가상주민번호 서비스</title>
    <script language='javascript'>
        function fnLoad()
        {
            parent.opener.parent.document.vnoform.enc_data.value = "{{$sResponseData}}";
            parent.opener.parent.document.vnoform.var_id.value = "{{$sReservedParam2}}";
            //parent.opener.parent.document.vnoform.target = "Parent_window";
            //parent.opener.parent.document.vnoform.action = "";
            parent.opener.parent.document.vnoform.submit();

            self.close();
        }
    </script>
</head>
<body onLoad="fnLoad()">
</body>
</html>