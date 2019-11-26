@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
 
        .evtTop {background:#a46666 url(https://static.willbes.net/public/images/promotion/2019/11/1456_top_bg.jpg) no-repeat center top; position:relative}
    
        .evt01 {background:#fff;}        

        .evt02 {background:#dddfe1;}

        .evt03 {background:#fff; text-align:center; position:relative}
        .evt03 .box-book {position:absolute; top:850px; left:0; width:100%; height:350px; z-index:10}
        .evt03 .box-book .bx-wrapper{max-width:100% !important;}
        .evt03 .box-book li {display:inline; float:left; height:350px;}
        .evt03 .box-book li img {
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }

        .evt04 {background:#e89f15;padding-bottom:50px;} 

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1456_top.jpg" alt="2020 국제법/정치학 이상구" usemap="#Map1456a" border="0"/>
            <map name="Map1456a" id="Map1456a">
                <area shape="rect" coords="549,910,753,959" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95" target="_blank" />
                <area shape="rect" coords="759,908,963,959" href="#apply" />
            </map>                
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1456_01.jpg" alt="커리큘럼"/>          
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1456_02.jpg" alt="수강 후기"/>                    
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03.jpg" alt="퀄리티의 강의와 교재로 함께" />           
            <div class="box-book">
                <ul class="slidesBook">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book1.jpg" alt="국제법2"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book2.jpg" alt="요점정리편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book3.jpg" alt="기출문제편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book4.jpg" alt="적중문제편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book5.jpg" alt="조약편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book6.jpg" alt="국제법7"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book7.jpg" alt="국제법8"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book8.jpg" alt="모의고사편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book9.jpg" alt="이슈편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book10.jpg" alt="외교사편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book11.jpg" alt="요점정리편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book12.jpg" alt="적중문제편"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1456_03_book13.jpg" alt="실전모의고사편"/></li>
                </ul>
            </div>  
        </div>

        <div class="evtCtnsBox evt04" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1456_04.jpg" alt="수강 신청" usemap="#Map1456b" border="0"/>
            <map name="Map1456b" id="Map1456b">
                <area shape="rect" coords="820,653,1010,703" href="https://pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/152873" target="_blank" />
                <area shape="rect" coords="821,744,1012,792" href="https://pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/152874" target="_blank" />
                <area shape="rect" coords="820,834,1012,882" href="https://pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/152872" target="_blank" />
            </map>                    
        </div>
    </div>
    <!-- End Container -->  
    
    <script type="text/javascript">  
        $(document).ready(function() {
        
            var BxBook = $('.slidesBook').bxSlider({
                slideWidth: 204,
                slideMargin: 34,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });
    </script>
@stop