<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config("site.name", "SISGEC") }} | {{ __("global.desktop") }}</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset("css/sisgec.app.css") }}">
        <style>
            #loader {
                transition: all 0.3s ease-in-out;
                opacity: 1;
                visibility: visible;
                position: fixed;
                height: 100vh;
                width: 100%;
                background: #fff;
                z-index: 90000;
            }
            #loader.fadeOut {
                opacity: 0;
                visibility: hidden;
            }
            .spinner {
                width: 40px;
                height: 40px;
                position: absolute;
                top: calc(50% - 20px);
                left: calc(50% - 20px);
                background-color: #333;
                border-radius: 100%;
                -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
                animation: sk-scaleout 1.0s infinite ease-in-out;
            }
            @-webkit-keyframes sk-scaleout {
                0% { -webkit-transform: scale(0) }
                100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
                }
            }
            @keyframes sk-scaleout {
                0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                } 100% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
                opacity: 0;
                }
            }
        </style>
    </head>
    <body class="app">
        <div id='loader'>
            <div class="spinner"></div>
        </div>

        <script>
            window.addEventListener('load', () => {
                const loader = document.getElementById('loader');
                setTimeout(() => {
                loader.classList.add('fadeOut');
                }, 300);
            });
        </script>

        <div>
            @component('parts.sidebar')
            @endcomponent
        
            <div class="page-container">
                @component('parts.header')
                @endcomponent

                <main class='main-content bgc-grey-100'>
                    <div id='mainContent'>
                        @section('content')
                            
                        @show
                    </div>
                </main>

                <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                    <span>Copyright &copy; {{ date("Y") }} <i>UI</i> diseñada por <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a> y programado por <a href="https://nidiasoft.com" title="Nidiasoft">Nidiasoft</a>.</span>
                </footer>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset("js/sisgec.app.js") }}"></script>
    </body>
</html>