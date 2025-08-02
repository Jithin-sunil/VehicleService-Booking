<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Payment - EBook Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #818cf8;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .loader-container {
            background: white;
            border-radius: 25px;
            padding: 50px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            animation: loaderSlideIn 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .loader-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.05) 0%, transparent 70%);
            animation: shimmer 4s infinite;
        }

        @keyframes shimmer {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes loaderSlideIn {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(50px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .loader-animation {
            width: 150px;
            height: 150px;
            margin: 0 auto 30px;
            position: relative;
            z-index: 2;
        }

        .loader-title {
            font-size: 2rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .loader-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }

        .progress-section {
            margin-bottom: 40px;
            position: relative;
            z-index: 2;
        }

        .progress-bar-container {
            width: 100%;
            height: 12px;
            background: #e5e7eb;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 15px;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            width: 0%;
            transition: width 0.5s ease;
            border-radius: 6px;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: progressShine 2s infinite;
        }

        @keyframes progressShine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .progress-text {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 0.9rem;
        }

        .loader-steps {
            text-align: left;
            margin-top: 30px;
            position: relative;
            z-index: 2;
        }

        .loader-step {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            opacity: 0.4;
            transition: all 0.5s ease;
            padding: 10px;
            border-radius: 10px;
        }

        .loader-step.active {
            opacity: 1;
            background: rgba(79, 70, 229, 0.1);
            transform: translateX(5px);
        }

        .loader-step.completed {
            opacity: 1;
            background: rgba(16, 185, 129, 0.1);
        }

        .step-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.5s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .loader-step.active .step-icon {
            background: var(--primary-color);
            color: white;
            animation: pulse 2s infinite;
        }

        .loader-step.completed .step-icon {
            background: var(--success-color);
            color: white;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .step-text {
            font-weight: 500;
            color: #374151;
        }

        .loader-step.active .step-text {
            color: var(--primary-color);
            font-weight: 600;
        }

        .loader-step.completed .step-text {
            color: var(--success-color);
            font-weight: 600;
        }

        .security-info {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border: 1px solid #bae6fd;
            padding: 20px;
            border-radius: 15px;
            margin-top: 30px;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .security-icon {
            font-size: 24px;
            color: var(--primary-color);
            margin-right: 15px;
        }

        .security-text {
            font-size: 0.9rem;
            color: #374151;
            line-height: 1.4;
        }

        .dots-animation {
            display: inline-block;
            animation: dots 1.5s infinite;
        }

        @keyframes dots {
            0%, 20% { content: ''; }
            40% { content: '.'; }
            60% { content: '..'; }
            80%, 100% { content: '...'; }
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 6s infinite ease-in-out;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @media (max-width: 768px) {
            .loader-container {
                padding: 30px 20px;
                margin: 20px;
            }
            
            .loader-title {
                font-size: 1.5rem;
            }
            
            .loader-animation {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <i class="fas fa-shield-alt floating-element" style="font-size: 30px;"></i>
        <i class="fas fa-lock floating-element" style="font-size: 25px;"></i>
        <i class="fas fa-credit-card floating-element" style="font-size: 28px;"></i>
    </div>

    <div class="loader-container">
        <div class="loader-animation">
            <lottie-player
                id="loaderAnimation"
                src="https://assets3.lottiefiles.com/packages/lf20_p8bfn5to.json"
                background="transparent"
                speed="1"
                loop
                autoplay>
            </lottie-player>
        </div>
        
        <div class="loader-title" id="loaderTitle">Processing Payment</div>
        <div class="loader-subtitle" id="loaderSubtitle">
            Please wait while we securely process your payment<span class="dots-animation"></span>
        </div>
        
        <div class="progress-section">
            <div class="progress-bar-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            <div class="progress-text" id="progressText">0% Complete</div>
        </div>

        <div class="loader-steps">
            <div class="loader-step" id="step1">
                <div class="step-icon">1</div>
                <div class="step-text">Validating payment information</div>
            </div>
            <div class="loader-step" id="step2">
                <div class="step-icon">2</div>
                <div class="step-text">Contacting payment processor</div>
            </div>
            <div class="loader-step" id="step3">
                <div class="step-icon">3</div>
                <div class="step-text">Authorizing transaction</div>
            </div>
            <div class="loader-step" id="step4">
                <div class="step-icon">4</div>
                <div class="step-text">Finalizing purchase</div>
            </div>
        </div>

        <div class="security-info">
            <i class="fas fa-shield-alt security-icon"></i>
            <div class="security-text">
                <strong>Secure Transaction:</strong> Your payment is protected by 256-bit SSL encryption and industry-standard security protocols.
            </div>
        </div>
    </div>

    <script>
        // Payment processing steps
        const steps = [
            {
                title: "Validating Payment",
                subtitle: "Checking your payment information securely...",
                duration: 2000
            },
            {
                title: "Contacting Bank",
                subtitle: "Connecting to your bank's secure servers...",
                duration: 2000
            },
            {
                title: "Authorizing Payment",
                subtitle: "Your bank is authorizing the transaction...",
                duration: 2000
            },
            {
                title: "Finalizing Purchase",
                subtitle: "Almost done! Preparing your ebooks...",
                duration: 1500
            }
        ];

        let currentStep = 0;
        let progress = 0;

        function updateLoaderStep(stepNumber) {
            // Reset all steps
            for (let i = 1; i <= 4; i++) {
                const step = document.getElementById(`step${i}`);
                step.classList.remove('active', 'completed');
            }

            // Mark completed steps
            for (let i = 1; i < stepNumber; i++) {
                const step = document.getElementById(`step${i}`);
                step.classList.add('completed');
                step.querySelector('.step-icon').innerHTML = '<i class="fas fa-check"></i>';
            }

            // Mark current step as active
            if (stepNumber <= 4) {
                const currentStep = document.getElementById(`step${stepNumber}`);
                currentStep.classList.add('active');
            }
        }

        function updateProgressBar(percentage) {
            document.getElementById('progressBar').style.width = percentage + '%';
            document.getElementById('progressText').textContent = Math.round(percentage) + '% Complete';
        }

        function updateLoaderContent(title, subtitle) {
            document.getElementById('loaderTitle').textContent = title;
            document.getElementById('loaderSubtitle').innerHTML = subtitle + '<span class="dots-animation"></span>';
        }

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function processPayment() {
            for (let i = 0; i < steps.length; i++) {
                const step = steps[i];
                const stepNumber = i + 1;
                const progressPercentage = (stepNumber / steps.length) * 100;

                // Update UI
                updateLoaderStep(stepNumber);
                updateLoaderContent(step.title, step.subtitle);
                
                // Animate progress bar
                updateProgressBar(progressPercentage);

                // Wait for step duration
                await sleep(step.duration);
            }

            // Complete all steps
            updateProgressBar(100);
            updateLoaderContent("Payment Successful!", "Redirecting to confirmation page");
            
            // Wait a moment then redirect
            await sleep(1000);
            
            // Redirect to success page
            window.location.href = 'Payment_suc.php';
        }

        // Start processing when page loads
        window.addEventListener('load', () => {
            setTimeout(processPayment, 500);
        });

        // Prevent back button during processing
        window.addEventListener('beforeunload', (e) => {
            e.preventDefault();
            e.returnValue = 'Payment is being processed. Are you sure you want to leave?';
        });

        // Add some dynamic effects
        setInterval(() => {
            const dots = document.querySelector('.dots-animation');
            if (dots) {
                const content = dots.textContent;
                if (content === '...') {
                    dots.textContent = '';
                } else {
                    dots.textContent += '.';
                }
            }
        }, 500);
    </script>
</body>
</html>