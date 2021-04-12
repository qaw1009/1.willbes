@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {margin-top:20px}
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/     

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2149_top_bg.jpg) no-repeat center top; } 
        .youtube {position:absolute; top:659px; left:50%;z-index:1;margin-left:-437px}
        .youtube iframe {width:531px; height:312px}  
       
        .evt02 {background:#EDEDED;}    

        .evt03 {position:relative;}    
        .evt03 .liveWrap {position:absolute;left:50%;top:79%;margin-left:-600px;}   

        .evt04 {padding-top:575px;} 

        .evt05 {padding-top:100px;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  

        <div class="evtCtnsBox evttop">                 
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2149_top.jpg"  title="한덕현 영어 라이브"> 
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/m2cCBWjSp90?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>                       
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2149_01.jpg" title="국가직 합격 풀코스">              
        </div> 

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2149_02.jpg" title="합격도,건강도,모두 챙길 주인공은 누구?">              
        </div> 

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2149_03.jpg" title="자료 다운로드">
            @if(sess_data('is_login') === true)
                <a href="@if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif" @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') target="_blank" @endif title="다운로드" style="position: absolute; left: 50%; top: 52%; width: 9%; height: 15%; z-index: 2;"></a>
            @else
                <a href="javascript:loginCheck();" title="다운로드" style="position: absolute; left: 50%; top: 52%; width: 9%; height: 15%; z-index: 2;"></a>
            @endif
            <div class="liveWrap" >
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
            </div>                  
        </div> 

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2149_04.jpg" title="라이브 방송 선착순 돌발퀴즈">   
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true &&   array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif           
        </div> 

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2149_05.jpg" title="더켠쌤이랑 합격하기로 약속">    
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif          
        </div> 

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2149_06.jpg" usemap="#Map2149a" title="국가직 라이브 여기저기 소문내주세요!" border="0">
            <map name="Map2149a" id="Map2149a">
                <area shape="rect" coords="436,637,611,702" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" />
                <area shape="rect" coords="620,635,769,702" href="https://cafe.daum.net/9glade" target="_blank" />
                <area shape="rect" coords="781,633,942,702" href="https://cafe.naver.com/gugrade" target="_blank" />
                <area shape="rect" coords="949,633,1109,704" href="https://cafe.naver.com/willbes" target="_blank" />
            </map>   
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif                      
        </div> 

	</div>
    <!-- End Container -->

    <script type="text/javascript">
        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }
    </script>
    
@stop