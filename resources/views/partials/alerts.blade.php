@if (session('success'))
<div class="alert alert-success">
    عملیات با موفقیت انجام شد
</div>
@endif

@if (session('failed'))
<div class="alert alert-danger">
    عملیات با شکست مواجه شد
</div>
@endif

@if (session('registered'))
<div class="alert alert-success">
    @lang('auth.your registration was successful')
</div>
@endif

@if (session('wronCredentials'))
<div class="alert alert-success">
    @lang('auth.user or password was wrong')
</div>
@endif

@if (session('emailHasVerified'))
<div class="alert alert-success">
    @lang('auth.email has verified')
</div>
@endif
