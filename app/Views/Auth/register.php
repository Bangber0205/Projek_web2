<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        display: flex;
        height: 100dvh;
        overflow: hidden;
    }
    .container {
        display: flex;
        width: 100%;
    }
    /* LEFT SECTION */
    .left-section {
        flex: 1;
        background: url('<?= base_url('images/bg-biru.png') ?>') no-repeat center center/cover;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 80px;
        gap: 20px;
    }
    .logo {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        gap: 10px;
    }
    .logo img {
        width: 50px;
        background-color: #0033FF;
        padding: 10px 12px;
        border-radius: 10px;
    }
    .welcome-text h1 {
        font-size: 50px;
        font-weight: 300;
        margin-bottom: 10px;
    }
    .welcome-text h1 span {
        display: block;
        font-weight: bold;
    }
    .welcome-text p {
        font-size: 14px;
        font-weight: 200;
        margin-top: 30px;
    }
    /* RIGHT SECTION */
    .right-section {
        flex: 1;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .login-form {
        width: 80%;
        max-width: 400px;
    }
    .login-form h2 {
        color: #0033FF;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 30px;
        line-height: 1.4;
    }
    /* FORM */
    .form-group {
        display: flex;
        border: 1px solid #0033FF;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 20px;
    }
    .icon-box {
        background: #0033FF;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
    }
    .icon-box img {
        width: 20px;
    }
    .form-group input {
        border: none;
        outline: none;
        padding: 14px 16px;
        flex: 1;
        font-size: 14px;
        color: #333;
    }
    /* BUTTON */
    .button {
        display: flex;
        gap: 20px;
        margin-top: 10px;
        margin-bottom: 40px;
    }
    .login-btn, .signup-btn {
        text-decoration: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        padding: 5px 28px;
        transition: all 0.3s;
    }
    .signup-btn {
        background-color: #0033FF;
        color: white;
        border: 1px solid #0033FF;
        box-shadow: 1px 1px 4px #888;
    }
    .signup-btn:hover {
        background-color: white;
        color: #0033FF;
    }
    .login-btn {
        background-color: white;
        color: #0033FF;
        border: 1px solid #0033FF;
        box-shadow: 1px 1px 4px #888;
    }
    .login-btn:hover {
        background-color: #0033FF;
        color: white;
        text-decoration: none;
    }
    /* MEDSOS */
    .social-section {
        display: flex;
        text-align: center;
    }
    .social-title {
        color: #0033FF;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 10px;
        display: flex;
        text-align: center;
        justify-content: center;
        align-items: center;
    }
    .social-icons {
        justify-content: center;
        margin-left: 5px;
    }
    .social-icons img {
        width: 30px;
        cursor: pointer;
    }
    .invalid-feedback {
        color: red;
        font-size: 12px;
        margin-bottom: 10px;
    }
@media (max-width: 768px) {
    body {
        height: auto;
        overflow: auto;
    }
    .container {
        flex-direction: column;
        height: auto;
    }
    .left-section {
        flex: none;
        height: 180px;
        padding: 30px 20px;
        text-align: center;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .left-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 51, 255, 0.7);
        z-index: 1;
    }
    .left-section .logo {
        display: none;
    }
    .left-section .welcome-text {
        position: relative;
        z-index: 2;
    }
    .right-section {
        flex: 1;
        padding: 20px;
    }
    .login-form {
        width: 100%;
        max-width: none;
    }
    .login-form h2 {
        font-size: 20px;
        margin-bottom: 20px;
    }
    .welcome-text h1 {
        font-size: 22px;
        margin-bottom: 5px;
    }
    .welcome-text p {
        font-size: 10px;
        margin-top: 0;
    }
    .form-group input {
        padding: 12px 14px;
        font-size: 13px;
    }
    .button {
        gap: 15px;
        margin-bottom: 30px;
    }
    .login-btn, .signup-btn {
        padding: 8px 20px;
        font-size: 12px;
    }
    .social-icons img {
        width: 25px;
    }
}
</style>

<div class="container">
    <!-- LEFT SECT -->
    <div class="left-section">
        <div class="logo">
            <img src="<?= base_url('images/store-icon.png') ?>" class="logo-img" alt="logo">
            <div>
                <p style="font-weight:700; font-size:22px;">Warung<span style="font-weight:400;">Kita</span></p>
                <p style="font-size:13px; text-align: center;">Satu sistem, semua cabang<br>terkendali</p>
            </div>
        </div>
        <div class="welcome-text">
            <h1>Hello,<br><span>Welcome!</span></h1>
            <p>“Satu akun, satu kendali, untuk semua cabang bisnismu.”</p>
        </div>
    </div>

    <!-- RIGHT SECT -->
    <div class="right-section">
        <div class="login-form">
            <h2>Silahkan buat akun<br>terlebih dahulu!</h2>
            <form action="<?= url_to('register') ?>" method="post">
                <?= csrf_field() ?>

                <!-- EMAIL -->
                <div class="form-group">
                    <div class="icon-box">
                        <img src="<?= base_url('images/email-icon.png') ?>" alt="email ico">
                    </div>
                    <input type="email" name="email" placeholder="Email address"
                        value="<?= old('email') ?>"
                        class="<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>">
                </div>
                <?php if (session('errors.email')): ?>
                    <div class="invalid-feedback"><?= session('errors.email') ?></div>
                <?php endif; ?>

                <!-- USERNAME -->
                <div class="form-group">
                    <div class="icon-box">
                        <img src="<?= base_url('images/user-icon.png') ?>" alt="user ico">
                    </div>
                    <input type="text" name="username" placeholder="Username"
                        value="<?= old('username') ?>"
                        class="<?php if (session('errors.username')) : ?>is-invalid<?php endif ?>">
                </div>
                <?php if (session('errors.username')): ?>
                    <div class="invalid-feedback"><?= session('errors.username') ?></div>
                <?php endif; ?>

                <!-- PASSWORD -->
                <div class="form-group">
                    <div class="icon-box">
                        <img src="<?= base_url('images/lock-icon.png') ?>" alt="lock icon">
                    </div>
                    <input type="password" name="password" placeholder="Password"
                        class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>">
                </div>
                <?php if (session('errors.password')): ?>
                    <div class="invalid-feedback"><?= session('errors.password') ?></div>
                <?php endif; ?>

                <!-- REPEAT PASSWORD -->
                <div class="form-group">
                    <div class="icon-box">
                        <img src="<?= base_url('images/lock-icon.png') ?>" alt="lock icon">
                    </div>
                    <input type="password" name="pass_confirm" placeholder="Re-type Password"
                        class="<?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>">
                </div>
                <?php if (session('errors.pass_confirm')): ?>
                    <div class="invalid-feedback"><?= session('errors.pass_confirm') ?></div>
                <?php endif; ?>

                <!-- BUTTONS -->
                <div class="button">
                    <button type="submit" class="signup-btn"><?= lang('Auth.register') ?></button>
                    <a href="<?= url_to('login') ?>" class="login-btn">Login</a>
                </div>
            </form>

            <!-- MEDSOS -->
            <div class="social-section">
                <div class="social-title">
                    <p>FOLLOW US:</p>
                </div>
                <div class="social-icons">
                    <img src="<?= base_url('images/insta-icon.png') ?>" alt="Instagram">
                    <img src="<?= base_url('images/fb-icon.png') ?>" alt="Facebook">
                    <img src="<?= base_url('images/x-icon.png') ?>" alt="X">
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
