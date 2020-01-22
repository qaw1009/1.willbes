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
        .wb_top {background:#193442 url(https://static.willbes.net/public/images/promotion/2020/01/1513_top_bg.jpg) no-repeat center top;}
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

        .wb_03 {background:#253036 url(https://static.willbes.net/public/images/promotion/2020/01/1513_03_bg.jpg) no-repeat center top;}

        .wb_04 {background:#253036 url(https://static.willbes.net/public/images/promotion/2020/01/1513_04_bg.jpg) no-repeat center top;}

        .wb_05{background:#fff;}
    </style>

     <div class="p_re evtContent NGR" id="evtContainer">      

        <div class="evtCtnsBox wb_top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1513_top.jpg">   
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
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1513_03.jpg" usemap="#Map1513a" border="0">
            <map name="Map1513a" id="Map1513a">
                <area shape="rect" coords="191,824,269,851" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161155" target="_blank" />
                <area shape="rect" coords="321,824,400,851" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161154" target="_blank" />
                <area shape="rect" coords="454,824,532,851" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/161160" target="_blank" />
                <area shape="rect" coords="596,824,675,851" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161159" target="_blank" />
                <area shape="rect" coords="727,824,806,852" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161156" target="_blank" />
                <area shape="rect" coords="859,824,939,851" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/161161" target="_blank"/>
                <area shape="rect" coords="257,1079,336,1106" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161163" target="_blank" />
                <area shape="rect" coords="521,1078,599,1107" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161162" target="_blank" />
                <area shape="rect" coords="795,1078,874,1107" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/161164" target="_blank"/>
            </map>            
        </div>   

         <div class="evtCtnsBox wb_04" id="event04">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1513_04.jpg">
        </div>  

         <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1513_05.jpg">
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

@stop