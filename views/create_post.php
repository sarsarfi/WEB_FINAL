<?php $content = ob_start(); ?>
<div class="container mt-5">
    <h2>ارسال بست جدید</h2>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="/webfinal/posts/store">
        <div class="mb-3">
            <label for="content">محتواي بست:</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">ارسال بست</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
