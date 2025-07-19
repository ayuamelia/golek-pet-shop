@if(session('failed'))
<div style="background-color: #ffcccc; color:#b30000 ;" class="alert alert-danger">{{ session('failed') }}</div>
@endif
@if(session('success'))
<div style="background-color: forestgreen; color:white ;" class="alert alert-success">{{ session('success') }}</div>
@endif