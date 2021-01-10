  @if($errors->any())
    <div class="box">
      <div class="notification is-danger">
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          
      </div>
    </div>
  @endif
