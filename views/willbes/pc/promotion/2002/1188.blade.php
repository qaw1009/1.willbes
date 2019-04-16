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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1188_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1188_01_bg.jpg) no-repeat center top}
        .evt02 {background:#a3c4ef url(https://static.willbes.net/public/images/promotion/2019/04/1188_02_bg.jpg) no-repeat center top;}
        .evt02 .evt02_02 {position:relative; width:1120px; margin:0 auto}
        .evt02 .evt02_02 span {position:absolute; left:495px; display:block; width:98px; height:30px; line-height:30px; z-index:10}
        .evt02 .evt02_02 span:nth-child(2) {top:207px;}
        .evt02 .evt02_02 span:nth-child(3) {top:256px}
        .evt02 .evt02_02 span:nth-child(4) {top:305px}
        .evt02 .evt02_02 span:nth-child(5) {top:354px}
        .evt02 .evt02_02 span:nth-child(6) {top:403px}
        .evt02 .evt02_02 span:last-child {top:452px}
        .evt02 .evt02_02 span a {display:block; text-align:center; color:#010100; background:#ffff01; font-size:14px; font-weight:600; border:1px solid #010100;}
        .evt02 .evt02_02 span a:hover {color:#fff; background:#000}
        .evt02 .evt02_02 span a.end {color:#fff; background:#86aee8; border:1px solid #86aee8;}
        
        .evt02 .evt02_03 {position:relative; width:1120px; margin:0 auto}
        .evt02 .evt02_03 span {position:absolute; top:577px; display:block; width:98px; height:30px; line-height:30px; z-index:10}
        .evt02 .evt02_03 span:nth-child(2) {left:250px;}
        .evt02 .evt02_03 span:nth-child(3) {left:392px}
        .evt02 .evt02_03 span:nth-child(4) {left:534px}
        .evt02 .evt02_03 span:nth-child(5) {left:672px}
        .evt02 .evt02_03 span:nth-child(6) {left:810px}
        .evt02 .evt02_03 span:last-child  {left:953px}        
        .evt02 .evt02_03 span a {display:block; text-align:center; color:#fff; background:#000; font-size:14px; font-weight:600; border:1px solid #010100;}
        .evt02 .evt02_03 span a:hover {color:#fff; background:#0c95d3}
        .evt02 .evt02_03 span a.end {color:#fff; background:#86aee8; border:1px solid #86aee8;}
        
        .evt03 {background:#fff;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <ul class="skyBanner">
            <li><a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/04/1188_skybanner.png" title="입교버스 신청 바로가기"></a></li>
        </ul>  

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1188_top.jpg" title="합격생중경 입교 버스 든든이벤트">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1188_01.jpg" title="296기 리뷰">
        </div>

        <div class="evtCtnsBox evt02">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/04/1188_02_01.jpg" title="신청 및 출발안내"></div>
            <div class="evt02_02">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1188_02_02.jpg" title="입교버스 지역별 신청">
                @foreach($arr_base['register_member_list'] as $key => $val)
                    <span>
                        @if($val['RegisterExpireStatus'] == 'Y')
                            @if($val['PersonLimitType'] != 'L')
                                <a href="javascript:requestOpen('{{ $key }}');">신청하기 > </a>
                            @else
                                @if($val['PersonLimit'] > $val['mem_cnt'])
                                    <a href="javascript:requestOpen('{{ $key }}');">신청하기 > </a>
                                @else
                                    <a href="#none" class="end">신청마감</a>
                                @endif
                            @endif
                        @else
                            @if($key == '213')
                                <a href="{{app_url('/pass/support/notice/show?board_idx=222649', 'police')}}">캠퍼스문의</a>
                            @else
                                <a href="#none" class="end">신청마감</a>
                            @endif
                        @endif
                    </span>
                </span>
                @endforeach
            </div>
            <div id="event" class="evt02_03">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1188_02_03.jpg" title="입교버스 지역별 신청지역 안내">
                @foreach($arr_base['register_member_list'] as $key => $val)
                    <span>
                        @if($val['RegisterExpireStatus'] == 'Y')
                            @if($val['PersonLimitType'] != 'L')
                                <a href="javascript:requestOpen('{{ $key }}');">신청하기 > </a>
                            @else
                                @if($val['PersonLimit'] > $val['mem_cnt'])
                                    <a href="javascript:requestOpen('{{ $key }}');">신청하기 > </a>
                                @else
                                    <a href="#none" class="end">신청마감</a>
                                @endif
                            @endif
                        @else
                            @if($key == '213')
                                <a href="{{app_url('/pass/support/notice/show?board_idx=222649', 'police')}}">캠퍼스문의</a>
                            @else
                                <a href="#none" class="end">신청마감</a>
                            @endif
                        @endif
                    </span>
                    </span>
                @endforeach
            </div>
        </div>
	</div>
    <!-- End Container -->


    <script type="text/javascript">
        function requestOpen(obj){
            var is_login = '{{sess_data('is_login')}}';
            if (is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return;
            }

            var url = "{{ site_url('/pass/promotion/popup/' . $arr_base['promotion_code']) }}" + '?selected='+obj;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=660,height=700');
        }
    </script>

@stop