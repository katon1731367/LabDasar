<img src="<?= base_url('assets/') ?>/img/wave.svg" class="wave">
<div class="login-container">
    <div class="img">
        <img src="<?= base_url('assets/') ?>/img/login-img.svg">
    </div>

    <div class="content">
        <div class="card" style="padding: 3rem;">
            <form action="<?= base_url('auth') ?>" method="POST">
                <img src="<?= base_url('assets/') ?>/img/profile-pic.svg" class="avatar">
                <h2>Welcome</h2>
                <?= $this->session->flashdata('message') ?>
                <div class="input-div username">
                    <div class="icon-login"><i class="fas fa-id-card-alt"></i></div>
                    <div class="user-input-wrp input">
                        <br />
                        <input type="text" class="inputText" name="nim" value="<?= set_value('nim') ?>" required />
                        <span class="floating-label">Nomor Induk Mahasiswa</span>
                    </div>
                </div>
                <div class="input-div password">
                    <div class="icon-login"><i class="fas fa-lock"></i></div>
                    <div class="user-input-wrp input">
                        <br />
                        <input type="password" class="inputText" name="password" required />
                        <span class="floating-label">Password</span>
                    </div>
                </div>
                <a href="<?= base_url() ?>Auth/forgotpass" class="forgot-pass">Forgot Password</a>
                <input type="submit" class="btn-gradient" value="login">
                <a href="<?= base_url() ?>Auth/registration" class="register">Create an Account!</a>
            </form>
        </div>
    </div>
</div>