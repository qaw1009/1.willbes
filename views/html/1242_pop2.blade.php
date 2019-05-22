@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    .willbes-Layer-PassBox span {vertical-align:auto}
    .eventPop {width:640px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;
	}
	

    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff !important; font-weight:bold; border:1px solid #333}
    .btnsSt3 a:hover {background:#fff; color:#333 !important}

	.forecast2 {padding:20px 0; line-height:1.3} 
	.forecast2 .tabs li {display:inline; float:left; width:33.33333%}
	.forecast2 .tabs li a {display:block; height:40px; line-height:40px; color:#115087; border:1px solid #115087; border-right:0; text-align:center; font-weight:600}
	.forecast2 .tabs li:last-child a {border-right:1px solid #115087}
	.forecast2 .tabs li a:hover,
	.forecast2 .tabs li a.active {color:#fff; background:#115087}
	.forecast2 .tabs:after {content:""; display:block; clear:both}
	
	.forecast2 .tabcts {margin:2em 0; border-top:1px dashed #E3E3E3}
	.forecast2 .areaList {border-bottom:1px dashed #E3E3E3}
	.forecast2 .areaList .area {float:left; width:15%; font-weight:600; line-height:50px; height:50px; text-align:center}
	.forecast2 .areaList .graph {float:left; width:70%; position:relative}
	.forecast2 .areaList .graph div {height:5px; width:100%; background:#E3E3E3; position:absolute}
	.forecast2 .areaList .graph .man {top:15px}
	.forecast2 .areaList .graph .man span {height:5px; background:#39F; position:absolute; z-index:1;
		animation-duration: 1s;
		animation-name: slidein;
	}	
	.forecast2 .areaList .graph .woman {top:30px}
	.forecast2 .areaList .graph .woman span {height:5px; background:#F69; position:absolute; z-index:1; 
		animation-duration: 1s;
		animation-name: slidein;
	}
	@@keyframes slidein {
		from {
		width: 0%;
		}
		to {
		
		}
	}
	.forecast2 .areaList .number {float:right; width:15%; text-align:right; padding-top:8px}
	.forecast2 .areaList .number .man {color:#39F}
	.forecast2 .areaList .number .woman {color:#F69}
	.forecast2 .areaList2 .area {float:left; width:15%; font-weight:600; line-height:35px; height:35px}
	.forecast2 .areaList:after {content:""; display:block; clear:both}
}

</style>
<div class="willbes-Layer-PassBox NGR">
	<div class="eventPop">
        <h3>
            <span class="tx-bright-blue">실시간 서비스 참여인원</span> 
        </h3>
    <div class="forecast2">  
		<ul class="tabs">
			<li><a href="#tab1">일반(남&여) : 전 지역 (17개 지역)</a></li>
			<li><a href="#tab2">전의경경채 : 전 지역 (17개 지역)</a></li>
 			<li><a href="#tab3">101단(서울)</a></li>
		</ul>
        
		<div id="tab1" class="tabcts">
			
			<div class="areaList">
				<div class="area">서울</div>
				<div class="graph">							
                    	<div class="man"><span style="width:100%"></span></div>
					<div class="woman"><span style="width:32%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 305명<br> 
					<span class="woman">여</span> 95명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">부산</div>
				<div class="graph">							
                    	<div class="man"><span style="width:5%"></span></div>
					<div class="woman"><span style="width:2%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 16명<br> 
					<span class="woman">여</span> 7명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">대구</div>
				<div class="graph">							
                    	<div class="man"><span style="width:3%"></span></div>
					<div class="woman"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 10명<br> 
					<span class="woman">여</span> 2명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">인천</div>
				<div class="graph">							
                    	<div class="man"><span style="width:22%"></span></div>
					<div class="woman"><span style="width:4%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 65명<br> 
					<span class="woman">여</span> 13명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">광주</div>
				<div class="graph">							
                    	<div class="man"><span style="width:6%"></span></div>
					<div class="woman"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 18명<br> 
					<span class="woman">여</span> 4명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">대전</div>
				<div class="graph">							
                    	<div class="man"><span style="width:11%"></span></div>
					<div class="woman"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 34명<br> 
					<span class="woman">여</span> 2명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">울산</div>
				<div class="graph">							
                    	<div class="man"><span style="width:1%"></span></div>
					<div class="woman"><span style="width:0%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 2명<br> 
					<span class="woman">여</span> 0명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">경기남부</div>
				<div class="graph">							
                    	<div class="man"><span style="width:90%"></span></div>
					<div class="woman"><span style="width:18%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 270명<br> 
					<span class="woman">여</span> 53명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">경기북부</div>
				<div class="graph">							
                    	<div class="man"><span style="width:26%"></span></div>
					<div class="woman"><span style="width:16%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 79명<br> 
					<span class="woman">여</span> 48명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">강원</div>
				<div class="graph">							
                    	<div class="man"><span style="width:4%"></span></div>
					<div class="woman"><span style="width:6%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 11명<br> 
					<span class="woman">여</span> 17명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">충북</div>
				<div class="graph">							
                    	<div class="man"><span style="width:4%"></span></div>
					<div class="woman"><span style="width:2%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 12명<br> 
					<span class="woman">여</span> 5명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">충남</div>
				<div class="graph">							
                    	<div class="man"><span style="width:11%"></span></div>
					<div class="woman"><span style="width:9%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 34명<br> 
					<span class="woman">여</span> 26명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">전북</div>
				<div class="graph">							
                   	 <div class="man"><span style="width:6%"></span></div>
					<div class="woman"><span style="width:4%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 18명<br> 
					<span class="woman">여</span> 12명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">전남</div>
				<div class="graph">							
                    	<div class="man"><span style="width:8%"></span></div>
					<div class="woman"><span style="width:3%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 23명<br> 
					<span class="woman">여</span> 9명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">경북</div>
				<div class="graph">							
                    	<div class="man"><span style="width:2%"></span></div>
					<div class="woman"><span style="width:3%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 5명<br> 
					<span class="woman">여</span> 8명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">경남</div>
				<div class="graph">							
                    	<div class="man"><span style="width:6%"></span></div>
					<div class="woman"><span style="width:2%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 18명<br> 
					<span class="woman">여</span> 5명
				</div>
			</div>
			
			<div class="areaList">
				<div class="area">제주</div>
				<div class="graph">							
                    	<div class="man"><span style="width:6%"></span></div>
					<div class="woman"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man">남</span> 18명<br> 
					<span class="woman">여</span> 2명
				</div>
			</div>			
		</div><!--tab1//-->
        
        	<div id="tab2" class="tabcts">			
			<div class="areaList areaList2">
				<div class="area">서울</div>
				<div class="graph">							
                    	<div class="man"><span style="width:11%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 32명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">부산</div>
				<div class="graph">							
                    	<div class="man"><span style="width:0%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 0명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">대구</div>
				<div class="graph">							
                    	<div class="man"><span style="width:0%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 1명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">인천</div>
				<div class="graph">							
                    	<div class="man"><span style="width:4%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 13명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">광주</div>
				<div class="graph">							
                    	<div class="man"><span style="width:3%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 8명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">대전</div>
				<div class="graph">							
                    	<div class="man"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 3명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">울산</div>
				<div class="graph">							
                    	<div class="man"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 2명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">경기남부</div>
				<div class="graph">							
                    	<div class="man"><span style="width:13%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 39명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">경기북부</div>
				<div class="graph">							
                    	<div class="man"><span style="width:2%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 6명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">강원</div>
				<div class="graph">							
                    	<div class="man"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 3명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">충북</div>
				<div class="graph">							
                    	<div class="man"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 3명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">충남</div>
				<div class="graph">							
                    	<div class="man"><span style="width:2%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 6명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">전북</div>
				<div class="graph">							
                    	<div class="man"><span style="width:0%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 0명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">전남</div>
				<div class="graph">							
                    	<div class="man"><span style="width:0%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 0명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">경북</div>
				<div class="graph">							
                    	<div class="man"><span style="width:0%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 1명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">경남</div>
				<div class="graph">							
                    	<div class="man"><span style="width:0%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 1명<br> 
				</div>
			</div>
			
			<div class="areaList areaList2">
				<div class="area">제주</div>
				<div class="graph">							
                    	<div class="man"><span style="width:1%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 2명<br> 
				</div>
			</div>			
		</div><!--tab2//-->       

		<div id="tab3" class="tabcts">			
			<div class="areaList areaList2">
				<div class="area">서울</div>
				<div class="graph">							
                    	<div class="man"><span style="width:11%"></span></div>
				</div>
				<div class="number">
					<span class="man"></span> 32명<br> 
				</div>
			</div>					
		</div><!--tab3//--> 
                
		<div class="btnsSt3">
          	<a href="javascript:close();">확인</a>
        	</div>

	</div>
</div>
<!--willbes-Layer-PassBox//-->

<script>
    $(document).ready(function(){
        $('ul.tabs').each(function(){
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

                e.preventDefault()})})});
</script>


@stop