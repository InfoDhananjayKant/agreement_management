@extends("layout.dashboard")
@section("title",'Dashboard')
@section("header","Dashboard")

<?php 
    use App\Models\Agreement;
    use App\Models\User;
    $agreement = Agreement::all()->where('created_by',$data->id)->count();
    $userCount = User::all()->where('role','2')->count();
?>
@section("content")
    <div class="dashboard-container">
        <div class="stats-card">
            <p class="stats-title">No. of Agreements</p>
            <span class="stats-value">{{$agreement}}</span>
        </div>

        @if($data->role == '1') 
            <div class="stats-card">
                <p class="stats-title">No. of Users</p>
                <span class="stats-value">{{$userCount}}</span>
            </div>
        @endif
    </div>
@endsection

