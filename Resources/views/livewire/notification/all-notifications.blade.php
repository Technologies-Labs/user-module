<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-8">
                            <div class="main-wraper">
                                <h3 class="main-title">All Notifications</h3>
                                <div class="editing-interest">
                                    <div class="notification-box">
                                        <ul>
                                            @foreach ($notifications['notifications'] as $notification)
                                            <li>
                                                <figure><img src="{{ asset('images/resources/friend-avatar.jpg') }}" alt=""></figure>
                                                <div class="notifi-meta">
                                                    <p>{{$notification->message}}</p>
                                                    <span><i class="fa fa-thumbs-up"></i> {{$notification->created_at->diffForHumans()}}</span>
                                                </div>
                                                <i class="del icofont-close-circled" wire:click="readNotification({{$notification->id}})" title="Remove"></i>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{ $notifications['notifications']->links() }}
                                    {{-- <div class="sp sp-bars"></div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <aside class="sidebar static right">
                                <div class="widget">
                                    <h4 class="widget-title">Ask Research Question?</h4>
                                    <div class="ask-question">
                                        <i class="icofont-question-circle"></i>
                                        <h6>Ask questions in Q&A to get help from experts in your field.</h6>
                                        <a class="ask-qst" href="#" title="">Ask a question</a>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Explor Events <a class="see-all" href="#" title="">See All</a></h4>
                                    <div class="rec-events bg-purple">
                                        <i class="icofont-gift"></i>
                                        <h6><a title="" href="#">BZ University good night event in columbia</a></h6>
                                        <img alt="" src="images/clock.png">
                                    </div>
                                    <div class="rec-events bg-blue">
                                        <i class="icofont-microphone"></i>
                                        <h6><a title="" href="#">The 3rd International Conference 2020</a></h6>
                                        <img alt="" src="images/clock.png">
                                    </div>
                                </div>
                                <div class="widget stick-widget">
                                    <h4 class="widget-title">Who's follownig</h4>
                                    <ul class="followers" >
                                        <li>
                                            <figure><img alt="" src="images/resources/friend-avatar.jpg"></figure>
                                            <div class="friend-meta">
                                                <h4>
                                                    <a title="" href="time-line.html">Kelly Bill</a>
                                                    <span>Dept colleague</span>
                                                </h4>
                                                <a class="underline" title="" href="#">Follow</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img alt="" src="images/resources/friend-avatar2.jpg"></figure>
                                            <div class="friend-meta">
                                                <h4>
                                                    <a title="" href="time-line.html">Issabel</a>
                                                    <span>Dept colleague</span>
                                                </h4>
                                                <a class="underline" title="" href="#">Follow</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img alt="" src="images/resources/friend-avatar3.jpg"></figure>
                                            <div class="friend-meta">
                                                <h4>
                                                    <a title="" href="time-line.html">Andrew</a>
                                                    <span>Dept colleague</span>
                                                </h4>
                                                <a class="underline" title="" href="#">Follow</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img alt="" src="images/resources/friend-avatar4.jpg"></figure>
                                            <div class="friend-meta">
                                                <h4>
                                                    <a title="" href="time-line.html">Sophia</a>
                                                    <span>Dept colleague</span>
                                                </h4>
                                                <a class="underline" title="" href="#">Follow</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img alt="" src="images/resources/friend-avatar5.jpg"></figure>
                                            <div class="friend-meta">
                                                <h4>
                                                    <a title="" href="time-line.html">Allen</a>
                                                    <span>Dept colleague</span>
                                                </h4>
                                                <a class="underline" title="" href="#">Follow</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
