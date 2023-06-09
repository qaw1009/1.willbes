@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:150px; right:10px;z-index:1;}        
        .skybanner a {display:block; margin-bottom:5px}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/1985_top_bg.jpg) no-repeat center;position:relative}        
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1985_01_bg.jpg) no-repeat center;position:relative}
        .wb_01 .youtube {position:absolute; top:546px; left:50%; width:608px; z-index:1;margin-left:-127px; border:1px solid #000; box-shadow:0 10px 20px rgba(0,0,0,.3)}
        .wb_01 .youtube iframe {width:606px; height:317px}

        .wb_02 {background:#2b3348; padding-bottom:150px}
        .wb_02 ul {width:859px; margin:0 auto}
        .wb_02 li {display:inline; float:left; margin-right:10px}
        .wb_02 ul:after { content:''; display:block; clear:both}
        .wb_02 .youtube {width:276px; box-shadow:0 10px 20px rgba(0,0,0,.3)}
        .wb_02 .youtube iframe {width:276px; height:159px}
        .wb_04 {background:#5898f9}

        .wb_05 {background:#edeeee}

        .wb_06 {background:#ffee30;}	
        .wb_07 {background:#2b3348; padding-bottom:150px}                   
    </style>



    <div class="evtContent NSK" id="evtContainer">      
        <div class="skybanner" id="QuickMenu">
            <a href="#evt07"><img src="https://static.willbes.net/public/images/promotion/2021/04/1985_sky_01.png" alt="경찰학 고" ></a>
        </div>  

        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="경찰학원부분 1위" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/1985_top.jpg"  alt="장정훈 경찰학개론 베테랑"/>
		</div>

        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1985_01.jpg"  alt="장정훈" usemap="#Map1985A" border="0"/>
            <map name="Map1985A" id="Map1985A">
                <area shape="rect" coords="189,754,382,819" href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51161?subject_idx=2128" target="_blank" alt="교수홈" />
            </map>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/n8H5jGxSBDI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
		</div>

        <div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1985_02.jpg"  alt="베테랑은 다른다"/>	
            <ul>
                <li>
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/G8hBl7DdGok?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>	
                </li>
                <li>
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/ff6BvDiAMkk?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>	
                </li>
                <li>
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/HzPBkz4bptA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>	
                </li>
            </ul>		
		</div>        

        <div class="evtCtnsBox wb_03" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1985_03.jpg"  alt="왜? 2020 장정훈?"/>			
		</div>        

        <div class="evtCtnsBox wb_04" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1985_04.jpg"  alt="경찰학개론 1위 장정훈"/>			
		</div>        

        <div class="evtCtnsBox wb_05" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1985_05.jpg"  alt="부동의 1위"/>			
		</div>     

        <div class="evtCtnsBox wb_06" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1985_06.jpg" alt="회원수 증가율 1위"/>	 	
		</div>      
        
        <div class="evtCtnsBox wb_07" id="evt07">
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1985_07.jpg" alt="경찰학 입문강의"/>	
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif   
            <img src="https://static.willbes.net/public/images/promotion/2021/06/1985_07_02.jpg" alt="경찰학 입문강의"/>	
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif   		
		</div> 
        
    </div>
    <!-- End Container -->
@stop