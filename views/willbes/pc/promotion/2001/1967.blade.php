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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed; top:200px;right:0;z-index:10;}
        .sky li{padding-bottom:25px;}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1967_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#f8f8f8;} 

        .evt02, .evt03, .evt04 {background:#ddd;}
        .evt02_title {background:#ddd;padding:50px 0;}

        .evt04 {padding:100px 0;}

        .evt05 {background:#F1F1F1;position:relative;}
        .check {color:#000; font-size:14px;font-weight:bold;position:absolute;left:50%;top:39%;margin-left:-434px;margin-top:325px;background:#ececec;width:867px;padding:10px 0;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#c30006; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#000;}   

        .evt06 {background:#fff;}

        .evtInfo {padding:100px 0; background:#555; color:#fff; font-size:15px}
		.evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;margin:50px 0;}
        .tabContaier ul{width:964px;margin:0 auto;height:80px;border-bottom:5px solid #000;} 
        .tabContaier li{display:inline-block;width:400px;height:75px;line-height:75px;color:#000;float:left;font-size:30px;font-weight:bold;}
        .tabContaier li:first-child {margin-right:20px;margin-left:290px;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="#apply01"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_sky1.jpg" alt="1단계" >
                </a>
            </li>  
            <li>
                <a href="#apply03"> 
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1967_sky.png" alt="2단계" >
                </a>
            </li>        
            <li>
                <a href="#apply02"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_sky2.jpg" alt="실전문풀 풀패키지" >
                </a>
            </li>                
        </ul> 
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_top.jpg" title="문제풀이 풀패키지">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_01.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_02.jpg"  title="문제풀이 1단계">
        </div>

        <div class="evtCtnsBox evt02_title" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_02_title.jpg"  title="1단계 과목별 신청하기" id="apply01" >
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @else
            @endif    
        </div>

        <div class="evtCtnsBox evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_03.jpg"  title="문제풀이 2단계" id="apply03">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @else
            @endif    
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_04.jpg"  title="문제풀이 3단계">    
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @else
            @endif    
        </div>     

         <div class="evtCtnsBox evt05" id="apply02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_05.jpg" usemap="#Map1967_apply"  title="수강신청" border="0">
            <map name="Map1967_apply" id="Map1967_apply">
                <area shape="rect" coords="260,685,424,733" href="javascript:go_PassLecture('175823', '3001');"  alt="수강신청" />
                <area shape="rect" coords="692,683,855,735" href="javascript:go_PassLecture('175824', '3001');"  alt="수강신청" />
            </map>
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info" class="infotxt">이용안내 확인하기 ↓</a><br/><br/>
                <span>※ 강의공유, 콘테츠 부정 사용 적발 시, 회원 자격 박탈 및 환불이 불가하며, 불법 공유 행위 시안에 따라 민형사상 조치가 있을 수 있습니다.</span>
            </div>              
        </div>    

         <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_06.jpg"  title="수강신청">
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier">    
                    <ul>    
                        <li><a href="#tab1" class="active">일반공채/101단/전의경특채</a></li>          
                    </ul>
                </div> 
                <div id="tab1" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_06_tab01.jpg" usemap="#Map1967a" title="일반공채 수강신청" border="0"  />
                    <map name="Map1967a" id="Map1967a">
                        <area shape="rect" coords="891,124,1031,165" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1007" target="_blank" />
                        <area shape="rect" coords="890,304,1029,346" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1008" target="_blank" />
                        <area shape="rect" coords="892,494,1032,536" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1009" target="_blnak" />
                    </map>
                </div>
            </div>     
        </div>     

        <div class="evtCtnsBox evtInfo NGR" id="info">
			<div class="evtInfoBox">
				<h4 class="NGEB">윌비스 신광은 경찰 실전문제풀이 풀패키지 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>1.선택한 문제풀이 풀패키지 표기 기간 동안 문풀 1~3단계 전 강좌를 무제한 수강 할 수 있습니다.</li>    
                    <li>2.문풀 풀패키지 일바 직렬의 경우 한국사 교수님을 1분 선택하셔야 합니다.(변경은 불가)</li>   
                    <li>3.문풀 풀패키지 강좌는 결제 완료 후 수강이 즉시 시작됩니다.(수강일 설정 불가)</li>                    
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
                    <li>1.로그인 후 [내 강의실]-[무한 PASS존]으로 접속합니다.
                    <br/>&nbsp;&nbsp;&nbsp;구매하신 [실전 문풀 풀패키지] 선택 후 [강좌 추가하기]클릭, 원하시는 강좌를 등록하시면 수강 할 수 있습니다.</li>
                    <li>2.문풀 풀패키지는 시작일 변경 및 지정,일시정지,수강 연장,재수강 신청 등이 되지 않는 상품입니다.</li>
                    <li>3.문풀 풀패키지 수강 시 이용 가능한 기기는 2대로 제한됩니다.(PC 2대 또는 모바일 2대 또는 PC 1대+모바일 1대)</li>
                    <li>4.PC,모바일 등 단말기 초기화가 필요한 경우 최초 초기화는 본인이 직접 초기화 진행 가능 합니다.
                    <br/>&nbsp;&nbsp;&nbsp;그 이후 추가 초기화가 필요할 시 내용 확인 후 초기화 진행 가능 하오니 고객센터로 문의 바랍니다.
                    (무한 PASS존 내 등록 기기정보 확인)</li>
                    <li>5. 21년 1차대비 2단계,3단계 문제풀이 강의는 강의자료 3회출력제한 됩니다. <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=252343" target="_blank">출력제한 안내 바로보기 ></a></li>
				</ul>
				<div class="infoTit NG"><strong>교재 구매</strong></div>
				<ul>
                    <li>1.실전 문풀 패키지 강의에 사용되는 교재는 별도로 구매하셔야 하며,각 강좌별 교재는 강좌 소개 및 [교재구매] 메뉴에서 구매 가능합니다.</li>
				</ul>
				<div class="infoTit NG"><strong>환불 안내</strong></div>
				<ul>
                    <li>1.결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                    <li>2.고객 변심으로 인한 부분 환불은 수강 시작일(당일포함)로부터 7일이 경과되면,문제풀이 풀패키지 정가 기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>
				</ul>
                <div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
                    <li>1.본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립급 사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                    <li>2.신광은 경찰 PASS 강좌(부가 서비스 등)중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                    <li>3.아이디 공유,타인양도 등 부정 사용 적발 시 회원 자격 박탈 및 환불 불가하며,불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
				</ul>
				<ul>
					<li><strong>※ 이용문의:고객만족센터 1544-5006</strong></li>
				</ul>
			</div>
		</div>

	</div>
    <!-- End Container -->

<script type="text/javascript">

    /*탭(텍스터버전)*/
    $(document).ready(function(){
        $(".tabContents").hide();
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
        });
    });

    /* 이용안내 동의 */
    function go_PassLecture(code, cate) {
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }

        {{--var url = '{{ site_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;--}}
        var url = '{{ site_url('/periodPackage/show/cate/') }}' + cate + '/pack/648001/prod-code/' + code;
        location.href = url;
    }

</script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop