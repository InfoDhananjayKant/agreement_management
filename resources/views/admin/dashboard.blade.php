@extends("layout.dashboard")
@section("title",'Dashboard')
@section("header","Dashboard")

<?php 
    use App\Models\Agreement;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    $id = Auth::user()->id;
    $agreement = Agreement::all()->where('created_by',$id)->count();
    $userCount = User::all()->where('role','2')->count();
    $user = User::find($id);
?>
@section("content")
    <div class="dashboard-container">
        <div class="stats-card">
            <p class="stats-title">No. of Agreements</p>
            <span class="stats-value">{{$agreement}}</span>
        </div>

        @if($user->hasRole('super admin')) 
            <div class="stats-card">
                <p class="stats-title">No. of Users</p>
                <span class="stats-value">{{$userCount}}</span>
            </div>
        @endif
    </div>
@endsection

