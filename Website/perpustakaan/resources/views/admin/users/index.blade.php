@extends('layouts.admin')

@section('content')

<style>
    .users-page {
        padding: 28px;
    }

    .users-header {
        margin-bottom: 24px;
    }

    .users-title {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #111827;
    }

    .users-subtitle {
        margin: 6px 0 0;
        font-size: 13px;
        color: #64748B;
    }

    .users-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }

    .users-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #E2E8F0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .users-card-title {
        margin: 0;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .users-count {
        font-size: 11px;
        color: #64748B;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table th {
        padding: 13px 20px;
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
        color: #64748B;
        font-size: 11px;
        font-weight: 600;
        text-align: left;
        white-space: nowrap;
    }

    .users-table td {
        padding: 15px 20px;
        border-bottom: 1px solid #F1F5F9;
        color: #334155;
        font-size: 12px;
        vertical-align: middle;
    }

    .users-table tbody tr:last-child td {
        border-bottom: none;
    }

    .users-table tbody tr:hover {
        background: #F8FAFC;
    }

    .user-name {
        font-weight: 600;
        color: #111827;
    }

    .user-email {
        color: #64748B;
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 600;
    }

    .role-admin {
        background: #EEF2FF;
        color: #4338CA;
    }

    .role-user {
        background: #F1F5F9;
        color: #475569;
    }

    .empty-state {
        padding: 50px 20px;
        text-align: center;
    }

    .empty-icon {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .empty-title {
        margin: 0;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
    }

    .empty-text {
        margin: 5px 0 0;
        font-size: 11px;
        color: #94A3B8;
    }

    @media (max-width: 768px) {
        .users-page {
            padding: 20px;
        }

        .users-card-header {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 520px) {
        .users-page {
            padding: 16px;
        }

        .users-title {
            font-size: 21px;
        }
    }
</style>

<div class="users-page">

    {{-- HEADER --}}
    <div class="users-header">
        <h1 class="users-title">
            Pengguna
        </h1>

        <p class="users-subtitle">
            Daftar pengguna yang terdaftar di sistem perpustakaan
        </p>
    </div>

    {{-- USERS CARD --}}
    <div class="users-card">

        <div class="users-card-header">

            <h2 class="users-card-title">
                Daftar Pengguna
            </h2>

            <span class="users-count">
                {{ $users->count() }} pengguna
            </span>

        </div>

        @if ($users->count() > 0)

        <div class="table-wrapper">

            <table class="users-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Terdaftar</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($users as $user)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <div class="user-name">
                                {{ $user->name }}
                            </div>
                        </td>

                        <td>
                            <div class="user-email">
                                {{ $user->email }}
                            </div>
                        </td>

                        <td>

                            @if ($user->role === 'admin')

                            <span class="role-badge role-admin">
                                Admin
                            </span>

                            @else

                            <span class="role-badge role-user">
                                User
                            </span>

                            @endif

                        </td>

                        <td>
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="empty-state">

            <div class="empty-icon">
                👥
            </div>

            <p class="empty-title">
                Belum ada pengguna
            </p>

            <p class="empty-text">
                Belum ada pengguna yang terdaftar di sistem.
            </p>

        </div>

        @endif

    </div>

</div>

@endsection