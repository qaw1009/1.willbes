@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    .video-container {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0 20px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
    </style>


<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox dday NSK-Thin">
        <strong class="NSK-Black">기본완성기출반 사전접수 마감까지 <span id="ddayCountText"></span> </strong>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_01.jpg" alt="몰입 패스" >
    </div> 

    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_02.jpg" alt="몰입해야 하는 이유" >
        <div class="youtubeCts video-container">
            <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    
    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_03.jpg" alt="교수진" >
        <div class="youtubeCts video-container">
            <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
        </div>        
    </div>
    
    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_04.jpg" alt="무제한 수강" >
        <div class="youtubeCts video-container">
            <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>   
    
    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_05.jpg" alt="쿠폰지급" >
    </div>
    
    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_06.jpg" alt="신광은 몰입 t패스" >
    </div>    

    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_07.jpg" alt="장정훈 몰입 t패스" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
    </div>    
    
    <div class="evtCtnsBox pb50">        
        <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_08.jpg" alt="김원욱 몰입 t패스" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif
    </div>    
</div>

<!-- End Container -->
<script type="text/javascript"> 
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
    });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop