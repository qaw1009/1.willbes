<h2>교수진 소개</h2>
<div class="lnb-List">
    @foreach($arr_lnb_professor as $lnb_subject_idx => $lnb_subject_row)
        @php
            $lnb_subject_hover_class = '';
            $lnb_subject_block_style = '';
            if (isset($arr_input['subject_idx']) === true && $arr_input['subject_idx'] == $lnb_subject_idx) {
                $lnb_subject_hover_class = 'hover';
                $lnb_subject_block_style = 'display: block;';
            }
        @endphp

        <div class="lnb-List-Tit {{ $lnb_subject_hover_class }}">
            <a href="#none"><span class="Txt">{{ key($lnb_subject_row) }}<span class="arrow-Btn">></span></span></a>
        </div>
        <div class="lnb-List-Depth" style="{{ $lnb_subject_block_style }}">
            <dl>
                @foreach(current($lnb_subject_row) as $lnb_prof_idx => $lnb_prof_row)
                    {{-- 카테고리코드::과목식별자::과목명::교수명 --}}
                    @php $lnb_prof_data = explode('::', $lnb_prof_row); @endphp
                    @if($__cfg['IsPassSite'] === true)
                        @php $lnb_show_url = '/professor/show/prof-idx/' . $lnb_prof_idx . '?cate_code=' . $lnb_prof_data[0] . '&'; @endphp
                    @else
                        @php $lnb_show_url = '/professor/show/cate/' . $lnb_prof_data[0] . '/prof-idx/' . $lnb_prof_idx . '?'; @endphp
                    @endif
                    <dt>
                        <a href="{{ front_url($lnb_show_url . 'subject_idx=' . $lnb_prof_data[1] . '&subject_name=' . rawurlencode($lnb_prof_data[2])) }}" class="{{ isset($prof_idx) === true && $lnb_prof_idx == $prof_idx ? 'active' : '' }}">{{ $lnb_prof_data[3] }}</a>
                    </dt>
                @endforeach
            </dl>
        </div>
    @endforeach
    <div class="lnb-List-Depth"></div>
</div>
