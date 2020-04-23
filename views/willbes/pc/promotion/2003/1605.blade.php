@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/
        .sky{position:fixed;top:250px;right:10px;z-index:1;}
        .wb_top {background:#f767a4 url(https://static.willbes.net/public/images/promotion/2020/04/1605_top_bg.jpg) no-repeat top;}   
        .wb_youtube {position:relative;}
        .wb_youtube iframe {width:880px; height:495px;position:absolute;left:50%;margin-left:-440px;bottom:172px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/free/prod-code/164242" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1605_sky.png" alt="스카이베너">       
            </a>
        </div> 

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1605_top.jpg"  alt="이섬가 영어" />            
        </div>   

        <div class="evtCtnsBox wb_youtube">
            <iframe src="https://www.youtube.com/embed/t294DalFoEk?rel=0" frameborder="0" allowfullscreen="" id="youtube_watch"></iframe>   
        </div>       

         <div class="evtCtnsBox wb_evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1605_01.jpg"  alt="온라인 과외식 수업" />
        </div>    

        <div class="evtCtnsBox wb_evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1605_02.jpg"  alt="기초부터 꼼꼼한 영어" />
        </div>  

        <div class="evtCtnsBox wb_evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1605_03.gif"  alt="강의교재 무료증정" />
        </div> 

        <div class="evtCtnsBox wb_evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1605_04.jpg"  alt="수강신청" usemap="#Map1605_apply" border="0" />
            <map name="Map1605_apply" id="Map1605_apply">
                <area shape="rect" coords="792,55,977,116" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162850" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="792,230,977,291" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162853" target="_blank" onfocus='this.blur()' />
            </map>
        </div>      

    </div>
    <!-- End Container -->

    <script language="javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop