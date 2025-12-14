@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<style>
        .dashboard-header {
            margin-bottom: 35px;
            padding-bottom: 25px;
            border-bottom: 2px solid rgba(232, 213, 183, 0.2);
        }
        
        .dashboard-header h1 {
            color: #E8D5B7;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 12px;
            text-shadow: 0 0 30px rgba(232, 213, 183, 0.5);
            word-wrap: break-word;
            letter-spacing: -0.5px;
        }
        
        .dashboard-header p {
            color: rgba(232, 213, 183, 0.8);
            font-size: 1.15rem;
            word-wrap: break-word;
            font-weight: 400;
        }
        
        /* Message Styles */
        .message {
            padding: 18px 22px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            word-wrap: break-word;
            font-weight: 500;
            border-left: 4px solid;
        }
        
        .message.success {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.2) 0%, rgba(76, 175, 80, 0.1) 100%);
            color: #4CAF50;
            border-left-color: #4CAF50;
        }
        
        .message.error {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(255, 107, 107, 0.1) 100%);
            color: #ff6b6b;
            border-left-color: #ff6b6b;
        }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 45px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, rgba(17, 17, 17, 0.95) 0%, rgba(0, 0, 0, 0.95) 100%);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid rgba(232, 213, 183, 0.2);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            transition: all 0.4s ease;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #E8D5B7 0%, #D4C5A9 100%);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        
        .stat-card:hover::before {
            transform: scaleX(1);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            border-color: rgba(232, 213, 183, 0.4);
            box-shadow: 0 12px 35px rgba(232, 213, 183, 0.3);
        }
        
        .stat-card h3 {
            color: rgba(232, 213, 183, 0.9);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 18px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            word-wrap: break-word;
        }
        
        .stat-card .stat-number {
            color: #E8D5B7;
            font-size: 3.5rem;
            font-weight: 800;
            margin: 20px 0;
            text-shadow: 0 0 25px rgba(232, 213, 183, 0.5);
            word-wrap: break-word;
            line-height: 1;
        }
        
        .stat-card .stat-link {
            color: #E8D5B7;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid rgba(232, 213, 183, 0.1);
        }
        
        .stat-card .stat-link:hover {
            gap: 12px;
            color: #F5E6D3;
            text-shadow: 0 0 15px rgba(232, 213, 183, 0.5);
        }
        
        .stat-card span {
            color: rgba(232, 213, 183, 0.7);
            font-size: 0.9rem;
            word-wrap: break-word;
            font-weight: 400;
        }
        
        /* Upcoming Bookings Table */
        .upcoming-bookings {
            background: linear-gradient(135deg, rgba(17, 17, 17, 0.95) 0%, rgba(0, 0, 0, 0.95) 100%);
            backdrop-filter: blur(10px);
            padding: 35px;
            border-radius: 15px;
            border: 1px solid rgba(232, 213, 183, 0.2);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            margin-bottom: 45px;
        }
        
        .upcoming-bookings h2 {
            color: #E8D5B7;
            font-size: 2rem;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(232, 213, 183, 0.4);
            word-wrap: break-word;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        
        .upcoming-bookings h2 i {
            margin-right: 12px;
            color: #E8D5B7;
        }
        
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .upcoming-bookings table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        
        .upcoming-bookings th {
            padding: 16px 20px;
            text-align: left;
            color: #E8D5B7;
            font-weight: 700;
            border-bottom: 2px solid rgba(232, 213, 183, 0.3);
            font-size: 0.9rem;
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
        }
        
        .upcoming-bookings td {
            padding: 16px 20px;
            color: #e8e8e8;
            border-bottom: 1px solid rgba(232, 213, 183, 0.1);
            font-size: 0.9rem;
            word-wrap: break-word;
        }
        
        .upcoming-bookings tr {
            transition: all 0.2s ease;
        }
        
        .upcoming-bookings tr:last-child td {
            border-bottom: none;
        }
        
        .upcoming-bookings tr:hover {
            background: linear-gradient(90deg, rgba(232, 213, 183, 0.08) 0%, transparent 100%);
        }
        
        .upcoming-bookings .view-all {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(232, 213, 183, 0.1);
        }
        
        .upcoming-bookings .view-all a {
            color: #E8D5B7;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .upcoming-bookings .view-all a:hover {
            gap: 12px;
            color: #F5E6D3;
            text-shadow: 0 0 15px rgba(232, 213, 183, 0.5);
        }
        
        /* Quick Actions */
        .quick-actions {
            background: linear-gradient(135deg, rgba(17, 17, 17, 0.95) 0%, rgba(0, 0, 0, 0.95) 100%);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            border: 1px solid rgba(232, 213, 183, 0.2);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        }
        
        .quick-actions h2 {
            color: #E8D5B7;
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 0 0 20px rgba(232, 213, 183, 0.4);
            word-wrap: break-word;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
        }
        
        .action-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 20px;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.6) 0%, rgba(17, 17, 17, 0.6) 100%);
            border: 1px solid rgba(232, 213, 183, 0.2);
            border-radius: 12px;
            text-decoration: none;
            color: #E8D5B7;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            min-height: 70px;
            word-wrap: break-word;
            position: relative;
            overflow: hidden;
        }
        
        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(232, 213, 183, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .action-btn:hover::before {
            left: 100%;
        }
        
        .action-btn:hover {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.15) 0%, rgba(212, 197, 169, 0.1) 100%);
            border-color: rgba(232, 213, 183, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(232, 213, 183, 0.25);
            color: #F5E6D3;
        }
        
        .action-btn.highlight {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.25) 0%, rgba(212, 197, 169, 0.2) 100%);
            border: 2px solid rgba(232, 213, 183, 0.5);
            box-shadow: 0 0 20px rgba(232, 213, 183, 0.3);
            font-weight: 700;
        }
        
        .action-btn.highlight:hover {
            background: linear-gradient(135deg, rgba(232, 213, 183, 0.35) 0%, rgba(212, 197, 169, 0.3) 100%);
            border-color: #E8D5B7;
            box-shadow: 0 0 30px rgba(232, 213, 183, 0.4);
        }
        
        .action-btn i {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }
        
        .action-btn:hover i {
            transform: scale(1.15);
        }
        
        /* Responsive Styles */
        @media (max-width: 1024px) {
            .dashboard-header h1 {
                font-size: 2.5rem;
            }
            
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 20px;
            }
            
            .stat-card {
                padding: 25px;
                min-height: 180px;
            }
            
            .stat-card .stat-number {
                font-size: 3rem;
            }
            
            .actions-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                gap: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                margin-bottom: 25px;
                padding-bottom: 20px;
            }
            
            .dashboard-header h1 {
                font-size: 2rem;
            }
            
            .dashboard-header p {
                font-size: 1rem;
            }
            
            .message {
                padding: 15px;
                font-size: 0.9rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            
            .stat-card {
                padding: 25px;
                min-height: 170px;
            }
            
            .stat-card h3 {
                font-size: 0.85rem;
            }
            
            .stat-card .stat-number {
                font-size: 2.5rem;
            }
            
            .stat-card .stat-link {
                font-size: 0.9rem;
            }
            
            .upcoming-bookings {
                padding: 25px;
            }
            
            .upcoming-bookings h2 {
                font-size: 1.6rem;
                margin-bottom: 20px;
            }
            
            .upcoming-bookings table {
                min-width: 500px;
            }
            
            .upcoming-bookings th,
            .upcoming-bookings td {
                padding: 12px 15px;
                font-size: 0.85rem;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .quick-actions {
                padding: 30px;
            }
            
            .quick-actions h2 {
                font-size: 1.6rem;
                margin-bottom: 25px;
            }
            
            .action-btn {
                padding: 18px;
                font-size: 0.9rem;
                min-height: 65px;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-header h1 {
                font-size: 1.7rem;
            }
            
            .dashboard-header p {
                font-size: 0.95rem;
            }
            
            .message {
                padding: 12px;
                font-size: 0.85rem;
            }
            
            .stats-grid {
                gap: 15px;
            }
            
            .stat-card {
                padding: 20px;
                min-height: 160px;
            }
            
            .stat-card h3 {
                font-size: 0.8rem;
                margin-bottom: 12px;
            }
            
            .stat-card .stat-number {
                font-size: 2.2rem;
                margin: 15px 0;
            }
            
            .stat-card .stat-link {
                font-size: 0.85rem;
                padding-top: 12px;
            }
            
            .stat-card span {
                font-size: 0.85rem;
            }
            
            .upcoming-bookings {
                padding: 20px;
            }
            
            .upcoming-bookings h2 {
                font-size: 1.4rem;
                margin-bottom: 18px;
            }
            
            .upcoming-bookings h2 i {
                margin-right: 8px;
                font-size: 1.2rem;
            }
            
            .upcoming-bookings table {
                min-width: 450px;
            }
            
            .upcoming-bookings th,
            .upcoming-bookings td {
                padding: 10px 12px;
                font-size: 0.8rem;
            }
            
            .quick-actions {
                padding: 25px;
            }
            
            .quick-actions h2 {
                font-size: 1.4rem;
                margin-bottom: 20px;
            }
            
            .action-btn {
                padding: 15px;
                font-size: 0.85rem;
                min-height: 60px;
            }
            
            .action-btn i {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 360px) {
            .dashboard-header h1 {
                font-size: 1.5rem;
            }
            
            .stat-card {
                padding: 18px;
            }
            
            .stat-card .stat-number {
                font-size: 2rem;
            }
            
            .upcoming-bookings table {
                min-width: 400px;
            }
            
            .action-btn {
                padding: 12px;
                font-size: 0.8rem;
            }
        }
        
        /* Landscape Mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .dashboard-header {
                margin-bottom: 20px;
                padding-bottom: 15px;
            }
            
            .dashboard-header h1 {
                font-size: 1.8rem;
            }
            
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
            }
            
            .stat-card {
                padding: 20px;
                min-height: 140px;
            }
            
            .stat-card .stat-number {
                font-size: 2rem;
            }
        }
    </style>

    <div class="dashboard-header">
        <h1><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>
        <p>Welkom terug! Hier is een overzicht van je systeem.</p>
    </div>

    @if(session('success'))
        <div class="message success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    
    @if(session('error'))
        <div class="message error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif
    
    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3><i class="fas fa-calendar-check"></i> Totaal Boekingen</h3>
            <div class="stat-number">{{ $bookingCount }}</div>
            <a href="{{ route('admin.bookings.index') }}" class="stat-link">
                Beheer boekingen <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="stat-card">
            <h3><i class="fas fa-calendar-day"></i> Vandaag</h3>
            <div class="stat-number">{{ $todayBookings }}</div>
            <span>Boekingen vandaag</span>
        </div>
        
        <div class="stat-card">
            <h3><i class="fas fa-calendar-week"></i> Deze Week</h3>
            <div class="stat-number">{{ $thisWeekBookings }}</div>
            <span>Boekingen deze week</span>
        </div>
        
        <div class="stat-card">
            <h3><i class="fas fa-calendar-alt"></i> Deze Maand</h3>
            <div class="stat-number">{{ $thisMonthBookings }}</div>
            <span>Boekingen deze maand</span>
        </div>

        <div class="stat-card">
            <h3><i class="fas fa-clock"></i> Komende Boekingen</h3>
            <div class="stat-number">{{ $pendingBookings }}</div>
            <span>Aankomende reserveringen</span>
        </div>
        
        <div class="stat-card">
            <h3><i class="fas fa-car"></i> Aantal Diensten</h3>
            <div class="stat-number">{{ $serviceCount }}</div>
            <a href="{{ route('admin.services.index') }}" class="stat-link">
                Beheer diensten <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="stat-card">
            <h3><i class="fas fa-users"></i> Aantal Gebruikers</h3>
            <div class="stat-number">{{ $userCount }}</div>
            <a href="{{ route('admin.users.index') }}" class="stat-link">
                Beheer gebruikers <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    @if($upcomingBookings->count() > 0)
    <!-- Upcoming Bookings -->
    <div class="upcoming-bookings">
        <h2>
            <i class="fas fa-calendar-check"></i> Komende Boekingen
        </h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Datum & Tijd</th>
                        <th>Klant</th>
                        <th>Dienst</th>
                        <th>E-mail</th>
                        <th>Telefoon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($upcomingBookings as $booking)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('d/m/Y H:i') }}</td>
                        <td>{{ $booking->customer_name ?? 'N/A' }}</td>
                        <td>{{ $booking->service->name ?? 'N/A' }}</td>
                        <td>{{ $booking->customer_email ?? 'N/A' }}</td>
                        <td>{{ $booking->customer_phone ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="view-all">
            <a href="{{ route('admin.bookings.index') }}">
                Bekijk alle boekingen <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    @endif
    
    <!-- Quick Actions -->
    <div class="quick-actions">
        <h2><i class="fas fa-bolt"></i> Snelle Acties</h2>
        <div class="actions-grid">
            <a href="{{ route('admin.bookings.index') }}" class="action-btn">
                <i class="fas fa-calendar-alt"></i> Beheer Boekingen
            </a>
            <a href="{{ route('admin.time-slots.index') }}" class="action-btn highlight">
                <i class="fas fa-clock"></i> Beheer Tijd Slots
            </a>
            <a href="{{ route('admin.services.index') }}" class="action-btn">
                <i class="fas fa-car"></i> Beheer Diensten
            </a>
            <a href="{{ route('admin.users.index') }}" class="action-btn">
                <i class="fas fa-users"></i> Beheer Gebruikers
            </a>
            <a href="{{ route('admin.bookings.create') }}" class="action-btn">
                <i class="fas fa-plus"></i> Nieuwe Boeking
            </a>
            <a href="{{ route('admin.services.create') }}" class="action-btn">
                <i class="fas fa-plus"></i> Nieuwe Dienst
            </a>
            <a href="{{ route('admin.users.create') }}" class="action-btn">
                <i class="fas fa-plus"></i> Nieuwe Gebruiker
            </a>
        </div>
    </div>
@endsection
