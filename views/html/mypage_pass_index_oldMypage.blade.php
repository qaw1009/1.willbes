@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
.popWrap {width:1100px; margin:0 auto; height:900px; }
.popWrap .tabs {margin-top:20px}
.popWrap .tabs li {display:inline; float:left; width:25%}
.popWrap .tabs li a {display:block; height:50px; line-height:50px; text-align:center; border:1px solid #ccc; border-right:0; border-bottom:1px solid #000; font-size:18px; font-weight:bold; background:#e4e4e4; color:#666}
.popWrap .tabs li:last-child a {border-right:1px solid #ccc}
.popWrap .tabs li:last-child a.active,
.popWrap .tabs li a.active {border:1px solid #000; border-bottom:1px solid #fff; background:#fff; color:#000}
.popWrap .tabs:after {content:""; display:block; clear:both}
.popCts {border:1px solid #000; border-top:0; padding:20px; height:750px; overflow-y:scroll}
</style>

<div class="popWrap NGR">
    <ul class="tabs">
        <li><a href="#tab01" class="active">고등고시</a></li>
        <li><a href="#tab02">자격증</a></li>
        <li><a href="#tab03">취업</a></li>
        <li><a href="#tab04">경찰간부</a></li>
    </ul>
    <div class="popCts">
        <div id="tab01">
            고등고시
        </div>
        <div id="tab02">
            자격증
        </div> 
        <div id="tab03">
            취업
        </div> 
        <div id="tab04">
            경찰간부
        </div>    
    </div>
    <!--popCts//-->            
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.tabs').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            //$active.addClass('active');
            $content = $($active[0].hash);

            $links.not($active).each(function () {
                $(this.hash).hide();
            });

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
