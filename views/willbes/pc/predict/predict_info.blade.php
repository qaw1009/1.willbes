@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    .willbes-Layer-PassBox span {vertical-align:auto}
    .eventPop {width:640px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;}
    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff !important; font-weight:bold; border:1px solid #333}
    .btnsSt3 a:hover {background:#fff; color:#333 !important}
	.forecast2 {padding:20px 0; line-height:1.3}
	.forecast2 .tabs li {display:inline; float:left; width:25%}
	.forecast2 .tabs li a {display:block; height:40px; line-height:40px; color:#115087; border:1px solid #115087; border-right:0; text-align:center; font-weight:600}
	.forecast2 .tabs li:last-child a {border-right:1px solid #115087}
	.forecast2 .tabs li a:hover,
	.forecast2 .tabs li a.active {color:#fff; background:#115087}
	.forecast2 .tabs:after {content:""; display:block; clear:both}
	.forecast2 .tabcts {margin:2em 0; border-top:1px dashed #E3E3E3}
	.forecast2 .areaList {border-bottom:1px dashed #E3E3E3}
	.forecast2 .areaList .area {float:left; width:15%; font-weight:600; line-height:35px; height:35px; text-align:center}
	.forecast2 .areaList .graph {float:left; width:70%; position:relative}
	.forecast2 .areaList .graph div {height:5px; width:100%; background:#E3E3E3; position:absolute}
	.forecast2 .areaList .graph .man {top:15px}
	.forecast2 .areaList .graph .man span {height:5px; background:#39F; position:absolute; z-index:1;
		animation-duration: 1s;
		animation-name: slidein;
	}
	.forecast2 .areaList .graph .woman {top:15px}
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
	.forecast2 .areaList:after {content:""; display:block; clear:both}
</style>

<div class="willbes-Layer-PassBox NGR">
	<div class="eventPop">
        <h3>
            <span class="tx-bright-blue">실시간 서비스 참여인원</span> 
        </h3>
    <div class="forecast2">  
		<ul class="tabs">
			@foreach($arr_base['arr_mock_part'] as $key => $val)
				<li><a href="#tab{{ $key }}">{{ $val }}</a></li>
			@endforeach
		</ul>

		@foreach($arr_base['arr_mock_part'] as $mp_key => $mp_val)
			<div id="tab{{ $mp_key }}" class="tabcts">
				@if ($mp_key == '400')
					<div class="areaList areaList2">
						<div class="area">서울</div>
						<div class="graph">
							<div class="man"><span style="width:{{ (empty($data[$mp_key]['712001']) === false) ? round(($data[$mp_key]['712001'] / $arr_total_count[$mp_key]) * 100) : '0' }}%"></span></div>
						</div>
						<div class="number">
							<span class="man"></span>
							{{ (empty($data[$mp_key]['712001']) === false) ? $data[$mp_key]['712001'] : '0' }}명
						</div>
					</div>
				@else
					@foreach($arr_base['arr_area'] as $key => $val)
						<div class="areaList">
							<div class="area">{{ $val }}</div>
							<div class="graph">
								<div class="man"><span style="width:{{ (empty($data[$mp_key][$key]) === false) ? round(($data[$mp_key][$key] / $arr_total_count[$mp_key]) * 100) : '0' }}%"></span></div>
							</div>
							<div class="number">
								<span class="man"></span>
								{{ (empty($data[$mp_key][$key]) === false) ? $data[$mp_key][$key] : '0' }}명
							</div>
						</div>
					@endforeach
				@endif
			</div>
		@endforeach
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
                e.preventDefault()
            });
        });
    });
</script>
@stop