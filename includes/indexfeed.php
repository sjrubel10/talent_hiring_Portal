<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 8/31/2022
 * Time: 3:53 PM
 */
?>
<div class="headcontentcontainer">
    <img src="images/banner.jpg" class="bannerimg" alt="banner images">


    <div class="creatingWorkspace">
        <h3 class="text-center">Jobs For You</h3>
        <div class="row" id="jobholder">
            <?php for($i=0;$i<20;$i++){?>
            <div class="col-lg-3 col-md-4 col-sm-12 pt-3">
                <div class="ourjobs text-center">
                    <div class="circle circle-bg-pink"></div>
                    <i class="circle-content-bg text-danger rounded p-2 m-2 fa-1x fa-solid fa-box-tissue"></i>
                    <h6 class="services-h-tag-position font-weight-bold services-p-text-decoration pt-2">Job Title</h6>
                    <p>Job position</p>
                    <p>Company name</p>
                    <p class="btn-text-size-10 services-p-text-decoration">Job description...</p>
                    <p>Count applier 20</p>
                    <p>Dead line 20-10-22</p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>