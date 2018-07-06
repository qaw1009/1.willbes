<div class="lnb-List">
    @foreach($__cfg['Subject2Professor'] as $subject_idx => $subject_row)
        <div class="lnb-List-Tit">
            <a href="#none"><span class="Txt">{{ $subject_row['SubjectName'] }}<span class="arrow-Btn">></span></span></a>
        </div>
        <div class="lnb-List-Depth">
            <dl>
                @foreach($subject_row['Professors'] as $prof_idx => $prof_row)
                    <dt>
                        <a href="{{ site_url('/professor/show/cate/' . $arr_param['cate'] . '/prof-idx/' . $prof_idx . '/?subject_idx=' . $subject_idx . '&subject_name=' . rawurlencode($subject_row['SubjectName'])) }}">
                            {{ $prof_row['wProfName'] }}
                        </a>
                    </dt>
                @endforeach
            </dl>
        </div>
    @endforeach
    <div class="lnb-List-Depth"></div>
</div>