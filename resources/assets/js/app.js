import './bootstrap'
import NavHeader from './components/NavHeader.vue'
import Banner from './components/Banner.vue'
import router from './routes.js'


const app = new Vue({

  el: '#app',

  components: {
    NavHeader,
    Banner,
  },

  router,

  template: `
    <div>
      <nav-header></nav-header>
      <banner>{{ salutation }}</banner>
      <div class="tabs banner-tabs">
        <div class="container">
          <ul>
            <router-link tag="li" to="/dashboard" exact>
              <a>Dashboard</a>
            </router-link>
            <router-link tag="li" to="/profile">
              <a>Edit Profile</a>
            </router-link>

            <!--<li><a href="#">Dashboard</a></li>-->
            <!--<li><a href="#">Profile</a></li>-->
          </ul>
        </div> <!-- .container -->
      </div> <!-- .tabs -->
      <div class="main">
        <section class="section">
          <div class="container">
            <router-view></router-view>
          </div>
        </section>
      </div> <!-- .main -->
    </div>
  `,

  computed: {
    salutation() {
      const hour = new Date().getHours();

      let timeOfDay

      if (hour > 16) {
        timeOfDay = 'evening'
      } else if (hour > 11) {
        timeOfDay =  'afternoon'
      } else {
        timeOfDay =  'morning'
      }

      return `Good ${timeOfDay}, Dr. ${this.lastName}!`
    }
  },

  data: {
    lastName: 'Asher',
  },

});

