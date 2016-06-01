<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Streams</a></li>
    </ul>
    <?php if(count($streams) > 0): ?>
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon todo"></i><span class="break"></span><?php echo e($title); ?></h2>
                </div>
                <div class="box-content">
                    <form action=""method="post">
                        <input type="submit" name="mass_start" value="Mass start" class="btn btn-small btn-danger">
                        <input type="submit" name="mass_stop" value="Mass stop" class="btn btn-small btn-danger">
                        <input type="submit" name="mass_delete" value="Mass delete" class="btn btn-small btn-danger">
                    </br> </br>
                    <?php if($message): ?>
                        <div class="alert alert-<?php echo e($message['type']); ?>">
                            <?php echo e($message['message']); ?>

                        </div>
                    <?php endif; ?>

                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <td class="center"><input type="checkbox" id="checkall" value=""></td>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Video</th>
                            <th>Audio</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($streams as $key => $stream): ?>

                            <tr>
                                <td class="center"> <?php echo e($key+1); ?></td>
                                <td class="center"><input type="checkbox" class="check" name="mselect[]" value="<?php echo e($stream->id); ?>"></td>
                                <td>
                                    <?php echo e($stream->name); ?>


                                    <?php if($stream->checker == 2): ?>
                                     <span class="label label-info">streamurl2</span>
                                    <?php endif; ?>
                                    <?php if($stream->checker == 3): ?>
                                    <span class="label label-info">streamurl3</span>
                                    <?php endif; ?>
                                </td>
                                <td class="center"><span class="label label-<?php echo e($stream->status_label['label']); ?>"><?php echo e($stream->status_label['text']); ?></span></td>
                                <td class="center"><?php echo e($stream->category ? $stream->category->name : ''); ?> </td>
                                <td><?php echo e($stream->video_codec_name); ?></td>
                                <td><?php echo e($stream->audio_codec_name); ?></td>
                                <td class="center">
                                    <?php if($stream->status == 1): ?>
                                        <a class="btn btn-important" title="STOP STREAM" href="streams.php?stop=<?php echo e($stream->id); ?>"><i class="halflings-icon white stop"></i></a>
                                    <?php elseif($stream->status != 1): ?>
                                        <a class="btn btn-success" title="START STREAM" href="streams.php?start=<?php echo e($stream->id); ?>"><i class="halflings-icon white play"></i></a>
                                    <?php endif; ?>

                                    <a class="btn btn-info" href="manage_stream.php?id=<?php echo e($stream->id); ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-success" title="SHOW STREAM" onclick="window.open('play.php?id=<?php echo e($stream->id); ?>', 'play','status,width=400,height=328'); return false" href="#">
                                        <i class="halflings-icon white zoom-in"></i>
                                    </a>

                                    <a class="btn btn-danger" href="streams.php?delete=<?php echo e($stream->id); ?>" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            No streams found
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('#checkall').on('click', function() {
            $('.check').attr('checked', $(this).is(":checked"));
            $.uniform.update('.check');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>