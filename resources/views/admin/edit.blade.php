<style>
    form#userEditForm {
    max-width: 500px;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 15px;
}

form#userEditForm label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

form#userEditForm input,
form#userEditForm select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

form#userEditForm .submit-btn {
    background: #527294;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s ease;
}

form#userEditForm .submit-btn:hover {
    background: #405a74;
}
</style>


<form id="userEditForm" action="{{route('admin.user.update',$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="id" value="{{$data->id}}" hidden>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ $data->name }}" required disabled>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ $data->email }}" required>

    <label for="role">Role</label>
    <select name="role" id="role">
        <option value="1" {{ $data->role == 1 ? 'selected' : '' }}>Admin</option>
        <option value="2" {{ $data->role == 2 ? 'selected' : '' }}>Sub Admin</option>
    </select>

    <input type="submit" class="submit-btn" value="Update User">
</form>
