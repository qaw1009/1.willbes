<div class="group_box">
    @if(in_array($SqType,array('S','M','T')) === true && empty($IsObj) === true)
    <div class="col-md-9 col-md-offset-2 form-inline mt-10">
        <input type="text" name="" required="required" class="form-control" title="" value="">
        @if(empty($SqAction) === false)
            <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx="" onclick="delete_question_item(this,true)"><i class="fa fa-times fa-lg red"></i></a>
        @endif
        @if(in_array($SqType,array('T')) === true)
            <button type="button" class="btn btn-sm btn-primary ml-5" onclick="add_question_item(this)">문항추가</button>
        @endif
    </div>
    @endif

    @if(in_array($SqType,array('T')) === true || empty($IsObj) === false)
    <div class="col-md-9 col-md-offset-3 form-inline mt-5">
        <input type="text" name="" required="required" class="form-control" title="" value="">
        @if(empty($SqAction) === false)
            <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx="" onclick="delete_question_item(this)"><i class="fa fa-times fa-lg red"></i></a>
        @endif
    </div>
    @endif

    @if(in_array($SqType,array('D')) === true)
    <div class="col-md-9 col-md-offset-2 form-inline mt-10">
        <textarea name="" cols="70" rows="4" class="form-control"></textarea>
        @if(empty($SqAction) === false)
            <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx=""><i class="fa fa-times fa-lg red"></i></a>
        @endif
    </div>
    @endif
</div>
