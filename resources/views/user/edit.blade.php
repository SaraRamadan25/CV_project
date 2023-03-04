<form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
   @method('PATCH')
    @csrf
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">name</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name"  value="{{ $user->name }}" placeholder="name" class="form-control"></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">excerpt</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="excerpt"  value="{{ $user->excerpt }}" placeholder="excerpt" class="form-control"></div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">description</label></div>
        <div class="col-12 col-md-9"><input type="text" id="text-input" name="description" value="{{ $user->description }}" placeholder="excerpt" class="form-control"></div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">email</label></div>
        <div class="col-12 col-md-9"><input type="email" id="text-input" name="email"  value="{{ $user->email }}" placeholder="email" class="form-control"></div>
    </div>



    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">password</label></div>
        <div class="col-12 col-md-9"><input type="password" id="text-input" name="password" placeholder="password" class="form-control"></div>
    </div>

    <div class="row form-group">
        <div class="col col-md-3"><label for="text-input" class=" form-control-label">date_of_birth</label></div>
        <div class="col-12 col-md-9"><input type="date" id="text-input" name="date_of_birth" value="{{ $user->date_of_birth }}" placeholder="date_of_birth" class="form-control"></div>
    </div>


    <div class="form-group">
        <label for="speeches">Speeches</label>
        <select multiple class="form-control" name="speeches[]">
            @foreach($speeches as $speech)
                <option>{{ $speech }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label for="expert_in ">Expert_in </label>
        <select multiple class="form-control" name="expert_in[]">
            @foreach($expert_in as $experience)
                <option>{{ $experience }}</option>
            @endforeach

        </select>
    </div>

    <label for="education">Choose your educations</label>
    <select multiple name="education_id[]" >
        @foreach($educations as $education)

            <option value="{{ $education->id }}">{{ $education->name }}</option>
        @endforeach

    </select>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" >
            <i class="fa fa-dot-circle-o"></i> Add
        </button>

    </div>
</form>
