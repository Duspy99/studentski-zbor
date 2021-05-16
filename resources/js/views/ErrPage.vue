<template>
  <div id="errorpage">
      <b-container>
          <div class="py-5 text-center">
                <img src="/images/404-illustration.svg" alt="404 Error image" id="errorimg" height="200px">

                <br>

                <h1 class="font-bold text-muted">404</h1>
                <h2 class="font-light text-break mt-n3">&lt;dogodila se greška/&gt;</h2>

                <br>

                <p class="text-muted">Ono što tražite ne postoji ili je možda na drugom mjestu </p>
                
                
                <b-link to="/novosti" class="text-dark"
                    ><h5>
                        <img
                            src="/images/left-arrow.png"
                            alt="Back"
                            height="32px"
                            style="margin-bottom: 5px"/>
                        <span class="bold ml-1">Početna stranica</span>
                    </h5>
                </b-link>
          </div>

      </b-container>
  </div>
</template>

<script>
export default {
    name: "ErrPage",
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;400;500&display=swap');

h1, h2 {
    font-family: 'Roboto Mono', monospace;
}

h1 {
    font-size: 8rem;
}

#errorpage {
    min-height: 100vh;
    background-color: #f1f1f1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.font-light {
    font-weight: 200;
}

.font-bold {
    font-weight: 600;
}

@media screen and (max-width: 350px) {
    #errorimg {
        height: 160px;
    }

    h1 {
        font-size: 6rem;
    }
}

@media screen and (min-width: 1600px) {
    #errorimg {
        height: 300px;
    }

    h1 {
        font-size: 16rem;
    }

    h2 {
        font-size: 4rem;
    }

    p {
        font-size: 2rem;
    }

    h5 {
        font-size: 2rem !important;
    }
}
</style>