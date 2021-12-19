@extends('layouts.simple.master')

@section('content')
<section>
    <div class="gap no-gap bluesh high-opacity">
        <div style="background-image: url(images/resources/top-bg.jpg)" class="bg-image"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-subject">
                        <h1>Account Settings</h1>
                        <p> Choose your accounts options and privacy. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <nav class="responsive-tab">
                        <ul class="nav nav-tabs uk-list">
                            <li class="nav-item"><a class="active" href="#account" wire:ignore data-toggle="tab">Account</a>
                            </li>
                            <li class="nav-item"><a class="" href="#password" data-toggle="tab" wire:ignore>Password</a></li>
                            <li class="nav-item"><a class="" href="#close" data-toggle="tab">Close Account</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-9">
                    <div class="main-wraper">
                        <div class="tab-content" id="components-nav">
                            <!-- settings -->
                            <livewire:usermodule::user.user-information/>
                            <!-- Password  -->
                            <livewire:usermodule::user.user-password/>
                            <!-- Close Account  -->
                            <div class="tab-pane fade" id="close" wire:ignore.self>
                                <div class="del-account">
                                    <h2>Close Account</h2>
                                    <p class="mb-4"><b>Warning:</b> If you close your account, you will be
                                        unsubscribed from all your followers and friends, and will lose access
                                        forever.</p>
                                    <form method="post">
                                        <div class="row">
                                            <div class="mb-4 col-lg-6">
                                                <input class="uk-input" type="text"
                                                    placeholder="Enter Your Password">
                                            </div>
                                            <div class="mb-0 col-lg-6">
                                                <a href="#" class="button danger icon-label circle"><i
                                                        class="icofont-trash"></i> Delete Account</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


