@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
<style type="text/css">
    .subContainer {
        min-height: auto !important;
        margin-bottom:0 !important;
    }
    .evtContent {
        width:100% !important;
        min-width:1120px !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
        font-size:14px;
    }

    .evtCtnsBox {line-height: 1.5}

    /************************************************************/


    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}
    select,
    input[type=email],
    input[type=tel],
    input[type=number],
    input[type=text] {padding:2px; margin-right:10px; height:26px; vertical-align: middle}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    label {margin:0 10px 0 5px}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

    .boardTypeB {width:100%; margin:0 auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid; background:#fff; line-height: 1.5}
    .boardTypeB caption {display:none}
    .boardTypeB thead th,
    .boardTypeB tbody th {color:#464646; font-weight:bold; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; text-align:center; padding:15px 8px}
    .boardTypeB tbody td {letter-spacing:normal; padding:10px 8px}
    .boardTypeB thead th {background:#e9e8e8;}
    .boardTypeB tbody th {background:#f3f3f3;}
    .boardTypeB tbody td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:center}
    .boardTypeB tbody tr.bg01 th {background:#e5f2fe}
    .boardTypeB tbody td input {vertical-align:middle}
    .boardTypeB tbody td label {margin-right:10px}
    .boardTypeB tbody td li {display: inline;}
    .boardTypeB tbody td span {vertical-align: top}

    .btns {text-align:center; margin:30px 0}
    .btns span,
    .btns a {display:inline-block; padding:8px 16px; background:#1087ef; color:#fff !important; font-weight:bold; border:1px solid #1087ef}
    .btns a.btn2 {background:#464646; color:#fff !important; border:1px solid #464646}
    .btns a:hover {background:#fff; color:#1087ef !important}
    .btns a.btn2:hover {background:#fff; color:#464646 !important}


    .sectin1_box {
        padding:180px 0 100px; height:500px; width:100%; text-align:center;
        -webkit-animation: color-change-5x 8s linear infinite alternate both;
	        animation: color-change-5x 8s linear infinite alternate both;
    }
    @@-webkit-keyframes color-change-5x {
            0% {
            background: #0c74ae;
            }
            50% {
            background: #83cff9;
            }
            100% {
            background: #0c74ae;
            }
        }
        @@keyframes color-change-5x {
            0% {
            background: #0c74ae;
            }
            50% {
            background: #83cff9;
            }
            100% {
            background: #0c74ae;
            }
        }
    .sectin1_box div {font-size:150px; font-weight:bold; color:#fff;
            -webkit-animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;}
    .sectin1_box div span {font-size:70px; display:block}
    @@-webkit-keyframes text-pop-up-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: none;
        }
        100% {
            -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
        }
    }
    @@keyframes text-pop-up-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: none;
        }
        100% {
            -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
        }
    }

    .txtinfo {border:1px solid #464646; padding:20px; height:150px; overflow-y:scroll}
    .txtinfo li {margin-left:20px; list-style-type: decimal;}

    .sub_warp {width:980px; margin:0 auto; padding:60px 0; }
    .sub_warp h2 {clear:both; font-size:24px; font-weight:bold; padding-left:30px; margin-bottom:1em; color:#464646; background:url(https://static.willbes.net/public/images/promotion/2019/04/1211_passcop_icon1.png) no-repeat left center}
    .sub_warp h2 div {position:absolute; top:5px; right:0; font-size:12px; color:#adadad; letter-spacing:normal}
    .sub_warp h2 span {color:#C03}
    .sub_warp h2 select {padding:5px}
</style>


    <!-- Container -->
    <div class="evtContent NSK">
        <div class="sectin1_box NSK-Black">
            <div><span>2020년 1차 고등고시 시험</span>
            합격예측 인증</div>
        </div>
        <!--sectin1_box//-->
        @include('willbes.pc.predict2.1627_promotion_partial')
    </div>
    <!-- End Container -->
@stop