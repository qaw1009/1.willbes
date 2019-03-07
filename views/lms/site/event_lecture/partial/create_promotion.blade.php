<div class="form-group">
    <label class="control-label col-md-1-1" for="attach_file_promotion">
        첨부파일<br><button type="button" class="btn btn-dark btn-sm btn-add-file">첨부필드추가</button>
    </label>
    <div class="col-md-10 form-inline file-box">
        @for($i = 0; $i < $promotion_attach_file_cnt; $i++)
            <div class="title file-input-box">
                <div class="filetype">
                    <input type="text" class="form-control file-text" disabled="">
                    <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                    <span class="file-select file-btn">
                        <input type="file" id="attach_file_promotion{{ $i }}" name="attach_file_promotion[]" class="form-control input-file" title="첨부{{ $i }}"/>
                    </span>
                    <input class="file-reset btn-danger btn" type="button" value="X" />
                </div>
                @if(empty($file_data_promotion[$i]) === false)
                    <p class="form-control-static ml-10 mr-10">[ <a href="{{ $file_data_promotion[$i]['FileFullPath'] . $file_data_promotion[$i]['FileName'] }}" rel="popup-image">{{ $file_data_promotion[$i]['FileRealName'] }}</a> ]
                        <a href="#none" class="file-delete" data-attach-idx="{{ $file_data_promotion[$i]['EfIdx']  }}"><i class="fa fa-times red"></i></a>
                    </p>
                @endif
            </div>
        @endfor
    </div>
</div>