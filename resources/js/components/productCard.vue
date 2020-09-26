<template>
    <div>
        <div class="product">
            <div class="photo">
                <img src="http://pngimg.com/uploads/guava/guava_PNG57.png"  >
            </div>
            <div class="base">
                <p class="title">Green Guava</p>
                <div class="inner">
                    <div class="weight">500mg </div>
                    <div class="price">10 Tk</div>
                </div>
                <div class="addCart">
                    <button class="addTocart" @click.prevent="addCart()">
                        <span class="item" v-if="productItem > 0 ">
                            {{productItem}}
                        </span>
                        <i class="fa fa-shopping-cart mr-2"  v-if="productItem == 0"></i>
                        Add To Cart

                    </button>
                    <button class="decr fa fa-minus" @click.prevent="removeItem" v-if="productItem>=1"></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                productItem:0,

            }
        },
        methods:{

            addCart(){
                this.productItem ++;
            },

            removeItem(){
                this.productItem --;
            },

        },
        computed:{

        }
    }
</script>