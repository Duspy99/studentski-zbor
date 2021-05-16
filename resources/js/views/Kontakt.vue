<template>
  <div id="kontakt">


    <b-container id="kontakt-landing" fluid>
      <div class="spacer" style="height: 30vh"></div>
      <b-container class="position-relative py-3 px-3">
        <h1 class="heading underline">Kontakt</h1>
        <h4 class="subheading text-wrap">
          Komunikacija je važna! Saznajte kako nas najbrže kontaktirati
        </h4>
      </b-container>
    </b-container>
    
    <b-container class="my-3 text-center">
      <!-- Email -->
      <b-row class="my-5 py-4">
        <b-col md="6" class="vert-align">
          <img
            src="/images/contact-email.svg"
            alt="Contact email illustration"
            width="90%"
          />
        </b-col>

        <b-col md="6" class="text-md-left vert-align">
          <h1 class="accent-color bold">Imate neka pitanja?</h1>
          <p>Kontaktirajte nas putem maila!</p>

          <b-form method="POST" action="/send-email" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <b-form-group id="input-group-1">
              <b-form-input
                class="no-border"
                id="input-1"
                name="ime"
                v-model="form.name"
                placeholder="Vaše ime"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2">
              <b-form-input
                class="no-border"
                id="input-2"
                name="email"
                v-model="form.email"
                type="email"
                placeholder="Vaš email"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3">
              <b-form-input
                class="no-border"
                id="input-3"
                name="svrha"
                v-model="form.subject"
                placeholder="Tema pitanja"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-4">
              <b-form-textarea
                class="no-border"
                rows="3"
                no-resize
                id="input-4"
                name="pitanje"
                v-model="form.content"
                placeholder="Vaše pitanje"
                required
              ></b-form-textarea>
            </b-form-group>
            
          <!--
          <b-input block type="submit" style="color:white" class="accent-color-bg text-center no-border" value="Pošalji email"/>
          -->

          <b-button block type="submit" variant="primary" class="accent-color-bg no-border">Pošalji</b-button>
          </b-form>
        </b-col>
      </b-row>

      <!-- Nazovite -->
      <b-row class="my-5 py-4">
        <b-col md="6" class="text-md-right vert-align">
          <h1 class="bold accent-color">Nazovite nas</h1>
          <h1 class="font-weight-light" style="font-size: 4rem">
            +387 63 311-947
          </h1>
          <p>Uvijek ima netko spreman odgovoriti na sva Vaša pitanja!</p>
        </b-col>

        <b-col md="6" class="vert-align">
          <img
            src="/images/contact-phone.svg"
            alt="Contact phone illustration"
            width="70%"
          />
        </b-col>
      </b-row>

      <!-- Posjetite -->
      <b-row class="my-5 pt-4">
        <b-col md="6" class="vert-align">
          <img
            src="/images/contact-visit.svg"
            alt="Contact visit illustration"
            width="90%"
          />
        </b-col>

        <b-col md="6" class="vert-align text-md-left">
          <h1 class="bold accent-color">Posjetite nas</h1>
          <h1 class="font-weight-light" style="font-size: 4rem">
            Matice hrvatske b.b., Mostar
          </h1>
          <p>Najbrži način je da nas posjetite uživo!</p>
        </b-col>
      </b-row>
    </b-container>

    <!-- Google Maps -->
    <b-container fluid class="mt-1 pb-2">
      <h4 class="text-center">Gdje se nalazimo:</h4>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1450.7893147250534!2d17.79686539983354!3d43.34400576913566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134b437e10364aff%3A0x9bba6e03f3d59f46!2sStudentski%20zbor%20Sveu%C4%8Dili%C5%A1ta%20u%20Mostaru!5e0!3m2!1shr!2sba!4v1616880703510!5m2!1shr!2sba"
        width="100%"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        title="Studentski zbor SUM mjesto adresa upute gugl maps di se nalazi"
      ></iframe>
    </b-container>
  </div>
</template>

<script>

export default {
  name: "Kontakt",
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      form: {
        email: "",
        name: "",
        subject: "",
        content: "",
      },
    };
  }
};
</script>

<style scoped>
#kontakt-landing {
  position: relative;
  min-height: 60vh;
}

#kontakt-landing:before {
  content: " ";
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-image: url("https://images.pexels.com/photos/323503/pexels-photo-323503.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}

.heading {
  font-size: 5rem;
  font-weight: 600;
  color: #fff;
}

@media only screen and (max-width: 768px) {
  .heading {
    font-size: 3rem;
  }
}

.subheading {
  color: #fff;
  text-shadow: 0 0 15px #000;
}

.underline {
  background-image: linear-gradient(120deg, #f8a85e 0%, #c99f2d 100%);
  background-repeat: no-repeat;
  background-size: 180px 0.2em;
  background-position: 0 88%;
}

.bold {
  font-weight: 600;
}

.no-border {
  border-radius: 0;
}

.vert-align {
  flex-direction: column;
  justify-content: center;
  display: flex;
}
</style>