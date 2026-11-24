
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Plant Nursery')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f2;
            color: #333;
        }

        .navbar {
            background: #315c3b;
            padding: 16px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h2 {
            margin: 0;
            font-size: 21px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            width: 86%;
            max-width: 1100px;
            margin: 35px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .page-header h1 {
            color: #315c3b;
            margin: 0;
            font-size: 27px;
        }

        .panel {
            background: white;
            padding: 24px;
            border-radius: 7px;
            border: 1px solid #e1e8df;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background: #47794e;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #315c3b;
        }

        .btn-secondary {
            background: #777;
        }

        .btn-danger {
            background: #b84343;
        }

        .btn-small {
            padding: 7px 10px;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 13px 10px;
            text-align: left;
            border-bottom: 1px solid #e5e5e5;
        }

        th {
            background: #edf3eb;
            color: #315c3b;
        }

        .form-group {
            margin-bottom: 17px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .message {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 4px;
            background: #e1f2e2;
            color: #286333;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 5px;
        }

        .status {
            padding: 5px 9px;
            border-radius: 12px;
            font-size: 12px;
        }

        .in-stock {
            background: #e0f2e3;
            color: #286333;
        }

        .out-stock {
            background: #f9e0e0;
            color: #a12c2c;
        }

        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .detail-row {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .detail-row strong {
            display: inline-block;
            width: 140px;
            color: #315c3b;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 15px;
                flex-wrap: wrap;
                gap: 12px;
            }

            .navbar a {
                margin-left: 0;
                margin-right: 12px;
            }

            .container {
                width: 94%;
            }

            .page-header {
                gap: 12px;
                flex-wrap: wrap;
            }

            .panel {
                overflow-x: auto;
            }

            table {
                min-width: 650px;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>Green Leaf Nursery</h2>

        <div>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('plants.index') }}">Plants</a>
            <a href="{{ route('profile.edit') }}">Profile</a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none;border:none;color:white;cursor:pointer;font-size:14px;">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <main class="container">
        @yield('content')
    </main>

    <div class="footer">
       Plant System.
    </div>

</body>
</html>
