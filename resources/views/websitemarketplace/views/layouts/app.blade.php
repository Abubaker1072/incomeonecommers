<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Electro - Ecommerce Store')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    <style>
        /* Loading Animation */
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(2px);
        }

        .loader-overlay.active {
            display: flex;
        }

        .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #D10024;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loader-text {
            position: absolute;
            bottom: 100px;
            font-size: 18px;
            color: #D10024;
            font-weight: bold;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Auth Modal */
        .auth-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .auth-modal.active {
            display: flex;
        }

        .auth-modal-content {
            background: white;
            border-radius: 8px;
            padding: 40px;
            max-width: 450px;
            width: 90%;
            position: relative;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .auth-modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 28px;
            color: #999;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
        }

        .auth-modal-close:hover {
            color: #333;
        }

        .auth-container {
            position: relative;
        }

        .auth-tab {
            display: none;
        }

        .auth-tab.active {
            display: block;
        }

        .auth-tab h2 {
            font-size: 28px;
            color: #222;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .auth-tab > p {
            color: #999;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .register-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .register-tab-btn {
            flex: 1;
            padding: 12px;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            color: #666;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .register-tab-btn:hover {
            border-color: #D10024;
            color: #D10024;
        }

        .register-tab-btn.active {
            background: #D10024;
            border-color: #D10024;
            color: white;
        }

        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: #222;
            margin-bottom: 8px;
        }

        .required {
            color: #D10024;
        }

        .form-group input {
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-size: 13px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #D10024;
            background: #fafafa;
        }

        .vendor-section {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #e0e0e0;
            margin-bottom: 10px;
        }

        .vendor-section h4 {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .auth-btn {
            padding: 14px;
            background: #D10024;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .auth-btn:hover {
            background: #a80020;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(209, 0, 36, 0.3);
        }

        .auth-switch {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #666;
        }

        .auth-switch a {
            color: #D10024;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .auth-switch a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .auth-modal-content {
                padding: 25px;
                max-width: 95%;
            }

            .auth-tab h2 {
                font-size: 22px;
            }

            .register-tabs {
                gap: 8px;
            }

            .register-tab-btn {
                padding: 10px;
                font-size: 12px;
            }
        }
    </style>

    @yield('additional-css')
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loader-overlay" id="loaderOverlay">
        <div style="text-align: center;">
            <div class="spinner"></div>
            <div class="loader-text">Loading...</div>
        </div>
    </div>

    <!-- Auth Modal -->
    <div class="auth-modal" id="authModal">
        <div class="auth-modal-content">
            <button class="auth-modal-close" onclick="closeAuthModal()">&times;</button>
            
            <div class="auth-container">
                <!-- Login Tab -->
                <div class="auth-tab active" id="loginTab">
                    <h2>Sign In</h2>
                    <p>Welcome back! Sign in to your account</p>
                    
                    <form class="auth-form">
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input type="email" id="loginEmail" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="auth-btn">Sign In</button>
                    </form>

                    <p class="auth-switch">Don't have an account? <a href="#" onclick="switchToRegister(event)">Create Account</a></p>
                </div>

                <!-- Register Tab -->
                <div class="auth-tab" id="registerTab">
                    <h2>Create Account</h2>
                    <p>Join us and start shopping today.</p>

                    <div class="register-tabs">
                        <button type="button" class="register-tab-btn active" onclick="switchRegisterType(event, 'customer')">
                            <i class="fa fa-user"></i> Customer
                        </button>
                        <button type="button" class="register-tab-btn" onclick="switchRegisterType(event, 'vendor')">
                            <i class="fa fa-store"></i> Vendor
                        </button>
                    </div>

                    <form class="auth-form">
                        <div class="form-group">
                            <label for="fullName">Full Name <span class="required">*</span></label>
                            <input type="text" id="fullName" placeholder="Full Name" required>
                        </div>

                        <div class="form-group">
                            <label for="regEmail">Email <span class="required">*</span></label>
                            <input type="email" id="regEmail" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="regPassword">Password <span class="required">*</span></label>
                            <input type="password" id="regPassword" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password <span class="required">*</span></label>
                            <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
                        </div>

                        <!-- Vendor Fields -->
                        <div id="vendorFields" style="display: none;">
                            <div class="vendor-section">
                                <h4>VENDOR / BRAND DETAILS</h4>
                                <div class="form-group">
                                    <label for="brandName">Brand Name <span class="required">*</span></label>
                                    <input type="text" id="brandName" placeholder="Brand Name">
                                </div>
                                <div class="form-group">
                                    <label for="businessEmail">Business Email <span class="required">*</span></label>
                                    <input type="email" id="businessEmail" placeholder="Business Email">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="auth-btn">Create Account</button>
                    </form>

                    <p class="auth-switch">Already have an account? <a href="#" onclick="switchToLogin(event)">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        // Auth Modal Functions
        function openAuthModal(event) {
            event.preventDefault();
            document.getElementById('authModal').classList.add('active');
        }

        function closeAuthModal() {
            document.getElementById('authModal').classList.remove('active');
        }

        function switchToRegister(event) {
            event.preventDefault();
            document.getElementById('loginTab').classList.remove('active');
            document.getElementById('registerTab').classList.add('active');
        }

        function switchToLogin(event) {
            event.preventDefault();
            document.getElementById('registerTab').classList.remove('active');
            document.getElementById('loginTab').classList.add('active');
        }

        function switchRegisterType(event, type) {
            event.preventDefault();
            
            // Update tab button styling
            const buttons = document.querySelectorAll('.register-tab-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.closest('.register-tab-btn').classList.add('active');
            
            // Show/hide vendor fields
            const vendorFields = document.getElementById('vendorFields');
            if (type === 'vendor') {
                vendorFields.style.display = 'block';
            } else {
                vendorFields.style.display = 'none';
            }
        }

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('authModal');
            if (event.target === modal) {
                closeAuthModal();
            }
        });

        // Prevent loader from showing when modal is open
        document.addEventListener('click', function(e) {
            var target = e.target.closest('a');
            if (target) {
                var href = target.getAttribute('href');
                var onclick = target.getAttribute('onclick');
                // Don't show loader for auth links or hash links
                if ((onclick && onclick.includes('Auth')) || href === '#' || href.startsWith('#') || href.startsWith('http') || href.startsWith('javascript')) {
                    return;
                }
                if (href && !href.startsWith('#') && !href.startsWith('http') && !href.startsWith('javascript')) {
                    document.getElementById('loaderOverlay').classList.add('active');
                }
            }
        });

        // Hide loader when page is fully loaded
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loaderOverlay').classList.remove('active');
            }, 300);
        });

        // Also hide loader if user goes back/forward
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                document.getElementById('loaderOverlay').classList.remove('active');
            }
        });

        // Hide loader on page load
        if (document.readyState === 'complete') {
            document.getElementById('loaderOverlay').classList.remove('active');
        } else {
            window.addEventListener('load', function() {
                document.getElementById('loaderOverlay').classList.remove('active');
            });
        }
    </script>

    @yield('additional-js')
</body>
</html>
