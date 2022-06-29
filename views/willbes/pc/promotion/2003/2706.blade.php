@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2706_top_bg.jpg) no-repeat center top;}
        .evt_top .ani{position:absolute;left:50%;top:275px;margin-left:-310px}        
        .evt_top .roll_wave {position:relative;overflow:hidden;width:1120px;margin:0 auto;left:400px;bottom:900px;}       
        .evt_top .wr_waves .slide {padding:10px 0;}

        .evt07 {background:#EEEDF1}

        /************************************************************/

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_top.jpg" alt="김동진 법원팀">
            <div class="ani">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_title.png" alt="티패스" data-aos="zoom-in">
            </div>
            <div class="roll_wave">
                <div class="wr_waves NSK-Black">                  
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_wave01.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_wave02.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_wave03.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_wave04.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_wave05.png" alt=""> 
                    </div>
                    <div class="slide">
                        <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_wave06.png" alt=""> 
                    </div>
                </div>              
            </div>   
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_01.jpg" alt="1~5순환 티패스" />
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199180" alt="김동진" target="_blank" style="position: absolute;left: 6.28%;top: 51.23%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199181" alt="이덕훈" target="_blank" style="position: absolute;left: 30.28%;top: 51.23%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199182" alt="문형석" target="_blank" style="position: absolute;left: 54.48%;top: 51.23%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199183" alt="유안석" target="_blank" style="position: absolute;left: 78.58%;top: 51.23%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199184" alt="이국령" target="_blank" style="position: absolute;left: 6.28%;top: 91.27%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199185" alt="박재현" target="_blank" style="position: absolute;left: 30.28%;top: 91.27%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199186" alt="박초롱" target="_blank" style="position: absolute;left: 54.48%;top: 91.27%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/199187" alt="임진석" target="_blank" style="position: absolute;left: 78.58%;top: 91.27%;width: 15.63%;height: 4.24%;z-index: 2;"></a>
            </div>
        </div>
        
        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_02.jpg" alt="압도적 1위" />
        </div>
        
        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_03.jpg" alt="통행의 힘" />
        </div>
        
        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_04.jpg" alt="교수진 및 순환별 맛보기 강의" />
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx" alt="예비순환" target="_blank" style="position: absolute;left: 9.38%;top: 93.77%;width: 11.03%;height: 3.84%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" alt="1순환" target="_blank" style="position: absolute;left: 22.68%;top: 93.77%;width: 11.03%;height: 3.84%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" alt="2순환" target="_blank" style="position: absolute;left: 35.68%;top: 93.77%;width: 11.03%;height: 3.84%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" alt="3순환" target="_blank" style="position: absolute;left: 48.68%;top: 93.77%;width: 11.03%;height: 3.84%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" alt="4순환" target="_blank" style="position: absolute;left: 61.58%;top: 93.77%;width: 11.03%;height: 3.84%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" alt="5순환" target="_blank" style="position: absolute;left: 74.88%;top: 93.77%;width: 11.03%;height: 3.84%;z-index: 2;"></a>            
            </div>
        </div>
        
        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_05.jpg" alt="동행 면접스터디" />
		</div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_06.jpg" alt="절대 만족 후기" />
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" alt="더많은 합격수기 확인하기" target="_blank" style="position: absolute;left: 34.88%;top: 78.77%;width: 30.03%;height: 4.99%;z-index: 2;"></a> 
            </div>
		</div>

        <div class="evtCtnsBox evt07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2706_07.jpg" alt="상품 둘러보기" />
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2701" alt="2023 오프라인 학원 종합반" target="_blank" style="position: absolute;left: 30.88%;top: 26.01%;width: 38.33%;height: 2.35%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" alt="자세히 알아보기" target="_blank" style="position: absolute;left: 62.88%;top: 30.01%;width: 18.33%;height: 4.35%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" alt="2023 오프라인 온란인관리반" target="_blank" style="position: absolute;left: 30.88%;top: 44.45%;width: 38.33%;height: 2.35%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2696" alt="온라인 패스" target="_blank" style="position: absolute;left: 30.88%;top: 62.88%;width: 38.33%;height: 2.35%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/index/cate/3035/pack/648001" alt="온라인 패키지" target="_blank" style="position: absolute;left: 30.88%;top: 92.81%;width: 38.33%;height: 2.35%;z-index: 2;"></a>
            </div>
        </div>
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );      
    </script>

    <link rel="stylesheet" type="text/css" href="/public/vendor/jquery/slick/slick.css">
    <script src="/public/vendor/jquery/slick/jquery.slick.min.js"></script>
    <script type="text/javascript">
        $ ('.wr_waves').slick({
            dots: false,
            arrows: true,
            infinite: true,
            autoplay:true,
            autoplaySpeed:0,
            speed: 2500,
            slidesToShow: 5,
            slidesToScroll: 1,
            adaptiveHeight: true,
            draggable: false,
            cssEase: 'linear',
            pauseOnHover:false,
            vertical:true
        });       
    </script>

@stop