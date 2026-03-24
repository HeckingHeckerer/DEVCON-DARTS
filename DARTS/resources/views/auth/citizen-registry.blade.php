<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Citizen Registry - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .registry-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 550px;
            padding: 40px;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .registry-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .registry-header h1 {
            font-size: 28px;
            color: #333;
            font-weight: 700;
        }

        .registry-header p {
            color: #888;
            font-size: 14px;
            margin-top: 5px;
        }

        .step-counter {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .step-dot {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #666;
            font-size: 14px;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .step-dot.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .step-dot.completed {
            background: #4caf50;
            color: white;
        }

        .step-line {
            position: absolute;
            height: 2px;
            background: #e8e8e8;
            top: 20px;
            left: 0;
            right: 0;
            z-index: 1;
        }

        .step-content {
            display: none;
            animation: fadeIn 0.3s ease-out;
        }

        .step-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .step-category {
            font-size: 12px;
            color: #667eea;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .step-title {
            font-size: 20px;
            color: #333;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .step-description {
            font-size: 13px;
            color: #888;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="tel"],
        input[type="file"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="date"]:focus,
        input[type="tel"]:focus,
        input[type="file"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        .info-message {
            background: #e3f2fd;
            color: #1976d2;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            border-left: 4px solid #1976d2;
            line-height: 1.5;
        }

        .password-hint {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        .form-buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-next {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-back {
            background: #f0f0f0;
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-back:hover {
            background: #e8e8e8;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .verification-section {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .verification-status {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
        }

        .verify-btn {
            background: #667eea;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .verify-btn:hover {
            background: #764ba2;
        }

        .verified {
            color: #4caf50;
            font-weight: 600;
        }

        .file-upload {
            border: 2px dashed #ddd;
            border-radius: 6px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload:hover {
            border-color: #667eea;
            background: #f5f5ff;
        }

        .file-upload.active {
            border-color: #667eea;
            background: #f5f5ff;
        }

        .file-upload-label {
            display: block;
            font-size: 14px;
            color: #667eea;
            font-weight: 600;
        }

        .file-upload-hint {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 13px;
            margin-top: 20px;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        .success-icon {
            text-align: center;
            margin-bottom: 20px;
        }

        .success-icon svg {
            width: 60px;
            height: 60px;
            color: #4caf50;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            border-left: 4px solid #c33;
        }

        @media (max-width: 600px) {
            .registry-container {
                padding: 30px 20px;
            }

            .registry-header h1 {
                font-size: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .step-indicator {
                gap: 5px;
            }

            .step-dot {
                width: 35px;
                height: 35px;
                font-size: 12px;
            }

            .form-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="registry-container">
        <div class="registry-header">
            <h1>Citizen Registry</h1>
            <p>Complete your barangay registration</p>
        </div>

        <div style="text-align: center; margin-bottom: 20px;">
            <span class="step-counter"><span id="current-step">1</span> out of 6</span>
        </div>

        <div class="step-indicator">
            <div class="step-line"></div>
            <div class="step-dot active" id="step-1-dot">1</div>
            <div class="step-dot" id="step-2-dot">2</div>
            <div class="step-dot" id="step-3-dot">3</div>
            <div class="step-dot" id="step-4-dot">4</div>
            <div class="step-dot" id="step-5-dot">5</div>
            <div class="step-dot" id="step-6-dot">6</div>
        </div>

        <form id="registry-form" method="POST" action="/register" enctype="multipart/form-data">
            @csrf

            <!-- STEP 1: EMAIL VERIFICATION -->
            <div class="step-content active" id="step-1">
                <div class="step-category">Step 1 - Personal Details</div>
                <div class="step-title">Email Verification</div>
                <div class="step-description">Verify your email address to proceed with registration</div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required
                        placeholder="you@example.com"
                    >
                </div>

                <div class="verification-section">
                    <div class="verification-status">
                        <span id="verification-text">Email not verified</span>
                        <span class="verified" id="verification-check" style="display: none;">✓ Verified</span>
                    </div>
                    <button type="button" class="verify-btn" onclick="verifyEmail()">Verify Email</button>
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn btn-next" onclick="nextStep()" disabled id="verify-next-btn">Next Step</button>
                </div>
            </div>

            <!-- STEP 2: PERSONAL INFORMATION -->
            <div class="step-content" id="step-2">
                <div class="step-category">Step 2 - Personal Details</div>
                <div class="step-title">Personal Information</div>
                <div class="step-description">Please provide your personal details</div>

                <div class="form-group">
                    <label for="full_name">Full Legal Name</label>
                    <input 
                        type="text" 
                        id="full_name" 
                        name="full_name" 
                        value="{{ old('full_name') }}" 
                        required
                        placeholder="Juan Dela Cruz"
                    >
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input 
                            type="date" 
                            id="date_of_birth" 
                            name="date_of_birth" 
                            value="{{ old('date_of_birth') }}" 
                            required
                        >
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input 
                        type="tel" 
                        id="contact_number" 
                        name="contact_number" 
                        value="{{ old('contact_number') }}" 
                        required
                        placeholder="+63 9XX XXX XXXX"
                    >
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn btn-back" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-next" onclick="nextStep()">Next Step</button>
                </div>
            </div>

            <!-- STEP 3: ADDRESS INFORMATION -->
            <div class="step-content" id="step-3">
                <div class="step-category">Step 3 - Address</div>
                <div class="step-title">Address Information</div>
                <div class="step-description">We need both your current and permanent address to verify your residency</div>

                <div class="info-message">
                    📍 We require both addresses to ensure accurate record-keeping and verify your eligibility for barangay services.
                </div>

                <div class="form-group">
                    <label for="current_address">Current Address</label>
                    <input 
                        type="text" 
                        id="current_address" 
                        name="current_address" 
                        value="{{ old('current_address') }}" 
                        required
                        placeholder="Street, Barangay, City"
                    >
                </div>

                <div class="form-group">
                    <label for="permanent_address">Permanent Address (Hometown)</label>
                    <input 
                        type="text" 
                        id="permanent_address" 
                        name="permanent_address" 
                        value="{{ old('permanent_address') }}" 
                        required
                        placeholder="Street, Barangay, City"
                    >
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn btn-back" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-next" onclick="nextStep()">Next Step</button>
                </div>
            </div>

            <!-- STEP 4: DOCUMENTATION -->
            <div class="step-content" id="step-4">
                <div class="step-category">Step 4 - Documentation</div>
                <div class="step-title">Upload Documents</div>
                <div class="step-description">Please upload your identification and proof of residency</div>

                <div class="form-group">
                    <label for="id_type">Type of Identification</label>
                    <select id="id_type" name="id_type" required>
                        <option value="">Select Document Type</option>
                        <option value="philsys" {{ old('id_type') == 'philsys' ? 'selected' : '' }}>PhilSys ID</option>
                        <option value="drivers_license" {{ old('id_type') == 'drivers_license' ? 'selected' : '' }}>Driver's License</option>
                        <option value="passport" {{ old('id_type') == 'passport' ? 'selected' : '' }}>Passport</option>
                        <option value="umid" {{ old('id_type') == 'umid' ? 'selected' : '' }}>UMID</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="identification">Upload Identification Document</label>
                    <input 
                        type="file" 
                        id="identification" 
                        name="identification" 
                        required
                        accept=".pdf,.jpg,.jpeg,.png"
                    >
                    <div class="file-upload-hint">PDF, JPG, PNG (Max 5MB)</div>
                </div>

                <div class="form-group">
                    <label for="proof_of_residency">Upload Proof of Residency</label>
                    <input 
                        type="file" 
                        id="proof_of_residency" 
                        name="proof_of_residency" 
                        required
                        accept=".pdf,.jpg,.jpeg,.png"
                    >
                    <div class="file-upload-hint">PDF, JPG, PNG (Max 5MB)</div>
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn btn-back" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-next" onclick="nextStep()">Next Step</button>
                </div>
            </div>

            <!-- STEP 5: IDENTITY CHECK -->
            <div class="step-content" id="step-5">
                <div class="step-category">Step 5 - Identity Check</div>
                <div class="step-title">Verification</div>
                <div class="step-description">Please review your information for accuracy</div>

                <div class="info-message">
                    ✓ Your documents are being verified. Please answer the following for identity verification.
                </div>

                <div class="form-group">
                    <label for="mothers_name">Mother's Maiden Name</label>
                    <input 
                        type="text" 
                        id="mothers_name" 
                        name="mothers_name" 
                        value="{{ old('mothers_name') }}" 
                        required
                        placeholder="Full name"
                    >
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="place_of_birth">Place of Birth</label>
                        <input 
                            type="text" 
                            id="place_of_birth" 
                            name="place_of_birth" 
                            value="{{ old('place_of_birth') }}" 
                            required
                            placeholder="City/Municipality"
                        >
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn btn-back" onclick="prevStep()">Back</button>
                    <button type="button" class="btn btn-next" onclick="nextStep()">Next Step</button>
                </div>
            </div>

            <!-- STEP 6: FINAL REVIEW -->
            <div class="step-content" id="step-6">
                <div class="step-category">Step 6 - Final Review</div>
                <div class="step-title">Complete Registration</div>
                <div class="step-description">Create your account to complete the registration</div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        placeholder="••••••••"
                    >
                    <div class="password-hint">At least 8 characters, include numbers and special characters</div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required
                        placeholder="••••••••"
                    >
                </div>

                <div class="info-message">
                    By submitting this form, you agree to provide accurate information for your barangay registration.
                </div>

                <div class="form-buttons">
                    <button type="button" class="btn btn-back" onclick="prevStep()">Back</button>
                    <button type="submit" class="btn btn-submit">Complete Registration</button>
                </div>
            </div>
        </form>

        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 6;
        let emailVerified = false;

        function showStep(stepNumber) {
            // Hide all steps
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById(`step-${i}`).classList.remove('active');
                document.getElementById(`step-${i}-dot`).classList.remove('active');
            }

            // Show current step
            document.getElementById(`step-${stepNumber}`).classList.add('active');
            document.getElementById(`step-${stepNumber}-dot`).classList.add('active');

            // Update step counter
            document.getElementById('current-step').textContent = stepNumber;

            // Update completed steps
            for (let i = 1; i < stepNumber; i++) {
                document.getElementById(`step-${i}-dot`).classList.add('completed');
                document.getElementById(`step-${i}-dot`).classList.remove('active');
            }

            // Scroll to top
            window.scrollTo(0, 0);
        }

        function nextStep() {
            // Validate current step
            if (!validateCurrentStep()) {
                alert('Please fill in all required fields');
                return;
            }

            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        function validateCurrentStep() {
            const requiredFields = document.querySelectorAll(`#step-${currentStep} input[required], #step-${currentStep} select[required]`);
            
            for (let field of requiredFields) {
                if (field.value.trim() === '') {
                    field.focus();
                    return false;
                }
            }

            // Special validation for step 1
            if (currentStep === 1 && !emailVerified) {
                alert('Please verify your email address first');
                return false;
            }

            return true;
        }

        function verifyEmail() {
            const emailInput = document.getElementById('email');
            const email = emailInput.value.trim();

            if (!email) {
                alert('Please enter an email address');
                return;
            }

            // Email regex validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                return;
            }

            // Simulate verification
            emailVerified = true;
            document.getElementById('verification-text').style.display = 'none';
            document.getElementById('verification-check').style.display = 'inline';
            document.getElementById('verify-next-btn').disabled = false;
        }

        // Initialize first step
        showStep(1);
    </script>
</body>
</html>
