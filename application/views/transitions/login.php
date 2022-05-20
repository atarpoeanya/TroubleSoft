<br>
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center login-position">
        <div class="card card-login kanjifont">
            <h4 class="card-header">ログイン</h4>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>Trouble/login_validation">
                    <div class="form-group">
                        <label>社員番号</label>
                        <input type="text" name="username" class="form-control" />
                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>パスワード</label>
                        <input type="password" name="password" class="form-control" />
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                    <div class="d-flex justify-content-end text-nowrap mt-3">
                        <div class="form-group">
                            <?php
                            echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
                            ?>
                            <input type="submit" name="insert" value="ログイン" class="btn btn-secondary" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<br>

<style>
    .card-login {
        width: 50vw;
    }

    .card-header {
        background-color: #959595;
    }

    .card-body {
        background-color: #C4C4C4;
    }

    .kanjifont {
        font-family: BIZ UDGothic;
        size: 22;
    }
</style>