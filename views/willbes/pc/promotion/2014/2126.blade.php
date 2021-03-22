@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
            margin-top:20px
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
            width:150px;
            text-align:left;
        }
        .skybanner a {display:block; margin-bottom:5px; text-align:center}

        .evtCtnsBox .youtube { width:100%; max-width:768px; margin:0 auto; } 
        .evtCtnsBox .youtube iframe {width:768px; height:433px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2126_top_bg.jpg) no-repeat center top;} 
        .evtTop > div {width:768px; margin:0 auto; position:relative;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2126_01_bg.jpg) no-repeat center top; padding-bottom:200px}  
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2126_03_bg.jpg) no-repeat center top;}
        .evt04 {background:#398062}  
        .evt04 div {width:768px; margin:0 auto; position:relative}     

        .evtCurriBox {padding:100px 0; text-align:left; background:#F5F5F5}
        .evtCurriBox .copy {width:720px; margin:0 auto;}
        .evtCurriBox h5 {color:#414d4c; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evtCurriBox .evtCurriBoxTxt01 {font-size:28px; margin:20px auto 80px}
        .evtCurriBox .sample {width:720px; margin:0 auto}
        .evtCurriBox .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center; margin-bottom:10px}
        .evtCurriBox .sample li p {margin-bottom:15px;}
        .evtCurriBox .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evtCurriBox .sample li a:hover {background:#fff; color:#000}
        .evtCurriBox .sample li:last-child {margin:0}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .evtCurriBoxTxt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}  
        .evtCurri {width:720px; margin:50px auto 0; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#414d4c; letter-spacing:-1px; line-height:1.2}
        .evtCurri li strong {margin-right:10px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important; }
        .evtCurri li.cTitle {color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

        .evtReplyBox {background:#f5f5f5; padding:50px 0 100px}
        .evtReplyBox .columns {width:720px; margin:50px auto 0;
            column-count: 2;
            column-gap:10px;
        }
        .evtReplyBox .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:10px; color:#888; background:#fff;
            width:100%;
        }
        .evtReplyBox .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#744416}
        .evtReplyBox .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evtReplyBox .columns div strong {font-size:bold; color:#333}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}        

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

        .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
        .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
        .btnbuy a span {font-size:1.2rem;}
        .btnbuy a:hover {background:#3a99f0;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
        .infoCheck label {margin-right:30px; cursor: pointer; }
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#0099ff;}

        .evtInfo {background:#e1e1e1}
        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px }

        .slide_con {max-width:720px; margin:0 auto}
        .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
        .slide_con .bx-wrapper .bx-pager {        
            width: auto;
            bottom: -30px;
            left:0;
            right:0;
            text-align: center;
            z-index:90;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
            background: #ccc;
            width: 14px;
            height: 14px;
            margin: 0 4px;
            border-radius:10px;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #d7d7d7;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
            background:#000;
        }
    </style>


    <div class="p_re evtContent NSK c_both" id="evtContainer">
        <div class="skybanner" >
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/03/2126_sky01.png" alt="사전예약"></a>
            {{--<a href="#special"><img src="https://static.willbes.net/public/images/promotion/2021/03/2126_sky02.png" alt="맛보기"></a>--}}
        </div>  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_top.jpg" alt="귀농창업" >      
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_01.jpg" alt="전략원가연구소 소장 강용수" >   
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/vjPtDvb1Bng?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>                  
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_02.jpg" alt="귀농귀촌 창업" >                    
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_03.jpg" alt="4차 산업혁명" >                
        </div>   

        <div class="evtCtnsBox evt04">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_04.jpg" alt="사전예약 신청하기" >   
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/180404" title="" style="position: absolute; left: 14.84%; top: 62.23%; width: 35.55%; height: 14.88%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_05.jpg" alt="이 강의가 필요하신 분" >
        </div>

       
        <div class="evtCtnsBox evtInfo">
            <div class="evtFooter" id="infoText">
                <h3 class="NSK-Black">[이용안내]</h3>

                <p># 사전예약 및 강의 안내</p>
                <ul>
                    <li>사전예약 혜택은 04월 30일까지 결제완료자에 한해서만 적용됩니다.</li> 
                    <li>사전예약 혜택은 강의료 40% 할인입니다.</li> 
                    <li>강의 시작일은 05월 01일 예정이오나, 일정에 따라 변경 될 수 있으니 참고 부탁 드립니다.</li> 
                    <li>본강의의 구매자에게 제공되는 농업회계프로그램은 수강생만 제공되는 혜택으로, 지급된 프로그램이 있는 경우 본강의의 교환, 환불 정책에 따릅니다.</li>  
                </ul>

                <p>※ 이용문의 : 고객만족센터 1544-5006</p>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /* 수강신청 동의 */ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/lecture/show/cate/3114/pattern/only/prod-code/') }}' + code;
            location.href = url;
        }
    </script>

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->
@stop