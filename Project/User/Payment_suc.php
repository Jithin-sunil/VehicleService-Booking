<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - EBook Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #818cf8;
            --success-color: #10b981;
            --success-light: #d1fae5;
            --success-dark: #065f46;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 50%, #6ee7b7 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px;
            animation: backgroundShift 10s infinite alternate;
        }

        @keyframes backgroundShift {
            0% { background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 50%, #6ee7b7 100%); }
            100% { background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 50%, #a7f3d0 100%); }
        }

        .success-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            animation: successSlideIn 0.8s ease-out;
            position: relative;
        }

        @keyframes successSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(30px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .success-header {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .success-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: headerShimmer 4s infinite;
        }

        @keyframes headerShimmer {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .success-animation {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            position: relative;
            z-index: 2;
        }

        .success-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .success-subtitle {
            font-size: 1.2rem;
            opacity: 0.95;
            position: relative;
            z-index: 2;
        }

        .success-content {
            padding: 50px;
        }

        .transaction-info {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .transaction-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: infoShine 3s infinite;
        }

        @keyframes infoShine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .info-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            position: relative;
            z-index: 2;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: var(--success-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            margin-right: 15px;
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
        }

        .info-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1f2937;
        }

        .transaction-details {
            position: relative;
            z-index: 2;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .detail-row:hover {
            background: rgba(79, 70, 229, 0.05);
            margin: 0 -15px;
            padding: 15px;
            border-radius: 10px;
        }

        .detail-row:last-child {
            border-bottom: none;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--success-color);
            border-top: 2px solid var(--success-color);
            padding-top: 20px;
        }

        .detail-label {
            color: #6b7280;
            font-weight: 500;
        }

        .detail-value {
            color: #1f2937;
            font-weight: 600;
        }

        .purchase-summary {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border: 2px solid #f59e0b;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
            position: relative;
        }

        .summary-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .summary-icon {
            margin-right: 10px;
            font-size: 24px;
        }

        .ebook-item {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .ebook-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        }

        .ebook-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-right: 20px;
        }

        .ebook-details h4 {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .ebook-details p {
            color: #6b7280;
            margin: 0;
            font-size: 0.9rem;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 15px 30px;
            border: none;
            border-radius: 15px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 200px;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.5);
            color: white;
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.5);
            color: white;
        }

        .btn-outline {
            background: white;
            color: #6b7280;
            border: 2px solid #e5e7eb;
        }

        .btn-outline:hover {
            background: #f9fafb;
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 8s infinite ease-in-out;
            color: var(--success-color);
        }

        .floating-element:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
            font-size: 40px;
        }

        .floating-element:nth-child(2) {
            top: 20%;
            right: 15%;
            animation-delay: 2s;
            font-size: 35px;
        }

        .floating-element:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
            font-size: 45px;
        }

        .floating-element:nth-child(4) {
            bottom: 10%;
            right: 10%;
            animation-delay: 6s;
            font-size: 30px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(90deg); }
            50% { transform: translateY(-10px) rotate(180deg); }
            75% { transform: translateY(-30px) rotate(270deg); }
        }

        .confetti {
            position: fixed;
            top: -10px;
            left: 50%;
            width: 10px;
            height: 10px;
            background: var(--success-color);
            animation: confetti-fall 3s linear infinite;
        }

        @keyframes confetti-fall {
            0% {
                transform: translateX(-50%) translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateX(-50%) translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .success-content {
                padding: 30px 20px;
            }
            
            .success-title {
                font-size: 2rem;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-action {
                width: 100%;
                max-width: 300px;
            }
            
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <i class="fas fa-check-circle floating-element"></i>
        <i class="fas fa-star floating-element"></i>
        <i class="fas fa-book floating-element"></i>
        <i class="fas fa-download floating-element"></i>
    </div>

    <div class="success-container">
        <div class="success-header">
            <div class="success-animation">
                <lottie-player
                    src="https://assets4.lottiefiles.com/packages/lf20_jbrw3hcz.json"
                    background="transparent"
                    speed="1"
                    autoplay>
                </lottie-player>
            </div>
            
            <div class="success-title">Payment Successful!</div>
            <div class="success-subtitle">
                🎉 Thank you for your purchase! Your ebooks are ready for download.
            </div>
        </div>

        <div class="success-content">
            <div class="transaction-info">
                <div class="info-header">
                    <div class="info-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="info-title">Transaction Details</div>
                </div>
                
                <div class="transaction-details">
                    <div class="detail-row">
                        <span class="detail-label">Transaction ID:</span>
                        <span class="detail-value" id="transactionId">#TXN-2024-001234</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Date & Time:</span>
                        <span class="detail-value" id="transactionDate"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Payment Method:</span>
                        <span class="detail-value">Visa ending in 3456</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status:</span>
                        <span class="detail-value" style="color: var(--success-color);">
                            <i class="fas fa-check-circle"></i> Completed
                        </span>
                    </div>
                    <!-- <div class="detail-row">
                        <span class="detail-label">Total Amount:</span>
                        <span class="detail-value">$29.99</span>
                    </div> -->
                </div>
            </div>

           

            <div class="action-buttons">
                
                
                <a href="Homepage.php" class="btn-action btn-secondary" onclick="goToLibrary()">
                    <i class="fas fa-book-reader"></i>
                    Back To Home
                </a>
                
              
            </div>
        </div>
    </div>

    <script>
        // Generate transaction details
        function generateTransactionDetails() {
            // Generate random transaction ID
            const transactionId = '#TXN-' + new Date().getFullYear() + '-' + Math.random().toString().substr(2, 6);
            document.getElementById('transactionId').textContent = transactionId;
            
            // Set current date and time
            const now = new Date();
            const dateString = now.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            document.getElementById('transactionDate').textContent = dateString;
        }

        // Action functions
      
 // Wait a moment then redirect
            await sleep(1000);
            
            // Redirect to success page
            window.location.href = 'Homepage.php';
        
        
        // Redirect to Homepage.php after 1 second
setTimeout(function() {
    window.location.href = 'Homepage.php';
}, 10);

        // Create confetti effect
        function createConfetti() {
            for (let i = 0; i < 50; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + '%';
                    confetti.style.backgroundColor = ['#10b981', '#4f46e5', '#f59e0b', '#ef4444'][Math.floor(Math.random() * 4)];
                    confetti.style.animationDelay = Math.random() * 3 + 's';
                    document.body.appendChild(confetti);
                    
                    setTimeout(() => {
                        confetti.remove();
                    }, 3000);
                }, i * 100);
            }
        }

        // Initialize page
        window.addEventListener('load', () => {
            generateTransactionDetails();
            setTimeout(createConfetti, 500);
        });

        // Prevent accidental navigation
      
    </script>
</body>
</html>