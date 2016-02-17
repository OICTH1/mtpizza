<?php  echo Form::Open('/deliverysupport/client/auth')?>
<div class="form_staffNo">
    <h3>社員番号</h3>
    <input type="text" name="input_staffNo" value="" maxlength="3">
    <p>社員番号が間違っています</p>
</div>
<input type="submit" name="name" value="ログイン">
<?php echo Form::close() ?>
