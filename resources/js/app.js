require('./bootstrap');
window.Vue = require('vue');
import VeeValidate from 'vee-validate'
import vSelect from 'vue-select'

Vue.use(VeeValidate)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('auction-slots', require('./components/auction-slots.vue').default);
Vue.component('auction-slots-single', require('./components/single-auction-slots.vue').default);
Vue.component('v-select', vSelect);
// import moment from 'moment';
// import 'moment-timezone';
import VueCarousel from 'vue-carousel';

Vue.use(VueCarousel);
Vue.prototype.moment = moment
const app = new Vue({
    el: '#app',
    data() {
        return {
            message: 'This message from vue',
            form: {},
            regularHeader: true,
            serverTime: window.serverTime,
            user:{},
            termCheck:false,
            timeZone: window.timeZone

        }
    },
    created() {
        this.setAuth()

    },

    mounted() {
        var Swipes = new Swiper('.swiper-container', {
            slidesPerView: 5,
            loopedSlides:4,
            centeredSlides: true,
            spaceBetween: 15,
            grabCursor: true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                1200: {
                    slidesPerView: 4,
                    loopedSlides: 4,
                    spaceBetween: 10 },

                1024: {
                    slidesPerView: 3,
                    loopedSlides: 3,
                    spaceBetween: 10 },

                768: {
                    slidesPerView: 2,
                    loopedSlides: 2,
                    spaceBetween: 10 },

                675: {
                    slidesPerView: 1,
                    loopedSlides: 1,
                    spaceBetween: 20 }
            }

        });
    },

    methods: {
        setAuth(){
            var authData=window.auth.replace(/&quot;/g,'\"')
            if(authData){this.user=JSON.parse(authData)}
        },

        placeBid(){
          alert('Place Bid under construction')
        },
        changeTerm(){
            this.termCheck =!this.termCheck
        },

        countDown(id, upTime){

            this.$nextTick(()=>{
                var timeZoneFormatedUptime = this.moment.tz(upTime, this.timeZone);
                $("#getting-started"+id).countdown(timeZoneFormatedUptime.toDate(), function (event) {
                    if( event.strftime('%D%H%M%S')== '00000000'){
                        axios.get('/fire-event/'+id)
                        $(this).text(
                            event.strftime('Its live now')
                        );
                    }else{
                        $(this).text(

                            event.strftime('%D days %H:%M:%S')
                        );
                    }


                });
            })

        }
    },

});
