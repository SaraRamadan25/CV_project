<h3> Your Summary !</h3>

Name {{$user->name}} <br>
Email {{$user->email}} <br>
Created at {{$user->created_at}} <br>
Date of Birth {{$user->date_of_birth->format('m-d-Y')}} <br>
Speeches
Speeches
@if(count($user->speeches) > 1)
    @foreach($user->speeches as $speech)
        {{ $speech }} <br>
    @endforeach
@else
    {{ $user->speeches[0] }} <br>
@endif
<br>

@if(count($user->expert_in) > 1)
    @foreach($user->expert_in as $experience)
        {{ $experience }} <br>
    @endforeach
@else
    {{ $user->$experience[0] }} <br>
@endif
<br>

{{ $user->freelance ? "available" : "not available"}}

<br>
{{ $user->description }}
