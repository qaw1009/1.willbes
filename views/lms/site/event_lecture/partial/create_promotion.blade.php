<div class="form-group">
    <label class="control-label col-md-1-1" for="promotion_params">추가 파라미터(GET방식) </label>
    <div class="col-md-10 form-inline">
        <input type="text" id="promotion_params" name="promotion_params" class="form-control" value="{{ $data['PromotionParams'] }}" title="프로모션 파라미터" style="width: 40%;">
        &nbsp;&nbsp;&nbsp;&nbsp;• Ex) param=1&amp;param=2&amp;param=3&amp;param=4
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-1-1" for="attach_file_promotion">
        첨부파일<br><button type="button" class="btn btn-dark btn-sm btn-add-file">첨부필드추가</button><br><br>
        <span style="color:red;">* 첨부파일 우측의 칸은 노출순서입니다.(필수 X)</span>
    </label>
    <div class="col-md-10 form-inline file-box">
        @for($i = 0; $i < $promotion_attach_file_cnt; $i++)
            <div class="title file-input-box">
                <!--div class="filetype">
                    <input type="text" class="form-control file-text" disabled="">
                    <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                    <span class="file-select file-btn"-->
                        <input type="file" id="attach_file_promotion{{ $i }}" name="attach_file_promotion[]" class="form-control input-file" title="첨부{{ $i }}"/>
                        <input type="text" id="Ordering'{{ $i }}" name="Ordering[]" style="width:20px;" />
                    <!--/span>
                    <input class="file-reset btn-danger btn" type="button" value="X" />
                </div-->
                @if(empty($file_data_promotion[$i]) === false)
                    <p class="form-control-static ml-10 mr-10">[ <a href="{{ $file_data_promotion[$i]['FileFullPath'] . $file_data_promotion[$i]['FileName'] }}" rel="popup-image">{{ $file_data_promotion[$i]['FileRealName'] }}</a> ]
                        <a href="#none" class="file-delete" data-attach-idx="{{ $file_data_promotion[$i]['EfIdx']  }}"><i class="fa fa-times red"></i></a>
                        / 노출순서 : {{ $file_data_promotion[$i]['Ordering'] }}
                    </p>
                @endif
            </div>
        @endfor
    </div>
</div>