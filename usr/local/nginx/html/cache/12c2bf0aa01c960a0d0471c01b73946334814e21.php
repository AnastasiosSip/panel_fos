<?php $__env->startSection('content'); ?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage admin</a></li>
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
                                <label class="control-label">Name*:</label>
                                <div class="controls">
                                    <input type="text" name="name" value="<?php echo e(isset($_POST['name']) ?  $_POST['name'] : $stream->name); ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Streamurl*:</label>
                                <div class="controls">
                                    <input type="text" name="streamurl" value="<?php echo e(isset($_POST['streamurl']) ?  $_POST['streamurl'] : $stream->streamurl); ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Streamurl2 (backup):</label>
                                <div class="controls">
                                    <input type="text" name="streamurl2" value="<?php echo e(isset($_POST['streamurl2']) ?  $_POST['streamurl2'] : $stream->streamurl2); ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Streamurl3 (backup):</label>
                                <div class="controls">
                                    <input type="text" name="streamurl3" value="<?php echo e(isset($_POST['streamurl3']) ?  $_POST['streamurl3'] : $stream->streamurl3); ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">proxy:</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <div class="checker" id="uniform-optionsCheckbox2"><span><input type="checkbox" name="restream" id="" value="1" <?php echo e($stream->restream ? "checked" : ""); ?>></span></div>
                                    </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Bit stream filter:</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <div class="checker" id="uniform-optionsCheckbox2"><span><input type="checkbox" name="bitstreamfilter" id="" value="1" <?php echo e($stream->bitstreamfilter ? "checked" : ""); ?>></span></div>
                                    </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Category*</label>
                                <div class="controls">
                                    <select name="category" id="selectError3" data-rel="chosen">
                                        <option value='<?php echo e($stream->category ? $stream->category->id : ""); ?>'><?php echo e($stream->category ? $stream->category->name : "Select"); ?></option>
                                        <?php foreach($categories as $category): ?>
                                            <option value='<?php echo e($category->id); ?>'><?php echo e($category->name); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Transcode profile</label>
                                <div class="controls">
                                    <select name="transcode" id="transcode" data-rel="chosen">
                                        <option value='0'>No transcode*</option>
                                        <?php foreach($transcodes as $trans): ?>
                                            <option value='<?php echo e($trans->id); ?>' <?php echo e($stream->trans_id  == $trans->id ? "selected" : ""); ?>><?php echo e($trans->name); ?></option>
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


        </div>
    </div><!--/span-->

</div><!--/row-->

<?php else: ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error!</strong> You need to create an category!
    </div>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>