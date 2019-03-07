@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    body {padding:0; margin:0}
    h3 {background:#115087; color:#fff; text-align:center; padding:20px 0; font-size:160%; font-weight:600}
	.forecast2 .btnSet {text-align:center; padding:1em}
	.forecast2 .btnSet a {display:inline-block; border:1px solid #115087; color:#115087; height:25px; line-height:25px; margin:0 4px; padding:0 10px}
	.forecast2 .btnSet a.btnSt1 {color:#fff; background:#115087}
	

	.forecast2 {padding:20px; line-height:1.3} 
	.forecast2 .tabs li {display:inline; float:left; width:33.33333%}
	.forecast2 .tabs li a {display:block; height:40px; line-height:40px; color:#115087; border:1px solid #115087; border-right:0; text-align:center; font-size:120%; font-weight:600}
	.forecast2 .tabs li:last-child a {border-right:1px solid #115087}
	.forecast2 .tabs li a:hover,
	.forecast2 .tabs li a.active {color:#fff; background:#115087}
	.forecast2 .tabs:after {content:""; display:block; clear:both}
	
	.forecast2 .tabcts {margin:2em 0; border-top:1px dashed #E3E3E3}
	.forecast2 .areaList {border-bottom:1px dashed #E3E3E3}
	.forecast2 .areaList .area {float:left; width:15%; font-weight:600; line-height:50px; height:50px}
	.forecast2 .areaList .graph {float:left; width:70%; position:relative}
	.forecast2 .areaList .graph div {height:5px; width:100%; background:#E3E3E3; position:absolute}
	.forecast2 .areaList .graph .man {top:15px}
	.forecast2 .areaList .graph .man span {height:5px; background:#39F; position:absolute; z-index:1}
	.forecast2 .areaList .graph .woman {top:30px}
	.forecast2 .areaList .graph .woman span {height:5px; background:#F69; position:absolute; z-index:1}
	.forecast2 .areaList .number {float:right; width:15%; text-align:right; padding-top:8px}
	.forecast2 .areaList .number .man {color:#39F}
	.forecast2 .areaList .number .woman {color:#F69}
	.forecast2 .areaList:after {content:""; display:block; clear:both}
}

</style>
<div class="willbes-Layer-PassBox NGR">
<h3>실시간 서비스 참여인원</h3>
    <div class="forecast2">  
		<ul class="tabs">
			<li><a href="#tab1">일반공채</a></li>
			<li><a href="#tab2">경행경채</a></li>
		</ul>
        
		<div id="tab1" class="tabcts">
			<c:forEach items="${type1}" var="data"  varStatus="status">
			<div class="areaList">
				<div class="area">${data.GOSI_AREA_NM}</div>
				<div class="graph">							
                    <div class="man"><span style="width:${data.M_PR/3}%"></span></div>
					<div class="woman"><span style="width:${data.W_PR/3}%"></span></div>
				</div>
				<div class="number">
                    <span class="man">남</span> ${data.CNT_M}명<br> 
                    <span class="woman">여</span> ${data.CNT_W}명
                </div>
			</div>
			</c:forEach>
		</div><!--tab1//-->
        
        <div id="tab2" class="tabcts">
			<c:forEach items="${type3}" var="data"  varStatus="status">
			<div class="areaList">
				<div class="area">${data.GOSI_AREA_NM}</div>
				<div class="graph">							
                    <div class="man"><span style="width:${data.PR/3}%"></span></div>
				</div>
				<div class="number">
                    <span class="man"></span> ${data.CNT}명<br> 
                </div>
			</div>
			</c:forEach>
		</div><!--tab2//-->       

                
        <div class="btnSet">
        	<a href="javascript:window.close()" class="btnSt1">닫기</a>        	
        </div>
        <!--미참여 상태//-->      
        
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