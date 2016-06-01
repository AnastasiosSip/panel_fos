<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>

    <div class="row-fluid">

        <a href="streams.php?running=1" class="quick-button metro greenLight span4">
            <i class="icon-tasks"></i>
            <p>Streams</p>
            <span class="badge"><?php echo e($online); ?></span>
        </a>
        <a href="streams.php?running=2" class="quick-button metro red span4">
            <i class="icon-tasks"></i>
            <p>Offline streams</p>
            <span class="badge"><?php echo e($offline); ?></span>
        </a>
        <a href="streams.php" class="quick-button metro blue span4">
            <i class="icon-tasks"></i>
            <p>Total streams</p>
            <span class="badge"><?php echo e($all); ?></span>
        </a>

    </div><!--/row-->
    <br>

    <div class="row-fluid hideInIE8 circleStats">

        <div class="span4" onTablet="span4" onDesktop="span4">
            <div class="circleStatsItemBox green">
                <div class="header">Space</div>
                <span class="percent">percent</span>
                <div class="circleStat">
                    <input type="text" value="<?php echo e($space['pr']); ?>" class="whiteCircle" />
                </div>
                <div class="footer">

                <span class="count">
                    <span class="number"><?php echo e($space['count']); ?></span>
                    <span class="unit">FREE</span>
                </span>

                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?php echo e($space['total']); ?></span>
                        <span class="unit1">TOTAL</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="span4 noMargin" onTablet="span4" onDesktop="span4">
            <div class="circleStatsItemBox pink">
                <div class="header">CPU</div>
                <span class="percent">percent</span>
                <div class="circleStat">
                    <input type="text" value="<?php echo e($cpu['pr']); ?>" class="whiteCircle" />
                </div>
                <div class="footer">
                <span class="count">
                    <span class="number"><?php echo e($cpu['count']); ?></span>
                    <span class="unit"> USAGE</span>
                </span>

                    <span class="sep"> / </span>

                <span class="value">
                    <span class="number">100</span>
                    <span class="unit2">TOTAL</span>
                </span>
                </div>
            </div>
        </div>

        <div class="span4" onTablet="span4" onDesktop="span4">
            <div class="circleStatsItemBox greenLight">
                <div class="header">Memory</div>
                <span class="percent">percent</span>
                <div class="circleStat">
                    <input type="text" value="<?php echo e($mem['pr']); ?>" class="whiteCircle" />
                </div>
                <div class="footer">

                <span class="count">
                    <span class="number"><?php echo e($mem['count']); ?></span>
                    <span class="unit">USAGE</span>
                </span>

                    <span class="sep"> / </span>
                    <span class="value">
                        <span class="number"><?php echo e($mem['total']); ?></span>
                        <span class="unit1">TOTAL</span>
                    </span>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>