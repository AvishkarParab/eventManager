<style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            width: 100vw;
            height: 100vh;
            display: grid;
            background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.2) , rgba(0, 0, 0, 0.4)), url("../fire.jpg");
            background-position: center;
            background-size: cover;
        }
        .navbar{
            height: 60px!important;
        }
        .foot{
            place-self:bottom;
            margin-right: 5px;
            color: white!important;
            background-color: transparent;
        }
        .maincont{ 
            display: grid;
            place-content: center;
            place-self: center;
            color: white!important;
        }
        .cont{
            background-color:rgba(0, 0, 0, 0.35);
            /* backdrop-filter: blur(10px); */
            width: 500px;
            display: grid;
            border: 1px solid cyan;
            place-content: center;
            border-radius: 20px;
            box-shadow: 3px 3px 1px cyan;
            font-weight: bold;
            letter-spacing: 1px;
            
        }
        .loadingDiv{
            background-color: white;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            display: flex;
        }
        .loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 6px solid blue;
            border-right: 6px solid green;
            border-bottom: 6px solid red;
            border-left: 6px solid pink;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            position: absolute;
            left: 50vw;
            top: 50vh;
            z-index: 1;
            animation: spin 2s linear infinite;
        }  
        .loadingDiv p{
            z-index:100;
            position: absolute;
            left: 49.5vw;
            top: 60vh;
            font-weight: bold;
            font-size: 20px;
        }     

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }   
        input{
            color: darkblue!important;
            border:1px solid cyan;
            border-radius: 6px;
            height:30px;
        }
        .nav-link{
            color: white;
            letter-spacing: 1px;
            font-size: 15px;
        }
        .nav-link:hover,.navbar-brand:hover{
            color: cyan !important;
            transition: .1s ease-in-out;
        }
        .navbar-nav .act{
            color: white;
            font-weight: 700;
            border-bottom: 1px solid white;
        }
        .nav-item{
            margin-right: 20px;
        }
        .social {
            color: white!important;
            font-size: 21px !important;
        }
        .social span:hover,.foot small:hover{
            color: cyan!important;
        }
        .btn{
            background-color:rgba(0, 0, 0, 0.8);
            color: cyan;
            border: 2px solid black;
            border-radius: 10px;
            border: 1px solid cyan;
        }
        .btn:hover{
            background-color:cyan;
            color:black;
        }
        @media only screen and (max-width:550px) {
            .cont{
            width:90vw;
           
        }
        .navbar-brand{
            font-size: 15px!important;
        }
        .nav-item,.nav-item a{
            margin-right: 4px!important;
            font-size: 13px!important;
        }
        }
    </style>
