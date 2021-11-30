<div class="col-lg-12">
    <div class="main-wraper" >
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="user-post trader">
                    <div class="friend-info">
                        <div class="title area" >
                            <h1 class="uk-heading-line uk-text-center pb-3"><span>Brands</span></h1>
                        </div>
                        <ul class="trader-caro">
                            @foreach($companies['companies'] as $company)
                                <li>
                                    <figure><img src="images/resources/speak-1.jpg" alt=""></figure>
                                    <ins><a href="{{ route('user.company', ['user' => $company->user->name]) }}">{{$company->company_name}}</a></ins>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
