<html>
    <head>
        <title>Resgistrati</title>
        <style>

        body {
            background: linear-gradient(#1d3557, #3e5c85);
            background-attachment:fixed;
            height:100%;
        }

        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
            
        * {
        	box-sizing: border-box;
        }
        
        body {
        	background: linear-gradient(#1d3557, #3e5c85);
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	flex-direction: column;
        	font-family: 'Montserrat', sans-serif;
        	height: 100vh;
        	margin: -20px 0 50px;
        }
        
        h1 {
        	font-weight: bold;
        	margin: 0;
        }
        
        h2 {
        	text-align: center;
        }
        
        p {
        	font-size: 14px;
        	font-weight: 100;
        	line-height: 20px;
        	letter-spacing: 0.5px;
        	margin: 20px 0 30px;
        }
        
        span {
        	font-size: 12px;
        }
        
        a {
        	color: #333;
        	font-size: 14px;
        	text-decoration: none;
        	margin: 15px 0;
        }
        
        input[type="submit"] {
        	border-radius: 20px;
        	border: 1px solid #FF4B2B;
        	background-color: #1d3557;
        	color: #FFFFFF;
        	font-size: 12px;
        	font-weight: bold;
        	padding: 12px 45px;
        	letter-spacing: 1px;
        	text-transform: uppercase;
        	transition: transform 80ms ease-in;
        }
        
        input[type="submit"]:hover {
            cursor: pointer;
        }
        
        input[type="submit"]:active {
        	transform: scale(0.95);
        }
        
        input[type="submit"]:focus {
        	outline: none;
        }
        
        form {
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	flex-direction: column;
        	padding: 0 50px;
        	height: 100%;
        }
        
        input {
        	background-color: #eee;
        	border: none;
        	padding: 12px 70px;
        	margin: 8px 0;
        	width: 100%;
        }
        
        .container {
        	background-color: #fff;
        	border-radius: 10px;
          	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
        			0 10px 10px rgba(0,0,0,0.22);
        	position: relative;
        	overflow: hidden;
        	width: 400px;
        	max-width: 100%;
        	min-height: 480px;
        }
        
        .form-container {
        	position: absolute;
        	top: 0;
        	height: 100%;
        	transition: all 0.6s ease-in-out;
        }
        
        .sign-in-container {
        	left: 0;
        	z-index: 2;
        }
        
        .sign-up-container {
        	left: 0;
        	opacity: 0;
        	z-index: 1;
        }
        
        @keyframes show {
        	0%, 49.99% {
        		opacity: 0;
        		z-index: 1;
        	}
        
        	50%, 100% {
        		opacity: 1;
        		z-index: 5;
        	}
        }
        
        .overlay-container {
        	position: absolute;
        	top: 0;
        	left: 50%;
        	width: 50%;
        	height: 100%;
        	overflow: hidden;
        	transition: transform 0.6s ease-in-out;
        	z-index: 100;
        }
        
        .container.right-panel-active .overlay-container{
        	transform: translateX(-100%);
        }
        
        .overlay {
        	background: #FF416C;
        	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
        	background: linear-gradient(#1d3557, #3e5c85);
        	background-repeat: no-repeat;
        	background-size: cover;
        	background-position: 0 0;
        	color: #FFFFFF;
        	position: relative;
        	left: -100%;
        	height: 100%;
        	width: 200%;
          	transform: translateX(0);
        	transition: transform 0.6s ease-in-out;
        }
        
        
        .overlay-panel {
        	position: absolute;
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	flex-direction: column;
        	padding: 0 50px;
        	text-align: center;
        	top: 0;
        	height: 100%;
        	width: 50%;
        	transform: translateX(0);
        	transition: transform 0.6s ease-in-out;
        }
        
        .overlay-left {
        	transform: translateX(-20%);
        }

    </style>
    </head>
    <body>
        <!--
        <div class="login">
            <h1>REGISTRAZIONE</h1>
            <form action="crea_account.php" method="get">
                <div class="login-obj">

                    <label>Username:</label>
                    <input type="text" name="user" required>
                    <br><br>
                    <label>Password:</label>
                    <input type="password" name="pass" required>
                    <br><br>
                    <label>Età:</label>
                    <input type="text" name="eta" required>
                    <br><br>
                    <label>Residenza:</label>
                    <input type="text" name="res" required>
                    <br><br><br>
                    <div class="btn-login">
                    <input type="submit" class="button7" value="Registrati" name="tipo">
                </div>
                </div>
            </form>
        </div>
    -->
        <div class="container" id="container">
    	    <div class="">
                <form action="crea_account.php" method="get">
    			    <h1>Registrati</h1>
                    <br><br>
    			    <input type="email" placeholder="Username" />
    			    <input type="password" placeholder="Password" />
                    <input type="text" placeholder="eta" />
                    <input type="text" placeholder="res" />
    			    <input type="submit" value="Registrati" name="tipo"/> 
    		    </form>
    	    </div>
        </div>
    </body>
</html>