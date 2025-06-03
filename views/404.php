<?php $content = ob_start(); ?>
<div class="container mt-5">
    <div class="alert alert-danger">
        <h1>۴۰۴ - صفحه مورد نظر یافت نشد</h1>
        <p>صفحه‌ای که به دنبال آن هستید وجود ندارد یا حذف شده است.</p>
        <a href="/webfinal/" class="btn btn-primary">بازگشت به صفحه اصلی</a>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>