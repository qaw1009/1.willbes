<div class="will-listTit">BEST 강좌</div>
<div class="bestLectBx">
@if(empty($data['best_product']['subjects']) === false)
    <ul class="prof-subject">
    @foreach($data['best_product']['subjects'] as $subject_idx => $subject_name)
        <li><a href='#tab_prof_subject_{{ $subject_idx }}'><span>|</span>{{ $subject_name }}</a></li>
    @endforeach
    </ul>

    <div id="prof-professors" class="prof-professors">
        @foreach($data['best_product']['list'] as $subject_idx => $rows)
            <ul id="tab_prof_subject_{{ $subject_idx }}" class="prof-slider">
            @foreach($rows as $row)
                <li>
                    <div><img src="{{ $row['ProfLecListImg'] }}" alt="{{ $row['wProfName'] }}" class=""/></div>
                    <span class="txt1">{{ $row['SubjectName'] }}</span>
                    <span class="txt2">{{ $row['wProfName'] }}</span>
                    <span class="txt3">{{ hpSubString($row['ProdName'], 0, 32, '...') }}</span>
                    @if($row['wUnitIdx'] != 'N')
                        <a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$row['wUnitIdx']}}','HD');">맛보기강좌 ></a>
                    @endif
                </li>
            @endforeach
            </ul>
        @endforeach
    </div>
@endif
</div>
<script type="text/javascript">
    $(function(){
        $('.prof-subject').bxSlider({
            speed:800,
            responsive:true,
            infiniteLoop:true,
            pager:false,
            slideWidth:78,
            minSlides:1,
            maxSlides:8
        });

        $('.prof-subject').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');

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

        // 1번째 과목 상품 강제 노출
        $('#prof-professors .prof-slider').eq(0).css('display', 'block');
    });
</script>