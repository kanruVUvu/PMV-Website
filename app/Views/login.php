<div class="login-container">
  <img src="<?= base_url() ?>/pmv_logo_wide.png" alt="" class="main-logo--wide">
  <form action="<?= base_url() ?>/login/validateLogin" class="login-form" method="POST">
    <div class="form-field">
      <label for="user-id">User ID</label>
      <input type="text" name="id" id="user-id">
    </div>
    <div class="form-field">
      <label for="user-pass">Password</label>
      <input type="password" name="pass" id="user-pass">
    </div>
    <input type="submit" value="Login" class="btn submit-btn">
  </form>
</div>