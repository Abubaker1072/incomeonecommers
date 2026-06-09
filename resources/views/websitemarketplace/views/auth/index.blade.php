<!-- AUTHENTICATION MODAL / SECTION CONTAINER -->
<div class="auth-wrapper" style="display: flex; min-height: 600px; max-width: 1000px; margin: 40px auto; background-color: #ffffff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); font-family: 'Poppins', 'Helvetica Neue', Arial, sans-serif;">
    
    <!-- LEFT PANEL (Visual Branding Banner - from image_b447ab.jpg) -->
    <div class="auth-left-panel" style="flex: 1.1; background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); padding: 60px 40px; color: #ffffff; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; position: relative;">
        <!-- Shopping Bag Icon Container -->
        <div style="width: 100px; height: 100px; background-color: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
            <i class="fa fa-shopping-bag" style="font-size: 42px; color: #ffffff;"></i>
        </div>
        
        <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px; letter-spacing: -0.5px;">Welcome!</h2>
        <p style="font-size: 15px; color: rgba(255,255,255,0.85); line-height: 1.6; max-width: 340px; margin-bottom: 40px;">
            Join our exclusive community of shoppers and get access to amazing deals, exclusive products, and personalized recommendations.
        </p>

        <!-- Feature Checklists -->
        <div style="display: flex; flex-direction: column; gap: 15px; text-align: left; width: 100%; max-width: 240px; font-size: 15px; color: rgba(255,255,255,0.9);">
            <div><i class="fa fa-check" style="margin-right: 10px; opacity: 0.8;"></i> Fast Checkout</div>
            <div><i class="fa fa-check" style="margin-right: 10px; opacity: 0.8;"></i> Track Orders</div>
            <div><i class="fa fa-check" style="margin-right: 10px; opacity: 0.8;"></i> Exclusive Deals</div>
            <div><i class="fa fa-check" style="margin-right: 10px; opacity: 0.8;"></i> Wishlist & Reviews</div>
        </div>
    </div>

    <!-- RIGHT PANEL (Dynamic Interaction Form Content Area) -->
    <div class="auth-right-panel" style="flex: 1; padding: 50px 45px; display: flex; flex-direction: column; justify-content: space-between; background-color: #ffffff;">
        
        <!-- Top Navigation Segment Header (Tabs from image_b447ab.jpg) -->
        <div class="auth-tab-nav" style="display: flex; border-bottom: 2px solid #f1f5f9; margin-bottom: 30px; position: relative;">
            <button type="button" id="tabNavSignIn" onclick="switchAuthView('signin')" style="flex: 1; padding-bottom: 12px; background: none; border: none; font-size: 16px; font-weight: 600; color: #4f46e5; border-bottom: 2px solid #4f46e5; margin-bottom: -2px; cursor: pointer; transition: all 0.2s;">
                <i class="fa fa-sign-in" style="margin-right: 6px;"></i> Sign In
            </button>
            <button type="button" id="tabNavRegister" onclick="switchAuthView('register')" style="flex: 1; padding-bottom: 12px; background: none; border: none; font-size: 16px; font-weight: 500; color: #94a3b8; border-bottom: 2px solid transparent; margin-bottom: -2px; cursor: pointer; transition: all 0.2s;">
                <i class="fa fa-user-plus" style="margin-right: 6px;"></i> Create Account
            </button>
        </div>

        <!-- ==========================================
             VIEW A: SIGN IN FORM PANEL
        ========================================== -->
        <div id="signInFormView" style="display: block;">
            <form onsubmit="handleSignIn(event)">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 6px;">Email Address</label>
                    <input type="email" placeholder="Enter your email" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box;">
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 6px;">Password</label>
                    <input type="password" placeholder="Enter your password" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box;">
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 25px; font-size: 14px;">
                    <label style="display: flex; align-items: center; gap: 6px; color: #64748b; cursor: pointer;">
                        <input type="checkbox" style="width: 16px; height: 16px; cursor: pointer;"> Remember me
                    </label>
                    <a href="#" style="color: #4f46e5; text-decoration: none; font-weight: 500;">Forgot password?</a>
                </div>

                <button type="submit" style="width: 100%; background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: #ffffff; border: none; padding: 14px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2); margin-bottom: 25px;">SIGN IN</button>
            </form>

            <!-- Social Breakout Segment -->
            <div style="text-align: center; position: relative; margin-bottom: 25px;">
                <div style="position: absolute; top: 50%; left: 0; right: 0; border-top: 1px solid #e2e8f0; z-index: 1;"></div>
                <span style="position: relative; background-color: #ffffff; padding: 0 15px; color: #94a3b8; font-size: 13px; font-weight: 500; z-index: 2;">OR</span>
            </div>

            <div style="display: flex; gap: 15px; margin-bottom: 30px;">
                <button type="button" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; background: #ffffff; border: 1px solid #cbd5e1; padding: 11px; border-radius: 8px; font-size: 14px; color: #475569; font-weight: 500; cursor: pointer;"><i class="fa fa-facebook" style="color: #1877f2;"></i> Facebook</button>
                <button type="button" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; background: #ffffff; border: 1px solid #cbd5e1; padding: 11px; border-radius: 8px; font-size: 14px; color: #475569; font-weight: 500; cursor: pointer;"><i class="fa fa-google" style="color: #ea4335;"></i> Google</button>
            </div>

            <div style="text-align: center; font-size: 14px; color: #64748b;">
                Don't have an account? <a href="#" onclick="switchAuthView('register'); event.preventDefault();" style="color: #4f46e5; text-decoration: none; font-weight: 600;">Create one</a>
            </div>
        </div>

        <!-- ==========================================
             VIEW B: REGISTRATION FORM PANEL (from bvbv.png)
        ========================================== -->
        <div id="registerFormView" style="display: none;">
            <form onsubmit="handleRegister(event)">
                
                <!-- Role Picker Block Selection Components -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 8px;">
                        Register as <span style="color: #ef4444;">*</span>
                    </label>
                    <div style="display: flex; gap: 15px;">
                        <!-- Customer Toggle Button Block Selection -->
                        <button type="button" id="roleBtnCustomer" onclick="setRoleSelection('customer')" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px; border: 2px solid #4f46e5; border-radius: 8px; background-color: #ffffff; color: #4f46e5; font-weight: 600; font-size: 14px; cursor: pointer; transition: all 0.2s;">
                            <span class="status-dot" style="width: 10px; height: 10px; background-color: #4f46e5; border-radius: 50%;"></span>
                            <i class="fa fa-user"></i> Customer
                        </button>
                        <!-- Vendor Toggle Button Block Selection -->
                        <button type="button" id="roleBtnVendor" onclick="setRoleSelection('vendor')" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background-color: #ffffff; color: #64748b; font-weight: 500; font-size: 14px; cursor: pointer; transition: all 0.2s;">
                            <span class="status-dot" style="width: 10px; height: 10px; background-color: #cbd5e1; border-radius: 50%;"></span>
                            <i class="fa fa-store"></i> Vendor
                        </button>
                    </div>
                    <input type="hidden" id="selectedRoleInput" value="customer">
                </div>

                <!-- Registration Fields Layout Structure -->
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 6px;">Full Name <span style="color: #ef4444;">*</span></label>
                    <input type="text" placeholder="Enter your full name" required style="width: 100%; padding: 12px 16px; border: none; background-color: #f1f5f9; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 6px;">Email <span style="color: #ef4444;">*</span></label>
                    <input type="email" placeholder="Enter your email" required style="width: 100%; padding: 12px 16px; border: none; background-color: #f1f5f9; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 6px;">Password <span style="color: #ef4444;">*</span></label>
                    <input type="password" placeholder="Create a strong password" required style="width: 100%; padding: 12px 16px; border: none; background-color: #f1f5f9; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 6px;">Confirm Password <span style="color: #ef4444;">*</span></label>
                    <input type="password" placeholder="Re-enter your password" required style="width: 100%; padding: 12px 16px; border: none; background-color: #f1f5f9; border-radius: 8px; font-size: 15px; outline: none; box-sizing: border-box;">
                </div>

                <!-- Dynamic Functional Panel: Vendor/Brand Information Area Container Box -->
                <div id="vendorFieldsContainer" style="display: none; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 18px; background-color: #f8fafc; margin-bottom: 20px;">
                    <h4 style="font-size: 13px; font-weight: bold; color: #4f46e5; text-transform: uppercase; margin: 0 0 14px 0; letter-spacing: 0.5px;">Vendor / Brand Details</h4>
                    <div style="margin-bottom: 0;">
                        <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 6px;">Brand Name <span style="color: #ef4444;">*</span></label>
                        <input type="text" id="vendorBrandInput" placeholder="Your brand name" style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; background-color: #ffffff; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box;">
                    </div>
                </div>

                <button type="submit" style="width: 100%; background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: #ffffff; border: none; padding: 14px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2); margin-bottom: 20px;">Register Account</button>
            </form>

            <div style="text-align: center; font-size: 14px; color: #64748b;">
                Already have an account? <a href="#" onclick="switchAuthView('signin'); event.preventDefault();" style="color: #4f46e5; text-decoration: none; font-weight: 600;">Sign In</a>
            </div>
        </div>

    </div>
</div>

<!-- COMPREHENSIVE CONTROL ROUTINE SYSTEM JAVASCRIPT LAYER -->
<script>
    // Panel Dynamic Switch Controller Matrix Logic Function
    function switchAuthView(targetView) {
        const signInForm = document.getElementById('signInFormView');
        const registerForm = document.getElementById('registerFormView');
        const tabSignIn = document.getElementById('tabNavSignIn');
        const tabRegister = document.getElementById('tabNavRegister');

        if (targetView === 'register') {
            // Display Register Fields View Configuration Screen Map
            signInForm.style.display = 'none';
            registerForm.style.display = 'block';
            
            // Adjust Navigation Bar Highlights Active Framework Parameters Style
            tabRegister.style.color = '#4f46e5';
            tabRegister.style.borderBottom = '2px solid #4f46e5';
            tabRegister.style.fontWeight = '600';
            
            tabSignIn.style.color = '#94a3b8';
            tabSignIn.style.borderBottom = '2px solid transparent';
            tabSignIn.style.fontWeight = '500';
        } else {
            // Display Sign In Fields View Configuration Screen Map
            signInForm.style.display = 'block';
            registerForm.style.display = 'none';
            
            // Adjust Navigation Bar Highlights Active Framework Parameters Style
            tabSignIn.style.color = '#4f46e5';
            tabSignIn.style.borderBottom = '2px solid #4f46e5';
            tabSignIn.style.fontWeight = '600';
            
            tabRegister.style.color = '#94a3b8';
            tabRegister.style.borderBottom = '2px solid transparent';
            tabRegister.style.fontWeight = '500';
        }
    }

    // Sub-form Selection Trigger Handler Script for Role Fields
    function setRoleSelection(selectedRole) {
        const btnCustomer = document.getElementById('roleBtnCustomer');
        const btnVendor = document.getElementById('roleBtnVendor');
        const vendorPanel = document.getElementById('vendorFieldsContainer');
        const brandInput = document.getElementById('vendorBrandInput');
        const hiddenRoleInput = document.getElementById('selectedRoleInput');

        hiddenRoleInput.value = selectedRole;

        if (selectedRole === 'vendor') {
            // Vendor selection decoration
            btnVendor.style.border = '2px solid #4f46e5';
            btnVendor.style.color = '#4f46e5';
            btnVendor.style.fontWeight = '600';
            btnVendor.querySelector('.status-dot').style.backgroundColor = '#ffb800'; // Amber dot logic from bvbv.png

            btnCustomer.style.border = '1px solid #cbd5e1';
            btnCustomer.style.color = '#64748b';
            btnCustomer.style.fontWeight = '500';
            btnCustomer.querySelector('.status-dot').style.backgroundColor = '#cbd5e1';

            // Reveal hidden workspace panel segments
            vendorPanel.style.display = 'block';
            brandInput.setAttribute('required', 'required');
        } else {
            // Customer selection decoration
            btnCustomer.style.border = '2px solid #4f46e5';
            btnCustomer.style.color = '#4f46e5';
            btnCustomer.style.fontWeight = '600';
            btnCustomer.querySelector('.status-dot').style.backgroundColor = '#4f46e5';

            btnVendor.style.border = '1px solid #cbd5e1';
            btnVendor.style.color = '#64748b';
            btnVendor.style.fontWeight = '500';
            btnVendor.querySelector('.status-dot').style.backgroundColor = '#cbd5e1';

            // Conceal panels away securely
            vendorPanel.style.display = 'none';
            brandInput.removeAttribute('required');
        }
    }

    // Dummy submission triggers for development inspection
    function handleSignIn(e) { e.preventDefault(); alert('Sign In submitted successfully!'); }
    function handleRegister(e) { e.preventDefault(); alert('Registration submitted successfully!'); }
</script>