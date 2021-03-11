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
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2017_top_bg.jpg) no-repeat center;}    

        .wb_01{background:#4B321C}
     
        .wb_03{background:#F1F1F1}

        .wb_04{background:#F1F1F1}

        .wb_06{background:#373737}  
    </style>

    <div class="evtContent NSK" id="evtContainer">  

        <div class="evtCtnsBox wb_top">             
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_top.jpg" alt="선접수 이벤트" />  
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_01.jpg" alt="수강신청 바로가기" usemap="#Map2017a" border="0" />
            <map name="Map2017a" id="Map2017a">
                <area shape="rect" coords="354,436,771,497" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" />
            </map>   
        </div>  

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_02.jpg" alt="김동진 법원팀" />  
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_03.jpg" alt="커리큘럼" usemap="#Map2017b" border="0" />
            <map name="Map2017b" id="Map2017b">
                <area shape="rect" coords="194,744,297,789" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="354,745,456,789" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="510,745,612,789" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="669,744,769,789" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="824,744,925,789" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" target="_blank" />
            </map>  
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_04.jpg" alt="수강생 중심 운영" />  
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_05.jpg" alt="절대 만족 후기" usemap="#Map2017c" border="0" />
            <map name="Map2017c" id="Map2017c">
                <area shape="rect" coords="418,1136,700,1192" href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_06">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_06.jpg" alt="당신의 합격" />  
        </div>

        <div class="evtCtnsBox wb_07">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2017_07.jpg" alt="수강 신청하기" usemap="#Map2017d" border="0" />
            <map name="Map2017d" id="Map2017d">
                <area shape="rect" coords="300,918,828,1006" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" />
            </map>   
        </div>
    </div>
    <!-- End Container -->

    <script>

    </script>

@stop