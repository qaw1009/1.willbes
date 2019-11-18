<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript" src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
    <script src="/public/js/util.js?ver={{time()}}"></script>
    <script type="text/javascript" src="/public/js/willbes/ezPDF_Willbes.js"></script>
    <script type="text/javascript">
        var ezpdf = new ezPDFWFLauncher(ezPDFWSPrinter, ezPDFData, 1);

        function Pr()
        {
@if($type == 'SAMPLE')
            ezpdf._debug = 0;
            var urlPdf = encodeURIComponent('https://static.willbes.net/public/uploads/ezpdf/sample.pdf');
            ezpdf.SetPDF(urlPdf, false);
            var eventURL = "";
            eventURL = encodeURIComponent(eventURL);
            ezpdf.SetEventURL(eventURL);
            ezpdf.SetSecData(2);
            ezpdf.Launch(false);
            setTimeout(function(){self.close();},3000);
@else
            var url = '{{front_url('classroom/on/getDownload/'.$orderidx.'/'.$prodcode.'/'.$prodcodesub.'/'.$lecidx.'/'.$unitidx)}}';
            var data = '';
            sendAjax(url,
                data,
                function (d) {
                    var eventURL = '{{front_url('classroom/on/setPrintLog/'.$orderidx.'/'.$prodcode.'/'.$prodcodesub.'/'.$lecidx.'/'.$unitidx.'/'.sess_data('mem_idx').'/t/')}}';
                    ezpdf._debug = 0;
                    ezpdf.SetPDF(d.ret_data.pdfUrl, false);
                    ezpdf.SetEventURL(eventURL);
                    ezpdf.SetSecData(2);
                    ezpdf.Launch(false);
                    setTimeout(function () {
                        self.close();
                    }, 3000);
                },
                function (ret, status) {
                    alert(ret.ret_msg);
                    self.close();
                }, false, 'GET', 'json');
@endif
        }
    </script>
</head>
<body onload='javascript:Pr();'>
</body>
</html>