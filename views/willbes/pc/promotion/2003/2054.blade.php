@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
    /*****************************************************************/ 
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2054_top_bg.jpg) no-repeat center top;margin-top:20px;}   
    
    .evt01 {background:#E5E5E5;}    

    .evt_02 {background:#fff;padding-bottom:100px;}
    .evt_02 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646}
    .evt_02 .evt02_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	   
    .evt_02 .evt02_box .evt{color:#fff;vertical-align:baseline;border-radius:30px;background:#f35a61;padding:0 10px;}

    </style> 

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2054_top.jpg" alt="7급 피셋 오픈 클래스" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2054_01.jpg" alt="바로가기 및 유의사항" usemap="#Map2054_link" border="0">
            <map name="Map2054_link" id="Map2054_link">
                <area shape="rect" coords="34,961,224,1036" href="https://cafe.naver.com/gugrade" target="_blank" />
                <area shape="rect" coords="233,960,425,1036" href="https://cafe379.daum.net/_c21_/home?grpid=8mGI" target="_blank" />
                <area shape="rect" coords="435,959,624,1036" href="https://gall.dcinside.com/board/lists?id=7th" target="_blank" />
                <area shape="rect" coords="634,958,824,1038" href="https://pass.willbes.net/home/index/cate/3103" target="_blank" />
                <area shape="rect" coords="834,959,1084,1038" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이미지 다운받기">
            </map>        
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif 

        <div class="evtCtnsBox evt_02">
            <div class="evt02_box" id="apply">       
            <div class="title NSK-Black" style="padding:75px 0 25px;"> <span class="evt">OPEN CLASS</span ><span style="padding-left:10px;vertical-align:top;">7급 PSAT</span ></div>                 
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif   
            <div class="title NSK-Black" style="padding:75px 0 25px;"> <span class="evt">OPEN CLASS </span><span style="padding-left:10px;vertical-align:top;">7급 PSAT 단강좌</span ></div>     
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif                    
            </div>
		</div> 
                
    </div>
    <!-- End Container --> 
@stop