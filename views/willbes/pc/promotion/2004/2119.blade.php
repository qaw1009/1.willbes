@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:11;}
        .sky a {display:block; margin-bottom:10px}
        
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2119_top_bg.jpg) no-repeat center;}    

        .wb_01 {background:#fff}
        .wb_02 {padding-bottom:150px}
        .wb_02 a {display:block; width:600px; margin:0 auto; padding:20px; text-align:center; font-size:30px; color:#fff; background:#000; border-radius:50px;}
        .wb_02 a:hover {background:#012d98}
                      
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3059/prod-code/194747" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2119_sky01.png" alt="1~5순환">
            </a>
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3059/prod-code/201306" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2119_sky02.png" alt="2~5순환">
            </a>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">             
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2119_top.jpg" alt="김동진법원팀 동행5기 온라인관리반" />  
        </div>       

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2119_01_01.jpg" alt="온라인관리반 소개" />
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2119_01_02.jpg" alt="만족 후기" />
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 확인하기" style="position: absolute; left: 34.29%; top: 79.39%; width: 31.07%; height: 5.4%; z-index: 2;"></a>
            </div>
        </div>  

        <div class="evtCtnsBox wb_02 NSK-Black" data-aos="fade-up">
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" title="수강신청하기">온라인관리반 상품 확인하기 ></a>
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