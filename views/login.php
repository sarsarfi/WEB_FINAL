<?php $content = ob_start(); ?>
<div class="container mt-5">
    <h2>ورود به سیستم</h2>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
    <?php endif; ?>
    <form method="POST" action="/webfinal/login">
        <div class="mb-3">
            <label for="email">ایمیل:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">رمز عبور:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">ورود</button>
   
