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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        /************************************************************/        
        .evt01 {background:#ececec url("https://static.willbes.net/public/images/promotion/2019/07/1326_top_bg.jpg") center top  no-repeat}
     
        .evt02 {background:#fff;}

        .evt03 {background:#ececec;}
    </style>
    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1326_top.jpg" title="원유철 한국사 문제폭격 스파르타">       
        </div>
        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1326_01.jpg" title="일주일간 총 1000문제풀이">
        </div>    
        <div class="evtCtnsBox evt03" id="evt03">
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1326_02.jpg" usemap="#Map1326" title="스파라트 특강 수강신청하기" border="0">
            <map name="Map1326" id="Map1326">
                <area shape="rect" coords="82,974,1036,1066" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1046&subject_idx=1055" target=_blank; alt="수강신청하기" />
            </map>
        </div>      

    </div>
    <!-- End Container -->

    <script type="text/javascript">
      
    </script>
@stop