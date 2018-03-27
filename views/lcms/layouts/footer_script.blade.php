{{-- 하단 공통 스크립트 --}}
<script type="text/javascript">
    var $__csrf_token_name = '{{ csrf_token_name() }}';
    var $__csrf_token = '{{ csrf_token() }}';
    var $__menu_current_idx = '{{ element('MenuIdx', element('CURRENT', $__menu, [])) }}';
    var $__site_codes = {!! json_encode(array_pluck(element('Site', $__auth, []), 'SiteName', 'SiteCode')) !!};
</script>
<script src="/public/vendor/validator/multifield.js"></script>
<script src="/public/js/util.js"></script>
<script src="/public/js/validation_util.js"></script>
<script src="/public/js/lcms/app.js"></script>
