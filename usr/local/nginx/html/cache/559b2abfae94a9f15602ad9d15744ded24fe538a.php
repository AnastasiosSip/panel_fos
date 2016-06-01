<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Users</a></li>
</ul>

<?php if(count($users) > 0): ?>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon todo"></i><span class="break"></span>Users</h2>
            </div>
            <div class="box-content">
                <?php if($message): ?>
                <div class="alert alert-<?php echo e($message['type']); ?>">
                   <?php echo e($message['message']); ?>

                </div>
                <?php endif; ?>
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Exp date</th>
                        <th>Category</th>
                        <th>File</th>
                        <th>Last viewed channel</th>
                        <th>IP</th>
                        <th>User agent</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $key => $user): ?>
                        <tr>
                            <td class="center"><?php echo e($key+1); ?></td>
                            <td><?php echo e($user->username); ?></td>
                            <td class="center"><?php echo e($user->password); ?></td>
                            <td class="center">
                                <?php if($user->active): ?>
                                    <span class="label label-success">Active</span>
                                    <?php else: ?>
                                    <span class="label label-important">Not Active</span>
                                <?php endif; ?>
                            </td>
                            <td class="center">
                                <?php if($user->exp_date != '0000-00-00'): ?>
                                    <?php if($user->exp_date <=  Carbon\Carbon::today()): ?>
                                        <span class="label label-important"><?php echo e($user->exp_date); ?></span>
                                    <?php else: ?>
                                        <span class="label label-success"><?php echo e($user->exp_date); ?></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="label label-success">Unlimited</span>

                                <?php endif; ?>
                            </td>
                            <td class="center"><?php echo e($user->category_names); ?></td>
                            <td class="center">
                                <a href="getfile.php?m3u=true&id=<?php echo e($user->id); ?>" title="GET M3U"><span class="label label-success">M3U</span></a>
                                <a href="getfile.php?e2=true&id=<?php echo e($user->id); ?>" title="GET E2"><span class="label label-success">E2</span></a>
                                <a href="getfile.php?tv=true&id=<?php echo e($user->id); ?>" title="GET TV"><span class="label label-success">TV</span></a>

                                <a href="clientsgen.php?tv=true&id=<?php echo e($user->id); ?>" title="Clients"><span class="label label-success">Clients</span></a>
                            </td>
                            <td class="center">
                                <?php if($user->laststream): ?>

                                    <?php echo e($user->laststream->name); ?>


                                <?php else: ?>
                                    Never connected
                                <?php endif; ?>
                            </td>
                            <td class="center">
                                <?php if($user->lastconnected_ip): ?>
                                    <?php echo e($user->lastconnected_ip); ?>

                                <?php else: ?>
                                    Never connected
                                <?php endif; ?>
                            </td>
                            <td class="center">
                                <?php if($user->useragent): ?>
                                    <?php echo e($user->useragent); ?>

                                <?php else: ?>
                                    Never connected
                                <?php endif; ?>

                            </td>
                            <td class="center">

                                <a class="btn btn-info" href="manage_user.php?id=<?php echo e($user->id); ?>" title="Edit">
                                    <i class="halflings-icon white edit"></i>
                                </a>

                                <a class="btn btn-danger" href="users.php?delete=<?php echo e($user->id); ?>" title="Delete" onclick="return confirm('Are you sure?')">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
         No users found
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>