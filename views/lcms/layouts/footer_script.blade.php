{{-- 하단 공통 스크립트 --}}
<script type="text/javascript">
    var $__global = {
        'csrf_token_name' : '{{ csrf_token_name() }}',
        'csrf_token' : '{{ csrf_token() }}',
        'menu_current_idx' : '{{ element('MenuIdx', element('CURRENT', $__menu, [])) }}'
    };
</script>
<script src="/public/vendor/validator/multifield.js"></script>
<script src="/public/js/util.js"></script>
<script src="/public/js/validation_util.js"></script>
<script src="/public/js/lcms/app.js"></script>
