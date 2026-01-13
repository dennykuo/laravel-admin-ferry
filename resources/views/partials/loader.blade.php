{{--
  Loader 將 html、CSS、JS 合併放置，除了加速 render 外，也方便其他專案套用
--}}

<div class="js-ferry-loader ferry-loader">
  <div class="ferry-loader-inner">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
    </svg>
  </div>
</div>

<style>
  .ferry-loader {
    position: fixed;
    z-index: 9999;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: radial-gradient(circle, rgba(230,239,245,1) 0%, rgba(251,253,255,1) 100%);
    display: flex;
    justify-content: center;
    opacity: 1;
    transition: opacity 320ms;
    will-change: auto;
  }

  .ferry-loader.is-off {
    opacity: 0;
  }

  .ferry-loader-inner {
    position: relative;
    margin: 0 auto;
    width: 48px;
  }

  .ferry-loader:before {
    content: "";
    display: block;
    padding-top: 100%;
  }

  .ferry-loader .circular {
    -webkit-animation: rotate 2s linear infinite;
            animation: rotate 2s linear infinite;
    height: 100%;
    transform-origin: center center;
    width: 100%;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
  }

  .ferry-loader .path {
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
    -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
            animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
    stroke-linecap: round;
  }

  @-webkit-keyframes rotate {
    100% {
      transform: rotate(360deg);
    }
  }

  @keyframes rotate {
    100% {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes dash {
    0% {
      stroke-dasharray: 1, 200;
      stroke-dashoffset: 0;
    }
    50% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -35px;
    }
    100% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -124px;
    }
  }
  @keyframes dash {
    0% {
      stroke-dasharray: 1, 200;
      stroke-dashoffset: 0;
    }
    50% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -35px;
    }
    100% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -124px;
    }
  }
  @-webkit-keyframes color {
    100%, 0% {
      stroke: #d62d20;
    }
    40% {
      stroke: #0057e7;
    }
    66% {
      stroke: #008744;
    }
    80%, 90% {
      stroke: #ffa700;
    }
  }
  @keyframes color {
    100%, 0% {
      stroke: #d62d20;
    }
    40% {
      stroke: #0057e7;
    }
    66% {
      stroke: #008744;
    }
    80%, 90% {
      stroke: #ffa700;
    }
  }
</style>

<script>
  window.addEventListener('load', function(event) {
    let loader = document.querySelector('.js-ferry-loader');
    loader.classList.add('is-off');
    setTimeout(() => {
      loader.remove();
    }, 600);
  });
</script>
