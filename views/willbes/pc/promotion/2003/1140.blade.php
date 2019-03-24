@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height:auto !important;
            margin-bottom:0 !important;
        }
        .evtContent { 
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /*****************************************************************/  

        .evtTop {
            background:url(http://file3.willbes.net/new_gosi/2019/03/EV190320Y_top_bg.jpg) no-repeat center top
        }
        
        .evtMenu {width:100%; background:#36374d; border-bottom:5px solid #e2be43}
        .evtMenu ul {width:1120px; margin:0 auto; border-left:1px solid #686063}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#868791; font-size:150%; font-weight:900; 
            background:#36374d; border-right:1px solid #686063;
        }  
        .evtMenu li a span {padding:3px 10px; border-radius:15px; background:#868791; color:#36374d; font-weight:normal; font-size:70%}
        .evtMenu li a div {margin-top:8px}
        .evtMenu li:hover a,
        .evtMenu li.active a {background:#e2be43; color:#fff}
        .evtMenu li:hover a span,
        .evtMenu li.active a span {background:#fff; color:#e2be43}
        .evtMenu ul:after {content:""; display:block; clear:both}

        .tabCts {
            position:relative; width:1120px; margin:0 auto; border-bottom:10px solid #000;
        }
        .download span {position:absolute; display:block; width:72px; height:24px; line-height:24px; text-align:center; z-index:1}
        .download span:nth-child(1) {left:128px; top:711px}
        .download span:nth-child(2) {left:326px; top:711px}
        .download span:nth-child(3) {left:534px; top:711px}
        .download span:nth-child(4) {left:720px; top:711px}
        .download span:nth-child(5) {left:900px; top:711px}
        .download span a {display:block; color:#fff; background:#d18f04; border-radius:14px;}
        .download span a:hover {background:#e50001}

        .tabCts .youtube {width:100%; text-align:center; margin:3em 0}	
        .tabCts .youtube iframe {width:800px; height:453px; margin:0 auto}
        
    </style>


    <div class="evtContent" id="evtContainer">      

        <div class="evtCtnsBox evtTop" >
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190320Y_top.jpg" alt="2019 국가직 9급 풀캐어 서비스" />
        </div>

        <div class="evtCtnsBox evtMenu NG" id="evtMenu">                
            <ul>
                <li class="active">
                    <a href="#tab1">
                        <span>합격을 위한</span>
                        <div>최종 마무리 전략</div>
                    </a>
                </li>
                <li>
                    <!--a href="javascript:alert('준비중입니다.');"-->
                    <a href="#tab2">
                        <span>전년도 국가직 9급</span>
                        <div>완벽분석</div>				
                    </a>
                </li>
                <li>
                    <a href="#tab3">
                        <span>2019 국가직 9급</span>
                        <div>시험총평 및 시험후기</div>
                    </a>
                </li>     
                <li>
                    <a href="#tab4">
                        <span>2019 국가직 9급</span>
                        <div>기출해설강의</div>
                    </a>
                </li>
            </ul>
        </div>


        <!--최종 마무리 전략-->
        <div id="tab1" class="evtCtnsBox tabCts">
            <div class="download">		
                <!--국어-->
                <span>
                    <!--a href="javascript:alert('로그인을 해주세요.');">다운로드</a-->
                    <a href="{{ site_url('#none') }}" title="다운로드">다운로드</a>
                </span>

                <!--영어-->
                <span>
                    <a href="javascript:alert('로그인을 해주세요.');">다운로드</a>
                    <!--a href="{{ site_url('#none') }}" title="다운로드">다운로드</a-->
                </span>
                    
                <!--한국사-->
                <span>
                    <a href="javascript:alert('로그인을 해주세요.');">다운로드</a>
                    <!--a href="{{ site_url('#none') }}" title="다운로드">다운로드</a-->
                </span>
    
                <!--행정법-->
                <span>
                    <a href="javascript:alert('로그인을 해주세요.');">다운로드</a>
                    <!--a href="{{ site_url('#none') }}" title="다운로드">다운로드</a-->
                </span>
                    
                <!--행정학-->
                <span>
                    <a href="javascript:alert('로그인을 해주세요.');">다운로드</a>
                    <!--a href="{{ site_url('#none') }}" title="다운로드">다운로드</a-->
                </span>
                <img src="http://file3.willbes.net/new_gosi/2019/03/EV190320Y_01_1.jpg" alt="풀캐어 강사진" />            
            </div>
               
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190320Y_01_2.jpg" alt="점수 10점 상승을 위한 시험 전 유의사항/최상의 컨디션을 위한 시험 당일 유의사항" /><br>
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190320Y_01_3.jpg" alt="응시자 준수사항 및 필기장소 안내" /><br>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <a href="http://gosi.go.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000131" target="_blank"><img src="http://file3.willbes.net/new_gosi/2019/03/EV190320Y_btn01.png" alt="필기시험 장소 안내 바로가기" /></a>
        </div>
    </div>

              
    </div>
    <!-- End Container --> 

    
@stop