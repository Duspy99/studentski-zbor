<template>
  <div id="home" style="background-color: white;">

    <LandingAnimation />

    <b-container fluid class="pt-5 px-0" id="main">
      <b-container class="my-5">
        <b-row>
          <b-col md="6">
            <img src="/images/university-1.svg" alt="" />
          </b-col>
          <b-col md="6" class="py-3">
            <div class="text-center text-md-left">
              <h2 class="text-uppercase accent-color">
                <span style="font-weight: 600">O nama</span>
              </h2>
              <p>
                Studentski zbor je najviše predstavničko tijelo studenata
                Sveučilišta u Mostaru koje je odlukom Upravnog vijeća i Senata
                Sveučilišta utemeljeno 2000. godine. Tada je usvojen i Pravilnik
                o radu koji je ujedno temeljni akt Studentskog zbora, a iste
                godine održani su i prvi studentski izbori.
              </p>
            </div>
          </b-col>
        </b-row>

        <h2 class="text-uppercase text-center accent-color mt-5 pt-3">
          <span style="font-weight: 600">Ciljevi</span>
        </h2>
        <b-row class="text-center">
          <b-col md="4" class="py-3">
            <b-img-lazy
              src="/images/university-2.svg"
              height="150px"
              class="mb-3"
              alt="Studentski zbor opis"
            />
            <p>
              Studentski zbor, kao predstavničko tijelo mladih i socijalno
              osjetljivih ljudi, svake godine organizira brojne humanitarne
              projekte kojima nastoji pomoći lokalnoj zajednici i onima kojima
              je pomoć najpotrebnija, te iz godine u godinu nastojimo povećati
              broj studentskih projekata.
            </p>
          </b-col>

          <b-col md="4" class="py-3">
            <b-img-lazy
              src="/images/university-3.svg"
              height="150px"
              class="mb-3"
              alt="Studentski zbor Sveučilišta u Mostaru cilj"
            />
            <p>
              Glavni cilj Studentskog zbora jest štititi i promicati prava i
              interese studenata na razini njihovih fakulteta, ali i cijeloga
              Sveučilišta. Osim toga, zbor ima legitimitet zastupati sve
              studente Sveučilišta, a svoju legitimnost crpi iz studentskih
              izbora koji se provode na početku svake akademske godine sukladno
              načelima Pravilnika o Studentskom zboru.
            </p>
          </b-col>

          <b-col md="4" class="py-3">
            <b-img-lazy
              src="/images/university-4.svg"
              height="150px"
              class="mb-3"
              alt="Studentski zbor Sveučilišta u Mostaru zadaća"
            />
            <p>
              Što se tiče osnove zadaće studentskih predstavnika u fakultetskom
              vijeću i drugim tijelima, ona podrazumijeva iznošenje prijedloga i
              mišljenja studenata, zastupanje njihovih interesa, te
              unaprijeđenje kvalitete studiranja i kontinuirani rad na
              poboljšanju studentskog standarda i njihovih prava.
            </p>
          </b-col>
        </b-row>

        <div class="brojevni-podaci">
          <b-row class="text-center">
            <b-col md="6" class="my-3">
              <h2 class="text-uppercase text-center accent-color">
                <span style="font-weight: 600">11000+</span>
              </h2>
              <p>studenata</p>
            </b-col>

            <b-col md="6" class="my-3">
              <h2
                class="text-uppercase text-center accent-color"
                style="font-weight: 600"
              >
                120+
              </h2>
              <p>uspješnih projekata</p>
            </b-col>
          </b-row>
        </div>
      </b-container>

    </b-container>

    <b-container fluid class="p-0 student-image-div">
      <b-img-lazy class="student-image" src="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Studentski zbor"></b-img-lazy>
    </b-container>

    <b-container id="ostaliFakulteti" fluid>
      <b-container class="py-5 text-center">
        <img src="/images/sum-logo.png" class="sum-logo" alt="Sveučilište u Mostaru" />
        <p class="mt-3 px-5">
          Sveučilište budućnosti, temeljeno na europskim vrijednostima
        </p>
        <h2
          class="text-uppercase text-center accent-color mt-5 mb-1"
          style="font-weight: 600"
        >
          Fakulteti
        </h2>
        <p class="mb-5">ostale sastavnice sveučilišta</p>

        <b-row>
          <b-col md="4">
            <p>
              <a href="https://gf.sum.ba/" target="_blank" class="text-dark">Građevinski fakultet</a>
            </p>
            <p><a href="https://mef.sum.ba/" target="_blank" class="text-dark">Medicinski fakultet</a></p>
            <p>
              <a href="https://www.fpmoz.sum.ba/" target="_blank" class="text-dark"
                >Fakultet prirodoslovno-matematičkih i odgojnih znanosti</a
              >
            </p>
            <p><a href="https://pf.sum.ba/" target="_blank" class="text-dark">Pravni fakultet</a></p>
          </b-col>

          <b-col md="4">
            <p>
              <a href="http://aptf.sum.ba/" target="_blank" class="text-dark"
                >Agronomski i prehambeno-tehnološki fakultet</a
              >
            </p>
            <p>
              <a href="https://alu.sum.ba/" target="_blank" class="text-dark">Akademija likovnih umjetnosti</a>
            </p>
            <p>
              <a href="http://fsre.sum.ba/" target="_blank" class="text-dark"
                >Fakultet strojarstva, računarstva i elektrotehnike</a
              >
            </p>
          </b-col>

          <b-col md="4">
            <p><a href="https://ef.sum.ba/" target="_blank" class="text-dark">Ekonomski fakultet</a></p>
            <p>
              <a href="https://fzs.sum.ba/" target="_blank" class="text-dark">Fakultet zdravstvenih studija</a>
            </p>
            <p><a href="https://farf.sum.ba/" target="_blank" class="text-dark">Farmaceutski fakultet</a></p>
            <p><a href="https://ff.sum.ba/" target="_blank" class="text-dark">Filozofski fakultet</a></p>
          </b-col>
        </b-row>
      </b-container>
    </b-container>
  </div>
</template>

<script>
import LandingAnimation from "../components/LandingAnimation.vue";

export default {
  name: "Home",
  components: {
    LandingAnimation,
  },
};
</script>

<style scoped>
#main {
  background-color: #fff;
}

.parallax-image {
  width: 100%;
  height: 60vh;
  overflow: hidden;
  background-image: url("https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
  background-position: center;
  background-size: cover;
  border-bottom: 15px solid #353535;
  border-top: 1px solid #353535;
}

.student-image {
  width: 100%;
  height: 60vh;
  object-fit: cover;
  object-position: center;
  border-bottom: 15px solid #353535;
  border-top: 1px solid #353535;
}

.student-image-div {
  overflow-x: hidden;
}

#ostaliFakulteti {
  position: relative;
}

#ostaliFakulteti:before {
  content: " ";
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity: 0.15;
  background-image: url("/images/sum-background.svg");
  background-repeat: no-repeat;
  background-position: 50% 0;
  background-size: cover;
}

@media screen and (max-width: 400px) {
  .sum-logo {
    width: 150px;
  }
}
</style>