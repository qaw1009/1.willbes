@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsammjs_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_02_bg.jpg) no-repeat center top;}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_03_bg.jpg) no-repeat center top;}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsammjs_04_bg.jpg) no-repeat center top; height:950px}
        .evt04 ul {width:1280px; margin:0 auto; padding-top:330px}
        .evt04 ul li {display:inline; float:left; width:50%; text-align:left}
        .evt04 ul li:last-child {text-align:right}
        .evt04 iframe {}

        .willbes-Layer-ReplyBox { top: 4000px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsammjs_top.jpg" alt="유아 민정선" usemap="#Mapmjs01" border="0" />
                <map name="Mapmjs01" id="Mapmjs01">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @foreach($arr_base['promotion_otherinfo_data'] as $key => $row)
                            @if($key == 0)
                                @if(empty($row['wHD']) === false)
                                    <area shape="rect" onclick="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" coords="65,819,445,915" href="#none" alt="기출해설A형" />
                                @endif

                                @if(empty($row['FileFullPath']) === false)
                                    <area shape="rect" coords="486,818,668,917" href="{{ site_url('/promotion/downloadOtherFile?file_idx='.$row['EpoIdx'].'&event_idx='.$data['ElIdx']) }}" alt="답안자료" />
                                @endif
                            @else
                                @if(empty($row['wHD']) === false)
                                    <area shape="rect" onclick="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" coords="844,818,1220,916" href="#none" alt="기출해설B형" />
                                @endif
                            @endif
                        @endforeach
                    @endif
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_01.jpg" />
            </div>

            <div class="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_02.jpg" usemap="#Mapmjs02" border="0">
                <map name="Mapmjs02" class="review_btn" id="wsammjs">
                  <area shape="rect" coords="467,2241,809,2324" href="#none" onclick="go_study_comment_popup();" alt="합격수기확인" />
                </map>
            </div>

            <div class="evt04">
              	<ul>
                	<li><iframe width="600" height="336" src="https://www.youtube.com/embed/Y2W3lUrn3aI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
                    <li><iframe width="600" height="336" src="https://www.youtube.com/embed/yjdW1qJ1vHs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
                </ul>
       	   </div>
        </div>
    </div>
    <!-- End Container -->

    <!-- willbes-Layer-수강후기 -->
    <div id="WrapReply"></div>
    <!-- // willbes-Layer-수강후기 -->

    <script>
        // 수강후기 레이어팝업
        function go_study_comment_popup(){
            var ele_id = 'WrapReply';
            var _url = "{{front_url('/support/studyComment/')}}";
            var data = {};

            @if(empty($arr_base['promotion_otherinfo_data'][0]) === false && empty($arr_promotion_params['cate_code']) === false)
                data = {
                    'ele_id' : ele_id,
                    'cate_code' : '{{ $arr_promotion_params['cate_code'] }}',
                    'prof_idx' : '{{ element('ProfIdx', $arr_base['promotion_otherinfo_data'][0]) }}',
                    'subject_idx' : '{{ element('SubjectIdx', $arr_base['promotion_otherinfo_data'][0]) }}'
                };
            @endif

            sendAjax(_url, data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop