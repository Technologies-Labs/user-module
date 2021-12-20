@if ($completeRate != 100)
<div class="widget stick-widget">
    <h4 class="widget-title">Complete Your Profile</h4>
    <span>Your Profile is missing followings!</span>
    <div data-progress="tip" class="progress__outer" data-value="{{$completeRate/100}}">
        <div class="progress__inner">{{$completeRate}}%</div>
    </div>
    <ul class="prof-complete">
        @foreach ($information as $item)
        <li><i class="icofont-plus-square"></i> <a href="{{ route('user.setting') }}" target="_blank"
                title="">{{$item['message']}}</a><em>25%</em></li>
        @endforeach
    </ul>
</div>
@endif
