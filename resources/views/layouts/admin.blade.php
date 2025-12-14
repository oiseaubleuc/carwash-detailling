<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>@yield('title', 'Admin Panel') - MEA Detailing</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #000000 0%, #0a0a0a 50%, #000000 100%);
            background-attachment: fixed;
            color: #e8e8e8;
            overflow-x: hidden;
        }
        
        .dashboard-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }
        
        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.15) 0%, rgba(212, 197, 169, 0.15) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(232, 213, 183, 0.3);
            color: #E8D5B7;
            width: 55px;
            height: 55px;
            border-radius: 12px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            touch-action: manipulation;
            box-shadow: 0 4px 15px rgba(232, 213, 183, 0.2);
        }

        .mobile-menu-toggle:hover,
        .mobile-menu-toggle:active {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.25) 0%, rgba(212, 197, 169, 0.25) 100%);
            border-color: #E8D5B7;
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(232, 213, 183, 0.3);
        }

        .mobile-menu-toggle.active {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.3) 0%, rgba(212, 197, 169, 0.3) 100%);
        }
        
        /* Sidebar */
        .sidebar {
            width: 300px;
            background: linear-gradient(180deg, rgba(17, 17, 17, 0.98) 0%, rgba(0, 0, 0, 0.98) 100%);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(232, 213, 183, 0.2);
            padding: 0;
            overflow-y: auto;
            overflow-x: hidden;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
            -webkit-overflow-scrolling: touch;
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.5);
        }
        
        .sidebar-header {
            padding: 30px 25px;
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.1) 0%, rgba(212, 197, 169, 0.05) 100%);
            border-bottom: 1px solid rgba(232, 213, 183, 0.2);
            margin-bottom: 20px;
        }
        
        .sidebar-header h1 {
            color: #E8D5B7;
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 5px;
            word-wrap: break-word;
            text-shadow: 0 0 20px rgba(232, 213, 183, 0.4);
            letter-spacing: 0.5px;
        }
        
        .sidebar-header p {
            color: rgba(232, 213, 183, 0.7);
            font-size: 0.85rem;
            word-wrap: break-word;
            font-weight: 400;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0 15px;
        }
        
        .sidebar-menu li {
            margin-bottom: 8px;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 18px;
            color: rgba(232, 213, 183, 0.8);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            font-size: 0.95rem;
            font-weight: 500;
            touch-action: manipulation;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar-menu a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, #E8D5B7 0%, #D4C5A9 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .sidebar-menu a i {
            width: 22px;
            text-align: center;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        
        .sidebar-menu a:hover {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.12) 0%, rgba(212, 197, 169, 0.08) 100%);
            border-color: rgba(232, 213, 183, 0.3);
            color: #E8D5B7;
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(232, 213, 183, 0.15);
        }
        
        .sidebar-menu a:hover::before {
            transform: scaleY(1);
        }
        
        .sidebar-menu a:hover i {
            transform: scale(1.15);
            color: #E8D5B7;
        }
        
        .sidebar-menu a.active {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.2) 0%, rgba(212, 197, 169, 0.15) 100%);
            border-color: rgba(232, 213, 183, 0.4);
            color: #E8D5B7;
            box-shadow: 0 4px 20px rgba(232, 213, 183, 0.25);
            font-weight: 600;
        }
        
        .sidebar-menu a.active::before {
            transform: scaleY(1);
        }
        
        .sidebar-menu a.active i {
            color: #E8D5B7;
            transform: scale(1.1);
        }
        
        .logout-btn {
            margin-top: 30px;
            padding: 20px 15px;
            border-top: 1px solid rgba(232, 213, 183, 0.2);
        }
        
        .logout-btn form {
            margin: 0;
        }
        
        .logout-btn button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.15) 0%, rgba(255, 82, 82, 0.1) 100%);
            color: #ff6b6b;
            border: 1px solid rgba(255, 107, 107, 0.3);
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 0.95rem;
            touch-action: manipulation;
        }
        
        .logout-btn button:hover,
        .logout-btn button:active {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.25) 0%, rgba(255, 82, 82, 0.2) 100%);
            border-color: #ff6b6b;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 300px;
            padding: 40px;
            min-height: 100vh;
            width: calc(100% - 300px);
        }
        
        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .sidebar-overlay.active {
            opacity: 1;
        }
        
        /* Common Admin Styles */
        .admin-page-title {
            color: #E8D5B7;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 15px;
            word-wrap: break-word;
            text-shadow: 0 0 25px rgba(232, 213, 183, 0.4);
            letter-spacing: -0.5px;
        }
        
        .admin-message {
            padding: 18px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            word-wrap: break-word;
            font-weight: 500;
            border-left: 4px solid;
        }
        
        .admin-message.success {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.2) 0%, rgba(76, 175, 80, 0.1) 100%);
            color: #4CAF50;
            border-left-color: #4CAF50;
        }
        
        .admin-message.error {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(255, 107, 107, 0.1) 100%);
            color: #ff6b6b;
            border-left-color: #ff6b6b;
        }
        
        .admin-btn {
            background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%);
            color: #000000;
            padding: 14px 28px;
            border: 2px solid #E8D5B7;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            font-size: 1rem;
            touch-action: manipulation;
            text-align: center;
            box-shadow: 0 4px 15px rgba(232, 213, 183, 0.3);
        }
        
        .admin-btn:hover,
        .admin-btn:active {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(232, 213, 183, 0.4);
            background: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 100%);
        }
        
        .admin-btn i {
            font-size: 1rem;
        }
        
        .admin-table-container {
            background: linear-gradient(135deg, rgba(17, 17, 17, 0.95) 0%, rgba(0, 0, 0, 0.95) 100%);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 25px;
            border: 1px solid rgba(232, 213, 183, 0.2);
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        }
        
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        
        .admin-table thead tr {
            border-bottom: 2px solid rgba(232, 213, 183, 0.3);
        }
        
        .admin-table th {
            padding: 18px 20px;
            text-align: left;
            color: #E8D5B7;
            font-weight: 700;
            font-size: 0.95rem;
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }
        
        .admin-table td {
            padding: 18px 20px;
            color: #e8e8e8;
            border-bottom: 1px solid rgba(232, 213, 183, 0.1);
            font-size: 0.9rem;
            word-wrap: break-word;
        }
        
        .admin-table tbody tr {
            transition: all 0.2s ease;
        }
        
        .admin-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .admin-table tbody tr:hover {
            background: linear-gradient(90deg, rgba(232, 213, 183, 0.08) 0%, transparent 100%);
        }
        
        .admin-form {
            background: linear-gradient(135deg, rgba(17, 17, 17, 0.95) 0%, rgba(0, 0, 0, 0.95) 100%);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 12px;
            border: 1px solid rgba(232, 213, 183, 0.2);
            max-width: 800px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        }
        
        .admin-form-group {
            margin-bottom: 25px;
        }
        
        .admin-form-label {
            display: block;
            color: #E8D5B7;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }
        
        .admin-form-input,
        .admin-form-textarea,
        .admin-form-select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid rgba(232, 213, 183, 0.2);
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(17, 17, 17, 0.8) 100%);
            color: #e8e8e8;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }
        
        .admin-form-input:focus,
        .admin-form-textarea:focus,
        .admin-form-select:focus {
            outline: none;
            border-color: #E8D5B7;
            box-shadow: 0 0 20px rgba(232, 213, 183, 0.3);
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.9) 0%, rgba(17, 17, 17, 0.9) 100%);
        }
        
        .admin-form-textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .admin-form-actions {
            margin-top: 35px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .admin-form-submit {
            background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%);
            color: #000000;
            padding: 14px 35px;
            border: 2px solid #E8D5B7;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            touch-action: manipulation;
            box-shadow: 0 4px 15px rgba(232, 213, 183, 0.3);
        }
        
        .admin-form-submit:hover,
        .admin-form-submit:active {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(232, 213, 183, 0.4);
            background: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 100%);
        }
        
        .admin-form-cancel {
            color: #E8D5B7;
            text-decoration: none;
            padding: 14px 0;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .admin-form-cancel:hover {
            color: #F5E6D3;
            text-shadow: 0 0 15px rgba(232, 213, 183, 0.5);
            gap: 12px;
        }
        
        .admin-link {
            color: #E8D5B7;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            touch-action: manipulation;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .admin-link:hover {
            color: #F5E6D3;
            text-shadow: 0 0 15px rgba(232, 213, 183, 0.5);
            gap: 10px;
        }
        
        .admin-delete-btn {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(255, 82, 82, 0.15) 100%);
            color: #ff6b6b;
            padding: 10px 18px;
            border: 1px solid rgba(255, 107, 107, 0.3);
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s ease;
            touch-action: manipulation;
        }
        
        .admin-delete-btn:hover,
        .admin-delete-btn:active {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.3) 0%, rgba(255, 82, 82, 0.25) 100%);
            border-color: #ff6b6b;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }
        
        /* Responsive Table - Card Layout on Mobile */
        @media (max-width: 768px) {
            .admin-table-container {
                padding: 15px;
            }
            
            .admin-table {
                display: block;
                min-width: 100%;
            }
            
            .admin-table thead {
                display: none;
            }
            
            .admin-table tbody,
            .admin-table tr,
            .admin-table td {
                display: block;
                width: 100%;
            }
            
            .admin-table tr {
                background: linear-gradient(135deg, rgba(17, 17, 17, 0.95) 0%, rgba(0, 0, 0, 0.95) 100%);
                border: 1px solid rgba(232, 213, 183, 0.2);
                border-radius: 10px;
                margin-bottom: 15px;
                padding: 15px;
            }
            
            .admin-table td {
                border: none;
                padding: 10px 0;
                text-align: left;
                position: relative;
                padding-left: 50%;
            }
            
            .admin-table td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                color: #E8D5B7;
                font-weight: 700;
                font-size: 0.85rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            
            .admin-table td:last-child {
                border-bottom: none;
            }
        }
        
        /* Tablet Styles (768px - 1024px) */
        @media (max-width: 1024px) {
            .sidebar {
                width: 260px;
            }
            
            .main-content {
                margin-left: 260px;
                width: calc(100% - 260px);
                padding: 30px;
            }
            
            .sidebar-header h1 {
                font-size: 1.4rem;
            }
            
            .sidebar-menu a {
                padding: 12px 15px;
                font-size: 0.9rem;
            }
        }
        
        /* Mobile Styles (max-width: 768px) */
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: flex;
            }
            
            .sidebar {
                transform: translateX(-100%);
                width: 300px;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar-overlay {
                display: block;
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 25px 15px;
                padding-top: 90px;
            }
            
            .sidebar-header {
                padding: 25px 20px;
            }
            
            .sidebar-header h1 {
                font-size: 1.3rem;
            }
            
            .sidebar-header p {
                font-size: 0.8rem;
            }
            
            .sidebar-menu {
                padding: 0 12px;
            }
            
            .sidebar-menu a {
                padding: 12px 15px;
                font-size: 0.9rem;
            }
            
            .sidebar-menu a i {
                width: 20px;
                font-size: 1rem;
            }
            
            .logout-btn button {
                padding: 12px;
                font-size: 0.9rem;
            }
            
            .admin-page-title {
                font-size: 2rem;
                margin-bottom: 12px;
            }
            
            .admin-message {
                padding: 15px;
                font-size: 0.9rem;
            }
            
            .admin-btn {
                padding: 12px 22px;
                font-size: 0.95rem;
                width: 100%;
                justify-content: center;
            }
            
            .admin-form {
                padding: 25px;
            }
            
            .admin-form-group {
                margin-bottom: 20px;
            }
            
            .admin-form-actions {
                flex-direction: column;
            }
            
            .admin-form-submit {
                width: 100%;
            }
        }
        
        /* Small Mobile Styles (max-width: 480px) */
        @media (max-width: 480px) {
            .mobile-menu-toggle {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
                top: 15px;
                left: 15px;
            }
            
            .sidebar {
                width: 100%;
                max-width: 320px;
            }
            
            .main-content {
                padding: 20px 12px;
                padding-top: 85px;
            }
            
            .sidebar-header h1 {
                font-size: 1.2rem;
            }
            
            .sidebar-header p {
                font-size: 0.75rem;
            }
            
            .sidebar-menu a {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
            
            .sidebar-menu a i {
                width: 18px;
                font-size: 0.9rem;
            }
            
            .admin-page-title {
                font-size: 1.7rem;
            }
            
            .admin-message {
                padding: 12px;
                font-size: 0.85rem;
            }
            
            .admin-table-container {
                padding: 12px;
            }
            
            .admin-table td {
                padding: 8px 0;
                padding-left: 45%;
                font-size: 0.85rem;
            }
            
            .admin-table td:before {
                font-size: 0.8rem;
            }
            
            .admin-form {
                padding: 20px;
            }
            
            .admin-form-input,
            .admin-form-textarea,
            .admin-form-select {
                padding: 12px 15px;
                font-size: 0.95rem;
            }
        }
        
        /* Extra Small Mobile (max-width: 360px) */
        @media (max-width: 360px) {
            .main-content {
                padding: 15px 10px;
                padding-top: 80px;
            }
            
            .sidebar-menu a {
                padding: 8px 10px;
                font-size: 0.8rem;
            }
            
            .admin-page-title {
                font-size: 1.5rem;
            }
        }
        
        /* Landscape Mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .sidebar {
                padding: 0;
            }
            
            .sidebar-header {
                padding: 15px 20px;
                margin-bottom: 15px;
            }
            
            .sidebar-menu li {
                margin-bottom: 5px;
            }
            
            .sidebar-menu a {
                padding: 10px 15px;
            }
            
            .main-content {
                padding-top: 70px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h1><i class="fas fa-crown"></i> Admin Panel</h1>
                <p>MEA Detailing</p>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="nav-link" data-route="admin.dashboard"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('admin.bookings.index') }}" class="nav-link" data-route="admin.bookings"><i class="fas fa-calendar-alt"></i> <span>Boekingen</span></a></li>
                <li><a href="{{ route('admin.time-slots.index') }}" class="nav-link" data-route="admin.time-slots"><i class="fas fa-clock"></i> <span>Tijd Slots</span></a></li>
                <li><a href="{{ route('admin.services.index') }}" class="nav-link" data-route="admin.services"><i class="fas fa-car"></i> <span>Diensten</span></a></li>
                <li><a href="{{ route('admin.users.index') }}" class="nav-link" data-route="admin.users"><i class="fas fa-users"></i> <span>Gebruikers</span></a></li>
                <li><a href="{{ route('admin.bookings.create') }}" class="nav-link" data-route="admin.bookings.create"><i class="fas fa-plus-circle"></i> <span>Nieuwe Boeking</span></a></li>
                <li><a href="{{ route('admin.services.create') }}" class="nav-link" data-route="admin.services.create"><i class="fas fa-plus-circle"></i> <span>Nieuwe Dienst</span></a></li>
                <li><a href="{{ route('admin.users.create') }}" class="nav-link" data-route="admin.users.create"><i class="fas fa-plus-circle"></i> <span>Nieuwe Gebruiker</span></a></li>
            </ul>
            
            <div class="logout-btn">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> <span>Uitloggen</span></button>
                </form>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    
    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        function toggleSidebar() {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
            
            const icon = mobileMenuToggle.querySelector('i');
            if (sidebar.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        }
        
        mobileMenuToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
        
        // Close sidebar when clicking a link on mobile
        if (window.innerWidth <= 768) {
            document.querySelectorAll('.sidebar-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    setTimeout(() => {
                        if (sidebar.classList.contains('active')) {
                            toggleSidebar();
                        }
                    }, 100);
                });
            });
        }
        
        // Mark active menu item based on current route
        document.addEventListener('DOMContentLoaded', function() {
            const currentRoute = '{{ Route::currentRouteName() }}';
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                const linkRoute = link.getAttribute('data-route');
                if (currentRoute === linkRoute || 
                    currentRoute.startsWith(linkRoute + '.') ||
                    (linkRoute === 'admin.dashboard' && currentRoute === 'admin.dashboard')) {
                    link.classList.add('active');
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    const icon = mobileMenuToggle.querySelector('i');
                    if (icon) {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
