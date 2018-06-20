<html>
<head>
    <title>NICE평가정보 가상주민번호 서비스</title>
    <script language='javascript'>
        function fnLoad()
        {
            // 당사에서는 최상위를 설정하기 위해 'parent.opener.parent.document.'로 정의하였습니다.
            // 따라서 귀사에 프로세스에 맞게 정의하시기 바랍니다.
            parent.opener.parent.document.vnoform.enc_data.value = "<?= $sResponseData ?>";

            parent.opener.parent.document.vnoform.param_r1.value = "<?= $sReservedParam1 ?>";
            parent.opener.parent.document.vnoform.param_r2.value = "<?= $sReservedParam2 ?>";
            parent.opener.parent.document.vnoform.param_r3.value = "<?= $sReservedParam3 ?>";

            parent.opener.parent.document.vnoform.target = "Parent_window";

            // 인증 완료시에 인증결과를 수신하게 되는 귀사 클라이언트 결과 페이지 URL
            parent.opener.parent.document.vnoform.action = "ipin_result.php";
            //parent.opener.parent.document.vnoform.submit();
        }
    </script>
</head>
<body onLoad="fnLoad()">
<?= $sResponseData ?><br><br>
<?= $sReservedParam1 ?><br><br>
<?= $sReservedParam2 ?><br><br>
<?= $sReservedParam3 ?><br><br>
</body>
</html>