<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | クイズ・ゲーム </title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('Adminasset') }}/css/style.css">    
    <style>
    /* Global Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f5f7fa;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    /* Sidebar Styles */
    #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background-image: radial-gradient(circle farthest-corner at 32.7% 82.7%, rgba(173, 0, 171, 1) 8.3%, rgba(15, 51, 92, 1) 79.4%);
        color: white;
        transform: translateX(0);
        transition: transform 0.3s ease;
        z-index: 1000;
    }

    #sidebar.hidden {
        transform: translateX(-250px);
    }

    #sidebar .sidebar-header {
        text-align: center;
        padding: 20px;
        font-size: 1.8rem;
        font-weight: bold;
        color: #f1faee;
    }

    #sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #sidebar ul li {
        padding: 15px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    #sidebar ul li a {
        color: #f1faee;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    #sidebar ul li a:hover {
        color: #a8dadc;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
        padding-left: 30px;
    }

    /* Header Styles */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 70px;
        background-image: radial-gradient(circle 815px at 23.4% -21.8%, rgba(9, 29, 85, 1) 0.2%, rgba(0, 0, 0, 1) 100.2%);
        color: white;
        z-index: 1100;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .header .toggle-btn {
        background-color: #f1faee;
        color: #162b47;
        border: none;
        font-size: 1.2rem;
        padding: 10px;
        border-radius: 15%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .header .toggle-btn:hover {
        background-color: #fafcfc;
    }

    .header .brand {
        font-size: 1.5rem;
        font-weight: bold;
        font-family: Georgia, 'Times New Roman', Times, serif
    }

    .header .user-actions {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .header .user-actions i {
        font-size: 1.2rem;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .header .user-actions i:hover {
        color: #a8dadc;
    }

    /* Main Content Styles */
    .main-content {
        margin-top: 70px;
        margin-left: 250px;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    .main-content.full-width {
        margin-left: 0;
    }

    .main-content h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #1d3557;
        margin-bottom: 20px;
    }

    .main-content p {
        color: #6c757d;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        font-size: 1.2rem;
        font-weight: 500;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        #sidebar {
            transform: translateX(-250px);
        }

        .header .brand {
            font-size: 15px;
            margin-right: 10px
        }

        #sidebar.show {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

    }

    .modern-hr {
        border: none;
        height: 2px;
        background-image: linear-gradient(109.6deg, rgba(9, 9, 121, 1) 11.2%, rgba(144, 6, 161, 1) 53.7%, rgba(0, 212, 255, 1) 100.2%);
        border-radius: 5px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        margin: 15px auto;
        width: 80%;
    }

    /* Footer Styles */
    .footer {
        position: sticky;
        /* Change to fixed for sticky footer */
        bottom: 0;
        width: 100%;
        background: linear-gradient(135deg, #1d3557, #457b9d);
        color: white;
        font-size: 0.9rem;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

    .footer p {
        margin: 0;
        line-height: 1.6;
    }

    .footer i {
        vertical-align: middle;
    }
        
    </style>
</head>

<body>
    @include('admin.components.header')

    @include('admin.components.sidebar')

    <div class="main-content">
        @yield('content')
    </div>
    @include('admin.components.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            sidebar.classList.toggle('hidden');

            if (window.innerWidth > 768) {
                mainContent.classList.toggle('full-width');
            }
        });

    </script>
</body>
</html>
