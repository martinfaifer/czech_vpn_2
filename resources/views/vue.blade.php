<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon">
    <title>{{ config('app.name') }}</title>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        * {
            text-transform: none !important;
        }

        [v-cloak] {
            display: inline !important;
        }
    </style>
</head>

<body>
    <canvas id="canvas"> </canvas>
    <v-app id="app">
        <router-view></router-view>
    </v-app>
</body>

<script>
    var w, h, loopId, id, canvas, ctx, particles;

    var options = {
        particleColor: "rgba(7,180,246)",
        lineColor: "rgba(7,180,219)",
        particleAmount: 60,
        defaultRadius: 3,
        variantRadius: 3,
        defaultSpeed: 1,
        variantSpeed: 1,
        linkRadius: 150
    };

    var rgb = options.lineColor.match(/\d+/g);

    document.addEventListener("DOMContentLoaded", init);

    function init() {
        canvas = document.getElementById("canvas");
        ctx = canvas.getContext("2d");
        resizeReset();
        initialiseElements();
        startAnimation();
    }

    function resizeReset() {
        w = canvas.width = window.innerHeight;
        h = canvas.height = window.innerHeight;
    }

    function initialiseElements() {
        particles = [];
        for (var i = 0; i < options.particleAmount; i++) {
            particles.push(new Particle());
        }
    }

    function startAnimation() {
        loopId = requestAnimationFrame(animationLoop);
    }

    function animationLoop() {
        ctx.clearRect(0, 0, w, h);
        drawScene();

        id = requestAnimationFrame(animationLoop);
    }

    function drawScene() {
        drawLine();
        drawParticle();
    }

    function drawParticle() {
        for (var i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();
        }
    }

    function drawLine() {
        for (var i = 0; i < particles.length; i++) {
            linkPoints(particles[i], particles);
        }
    }

    function linkPoints(point, hubs) {
        for (var i = 0; i < hubs.length; i++) {
            var distance = checkDistance(point.x, point.y, hubs[i].x, hubs[i].y);
            var opacity = 1 - distance / options.linkRadius;
            if (opacity > 0) {
                ctx.lineWidth = 0.5;
                ctx.strokeStyle = 'rgba(' + rgb[0] + ',' + rgb[1] + ',' + rgb[2] + ',' + opacity + ')';
                ctx.beginPath();
                ctx.moveTo(point.x, point.y);
                ctx.lineTo(hubs[i].x, hubs[i].y);
                ctx.closePath();
                ctx.stroke();
            }
        }
    }

    function checkDistance(x1, y1, x2, y2) {
        return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
    }

    Particle = function() {
        var _this = this;

        _this.x = Math.random() * w;
        _this.y = Math.random() * h;
        _this.color = options.particleColor;
        _this.radius = options.defaultRadius + Math.random() * options.variantRadius;
        _this.speed = options.defaultSpeed + Math.random() * options.variantSpeed;
        _this.directionAngle = Math.floor(Math.random() * 360);
        _this.vector = {
            x: Math.cos(_this.directionAngle) * _this.speed,
            y: Math.sin(_this.directionAngle) * _this.speed
        }

        _this.update = function() {
            _this.border();
            _this.x += _this.vector.x;
            _this.y += _this.vector.y;
        }

        _this.border = function() {
            if (_this.x >= w || _this.x <= 0) {
                _this.vector.x *= -1;
            }
            if (_this.y >= h || _this.y <= 0) {
                _this.vector.y *= -1;
            }
            if (_this.x > w) _this.x = w;
            if (_this.y > h) _this.y = h;
            if (_this.x < 0) _this.x = 0;
            if (_this.y < 0) _this.y = 0;
        }

        _this.draw = function() {
            ctx.beginPath();
            ctx.arc(_this.x, _this.y, _this.radius, 0, Math.PI * 2);
            ctx.closePath();
            ctx.fillStyle = _this.color;
            ctx.fill();
        }
    }
</script>



</html>
