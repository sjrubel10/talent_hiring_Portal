<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 8/29/2022
 * Time: 4:02 PM
 */
?>
<!-- Add New User Model -->
<div id="overlay">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="model-body p-4">
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="name" >
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control form-control-lg" placeholder="phone number">
                    </div>

                    <div class="form-group">
                        <input type="file" name="uploadcv" >
                    </div>

                    <div class="form-group">
                        <button class="btn btn-info btn-block btn-lg">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="row mt-3">
    <div class="col-lg-6">
        <h3 class="text-info">Registered User</h3>
    </div>
    <div class="col-lg-6">
        <button class="btn btn-info float-right" @click="showAddModel=true">
            <i class="fas fa-user"></i>&nbsp;&bscr; Add new user
        </button>
    </div>
</div>
<hr class="bg-info">
<div class="alert alert-danger isdisplay" >
    {{ errorMsg }}
</div>
<div class="alert alert-success isdisplay" >
    {{ successMsg }}
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped">
            <!--                <p class="text-center" v-if="isDataLoaded">Loading...</p>-->
            <thead>
            <tr class="text-center bg-info text-light">
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody v-if="isDataLoad">
            <tr class="text-center">

                <td >user.id}}</td>
                <td >
                    <img v-if="" class="imgProfile" :src="user.profileimg"/>
                    <!-- <img class="imgProfile" src="upload/1661253533.jpg" alt="Img"> -->
                </td>
                <td >{{user.name}}</td>
                <td >{{user.email}}</td>
                <td >{{user.phone}}</td>
                <td ><a href="#" class="text-success" @click="showEditModel=true; selectUser(user);"><i class="fas fa-edit"></i></a></td>
                <td ><a href="#" class="text-danger" :id="user.id" @click="showDeleteModel=true; selectUser(user)"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            </tbody>
        </table>
        <div class="form-group" v-if="showLoadMoreBtn">
            <button class="btn bg-primary text-white" @click="getData();">Load More Data</button>
        </div>
    </div>
</div>
