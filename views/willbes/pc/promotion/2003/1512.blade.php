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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/
        .wb_top {background:#193442 url(https://static.willbes.net/public/images/promotion/2020/01/1512_top_bg.jpg) no-repeat center top;}
        .wb_top div {width: 1120px;margin: 0 auto;position: relative;}
        .wb_top span{position:absolute;display:block;top:935px;width:252px;z-index:10;}
        .wb_top span.sp01 {left: 100px; animation: sp01 1.5s linear infinite;}
        .wb_top span.sp02 {left: 350px; animation: sp02 1.5s linear infinite;}
        .wb_top span.sp03 {left: 600px; animation: sp03 1.5s linear infinite;}
        .wb_top span.sp04 {left: 850px; animation: sp04 1.5s linear infinite;}

        @@keyframes sp01{
		from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
        }
        @@keyframes sp02{
            from{transform:scale(0.9)}50%{transform:scale(1)}to{transform:scale(0.9)}
        }
        @@keyframes sp03{
            from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
        }
        @@keyframes sp04{
            from{transform:scale(0.9)}50%{transform:scale(1)}to{transform:scale(0.9)}
        }

        
        .wb_01,.wb_02{background:#fff;}

        .wb_03 {background:#253036 url(https://static.willbes.net/public/images/promotion/2020/01/1512_03_bg.jpg) no-repeat center top;}

        .wb_04 {background:#253036 url(https://static.willbes.net/public/images/promotion/2020/01/1512_04_bg.jpg) no-repeat center top;}

        .wb_05{background:#fff;}
    </style>

     <div class="p_re evtContent NGR" id="evtContainer">      

        <div class="evtCtnsBox wb_top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_top.jpg">   
                    <span class="sp01">
                        <a href="#event01">
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_top_01.png">                    
                        </a>                
                    </span>  
                    <span class="sp02">
                        <a href="#event02">
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_top_02.png">                    
                        </a>                
                    </span>        
                    <span class="sp03">
                        <a href="#event03">
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_top_03.png">                    
                        </a>                
                    </span>        
                    <span class="sp04">
                        <a href="#event04">
                            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_top_04.png">                    
                        </a>                
                    </span>           
            </div>           
        </div>

        <div class="evtCtnsBox wb_01" id="event01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_01.jpg">
        </div>

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif
      
        <div class="evtCtnsBox wb_02" id="event02">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_02_1.gif">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_02_2.jpg">
        </div>   

         <div class="evtCtnsBox wb_03" id="event03">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_03.jpg" usemap="#Map1512b" border="0">
            <map name="Map1512b" id="Map1512b">
                <area shape="rect" coords="195,718,294,751" href="https://pass.willbes.net/promotion/index/cate/3019/code/1509" target="_blank" />
                <area shape="rect" coords="427,719,527,751" href="https://pass.willbes.net/promotion/index/cate/3020/code/1519" target="_blank" />
                <area shape="rect" coords="597,719,695,750" href="https://pass.willbes.net/promotion/index/cate/3020/code/1520" target="_blank" />
                <area shape="rect" coords="817,728,917,761" href="https://pass.willbes.net/promotion/index/cate/3023/code/1060" target="_blank" />
                <area shape="rect" coords="195,1073,294,1103" href="https://pass.willbes.net/promotion/index/cate/3035/code/1480" target="_blank" />
                <area shape="rect" coords="427,1073,526,1104" href="https://pass.willbes.net/promotion/index/cate/3028/code/1071" target="_blank" />
                <area shape="rect" coords="595,1073,696,1103" href="https://pass.willbes.net/promotion/index/cate/3028/code/1068" target="_blank" />
                <area shape="rect" coords="816,1072,917,1105" href="https://pass.willbes.net/promotion/index/cate/3024/code/1313" target="_blank" />
            </map>
        </div>   

         <div class="evtCtnsBox wb_04" id="event04">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_04.jpg">
        </div>  

         <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1512_05.jpg">
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

@stop