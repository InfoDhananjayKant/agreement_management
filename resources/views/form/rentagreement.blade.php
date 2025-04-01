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


<form id="userEditForm" action="{{route('admin.saveagreement')}}" method="post">
    @csrf
    
    <label for="name">Name of a Tenant</label>
    <input type="text" id="name" name="name" required >

    <label for="flatno">Flat No.</label>
    <input type="text" id="email" name="flatno" required>
    
    <label for="locality">Locality</label>
    <input type="text" id="email" name="locality" required>
    
    <label for="city">City</label>
    <input type="text" id="email" name="city" required>
    
    <label for="district">District</label>
    <input type="text" id="email" name="district" required>
    
    <label for="state">State</label>
    <input type="text" id="email" name="state" required>

    <input type="submit" class="submit-btn" value="Update User">
</form>

