<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        .admin-container {
            display: flex;
            width: 100%;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            cursor: pointer;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
        .sidebar ul li:hover {
            background-color: #495057;
        }
        .submenu {
            display: none;
            padding-left: 20px;
        }
        .submenu li {
            padding: 8px 0;
            cursor: pointer;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
        header {
            background-color:rgb(82, 114, 148);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
        }
        .main-content {
            margin-top: 20px;
        }


        /* this is table css */

        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #f8f9fa;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: rgb(82, 114, 148); /* Same as the dashboard header */
    color: white;
    text-transform: uppercase;
}

tr:nth-child(even) {
    background-color: #e9ecef; /* Light gray for alternating rows */
}

tr:hover {
    background-color: #d6d8db; /* Slightly darker gray on hover */
}

button {
    padding: 8px 14px;
    margin: 3px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

button:first-child {
    background-color: #007bff; /* Blue for Edit */
    color: white;
}

button:last-child {
    background-color: #dc3545; /* Red for Block */
    color: white;
}

button:hover {
    opacity: 0.8;
}

@media (max-width: 768px) {
    table {
        font-size: 14px;
    }
    button {
        padding: 6px 10px;
        font-size: 12px;
    }
}


/* this is css for admin.dashboard */

.dashboard-container {
    display: flex;
    gap: 20px;
    padding: 20px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.stats-card {
    background: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    min-width: 200px;
    transition: transform 0.3s ease-in-out;
}

.stats-card:hover {
    transform: scale(1.05);
}

.stats-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.stats-value {
    font-size: 22px;
    font-weight: bold;
    color: #007bff;
}


</style>
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>List</h2>
            <ul>
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                @if(Auth::user()->hasRole('super admin'))
                    <li><a href="{{route('admin.user')}}"><i class="fa fa-users"></i> Users</a></li>
                @endif
                <li class="has-submenu">
                    <a href="#"><i class="fa fa-file-alt"></i> Agreement</a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.agreementview')}}">Create Agreement</a></li>
                        <li><a href="{{route('admin.agreementlist')}}">Agreement List</a></li>
                    </ul>            
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="fa fa-file-alt"></i> Change Layouts </a>
                    <ul class="submenu">
                        <li><a href="">Rent Agreement</a></li>
                        <li><a href="">Commercial Agreement</a></li>
                        <li><a href="">Registry Deed</a></li>
                        <li><a href="">Builders Registry</a></li>
                        <li><a href="">ATS</a></li>
                    </ul>            
                </li>
                <li><a href="#settings"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="#logout"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>
        <main class="content">
            <header>
                <h1>@yield('header','Dashboard')</h1>
            </header>
            <section class="main-content">
                @yield('content')
            </section>
        </main>
    </div>
    <script>
        document.querySelectorAll('.has-submenu > a').forEach(menu => {
            menu.addEventListener('click', function(event) {
                event.preventDefault();
                let submenu = this.nextElementSibling;
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>
