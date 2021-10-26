@extends('layouts.app')
@section('title','Food Shop VKU | Account')

@section('content')
<x-breadcrumb currentPage="Account"></x-breadcrumb>
<!-- my account wrapper start -->
<div class="my-account-wrapper pt-50 pb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- My Account Page Start -->
        <div class="myaccount-page-wrapper">
          <!-- My Account Tab Menu Start -->
          <div class="row">
            <div class="col-lg-3 col-md-4">
              <div class="myaccount-tab-menu nav" role="tablist">
                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                  Dashboard</a>
                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                  Method</a>
                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                <a href="login-register.html"><i class="fa fa-sign-out"></i> Logout</a>
              </div>
            </div>
            <!-- My Account Tab Menu End -->
            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-md-8">
              <div class="tab-content" id="myaccountContent">
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Dashboard</h3>
                    <div class="welcome">
                      <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a
                          href="login-register.html" class="logout"> Logout</a>)</p>
                    </div>

                    <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage
                      your shipping and billing addresses and edit your password and account details.</p>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="orders" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Orders</h3>
                    <div class="myaccount-table table-responsive text-center">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Aug 22, 2018</td>
                            <td>Pending</td>
                            <td>$3000</td>
                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>July 22, 2018</td>
                            <td>Approved</td>
                            <td>$200</td>
                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>June 12, 2017</td>
                            <td>On Hold</td>
                            <td>$990</td>
                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="download" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Downloads</h3>
                    <div class="myaccount-table table-responsive text-center">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Expire</th>
                            <th>Download</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Haven - Free Real Estate PSD Template</td>
                            <td>Aug 22, 2018</td>
                            <td>Yes</td>
                            <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download
                                File</a></td>
                          </tr>
                          <tr>
                            <td>HasTech - Profolio Business Template</td>
                            <td>Sep 12, 2018</td>
                            <td>Never</td>
                            <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download
                                File</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Payment Method</h3>
                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Billing Address</h3>
                    <address>
                      <p><strong>Alex Tuntuni</strong></p>
                      <p>1355 Market St, Suite 900 <br>
                        San Francisco, CA 94103</p>
                      <p>Mobile: (123) 456-7890</p>
                    </address>
                    <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit Address</a>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="account-info" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Account Details</h3>
                    <div class="account-details-form">
                      <form action="#">
                        @csrf
                        <div class="profile-header">
                          <div class="row align-items-center">
                            <div class="col-auto profile-image">
                              <a href="#">
                                <img class="rounded-circle" style="width:5rem" alt="User Image"
                                  src="{{ (Auth::user() && Auth::user()->avatar)? Auth::user()->avatar : asset('../images/users/usersavatardefault_92824.png') }}">
                              </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                              <h4 class="user-name mb-0">{{ Auth::user()->fullname }}</h4>
                              <h6 class="text-muted">{{ Auth::user()->email }}</h6>
                              <div class="user-Location"><i class="fa fa-map-marker"></i>{{ Auth::user()->address }}
                              </div>
                            </div>
                            <div class="col-auto profile-btn">
                              <input type="file" id="upload" hidden />
                              <label class="btn-primary p-2" for="upload">Edit avatar</label>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-15">
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="username" class="required">Username</label>
                              <input type="text" id="username" />
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="fullname" class="required">Fullname</label>
                              <input type="text" id="fullname" />
                            </div>
                          </div>
                        </div>
                        <div class="single-input-item">
                          <label for="email" class="required">Email Address</label>
                          <input type="email" id="email" />
                        </div>
                        <fieldset>
                          <legend>Password change</legend>
                          <div class="single-input-item">
                            <label for="current-pwd" class="required">Current Password</label>
                            <input type="password" id="current-pwd" />
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="new-pwd" class="required">New Password</label>
                                <input type="password" id="new-pwd" />
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                <input type="password" id="confirm-pwd" />
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <div class="single-input-item">
                          <button class="check-btn sqr-btn ">Save Changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> <!-- Single Tab Content End -->
              </div>
            </div> <!-- My Account Tab Content End -->
          </div>
        </div> <!-- My Account Page End -->
      </div>
    </div>
  </div>
</div>
<!-- my account wrapper end -->
@endsection