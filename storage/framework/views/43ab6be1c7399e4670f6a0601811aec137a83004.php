<?php $__env->startSection('title', __('Mining Dashboard')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid" style="margin-left: 0px;">
    <div class="row">

        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header" style="font-size: 15px">Payouts Ethermine</div>
                <div class="card-body" style="height: 450px; overflow-y: scroll;">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status'), false); ?>

                    </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $workers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $worker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="border: 1px solid lightgrey; border-radius: 0.19rem; margin-bottom: 5px ">
                        <div style="margin: 10px">
                            <p>Payout ETH: <?php echo e(substr(payout_eth($worker["amount"]), 0,8), false); ?></p>
                            <p>Payout EUR:
                                €<?php echo e(substr(number_format(str_replace(".", "",$worker['amount']*$price_eur*100), 2), 0,6), false); ?>

                            </p>
                            <p><?php echo e(date("Y, F j - H:i:s", $worker['paidOn']), false); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-3">
            <div class="card" style="height: 300px; overflow:hidden; ">
                <div class="card-header" style="font-size: 15px">Worker Info Ethermine</div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl"><?php echo e(substr($infos['reportedHashrate'], 0,3), false); ?> <small>MH/s</small></div>
                        <div class="text-uppercase text-muted small">Local</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl"><?php echo e(substr($infos['currentHashrate'], 0,3), false); ?> <small>MH/s</small></div>
                        <div class="text-uppercase text-muted small">Pool</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl"><?php echo e(substr($infos['averageHashrate'], 0,3), false); ?> <small>MH/s</small></div>
                        <div class="text-uppercase text-muted small">Average</div>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl"><?php echo e($infos['validShares'], false); ?></div>
                        <div class="text-uppercase text-muted small">Valid Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl"><?php echo e($infos['invalidShares'], false); ?></div>
                        <div class="text-uppercase text-muted small">Rejected Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl"><?php echo e($infos['staleShares'], false); ?></div>
                        <div class="text-uppercase text-muted small">Stale Shares</div>
                    </div>
                </div>
            </div>

            <div class="card" style="height: 300px; overflow:hidden; max-height:174px">
                <div class="card-header" style="font-size: 15px">Earnings Ethermine
                </div>
                <div class="card-body row text-center" style="    margin-top: -5px;">
                    <div class="col">
                        <div class="text-value-xl">€<?php echo e(str_replace(".", "",substr($infos['unpaid']*$price_eur*100, 0,4)), false); ?></div>
                        <div class="text-uppercase text-muted small">Unpaid</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">0,<?php echo e(substr($infos['unpaid'], 0,3), false); ?></div>
                        <div class="text-uppercase text-muted small">Unpaid Eth</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">€<?php echo e(str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur, 0,5)), false); ?></div>
                        <div class="text-uppercase text-muted small">Average daily</div>
                    </div>
                </div>
                <div class="card-footer">Since last payout:
                    <?php $__currentLoopData = $workers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $worker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key == 0): ?>
                    <b><?php echo e(time_diff($worker["paidOn"]), false); ?></b>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>



        <div class="col-12 col-xl-3">

            <div class="card" style="height: 300px; overflow:hidden; max-height:174px">
                <div class="card-header" style="font-size: 15px">Average Earnings Minerstat</div>
                <div class="card-body row text-center" style="    margin-top: -5px;">
                    <div class="col">
                        
                        <div class="text-value-xl" style="font-size:21px">€<?php echo e(str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur, 0,5)), false); ?></div>
                        <div class="text-uppercase text-muted small">Daily</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        
                        <div class="text-value-xl" style="font-size:21px">€<?php echo e(str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur*7, 0,6)), false); ?></div>
                        <div class="text-uppercase text-muted small">Weekly</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        
                        <div class="text-value-xl" style="font-size:21px">€<?php echo e(str_replace(".", ",",substr($infos['coinsPerMin']*1440*$price_eur*31, 0,4)), false); ?></div>
                        <div class="text-uppercase text-muted small">Monthly</div>
                    </div>
                </div>
                <div class="card-footer">Current Ether price:
                    <b>€<?php echo e(floor($msinfos['cprice']/$price_usd *100)/100, false); ?> / $<?php echo e(floor($msinfos['cprice'] *100)/100, false); ?></b>
                </div>
            </div>

            <div class="card" style="height: 300px; overflow:hidden; ">
                <div class="card-header" style="font-size: 15px">Worker Info Minerstat</div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl" style="font-size: 22px"><?php echo e(strtoupper($msinfos['status']), false); ?></div>
                        <div class="text-uppercase text-muted small">Uptime</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl"><?php echo e($msinfos['consumption'], false); ?>W</div>
                        <div class="text-uppercase text-muted small">Consumption</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl"><?php echo e($msinfos['devices'], false); ?> </div>
                        <div class="text-uppercase text-muted small">Rigs</div>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl"><?php $__currentLoopData = $msinfos['shares']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($loop->first): ?><?php echo e($share, false); ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
                        <div class="text-uppercase text-muted small">Valid Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">0</div>
                        <div class="text-uppercase text-muted small">Rejected Shares</div>
                    </div>
                    <div class="c-vr"></div>
                    <div class="col">
                        <div class="text-value-xl">TREX</div>
                        <div class="text-uppercase text-muted small">Software</div>
                    </div>
                </div>
                <div class="card-footer">Pool:
                    <b><?php echo e($msinfos['pool'], false); ?></b>
                </div>
            </div>
        </div>


        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header" style="font-size: 15px">Minerstat Data</div>
                <div class="card-body" style="height: 450px; overflow-y: scroll;">
                    <div style="border: 1px solid lightgrey; border-radius: 0.19rem; margin-bottom: 5px ">
                        <div style="margin: 15px">
                                <div id="app">
                                    {{ message }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    <?php $__currentLoopData = $minerstat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-<?php
                    if ($ms['temp'] < 40) {
                        echo 'success';
                    }
                    elseif($ms['temp'] < 55){
                        echo 'warning';
                    }
                    else {
                        echo 'danger';
                    }

                ?>">
                <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="text-value-lg" >#<?php echo e(($key+1)."&nbsp;".$ms['name'], false); ?></div>
                        <div>Temperature: <b><?php echo e($ms['temp'], false); ?>°C </b></div>
                        <div>Fan Speed: <b><?php echo e($ms['fan'], false); ?>% </b></div>
                        <div>Power Usage: <b><?php echo e($ms['power'], false); ?>W</b></div>
                        <div>Hashrate: <b><?php echo e(substr($ms['speed'],0,5), false); ?></b></div>
                        <div>Accepted Shares: <b><?php echo e($ms['accepted'], false); ?></b></div>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <svg class="c-icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70"
                        style="display: block; width: 258px; height: 70px;" width="258"></canvas>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/home1.blade.php ENDPATH**/ ?>