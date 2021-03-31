@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px; width:120px; z-index:2;}
        .sky a{display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2150_top_bg.jpg) no-repeat center top;}

        .evt01 {width:1120px; margin:0 auto; position:relative}
        .evt01 ul {position:absolute; width:540px; top:428px; left:193px; z-index:2}
        .evt01 li {display:inline; float:left; margin-right:20px; margin-bottom:15px; width:calc(50% - 20px)}
        .evt01 li a {display:block; height:100px; line-height:100px; border-radius:50px; border:3px solid #057f52; color:#057f52; background:#fff;
        font-size:20px}
        .evt01 li a:hover {color:#fff; background:#057f52;}
        .evt02 {background:#057f52; padding-bottom:150px;}
        .evt02 > div {width:1120px; margin:0 auto; position:relative}

        .evt03 {background:#ecf4f1;  padding-bottom:150px}
        .evt03 .btnSt {width:500px; margin:0 auto 100px}
        .evt03 .btnSt a {display:block; height:100px; line-height:100px; border-radius:50px; color:#fff; background:#000; font-size:30px}
        .evt03 .btnSt a:hover {color:#fff; background:#057f52;}
        .evt05 {width:1120px; margin:0 auto; padding-bottom:150px; position:relative}

 
    </style> 

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="sky">
            <a href="#evt01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_sky01.jpg" alt="무료특강" >
            </a>  
            <a href="#evt02"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_sky02.jpg" alt="1일 1제" >
            </a> 
            <a href="#evt03"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_sky03.jpg" alt="신쌤페엑 전하고픈 말" >
            </a>            
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_top.jpg"  alt="신광은 형법"/>
        </div>

        <div class="evtCtnsBox evt01 NSK-Black" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_01.jpg"  alt="무료특강 활용하기"/>
            <ul>
                <li><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/170566" target="_blank">원자행&불능미수</a></li>
                <li><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169145" target="_blank">회령죄</a></li>
                <li><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168198" target="_blank">배임죄</a></li>
                <li><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168022" target="_blank">공범과신분</a></li>
                <li><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167489" target="_blank">구성요건 착오 및 위.전.착</a></li>
                <li><a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167023" target="_blank">죄수론</a></li>
            </ul>
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_02.jpg"  alt="유튜브 1일 1제"/>
                <a href="https://www.youtube.com/channel/UCz_3g63yWTYjg6_Ko5QRK1g/featured" target="_blank" title="신광은 유튜브" style="position: absolute; left: 27.77%; top: 43.57%; width: 56.25%; height: 7.22%; z-index: 2;"></a>
                <a href="https://youtu.be/cQjtphVWSxU" target="_blank" title="업무방해" style="position: absolute; left: 12.86%; top: 68.09%; width: 23.48%; height: 20.09%; z-index: 2;"></a>
                <a href="https://youtu.be/DwFi7sozKWE" target="_blank" title="감금죄" style="position: absolute; left: 38.13%; top: 68.09%; width: 23.48%; height: 20.09%; z-index: 2;"></a>
                <a href="https://youtu.be/15_OSjh-fWE" target="_blank" title="소급효금지원칙" style="position: absolute; left: 63.39%; top: 68.09%; width: 23.48%; height: 20.09%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_03.jpg"  alt="형법 심화이론 100% 무료쿠폰"/>
            <div class="btnSt NSK-Black"><a href="#none">100% 무료쿠폰 받기</a></div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true &&   array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif
        </div>
     
        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_04_01.jpg"  alt="신광은 형법 단과"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif                
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2150_04_02.jpg"  alt="신광은 형사소송법"/>
            <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/178596" target="_blank" title="12개월 패스" style="position: absolute; left: 11.16%; top: 53.32%; width: 77.86%; height: 46.42%; z-index: 2;"></a>
        </div>

    </div>
    <!-- End Container -->
@stop