<OBJECT id="ctkprint_bar" CLASSID="CLSID:B28045C9-D1F9-43BF-9198-3777E49BFF57" CODEBASE="/public/cabs/ctk_barcode.CAB#version=1,0,0,1"></OBJECT>
<script type="text/javascript">
    $(document).ready(function() {
        // 프린트 버튼 클릭
        $('button[name="_btn_print"]').on('click', function() {
            printBar();
        });
    });
</script>