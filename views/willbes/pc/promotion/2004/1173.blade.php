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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed;top:250px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/03/1173_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f2f6f8}
        .evt02 {background:#323099}
        .evt03 {background:#f2f6f8}
        .evt04 {background:#1b1e26}
        .evt05 {background:#f2f6f8}
        .evt06 {background:#230054}
        .evt07 {background:#f2f6f8}
        .evt08 {background:#494484}
        .evt09 {background:#fdfdfd}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
			<div><a href="#lec_go"><img src="https://static.willbes.net/public/images/promotion/2019/03/0325_sky_interview.jpg" alt="수강신청" ></a></div>
		</div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_top.jpg" title="윌비스 면접 CAMP">
        </div>
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_01.jpg" title="서울시 면접절차 및 일정">
        </div>
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_02.jpg" title="윌비스 면접 CAMP 교수진">
        </div>
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_03.jpg" title="왜 이종윤/임혜린 팀과 함께 해야 하는가?">
        </div>
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_04.jpg" title="이제부터 공무원 면접은 이종윤/임혜린 팀">
        </div>
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_05.jpg" title="윌비스 공무원 면접캠프의 노하우">
        </div>
        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_06.jpg" title="반드시 합격합니다.">
        </div>
        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_07.jpg" usemap="#Map1173A" title="윌비스 면접 CAMP 수강신청하기" border="0">
            <map name="Map1173A" id="Map1173A">
                <area shape="rect" coords="182,502,946,561" href="{{ site_url('/pass/offLecture/index?cate_code=3053') }}" title="면접캠프 수강 신청하기" />
            </map>
        </div>
        <div class="evtCtnsBox evt08" id="lec_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_08.jpg" usemap="#Map1173B" title="서울시 면접 CAMP 설명회" border="0">
            <map name="Map1173B" id="Map1173B">
                <area shape="rect" coords="75,583,555,660" href="{{ site_url('/pass/event/show/ongoing?event_idx=158&') }}" title="면접캠프 설명회 신청하기" />
            </map>
        </div>
        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1173_09.jpg" title="유의사항">
        </div>

    </div>
    <!-- End Container -->

@stop