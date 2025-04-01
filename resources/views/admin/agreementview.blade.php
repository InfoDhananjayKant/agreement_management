@extends('layout.dashboard')
@section('title','Create Agreement')

@section('header', 'Create Agreement')


@section('content')

    <form action="{{route('admin.agreementform')}}">
        <select name="form_choice" id="">
            <option value="1">Rent Agreement</option>
            <option value="2">Commercial Agreement</option>
            <option value="3">Registry Deed</option>
            <option value="4">Builders Registry</option>
            <option value="5">ATS</option>
        </select>

        <button type="submit" style="background-color:#007bff;">Create New Agreement</button>
    </form>

@endsection

<style>
    select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: #fff;
    color: #333;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

/* When the dropdown is focused */
select:focus {
    border-color: rgb(82, 114, 148);
    outline: none;
    box-shadow: 0 0 5px rgba(82, 114, 148, 0.5);
}

/* Style for options inside select */
select option {
    padding: 10px;
    background-color: #fff;
    color: #333;
}

/* Hover effect for options (only visible in some browsers) */
select option:hover {
    background-color: rgb(82, 114, 148);
    color: white;
}

</style>