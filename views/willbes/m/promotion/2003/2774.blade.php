@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/


   
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2774m_top.jpg" alt="소방패스 1개월 무료"/>
            <a href="#free" title="소방패스 무료 수강" style="position: absolute; left: 9.58%; top: 64.86%; width: 79.03%; height: 15.69%; z-index: 2;"></a>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2774m_01.jpg" alt="소방직 시험 어떻게 변화하고 있나?"/>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2774m_02.jpg" alt="왜 윌비스 소방PASS인가?"/>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up" id="free">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2774m_03.jpg" alt="윌비스 소방PASS"/>
                <a href="https://pass.willbes.net/m/periodPackage/show/cate/3019/pack/648001/prod-code/201194" title="소방패스 무료 수강" style="position: absolute; left: 5.69%; top: 77.02%; width: 88.75%; height: 11.86%; z-index: 2;"></a>
            </div>
        </div>
</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
    AOS.init();
    });
</script>


@stop