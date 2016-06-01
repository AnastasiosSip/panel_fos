<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Categories</a></li>
    </ul>

    <?php if(count($categories) > 0): ?>
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon todo"></i><span class="break"></span>Categories</h2>
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($categories as $key => $category): ?>
                            <tr>
                                <td class="center"><?php echo e($key+1); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td class="center">

                                    <a class="btn btn-info" href="manage_category.php?id=<?php echo e($category->id); ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                                    </a>

                                    <a class="btn btn-danger" href="categories.php?delete=<?php echo e($category->id); ?>" title="Delete" onclick="return confirm('Are you sure?')">
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
            No categories found
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>