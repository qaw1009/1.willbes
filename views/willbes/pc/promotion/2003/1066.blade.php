@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1066_top_bg.jpg) center top no-repeat}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1066_01_bg.jpg) center top no-repeat}

        .wb_cts02s {background:#f4996d;}
        .wb_cts02s .tImg img {margin:0 5px 10px;width:302px;height:166px;border:2px solid #28364a;}

        .wb_cts03 {padding-bottom:150px}

        .wb_cts04 {background:#DBC8B7;}

        .wb_cts05 {background:#f8f8f8;padding-bottom:100px;padding-top:188px;}      

        .skybanner {position:fixed;top:250px;right:10px;width:259px; text-align:center; z-index:11;}   
        .skybanner a {display:block; margin-bottom:10px}   
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>  
            <a href="#live">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_sky2.png" title="라이브로 소통하기" >
            </a>       
        </div>
      
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_top.jpg" title="제니스 영어 한덕현" />       
        </div>    

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_01.jpg" usemap="#Map1066a" title="반반한 모의고사 무료방송" border="0" />
            <map name="Map1066a" id="Map1066a">
                <area shape="rect" coords="238,1051,883,1158" href="https://pass.willbes.net/promotion/index/cate/3019/code/1676" target="_blnak" alt="방송보러가기" onfocus='this.blur()' />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts02s" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s.jpg" alt="한덕현 라이브" />
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_01.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_02.gif" alt="" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_03.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_04.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_05.gif" alt="" />
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02ss.jpg" alt="수강신청" usemap="#Map1066_apply" border="0" />
            <map name="Map1066_apply" id="Map1066_apply">
                <area shape="rect" coords="80,652,260,711" href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/175919" target="_blnak" />
                <area shape="rect" coords="340,653,521,710" href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/177213" target="_blnak" />
                <area shape="rect" coords="602,652,783,711" href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/177216" target="_blnak" />
                <area shape="rect" coords="862,654,1042,710" href="https://pass.willbes.net/pass/offLecture/show/cate/3046/prod-code/175732" target="_blnak" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_03.jpg" alt="실시간 소통 댓글" /> 
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif  
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_02.jpg" alt="영어는 어려운 과목이 아닙니다." />   
        </div>

        <div class="evtCtnsBox wb_cts05" id="cts05">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1066_04.gif" usemap="#Map1066b" border="0" alt="커리큘럼"/>
            <map name="Map1066b" id="Map1066b">
                <area shape="rect" coords="230,694,277,711" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="230,752,278,769" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/173562" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="229,828,278,845" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="426,456,472,474" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145623" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="426,572,472,590" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="424,648,473,666" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/173563" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="424,735,473,754" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157579" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="625,520,672,536" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157581" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="625,692,674,710" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="626,826,671,844" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="829,468,878,484" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158678" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="830,825,879,842" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158682" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="830,846,878,863" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158683" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="230,493,278,511" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169567" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="230,534,279,551" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169816" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="424,512,472,531" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169820" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="829,559,879,577" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/175744" target="_blank" alt="새벽모의고사" onfocus='this.blur()' />
                <area shape="rect" coords="230,635,278,653" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169815" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="831,677,877,695" href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/170173" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="832,711,877,729" href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/170281" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="832,868,878,886" href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/169814" target="_blank" onfocus='this.blur()' />
            </map >        
        </div>

        {{--
        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1066_05.png" usemap="#Map1066c" border="0" />
            <map name="Map1066c" id="Map1066c">
                <area shape="rect" coords="64,702,223,734" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="273,700,432,736" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="484,702,643,735" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="690,702,853,735" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/163562" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="899,701,1067,736" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158684" target="_blank" onfocus='this.blur()' />
            </map>
        </div>
        --}}

    </div>
    <!-- End Container -->
@stop
 