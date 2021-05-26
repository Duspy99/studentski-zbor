<template>
  <div id="landinganimation">
    <b-container fluid class="text-light vh-100 m-0 p-0" id="landing">
      <div class="hats">
        <img src="/images/university-hat.svg" alt="Ide" />
        <img src="/images/university-hat.svg" alt="Ide" />
        <img src="/images/university-hat.svg" alt="Ide" />
        <img src="/images/university-hat.svg" alt="Ide" />
        <img src="/images/university-hat.svg" alt="Ide" />
        <img src="/images/university-hat.svg" alt="Ide" />
        <img src="/images/university-hat.svg" alt="Ide" />
        <img src="/images/university-hat.svg" alt="Ide" />
      </div>

      <div class="main-title vh-100">
        <div class="text-center">
          <h1 class="heading text-uppercase text-break">
            <b class="text-shadow">Studentski Zbor</b>
          </h1>

          <h3 class="text-shadow">Powered by SUM</h3>
        </div>
      </div>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "LandingAnimation",
};
</script>

<style scoped>
#landinganimation {

  background-image: url("/images/landing-image.jpg");
  content: " ";
  width: 100vw;
  max-width: 100%;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}

.hats {
  width: 100vw;
  max-width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-around;
  position: absolute;
  bottom: -30px;
}

.main-title {
  display: flex;
  justify-content: center;
  align-items: center;
}

.hats img {
  animation: hat 7s linear infinite;
  width: 50px;
  opacity: 0;
}

.page-separator {
  width: 100vw;
  max-width: 100%;
  bottom: 0 !important;
  position: absolute;
}

.page-separator-path {
  fill: #fff;
}

@keyframes hat {
  0% {
    transform: translateY(0);
    opacity: 0;
  }
  20% {
    opacity: 0;
  }
  40% {
    opacity: 1;
  }
  70% {
    opacity: 1;
  }
  100% {
    transform: translateY(-80vh);
    opacity: 0;
  }
}

.hats img:nth-child(1) {
  animation-delay: 2s;
  width: 30px;
}
.hats img:nth-child(2) {
  animation-delay: 3s;
}
.hats img:nth-child(3) {
  animation-delay: 1s;
  width: 60px;
}
.hats img:nth-child(4) {
  animation-delay: 4s;
  width: 35px;
}
.hats img:nth-child(5) {
  animation-delay: 6s;
}
.hats img:nth-child(6) {
  animation-delay: 1.5s;
  width: 20px;
}
.hats img:nth-child(7) {
  animation-delay: 4.5s;
  width: 40px;
}

@media only screen and (max-width: 768px) {
  .heading {
    font-size: 3rem;
  }

  .hats img {
    width: 20px;
  }
}

.cover-div {
  position: absolute;
  bottom: -65px;
  height: 65px;
  min-width: 99vw;
  max-width: 100vw;
  overflow: hidden;
  background-color: #fff;
}

.text-shadow {
  text-shadow: 1px 1px 7px rgba(0,0,0,1);
}
</style>