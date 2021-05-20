<?php
defined("BASEPATH") or exit ("No direct scripts allowed");?>

<div class="container-fluid"> 
        <div class = "row">
            <div class="col-6">
                <h1>Welcome <?php echo $user->first_name ?></h1>
                <a href="<?php echo site_url("user/logout"); ?>" class="btn btn-secondary" id="logoutBtn">LOGOUT</a>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="sampleChart1"></canvas>
                    </div>
                </div>
            </div>   
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="sampleChart2"></canvas>
                     </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="sampleChart3"></canvas>
                     </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="sampleChart4"></canvas>
                     </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="sampleChart5"></canvas>
                     </div>
                </div>
            </div>
        </div>  
</div>