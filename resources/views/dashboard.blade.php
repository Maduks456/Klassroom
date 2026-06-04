<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap');

        .dashboard-wrapper {
            min-height: calc(100vh - 64px);
            background-color: #ffffff;
            padding: 2.5rem 1rem;
            font-family: 'DM Sans', sans-serif;
        }

        .dashboard-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Welcome banner */
        .welcome-banner {
            background: #f7f7f5;
            border: 1px solid #ebebea;
            border-radius: 16px;
            padding: 2rem 2.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
            margin-bottom: 2rem;
            animation: fadeUp 0.4s ease both;
        }

        .welcome-text-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #aaa;
            margin: 0 0 8px;
        }

        .welcome-text-heading {
            font-size: 22px;
            font-weight: 600;
            color: #0a0a0a;
            letter-spacing: -0.4px;
            margin: 0 0 6px;
        }

        .welcome-text-sub {
            font-size: 13.5px;
            color: #999;
            margin: 0;
        }

        .welcome-badge {
            flex-shrink: 0;
            background: #0a0a0a;
            color: #fff;
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.08em;
            padding: 6px 14px;
            border-radius: 100px;
            white-space: nowrap;
        }

        /* Stats row */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
            animation: fadeUp 0.4s 0.08s ease both;
        }

        @media (max-width: 640px) {
            .stats-grid { grid-template-columns: 1fr; }
            .welcome-badge { display: none; }
        }

        .stat-card {
            background: #f7f7f5;
            border: 1px solid #ebebea;
            border-radius: 14px;
            padding: 1.4rem 1.6rem;
        }

        .stat-label {
            font-size: 12px;
            font-weight: 500;
            color: #aaa;
            letter-spacing: 0.02em;
            margin: 0 0 10px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 600;
            color: #0a0a0a;
            letter-spacing: -0.5px;
            margin: 0 0 4px;
        }

        .stat-delta {
            font-size: 12px;
            color: #aaa;
            margin: 0;
        }

        .stat-delta span {
            color: #2d9c60;
            font-weight: 500;
        }

        /* Quick actions */
        .section-label {
            font-size: 11px;
            font-family: 'DM Mono', monospace;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #bbb;
            margin: 0 0 1rem;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            animation: fadeUp 0.4s 0.16s ease both;
        }

        @media (max-width: 640px) {
            .actions-grid { grid-template-columns: 1fr; }
        }

        .action-card {
            background: #f7f7f5;
            border: 1px solid #ebebea;
            border-radius: 14px;
            padding: 1.4rem 1.6rem;
            cursor: pointer;
            transition: border-color 0.15s ease, background 0.15s ease;
            text-decoration: none;
            display: block;
        }

        .action-card:hover {
            background: #f0f0ee;
            border-color: #d8d8d6;
        }

        .action-icon {
            width: 34px;
            height: 34px;
            background: #0a0a0a;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .action-icon svg {
            width: 16px;
            height: 16px;
            stroke: #fff;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .action-title {
            font-size: 14px;
            font-weight: 500;
            color: #0a0a0a;
            margin: 0 0 4px;
        }

        .action-desc {
            font-size: 12.5px;
            color: #aaa;
            margin: 0;
            line-height: 1.5;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>

    <x-slot name="header">
        <h2 style="font-family:'DM Sans',sans-serif; font-size:16px; font-weight:600; color:#0a0a0a; margin:0; letter-spacing:-0.2px;">
            Dashboard
        </h2>
    </x-slot>

    <div class="dashboard-wrapper">
        <div class="dashboard-inner">

            <!-- Welcome banner -->
            <div class="welcome-banner">
                <div>
                    <p class="welcome-text-eyebrow">Overview</p>
                    <h1 class="welcome-text-heading">You're logged in!</h1>
                    <p class="welcome-text-sub">Here's what's happening with your account today.</p>
                </div>
                <div class="welcome-badge">Active</div>
            </div>

            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <p class="stat-label">Sessions</p>
                    <p class="stat-value">24</p>
                    <p class="stat-delta"><span>↑ 12%</span> vs last week</p>
                </div>
                <div class="stat-card">
                    <p class="stat-label">Account age</p>
                    <p class="stat-value">1d</p>
                    <p class="stat-delta">Member since today</p>
                </div>
                <div class="stat-card">
                    <p class="stat-label">Status</p>
                    <p class="stat-value">OK</p>
                    <p class="stat-delta"><span>●</span> All systems normal</p>
                </div>
            </div>

            <!-- Quick actions -->
            <p class="section-label">Quick actions</p>
            <div class="actions-grid">
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <p class="action-title">Edit profile</p>
                    <p class="action-desc">Update your name, email, and personal details.</p>
                </a>
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <p class="action-title">Security</p>
                    <p class="action-desc">Manage your password and account security settings.</p>
                </a>
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </div>
                    <p class="action-title">Notifications</p>
                    <p class="action-desc">Configure how and when you receive alerts.</p>
                </a>
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </div>
                    <p class="action-title">Settings</p>
                    <p class="action-desc">Customize your preferences and application settings.</p>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>