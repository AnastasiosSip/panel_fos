<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Manage user</a></li>
    </ul>

    <?php if(count($categories) > 0): ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon todo"></i><span class="break"></span><?php echo e($title); ?></h2>
            </div>
            <div class="box-content">
                <?php if($message): ?>
                    <div class="alert alert-<?php echo e($message['type']); ?>">
                        <?php echo e($message['message']); ?>

                    </div>
                <?php endif; ?>
                <div class="box-content">
                <form class="form-horizontal" role="form" action="" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Username:</label>
                            <div class="controls">
                                <input type="text" name="username" value="<?php echo e(isset($_POST['username']) ?  $_POST['username'] : $user->username); ?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Password:</label>
                            <div class="controls">
                                <input type="text" name="password" value="<?php echo e(isset($_POST['password']) ?  $_POST['password'] : $user->password); ?>">
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="date01">Exp date</label>
                            <div class="controls">
                                <input type="text" name="expdate" class="input-xlarge datepicker" id="date01" placeholder="0000-00-00" value="<?php echo e(isset($_POST['expdate']) ?  $_POST['expdate'] : $user->exp_date); ?>">
                                <span class="help-inline">Unlimited? 0000-00-00 or Leave blank</span>
                            </div>
                        </div>

                        <?php /*<div class="control-group">*/ ?>
                            <?php /*<label class="control-label" for="date01">Expire Date</label>*/ ?>
                            <?php /*<div class="controls">*/ ?>
                                <?php /*<input type="text" class="input-xlarge datepicker" id="date01" name="date" value="02/16/12">*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>

                        <?php /*<div class="control-group">*/ ?>
                            <?php /*<label class="control-label">Never:</label>*/ ?>
                            <?php /*<div class="controls">*/ ?>
                                <?php /*<label class="checkbox">*/ ?>
                                    <?php /*<div class="checker" id="uniform-optionsCheckbox2"><span><input type="checkbox" name="never" id="optionsCheckbox2" value="1"></span></div>*/ ?>

                                <?php /*</label>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>

                        <div class="control-group">
                            <label class="control-label">Active:</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <div class="checker" id="uniform-optionsCheckbox2"><span><input type="checkbox" name="active" id="" value="1" <?php echo e($user->active ? "checked" : ""); ?>></span></div>
                                </label>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError1">Categories:</label>
                            <div class="controls">
                                <select name="category[]" multiple data-rel="chosen">
                                    <?php foreach($categories as $category): ?>
                                        <option <?php echo e(in_array($category->id, $user->categories->lists('id')->toArray()) ? 'selected' : ''); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

    <!--/row-->

    <!--/span-->

    </div><!--/row-->
    <?php else: ?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error!</strong> You need to create an category!
        </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>