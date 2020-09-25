@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
            width:138px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/1861_top_bg.jpg) no-repeat center top}
        .evtTop span {position:absolute; left:50%; z-index:1;}
        .evtTop span.img1 {top:217px; margin-left:-413px; width:146px; animation:iptimg1 10s infinite;-webkit-animation:iptimg1 10s infinite;}
        .evtTop span.img2 {top:453px; margin-left:240px; width:379px; animation:iptimg2 8s infinite;-webkit-animation:iptimg2 8s infinite;}
        @@keyframes iptimg1{
            0%{margin-left:-513px; opacity: 0;}
            50%{margin-left:-413px; opacity: 1;}
            100%{margin-left:-313px; opacity: 0;}
        }
        @@-webkit-keyframes iptimg1{
            0%{margin-left:-513px; opacity: 0;}
            50%{margin-left:-413px; opacity: 1;}
            100%{margin-left:-313px; opacity: 0;}
        }
        
        @@keyframes iptimg2{
            0%{margin-left:440px; opacity: 0;}
            50%{margin-left:240px; opacity: 1;}
            100%{margin-left:40px; opacity: 0;}
        }
        @@-webkit-keyframes iptimg2{
            0%{margin-left:440px; opacity: 0;}
            50%{margin-left:240px; opacity: 1;}
            100%{margin-left:40px; opacity: 0;}
        }

        .evt01 {background:#fff}         

        .evt02 {background:#222 url(https://static.willbes.net/public/images/promotion/2020/09/1861_02_bg.jpg) no-repeat center top}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1861_top.jpg" title="추석맞이 열공지원" > 
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1861_top_img01.png" title="" /></span>      
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1861_top_img02.png" title="" /></span> 
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1861_01.jpg" usemap="#Map1648B" title="소원을 말해봐" border="0" >
            <map name="Map1648B">
                <area shape="rect" coords="228,872,893,993" href="javascript:giveCheck();" alt="쿠폰받기">
            </map>           
        </div>

        {{--댓글url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif 

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1861_02.jpg" usemap="#Map1861A" title="엔잡 강좌" border="0" >
            <map name="Map1861A">
              <area shape="rect" coords="235,1328,346,1369" href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank" alt="김정환">
              <area shape="rect" coords="416,1329,523,1368" href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank" alt="김경은">
              <area shape="rect" coords="594,1329,707,1368" href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank" alt="황채영">
              <area shape="rect" coords="776,1329,885,1368" href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank" alt="정문진">
              <area shape="rect" coords="237,1908,343,1946" href="https://njob.willbes.net/promotion/index/cate/3114/code/1710" target="_blank" alt="이시한">
              <area shape="rect" coords="417,1910,524,1946" href="https://njob.willbes.net/promotion/index/cate/3114/code/1711" target="_blank" alt="이승기">
              <area shape="rect" coords="597,1908,704,1948" href="https://njob.willbes.net/promotion/index/cate/3114/code/1712" target="_blank" alt="안혜빈">
              <area shape="rect" coords="775,1908,886,1947" href="https://njob.willbes.net/promotion/index/cate/3114/code/1713" target="_blank" alt="이기용">
              <area shape="rect" coords="238,2498,343,2536" href="https://njob.willbes.net/promotion/index/cate/3114/code/1755" target="_blank" alt="양원근">
              <area shape="rect" coords="418,2497,522,2535" href="https://njob.willbes.net/promotion/index/cate/3114/code/1797" target="_blank" alt="김윤태">
            </map>
        </div>
    </div>
    <!-- End Container -->

    <script>
        var $regi_form = $('#regi_form');
        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var no_cmt_msg = '인생계획을 남겨주세요.';
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&err_msg='+no_cmt_msg;
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>

@stop