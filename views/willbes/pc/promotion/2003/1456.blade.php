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
 
        .evtTop {background:#dd6d6c url(https://static.willbes.net/public/images/promotion/2019/12/1456_top_bg.jpg) no-repeat center top; position:relative}
    
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

        .evt04 {background:#079aa2;}
        .evt05 {background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1456_top.gif" alt="이상구 티패스" usemap="#Map1456z" border="0">
            <map name="Map1456z" id="Map1456z">
                <area shape="rect" coords="106,1121,546,1192" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95" target="_blank" />  
                <area shape="rect" coords="577,1122,1015,1192" href="#apply" />
            </map>                         
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1456_01.jpg" alt="마지막시기 이상구 교수님과 함께"/>          
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1456_02.jpg" alt="수강 후기"/>                    
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1456_03.jpg" alt="퀄리티의 강의와 교재로 함께" />           
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
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1456_04.jpg" alt="수강 신청" usemap="#Map1456y" border="0">
            <map name="Map1456y" id="Map1456y">
                <area shape="rect" coords="817,649,1007,708" href="https://pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/152873" target="_blank" />
                <area shape="rect" coords="818,740,1008,797" href="https://pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/152874" target="_blank" />
                <area shape="rect" coords="817,830,1008,888" href="https://pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/152872" target="_blank" />
            </map>                   
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1456_05.jpg" alt="이용안내 및 유의사항"/>          
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