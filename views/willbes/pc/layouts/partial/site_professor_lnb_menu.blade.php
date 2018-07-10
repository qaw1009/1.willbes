<div class="lnb-List">
    @foreach($arr_subject2professors as $subject_idx => $subject_row)
        <div class="lnb-List-Tit">
            <a href="#none"><span class="Txt">{{ key($subject_row) }}<span class="arrow-Btn">></span></span></a>
        </div>
        <div class="lnb-List-Depth">
            <dl>
                @foreach(current($subject_row) as $prof_idx => $prof_name)
                    <dt>
                        <a href="{{ site_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/' . $prof_idx . '/?subject_idx=' . $subject_idx . '&subject_name=' . rawurlencode(key($subject_row))) }}">
                            {{ $prof_name }}
                        </a>
                    </dt>
                @endforeach
            </dl>
        </div>
    @endforeach
    <div class="lnb-List-Depth"></div>
</div>