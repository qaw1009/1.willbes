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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1947_top_bg.jpg) center top no-repeat; height:978px}  
        .wb_top span.img01 {position:absolute; width:1120px; top:777px; left:50%; margin-left:-560px; font-size:36px; color:#fff; z-index:10; 
            animation:iptimg1 2s ease-in infinite;-webkit-animation:iptimg1 2s ease-in infinite;}
        @@keyframes iptimg1{
            from{text-shadow:0 0 10px rgba(100,58,22,.5); color:#9d6e46}
            50%{text-shadow:0 0 10px rgba(100,58,22,1); color:#deb891;}
            to{text-shadow:0 0 10px rgba(100,58,22,.5); color:#9d6e46}
        }
        @@-webkit-keyframes iptimg1{
            from{text-shadow:0 0 10px rgba(100,58,22,.5); color:#9d6e46}
            50%{text-shadow:0 0 10px rgba(100,58,22,1); color:#deb891;}
            to{text-shadow:0 0 10px rgba(100,58,22,.5); color:#9d6e46}
        }
        .wb_top .nameBox {position:absolute; top:384px; left:50%; margin-left:-425px; 
            width:850px; height:274px; text-align:center; background:#0a0e25; color:#fff; overflow:hidden; z-index:10}
        .wb_top .nameBox ul {width:100%;}
        .wb_top .nameBox li {display:inline; float:left; width:calc(33.33333% - 10px); line-height:1.5; text-align:left; border-right:1px solid #a1b0be; margin-right:10px}
        .wb_top .nameBox li span {display:inline-block; min-width:65px; text-align:center}
        .wb_top .nameBox li span:last-child {margin-right:0}
        .wb_top .nameBox li:last-child {border:0; margin:0}
        .wb_top .nameBox ul:after {content:''; display:block; clear:both}

        .wb_01  {background:#15283d; padding-bottom:150px}
        .wb_01 .tabs {width:920px; margin:0 auto}
        .wb_01 .tabs li {display:inline; float:left; width:33.3%}
        .wb_01 .tabs a {display:block; border:2px solid #fff; border-bottom:0; background:#15283d; font-size:30px; color:#fff; padding:20px 0; margin-right:2px;}
        .wb_01 .tabs li:last-child a {margin:0}
        .wb_01 .tabs li:nth-child(1) a.active {background:#0054a6;}
        .wb_01 .tabs li:nth-child(2) a.active {background:#ed1c24;}
        .wb_01 .tabs li:nth-child(3) {width:33.4%}
        .wb_01 .tabs li:nth-child(3) a.active {background:#00a031;}
        .wb_01 .golec {margin-top:50px;}
        .wb_01 .golec a {display:block; background:#fff200; height:74px; line-height:74px; text-align:center; border-radius:46px; 
        width:450px; margin:0 auto; box-shadow:0 10px 0 rgba(45,62,81,1);}
        .wb_01 .golec a:hover {background:#fff}

        .wb_02 {padding-bottom:50px}
        .wb_02 ul {width:1010px; margin:0 auto}
        .wb_02 li {display:block; float:left; width:50%; margin-bottom:50px;}         
        .wb_02 .youtube {width:488px; margin:0 auto;}
        .wb_02 .youtube div {margin-bottom:10px}
        .wb_02 .youtube div span {font-size:16px; padding:5px 30px; border:2px solid #000; color:#000; border-radius:30px; display:inline-block}
        .wb_02 .youtube iframe {width:488px; height:278px;}
        .wb_02 ul:after {content:''; display:block; clear:both}

        .wb_03 {width:976px !important; margin:0 auto 100px; border:10px solid #bb7432; padding:50px 100px; font-size:24px}
        .wb_03 li {text-align:left; margin-bottom:20px}
        .wb_03 li:last-child {font-size:60px; margin-top:30px; color:#bb7432}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">   
        <div class="evtCtnsBox wb_top">             
            <span class="img01 NSK-Black">2021년 공무원 합격의 주인공은 여러분입니다!</span>
            <div class="nameBox">
                <div id="slider1" class="bxslider">
                    <ul>
                        <li>
                            <span>	경찰	</span>	<span>	101단	</span>	<span>	이*재	</span>	<span>	41718	</span><br>
                            <span>	경찰	</span>	<span>	101단	</span>	<span>	이*연	</span>	<span>	41794	</span><br>
                            <span>	경찰	</span>	<span>	강원 여자	</span>	<span>	박*람	</span>	<span>	20123	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	김*준	</span>	<span>	14712	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	박*구	</span>	<span>	13260	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	유*호	</span>	<span>	13442	</span><br>
                            <span>	경찰	</span>	<span>	본청 특채	</span>	<span>	김*희	</span>	<span>	20131	</span><br>
                            <span>	경찰	</span>	<span>	본청 특채	</span>	<span>	김*랑	</span>	<span>	20104	</span><br>
                            <span>	경찰	</span>	<span>	경기북부	</span>	<span>	김*언	</span>	<span>	13602	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	고*석	</span>	<span>	10865	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*우	</span>	<span>	11415	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*호	</span>	<span>	11067	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	민*훈	</span>	<span>	11453	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*수	</span>	<span>	10601	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*성	</span>	<span>	10760	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	백*렬	</span>	<span>	10603	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	소*수	</span>	<span>	10226	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	심*수	</span>	<span>	10995	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	엄*준	</span>	<span>	11280	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*희	</span>	<span>	10967	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*준	</span>	<span>	10943	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	장*빈	</span>	<span>	10552	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	홍*준	</span>	<span>	10918	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	황*산	</span>	<span>	11424	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	금*정	</span>	<span>	20203	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	김*경	</span>	<span>	20093	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	윤*수	</span>	<span>	20287	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	장*인	</span>	<span>	20394	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	장*영	</span>	<span>	20202	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	조*빈	</span>	<span>	80033	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	홍*현	</span>	<span>	20304	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*훈	</span>	<span>	10590	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*율	</span>	<span>	10522	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*훈	</span>	<span>	10655	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*도	</span>	<span>	10909	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*진	</span>	<span>	10755	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	백*산	</span>	<span>	10665	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	양*환	</span>	<span>	10314	</span><br>
                            <span>	경찰	</span>	<span>	서울 여자	</span>	<span>	엄*원	</span>	<span>	22702	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	윤*찬	</span>	<span>	10158	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*현	</span>	<span>	10877	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*민	</span>	<span>	10831	</span><br>
                            <span>	경찰	</span>	<span>	101단	</span>	<span>	임 *	</span>	<span>	41097	</span><br>
                            <span>	경찰	</span>	<span>	경기북부	</span>	<span>	조*욱	</span>	<span>	11796	</span><br>
                            <span>	경찰	</span>	<span>	경기남부여	</span>	<span>	허*정	</span>	<span>	21453	</span><br>
                            <span>	경찰	</span>	<span>	인천청	</span>	<span>	허*호	</span>	<span>	10247	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	김*빈	</span>	<span>	30318	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	김*형	</span>	<span>	15186	</span><br>
                            <span>	경찰	</span>	<span>	경기북부	</span>	<span>	유*민	</span>	<span>	10405	</span><br>
                            <span>	경찰	</span>	<span>	경기남부여	</span>	<span>	김*정	</span>	<span>	21027	</span><br>
                            <span>	경찰	</span>	<span>	강원 남자	</span>	<span>	이*용	</span>	<span>	10494	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	안*석	</span>	<span>	30100	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	홍*균	</span>	<span>	15377	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	손*은	</span>	<span>	21568	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	오*화	</span>	<span>	20360	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	조*경	</span>	<span>	20259	</span><br>
                            <span>	경찰	</span>	<span>	서울 남자	</span>	<span>	김*항	</span>	<span>	13669	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	곽*수	</span>	<span>	11275	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*재	</span>	<span>	11560	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*중	</span>	<span>	11903	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*준	</span>	<span>	11595	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*성	</span>	<span>	11244	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	장*상	</span>	<span>	11615	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	유*선	</span>	<span>	11385	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*빈	</span>	<span>	11634	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*규	</span>	<span>	11216	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	양*봉	</span>	<span>	10720	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*윤	</span>	<span>	10775	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*우	</span>	<span>	10623	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	봉*혁	</span>	<span>	11128	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	진*호	</span>	<span>	11291	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	채*준	</span>	<span>	10399	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	최*환	</span>	<span>	10723	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	한*희	</span>	<span>	11241	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	한*호	</span>	<span>	11375	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	최*현	</span>	<span>	10549	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	윤*한	</span>	<span>	11230	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*훈	</span>	<span>	10744	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*일	</span>	<span>	10556	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	홍*수	</span>	<span>	11581	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	공*아	</span>	<span>	20446	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	김*유	</span>	<span>	20532	</span><br>
                        </li>
                        <li>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	김*지	</span>	<span>	20184	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	서*교	</span>	<span>	20131	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	우*은	</span>	<span>	20229	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	이*림	</span>	<span>	20191	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	이*은	</span>	<span>	20334	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	최*우	</span>	<span>	20342	</span><br>
                            <span>	경찰	</span>	<span>	전북 남자	</span>	<span>	박*희	</span>	<span>	10266	</span><br>
                            <span>	경찰	</span>	<span>	충남 여자	</span>	<span>	김*롱	</span>	<span>	20282	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	윤*훈	</span>	<span>	10474	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*호	</span>	<span>	11475	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	강*재	</span>	<span>	11415	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	정*훈	</span>	<span>	10718	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	권*한	</span>	<span>	10360	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	김*진	</span>	<span>	20430	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	김*림	</span>	<span>	20407	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	윤*기	</span>	<span>	11220	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	노*영	</span>	<span>	20393	</span><br>
                            <span>	경찰	</span>	<span>	경기남부여	</span>	<span>	장*연	</span>	<span>	20960	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	정*훈	</span>	<span>	10987	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	임*연	</span>	<span>	20420	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	강*혁	</span>	<span>	11217	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	구*웅	</span>	<span>	10238	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	표*원	</span>	<span>	11905	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	이*은	</span>	<span>	20506	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	김*형	</span>	<span>	10101	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*재	</span>	<span>	11484	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	유*연	</span>	<span>	20267	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	지*휘	</span>	<span>	11506	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	윤*이	</span>	<span>	20398	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	반*혁	</span>	<span>	11339	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*한	</span>	<span>	10852	</span><br>
                            <span>	경찰	</span>	<span>	인천 여자	</span>	<span>	김*진	</span>	<span>	20258	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*영	</span>	<span>	11352	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	한*수	</span>	<span>	11402	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	이*원	</span>	<span>	14698	</span><br>
                            <span>	경찰	</span>	<span>	경기남부	</span>	<span>	김*규	</span>	<span>	15427	</span><br>
                            <span>	경찰	</span>	<span>	경기북부	</span>	<span>	강*석	</span>	<span>	12286	</span><br>
                            <span>	경찰	</span>	<span>	인천경행 여	</span>	<span>	신*빈	</span>	<span>	50164	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	구*헌	</span>	<span>	10084	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*한	</span>	<span>	10195	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*연	</span>	<span>	10614	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*필	</span>	<span>	11159	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*해	</span>	<span>	11182	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	이*영	</span>	<span>	11299	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	홍*기	</span>	<span>	11490	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*형	</span>	<span>	11696	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*건	</span>	<span>	11938	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	우*훈	</span>	<span>	11964	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	김*욱	</span>	<span>	12071	</span><br>
                            <span>	경찰	</span>	<span>	인천여자	</span>	<span>	이*지	</span>	<span>	20106	</span><br>
                            <span>	경찰	</span>	<span>	인천여자	</span>	<span>	손*혜	</span>	<span>	20425	</span><br>
                            <span>	경찰	</span>	<span>	인천여자	</span>	<span>	박*은	</span>	<span>	20528	</span><br>
                            <span>	경찰	</span>	<span>	인천여자	</span>	<span>	박*연	</span>	<span>	20348	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	심*석	</span>	<span>	10245	</span><br>
                            <span>	경찰	</span>	<span>	인천여자	</span>	<span>	성*진	</span>	<span>	20058	</span><br>
                            <span>	경찰	</span>	<span>	인천 남자	</span>	<span>	박*준	</span>	<span>	12046	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	방*식	</span>	<span>	101509	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	장*정	</span>	<span>	102024	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	유*준	</span>	<span>	101100	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	이*훈	</span>	<span>	101099	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	박*수	</span>	<span>	101746	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	송*호	</span>	<span>	101229	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	안*웅	</span>	<span>	101048	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	전*현	</span>	<span>	101262	</span><br>
                            <span>	소방	</span>	<span>	인천구급	</span>	<span>	최*지	</span>	<span>	105114	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	고*규	</span>	<span>	101795	</span><br>
                            <span>	소방	</span>	<span>	전북	</span>	<span>	김*준	</span>	<span>	109073	</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	이*석	</span>	<span>	101104	</span><br>
                            <span>	소방	</span>	<span>	광주특채(여)	</span>	<span>	박*래	</span>	<span>		</span><br>
                            <span>	소방	</span>	<span>	인천예방	</span>	<span>	최*경	</span>	<span>		</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	김*환	</span>	<span>		</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	김*헌	</span>	<span>		</span><br>
                            <span>	소방	</span>	<span>	인천(남)	</span>	<span>	심*룡	</span>	<span>		</span><br>
                            <span>	9급	</span>	<span>	간호	</span>	<span>	전*은	</span>	<span>	85110032	</span><br>
                            <span>	9급	</span>	<span>	기계	</span>	<span>	오*택	</span>	<span>	91710105	</span><br>
                            <span>	9급	</span>	<span>	농업	</span>	<span>	진*준	</span>	<span>	92380010	</span><br>
                            <span>	9급	</span>	<span>	보건	</span>	<span>	김*정	</span>	<span>	93910196	</span><br>
                            <span>	9급	</span>	<span>	보건	</span>	<span>	주*연	</span>	<span>	93910303	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	강*진	</span>	<span>	90910254	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	김*준	</span>	<span>	90910786	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	김*찬	</span>	<span>	91010028	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	모*민	</span>	<span>	90910719	</span><br>
                        </li>	
                        <li>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	이*영	</span>	<span>	90910378	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	최*림	</span>	<span>	90910757	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	최*준	</span>	<span>	91110019	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	허*경	</span>	<span>	90911049	</span><br>
                            <span>	9급	</span>	<span>	세무	</span>	<span>	김*홍	</span>	<span>	90580003	</span><br>
                            <span>	9급	</span>	<span>	세무	</span>	<span>	김*지	</span>	<span>	90510278	</span><br>
                            <span>	9급	</span>	<span>	세무	</span>	<span>	이*필	</span>	<span>	90510081	</span><br>
                            <span>	9급	</span>	<span>	운전	</span>	<span>	김*회	</span>	<span>	97710392	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	김*나	</span>	<span>	90114993	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	김*승	</span>	<span>	90111897	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	김*환	</span>	<span>	90111776	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	김*정	</span>	<span>	90180013	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	남*우	</span>	<span>	90310066	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	박*연	</span>	<span>	90113245	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	박*종	</span>	<span>	90114551	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	박*제	</span>	<span>	90190067	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	손*혁	</span>	<span>	90180110	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	신*우	</span>	<span>	90180086	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	유*선	</span>	<span>	90110499	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	윤*영	</span>	<span>	90115478	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	장*림	</span>	<span>	90115203	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	전*연	</span>	<span>	90110255	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	정*은	</span>	<span>	90115336	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	정*사	</span>	<span>	90180070	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	정*정	</span>	<span>	90114753	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	황*태	</span>	<span>	90210113	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	황*선	</span>	<span>	90112756	</span><br>
                            <span>	9급	</span>	<span>	의료기술	</span>	<span>	박*현	</span>	<span>	94410046	</span><br>
                            <span>	9급	</span>	<span>	의료기술	</span>	<span>	김*름	</span>	<span>	94810036	</span><br>
                            <span>	9급	</span>	<span>	의료기술	</span>	<span>	김*혜	</span>	<span>	94640031	</span><br>
                            <span>	9급	</span>	<span>	보호	</span>	<span>	장*윤	</span>	<span>	67239306	</span><br>
                            <span>	9급	</span>	<span>	교정	</span>	<span>	정*선	</span>	<span>	65035060	</span><br>
                            <span>	9급	</span>	<span>	방송통신	</span>	<span>	김*경	</span>	<span>	72435058	</span><br>
                            <span>	9급	</span>	<span>	관세	</span>	<span>	김*애	</span>	<span>	61635345	</span><br>
                            <span>	9급	</span>	<span>	출관	</span>	<span>	정*림	</span>	<span>	66635154	</span><br>
                            <span>	9급	</span>	<span>	우정	</span>	<span>	최*영	</span>	<span>	60435459	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	박*이	</span>	<span>	909130305	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	이*희	</span>	<span>	909130320	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	노*강	</span>	<span>	901130128	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	국*희	</span>	<span>	901130252	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	서*원	</span>	<span>	901150128	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	최*영	</span>	<span>	901120058	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	정*림	</span>	<span>	901160049	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	주*훈	</span>	<span>	901160226	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	고*진	</span>	<span>	901160033	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	박*은	</span>	<span>	901160309	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	이*일	</span>	<span>	901180169	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	박*희	</span>	<span>	50130798	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	홍*성	</span>	<span>	901140068	</span><br>
                            <span>	9급	</span>	<span>	세무	</span>	<span>	한*근	</span>	<span>	905140068	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	한*규	</span>	<span>	902100010	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	윤*훈	</span>	<span>	902100046	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	서*식	</span>	<span>	901100432	</span><br>
                            <span>	9급	</span>	<span>	속기	</span>	<span>	서*미	</span>	<span>	981100020	</span><br>
                            <span>	9급	</span>	<span>	녹지	</span>	<span>	이*은	</span>	<span>	927100014	</span><br>
                            <span>	9급	</span>	<span>	해양수산	</span>	<span>	임*정	</span>	<span>	937100035	</span><br>
                            <span>	9급	</span>	<span>	지적	</span>	<span>	이*지	</span>	<span>	966800001	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	정*기	</span>	<span>	909150107	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	장*휘	</span>	<span>	909160001	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	김*지	</span>	<span>	901160373	</span><br>
                            <span>	9급	</span>	<span>	사복	</span>	<span>	김*람	</span>	<span>	909160120	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	황*진	</span>	<span>	901160702	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	유*권	</span>	<span>	901180158	</span><br>
                            <span>	9급	</span>	<span>	녹지	</span>	<span>	지*승	</span>	<span>	927100039	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	이*준	</span>	<span>	901900040	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	지*현	</span>	<span>	901110018	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	윤*정	</span>	<span>	901120077	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	민*영	</span>	<span>	901161139	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	차*빈	</span>	<span>	901800106	</span><br>
                            <span>	9급	</span>	<span>	지적	</span>	<span>	윤*현	</span>	<span>	966170001	</span><br>
                            <span>	9급	</span>	<span>	통신기술	</span>	<span>	신*규	</span>	<span>	990100009	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	윤*정	</span>	<span>	901130400	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	이*롱	</span>	<span>	901120048	</span><br>
                            <span>	9급	</span>	<span>	일행	</span>	<span>	오*아	</span>	<span>	901120089	</span><br>
                            <span>	9급	</span>	<span>	건축	</span>	<span>	조*리	</span>	<span>	963160012	</span><br>
                            <span>	9급	</span>	<span>	지적	</span>	<span>	이*례	</span>	<span>	966100018	</span><br>
                            <span>	9급	</span>	<span>	교행	</span>	<span>	손*영	</span>	<span>	10165	</span><br>
                            <span>	9급	</span>	<span>	전기	</span>	<span>	이*호	</span>	<span>	919100084	</span><br>
                            <span>	9급	</span>	<span>	교행	</span>	<span>	이*정	</span>	<span>	10979	</span><br>
                            <span>	9급	</span>	<span>	교행	</span>	<span>	김*은	</span>	<span>	10218	</span><br>
                            <span>	9급	</span>	<span>	부평구	</span>	<span>	박*향	</span>	<span>	901160864	</span><br>
                            <span>	9급	</span>	<span>	전기	</span>	<span>	원*헌	</span>	<span>	919100020	</span><br>
                            <span>	9급	</span>	<span>	보건	</span>	<span>	박*선	</span>	<span>	939100031	</span><br>
                        </li>	
                    </ul>				
                </div>
            </div>
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1947_01.jpg" alt="인천윌비스 공무원 합격자" /> 
            <ul class="tabs NSK-Black">
                <li><a href="#tab01">경찰공무원</a></li>
                <li><a href="#tab02">소방공무원</a></li>
                <li><a href="#tab03">9급공무원</a></li>
            </ul> 
            <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2020/11/1947_01_01.jpg" alt="찐합격수기 경찰" /></div>
            <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2020/11/1947_01_02.jpg" alt="찐합격수기 소방" /></div>
            <div id="tab03"><img src="https://static.willbes.net/public/images/promotion/2020/11/1947_01_03.jpg" alt="찐합격수기 9급" /></div>
            <div class="golec"><a href="https://willbesedu.willbes.net/pass/support/review/index" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/11/1947_01_txt.png" alt="찐합격수기 더보기" /></a></div>
        </div> 

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1947_02.jpg" alt="인천윌비스 공무원 합격자" />
            <ul>
                <li>                    
                    <div class="youtube">
                        <div><span>2019년 1차 최종합격생</span></div>
                        <iframe src="https://www.youtube.com/embed/HVvraTegmuY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </li>
                <li>                    
                    <div class="youtube">
                        <div><span>2019년 2차 최종합격생</span></div>
                        <iframe src="https://www.youtube.com/embed/4UiP-Q5VMyw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </li>
                <li>                    
                    <div class="youtube">
                        <div><span>2020년 소방 합격생</span></div>
                        <iframe src="https://www.youtube.com/embed/n4CoEMmvbWQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </li>
                <li>                    
                    <div class="youtube">
                        <div><span>2021년 1차 최종합격생</span></div>
                        <iframe src="https://www.youtube.com/embed/_jJxk-A7Gs0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </li>
            </ul>            
        </div> 
        
        <div class="evtCtnsBox">
            <ul class="wb_03">
                <li class="NSK-Black">coming soon!</li>
                <li>인천 윌비스  21년 2차 최종합격의 주인공은?</li>
                <li class="NSK-Black">이제 .. 당신 차례입니다!</li>
            </ul>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(function() {
            //Count the number of li elements
            var bx_num01 = $("#slider1 li").length;
            var ticker01 = $('#slider1').bxSlider({
                minSlides: 0,
                maxSlides: 100,
                slideWidth: 980,
                slideMargin: 0,
                ticker: true,
                mode: 'vertical',
                /*tickerHover: true,*/
                speed:20000*bx_num01
            });
        });

        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        ); 
    </script>

@stop