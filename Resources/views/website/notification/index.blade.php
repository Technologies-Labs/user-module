@extends('layouts.simple.master')

@section('content')
<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-8">
                            @livewire('notificationmodule::user-notifications', ['user' => Auth::user() , 'page' => 'all-notifications'])
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
                                
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection




